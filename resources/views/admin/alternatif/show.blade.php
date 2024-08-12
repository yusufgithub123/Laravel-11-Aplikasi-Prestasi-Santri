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
                    <p class="text-gray text-start">NISN : {{ $alternatif->nisn }}</p>
                    <p class="text-gray text-start">Alamat : {{ $alternatif->alamat }}</p>
                    <p class="text-gray text-start">Tingkatan Kelas : {{ $alternatif->tingkatan_kelas }}</p>
                    <p class="text-gray text-start">Nama Ayah : {{ $alternatif->nama_ayah }}</p>
                    <p class="text-gray text-start">Nama Ibu : {{ $alternatif->nama_ibu }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection