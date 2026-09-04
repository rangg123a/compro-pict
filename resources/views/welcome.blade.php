@extends('layouts.app')

@section('title', 'PT Patimban International Car Terminal — PICT')

@push('styles')
<style>
    .hero-image {
        background-image: url('{{ asset("assets/images/background.jpeg") }}');
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

    .custom-card {
        border-left: 4px solid transparent;
        transition: transform .35s cubic-bezier(.22, 1, .36, 1), box-shadow .35s ease, border-color .35s ease;
    }
    .custom-card:hover { 
        transform: translateY(-4px); 
        border-left: 4px solid #dc2626; 
        box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.12); 
    }

    /* Animasi pergerakan baris kargo */
    .cargo-row-bottom {
        animation: cargoMoveBottom 6s linear infinite;
    }
    .cargo-row-top {
        animation: cargoMoveTop 9s linear infinite;
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
    @keyframes cargoMoveBottom {
        0%   { transform: translateX(0); }
        50%  { transform: translateX(-14px); }
        100% { transform: translateX(0); }
    }
    @keyframes cargoMoveTop {
        0%   { transform: translateX(0); }
        50%  { transform: translateX(12px); }
        100% { transform: translateX(0); }
    }

    @media (min-width: 1024px) {
        .flow-step:not(:last-child)::after {
            content: "";
            position: absolute;
            right: -10px;
            top: 50%;
            transform: translateY(-50%) rotate(45deg);
            width: 18px;
            height: 18px;
            background: #ffffff;
            border-right: 2px solid #e2e8f0;
            border-top: 2px solid #e2e8f0;
            z-index: 20;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .01ms !important;
        }
    }
</style>
@endpush

@section('content')

<!-- ═══ 1. HERO SECTION (SPLIT SCREEN DENGAN BACKGROUND.JPEG) ═══ -->
<div class="flex flex-col lg:flex-row min-h-[75vh] w-full border-b border-white/10 overflow-hidden">
    <!-- Left: Teks Konten -->
    <div class="w-full lg:w-1/2 bg-blue-950 flex flex-col items-start justify-center px-8 md:px-16 py-16 lg:py-20 relative">
        <div class="absolute top-0 right-0 w-32 h-32 bg-red-600 rounded-bl-full opacity-20 pointer-events-none"></div>
        
        <div class="hero-content max-w-xl space-y-6 z-10 relative">
            <span class="text-red-500 font-bold tracking-widest text-sm uppercase">Lorem ipsum dolor</span>
            <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
                PT PATIMBAN INTERNATIONAL 
                <span class="text-red-500">CAR TERMINAL</span>
            </h1>
            <p class="text-blue-100 max-w-lg leading-relaxed text-base md:text-lg border-l-2 border-red-500 pl-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
            </p>
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="{{ url('/about') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3.5 px-8 rounded-xl shadow-lg transition">
                    About Us &rarr;
                </a>
            </div>
        </div>
    </div>
    
    <!-- Right: Gambar Background Asli dengan Ilustrasi Ro-Ro Dock -->
    <div class="w-full lg:w-1/2 hero-image relative min-h-[420px] lg:min-h-full flex items-center justify-center p-6">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-950 via-blue-950/40 to-transparent hidden lg:block z-0"></div>
        <div class="absolute inset-0 bg-blue-950/50 mix-blend-multiply z-0"></div>

        <!-- Ilustrasi Dermaga Ro-Ro -->
        <div class="relative z-10 w-full max-w-md">
           <!-- Ganti bagian blok <svg ...> di dalam file Anda dengan ini -->
<svg class="w-full h-auto drop-shadow-2xl" viewBox="0 0 420 300" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Dermaga & Tiang -->
    <rect x="0" y="230" width="420" height="8" rx="2" fill="#334155" />
    <rect x="30" y="238" width="8" height="42" fill="#1e293b" />
    <rect x="130" y="238" width="8" height="42" fill="#1e293b" />
    <rect x="230" y="238" width="8" height="42" fill="#1e293b" />
    <rect x="330" y="238" width="8" height="42" fill="#1e293b" />

    <!-- ═══ Jalur Lintasan Kiri & Titik Merah Bolak-Balik ═══ -->
    <path id="trackLeft" d="M40 130 L40 40 L150 40 L150 64 L60 64 L60 130" stroke="#cbd5e1" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" />
    
    <!-- Titik Merah: maju (0 -> 1) lalu mundur (1 -> 0) -->
    <circle r="6" fill="#ef4444" stroke="#ffffff" stroke-width="1.5">
        <animateMotion 
            dur="6s" 
            repeatCount="indefinite" 
            rotate="auto"
            calcMode="linear"
            keyTimes="0; 0.5; 1"
            keyPoints="0; 1; 0">
            <mpath href="#trackLeft"/>
        </animateMotion>
    </circle>

    <!-- ═══ Jalur Lintasan Kanan & Titik Biru Bolak-Balik ═══ -->
    <path id="trackRight" d="M340 150 L340 60 L270 60" stroke="#cbd5e1" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" />
    
    <!-- Titik Biru: maju (0 -> 1) lalu mundur (1 -> 0) -->
    <circle r="6" fill="#38bdf8" stroke="#ffffff" stroke-width="1.5">
        <animateMotion 
            dur="4.5s" 
            repeatCount="indefinite" 
            rotate="auto"
            calcMode="linear"
            keyTimes="0; 0.5; 1"
            keyPoints="0; 1; 0">
            <mpath href="#trackRight"/>
        </animateMotion>
    </circle>

    <!-- Baris Bawah (Kargo / Kendaraan) -->
    <g class="cargo-row-bottom" opacity="0.95">
        <rect x="25" y="196" width="54" height="30" rx="4" fill="#dc2626" />
        <rect x="25" y="196" width="54" height="9" rx="1" fill="#991b1b" />
        <circle cx="37" cy="226" r="5" fill="#0f172a" />
        <circle cx="67" cy="226" r="5" fill="#0f172a" />

        <rect x="88" y="196" width="54" height="30" rx="4" fill="#cbd5e1" />
        <rect x="88" y="196" width="54" height="9" rx="1" fill="#94a3b8" />
        <circle cx="100" cy="226" r="5" fill="#0f172a" />
        <circle cx="130" cy="226" r="5" fill="#0f172a" />

        <rect x="151" y="196" width="54" height="30" rx="4" fill="#1e3a8a" />
        <rect x="151" y="196" width="54" height="9" rx="1" fill="#172554" />
        <circle cx="163" cy="226" r="5" fill="#0f172a" />
        <circle cx="193" cy="226" r="5" fill="#0f172a" />

        <rect x="214" y="196" width="54" height="30" rx="4" fill="#dc2626" />
        <rect x="214" y="196" width="54" height="9" rx="1" fill="#991b1b" />
        <circle cx="226" cy="226" r="5" fill="#0f172a" />
        <circle cx="256" cy="226" r="5" fill="#0f172a" />

        <rect x="277" y="196" width="54" height="30" rx="4" fill="#cbd5e1" />
        <rect x="277" y="196" width="54" height="9" rx="1" fill="#94a3b8" />
        <circle cx="289" cy="226" r="5" fill="#0f172a" />
        <circle cx="319" cy="226" r="5" fill="#0f172a" />

        <rect x="340" y="196" width="54" height="30" rx="4" fill="#1e3a8a" />
        <rect x="340" y="196" width="54" height="9" rx="1" fill="#172554" />
        <circle cx="352" cy="226" r="5" fill="#0f172a" />
        <circle cx="382" cy="226" r="5" fill="#0f172a" />
    </g>

    <!-- Baris Atas -->
    <g class="cargo-row-top" opacity="0.8">
        <rect x="55" y="158" width="52" height="28" rx="4" fill="#cbd5e1" />
        <rect x="115" y="158" width="52" height="28" rx="4" fill="#1e3a8a" />
        <rect x="175" y="158" width="52" height="28" rx="4" fill="#dc2626" />
        <rect x="235" y="158" width="52" height="28" rx="4" fill="#cbd5e1" />
        <rect x="295" y="158" width="52" height="28" rx="4" fill="#1e3a8a" />
    </g>
</svg>
        </div>
    </div>
</div>

<!-- ═══ STATS STRIP ═══ -->
<section class="max-w-7xl mx-auto px-6 -mt-10 relative z-20 hidden md:block">
    <div class="bg-white rounded-2xl shadow-xl p-8 grid grid-cols-4 divide-x divide-slate-200 border-t-4 border-red-600">
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">400<span class="text-red-600 text-2xl">k</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Lorem ipsum dolor</p>
        </div>
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">600<span class="text-red-600 text-2xl">k</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Sit amet consectetur</p>
        </div>
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">300<span class="text-slate-400 text-xl ml-1">m</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Adipiscing elit</p>
        </div>
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">&plusmn;120<span class="text-slate-400 text-xl ml-1">km</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Sed do eiusmod</p>
        </div>
    </div>
</section>

<!-- ═══ 2. TENTANG KAMI ═══ -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">01 — Lorem Ipsum</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Tentang Kami</h2>
            </div>
            <p class="text-slate-500 text-sm max-w-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-6 space-y-6">
                <h3 class="text-2xl font-bold text-blue-950">Lorem Ipsum Dolor Sit Amet</h3>
                <p class="text-slate-600 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p class="text-slate-600 leading-relaxed">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>

            <div class="lg:col-span-6 flex flex-col justify-between gap-6">
                <div class="p-6 bg-slate-50 rounded-2xl border-l-4 border-red-600 shadow-sm">
                    <h4 class="text-lg font-bold text-blue-950 mb-2">Visi</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>

                <div class="p-6 bg-slate-50 rounded-2xl border-l-4 border-blue-900 shadow-sm">
                    <h4 class="text-lg font-bold text-blue-950 mb-2">Misi</h4>
                    <ul class="text-slate-600 text-sm space-y-2 list-disc list-inside">
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Sed do eiusmod tempor incididunt ut labore et dolore magna.</li>
                        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 3. JENIS KENDARAAN & MUATAN (ICON MOBIL) ═══ -->
<section class="py-20 bg-slate-50 border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">02 — Lorem Ipsum</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Jenis Kendaraan &amp; Muatan</h2>
            </div>
            <span class="text-slate-500 text-sm">Lorem ipsum dolor sit amet consectetur</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Card 1: Mobil Penumpang -->
            <div class="custom-card bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 rounded-xl bg-red-50 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" viewBox="0 0 40 40" fill="none">
                            <path d="M6 24h28l-3-9a3 3 0 0 0-2.8-2H11.8a3 3 0 0 0-2.8 2L6 24Z" stroke="#EC2029" stroke-width="2.4" stroke-linejoin="round"></path>
                            <circle cx="13" cy="27" r="3.2" stroke="#131B44" stroke-width="2.4"></circle>
                            <circle cx="27" cy="27" r="3.2" stroke="#131B44" stroke-width="2.4"></circle>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Kendaraan Penumpang (CBU)</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                    <span>Lorem Ipsum</span>
                    <span class="text-red-600 font-bold">Dolor Sit</span>
                </div>
            </div>

            <!-- Card 2: Truk & Bus -->
            <div class="custom-card bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 rounded-xl bg-red-50 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" viewBox="0 0 40 40" fill="none">
                            <rect x="4" y="14" width="18" height="12" rx="1.5" stroke="#EC2029" stroke-width="2.4"></rect>
                            <path d="M22 18h8l4 4v4h-12v-8Z" stroke="#131B44" stroke-width="2.4" stroke-linejoin="round"></path>
                            <circle cx="11" cy="28" r="2.8" stroke="#131B44" stroke-width="2.4"></circle>
                            <circle cx="27" cy="28" r="2.8" stroke="#131B44" stroke-width="2.4"></circle>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Truk &amp; Bus</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                    <span>Lorem Ipsum</span>
                    <span class="text-red-600 font-bold">Dolor Sit</span>
                </div>
            </div>

            <!-- Card 3: Alat Berat -->
            <div class="custom-card bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 rounded-xl bg-red-50 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" viewBox="0 0 40 40" fill="none">
                            <path d="M6 26h6l3-8h8l6 8h5" stroke="#EC2029" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path>
                            <circle cx="13" cy="29" r="3.2" stroke="#131B44" stroke-width="2.4"></circle>
                            <circle cx="27" cy="29" r="3.2" stroke="#131B44" stroke-width="2.4"></circle>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Alat Berat (Heavy Equipment)</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                    <span>Lorem Ipsum</span>
                    <span class="text-red-600 font-bold">Dolor Sit</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══ 4. LINI LAYANAN ═══ -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">03 — Lorem Ipsum</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Lini Layanan</h2>
            </div>
            <a href="{{ url('/services') }}" class="text-blue-900 font-bold hover:text-red-600 transition flex items-center gap-1.5 text-sm">
                Lorem ipsum <span class="text-lg">&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 hover:border-red-500 transition">
                <span class="text-2xl font-black text-red-600">01</span>
                <h3 class="text-lg font-bold text-blue-950 mt-3 mb-2">Stevedoring</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Kegiatan bongkar muat kendaraan dari dan ke kapal di dermaga secara sistematis.
                </p>
            </div>

            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 hover:border-red-500 transition">
                <span class="text-2xl font-black text-red-600">02</span>
                <h3 class="text-lg font-bold text-blue-950 mt-3 mb-2">Cargodoring</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Pemindahan kendaraan dari dermaga ke area penumpukan (yard) sesuai kategori unit.
                </p>
            </div>

            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 hover:border-red-500 transition">
                <span class="text-2xl font-black text-red-600">03</span>
                <h3 class="text-lg font-bold text-blue-950 mt-3 mb-2">Receiving &amp; Delivery</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Penerimaan dan penyerahan kendaraan ke dan dari pihak pengguna jasa.
                </p>
            </div>

            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 hover:border-red-500 transition">
                <span class="text-2xl font-black text-red-600">04</span>
                <h3 class="text-lg font-bold text-blue-950 mt-3 mb-2">Value Added Services</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Layanan tambahan seperti pre-delivery inspection, PDI, dan fasilitas penyimpanan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 5. ALUR LAYANAN TERMINAL ═══ -->
<section class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">04 — Lorem Ipsum</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Alur Layanan Terminal</h2>
            </div>
            <span class="text-slate-500 text-sm">Lorem ipsum dolor sit amet</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-0 bg-slate-200 p-1 rounded-2xl">
            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none lg:first:rounded-l-xl flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">01</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Kapal Sandar</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">02</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Stevedoring</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">03</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Pemeriksaan &amp; PDI</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Ut enim ad minim veniam, quis nostrud exercitation.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">04</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Cargodoring</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Duis aute irure dolor in reprehenderit in voluptate.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none lg:last:rounded-r-xl flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">05</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Receiving &amp; Delivery</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Excepteur sint occaecat cupidatat non proident sunt.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 6. LOKASI & FASILITAS ═══ -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">05 — Lorem Ipsum</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Lokasi &amp; Fasilitas</h2>
            </div>
            <a href="{{ url('/location') }}" class="text-blue-900 font-bold hover:text-red-600 transition flex items-center gap-1 text-sm">
                Lorem Ipsum <span class="text-lg">&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <div class="lg:col-span-8 bg-slate-50 border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="p-5 bg-blue-950 text-white font-bold text-base flex justify-between items-center">
                    <span>Parameter Fasilitas</span>
                    <span class="text-xs font-normal text-slate-300">Lorem Ipsum</span>
                </div>
                <div class="divide-y divide-slate-200 text-sm">
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Alamat</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                    </div>
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Luas Area</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">Lorem ipsum dolor sit amet</span>
                    </div>
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Panjang Dermaga</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">300 m</span>
                    </div>
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Kedalaman Kolam (Draft)</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">-10.0 m LWS</span>
                    </div>
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Jumlah Tambatan</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">Lorem ipsum dolor</span>
                    </div>
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Area Penumpukan (Yard)</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">Lorem ipsum dolor sit amet</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-4">
                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-blue-950 text-base mb-2">Keselamatan &amp; Kesehatan Kerja</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-blue-950 text-base mb-2">Lingkungan &amp; Mutu</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 7. ACTION STRIP ═══ -->
<section class="bg-red-600 py-14 relative overflow-hidden text-white">
    <div class="absolute inset-0 bg-red-700 transform skew-x-12 translate-x-1/3 z-0 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Lorem Ipsum Dolor</h4>
            <p class="text-red-100 text-sm sm:text-base mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ url('/location') }}" class="inline-block bg-blue-950 hover:bg-blue-900 text-white font-bold py-3.5 px-8 rounded-xl text-sm transition shadow-xl whitespace-nowrap">
                LOREM IPSUM
            </a>
            <a href="{{ url('/contact') }}" class="inline-block bg-white text-red-600 hover:bg-slate-100 font-bold py-3.5 px-8 rounded-xl text-sm transition shadow-xl whitespace-nowrap">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection