@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kriteria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kriteria</a></div>
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
                            <h4>Daftar Kriteria</h4>
                            <div class="card-header-action">
                                {{-- <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tambah Kriteria</button> --}}
                                <button type="button" class="btn btn-icon icon-left btn-primary disabled" disabled aria-disabled="true">Tambah Kriteria</button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="keluarga">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kriteria</th>
                                            <th>Atribut</th>
                                            <th>Bobot</th>
                                            <th class="text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->kriteria }}</td>
                                                <td>{{ $item->atribut }}</td>
                                                <td>{{ $item->bobot }}%</td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('kriteria.edit', $item->id_kriteria) }}"
                                                            class="btn btn-sm btn-secondary btn-icon ml-2 d-flex align-items-center">
                                                            <span><i class="fas fa-edit"></i></span>&nbsp;Ubah
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-sm btn-info btn-icon ml-2 d-flex align-items-center">
                                                            <span><i class="fas fa-edit"></i></span>&nbsp;Sub Kriteria
                                                        </a>
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
    <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0F2C56">Tambah Kriteria</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kriteria.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kriteria">Nama Kriteria</label>
                            <input type="text" class="form-control @error('kriteria') is-invalid @enderror"
                                id="kriteria" name="kriteria" spellcheck="false" autocomplete="off">
                            @error('kriteria')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Atribut</label>
                            <select class="form-control select2 @error('atribut') is-invalid @enderror" name="atribut">
                                <option value="">-</option>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                            @error('atribut')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group m-0">
                            <label for="bobot">Bobot</label>
                            <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                id="bobot" name="bobot" spellcheck="false" autocomplete="off">
                            @error('bobot')
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