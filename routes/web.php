<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiChatController;
use App\Http\Controllers\Tariffcontroller;

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

Route::view('/about', 'about')->name('about');
Route::post('/api/chat', [AiChatController::class, 'send'])->name('ai.chat');

Route::view('/contact', 'contact')->name('contact');

// Download Tariff PDF
Route::get('/tarif/download/domestik', [Tariffcontroller::class, 'downloadDomestik'])->name('tarif.download.domestik');
Route::get('/tarif/download/internasional', [Tariffcontroller::class, 'downloadInternasional'])->name('tarif.download.internasional');

// Fallback rute untuk menangkap halaman yang belum dibuat
Route::fallback(function () {
    abort(404);
});