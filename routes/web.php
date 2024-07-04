<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin', function () {
    // Admin dashboard
})->middleware('role:admin');

Route::get('/admin_berita', function () {
    return view('admin_berita');
})->name('admin_berita');

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



// Route untuk menyimpan berita baru
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');

Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';