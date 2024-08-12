<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Photo;

class AppController extends Controller
{
    public function index()
    {
        return view('home', [
            'artikels' => Blog::orderBy('id', 'desc')->limit(3)->get(),
            'videos' => Video::orderBy('id', 'desc')->limit(3)->get(),
            'photos' => Photo::orderBy('id', 'desc')->limit(4)->get(),
        ]);
    }

    public function berita()
    {
        return view('frontend.berita.index', [
            'artikels' => Blog::orderBy('id', 'desc')->get()
        ]);
    }

    public function detail($slug)
    {
        $artikel = Blog::where('slug', $slug)->first();
        return view('frontend.berita.detail', [
            'artikel' => $artikel
        ]);
    }
}
