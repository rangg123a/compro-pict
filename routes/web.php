<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiChatController;
use App\Http\Controllers\Tariffcontroller;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/set-cookie', function () {
    return response('Cookie set')->withCookie(
        cookie('secure_cookie', 'true', 60, '/', null, true, true)
    );
});

Route::view('/', 'welcome')->name('home');
Route::view('/our-tariffs', 'our-tariffs')->name('our-tariffs');
Route::view('/operations', 'operations')->name('operations');
Route::view('/services', 'services')->name('services');
Route::view('/sustainability', 'sustainability')->name('sustainability');

// Rute Publik Berita
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Rute Khusus Admin & Profile (Path Rahasia: /pict-internal-admin-portal)
// Jika belum login, otomatis dilarikan ke halaman login
Route::middleware(['auth'])->prefix('pict-internal-admin-portal')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // News Admin
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::view('/about', 'about')->name('about');
Route::post('/api/chat', [AiChatController::class, 'send'])->name('ai.chat');

Route::view('/contact', 'contact')->name('contact');

// Download Tariff PDF
Route::get('/tarif/download/domestik', [Tariffcontroller::class, 'downloadDomestik'])->name('tarif.download.domestik');
Route::get('/tarif/download/internasional', [Tariffcontroller::class, 'downloadInternasional'])->name('tarif.download.internasional');
Route::get('/tarif/download/others', [Tariffcontroller::class, 'downloadOthers'])->name('tarif.download.others');

// Fallback rute untuk menangkap halaman yang belum dibuat
Route::fallback(function () {
    abort(404);
});

require __DIR__.'/auth.php';