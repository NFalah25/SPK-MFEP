@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Alternatif</h1>
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
                            <h4>Daftar Alternatif</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tambah Alternatif</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Alternatif</th>
                                            <th class="text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}
                                                <td>{{ $item->alternatif }}</td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter2" data-id="{{ $item->id_alternatif }}" data-nama="{{ $item->alternatif }}"
                                                            class="btn btn-sm btn-secondary btn-icon d-flex align-items-center ml-2 mr-2 edit">
                                                            <span><i class="fas fa-edit"></i></span>&nbsp;Ubah
                                                        </button>
                                                        <form action="{{ route('alternatif.destroy', $item->id_alternatif) }}"
                                                          method="POST">
                                                          <input type="hidden" name="_method" value="DELETE">
                                                          <input type="hidden" name="_token"
                                                              value="{{ csrf_token() }}">
                                                          <button class="btn btn-sm btn-danger btn-icon confirm-delete d-flex align-items-center">
                                                          <span><i class="fas fa-times"></i></span>&nbsp;Hapus</button>
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
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0F2C56">Tambah Alternatif</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('alternatif.store') }}" method="post">
                        @csrf
                        <div class="form-group m-0">
                            <label for="alternatif">Nama Alternatif</label>
                            <input type="text" class="form-control @error('alternatif') is-invalid @enderror"
                                id="alternatif" name="alternatif" spellcheck="false" autocomplete="off">
                            @error('alternatif')
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
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0F2C56">Ubah Alternatif</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('alternatif.ubah') }}" method="post">
                        @csrf
                        <div class="form-group m-0">
                            <label for="alternatif2">Nama Alternatif</label>
                            <input id="id_alternatif" name="id_alternatif" style="display: none">
                            <input type="text" class="form-control @error('alternatif2') is-invalid @enderror"
                                id="alternatif2" name="alternatif" spellcheck="false" autocomplete="off">
                            @error('alternatif2')
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
            $("#alternatif2").val(nama);
        });
    </script>
@endpush

@push('customStyle')
@endpush
