<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;

Route::get('/', function () {
    $latestNews = \App\Models\News::where('status', 'published')->latest()->take(3)->get();
    $popup = \App\Models\Popup::where('is_active', true)->first();

    return view('home', compact('latestNews', 'popup'));
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

Route::get('/registrasiadmin', [AuthController::class, 'showAdminRegisterForm'])->name('admin.register');
Route::post('/registrasiadmin', [AuthController::class, 'registerAdmin']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN ROUTES
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('programs', \App\Http\Controllers\Admin\ProgramController::class);
    Route::get('/donations', [\App\Http\Controllers\Admin\DonationController::class, 'index'])->name('donations.index');
    Route::delete('/donations/{donation}', [\App\Http\Controllers\Admin\DonationController::class, 'destroy'])->name('donations.destroy');
    Route::resource('distributions', \App\Http\Controllers\Admin\DistributionController::class);
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('popups', \App\Http\Controllers\Admin\PopupController::class)->only(['index', 'store']);

    Route::middleware([\App\Http\Middleware\SuperAdminMiddleware::class])->group(function () {
        Route::resource('admins', \App\Http\Controllers\Admin\AdminManagementController::class);
    });

    Route::get('reports/users', [\App\Http\Controllers\Admin\ReportController::class, 'users'])->name('reports.users');
    Route::post('reports/users/{user}/reset-password', [\App\Http\Controllers\Admin\ReportController::class, 'resetPassword'])->name('reports.users.reset_password');

    // EXPORT EXCEL ROUTES
    Route::get('export/users', [\App\Http\Controllers\Admin\ExportController::class, 'exportUsers'])->name('export.users');
    Route::get('export/donations', [\App\Http\Controllers\Admin\ExportController::class, 'exportDonations'])->name('export.donations');
    Route::get('export/distributions', [\App\Http\Controllers\Admin\ExportController::class, 'exportDistributions'])->name('export.distributions');
    Route::get('export/programs', [\App\Http\Controllers\Admin\ExportController::class, 'exportPrograms'])->name('export.programs');
    Route::get('export/news', [\App\Http\Controllers\Admin\ExportController::class, 'exportNews'])->name('export.news');
});

// PROTECTED ROUTES (harus login)
Route::middleware('auth')->group(function () {
    Route::get('/donasi', [DonationController::class, 'index'])->name('donation.index');
    Route::get('/donasi/form', [DonationController::class, 'form'])->name('donation.form');
    Route::post('/donasi/form', [DonationController::class, 'store'])->name('donation.store');
    Route::get('/donasi/invoice/{code}', [DonationController::class, 'invoice'])->name('donation.invoice');

    // PROFILE ROUTES
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [AuthController::class, 'updatePassword'])->name('profile.password');
});