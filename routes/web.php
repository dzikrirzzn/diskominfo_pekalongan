<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin', function () {
    // Admin dashboard
})->middleware('role:admin');

Route::get('/admin_berita', function () {
    return view('admin_berita');
})->name('admin_berita');

Route::get('/admin_pengumuman', function () {
    return view('admin_pengumuman');
})->name('admin_pengumuman');

// Route::get('/berita/listberita', function () {
//     return view('berita/listberita');
// })->name('berita/listberita');

Route::get('/sekilas', function () {
    return view('sekilas');
})->name('sekilas');

// Route::get('/berita/berita_content', function () {
//     return view('berita/berita_content');
// })->name('berita/berita_content');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route untuk menampilkan halaman index berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.listberita');
Route::get('/', [BeritaController::class, 'home'])->name('home');

Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// Route untuk menyimpan berita baru
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');

// Route untuk pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';