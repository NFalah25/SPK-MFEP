@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Penginputan Nilai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Nilai</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Nilai</h4>
                </div>
                <div class="card-body">
                    {{-- <form action="{{ route('penduduk.store') }}" method="post"> --}}
                    <form action="#" method="post" id="form">
                        @csrf
                        <div class="form-group">
                            <label>Nama Alternatif</label>
                            <select class="form-control select2" name="id_alternatif">
                                <option value="">Pilih Alternatif</option>
                                @foreach ($alternatif as $item)
                                    <option value="{{ $item->id }}">{{ $item->alternatif }}</option>
                                @endforeach
                            </select>
                            @error('id_alternatif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @foreach ($kriteria as $key => $item)
                            <div class="form-group">
                                <label for="{{ $item->kriteria }}">{{ $item->kriteria }}</label>
                                <input type="text" class="form-control @error('{{ $item->kriteria }}') is-invalid @enderror"
                                    id="{{ $item->kriteria }}" name="{{ $item->kriteria }}" spellcheck="false" autocomplete="off">
                                @error('{{ $item->kriteria }}')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-light" onclick="resetForm()">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function resetForm() {
          document.getElementById("form").reset();
        }
    </script>      
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush