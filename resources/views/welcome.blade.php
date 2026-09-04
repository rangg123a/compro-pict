@extends('layouts.app')

@section('title', 'PT Patimban International Car Terminal — PICT')

@push('styles')
<style>
    .hero-image {
        background-image: url('{{ asset('assets/images/pict-roro-bg.jpg') }}');
        background-size: cover;
        background-position: center;
    }
    .custom-card { 
        transition: all .3s ease; 
        border-left: 4px solid transparent;
    }
    .custom-card:hover { 
        transform: translateX(5px); 
        border-left: 4px solid #dc2626; 
        box-shadow: 0 10px 25px -5px rgba(30, 58, 138, 0.15); 
    }
</style>
@endpush

@section('content')

<!-- ═══ SPLIT HERO SECTION ═══ -->
<div class="flex flex-col lg:flex-row min-h-[75vh]">
    <!-- Kiri: Text Content (Biru Tua) -->
    <div class="lg:w-1/2 bg-blue-950 flex flex-col items-start justify-center px-8 md:px-16 py-20 relative">
        <!-- Elemen Dekoratif -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-red-600 rounded-bl-full opacity-20"></div>
        
        <div class="max-w-xl space-y-6 z-10 relative">
            <span class="text-red-500 font-bold tracking-widest text-sm uppercase">Gerbang Otomotif Utama</span>
            <h2 class="text-white text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
                PATIMBAN <br> INTERNATIONAL <br>
                <span class="text-red-500">CAR TERMINAL</span>
            </h2>
            <p class="text-blue-100 max-w-lg leading-relaxed text-lg border-l-2 border-red-500 pl-4">
                Terminal roll-on/roll-off (Ro-Ro) modern kelas dunia yang berlokasi strategis di Pelabuhan Patimban, Jawa Barat.
            </p>
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="{{ url('/about') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded shadow-lg transition">
                    TENTANG KAMI
                </a>
                <a href="{{ url('/contact') }}" class="inline-block bg-transparent hover:bg-blue-900 text-white font-bold py-3 px-8 rounded border border-blue-400 transition">
                    HUBUNGI KAMI
                </a>
            </div>
        </div>
    </div>
    
    <!-- Kanan: Image Section -->
    <div class="lg:w-1/2 hero-image relative min-h-[400px] lg:min-h-full">
        <!-- Overlay Gradien untuk blend dengan bagian kiri -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-950 via-transparent to-transparent hidden lg:block"></div>
        <div class="absolute inset-0 bg-blue-900/30 mix-blend-multiply"></div>
    </div>
</div>

{{-- ═══ STATISTIK FLOATING CARDS ═══ --}}
<section class="max-w-7xl mx-auto px-6 -mt-12 relative z-20 hidden md:block">
    <div class="bg-white rounded-2xl shadow-xl p-8 grid grid-cols-4 divide-x divide-slate-200 border-t-4 border-red-600">
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">400<span class="text-red-600 text-2xl">k</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Kapasitas (Unit/Thn)</p>
        </div>
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">600<span class="text-red-600 text-2xl">k</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Target Eksekusi</p>
        </div>
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">300<span class="text-slate-400 text-xl ml-1">m</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Panjang Dermaga</p>
        </div>
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">&plusmn;120<span class="text-slate-400 text-xl ml-1">km</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Dari Jakarta</p>
        </div>
    </div>
</section>

{{-- ═══ ASYMMETRICAL HIGHLIGHTS ═══ --}}
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-end mb-14 gap-6">
            <div>
                <span class="text-red-600 font-bold tracking-widest text-sm uppercase">Explore PICT</span>
                <h3 class="text-3xl md:text-5xl font-extrabold text-blue-950 mt-3 tracking-tight">
                    Fasilitas & Layanan
                </h3>
            </div>
            <a href="{{ url('/services') }}" class="text-blue-900 font-bold hover:text-red-600 flex items-center gap-2 transition">
                Lihat Semua Layanan <span class="text-xl">&rarr;</span>
            </a>
        </div>

        <!-- Grid Asimetris -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card Besar (Span 2 Kolom) -->
            <a href="{{ url('/about') }}" class="custom-card md:col-span-2 bg-blue-900 text-white rounded-2xl p-8 md:p-12 relative overflow-hidden group">
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-red-600 rounded-full opacity-10 group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <h4 class="font-extrabold text-3xl mb-4 text-white">About PICT</h4>
                    <p class="text-blue-200 text-lg leading-relaxed max-w-lg">
                        Mengenal lebih dekat profil perusahaan, rekam jejak sejarah, hingga konsorsium pemegang saham di balik operasional terminal kami.
                    </p>
                </div>
            </a>

            <!-- Card Standar -->
            <a href="{{ url('/facilities') }}" class="custom-card bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-red-50 text-red-600 flex items-center justify-center rounded-lg mb-6 font-bold text-xl">01</div>
                <h4 class="font-bold text-blue-950 text-xl mb-3">Terminal Facilities</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Infrastruktur dan fasilitas penunjang operasional terminal kendaraan berstandar internasional.</p>
            </a>

            <a href="{{ url('/location') }}" class="custom-card bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-red-50 text-red-600 flex items-center justify-center rounded-lg mb-6 font-bold text-xl">02</div>
                <h4 class="font-bold text-blue-950 text-xl mb-3">Strategic Location</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Lokasi strategis di Pelabuhan Patimban yang mempermudah rantai pasok industri.</p>
            </a>

            <a href="{{ url('/tariffs') }}" class="custom-card bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-red-50 text-red-600 flex items-center justify-center rounded-lg mb-6 font-bold text-xl">03</div>
                <h4 class="font-bold text-blue-950 text-xl mb-3">Our Tariffs</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Struktur tarif kompetitif dengan transparansi biaya bongkar muat.</p>
            </a>

            <a href="{{ url('/sustainability') }}" class="custom-card bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-red-50 text-red-600 flex items-center justify-center rounded-lg mb-6 font-bold text-xl">04</div>
                <h4 class="font-bold text-blue-950 text-xl mb-3">Sustainability</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Komitmen operasional hijau untuk lingkungan, keselamatan, dan masyarakat.</p>
            </a>

        </div>
    </div>
</section>

{{-- ═══ LOCATION STRIP ═══ --}}
<section class="bg-red-600 py-16 relative overflow-hidden">
    <!-- Motif Diagonal Latar -->
    <div class="absolute inset-0 bg-red-700 transform skew-x-12 translate-x-1/3 z-0"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
        <div>
            <h4 class="text-white text-3xl font-extrabold mb-2 tracking-tight">Kunjungi Lokasi Kami</h4>
            <p class="text-red-100 font-medium text-lg">Pelabuhan Patimban, Pusakanagara, Subang, Jawa Barat, Indonesia</p>
        </div>
        <a href="{{ url('/location') }}" class="inline-block bg-blue-950 hover:bg-blue-900 text-white font-bold py-4 px-10 rounded-lg text-sm transition shadow-xl whitespace-nowrap">
            LIHAT PETA LOKASI
        </a>
    </div>
</section>

@endsection