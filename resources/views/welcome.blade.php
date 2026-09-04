@extends('layouts.app')

@section('title', 'PT Patimban International Car Terminal — PICT')

@push('styles')
<style>
    .hero-bg {
        background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset('assets/images/pict-roro-bg.jpg') }}');
        background-size: cover;
        background-position: center;
    }
    .highlight-card { transition: transform .2s ease, box-shadow .2s ease; }
    .highlight-card:hover { transform: translateY(-4px); box-shadow: 0 10px 25px -5px rgba(15,23,42,0.1); }
</style>
@endpush

@section('content')

<!-- ═══ HERO SECTION ═══ -->
<div class="hero-bg min-h-[600px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-20 relative">

    <div class="max-w-4xl space-y-4">
        <h2 class="text-white text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
            PATIMBAN INTERNATIONAL <br>
            <span class="text-[#eab308]"> CAR TERMINAL</span>
        </h2>
        <p class="text-slate-200 max-w-xl leading-relaxed">
            Gerbang otomotif utama Indonesia — terminal roll-on/roll-off (Ro-Ro) modern di Pelabuhan
            Patimban, Jawa Barat.
        </p>
        <div class="flex gap-3 pt-2">
            <a href="{{ url('/about') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-6 rounded text-sm transition shadow-sm">
                TENTANG KAMI
            </a>
            <a href="{{ url('/contact') }}" class="inline-block bg-white/10 hover:bg-white/20 text-white font-bold py-3 px-6 rounded text-sm transition border border-white/30">
                HUBUNGI KAMI
            </a>
        </div>
    </div>

</div>

{{-- ═══ QUICK STATS ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-slate-50 border border-slate-100 rounded-xl p-6 text-center">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">400.000</p>
            <p class="text-slate-600 text-sm font-medium">Unit/Tahun Kapasitas Saat Ini</p>
        </div>
        <div class="bg-slate-50 border border-slate-100 rounded-xl p-6 text-center">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">600.000</p>
            <p class="text-slate-600 text-sm font-medium">Target Kapasitas</p>
        </div>
        <div class="bg-slate-50 border border-slate-100 rounded-xl p-6 text-center">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">300 <span class="text-base font-medium text-slate-500">m</span></p>
            <p class="text-slate-600 text-sm font-medium">Panjang Dermaga</p>
        </div>
        <div class="bg-slate-50 border border-slate-100 rounded-xl p-6 text-center">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">&plusmn;120 <span class="text-base font-medium text-slate-500">km</span></p>
            <p class="text-slate-600 text-sm font-medium">Dari Pusat Kota Jakarta</p>
        </div>
    </div>

</section>

{{-- ═══ HIGHLIGHTS / SITE MAP CARDS ═══ --}}
<section class="bg-slate-50 py-20">
    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-14">
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Explore PICT</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
                Kenali Lebih Jauh Terminal Kami
            </h3>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            <a href="{{ url('/about') }}" class="highlight-card block bg-white border border-slate-100 rounded-xl p-6">
                <h4 class="font-bold text-slate-900 text-lg mb-2">About PICT</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Profil perusahaan, sejarah, dan konsorsium pemegang saham PICT.</p>
            </a>

            <a href="{{ url('/facilities') }}" class="highlight-card block bg-white border border-slate-100 rounded-xl p-6">
                <h4 class="font-bold text-slate-900 text-lg mb-2">Terminal Facilities</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Infrastruktur dan fasilitas penunjang operasional terminal kendaraan.</p>
            </a>

            <a href="{{ url('/location') }}" class="highlight-card block bg-white border border-slate-100 rounded-xl p-6">
                <h4 class="font-bold text-slate-900 text-lg mb-2">Strategic Location</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Lokasi strategis di Pelabuhan Patimban dan aksesibilitasnya.</p>
            </a>

            <a href="{{ url('/services') }}" class="highlight-card block bg-white border border-slate-100 rounded-xl p-6">
                <h4 class="font-bold text-slate-900 text-lg mb-2">Ro-Ro Services</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Layanan bongkar muat dan distribusi kendaraan yang kami sediakan.</p>
            </a>

            <a href="{{ url('/tariffs') }}" class="highlight-card block bg-white border border-slate-100 rounded-xl p-6">
                <h4 class="font-bold text-slate-900 text-lg mb-2">Our Tariffs</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Struktur tarif layanan terminal yang transparan dan kompetitif.</p>
            </a>

            <a href="{{ url('/sustainability') }}" class="highlight-card block bg-white border border-slate-100 rounded-xl p-6">
                <h4 class="font-bold text-slate-900 text-lg mb-2">Sustainability</h4>
                <p class="text-slate-600 text-sm leading-relaxed">Komitmen kami terhadap lingkungan, keselamatan, dan masyarakat sekitar.</p>
            </a>

        </div>

    </div>
</section>

{{-- ═══ LOCATION STRIP ═══ --}}
<section class="bg-blue-900 py-14">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-white text-2xl font-extrabold mb-2 tracking-tight">Lokasi Strategis</h4>
            <p class="text-slate-300 font-medium">Pelabuhan Patimban, Pusakanagara, Subang, Jawa Barat, Indonesia</p>
        </div>
        <a href="{{ url('/location') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-8 rounded text-sm transition shadow-sm">
            LIHAT PETA LOKASI
        </a>
    </div>
</section>

@endsection