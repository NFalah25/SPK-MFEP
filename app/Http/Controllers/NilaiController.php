<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNilaiRequest;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        return view('pages.nilai', compact('kriteria', 'alternatif'));
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
    public function store(StoreNilaiRequest $request)
    {
        Evaluasi::create([
            'id_alternatif' => $request['id_alternatif'],
            'id_kriteria' => $request['id_kriteria'],
            'nilai' => $request['nilai'],
        ]);
        return redirect(route('nilai.index'))->with('success', 'Nilai Berhasil Ditambahkan');;
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
