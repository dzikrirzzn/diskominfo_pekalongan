<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\TravelRecommendationController;
use App\Http\Controllers\LayananController; // Add this line
use Illuminate\Support\Facades\Route;

Route::get('/', [BeritaController::class, 'home'])->name('home');

Route::get('/admin', function () {
    // Admin dashboard
})->middleware('role:admin');

Route::get('/admin_berita', function () {
    return view('admin_berita');
})->name('admin_berita');

Route::get('/admin_pengumuman', function () {
    return view('admin_pengumuman');
})->name('admin_pengumuman');

Route::get('/admin_travel', function () {
    return view('admin_travel');
})->name('admin_travel');

Route::get('/admin_layanan', function () {
    return view('admin_layanan');
})->name('admin_layanan');

Route::get('/sekilas', function () {
    return view('sekilas');
})->name('sekilas');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.listberita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');

Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');

Route::get('/travel_recommendations/create', [TravelRecommendationController::class, 'create'])->name('travel_recommendations.create');
Route::post('/travel_recommendations', [TravelRecommendationController::class, 'store'])->name('travel_recommendations.store');
Route::get('travel_recommendations/{id}', [TravelRecommendationController::class, 'show'])->name('travel_recommendations.show');
Route::post('/admin/travel_recommendations', [TravelRecommendationController::class, 'store'])->name('admin.travel_recommendations.store');

// Add Layanan routes
Route::get('/layanans', [LayananController::class, 'index'])->name('layanans.index');
Route::get('/layanans/create', [LayananController::class, 'create'])->name('layanans.create');
Route::post('/layanans', [LayananController::class, 'store'])->name('layanans.store');
Route::get('/layanans/{id}', [LayananController::class, 'show'])->name('layanans.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';