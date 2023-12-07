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
            <h2 class="section-title">Daftar Nilai Bobot Kriteria</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body" style="padding: 25px 25px 10px 25px">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kriteria</th>
                                            <th>Atribut</th>
                                            <th>Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->kriteria }}</td>
                                                <td>{{ $item->atribut }}</td>
                                                <td>{{ $item->bobot }}%</td>
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
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hasil as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->alternatif }}</td>
                                                <td>{{ $item->C1*0.01 }}</td>
                                                <td>{{ $item->C2*0.01 }}</td>
                                                <td>{{ $item->C3*0.01 }}</td>
                                                <td>{{ $item->C4*0.01 }}</td>
                                                <td>{{ $item->C5*0.01 }}</td>
                                                <td>{{ $item->C6*0.01 }}</td>
                                                <td>{{ $item->C7*0.01 }}</td>
                                                <td>{{ $item->C8*0.01 }}</td>
                                                <td>{{ $item->C9*0.01 }}</td>
                                                <td>{{ $item->C10*0.01 }}</td>
                                                <td>{{ $item->total_hasil*0.01 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="section-title">Hasil</h2>
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body" style="padding: 25px 25px 10px 25px">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <th>Peringkat</th>
                                        <th>Nama Alternatif</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mfep as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $data->nama_alternatif }}</td>
                                            <td>{{ $data->total_hasil*0.01 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
@endpush
