<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kriteria::all();
        return view('pages.kriteria.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kriteria.create');
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
        $kriteria = Kriteria::find($id);
        return view('pages.kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKriteriaRequest $request, string $id)
    {
        $validate = $request->validated();

        Kriteria::find($id)->update($validate);
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
