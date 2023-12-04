@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pengguna</a></div>
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
                            <h4>Daftar Pengguna</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="#">Tambah
                                    Pengguna</a>
                                <a class="btn btn-primary btn-color-blue text-white import">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Import Pengguna</a>
                                <a class="btn btn-primary btn-color-blue text-white export"
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                    Export Pengguna</a>
                                <a class="btn btn-primary btn-color-blue text-white search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Cari Pengguna</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-import mb-4" style="display: none">
                                <div class="custom-file">
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <label class="custom-file-label" for="file-upload">Pilih File</label>
                                        <input type="file" id="file-upload" class="custom-file-input" name="import_file">
                                        <br /> <br />
                                        <div class="footer text-right">
                                            <button class="btn btn-primary">Import File</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="#">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="role">Pengguna</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Nama Pengguna" spellcheck="false" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                        <a class="btn btn-light" href="#">Ulang</a>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Tanggal</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-secondary btn-icon ml-2"><i
                                                                class="fas fa-edit"></i>
                                                            Ubah
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-sm btn-danger btn-icon ml-2"><i
                                                                class="fas fa-times"></i>
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $users->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('customScript')
    <script>
        $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            //ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });
    </script>
@endpush

@push('customStyle')
@endpush
