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
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>Peringkat</th>
                                            <th>Nama Alternatif</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($R as $i => $r)
                                            @for ($j = 0; $j < $m; $j++)
                                                @php
                                                    $P[$i] = (isset($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
                                                @endphp
                                            @endfor
                                            <tr>
                                                <td>{{ $i }}</td>
                                                @foreach ($data as $item)
                                                    @if ($item->id_alternatif == $i)
                                                        <td>{{ $item->alternatif }}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ ceil($P[$i])/100 }}</td>
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
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>Peringkat</th>
                                            <th>Nama Alternatif</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($R as $i => $r)
                                            @for ($j = 0; $j < $m; $j++)
                                                @php
                                                    $P[$i] = (isset($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
                                                @endphp
                                            @endfor
                                            <tr>
                                                <td>{{ $i }}</td>
                                                @foreach ($data as $item)
                                                    @if ($item->id_alternatif == $i)
                                                        <td>{{ $item->alternatif }}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ ceil($P[$i])/100 }}</td>
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
