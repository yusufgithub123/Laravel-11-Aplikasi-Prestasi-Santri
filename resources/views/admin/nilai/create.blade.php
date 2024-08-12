@extends('layouts.app')

@section('content')
<div class="row py-4">
    <div>
        <div class="card card-body border-2 shadow mb-4">
            <h2 class="h5 mb-4">Tambah Nilai Santri</h2>
            <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center">
                    <div class="col-md-12 mb-3">
                        <label for="id_alternatif">Alternatif</label>
                        <select class="form-select mb-0 @error('id_alternatif') is-invalid @enderror" id="id_alternatif" name="id_alternatif" aria-label="Pilih salah satu alternatif">
                        @foreach($alternatifs as $alternatif)
                            <option value="{{ $alternatif->id }}">{{ $alternatif->nama_santri }}</option>
                        @endforeach
                        </select>
                    </div>
                    @error('id_alternatif')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    @foreach($kriteria as $item)
                    <div class="col-md-6 mb-3">
                        <input type="hidden" class="form-control" name="id_kriteria[]" value="{{ $item->id }}">
                        <label for="nilai">{{ $item->nama_kriteria }}</label>
                        <select class="form-select mb-0 @error('nilai') is-invalid @enderror" id="nilai" name="nilai[]" aria-label="Pilih salah satu">
                        @if($item->id == 1)
                            <option value="1">Kurang dari 60</option>
                            <option value="2">60 - 70</option>
                            <option value="3">70 - 80</option>
                            <option value="4">80 - 90</option>
                            <option value="5">90 - 99</option>
                            @elseif($item->id == 2)
                            <option value="5">Sangat Baik</option>
                            <option value="4">Baik</option>
                            <option value="3">Cukup</option>
                            <option value="2">Kurang</option>
                            <option value="1">Kurang Sekali</option>
                            @elseif($item->id == 3)
                            <option value="1">Juz 30</option>
                            <option value="2">Juz 1 - Juz 5</option>
                            <option value="3">Juz 1 - Juz 10</option>
                            <option value="4">Juz 1 - Juz 15</option>
                            <option value="5">Juz 1 - Juz 20</option>
                            <option value="6">Juz 1 - Juz 25</option>
                            <option value="7">Juz 1 - Juz 29</option>
                            @elseif($item->id == 4)
                            <option value="5">Sangat Baik</option>
                            <option value="4">Baik</option>
                            <option value="3">Cukup</option>
                            <option value="2">Kurang</option>
                            <option value="1">Kurang Sekali</option>
                        @else
                            <option value="1">Pelanggaran Berat</option>
                            <option value="2">Pelanggaran Sedang</option>
                            <option value="3">Pelanggaran Ringan</option>
                            @endif
                        </select>
                    </div>
                    @error('nilai')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    @endforeach
                </div>
                <div class-="col-12">
                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection