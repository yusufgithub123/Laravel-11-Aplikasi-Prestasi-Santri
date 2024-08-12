<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\TentangController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/kriteria', [AdminController::class, 'kriteria'])->name('kriteria');
Route::get('/perhitungan', [ProsesController::class, 'index'])->name('perhitungan');
Route::resource('/alternatif', implode([AlternatifController::class]));
Route::resource('/nilai', implode([NilaiController::class]));
Route::get('/perangkingan', [RankingController::class, 'index'])->name('perangkingan');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('frontend.prestasi');
Route::get('/tentang', [TentangController::class, 'index'])->name('frontend.tentang');


