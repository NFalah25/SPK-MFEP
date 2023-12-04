@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Alternatif</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Alternatif</a></div>
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
                            <h4>Daftar Alternatif</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('alternatif.create') }}">Tambah Alternatif</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="keluarga">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
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
                                                        <a href="{{ route('alternatif.edit', $item->id) }}"
                                                            class="btn btn-sm btn-secondary btn-icon ml-2 mr-2 d-flex align-items-center">
                                                            <span><i class="fas fa-edit"></i></span>&nbsp;Ubah
                                                        </a>
                                                        <form action="{{ route('alternatif.destroy', $item->id) }}"
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
@endsection

@push('customStyle')
@endpush
