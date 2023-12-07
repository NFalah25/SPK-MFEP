<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlternatifRequest;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Alternatif::orderByDesc('id_alternatif')->get();
        return view('pages.alternatif', compact('data'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function ubah(Request $request)
    {
        $id_alternatif = $request['id_alternatif'];
        $alternatif = $request['alternatif'];

        Alternatif::where('id_alternatif', $id_alternatif)
                ->update(['alternatif' => $alternatif]);

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
