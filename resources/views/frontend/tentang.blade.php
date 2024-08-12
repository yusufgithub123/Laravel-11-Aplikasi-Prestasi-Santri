@extends('layouts.layout')

@section('content')
<div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">beranda</a>
                <a href="#"><span></span> about me </a>
            </div>
        </div>
    </div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">beranda</a>
                <a href="#"><span></span> about me </a>
            </div>
        </div>
    </div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">beranda</a>
                <a href="#"><span></span> about me </a>
            </div>
        </div>
    </div>

    <header style="text-align: center;">
        <img src="assets/images/me.png" width="200" height="200" style="border-radius: 50%;" />
        <h1>Yusuf Alfarabi Natawiyanta</h1>
        Student of informatics engineering at Muhammadiyah University, Banjarmasin
    </header>

    <hr />
    <article style="text-align: center; max-width: 1000px; margin: 3em auto">
        <h2>Overview</h2>
        <table width="100%">
            <tr>

                    <p style="text-indent: 45px;">Website Pesantren merupakan website yang saya buat dengan menggunakan Framework Laravel 11,
                    dalam website ini, saya mengimplementasikan fungsi CRUD (Create, Read, Update, Delete) yang memungkinkan admin untuk membuat, membaca,
                    mengubah, dan menghapus data Santri. Admin dapat dengan mudah memasukkan informasi mengenai Prestasi Santri  </p>
                    <p style="text-indent: 45px;">Selain fungsionalitas CRUD, saya juga berusaha menciptakan tampilan yang menarik.
                     Untuk admin saya menggunakan bootsrap volt admin. Pada website ini juga terdapat
                    satu fitur sistem pendukung keputusan, yaitu menentukan Prestasi Santri menggunakan metode Sistem Additive Weighting (SAW).</p>
            </tr>
        </table>
    </article>



@endsection
