@extends('layouts.app')

@section('content')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-card {
            max-width: 600px;
            margin: 100px auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .profile-card .avatar-xl {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-top: -75px;
            border: 5px solid white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .profile-card .card-body {
            text-align: center;
        }
        .profile-card .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .profile-card .card-text {
            font-size: 1rem;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="card profile-card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <img src="{{ asset('storage/gambar/' . $alternatif->gambar) }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="{{ $alternatif->nama_santri }}">
            <h4 class="h3 mb-5">{{ $alternatif->nama_santri }}</h4>
            @foreach($data as $item)
                @if($item->id_kriteria == 1)
                    @if($item->nilai == 1)
                        <p class="text-gray text-start">Nilai Raport : Kurang dari 60</p>
                    @elseif($item->nilai == 2)
                        <p class="text-gray text-start">Nilai Raport : 60 - 70</p>
                    @elseif($item->nilai == 3)
                        <p class="text-gray text-start">Nilai Raport : 70 - 80</p>
                    @elseif($item->nilai == 4)
                        <p class="text-gray text-start">Nilai Raport : 80 - 90</p>
                    @else
                        <p class="text-gray text-start">Nilai Raport : 90 - 99</p>
                    @endif
                @endif

            @if($item->id_kriteria == 2)
                @if($item->nilai == 1)
                    <p class="text-gray text-start">Prestasi Akademik : Kurang Sekali</p>
                @elseif($item->nilai == 2)
                    <p class="text-gray text-start">Prestasi Akademik : Kurang</p>
                @elseif($item->nilai == 3)
                    <p class="text-gray text-start">Prestasi Akademik : Cukup</p>
                @elseif($item->nilai == 4)
                    <p class="text-gray text-start">Prestasi Akademik : Baik</p>
                @else
                    <p class="text-gray text-start">Prestasi Akademik : Sangat Baik</p>
                @endif
            @endif
                
            @if($item->id_kriteria == 3)
                @if($item->nilai == 1)
                    <p class="text-gray text-start">Hafalan : Juz 30</p>
                @elseif($item->nilai == 2)
                    <p class="text-gray text-start">Hafalan : Juz 1 - Juz 5</p>
                @elseif($item->nilai == 3)
                    <p class="text-gray text-start">Hafalan : Juz 1 - Juz 10</p>
                @elseif($item->nilai == 4)
                    <p class="text-gray text-start">Hafalan : Juz 1 - Juz 15</p>
                @elseif($item->nilai == 5)
                    <p class="text-gray text-start">Hafalan : Juz 1 - Juz 20</p>
                @elseif($item->nilai == 6)
                    <p class="text-gray text-start">Hafalan : Juz 1 - Juz 25</p>
                @else
                    <p class="text-gray text-start">Hafalan : Juz 1 - Juz 29</p>
                @endif
            @endif

            @if($item->id_kriteria == 4)
                @if($item->nilai == 1)
                    <p class="text-gray text-start">Sikap Spiritual : Kurang Sekali</p>
                @elseif($item->nilai == 2)
                    <p class="text-gray text-start">Sikap Spiritual : Kurang</p>
                @elseif($item->nilai == 3)
                    <p class="text-gray text-start">Sikap Spiritual : Cukup</p>
                @elseif($item->nilai == 4)
                    <p class="text-gray text-start">Sikap Spiritual : Baik</p>
                @else
                    <p class="text-gray text-start">Sikap Spiritual : Baik Sekali</p>
                @endif
            @endif

            @if($item->id_kriteria == 5)
                @if($item->nilai == 1)
                    <p class="text-gray text-start">Pelanggaran : Pelanggaran Berat</p>
                @elseif($item->nilai == 2)
                    <p class="text-gray text-start">Pelanggaran : Pelanggaran Sedang</p>
                @else
                    <p class="text-gray text-start">Pelanggaran : Pelanggaran Ringan</p>
                @endif
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection