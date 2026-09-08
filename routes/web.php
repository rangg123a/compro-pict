<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiChatController;

// Halaman utama (landing page)
Route::view('/', 'welcome')->name('home');

// Halaman sesuai menu Navbar
Route::view('/our-tariffs', 'our-tariffs')->name('our-tariffs');
Route::view('/operations', 'operations')->name('operations');
Route::view('/services', 'services')->name('services');
Route::view('/sustainability', 'sustainability')->name('sustainability');

// Halaman pendukung lainnya
Route::view('/about', 'about')->name('about');
Route::post('/api/chat', [AiChatController::class, 'send'])->name('ai.chat');

// Contact
// Ubah rute /contact menjadi seperti ini:
Route::view('/contact', 'contact')->name('contact');

// Fallback rute untuk menangkap halaman yang belum dibuat
Route::fallback(function () {
    abort(404);
});