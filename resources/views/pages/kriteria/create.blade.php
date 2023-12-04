@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kriteria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('kriteria.index') }}">Kriteria</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Kriteria</h4>
                </div>
                <div class="card-body">
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
                        <div class="form-group">
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
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-light" href="{{ route('kriteria.index') }}">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush