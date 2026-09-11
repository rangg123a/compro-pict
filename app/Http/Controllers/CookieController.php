<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function setSecureCookie()
    {
        // Parameter: (nama, nilai, menit_kedaluwarsa, path, domain, secure, httpOnly)
        Cookie::queue('preferensi_user', 'dark_mode', 60 * 24 * 30, null, null, true, true);
        
        return response()->json(['message' => 'Cookie aman berhasil disimpan!']);
    }
}