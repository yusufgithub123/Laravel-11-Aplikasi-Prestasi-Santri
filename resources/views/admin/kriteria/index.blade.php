@extends('layouts.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
            </li>
            <li class="breadcrumb-item">Daftar Data</li>
            <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Daftar Kriteria Santri Berprestasi</h1>
            <p class="mb-0">Pondok Darul Hijrah Putra</p>
        </div>
    </div>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-1 rounded-start text-center">No</th>
                        <th class="border-1 text-center">Nama Kriteria</th>
                        <th class="border-1 text-center">Atribut</th>
                        <th class="border-1 rounded-end text-center">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Item -->
                    @php
                        $no = 1;
                    @endphp
                    @forelse($kriteria as $item)
                    <tr>
                        <td class="text-primary fw-bold text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $item->nama_kriteria }}</td>
                        <td class="text-center">{{ $item->atribut }}</td>
                        <td class="text-center">{{ $item->bobot * 100 }}%</td>
                    </tr>
                    @empty
                    <tr class="alert alert-danger">
                        <td colspan="4" class="text-center">Data kriteria belum tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
                <!-- End of Item -->
            </table>
        </div>
    </div>
</div>
@endsection