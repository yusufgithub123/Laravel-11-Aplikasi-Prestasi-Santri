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
            <li class="breadcrumb-item active" aria-current="page">Nilai</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Daftar Nilai Santri Berprestasi</h1>
            <p class="mb-0">Pondok Darul Hijrah Putra</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center mb-4">
    <a href="{{ route('nilai.create') }}" class="btn btn-secondary d-inline-flex align-items-center me-2 dropdown-toggle">
    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>Tambah
    </a>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-1 rounded-start text-center">ID Santri</th>
                        <th class="border-1 rounded-start text-center">Nama Santri</th>
                        <th class="border-1 rounded-end text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Item -->
                @forelse($penilaian as $item)
                    <tr>
                        @foreach($detail as $data)
                        @if($item->id_alternatif == $data->id_alternatif)
                            <td class="text-primary fw-bold text-center">
                                {{ $data->id_alternatif }}
                            </td>
                            @break;
                        @endif
                        @endforeach

                        @foreach($detail as $data)
                        @if($item->id_alternatif == $data->id_alternatif)
                            <td class="text-primary fw-bold text-center">
                                {{ $data->nama_santri }}
                            </td>
                            @break;
                        @endif
                        @endforeach

                        @foreach($detail as $data)
                        @if($item->id_alternatif == $data->id_alternatif)
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('nilai.destroy', $data->id_alternatif) }}" method="POST">
                                    <a href="{{ route('nilai.show', $data->id_alternatif) }}" class="btn btn-sm btn-outline-warning">SHOW</a>

                                    <a href="{{ route('nilai.edit', $data->id_alternatif) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                            @break;
                        @endif
                        @endforeach
                    </tr>
                @empty
                    <tr class="alert alert-danger">
                        <td colspan="8" class="text-center">Data nilai belum tersedia</td>
                    </tr>
                @endforelse
                </tbody>
                <!-- End of Item -->
            </table>
        </div>
    </div>
</div>
@endsection