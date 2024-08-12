<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('assets/icons/ic-logoo.ico') }}">

        <title>Pesantren Darul Hijrah</title>

{{-- Meta untuk tampil di Whatsapp --}}

    @if (Request::segment(1) == '')
    <meta property="og:title" content="Pesantren Darul Hijrah" />
    <meta name="description" content="Pesantren Moderan dengan Fasilitas Lengkap" />
    <meta property="og:url" content="http://pesantrenalhijrah.com" />
    <meta property="og:description" content="Pesantren Darul Hijrah" />
    <meta property="og:image" content="{{ asset('assets/icons/ic-logo.png') }}" />
    <meta property="og:type" content="article" />
    <title>Pesantren Al Hijrah</title>
    @elseif (Request::segment(1) == 'detail')
    <meta property="og:title" content="{{ $artikel->judul }}" />
    <meta name="description" content="{{ $artikel->judul }}" />
    <meta property="og:url" content="http://pesantrenalhijrah.com/detail/{{ $artikel->slug }}" />
    <meta property="og:description" content="{{ $artikel->judul }}" />
    @if ($artikel->image)
        <meta property="og:image" content="{{ asset('storage/artikel/' . $artikel->image) }}" />
    @else
        <meta property="og:image" content="{{ xasset('assets/icons/ic-logo.png') }}" />
    @endif
    <meta property="og:type" content="article" />

    <title>Pesantren Al Hijrah | {{ $artikel->title }}</title>
    @endif

{{-- Meta untuk tampil di Whatsapp --}}

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

            {{--ADS--}}
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

            {{-- Magnific --}}
            <link rel="stylesheet" href="{{asset('assets/css/magnific.css')}}">

            {{-- Summernote CSS di antara Head--}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Content --}}
    @yield('content')

            {{-- Footer --}}
            <section id="footer" class="bg-white" data-aos="zoom-out">
                <div class="container py-4">
                    <footer>
                        <div class="row">
                            {{-- kolom1 Navigasi--}}
                            <div class="col-12 col-md-3 mb-3">
                                <h5 class="fw-bold mb-3">Navigasi</h5>
                                <div class="d-flex">
                                    <ul class="nav flex-column me-5">
                                        <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-muted">Berita
                                            Sekolah</a>
                                        </li>
                                        <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-muted">Kegiatan
                                            Sekolah</a>
                                        </li>
                                        <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-muted">Gallery
                                            Sekolah</a>
                                        </li>
                                        <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-muted">Kegiatan
                                            Sosial</a>
                                        </li>
                                    </ul>
                                    <ul class="nav flex-column">
                                        <li class="nav-item mb-2"><a href="#"
                                            class="nav-link p-0 text-muted">Alumni</a>
                                        </li>
                                        <li class="nav-item mb-2"><a href="#"
                                            class="nav-link p-0 text-muted">Info PSB</a>
                                        </li>
                                        <li class="nav-item mb-2"><a href="/prestasi"
                                            class="nav-link p-0 text-muted">Prestasi</a>
                                        </li>
                                        <li class="nav-item mb-2"><a href="#"
                                            class="nav-link p-0 text-muted">Video Kegiatan</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
                            {{-- kolom2 Media Sosial --}}
    
                            <div class="col-12 col-md-3 mb-3">
                                <h5 class="fw-bold mb-3">Follow kami</h5>
                                <div class="d-flex mb-3">
                                    <a href="" target="_black" class="text-decoration-none text-dark">
                                        <img src="{{ asset("assets/icons/ig.png") }}" height="30" width="30"
                                        class="me-4" alt="">
                                    </a>
                                    <a href="" target="_black" class="text-decoration-none text-dark">
                                        <img src="{{ asset("assets/icons/fb.png") }}" height="30" width="30"
                                        class="me-4" alt="">
                                    </a>
                                    <a href="" target="_black" class="text-decoration-none text-dark">
                                        <img src="{{ asset("assets/icons/tk.png") }}" height="30" width="30"
                                        class="me-4" alt="">
                                    </a>
                                    <a href="" target="_black" class="text-decoration-none text-dark">
                                        <img src="{{ asset("assets/icons/yt.png") }}" height="30" width="30"
                                        class="me-4" alt="">
                                    </a>
                                </div>
                            </div>
    
                            {{-- Kolom3 Kontak --}}
    
                            <div class="col-12 col-md-3 mb-3">
                                <h5 class="font-inter fw-bold mb-3">Kontak kami</h5>
                                <ul class="nav-flex-column">
                                    <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">info@darulhijrah.sch.id</a>
                                    </li>
                                    <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">082159316546</a>
                                    </li>
                                    <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">087766554433</a>
                                    </li>
                                    <li class="nav-item mb-2"><a href="#"
                                        class="nav-link p-0 text-muted">087764532546</a>
                                    </li>
                                </ul>
                            </div>
    
                            {{-- kolom4  Alamat--}}
    
                            <div class="col-12 col-md-3 mb-3">
                                <h5 class="col-12 col-md-3 mb-3">Alamat Sekolah</h5>
                                <p>Jl.Cindai Alus,Martapura,Kalimantan Selatan</p>
                            </div>
    
                        </div>
                    </footer>
                </div>
            </section>
    
            <section class="bg-light border-top" data-aos="zoom-out">
                <div class="container py-4">
                    <div class="d-flex justify-content-between">
                        <div>
                            Pesantren Darul Hijrah
                        </div>
                        <div class="d-flex">
                            <p class="me-4">Syarat & Ketentuan</p>
                            <p>
                                <a href="/Kebijakan" class="text-decoration-none text-dark">Kebijakan privacy</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
            
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="{{asset('assets/js/magnific.js')}}"></script>
    
            {{-- JQUERY --}}
            {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script> --}}

            {{-- Summernote JS --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                $('#summernote').summernote({
                height: 200,
                });
            });

                const navbar = document.querySelector(".fixed-top");
                window.onscroll = () => {
                    if(window.scrollY > 100) {
                        navbar.classList.add("scroll-nav-active");
                        navbar.classList.add("text-nav-active");
                    } else {
                        navbar.classList.remove("scroll-nav-active");
                    }
                };
    
                //animasi aos
                AOS.init();

                //magnific
                $(document).ready(function() {
                    $('.image-link').magnificPopup({
                        type: 'image',
                        retina: {
                            ratie: 1,
                            replaceSrc: function(item, ratie) {
                                return item.src.replace(/\.\w+$/, function(m) {
                                    return '@2x' + m;
                                });
                            }
                        }
                    });
                });

            </script>
    
        </body>
    </html>