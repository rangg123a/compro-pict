<?php

use Illuminate\Support\Facades\Route;

// Halaman utama (landing page)
Route::view('/', 'welcome')->name('home');

// Halaman-halaman yang direferensikan navbar
Route::view('/about', 'about')->name('about');
Route::view('/facilities', 'facilities')->name('facilities');
Route::view('/location', 'location')->name('location');
Route::view('/services', 'services')->name('services');
Route::view('/tariffs', 'tariffs')->name('tariffs');
Route::view('/sustainability', 'sustainability')->name('sustainability');
Route::view('/news', 'news')->name('news');

// Contact — GET untuk tampilkan form, POST untuk kirim pesan
Route::view('/contact', 'contact')->name('contact');
