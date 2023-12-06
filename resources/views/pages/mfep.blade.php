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
                                <table class="table table-striped table-md" id="keluarga">
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
            <h2 class="section-title">Matrix Ternormalisasi (R)</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body" style="padding: 25px 25px 10px 25px">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="keluarga">
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0F2C56">Isi Nilai Kandidat</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Alternatif</label>
                            <select class="form-control select2 @error('id_alternatif') is-invalid @enderror" name="id_alternatif">
                                @foreach ($alternatif as $key => $item)
                                    <option value="{{ $item->id_alternatif }}">{{ $item->alternatif }}</option>                                    
                                @endforeach
                            </select>
                            @error('id_alternatif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kriteria</label>
                            <select id="mySelect2" class="form-control select2 @error('id_kriteria') is-invalid @enderror" name="id_kriteria">
                                @foreach ($kriteria as $key => $item)
                                    <option value="{{ $item->id_kriteria }}">{{ $item->kriteria }}</option>                                    
                                @endforeach
                            </select>
                            @error('id_kriteria')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group m-0">
                            <label for="nilai">Nilai</label>
                            <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                id="nilai" name="nilai" spellcheck="false" autocomplete="off" placeholder="Nilai">
                            @error('nilai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush