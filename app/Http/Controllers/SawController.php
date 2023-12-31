<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SawController extends Controller
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
            DB::raw('SUM( IF(evaluasi.id_kriteria=1, evaluasi.nilai, 0)) AS C1'),
            DB::raw('SUM( IF(evaluasi.id_kriteria=2, evaluasi.nilai, 0)) AS C2'),
            DB::raw('SUM( IF(evaluasi.id_kriteria=3, evaluasi.nilai, 0)) AS C3'),
            DB::raw('SUM( IF(evaluasi.id_kriteria=4, evaluasi.nilai, 0)) AS C4'),
            DB::raw('SUM( IF(evaluasi.id_kriteria=5, evaluasi.nilai, 0)) AS C5'),
            DB::raw('SUM( IF(evaluasi.id_kriteria=6, evaluasi.nilai, 0)) AS C6'),
            DB::raw('SUM( IF(evaluasi.id_kriteria=7, evaluasi.nilai, 0)) AS C7'),
            DB::raw('SUM( IF(evaluasi.id_kriteria=8, evaluasi.nilai, 0)) AS C8'),
            DB::raw('SUM( IF(evaluasi.id_kriteria=9, evaluasi.nilai, 0)) AS C9'),
            DB::raw('SUM( IF(evaluasi.id_kriteria=10, evaluasi.nilai, 0)) AS C10')
        )
        ->groupBy('evaluasi.id_alternatif', 'alternatif.alternatif')
        ->orderBy('evaluasi.id_alternatif')
        ->get();

        $X = [];
        foreach($evaluasi as $key => $item) {
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

        $R = "
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
            SUM( IF(evaluasi.id_kriteria=10, IF(kriteria.atribut='benefit', evaluasi.nilai/" . max($X[10]) . ", " . min($X[10]) . "/evaluasi.nilai), 0)) AS C10
            FROM evaluasi
            JOIN alternatif USING(id_alternatif)
            JOIN kriteria USING(id_kriteria)
            GROUP BY evaluasi.id_alternatif, alternatif.alternatif
            ORDER BY evaluasi.id_alternatif
        ";
        $normalisasi = DB::select($R);

        return view('pages.saw', ['alternatif' => $alternatif, 'kriteria' => $kriteria, 'evaluasi' => $evaluasi, 'normalisasi' => $normalisasi]);
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
