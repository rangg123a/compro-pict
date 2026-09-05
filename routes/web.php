<?php

use Illuminate\Support\Facades\Route;

// Halaman utama (landing page)
Route::view('/', 'welcome')->name('home');

// Halaman sesuai menu Navbar
Route::view('/cargo-handling', 'cargo-handling')->name('cargo-handling');
Route::view('/operations', 'operations')->name('operations');
Route::view('/services', 'services')->name('services');
Route::view('/sustainability', 'sustainability')->name('sustainability');

// Halaman pendukung lainnya
Route::view('/about', 'about')->name('about');
Route::view('/location', 'location')->name('location');
Route::view('/tariffs', 'tariffs')->name('tariffs');
Route::view('/news', 'news')->name('news');

// Contact
Route::view('/contact', 'contact')->name('contact');