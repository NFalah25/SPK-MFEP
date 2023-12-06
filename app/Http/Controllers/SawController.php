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

        return view('pages.saw', compact('alternatif', 'kriteria', 'evaluasi'));
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