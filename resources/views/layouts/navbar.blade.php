{{-- Navbar --}}
<nav class="navbar navbar-expand-lg py-3 fixed-top {{ Request::segment(1) == '' ? '' : 'bg-white shadow'}}">
    <div class="container">
        <a class="navbar-brand" href="/"> 
            <img src="{{ asset('assets/icons/ic-logoo.png') }}" height="55" width="55" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <style>
        .nav-item .nav-link.active {
            text-shadow:
                -1px -1px 0 #fff,  
                 1px -1px 0 #fff,
                -1px  1px 0 #fff,
                 1px  1px 0 #fff;  
            color: #000; /* Warna teks */
        }
    </style>
    </style>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('frontend.tentang') ? 'active' : '' }}" href="{{ route('frontend.tentang')}}">Tentang</a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ Route::is('frontend.prestasi') ? 'active' : '' }}" href="{{ route('frontend.prestasi') }}"> SPK Prestasi</a>
                </li>
                </ul>
            <div class="d-flex" role="search">
                @auth
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-dark">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-danger">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
{{-- Navbar --}}
