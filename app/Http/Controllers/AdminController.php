<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }
    
    public function kriteria(){
        $kriteria = Kriteria::all();
        return view('admin.kriteria.index', compact('kriteria'));
    }
}
