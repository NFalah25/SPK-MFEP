@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-header">
                            <h4>Data Siswa</h4>
                        </div>
                        <div class="card-body">
                            {{ $countAlternatif }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-secondary">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="card-header">
                            <h4>Kriteria</h4>
                        </div>
                        <div class="card-body">
                            {{ $countKriteria }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="card-header">
                            <h4>Alternatif</h4>
                        </div>
                        <div class="card-body">
                            {{ $countAlternatif }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-header">
                            <h4>Pengguna</h4>
                        </div>
                        <div class="card-body">
                            2
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <div class="card" style="height: 500px">
                    <div class="card-header">
                        <h5>Nilai Siswa</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="nilai"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-agenda gradient-bottom" style="height: 500px">
                    <div class="card-header" style="border-bottom: 1px solid #ddd">
                        <h5>Peringkat Siswa</h5>
                    </div>
                    <div class="card-body" id="top-5-scroll">
                        <ul class="list-unstyled list-unstyled-border m-0">
                            @foreach ($alternatif as $key => $item)
                                <li class="media">
                                    <table>
                                        <tr>
                                            <td class="media-title" style="color: inherit">{{  $key + 1  }}.&emsp;</td>
                                            <td class="media-title" style="color: inherit">{{ $item }}</td>
                                        </tr>
                                    </table>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-center" style="padding: 25px"></div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var alternatif = <?php echo json_encode($alternatif); ?>;
   </script>
@endsection
