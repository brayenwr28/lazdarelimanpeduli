<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;

Route::get('/', function () {
    $latestNews = \App\Models\News::where('status', 'published')->latest()->take(3)->get();

    return view('home', compact('latestNews'));
});

Route::view('/tentang', 'tentang');

Route::get('/program', [\App\Http\Controllers\ProgramController::class, 'index']);
Route::get('/program/{id}', [\App\Http\Controllers\ProgramController::class, 'show'])->name('program.show');

Route::view('/artikel', 'artikel');

Route::view('/kontak', 'kontak');
Route::view('/tentang/kontak', 'kontak');

Route::view('/layanan', 'layanan');
Route::view('/layanan/konsultasi', 'layanan.konsultasi');
Route::view('/layanan/jemput', 'layanan.jemput');
Route::view('/layanan/konfirmasi', 'layanan.konfirmasi');

Route::view('/penyaluran', 'penyaluran');
Route::view('/penyaluran/laporan', 'penyaluran.laporan');
Route::view('/penyaluran/dokumentasi', 'penyaluran.dokumentasi');

Route::view('/tentang/laporan', 'tentang.laporan');

Route::view('/edukasi', 'edukasi');

Route::get('/berita', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

// AUTH ROUTES
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN ROUTES
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('programs', \App\Http\Controllers\Admin\ProgramController::class);
    Route::get('/donations', [\App\Http\Controllers\Admin\DonationController::class, 'index'])->name('donations.index');
    Route::resource('distributions', \App\Http\Controllers\Admin\DistributionController::class);
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('popups', \App\Http\Controllers\Admin\PopupController::class)->only(['index', 'store']);
});

// PROTECTED ROUTES (harus login)
Route::middleware('auth')->group(function () {
    Route::get('/donasi', [DonationController::class, 'index'])->name('donation.index');
    Route::get('/donasi/form', [DonationController::class, 'form'])->name('donation.form');
    Route::post('/donasi/form', [DonationController::class, 'store'])->name('donation.store');
    Route::get('/donasi/invoice/{code}', [DonationController::class, 'invoice'])->name('donation.invoice');
});