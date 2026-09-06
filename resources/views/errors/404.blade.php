@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan — PT Patimban International Car Terminal')

@section('content')
<div class="relative w-full min-h-[75vh] flex items-center justify-center bg-slate-950 text-white px-4">
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40 z-0"></div>
    
    <div class="relative z-10 max-w-xl text-center space-y-6">

        <h1 class="text-4xl sm:text-6xl font-black tracking-tight leading-tight">
            Halaman Belum <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-rose-400">Tersedia</span>
        </h1>

        <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
            Maaf, halaman yang Anda tuju sedang dalam tahap pengembangan atau tautan yang Anda akses sudah tidak berlaku.
        </p>

        <div class="pt-4 flex justify-center">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-red-600/30 transition transform hover:-translate-y-0.5 text-sm">
                <span>Back to home</span>
            </a>
        </div>
    </div>
</div>
@endsection