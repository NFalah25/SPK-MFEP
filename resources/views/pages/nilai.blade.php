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
                    <form action="{{ route('nilai.store') }}" method="post">
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
                        {{-- @foreach ($kriteria as $key => $item)
                            <div class="form-group">
                                <label for="{{ $item->kriteria }}">{{ $item->kriteria }}</label>
                                <input id="id_kriteria" name="id_kriteria" style="display: none" value="{{ $item->id }}">
                                <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                    id="nilai" name="nilai" spellcheck="false" autocomplete="off">
                                @error('nilai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endforeach --}}
                        <div class="form-group">
                            <label for="{{ $kriteria[0]->kriteria }}">{{ $kriteria[0]->kriteria }}</label>
                            <input id="id_kriteria" name="id_kriteria" style="display: none" value="{{ $kriteria[0]->id }}">
                            <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                id="nilai" name="nilai[]" spellcheck="false" autocomplete="off">
                            @error('nilai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="{{ $kriteria[1]->kriteria }}">{{ $kriteria[1]->kriteria }}</label>
                            <input id="id_kriteria" name="id_kriteria" style="display: none" value="{{ $kriteria[1]->id }}">
                            <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                id="nilai" name="nilai[]" spellcheck="false" autocomplete="off">
                            @error('nilai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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