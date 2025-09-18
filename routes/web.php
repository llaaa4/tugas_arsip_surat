<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk halaman utama, menampilkan daftar surat
Route::get('/', [SuratController::class, 'index'])->name('surat.index');

// Route untuk semua fungsi CRUD surat (tambah, simpan, lihat, edit, update, hapus)
Route::resource('surat', SuratController::class);

// Route untuk semua fungsi CRUD kategori
Route::resource('kategori', KategoriController::class);

// Route untuk halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');