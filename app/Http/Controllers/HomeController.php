<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Pastikan model ini ada
use App\Models\Video;   // Pastikan model ini ada
use App\Models\Photo;
use App\Models\Artikel;
   

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data dari model
    // Ambil data artike
        $videos = Video::all();     // Ambil data video
        $photos = Photo::all();     // Ambil data foto

        // Mengirim data ke view
        return view('frontend.home', compact( 'videos','photos',));
    }
}
