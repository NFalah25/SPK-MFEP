<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MfepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
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

        $hasil = DB::table('evaluasi')
            ->join('alternatif', 'evaluasi.id_alternatif', '=', 'alternatif.id_alternatif')
            ->join('kriteria', 'evaluasi.id_kriteria', '=', 'kriteria.id_kriteria')
            ->select(
                'evaluasi.id_alternatif',
                'alternatif.alternatif',
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=1,
                        IF(kriteria.atribut="benefit", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C1'),
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=2,
                        IF(kriteria.atribut="benefit", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C2'),
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=3,
                        IF(kriteria.atribut="benefit", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C3'),
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=4,
                        IF(kriteria.atribut="benefit", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C4'),
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=5,
                        IF(kriteria.atribut="benefit", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C5'),
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=6,
                        IF(kriteria.atribut="benefit", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C6'),
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=7,
                        IF(kriteria.atribut="benefit", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C7'),
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=8,
                        IF(kriteria.atribut="benefit", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C8'),
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=9,
                        IF(kriteria.atribut="benefit", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C9'),
                DB::raw('SUM(
                    IF(
                        evaluasi.id_kriteria=10,
                        IF(kriteria.atribut="cost", evaluasi.nilai * kriteria.bobot, 1 / (evaluasi.nilai * kriteria.bobot)),
                        0
                    )
                ) AS C10'),
                DB::raw('SUM(evaluasi.nilai * kriteria.bobot) as total_hasil'),

            )
            ->groupBy('evaluasi.id_alternatif', 'alternatif.alternatif')
            ->orderBy('evaluasi.id_alternatif')
            ->get();

        $mfep = Evaluasi::join('alternatif', 'evaluasi.id_alternatif', '=', 'alternatif.id_alternatif')
            ->join('kriteria', 'evaluasi.id_kriteria', '=', 'kriteria.id_kriteria')
            ->select('alternatif.alternatif as nama_alternatif', DB::raw('SUM(evaluasi.nilai * kriteria.bobot) as total_hasil'))
            ->groupBy('alternatif.id_alternatif', 'alternatif.alternatif')
            ->orderBy('total_hasil', 'desc')
            ->get();

        // return view('hasil.index', ['hasil' => $hasil]);

        // $normalisasi = DB::select($R);

        return view('pages.mfep', ['alternatif' => $alternatif, 'kriteria' => $kriteria, 'evaluasi' => $evaluasi, 'hasil' => $hasil, 'mfep' => $mfep]);
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
