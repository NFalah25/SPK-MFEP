<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKriteriaRequest;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kriteria::all();
        return view('pages.kriteria', compact('data'));
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
    public function store(StoreKriteriaRequest $request)
    {
        Kriteria::create([
            'kriteria' => $request['kriteria'],
            'atribut' => $request['atribut'],
            'bobot' => $request['bobot'],
        ]);
        return redirect(route('kriteria.index'))->with('success', 'Kriteria Berhasil Ditambahkan');
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
    public function ubah(Request $request)
    {
        $id_kriteria = $request['id_kriteria'];
        $kriteria = $request['kriteria'];
        $atribut = $request['atribut'];
        $bobot = $request['bobot'];

        Kriteria::where('id_kriteria', $id_kriteria)
                ->update([
                    'kriteria' => $kriteria,
                    'atribut' => $atribut,
                    'bobot' => $bobot
                ]);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
