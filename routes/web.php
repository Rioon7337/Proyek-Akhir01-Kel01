<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\DestinasiController as AdminDestinasiController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\PenginapanController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController as PublicGaleriController;
use App\Http\Controllers\GeositeController;
use App\Http\Controllers\InformasiController as PublicInformasiController;
use App\Http\Controllers\KontakController;
// ==================== FRONTEND ROUTES ====================

// Home
Route::get('/', [DestinasiController::class, 'indexX'])->name('home');

// Destinasi Routes
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi');
Route::get('/destinasi/alam', [DestinasiController::class, 'alam'])->name('destinasi.alam');
Route::get('/destinasi/buatan', [DestinasiController::class, 'buatan'])->name('destinasi.buatan');
Route::get('/destinasi/budaya', [DestinasiController::class, 'budaya'])->name('destinasi.budaya');
Route::get('/destinasi/{slug}', [DestinasiController::class, 'detail'])->name('destinasi.detail');

// Informasi (Halaman Sejarah Caldera Toba)
Route::get('/informasi', [PublicInformasiController::class, 'index'])->name('informasi');

// Galeri Publik
Route::get('/galeri', [PublicGaleriController::class, 'index'])->name('galeri');

// Detail Galeri (pakai ID karena galeri tidak punya kolom slug)
Route::get('/galeri/{id}', [PublicGaleriController::class, 'show'])->name('galeri.detail');

// Berita Publik
Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita');

// Detail Berita
Route::get('/berita/{slug}', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.detail');

// UMKM
Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');

// Budaya
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');

// Kontak (tampilkan halaman)
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

// Kontak (kirim pesan → email admin)
Route::post('/kontak', [KontakController::class, 'kirim'])->name('kontak.kirim');
// ==================== GEOSITE ROUTES ====================
Route::get('/geosite/tuktuk', [GeositeController::class, 'tuktuk'])->name('geosite.tuktuk');
Route::get('/geosite/ambarita', [GeositeController::class, 'ambarita'])->name('geosite.ambarita');
Route::get('/geosite/tomok', [GeositeController::class, 'tomok'])->name('geosite.tomok');

// ==================== AUTH ROUTES ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Lupa Password — Step 1: Input Email
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendOtp'])->name('password.send-otp');

// Lupa Password — Step 2: Verifikasi OTP
Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])->name('password.verify-otp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

// Lupa Password — Step 3: Buat Password Baru
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset-form');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('galeri', GaleriController::class)->names('admin.galeri');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('informasi', InformasiController::class)->names('admin.informasi');
    Route::resource('destinasi', AdminDestinasiController::class)->names('admin.destinasi');
    Route::resource('umkm', UmkmController::class)->names('admin.umkm');
    Route::resource('penginapan', PenginapanController::class)->names('admin.penginapan');
    Route::resource('fasilitas', FasilitasController::class)->names('admin.fasilitas');
    Route::post('galeri/toggle-status/{id}', [GaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');



});