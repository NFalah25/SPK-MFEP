@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Alternatif</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Validasi Ubah Alternatif</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('alternatif.update', $alternatif) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="alternatif">Nama alternatif</label>
                            <input type="text" class="form-control @error('alternatif') is-invalid @enderror"
                                id="alternatif" name="alternatif" spellcheck="false" autocomplete="off"
                                value="{{ old('alternatif', $alternatif->alternatif) }}">
                            @error('alternatif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1">Simpan</button>
                        <a class="btn btn-light" href="{{ route('alternatif.index') }}">Batal</a>
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