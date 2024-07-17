<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\TravelRecommendationController;
use App\Http\Controllers\LayananController; // Add this line
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavItemController;
use App\Models\NavItem;
use App\Http\Controllers\DashboardController;

Route::get('/', [BeritaController::class, 'home'])->name('home');

Route::get('/admin', function () {
    // Admin dashboard
})->middleware('role:admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

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

Route::get('/admin_gallery', function () {
    return view('admin_gallery');
})->name('admin_gallery');

Route::get('/admin_navbar', function () {
    $navItems = NavItem::all(); // or NavItem::whereNull('parent_id')->get() if you only want top-level items
    return view('admin_navbar');
})->name('admin_navbar');


Route::get('/sekilas', function () {
    return view('sekilas');
})->name('sekilas');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/berita/listberita', [BeritaController::class, 'index'])->name('berita.listberita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');

Route::get('/admin/berita', [BeritaController::class, 'adminIndex'])->name('admin.berita.index');
Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
Route::post('/admin/berita/store', [BeritaController::class, 'store'])->name('admin.berita.store');
Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
Route::put('/admin/berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');


Route::get('/admin/pengumuman', [PengumumanController::class, 'adminIndex'])->name('admin.pengumuman.index');
Route::get('/admin/pengumuman/create', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
Route::post('/admin/pengumuman/store', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');
Route::get('/admin/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
Route::put('/admin/pengumuman/{id}', [PengumumanController::class, 'update'])->name('admin.pengumuman.update');
Route::delete('/admin/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('admin.pengumuman.destroy');

Route::get('/travel_recommendations/create', [TravelRecommendationController::class, 'create'])->name('travel_recommendations.create');
Route::post('/travel_recommendations', [TravelRecommendationController::class, 'store'])->name('travel_recommendations.store');
Route::get('travel_recommendations/{id}', [TravelRecommendationController::class, 'show'])->name('travel_recommendations.show');
Route::post('/admin/travel_recommendations', [TravelRecommendationController::class, 'store'])->name('admin.travel_recommendations.store');

Route::get('/admin/travel', [TravelRecommendationController::class, 'adminIndex'])->name('admin.travel.index');
Route::get('/admin/travel/create', [TravelRecommendationController::class, 'create'])->name('admin.travel.create');
Route::post('/admin/travel/store', [TravelRecommendationController::class, 'store'])->name('admin.travel.store');
Route::get('/admin/travel/{id}/edit', [TravelRecommendationController::class, 'edit'])->name('admin.travel.edit');
Route::put('/admin/travel/{id}', [TravelRecommendationController::class, 'update'])->name('admin.travel.update');
Route::delete('/admin/travel/{id}', [TravelRecommendationController::class, 'destroy'])->name('admin.travel.destroy');

// Add Layanan routes
Route::get('/layanans', [LayananController::class, 'index'])->name('layanans.index');
Route::get('/layanans/create', [LayananController::class, 'create'])->name('layanans.create');
Route::post('/layanans', [LayananController::class, 'store'])->name('layanans.store');
Route::get('/layanans/{id}', [LayananController::class, 'show'])->name('layanans.show');

Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
Route::get('/galleries/{id}', [GalleryController::class, 'show'])->name('galleries.show');
Route::post('/admin/galleries', [GalleryController::class, 'store'])->name('galleries.store');

// routes/web.php
Route::get('/navItems/create', [NavItemController::class, 'create'])->name('navItems.create');
Route::post('/navItems', [NavItemController::class, 'store'])->name('navItems.store');
Route::get('/navItems', [NavItemController::class, 'index'])->name('navItems.index');
Route::resource('/layouts/navbarhome', NavItemController::class);
Route::get('/admin_navbar', [NavItemController::class, 'index'])->name('admin_navbar');
Route::resource('navItems', NavItemController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';