<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\TravelRecommendationController;
use App\Http\Controllers\LayananController; // Add this line
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EventController;

Route::get('/', [BeritaController::class, 'home'])->name('home');

Route::get('/admin', function () {
    // Admin dashboard
})->middleware('role:admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/berita/listberita', [BeritaController::class, 'index'])->name('berita.listberita');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');

Route::get('/admin/berita', [BeritaController::class, 'adminIndex'])->name('admin.berita.index');
Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
Route::post('/admin/berita/store', [BeritaController::class, 'store'])->name('admin.berita.store');
Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
Route::put('/admin/berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');


Route::get('/admin/pengumuman', [PengumumanController::class, 'adminIndex'])->name('admin.pengumuman.index');
Route::get('/admin/pengumuman/create', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
Route::post('/admin/pengumuman/store', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');
Route::get('/admin/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
Route::put('/admin/pengumuman/{id}', [PengumumanController::class, 'update'])->name('admin.pengumuman.update');
Route::delete('/admin/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('admin.pengumuman.destroy');

Route::get('/travel_recommendations/create', [TravelRecommendationController::class, 'create'])->name('travel_recommendations.create');
Route::post('/travel_recommendations', [TravelRecommendationController::class, 'store'])->name('travel_recommendations.store');
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

Route::get('/admin/layanan', [LayananController::class, 'adminIndex'])->name('admin.layanan.index');
Route::get('/admin/layanan/create', [LayananController::class, 'create'])->name('admin.layanan.create');
Route::post('/admin/layanan/store', [LayananController::class, 'store'])->name('admin.layanan.store');
Route::get('/admin/layanan/{id}/edit', [LayananController::class, 'edit'])->name('admin.layanan.edit');
Route::put('/admin/layanan/{id}', [LayananController::class, 'update'])->name('admin.layanan.update');
Route::delete('/admin/layanan/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');

Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
Route::get('/galleries/{id}', [GalleryController::class, 'show'])->name('galleries.show');
Route::post('/admin/galleries', [GalleryController::class, 'store'])->name('galleries.store');

Route::get('admin/galeri', [GalleryController::class, 'adminIndex'])->name('admin.galeri.index');
Route::get('admin/galeri/create', [GalleryController::class, 'create'])->name('admin.galeri.create');
Route::post('admin/galeri', [GalleryController::class, 'store'])->name('admin.galeri.store');
Route::get('admin/galeri/{id}/edit', [GalleryController::class, 'edit'])->name('admin.galeri.edit');
Route::put('admin/galeri/{id}', [GalleryController::class, 'update'])->name('admin.galeri.update');
Route::delete('admin/galeri/{id}', [GalleryController::class, 'destroy'])->name('admin.galeri.destroy');
Route::delete('admin/galeri', [GalleryController::class, 'destroyAll'])->name('admin.galeri.destroyAll');

Route::get('/admin/navbar', [NavItemController::class, 'adminIndex'])->name('admin.navbar.index');
Route::get('/admin/navbar/create', [NavItemController::class, 'create'])->name('admin.navbar.create');
Route::post('/admin/navbar/store', [NavItemController::class, 'store'])->name('admin.navbar.store');
Route::get('/admin/navbar/{id}/edit', [NavItemController::class, 'edit'])->name('admin.navbar.edit');
Route::put('/admin/navbar/{id}', [NavItemController::class, 'update'])->name('admin.navbar.update');
Route::delete('/admin/navbar/{id}', [NavItemController::class, 'destroy'])->name('admin.navbar.destroy');

Route::get('/admin/event', [EventController::class, 'adminIndex'])->name('admin.event.index');
Route::get('/admin/event/create', [EventController::class, 'create'])->name('admin.event.create');
Route::post('/admin/event/store', [EventController::class, 'store'])->name('admin.event.store');
Route::get('/admin/event/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
Route::put('/admin/event/{id}', [EventController::class, 'update'])->name('admin.event.update');
Route::delete('/admin/event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
Route::get('/admin/event/show', [EventController::class, 'show'])->name('admin.event.show');

Route::get('/content/{id}', [BeritaController::class, 'show'])->name('content.show');

Route::get('/berita', [ContentController::class, 'listBerita'])->name('content.list_berita');
Route::get('/galeri',[ContentController::class, 'listGaleri'])->name('content.list_galeri');
Route::get('/pengumuman', [ContentController::class, 'listPengumuman'])->name('content.list_pengumuman');
Route::get('/travel', [ContentController::class, 'listTravel'])->name('content.list_travel');
Route::get('/otherBerita', [ContentController::class, 'listOtherBerita'])->name('content.list_otherBerita');
Route::get('/content/{type}/{id}', [ContentController::class, 'show'])->name('content.show');

// routes/web.php
Route::get('/navItems/create', [NavItemController::class, 'create'])->name('navItems.create');
Route::post('/navItems', [NavItemController::class, 'store'])->name('navItems.store');
Route::get('/navItems', [NavItemController::class, 'index'])->name('navItems.index');
Route::resource('/layouts/navbarhome', NavItemController::class);
Route::get('/admin_navbar', [NavItemController::class, 'index'])->name('admin_navbar');
Route::resource('navItems', NavItemController::class);

Route::resource('navItems', NavItemController::class);
Route::get('navItems/createContent', [NavItemController::class, 'createContent'])->name('navItems.createContent');
Route::post('navItems/storeContent', [NavItemController::class, 'storeContent'])->name('navItems.storeContent');
Route::get('content/{content}', [NavItemController::class, 'showContent'])->name('content.show');

Route::get('/admin_create_content', function () {
    return view('admin_create_content');
})->name('admin_create_content');

Route::get('/berita', [ContentController::class, 'listBerita'])->name('berita.list');
Route::get('/pengumuman', [ContentController::class, 'listPengumuman'])->name('pengumuman.list');
Route::get('/travel', [ContentController::class, 'listTravel'])->name('travel.list');
Route::get('/{type}/{id}', [ContentController::class, 'show'])->name('content.show');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';