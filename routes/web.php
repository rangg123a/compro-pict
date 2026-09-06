<?php

use Illuminate\Support\Facades\Route;

// Halaman utama (landing page)
Route::view('/', 'welcome')->name('home');

// Halaman sesuai menu Navbar
Route::view('/cargo-handhelds', 'cargo-handhelds')->name('cargo-handhelds');
// Route::view('/operations', 'operations')->name('operations');
Route::view('/services', 'services')->name('services');
Route::view('/sustainability', 'sustainability')->name('sustainability');

// Halaman pendukung lainnya
Route::view('/about', 'about')->name('about');
Route::view('/location', 'location')->name('location');


// Contact
Route::view('/contact', 'contact')->name('contact');

// Fallback rute untuk menangkap halaman yang belum dibuat
Route::fallback(function () {
    abort(404);
});