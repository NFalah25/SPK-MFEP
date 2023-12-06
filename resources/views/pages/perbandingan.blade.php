@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Perbandingan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-6">
                    <h2 class="section-title mt-0">SAW</h2>
                </div>
                <div class="col-6">
                    <h2 class="section-title mt-0">MFEP</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-body" style="padding: 25px 25px 10px 25px">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="keluarga">
                                    <thead>
                                        <tr>
                                            <th>Peringkat</th>
                                            <th>Nama Alternatif</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}
                                                <td>{{ $item->alternatif }}</td>
                                                <td>100</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-body" style="padding: 25px 25px 10px 25px">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="keluarga">
                                    <thead>
                                        <tr>
                                            <th>Peringkat</th>
                                            <th>Nama Alternatif</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}
                                                <td>{{ $item->alternatif }}</td>
                                                <td>100</td>
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
@endsection

@push('customStyle')
@endpush
