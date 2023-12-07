<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
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
        return view('dashboard', compact('alternatif', 'countUser', 'countKriteria', 'countAlternatif'));
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
