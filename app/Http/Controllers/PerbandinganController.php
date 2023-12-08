<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PerbandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $A = Alternatif::all();

        $evaluasi = DB::table('evaluasi')
            ->join('alternatif', 'evaluasi.id_alternatif', '=', 'alternatif.id_alternatif')
            ->select(
                'evaluasi.id_alternatif',
                'alternatif.alternatif',
                DB::raw('SUM(IF(evaluasi.id_kriteria=1, evaluasi.nilai, 0)) AS C1'),
                DB::raw('SUM(IF(evaluasi.id_kriteria=2, evaluasi.nilai, 0)) AS C2'),
                DB::raw('SUM(IF(evaluasi.id_kriteria=3, evaluasi.nilai, 0)) AS C3'),
                DB::raw('SUM(IF(evaluasi.id_kriteria=4, evaluasi.nilai, 0)) AS C4'),
                DB::raw('SUM(IF(evaluasi.id_kriteria=5, evaluasi.nilai, 0)) AS C5'),
                DB::raw('SUM(IF(evaluasi.id_kriteria=6, evaluasi.nilai, 0)) AS C6'),
                DB::raw('SUM(IF(evaluasi.id_kriteria=7, evaluasi.nilai, 0)) AS C7'),
                DB::raw('SUM(IF(evaluasi.id_kriteria=8, evaluasi.nilai, 0)) AS C8'),
                DB::raw('SUM(IF(evaluasi.id_kriteria=9, evaluasi.nilai, 0)) AS C9'),
                DB::raw('SUM(IF(evaluasi.id_kriteria=10, evaluasi.nilai, 0)) AS C10')
            )
            ->groupBy('evaluasi.id_alternatif', 'alternatif.alternatif')
            ->orderBy('evaluasi.id_alternatif')
            ->get();

        $X = [];
        foreach ($evaluasi as $key => $item) {
            $X[1][] = $item->C1;
            $X[2][] = $item->C2;
            $X[3][] = $item->C3;
            $X[4][] = $item->C4;
            $X[5][] = $item->C5;
            $X[6][] = $item->C6;
            $X[7][] = $item->C7;
            $X[8][] = $item->C8;
            $X[9][] = $item->C9;
            $X[10][] = $item->C10;
        }

        $normalisasi = "
        SELECT evaluasi.id_alternatif, alternatif.alternatif,
            SUM( IF(evaluasi.id_kriteria=1, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[1]) . ", " . min($X[1]) . "/evaluasi.nilai), 0)) AS C1,
            SUM( IF(evaluasi.id_kriteria=2, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[2]) . ", " . min($X[2]) . "/evaluasi.nilai), 0)) AS C2,
            SUM( IF(evaluasi.id_kriteria=3, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[3]) . ", " . min($X[3]) . "/evaluasi.nilai), 0)) AS C3,
            SUM( IF(evaluasi.id_kriteria=4, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[4]) . ", " . min($X[4]) . "/evaluasi.nilai), 0)) AS C4,
            SUM( IF(evaluasi.id_kriteria=5, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[5]) . ", " . min($X[5]) . "/evaluasi.nilai), 0)) AS C5,
            SUM( IF(evaluasi.id_kriteria=6, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[6]) . ", " . min($X[6]) . "/evaluasi.nilai), 0)) AS C6,
            SUM( IF(evaluasi.id_kriteria=7, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[7]) . ", " . min($X[7]) . "/evaluasi.nilai), 0)) AS C7,
            SUM( IF(evaluasi.id_kriteria=8, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[8]) . ", " . min($X[8]) . "/evaluasi.nilai), 0)) AS C8,
            SUM( IF(evaluasi.id_kriteria=9, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[9]) . ", " . min($X[9]) . "/evaluasi.nilai), 0)) AS C9,
            SUM( IF(evaluasi.id_kriteria=10, IF(kriteria.atribut='cost', evaluasi.nilai/" . max($X[10]) . ", " . min($X[10]) . "/evaluasi.nilai), 0)) AS C10
            FROM evaluasi
            JOIN alternatif USING(id_alternatif)
            JOIN kriteria USING(id_kriteria)
            GROUP BY evaluasi.id_alternatif, alternatif.alternatif
            ORDER BY evaluasi.id_alternatif
        ";
        $results = DB::select($normalisasi);

        $R = [];
        foreach ($results as $row) {
            $R[$row->id_alternatif] = [$row->C1, $row->C2, $row->C3, $row->C4, $row->C5, $row->C6, $row->C7, $row->C8, $row->C9, $row->C10];
        }

        $W = DB::table('kriteria')
            ->orderBy('id_kriteria')
            ->pluck('bobot')
            ->toArray();

        $P = [];
        $m = count($W);
        foreach ($R as $i => $r) {
            for ($j = 0; $j < $m; $j++) {
                $P[$i] = (isset($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
            }
        }

        $V = collect($P)->map(function ($nilai) use ($P) {
            return collect($P)->filter(function ($n) use ($nilai) {
                return $n > $nilai;
            })->count() + 1;
        })->toArray();

        $mfep = Evaluasi::join('alternatif', 'evaluasi.id_alternatif', '=', 'alternatif.id_alternatif')
            ->join('kriteria', 'evaluasi.id_kriteria', '=', 'kriteria.id_kriteria')
            ->select('alternatif.alternatif as nama_alternatif', DB::raw('SUM(evaluasi.nilai * kriteria.bobot) as total_hasil'))
            ->groupBy('alternatif.id_alternatif', 'alternatif.alternatif')
            ->orderBy('alternatif.id_alternatif', 'asc')
            ->get();

        $mfepPeringkat = DB::table('evaluasi')
            ->join('alternatif', 'evaluasi.id_alternatif', '=', 'alternatif.id_alternatif')
            ->join('kriteria', 'evaluasi.id_kriteria', '=', 'kriteria.id_kriteria')
            ->select(
                'alternatif.alternatif',
                DB::raw('SUM(evaluasi.nilai * kriteria.bobot) AS total_hasil'),
                DB::raw('ROW_NUMBER() OVER (ORDER BY SUM(evaluasi.nilai * kriteria.bobot) DESC) AS peringkat')
            )
            ->where('kriteria.atribut', '=', 'benefit')
            ->groupBy('alternatif.id_alternatif', 'alternatif.alternatif')
            ->orderBy('alternatif.id_alternatif')
            ->get();

        $results = DB::select("
            SELECT
                alternatif.alternatif,
                SUM(CASE WHEN kriteria.atribut = 'Benefit' THEN evaluasi.nilai * kriteria.bobot ELSE 0 END) AS total_hasil_benefit,
                ROW_NUMBER() OVER (ORDER BY SUM(CASE WHEN kriteria.atribut = 'Benefit' THEN evaluasi.nilai * kriteria.bobot ELSE 0 END) DESC) AS benefit_rank,
                SUM(CASE WHEN kriteria.atribut = 'Cost' THEN evaluasi.nilai * kriteria.bobot ELSE 0 END) AS total_hasil_cost,
                ROW_NUMBER() OVER (ORDER BY SUM(CASE WHEN kriteria.atribut = 'Cost' THEN evaluasi.nilai * kriteria.bobot ELSE 0 END) DESC) AS cost_rank
            FROM
                evaluasi
            JOIN alternatif ON evaluasi.id_alternatif = alternatif.id_alternatif
            JOIN kriteria ON evaluasi.id_kriteria = kriteria.id_kriteria
            GROUP BY
                alternatif.id_alternatif, alternatif.alternatif
            ORDER BY
                alternatif.id_alternatif
        ");

        return view('pages.perbandingan', compact('A', 'R', 'P', 'V', 'mfep', 'mfepPeringkat', 'results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
