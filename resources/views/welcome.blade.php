@extends('layouts.layout')

@section('content')
                <section id="hero" class="px-0">
            <div class="container text-center text-white">
                <div class="hero-title" data-aos="fade-up">
                    <div class="hero-text">Selamat Datang <br> Di Pesantren Darul Hijrah</div>
                    <h4>Pondok Pesantren Modern dengan Konsep ala Gontor</h4>
                </div>
            </div>
        </section>

        <section id="program" style="margin-top: -30px">
            <div class="container col-xxl-9">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
                        <div class="bg-white shadow rounded-3 p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p>Pendidikan <br> Berkualitas</p>
                            </div>
                            <img src="{{ asset('assets/icons/ic-book.png') }}" height="55" width="55" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
                        <div class="bg-white shadow rounded-3 p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p>Pendidikan <br> Berakhlak</p>
                            </div>
                            <img src="{{ asset('assets/icons/ic-globe.png') }}" height="55" width="55" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
                        <div class="bg-white shadow rounded-3 p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p>Pendidikan <br> Muamalah</p>
                            </div>
                            <img src="{{ asset('assets/icons/ic-neraca.png') }}" height="55" width="55" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
                        <div class="bg-white shadow rounded-3 p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p>Pendidikan <br> Teknologi</p>
                            </div>
                            <img src="{{ asset('assets/icons/ic-komputer.png') }}" height="55" width="55" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Berita --}}
        <section id="berita" class="py-5">
            <div class="container">

                <div class="header-berita text-center">
                    <h2 class="fw-bold">Kegiatan Pondok Pesantren</h2>
                </div>

                <div class="row py-5" data-aos="flip-up">
                    @foreach ($artikels as $item)
                    <div class="col-lg-4">
                        <div class="card border-0">
                            <img src="{{ asset('storage/artikel/' . $item->image) }}" class="img-fluid mb-3" alt="">
                            <div class="konten-berita">
                                <p class="mb-3 text-secondary">{{ $item->create_at }}</p>
                                <h4 class="fw-bold mb-3">{{ $item->judul }}</h4>
                                <p class="text-secondary">#pesantrenmoderen</p>
                                <a href="/detail/{{ $item->slug }}"
                                    class="text-decoration-none text-danger">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="footer-berita text-center">
                    <a href="/berita" class="btn btn-outline-danger">Berita Lainnya</a>
                </div>
            </div>
        </section>
        {{-- Berita --}}

        {{-- join --}}
        <section id="join" class="py-5" data-aos="flip-down">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="stripe me-2"></div>
                            <h5>Daftar Santri</h5>
                        </div>
                        <h1 class="fw-bold mb-2">Gabung bersama kami, mewujudkan generasi rabbani</h1>
                        <p class="mb-3">
                            Pesantren Darul Hijrah merupakan pesantren terbaik di Kalimantan Selatan
                            dengan meluluskan santri dan menjadi ustadz terkemuka mendakwahkan di pelosok
                            nusantara
                        </p>
                        <button class="btn btn-outline-danger">Register</button>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/li-bad.jpeg') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
        {{-- join --}}

        {{-- video --}}
        <section id="video" class="py-5">
            <div class="container col-xxl-6 py-5">
                <div class="text-center" data-aos="zoom-in">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/Noi7p7hDZXY?si=8gDrIYXi-dCp6ufI" 
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen></iframe>
                </div>
            </div>
        </section>
        {{-- video --}}

        <section id="video_youtube" class="py-5">
            <div class="container py-5">
                <div class="header-berita text-center">
                    <h2 class="fw-bold">Video Kegiatan Pondok Pesantren</h2>
                </div>

                <div class="row py-5" data-aos="zoom-in">
                    @foreach( $videos as $item )
                    <div class="col-lg-4">
                        <iframe width="100%" height="215" src="https://www.youtube.com/embed/{{ $item->youtube_code }}" 
                            title="YouTube video player" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" 
                            allowfullscreen></iframe>
                    </div>
                    @endforeach
                </div>

                <div class="footer-berita text-center">
                    <a href="" class="btn btn-outline-danger">Video Lainnya</a>
                </div>
            </div>
        </section>

        {{-- Foto --}}
        <section id="foto" class="section-foto parallax" data-aos="zoom-in-up">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div class="d-flex align-items-center">
                        <div class="stripe-putih me-2"></div>
                        <h5 class="fw-bold text-white">Foto Kegiatan</h5>
                    </div>
                    <div>
                        <a href="/foto" class="btn btn-outline-white">Foto lainnya</a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($photos as $photo)
                        <div class="col-lg-3 col-md-6 col-6">
                            <a class="image-link" href="{{ asset('storage/photo/' . $photo->image) }}">
                                <img src="{{ asset('storage/photo/' . $photo->image) }}" class="img-fluid" alt="">
                            </a>
                            <p>{{ $photo->judul }}</p>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </section>

        {{-- Fasilitas --}}

        <section id="fasilitas" class="py-5" data-aos="zoom-in-up">
            <div class="container py-5">
                <div class="text-center">
                    <h3 class="fw-bold">Fasilitas Pesantren</h3>
                </div>

                <img src="{{ asset('assets/images/li-fasilitas.jpeg') }}" class="img-fluid py-5" alt="">

                <div class="text-center">
                    <a href="" class="btn btn-outline-danger">Fasilitas Lainnya</a>
                </div>
            </div>
        </section>

@endsection


