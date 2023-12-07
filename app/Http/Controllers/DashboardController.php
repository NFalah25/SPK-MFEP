<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evaluasi;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::pluck('alternatif');
        $countUser = User::all()->count();
        $countKriteria = Kriteria::all()->count();
        $countAlternatif = Alternatif::all()->count();

        $data = DB::table('evaluasi')
            ->join('alternatif', 'evaluasi.id_alternatif', '=', 'alternatif.id_alternatif')
            ->join('kriteria', 'evaluasi.id_kriteria', '=', 'kriteria.id_kriteria')
            ->select(DB::raw('SUM(evaluasi.nilai * kriteria.bobot) AS total_hasil'))
            ->groupBy('alternatif.id_alternatif', 'alternatif.alternatif')
            ->orderBy('alternatif.id_alternatif', 'asc')
            ->get();
        $nilai = $data->pluck('total_hasil');

        $peringkat = Evaluasi::join('alternatif', 'evaluasi.id_alternatif', '=', 'alternatif.id_alternatif')
            ->join('kriteria', 'evaluasi.id_kriteria', '=', 'kriteria.id_kriteria')
            ->select('alternatif.alternatif as nama_alternatif', DB::raw('SUM(evaluasi.nilai * kriteria.bobot) as total_hasil'))
            ->groupBy('alternatif.id_alternatif', 'alternatif.alternatif')
            ->orderBy('total_hasil', 'desc')
            ->get();
        
        return view('dashboard', compact('alternatif', 'countUser', 'countKriteria', 'countAlternatif', 'nilai', 'peringkat'));
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
