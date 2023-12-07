<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNilaiRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::orderByDesc('id_alternatif')->get();
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
        ->orderByDesc('evaluasi.id_alternatif')
        ->get();

        return view('pages.siswa', compact('alternatif', 'kriteria', 'evaluasi'));
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
        $existingEntry = Evaluasi::where('id_alternatif', $request['id_alternatif'])
        ->where('id_kriteria', $request['id_kriteria'])
        ->exists();

        if ($existingEntry) {
            return redirect(route('siswa.index'))->with('error', 'Nilai Gagal Ditambahkan');
        }

        Evaluasi::create([
            'id_alternatif' => $request['id_alternatif'],
            'id_kriteria' => $request['id_kriteria'],
            'nilai' => $request['nilai'],
        ]);

        return redirect(route('siswa.index'))->with('success', 'Nilai Berhasil Ditambahkan');
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
        $id_kriteria = $request['id_kriteria'];
        $nilai = $request['nilai'];

        Evaluasi::where('id_alternatif', $id_alternatif)
                ->where('id_kriteria', $id_kriteria)
                ->update(['nilai' => $nilai]);

        return redirect()->route('siswa.index')->with('success', 'Nilai Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Evaluasi::where('id_alternatif', $id)->delete();
        return redirect()->route('siswa.index')->with('success', 'Alternatif Berhasil Dihapus');
    }
}
