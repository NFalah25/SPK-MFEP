<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Alternatif::all();
        return view('pages.alternatif.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlternatifRequest $request)
    {
        Alternatif::create([
            'alternatif' => $request['alternatif'],
        ]);
        return redirect(route('alternatif.index'))->with('success', 'Alternatif Berhasil Ditambahkan');
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
    public function edit(Alternatif $alternatif)
    {
        return view('pages.alternatif.edit')->with('alternatif', $alternatif);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternatifRequest $request, Alternatif $alternatif)
    {
        $validate = $request->validated();

        $alternatif->update($validate);
        return redirect()->route('alternatif.index')->with('success', 'Alternatif Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        return redirect()->route('alternatif.index')->with('success', 'Alternatif Berhasil Dihapus');
    }
}
