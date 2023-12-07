@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Perhitungan SAW</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Matrix Keputusan (X)</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary m-0">
                        <div class="card-body" style="padding: 25px 25px 10px 25px">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            @foreach ($kriteria as $key => $item)
                                                <th>{{ $item->kriteria }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($evaluasi as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->alternatif }}</td>
                                                <td>{{ $item->C1 }}</td>
                                                <td>{{ $item->C2 }}</td>
                                                <td>{{ $item->C3 }}</td>
                                                <td>{{ $item->C4 }}</td>
                                                <td>{{ $item->C5 }}</td>
                                                <td>{{ $item->C6 }}</td>
                                                <td>{{ $item->C7 }}</td>
                                                <td>{{ $item->C8 }}</td>
                                                <td>{{ $item->C9 }}</td>
                                                <td>{{ $item->C10 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="section-title">Perkalian Matriks Keputusan dan Bobot</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body" style="padding: 25px 25px 10px 25px">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            @foreach ($kriteria as $key => $item)
                                                <th>{{ $item->kriteria }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($normalisasi as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->alternatif }}</td>
                                                <td>{{ $item->C1*1 }}</td>
                                                <td>{{ $item->C2*1 }}</td>
                                                <td>{{ $item->C3*1 }}</td>
                                                <td>{{ $item->C4*1 }}</td>
                                                <td>{{ $item->C5*1 }}</td>
                                                <td>{{ $item->C6*1 }}</td>
                                                <td>{{ $item->C7*1 }}</td>
                                                <td>{{ $item->C8*1 }}</td>
                                                <td>{{ $item->C9*1 }}</td>
                                                <td>{{ $item->C10*1 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
@endpush
