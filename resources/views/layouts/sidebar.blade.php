@php
    $id = request()->segment(2);
    $kriteria = request()->is('kriteria/' . $id . '/edit');
    $alternatif = request()->is('alternatif/' . $id . '/edit');
@endphp

<div class="sidebar-brand">
    <a href="/home"><img src="/assets/img/polinema.png" alt="logo" width="30"></a>
</div>
<div class="sidebar-brand sidebar-brand-sm">
    <a href="/home"><img src="/assets/img/polinema.png" alt="logo" width="30"></a>
</div>
<ul class="sidebar-menu">
    <li class="{{ request()->is('home') ? 'active' : '' }}"><a class="nav-link" href="/home"><i class="fas fa-home"></i>
        <span>Dashboard</span></a>
    </li>
    <li class="{{ request()->is('siswa') ? 'active' : '' }}"><a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-users"></i>
        <span>Data Siswa</span></a>
    </li>
    <li class="{{ request()->is('kriteria') ? 'active' : '' }} || {{ $kriteria ? 'active' : '' }}"><a class="nav-link" href="{{ route('kriteria.index') }}"><i class="fas fa-list"></i>
        <span>Kriteria</span></a>
    </li>
    <li class="{{ request()->is('alternatif') ? 'active' : '' }} || {{ $alternatif ? 'active' : '' }}"><a class="nav-link" href="{{ route('alternatif.index') }}"><i class="fas fa-list"></i>
        <span>Alternatif</span></a>
    </li>
    <li class="{{ request()->is('perhitungan-saw') ? 'active' : '' }}"><a class="nav-link" href="{{ route('perhitungan-saw.index') }}"><i class="fas fa-table"></i>
        <span>Perhitungan SAW</span></a>
    </li>
    <li class="{{ request()->is('perhitungan-mfep') ? 'active' : '' }}"><a class="nav-link" href="{{ route('perhitungan-mfep.index') }}"><i class="fas fa-table"></i>
        <span>Perhitungan MFEP</span></a>
    </li>
    <li class="{{ request()->is('perbandingan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('perbandingan.index') }}"><i class="fas fa-folder-open"></i>
        <span>Perbandingan</span></a>
    </li>
    <li class="{{ request()->is('pengguna') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pengguna.index') }}"><i class="fas fa-user"></i>
        <span>Pengguna</span></a>
    </li>
    <li class=""><a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault(); getElementById('logout-form').submit()"><i class="fas fa-sign-out-alt"></i>
        <span>Keluar</span></a>
    </li>
</ul>
<form id="logout-form" action="{{ route('logout') }}" method="post">@csrf</form>
