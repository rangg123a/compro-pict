@extends('layouts.app')

@section('title', 'PT Patimban International Car Terminal — PICT')

@push('styles')
<style>
    .hero-image {
        background-image: url('{{ asset("assets/images/background.png") }}');
        background-size: cover;
        background-position: center;
        animation: heroZoom 14s ease-out both;
        overflow: hidden;
    }
    .hero-image::after {
        content: '';
        position: absolute;
        inset: -20% -35%;
        width: 38%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .42), rgba(147, 197, 253, .2), transparent);
        filter: blur(12px);
        transform: skewX(-20deg) translateX(-220%);
        animation: lightSweep 5s ease-in-out infinite;
        pointer-events: none;
        z-index: 2;
    }
    .hero-content {
        animation: fadeUp .8s cubic-bezier(.22, 1, .36, 1) both;
    }
    .hero-content > * {
        animation: fadeUp .7s cubic-bezier(.22, 1, .36, 1) both;
    }
    .hero-content > *:nth-child(2) { animation-delay: .12s; }
    .hero-content > *:nth-child(3) { animation-delay: .22s; }
    .hero-content > *:nth-child(4) { animation-delay: .32s; }
    .stats-panel {
        animation: fadeUp .8s .35s cubic-bezier(.22, 1, .36, 1) both;
    }
    .stat-item {
        animation: fadeUp .6s cubic-bezier(.22, 1, .36, 1) both;
        transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s ease;
        transform-origin: center;
        cursor: pointer;
    }
    .stat-item:hover {
        transform: translateY(-10px) scale(1.12);
        z-index: 1;
        box-shadow: 0 18px 30px -10px rgba(30, 58, 138, 0.45);
    }
    .stat-item:nth-child(1) { animation-delay: .45s; }
    .stat-item:nth-child(2) { animation-delay: .55s; }
    .stat-item:nth-child(3) { animation-delay: .65s; }
    .stat-item:nth-child(4) { animation-delay: .75s; }
    .section-heading {
        animation: fadeUp .7s .15s cubic-bezier(.22, 1, .36, 1) both;
    }
    .custom-card {
        transition: transform .35s cubic-bezier(.22, 1, .36, 1), box-shadow .35s ease, border-color .35s ease;
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes heroZoom {
        from { transform: scale(1.06); }
        to { transform: scale(1); }
    }
    @keyframes lightSweep {
        0%, 35% { transform: skewX(-20deg) translateX(-220%); opacity: 0; }
        45% { opacity: 1; }
        70%, 100% { transform: skewX(-20deg) translateX(520%); opacity: 0; }
    }
    @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .01ms !important;
        }
    }
    .custom-card { 
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
    <!-- Left: Text Content (Dark Blue) -->
    <div class="lg:w-1/2 bg-blue-950 flex flex-col items-start justify-center px-8 md:px-16 py-20 relative">
        <!-- Decorative Element -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-red-600 rounded-bl-full opacity-20"></div>
        
        <div class="hero-content max-w-xl space-y-6 z-10 relative">
            <span class="text-red-500 font-bold tracking-widest text-sm uppercase">Premier Automotive Gateway</span>
            <h2 class="text-white text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
                PATIMBAN <br> INTERNATIONAL <br>
                <span class="text-red-500">CAR TERMINAL</span>
            </h2>
            <p class="text-blue-100 max-w-lg leading-relaxed text-lg border-l-2 border-red-500 pl-4">
                A world-class, modern roll-on/roll-off (Ro-Ro) terminal strategically located at Patimban Port, West Java.
            </p>
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="{{ url('/about') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded shadow-lg transition">
                    ABOUT US
                </a>
                <a href="{{ url('/contact') }}" class="inline-block bg-transparent hover:bg-blue-900 text-white font-bold py-3 px-8 rounded border border-blue-400 transition">
                    CONTACT US
                </a>
            </div>
        </div>
    </div>
    
    <!-- Right: Image Section -->
    <div class="lg:w-1/2 hero-image relative min-h-[400px] lg:min-h-full">
        <!-- Gradient Overlay for blending -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-950 via-transparent to-transparent hidden lg:block"></div>
        <div class="absolute inset-0 bg-blue-900/30 mix-blend-multiply"></div>
    </div>
</div>

{{-- ═══ FLOATING STATS CARDS ═══ --}}
<section class="max-w-7xl mx-auto px-6 -mt-12 relative z-20 hidden md:block">
    <div class="stats-panel bg-white rounded-2xl shadow-xl p-8 grid grid-cols-4 divide-x divide-slate-200 border-t-4 border-red-600">
        <div class="stat-item text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">400<span class="text-red-600 text-2xl">k</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Capacity (Units/Year)</p>
        </div>
        <div class="stat-item text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">600<span class="text-red-600 text-2xl">k</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Target Capacity</p>
        </div>
        <div class="stat-item text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">300<span class="text-slate-400 text-xl ml-1">m</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Quay Length</p>
        </div>
        <div class="stat-item text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">&plusmn;120<span class="text-slate-400 text-xl ml-1">km</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">From Jakarta</p>
        </div>
    </div>
</section>

{{-- ═══ ASYMMETRICAL HIGHLIGHTS ═══ --}}
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="section-heading flex flex-col md:flex-row justify-between items-end mb-14 gap-6">
            <div>
                <span class="text-red-600 font-bold tracking-widest text-sm uppercase">Explore PICT</span>
                <h3 class="text-3xl md:text-5xl font-extrabold text-blue-950 mt-3 tracking-tight">
                    Facilities & Services
                </h3>
            </div>
            <a href="{{ url('/services') }}" class="text-blue-900 font-bold hover:text-red-600 flex items-center gap-2 transition">
                View All Services <span class="text-xl">&rarr;</span>
            </a>
        </div>

        <!-- Asymmetrical Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Large Card (Spans 2 Columns) -->
            <a href="{{ url('/about') }}" class="custom-card md:col-span-2 bg-gradient-to-br from-blue-950 via-blue-900 to-blue-800 text-white rounded-2xl p-8 md:p-12 relative overflow-hidden group shadow-lg hover:-translate-y-2 hover:shadow-2xl transition-all duration-500">
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-red-600 rounded-full opacity-10 group-hover:scale-150 transition-transform duration-700"></div>
                <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/10 to-transparent skew-x-12"></div>
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-red-600/20 text-red-400 mb-6 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">01</span>
                        <h4 class="font-extrabold text-3xl mb-4 text-white">About PICT</h4>
                        <p class="text-blue-200 text-lg leading-relaxed max-w-lg">
                        Learn more about our company profile, historical track record, and the consortium of shareholders behind our terminal operations.
                        </p>
                    </div>
                    <span class="mt-8 inline-flex items-center gap-2 text-red-400 font-bold group-hover:gap-4 transition-all">Discover More <span class="text-xl">&rarr;</span></span>
                </div>
            </a>

            <!-- Standard Cards -->
            <a href="{{ url('/facilities') }}" class="custom-card bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-red-50 text-red-600 flex items-center justify-center rounded-lg mb-6 font-bold text-xl">02</div>
                <h4 class="font-bold text-blue-950 text-xl mb-3">Terminal Facilities</h4>
                <p class="text-slate-600 text-sm leading-relaxed">International standard infrastructure and supporting facilities for vehicle terminal operations.</p>
            </a>

            <a href="{{ url('/location') }}" class="custom-card bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-red-50 text-red-600 flex items-center justify-center rounded-lg mb-6 font-bold text-xl">03</div>
                <h4 class="font-bold text-blue-950 text-xl mb-3">Strategic Location</h4>
                <p class="text-slate-600 text-sm leading-relaxed">A strategic location at Patimban Port designed to streamline the industrial supply chain.</p>
            </a>

            <a href="{{ url('/tariffs') }}" class="custom-card bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-red-50 text-red-600 flex items-center justify-center rounded-lg mb-6 font-bold text-xl">04</div>
                <h4 class="font-bold text-blue-950 text-xl mb-3">Our Tariffs</h4>
                <p class="text-slate-600 text-sm leading-relaxed">A competitive tariff structure with complete transparency in handling costs.</p>
            </a>

            <a href="{{ url('/sustainability') }}" class="custom-card bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 bg-red-50 text-red-600 flex items-center justify-center rounded-lg mb-6 font-bold text-xl">05</div>
                <h4 class="font-bold text-blue-950 text-xl mb-3">Sustainability</h4>
                <p class="text-slate-600 text-sm leading-relaxed">A steadfast commitment to green operations, prioritizing the environment, safety, and the community.</p>
            </a>

        </div>
    </div>
</section>

{{-- ═══ LOCATION STRIP ═══ --}}
<section class="bg-red-600 py-16 relative overflow-hidden">
    <!-- Background Diagonal Motif -->
    <div class="absolute inset-0 bg-red-700 transform skew-x-12 translate-x-1/3 z-0"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
        <div>
            <h4 class="text-white text-3xl font-extrabold mb-2 tracking-tight">Visit Our Location</h4>
            <p class="text-red-100 font-medium text-lg">Patimban Port, Pusakanagara, Subang, West Java, Indonesia</p>
        </div>
        <a href="{{ url('/location') }}" class="inline-block bg-blue-950 hover:bg-blue-900 text-white font-bold py-4 px-10 rounded-lg text-sm transition shadow-xl whitespace-nowrap">
            VIEW LOCATION MAP
        </a>
    </div>
</section>

@endsection