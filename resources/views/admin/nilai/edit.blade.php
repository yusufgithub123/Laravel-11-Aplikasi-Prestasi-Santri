@extends('layouts.app')

@section('content')
<div class="row py-4">
    <div>
        <div class="card card-body border-2 shadow mb-4">
            <h2 class="h5 mb-4">Tambah Nilai Santri</h2>
            <form action="{{ route('nilai.update', $alternatif->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row align-items-center">
                    <div class="col-md-12 mb-3">
                        <label for="id_alternatif">Alternatif</label>
                        <select class="form-select mb-0 @error('id_alternatif') is-invalid @enderror" id="id_alternatif" name="id_alternatif" aria-label="Pilih salah satu alternatif">
                            <option value="{{ $alternatif->id }}">{{ $alternatif->nama_santri }}</option>
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
                        @foreach($nilais as $nilai)
                        @if($nilai->id_kriteria == 1)
                        <option value="1" {{ $nilai->nilai == 1 ? 'selected' : '' }}>Kurang dari 60</option>
                        <option value="2" {{ $nilai->nilai == 2 ? 'selected' : '' }}>60 - 70</option>
                        <option value="3" {{ $nilai->nilai == 3 ? 'selected' : '' }}>70 - 80</option>
                        <option value="4" {{ $nilai->nilai == 4 ? 'selected' : '' }}>80 - 90</option>
                        <option value="5" {{ $nilai->nilai == 5 ? 'selected' : '' }}>90 - 99</option>
                        @endif
                        @endforeach

                        @elseif($item->id == 2)
                        @foreach($nilais as $nilai)
                    @if($nilai->id_kriteria == 2)
                        <option value="5" {{ $nilai->nilai == 5 ? 'selected' : '' }}>Sangat Baik</option>
                        <option value="4" {{ $nilai->nilai == 4 ? 'selected' : '' }}>Baik</option>
                        <option value="3" {{ $nilai->nilai == 3 ? 'selected' : '' }}>Cukup</option>
                        <option value="2" {{ $nilai->nilai == 2 ? 'selected' : '' }}>Kurang</option>
                        <option value="1" {{ $nilai->nilai == 1 ? 'selected' : '' }}>Kurang Sekali</option>
                        @endif
                        @endforeach

                        @elseif($item->id == 3)
                        @foreach($nilais as $nilai)
                    @if($nilai->id_kriteria == 3)
                        <option value="1" {{ $nilai->nilai == 1 ? 'selected' : '' }}>Juz 30</option>
                        <option value="2" {{ $nilai->nilai == 2 ? 'selected' : '' }}>Juz 1 - Juz 5</option>
                        <option value="3" {{ $nilai->nilai == 3 ? 'selected' : '' }}>Juz 1 - Juz 10</option>
                        <option value="4" {{ $nilai->nilai == 4 ? 'selected' : '' }}>Juz 1 - Juz 15</option>
                        <option value="5" {{ $nilai->nilai == 5 ? 'selected' : '' }}>Juz 1 - Juz 20</option>
                        <option value="6" {{ $nilai->nilai == 6 ? 'selected' : '' }}>Juz 1 - Juz 25</option>
                        <option value="7" {{ $nilai->nilai == 7 ? 'selected' : '' }}>Juz 1 - Juz 29</option>
                        @endif
                        @endforeach

                        @elseif($item->id == 4)
                        @foreach($nilais as $nilai)
                    @if($nilai->id_kriteria == 4)
                        <option value="5" {{ $nilai->nilai == 5 ? 'selected' : '' }}>Sangat Baik</option>
                        <option value="4" {{ $nilai->nilai == 4 ? 'selected' : '' }}>Baik</option>
                        <option value="3" {{ $nilai->nilai == 3 ? 'selected' : '' }}>Cukup</option>
                        <option value="2" {{ $nilai->nilai == 2 ? 'selected' : '' }}>Kurang</option>
                        <option value="1" {{ $nilai->nilai == 1 ? 'selected' : '' }}>Kurang Sekali</option>
                        @endif
                        @endforeach

                        @else
                        @foreach($nilais as $nilai)
                    @if($nilai->id_kriteria == 5)
                        <option value="1" {{ $nilai->nilai == 1 ? 'selected' : '' }}>Pelanggaran Berat</option>
                        <option value="2" {{ $nilai->nilai == 2 ? 'selected' : '' }}>Pelanggaran Sedang</option>
                        <option value="3" {{ $nilai->nilai == 3 ? 'selected' : '' }}>Pelanggaran Ringan</option>
                        @endif
                        @endforeach
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