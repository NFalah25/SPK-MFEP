@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Siswa</a></div>
                <div class="breadcrumb-item">Tabel</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Daftar Siswa</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Isi Nilai Alternatif</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="keluarga">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Siswa</th>
                                            @foreach ($kriteria as $key => $item)
                                                <th>{{ $item->kriteria }}</th>
                                            @endforeach
                                            <th class="text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($evaluasi as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->id_alternatif }}</td>
                                                <td>{{ $item->id_kriteria }}</td>
                                                <td>{{ $item->nilai }}</td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('alternatif.edit', $item->id) }}" class="btn btn-sm btn-secondary btn-icon ml-2 mr-2 d-flex align-items-center justify-content-center" style="height: 30px; width: 30px">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="{{ route('alternatif.destroy', $item->id) }}"
                                                            method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete d-flex align-items-center justify-content-center" style="height: 30px; width: 30px">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0F2C56">Tambah Kriteria</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Alternatif</label>
                            <select class="form-control select2 @error('id_alternatif') is-invalid @enderror" name="id_alternatif">
                                <option value="">Pilih Alternatif</option>
                                @foreach ($alternatif as $key => $item)
                                    <option value="{{ $item->id }}">{{ $item->alternatif }}</option>                                    
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
                            <select class="form-control select2 @error('id_kriteria') is-invalid @enderror" name="id_kriteria">
                                <option value="">Pilih Kriteria</option>
                                @foreach ($kriteria as $key => $item)
                                    <option value="{{ $item->id }}">{{ $item->kriteria }}</option>                                    
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