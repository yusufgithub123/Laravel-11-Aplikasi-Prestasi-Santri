@extends('layouts.app')

@section('content')
<div class="row py-4">
    <div>
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Tambah Data Santri</h2>
            <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="nama_santri">Nama Santri</label>
                            <input class="form-control @error('nama_santri') is-invalid @enderror" id="nama_santri" type="text" placeholder="Nama" name="nama_santri" required value="{{ old('nama_santri', $alternatif->nama_santri)  }}">
                        </div>
                        @error('nama_santri')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="nisn">NISN</label>
                            <input class="form-control @error('nisn') is-invalid @enderror" id="nisn" type="text" placeholder="NISN" name="nisn" required value="{{ old('nisn', $alternatif->nisn)  }}">
                        </div>
                        @error('nisn')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                        <label for="alamat">Alamat</label>
                        <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" type="text" placeholder="Alamat"  name="alamat" required value="{{ old('alamat', $alternatif->alamat)  }}">
                    </div>
                    @error('alamat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    <div class="col-md-6 mb-3">
                        <label for="tingkatan_kelas">Tingkatan Kelas</label>
                        <select class="form-select mb-0 @error('tingkatan_kelas') is-invalid @enderror" id="tingkatan_kelas" name="tingkatan_kelas" aria-label="Pilih salah satu tingkatan kelas">
                            <option value="SMP" {{ $alternatif->tingkatan_kelas == 'SMP' ? 'selected' : '' }}>SMP (Sekolah Menengah Pertama)</option>
                            <option value="MTs" {{ $alternatif->tingkatan_kelas == 'MTs' ? 'selected' : '' }}>MTs (Madrasah Tsanawiyah )</option>
                            <option value="SMA" {{ $alternatif->tingkatan_kelas == 'SMA' ? 'selected' : '' }}>SMA (Sekolah Menengah Atas)</option>
                            <option value="MA" {{ $alternatif->tingkatan_kelas == 'MA' ? 'selected' : '' }}>MA (Madrasah Aliyah)</option>
                        </select>
                    </div>
                    @error('tingkatan_kelas')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" type="text" placeholder="Nama Ayah" name="nama_ayah" required value="{{ old('nama_ayah', $alternatif->nama_ayah) }}">
                        </div>
                        @error('nama_ayah')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" type="text" placeholder="Nama Ibu" name="nama_ibu" required value="{{ old('nama_ibu', $alternatif->nama_ibu) }}">
                        </div>
                        @error('nama_ibu')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>             
                <div class-="col-12">
                    <div class="card card-body border-0 shadow mb-4">
                        <h2 class="h5 mb-4">Pilih Gambar</h2>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="rounded avatar-xl" src="{{ asset('storage/gambar/'.$alternatif->gambar) }}" alt="change avatar">
                                </div>
                            <div class="file-field">
                                <div class="d-flex justify-content-xl-center ms-xl-3">
                                    <div class="d-flex">
                                        <svg class="icon text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path></svg>
                                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                                            <div class="d-md-block text-left">
                                                <div class="fw-normal text-dark mb-1">Choose Image</div>
                                                <div class="text-gray small">JPG, JPEG or PNG. Max size of 2 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('gambar')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>                                        
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection