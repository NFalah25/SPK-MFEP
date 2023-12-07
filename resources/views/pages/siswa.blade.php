@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
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
                                <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Isi Nilai Kandidat</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="keluarga">
                                    <thead>
                                        <tr>
                                            <th>No</th>
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
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-sm btn-secondary btn-icon d-flex align-items-center justify-content-center ml-2 mr-2 edit" data-id="{{ $item->id_alternatif }}" data-nama="{{ $item->alternatif }}" data-toggle="modal" data-target="#exampleModalCenter2" style="height: 30px; width: 30px"><i class="fas fa-pen"></i></button>
                                                        <form action="{{ route('siswa.destroy', $item->id_alternatif) }}"
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0F2C56">Ubah Nilai Kandidat</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.ubah') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Alternatif</label>
                            <input id="id_alternatif" name="id_alternatif" style="display: none">
                            <input type="text" class="form-control @error('nilai') is-invalid @enderror"
                                id="alternatif" name="alternatif" spellcheck="false" autocomplete="off">
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
    <script>
        $(document).on("click", ".edit", function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            $("#id_alternatif").val(id);
            $("#alternatif").val(nama);
        });
    </script>
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush