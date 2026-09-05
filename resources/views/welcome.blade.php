@extends('layouts.app')

@section('title', 'PT Patimban International Car Terminal — PICT')

@push('styles')
<style>
    /* Hero Full Width Background */
    .hero-banner {
        background-image: url('{{ asset("assets/images/background.jpeg") }}');
        background-size: cover;
        background-position: center right;
        animation: heroZoom 16s ease-out both;
    }

    /* Container Canvas WebGL Rays */
    #sideRaysCanvas {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 2;
        mix-blend-mode: screen;
        opacity: 0.85;
    }

    .hero-content {
        animation: fadeUp .8s cubic-bezier(.22, 1, .36, 1) both;
    }

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
        from { transform: scale(1.08); }
        to { transform: scale(1); }
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

<!-- ═══ 1. HERO SECTION (DENGAN WEBGL SIDE RAYS SHADER) ═══ -->
<div class="relative w-full min-h-[85vh] lg:min-h-[88vh] flex items-center overflow-hidden border-b border-white/10 bg-slate-950">
    <!-- 1. Background Image Asli -->
    <div class="absolute inset-0 hero-banner z-0"></div>

    <!-- 2. Kanvas Side Rays WebGL Shader -->
    <div id="sideRaysCanvas"></div>

    <!-- 3. Overlay Gradient Gelap untuk Kontras Teks -->
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-slate-950/30 z-3 pointer-events-none"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-transparent to-transparent z-3 pointer-events-none"></div>

    <!-- 4. Konten Hero -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 py-24 lg:py-28 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Sisi Kiri: Teks -->
            <div class="lg:col-span-7 hero-content space-y-6 text-left">
                <span class="text-red-500 font-bold tracking-widest text-xs sm:text-sm uppercase inline-block">
                    INDONESIA PREMIER AUTOMOTIVE GATEWAY
                </span>

                <h1 class="text-white text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.15]">
                    PT PATIMBAN <br class="hidden sm:inline">INTERNATIONAL <br>
                    <span class="text-red-500">CAR TERMINAL</span>
                </h1>

                <p class="text-slate-200 max-w-xl leading-relaxed text-base sm:text-lg border-l-2 border-red-500 pl-4 font-normal">
                    Modern roll-on/roll-off (Ro-Ro) terminal gateway di Pelabuhan Patimban, Jawa Barat. Menghubungkan pusat industri manufaktur otomotif nasional ke pasar global.
                </p>

                <div class="pt-2">
                    <a href="{{ url('/about') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-red-600/30 transition transform hover:-translate-y-0.5">
                        <span>About Us</span>
                        <span class="text-lg">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Sisi Kanan: Ilustrasi Ro-Ro Dock -->
            <div class="lg:col-span-5 flex justify-center lg:justify-end items-center">
                <div class="w-full max-w-md backdrop-blur-[2px] p-2 rounded-2xl">
                    <svg class="w-full h-auto drop-shadow-[0_20px_35px_rgba(0,0,0,0.6)]" viewBox="0 0 420 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0" y="230" width="420" height="8" rx="2" fill="#475569" />
                        <rect x="30" y="238" width="8" height="42" fill="#1e293b" />
                        <rect x="130" y="238" width="8" height="42" fill="#1e293b" />
                        <rect x="230" y="238" width="8" height="42" fill="#1e293b" />
                        <rect x="330" y="238" width="8" height="42" fill="#1e293b" />

                        <!-- Jalur Kiri & Animasi Bola Merah -->
                        <path id="trackLeft" d="M40 130 L40 40 L150 40 L150 64 L60 64 L60 130" stroke="#cbd5e1" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        <circle r="6" fill="#ef4444" stroke="#ffffff" stroke-width="1.5">
                            <animateMotion dur="6s" repeatCount="indefinite" rotate="auto" calcMode="linear" keyTimes="0; 0.5; 1" keyPoints="0; 1; 0">
                                <mpath href="#trackLeft"/>
                            </animateMotion>
                        </circle>

                        <!-- Jalur Kanan & Animasi Bola Biru -->
                        <path id="trackRight" d="M340 150 L340 60 L270 60" stroke="#cbd5e1" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        <circle r="6" fill="#38bdf8" stroke="#ffffff" stroke-width="1.5">
                            <animateMotion dur="4.5s" repeatCount="indefinite" rotate="auto" calcMode="linear" keyTimes="0; 0.5; 1" keyPoints="0; 1; 0">
                                <mpath href="#trackRight"/>
                            </animateMotion>
                        </circle>

                        <!-- Baris Kargo Bawah -->
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

                        <!-- Baris Kargo Atas -->
                        <g class="cargo-row-top" opacity="0.85">
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
    </div>
</div>

<!-- ═══ STATS STRIP ═══ -->
<section class="max-w-7xl mx-auto px-6 -mt-10 relative z-20 hidden md:block">
    <div class="bg-white rounded-2xl shadow-xl p-8 grid grid-cols-4 divide-x divide-slate-200 border-t-4 border-red-600">
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">400<span class="text-red-600 text-2xl">k</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Kapasitas Tahunan (CBU)</p>
        </div>
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">600<span class="text-red-600 text-2xl">k</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Target Ultimate Tahap 3</p>
        </div>
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">300<span class="text-slate-400 text-xl ml-1">m</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Panjang Dermaga Ro-Ro</p>
        </div>
        <div class="text-center px-4">
            <p class="text-4xl font-extrabold text-blue-900 mb-1">&plusmn;120<span class="text-slate-400 text-xl ml-1">km</span></p>
            <p class="text-slate-500 text-sm font-medium uppercase tracking-wide">Dari Koridor Industri Karawang</p>
        </div>
    </div>
</section>

<!-- ═══ 2. TENTANG KAMI ═══ -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">01 — Profil Perusahaan</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Tentang PICT</h2>
            </div>
            <p class="text-slate-500 text-sm max-w-md">Operator terminal kendaraan internasional modern pelopor efisiensi logistik otomotif Indonesia.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-6 space-y-6">
                <h3 class="text-2xl font-bold text-blue-950">Gerbang Utama Ekspor & Impor Otomotif Nasional</h3>
                <p class="text-slate-600 leading-relaxed">
                    PT Patimban International Car Terminal (PICT) dibentuk sebagai operator khusus pelabuhan mobil berstandar internasional yang beroperasi di Pelabuhan Patimban, Subang, Jawa Barat.
                </p>
                <p class="text-slate-600 leading-relaxed">
                    Dengan akses langsung ke jalan tol pelabuhan dan kawasan industri terpadu Karawang-Bekasi-Purwakarta, kami memangkas waktu tempuh distribusi kargo serta menekan biaya logistik secara signifikan.
                </p>
            </div>

            <div class="lg:col-span-6 flex flex-col justify-between gap-6">
                <div class="p-6 bg-slate-50 rounded-2xl border-l-4 border-red-600 shadow-sm">
                    <h4 class="text-lg font-bold text-blue-950 mb-2">Visi</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Menjadi pelabuhan terminal kendaraan kelas dunia yang andal, ramah lingkungan, serta menjadi hub otomotif terdepan di kawasan Asia Tenggara.
                    </p>
                </div>

                <div class="p-6 bg-slate-50 rounded-2xl border-l-4 border-blue-900 shadow-sm">
                    <h4 class="text-lg font-bold text-blue-950 mb-2">Misi</h4>
                    <ul class="text-slate-600 text-sm space-y-2 list-disc list-inside">
                        <li>Memberikan layanan bongkar muat kargo Ro-Ro berstandar kualitas global dan zero accident.</li>
                        <li>Menerapkan integrasi teknologi terminal operating system berbasis digital yang presisi dan transparan.</li>
                        <li>Mendukung daya saing ekspor manufaktur nasional lewat efisiensi rantai pasok maritim.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 3. JENIS KENDARAAN & MUATAN (ISOMETRIC VECTOR PREMIUM) ═══ -->
<section class="py-20 bg-slate-50 border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">02 — Spesifikasi Portofolio</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Jenis Kendaraan &amp; Muatan</h2>
            </div>
            <span class="text-slate-500 text-sm font-medium">Standardisasi penanganan kargo otomotif Ro-Ro</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Card 1: Mobil Penumpang -->
            <div class="custom-card bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between group">
                <div>
                    <div class="w-24 h-24 sm:w-28 sm:h-28 mb-4 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-full h-full drop-shadow-[0_12px_16px_rgba(15,23,42,0.14)]" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="suvBody" x1="20" y1="40" x2="108" y2="90" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#ffffff" />
                                    <stop offset="100%" stop-color="#e2e8f0" />
                                </linearGradient>
                                <linearGradient id="suvAccent" x1="30" y1="50" x2="90" y2="80" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#ef4444" />
                                    <stop offset="100%" stop-color="#b91c1c" />
                                </linearGradient>
                                <linearGradient id="suvGlass" x1="40" y1="40" x2="80" y2="70" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#0284c7" />
                                    <stop offset="100%" stop-color="#0369a1" />
                                </linearGradient>
                            </defs>
                            <ellipse cx="64" cy="98" rx="44" ry="12" fill="#0f172a" fill-opacity="0.12" />
                            <ellipse cx="42" cy="88" rx="9" ry="12" fill="#0f172a" />
                            <ellipse cx="42" cy="88" rx="5" ry="7" fill="#64748b" />
                            <ellipse cx="88" cy="82" rx="9" ry="12" fill="#0f172a" />
                            <ellipse cx="88" cy="82" rx="5" ry="7" fill="#64748b" />
                            <path d="M22 74 L38 88 L94 80 L106 66 L98 60 L28 66 Z" fill="#cbd5e1" />
                            <path d="M20 70 L38 84 L96 76 L108 62 L88 56 L24 62 Z" fill="url(#suvBody)" stroke="#cbd5e1" stroke-width="1.5" />
                            <path d="M34 74 L48 80 L86 73 L74 69 Z" fill="url(#suvAccent)" />
                            <path d="M36 60 L50 42 L80 40 L92 56 L86 58 L46 60 Z" fill="#0f172a" fill-opacity="0.85" />
                            <polygon points="52,44 76,42 74,56 46,58" fill="url(#suvGlass)" fill-opacity="0.85" />
                            <polygon points="78,43 88,54 84,57 75,56" fill="#38bdf8" fill-opacity="0.75" />
                            <polygon points="48,42 72,40 80,42 56,44" fill="#ffffff" />
                            <polygon points="104,63 108,62 106,66 102,67" fill="#38bdf8" />
                            <polygon points="20,70 24,71 22,75 19,73" fill="#ef4444" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Kendaraan Penumpang (CBU)</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Penanganan unit mobil Completely Built Up (Sedan, SUV, MPV, EV) dari proses ramp door kapal hingga staging yard dengan protokol zero-scratch.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                    <span class="text-slate-400">Klasifikasi Muatan</span>
                    <span class="text-red-600 font-bold tracking-wide">LIGHT VEHICLE</span>
                </div>
            </div>

            <!-- Card 2: Truk & Bus -->
            <div class="custom-card bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between group">
                <div>
                    <div class="w-24 h-24 sm:w-28 sm:h-28 mb-4 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-full h-full drop-shadow-[0_12px_16px_rgba(15,23,42,0.14)]" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="truckBox" x1="16" y1="30" x2="80" y2="80" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#ffffff" />
                                    <stop offset="100%" stop-color="#f1f5f9" />
                                </linearGradient>
                                <linearGradient id="truckCabin" x1="70" y1="45" x2="110" y2="85" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#0284c7" />
                                    <stop offset="100%" stop-color="#0c4a6e" />
                                </linearGradient>
                            </defs>
                            <ellipse cx="64" cy="100" rx="46" ry="13" fill="#0f172a" fill-opacity="0.12" />
                            <ellipse cx="32" cy="90" rx="8" ry="11" fill="#0f172a" />
                            <ellipse cx="48" cy="87" rx="8" ry="11" fill="#0f172a" />
                            <ellipse cx="94" cy="81" rx="8" ry="11" fill="#0f172a" />
                            <polygon points="24,80 102,70 102,74 24,84" fill="#334155" />
                            <polygon points="20,44 76,36 76,75 20,83" fill="url(#truckBox)" stroke="#cbd5e1" stroke-width="1.2" />
                            <polygon points="20,66 76,58 76,62 20,70" fill="#ef4444" />
                            <polygon points="12,50 20,44 20,83 12,87" fill="#94a3b8" />
                            <polygon points="12,50 68,42 76,36 20,44" fill="#ffffff" />
                            <polygon points="76,52 98,48 108,60 108,76 76,81" fill="url(#truckCabin)" />
                            <polygon points="76,52 94,48 98,48 76,52" fill="#38bdf8" />
                            <polygon points="86,52 98,50 104,60 92,62" fill="#bae6fd" fill-opacity="0.9" />
                            <polygon points="102,72 110,71 109,75 102,76" fill="#f8fafc" />
                            <polygon points="107,72 110,71 110,74 107,75" fill="#facc15" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Truk &amp; Bus Komersial</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Akomodasi kendaraan komersial berdimensi besar, bus antarkota, prime mover, serta chassis angkutan logistik industri dengan ramp dermaga berdaya dukung tinggi.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                    <span class="text-slate-400">Klasifikasi Muatan</span>
                    <span class="text-blue-900 font-bold tracking-wide">COMMERCIAL &amp; BUS</span>
                </div>
            </div>

            <!-- Card 3: Alat Berat -->
            <div class="custom-card bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between group">
                <div>
                    <div class="w-24 h-24 sm:w-28 sm:h-28 mb-4 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-full h-full drop-shadow-[0_12px_16px_rgba(15,23,42,0.14)]" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="heavyBody" x1="30" y1="40" x2="80" y2="80" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#f8fafc" />
                                    <stop offset="100%" stop-color="#cbd5e1" />
                                </linearGradient>
                                <linearGradient id="armAccent" x1="60" y1="30" x2="110" y2="70" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#dc2626" />
                                    <stop offset="100%" stop-color="#991b1b" />
                                </linearGradient>
                            </defs>
                            <ellipse cx="64" cy="98" rx="46" ry="13" fill="#0f172a" fill-opacity="0.12" />
                            <ellipse cx="38" cy="85" rx="12" ry="16" fill="#1e293b" />
                            <ellipse cx="38" cy="85" rx="6" ry="8" fill="#facc15" />
                            <ellipse cx="76" cy="80" rx="12" ry="16" fill="#1e293b" />
                            <ellipse cx="76" cy="80" rx="6" ry="8" fill="#facc15" />
                            <polygon points="22,64 48,58 52,78 22,84" fill="url(#heavyBody)" stroke="#94a3b8" stroke-width="1.2" />
                            <polygon points="20,64 26,58 48,58 42,64" fill="#ffffff" />
                            <polygon points="24,68 38,65 38,72 24,75" fill="#ef4444" />
                            <polygon points="46,56 62,54 64,72 48,74" fill="#0284c7" fill-opacity="0.25" stroke="#0f172a" stroke-width="2" />
                            <polygon points="48,46 64,44 62,54 46,56" fill="#38bdf8" fill-opacity="0.8" />
                            <polygon points="44,46 62,44 66,45 48,47" fill="#0f172a" />
                            <polygon points="62,68 94,44 98,48 68,76" fill="url(#armAccent)" />
                            <line x1="68" y1="74" x2="88" y2="58" stroke="#f8fafc" stroke-width="3" stroke-linecap="round" />
                            <polygon points="94,44 112,58 106,78 92,72 98,48" fill="#475569" stroke="#334155" stroke-width="1.2" />
                            <polygon points="106,78 114,84 118,72 112,58" fill="#1e293b" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Alat Berat &amp; Muatan Khusus</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Layanan bongkar muat alat berat pertambangan, agrikultur, dan konstruksi (Excavator, Wheel Loader, Bulldozer) dengan metode roll/towing yang tersertifikasi.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                    <span class="text-slate-400">Klasifikasi Muatan</span>
                    <span class="text-red-600 font-bold tracking-wide">HEAVY EQUIPMENT</span>
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
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">03 — Port Services</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Lini Layanan</h2>
            </div>
            <a href="{{ url('/services') }}" class="text-blue-900 font-bold hover:text-red-600 transition flex items-center gap-1.5 text-sm">
                Lihat Semua Layanan <span class="text-lg">&rarr;</span>
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
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">04 — Workflow Operasional</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Alur Layanan Terminal</h2>
            </div>
            <span class="text-slate-500 text-sm">SOP Terintegrasi Terminal Operating System</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-0 bg-slate-200 p-1 rounded-2xl">
            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none lg:first:rounded-l-xl flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">01</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Kapal Sandar</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Kapal Ro-Ro merapat dan menurunkan ramp door dermaga.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">02</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Stevedoring</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Penurunan unit kendaraan oleh operator tersertifikasi.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">03</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Pemeriksaan &amp; PDI</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Inspeksi fisik kondisi bodi dan barcode unit scanning.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">04</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Cargodoring</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Penataan rapi ke slot staging yard berkapasitas besar.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none lg:last:rounded-r-xl flex flex-col justify-between">
                <div>
                    <span class="text-2xl font-black text-red-600">05</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Receiving &amp; Delivery</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Distribusi ke car-carrier transporter menuju diler/tujuan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 5B. JARINGAN RUTE PELAYARAN INTERNASIONAL ═══ -->
<section class="py-20 bg-blue-950 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-white/10 gap-4">
            <div>
                <span class="text-red-500 font-bold text-xs sm:text-sm tracking-wider uppercase">05 — Konektivitas Maritim</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-1">Jaringan Rute Pelayaran Internasional</h2>
            </div>
            <p class="text-slate-300 text-sm max-w-md">Pelabuhan Patimban terhubung dengan jalur pelayaran domestik dan internasional menuju hub-hub otomotif utama di Asia.</p>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-2xl p-4 sm:p-6 backdrop-blur-sm">
            <svg class="w-full h-auto" viewBox="0 0 900 460" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="seaGrad" x1="0" y1="0" x2="900" y2="460" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="#0c2145" />
                        <stop offset="100%" stop-color="#081228" />
                    </linearGradient>
                    <radialGradient id="patimbanGlow" cx="50%" cy="50%" r="50%">
                        <stop offset="0%" stop-color="#ef4444" stop-opacity="0.9" />
                        <stop offset="100%" stop-color="#ef4444" stop-opacity="0" />
                    </radialGradient>
                </defs>

                <!-- Laut / peta dasar -->
                <rect x="0" y="0" width="900" height="460" rx="16" fill="url(#seaGrad)" />

                <!-- Garis lintang/bujur tipis untuk kesan peta -->
                <g stroke="#ffffff" stroke-opacity="0.05" stroke-width="1">
                    <line x1="0" y1="115" x2="900" y2="115" />
                    <line x1="0" y1="230" x2="900" y2="230" />
                    <line x1="0" y1="345" x2="900" y2="345" />
                    <line x1="150" y1="0" x2="150" y2="460" />
                    <line x1="300" y1="0" x2="300" y2="460" />
                    <line x1="450" y1="0" x2="450" y2="460" />
                    <line x1="600" y1="0" x2="600" y2="460" />
                    <line x1="750" y1="0" x2="750" y2="460" />
                </g>

                <!-- Batas peta (clip agar daratan besar seperti Rusia/Australia tidak melebar keluar) -->
                <clipPath id="mapClip"><rect x="0" y="0" width="900" height="460" rx="16" /></clipPath>
                <g clip-path="url(#mapClip)">
<path d="M 831.0 680.7 L 845.5 683.4 L 865.3 680.9 L 874.3 681.4 L 875.4 690.5 L 870.3 693.1 L 868.7 699.3 L 863.5 697.2 L 853.1 702.5 L 840.7 701.9 L 831.5 695.3 L 829.4 690.3 L 820.8 683.6 L 821.2 680.1 L 831.0 680.7 Z M 803.4 473.5 L 808.8 479.5 L 818.5 476.6 L 830.6 482.9 L 829.1 486.3 L 832.3 492.9 L 834.6 496.7 L 838.3 497.6 L 842.4 504.2 L 841.0 508.1 L 845.8 513.3 L 862.1 517.4 L 882.7 524.3 L 880.8 526.2 L 889.3 531.0 L 895.2 539.3 L 901.2 537.6 L 907.2 540.9 L 910.9 539.8 L 913.5 547.9 L 942.8 561.7 L 947.0 567.9 L 946.4 577.0 L 953.5 583.5 L 952.7 590.3 L 946.0 600.7 L 946.3 605.1 L 943.4 610.6 L 936.8 617.6 L 925.6 621.3 L 915.2 631.0 L 910.7 637.7 L 904.9 641.5 L 901.1 647.2 L 900.0 654.9 L 891.4 657.6 L 874.6 657.9 L 860.7 661.0 L 844.8 667.3 L 823.2 662.5 L 825.5 658.5 L 817.3 660.0 L 804.1 665.5 L 759.6 659.5 L 749.9 654.8 L 743.6 645.1 L 736.2 642.0 L 721.8 641.0 L 726.7 637.3 L 723.1 631.6 L 715.8 636.9 L 702.4 638.3 L 710.3 634.1 L 712.6 629.7 L 718.4 625.9 L 717.2 620.2 L 705.0 626.8 L 695.6 629.4 L 689.8 635.5 L 678.1 632.3 L 678.6 628.3 L 669.2 622.7 L 661.3 619.8 L 664.1 618.1 L 644.9 613.4 L 634.3 613.2 L 619.9 609.5 L 593.0 610.2 L 556.5 615.5 L 542.2 615.0 L 526.3 618.9 L 513.3 620.7 L 510.4 624.7 L 504.9 627.8 L 482.7 628.7 L 469.5 627.3 L 448.4 628.5 L 439.5 632.6 L 435.1 632.2 L 420.4 636.8 L 399.4 636.5 L 375.4 630.2 L 375.7 625.8 L 383.2 624.7 L 385.7 623.0 L 387.0 614.9 L 385.3 610.4 L 377.4 602.6 L 375.0 598.2 L 375.6 593.9 L 369.6 588.9 L 369.2 586.6 L 362.6 583.6 L 360.7 577.6 L 352.2 571.5 L 350.1 568.2 L 356.7 571.5 L 351.6 564.4 L 359.1 566.7 L 363.5 569.6 L 363.2 565.7 L 350.9 554.9 L 352.5 550.5 L 355.6 548.6 L 357.7 544.8 L 356.0 540.3 L 362.2 534.8 L 363.4 540.6 L 369.7 535.4 L 381.9 532.8 L 389.2 529.5 L 400.7 526.7 L 407.5 526.1 L 411.6 527.1 L 423.4 524.2 L 432.5 523.4 L 434.8 521.7 L 438.8 521.0 L 447.1 521.2 L 462.8 518.9 L 471.0 515.5 L 474.8 511.4 L 483.6 507.5 L 484.7 500.3 L 495.2 493.8 L 501.5 500.4 L 507.9 498.9 L 502.5 495.2 L 507.3 491.5 L 513.9 493.2 L 515.7 487.3 L 523.9 483.6 L 527.5 480.5 L 535.1 479.2 L 535.3 477.1 L 541.9 478.0 L 542.1 476.1 L 556.0 473.9 L 567.1 477.5 L 575.4 482.0 L 594.3 482.8 L 591.1 478.6 L 598.3 472.4 L 605.1 470.4 L 602.8 468.5 L 609.3 464.1 L 618.4 461.4 L 626.0 462.3 L 638.6 460.9 L 638.4 457.0 L 627.4 454.4 L 635.4 453.3 L 645.3 455.2 L 653.3 458.4 L 665.9 460.3 L 670.2 459.5 L 679.5 461.9 L 688.2 459.7 L 693.9 460.4 L 697.4 458.9 L 704.3 462.7 L 700.3 466.8 L 694.6 469.9 L 689.4 470.2 L 691.2 473.2 L 681.4 480.8 L 682.5 483.0 L 694.4 487.2 L 706.0 489.7 L 724.5 496.9 L 728.8 496.9 L 736.6 498.8 L 738.9 501.2 L 753.2 503.8 L 763.1 501.2 L 769.1 493.6 L 775.5 483.3 L 772.8 473.0 L 774.8 467.2 L 777.6 465.7 L 775.3 463.1 L 782.2 452.7 L 787.7 449.8 L 792.0 453.5 L 793.0 458.3 L 796.7 459.3 L 797.4 462.5 L 802.8 466.4 L 803.4 473.5 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 40.1 199.0 L 39.8 204.5 L 34.5 203.4 L 35.5 209.5 L 31.2 205.5 L 27.5 197.9 L 21.3 193.5 L 7.4 193.2 L 8.8 196.3 L 4.1 200.6 L -2.3 199.0 L -4.5 200.4 L -14.5 198.9 L -16.9 192.6 L -22.1 186.8 L -19.5 182.2 L -28.7 180.2 L -25.4 177.4 L -16.0 174.5 L -26.9 170.4 L -21.6 165.2 L -9.7 168.6 L -2.5 168.9 L -1.2 174.3 L 27.0 175.2 L 35.6 176.5 L 28.7 183.0 L 22.0 183.4 L 17.4 187.8 L 25.6 191.8 L 28.0 186.9 L 32.2 186.9 L 40.1 199.0 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 363.1 333.3 L 369.0 330.4 L 381.8 326.2 L 380.2 334.9 L 373.0 334.7 L 369.9 337.3 L 363.1 333.3 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 305.1 224.8 L 292.1 228.5 L 279.8 226.1 L 279.4 219.5 L 286.8 216.0 L 303.2 213.9 L 311.8 214.1 L 315.2 217.0 L 308.6 220.4 L 305.1 224.8 Z M 564.9 -13.5 L 591.0 -11.0 L 608.7 -5.6 L 614.8 1.6 L 637.6 1.6 L 650.6 -1.4 L 675.4 -3.7 L 667.5 3.2 L 661.7 6.0 L 656.5 14.4 L 646.5 21.9 L 628.3 20.5 L 615.4 23.2 L 619.3 29.8 L 617.2 38.9 L 609.5 39.1 L 609.6 43.0 L 599.9 38.4 L 594.0 42.7 L 570.8 46.0 L 573.1 50.1 L 560.2 49.8 L 553.0 47.4 L 542.7 52.8 L 526.2 57.0 L 514.0 61.9 L 493.0 64.1 L 482.0 67.7 L 465.8 69.8 L 473.8 66.2 L 470.7 63.2 L 482.5 58.1 L 474.6 54.1 L 461.5 56.8 L 444.6 62.1 L 435.4 67.1 L 420.6 67.4 L 413.0 71.0 L 420.9 76.2 L 433.2 77.5 L 433.7 80.9 L 445.5 83.1 L 462.4 77.7 L 475.7 80.6 L 485.4 80.8 L 487.8 84.9 L 466.6 87.0 L 459.6 91.1 L 445.0 95.0 L 437.3 100.4 L 453.4 104.6 L 459.3 112.1 L 478.6 125.0 L 478.4 130.7 L 469.0 132.8 L 472.6 136.9 L 481.4 139.3 L 475.3 151.6 L 466.9 152.3 L 443.8 170.7 L 429.9 179.8 L 388.4 193.3 L 371.5 194.2 L 362.3 197.6 L 357.1 195.1 L 348.6 198.9 L 327.7 202.8 L 311.8 204.0 L 306.7 212.1 L 298.3 212.5 L 294.4 206.9 L 298.0 204.0 L 277.8 201.5 L 270.8 202.8 L 255.7 200.8 L 248.5 197.7 L 250.9 193.2 L 237.2 191.8 L 229.9 189.0 L 217.2 193.1 L 190.6 193.9 L 174.8 196.9 L 177.0 205.7 L 169.1 205.5 L 167.3 200.5 L 156.2 202.7 L 138.6 198.4 L 143.0 192.1 L 133.5 190.6 L 129.9 183.5 L 114.1 184.8 L 115.9 175.7 L 130.1 169.3 L 130.2 157.1 L 123.7 155.3 L 118.7 150.8 L 109.9 151.3 L 93.7 150.2 L 98.8 147.0 L 91.8 142.2 L 81.1 145.4 L 68.5 143.5 L 51.2 148.4 L 37.5 154.1 L 25.4 155.1 L 18.9 153.0 L 11.0 152.8 L 0.2 151.1 L -7.9 153.0 L -17.8 158.7 L -19.0 152.7 L -28.2 154.3 L -62.7 151.8 L -74.8 148.4 L -86.5 146.9 L -91.5 143.2 L -99.9 142.1 L -115.1 137.1 L -127.1 134.8 L -133.3 136.6 L -154.2 131.2 L -168.9 126.4 L -173.1 117.9 L -162.4 119.0 L -161.9 115.0 L -167.8 111.1 L -166.3 104.9 L -182.4 95.9 L -207.1 92.8 L -211.5 86.9 L -222.6 83.3 L -225.3 81.1 L -227.6 76.7 L -227.0 73.8 L -236.1 72.0 L -241.1 72.8 L -244.9 65.7 L -240.6 63.9 L -242.7 62.1 L -228.3 58.5 L -218.0 57.0 L -202.1 58.1 L -196.4 53.2 L -177.2 52.2 L -171.8 49.2 L -148.2 45.0 L -146.1 43.3 L -147.3 38.9 L -137.0 37.0 L -150.5 23.6 L -120.8 20.6 L -113.1 18.9 L -102.3 5.1 L -72.5 7.7 L -64.2 4.2 L -63.5 -3.5 L -51.0 -4.2 L -39.6 -9.3 L -33.7 -9.9 L -29.8 -4.6 L -17.2 -0.5 L 4.2 2.3 L 14.6 8.5 L 8.8 17.5 L 14.2 20.8 L 52.2 23.2 L 70.3 28.0 L 79.6 28.8 L 86.4 35.9 L 95.2 40.4 L 111.8 40.3 L 142.7 42.0 L 162.7 40.9 L 177.5 42.1 L 199.7 46.7 L 217.8 46.7 L 224.5 49.1 L 241.9 45.0 L 266.2 42.3 L 288.7 42.0 L 306.2 39.3 L 316.9 35.2 L 327.4 32.6 L 320.2 27.2 L 328.1 22.2 L 352.0 24.5 L 366.9 20.4 L 389.8 17.4 L 400.8 12.4 L 411.3 10.2 L 433.1 9.2 L 444.9 10.0 L 446.6 7.3 L 433.0 1.9 L 421.0 -0.5 L 409.4 2.3 L 394.6 1.1 L 386.1 2.1 L 382.3 -1.0 L 400.2 -14.5 L 418.2 -11.6 L 439.3 -16.4 L 439.2 -19.8 L 452.7 -27.9 L 461.1 -30.4 L 460.9 -34.6 L 452.7 -36.4 L 465.0 -40.3 L 503.6 -41.9 L 526.0 -39.6 L 539.2 -36.7 L 559.3 -21.0 L 564.9 -13.5 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 460.7 446.5 L 454.4 446.6 L 434.5 441.3 L 448.5 439.8 L 461.6 444.4 L 460.7 446.5 Z M 516.5 445.7 L 503.7 447.4 L 501.9 446.5 L 503.3 443.9 L 509.7 439.2 L 524.5 436.2 L 526.3 440.0 L 516.5 445.7 Z M 418.5 430.1 L 423.9 432.1 L 433.2 431.5 L 436.9 434.7 L 409.2 437.3 L 401.1 437.3 L 406.3 432.8 L 414.5 432.8 L 418.5 430.1 Z M 493.6 430.1 L 491.4 434.3 L 468.8 436.5 L 448.9 435.5 L 448.8 432.7 L 460.7 431.2 L 470.1 433.4 L 480.1 432.9 L 493.6 430.1 Z M 279.4 420.0 L 308.1 420.7 L 311.4 417.6 L 339.2 421.3 L 344.7 426.2 L 367.2 427.6 L 385.6 432.2 L 368.5 435.1 L 352.0 432.0 L 322.8 431.6 L 280.4 426.6 L 274.2 427.5 L 246.8 424.4 L 244.2 421.1 L 230.5 420.5 L 240.8 413.2 L 259.0 413.7 L 277.3 417.2 L 279.4 420.0 Z M 670.9 415.6 L 663.2 420.9 L 661.7 415.1 L 667.5 409.7 L 670.9 412.0 L 670.9 415.6 Z M 558.7 394.5 L 553.1 397.1 L 542.8 395.7 L 539.8 392.4 L 555.0 392.0 L 558.7 394.5 Z M 607.1 391.7 L 612.5 397.6 L 599.9 394.4 L 568.5 394.0 L 572.0 389.8 L 590.6 389.5 L 607.1 391.7 Z M 659.8 374.0 L 666.3 389.2 L 681.9 393.8 L 694.4 385.7 L 711.6 381.1 L 724.9 381.1 L 748.9 386.5 L 765.0 387.9 L 765.5 437.9 L 752.2 431.6 L 736.9 430.1 L 733.2 432.3 L 714.2 432.5 L 720.6 426.3 L 730.0 424.1 L 726.1 415.8 L 718.9 409.3 L 689.8 402.9 L 677.5 402.2 L 654.9 395.1 L 650.5 398.9 L 644.8 399.5 L 641.4 396.7 L 641.3 393.4 L 629.8 389.6 L 646.0 386.9 L 656.7 387.0 L 655.4 385.0 L 633.5 385.0 L 627.5 380.4 L 614.1 379.0 L 607.8 375.2 L 628.0 373.3 L 635.7 370.8 L 659.8 374.0 Z M 528.6 357.1 L 516.6 364.7 L 505.3 366.2 L 490.8 364.7 L 452.7 366.2 L 450.6 372.0 L 464.0 378.8 L 472.1 375.3 L 500.1 372.7 L 498.9 376.3 L 492.3 375.1 L 485.8 379.6 L 472.6 382.6 L 486.8 392.4 L 484.1 395.1 L 497.6 403.9 L 497.4 408.9 L 489.4 411.2 L 483.5 408.5 L 490.8 402.2 L 476.1 405.2 L 472.3 403.1 L 474.3 400.1 L 463.5 395.6 L 464.6 388.1 L 454.6 390.5 L 456.5 410.4 L 446.9 411.5 L 440.5 409.2 L 444.8 402.2 L 442.5 394.8 L 436.2 394.7 L 431.5 389.5 L 437.7 384.5 L 439.9 378.4 L 450.5 363.7 L 463.3 358.0 L 475.0 360.2 L 493.9 361.3 L 511.2 361.0 L 526.0 355.4 L 528.6 357.1 Z M 580.3 359.3 L 579.5 366.0 L 571.8 365.3 L 569.5 369.9 L 575.7 374.0 L 571.5 374.9 L 565.4 370.0 L 561.0 360.2 L 564.0 354.1 L 569.0 351.3 L 570.1 355.5 L 578.9 356.2 L 580.3 359.3 Z M 418.1 354.0 L 435.0 361.1 L 417.2 362.0 L 412.2 367.2 L 412.8 374.2 L 398.4 379.4 L 398.0 387.0 L 392.2 398.8 L 390.0 396.0 L 373.0 399.5 L 367.0 394.8 L 356.3 394.4 L 348.9 391.9 L 331.0 394.7 L 325.5 391.0 L 315.7 391.4 L 303.4 390.5 L 301.1 380.2 L 293.6 378.1 L 286.4 371.5 L 284.3 364.8 L 286.0 357.7 L 294.9 352.6 L 297.5 357.7 L 307.7 362.1 L 317.4 360.5 L 327.0 361.1 L 335.7 357.2 L 342.9 356.5 L 357.1 358.7 L 369.3 357.0 L 377.0 346.4 L 382.8 343.7 L 388.0 335.0 L 405.2 335.0 L 418.2 336.3 L 409.7 343.2 L 420.7 350.5 L 418.1 354.0 Z M 237.3 412.9 L 220.7 413.0 L 208.0 406.6 L 188.8 400.4 L 171.0 389.5 L 152.1 373.0 L 139.0 366.6 L 129.0 354.0 L 115.5 349.2 L 107.7 342.6 L 96.4 338.3 L 80.7 329.9 L 79.4 326.0 L 112.3 327.8 L 125.5 335.3 L 145.4 343.7 L 159.6 351.9 L 174.9 352.0 L 187.5 357.3 L 196.2 363.7 L 207.6 367.2 L 201.6 373.5 L 210.2 376.1 L 215.5 376.3 L 218.1 381.7 L 223.3 385.9 L 234.3 386.6 L 241.6 391.5 L 237.9 401.0 L 237.3 412.9 Z" fill="#25406b" stroke="#dc2626" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M -182.4 95.9 L -166.3 104.9 L -167.8 111.1 L -161.9 115.0 L -162.4 119.0 L -173.1 117.9 L -168.9 126.4 L -133.3 136.6 L -142.8 140.1 L -148.7 147.2 L -100.4 158.2 L -79.9 159.2 L -71.2 163.1 L -41.6 165.6 L -29.1 165.5 L -27.4 162.5 L -29.4 157.6 L -28.2 154.3 L -19.0 152.7 L -17.5 160.2 L -3.8 163.2 L 5.6 162.0 L 30.5 162.2 L 31.6 157.5 L 25.4 155.1 L 37.5 154.1 L 51.2 148.4 L 68.5 143.5 L 81.1 145.4 L 91.8 142.2 L 98.8 147.0 L 93.7 150.2 L 109.9 151.3 L 111.0 154.2 L 105.8 155.6 L 107.0 160.4 L 96.3 159.0 L 76.9 164.3 L 77.3 168.7 L 69.0 175.1 L 68.3 178.8 L 61.6 185.1 L 49.9 183.4 L 49.3 191.3 L 45.9 193.9 L 47.5 197.2 L 40.1 199.0 L 32.2 186.9 L 28.0 186.9 L 25.6 191.8 L 17.4 187.8 L 22.0 183.4 L 28.7 183.0 L 35.6 176.5 L 27.0 175.2 L -1.2 174.3 L -2.5 168.9 L -9.7 168.6 L -21.6 165.2 L -26.9 170.4 L -16.0 174.5 L -25.4 177.4 L -28.7 180.2 L -19.5 182.2 L -22.1 186.8 L -16.9 192.6 L -14.5 198.9 L -16.7 201.7 L -26.9 201.6 L -45.4 203.2 L -44.5 209.0 L -52.5 213.5 L -74.1 218.7 L -90.9 227.7 L -117.1 237.5 L -117.1 241.1 L -138.1 245.7 L -145.1 246.1 L -149.6 252.0 L -145.7 268.3 L -152.1 275.6 L -152.1 288.6 L -159.9 289.0 L -166.7 294.8 L -162.2 297.3 L -175.8 299.5 L -180.9 304.7 L -186.9 306.9 L -201.1 299.8 L -213.8 281.3 L -227.0 270.3 L -233.3 255.9 L -247.0 245.4 L -257.7 220.7 L -257.6 211.5 L -260.5 204.3 L -282.4 208.9 L -292.9 207.9 L -312.5 198.6 L -305.3 195.9 L -309.8 192.9 L -327.4 186.4 L -317.4 181.2 L -284.4 181.3 L -287.3 174.7 L -295.8 170.8 L -297.5 164.9 L -307.3 161.5 L -290.8 153.4 L -273.3 154.0 L -257.6 146.0 L -248.2 138.2 L -233.7 130.5 L -233.9 125.0 L -221.1 120.6 L -233.2 116.8 L -243.8 104.9 L -236.4 101.6 L -213.6 103.5 L -196.9 102.3 L -182.4 95.9 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 669.6 106.2 L 671.5 108.8 L 663.1 113.5 L 656.9 111.0 L 649.2 112.8 L 645.2 117.3 L 635.4 115.1 L 635.6 111.4 L 643.9 106.9 L 652.4 107.8 L 658.6 104.5 L 669.6 106.2 Z M 764.6 83.2 L 759.0 89.4 L 761.6 93.2 L 753.8 98.6 L 734.6 102.2 L 708.3 102.7 L 686.9 111.4 L 676.8 108.5 L 676.2 102.8 L 650.1 104.5 L 632.4 108.1 L 614.8 108.2 L 630.0 113.9 L 620.0 126.9 L 610.3 130.1 L 603.0 127.1 L 606.7 120.2 L 597.2 118.0 L 591.1 112.7 L 605.3 110.4 L 613.2 105.5 L 628.3 101.6 L 639.3 96.3 L 669.1 94.1 L 685.2 95.6 L 700.9 82.0 L 710.9 85.7 L 741.4 75.0 L 750.8 65.6 L 748.3 57.0 L 754.6 52.2 L 770.5 50.8 L 778.7 61.4 L 778.3 67.6 L 764.4 75.3 L 764.6 83.2 Z M 797.1 26.8 L 819.2 31.0 L 829.8 27.7 L 833.1 36.3 L 810.9 38.4 L 797.8 46.0 L 774.2 40.8 L 766.0 49.2 L 749.3 49.3 L 747.3 41.7 L 754.7 35.8 L 770.7 35.4 L 775.1 24.7 L 779.5 18.8 L 797.1 26.8 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 202.5 286.5 L 196.4 282.5 L 188.8 274.6 L 185.2 265.3 L 194.8 258.9 L 214.2 257.5 L 228.3 258.6 L 240.7 261.6 L 247.4 256.3 L 260.7 259.1 L 264.2 264.2 L 262.4 273.4 L 237.2 279.3 L 243.7 284.0 L 228.0 284.5 L 215.0 287.6 L 202.5 286.5 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 575.2 72.0 L 588.2 81.0 L 591.9 86.0 L 592.0 94.8 L 586.4 99.0 L 572.8 100.5 L 560.8 103.7 L 547.3 104.3 L 545.6 100.2 L 548.4 94.4 L 541.8 86.4 L 552.9 85.1 L 542.6 78.6 L 543.6 77.9 L 550.3 78.2 L 556.1 74.7 L 573.1 73.8 L 575.2 72.0 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 228.3 258.6 L 233.2 255.1 L 233.8 248.6 L 221.7 241.9 L 220.8 234.4 L 209.3 228.2 L 198.0 227.6 L 195.0 230.3 L 186.2 230.5 L 181.7 229.2 L 165.9 233.7 L 165.5 226.9 L 169.2 218.8 L 159.1 218.4 L 158.2 213.8 L 151.7 211.5 L 154.9 208.6 L 167.7 203.7 L 169.1 205.5 L 177.0 205.7 L 174.8 196.9 L 182.6 195.8 L 191.3 201.8 L 198.1 208.8 L 216.5 208.8 L 222.3 215.5 L 212.8 217.5 L 208.4 220.3 L 226.4 224.9 L 248.3 240.7 L 259.7 246.0 L 263.5 251.5 L 260.7 259.1 L 247.4 256.3 L 240.7 261.6 L 228.3 258.6 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 143.1 213.2 L 134.4 216.6 L 123.8 216.9 L 117.0 225.2 L 110.6 226.6 L 117.9 233.3 L 133.6 244.0 L 128.1 250.6 L 122.9 252.1 L 126.5 255.9 L 136.5 262.0 L 137.9 269.8 L 143.8 276.8 L 128.3 291.8 L 126.9 286.2 L 131.5 280.3 L 126.4 275.7 L 127.6 267.4 L 121.6 263.4 L 114.0 244.6 L 107.5 238.2 L 80.5 247.5 L 62.8 245.0 L 68.0 235.5 L 64.9 228.4 L 53.1 219.5 L 54.9 216.8 L 46.2 215.8 L 35.5 209.5 L 34.5 203.4 L 39.8 204.5 L 40.1 199.0 L 47.5 197.2 L 45.9 193.9 L 49.3 191.3 L 49.9 183.4 L 61.6 185.1 L 68.3 178.8 L 69.0 175.1 L 77.3 168.7 L 76.9 164.3 L 96.3 159.0 L 107.0 160.4 L 105.8 155.6 L 111.0 154.2 L 109.9 151.3 L 118.7 150.8 L 123.7 155.3 L 130.2 157.1 L 130.1 169.3 L 115.9 175.7 L 114.1 184.8 L 129.9 183.5 L 133.5 190.6 L 143.0 192.1 L 138.6 198.4 L 156.2 202.7 L 167.3 200.5 L 167.7 203.7 L 154.9 208.6 L 151.7 211.5 L 143.1 213.2 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M -33.7 -9.9 L -17.9 -11.3 L 10.7 -17.9 L 33.5 -21.5 L 46.6 -19.1 L 62.2 -19.0 L 72.2 -15.4 L 87.2 -15.2 L 108.9 -13.2 L 123.5 -18.6 L 117.4 -23.1 L 132.9 -31.0 L 149.7 -27.9 L 181.0 -25.0 L 183.8 -19.2 L 205.1 -16.0 L 238.3 -18.4 L 253.3 -17.4 L 268.0 -13.8 L 277.1 -9.8 L 309.9 -8.7 L 343.5 -11.8 L 365.4 -17.2 L 374.4 -16.4 L 382.3 -13.8 L 400.2 -14.5 L 382.3 -1.0 L 386.1 2.1 L 394.6 1.1 L 409.4 2.3 L 421.0 -0.5 L 433.0 1.9 L 446.6 7.3 L 444.9 10.0 L 433.1 9.2 L 411.3 10.2 L 400.8 12.4 L 389.8 17.4 L 366.9 20.4 L 352.0 24.5 L 328.1 22.2 L 320.2 27.2 L 327.4 32.6 L 316.9 35.2 L 306.2 39.3 L 288.7 42.0 L 266.2 42.3 L 241.9 45.0 L 224.5 49.1 L 217.8 46.7 L 199.7 46.7 L 177.5 42.1 L 162.7 40.9 L 142.7 42.0 L 111.8 40.3 L 95.2 40.4 L 86.4 35.9 L 79.6 28.8 L 70.3 28.0 L 52.2 23.2 L 14.2 20.8 L 8.8 17.5 L 14.6 8.5 L 4.2 2.3 L -17.2 -0.5 L -29.8 -4.6 L -33.7 -9.9 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 166.1 320.4 L 167.3 324.4 L 177.2 323.5 L 182.1 320.3 L 194.4 325.6 L 200.7 330.8 L 201.6 335.9 L 200.0 339.4 L 202.5 346.6 L 207.8 348.7 L 213.7 355.5 L 213.4 358.1 L 202.8 358.6 L 170.9 346.8 L 169.1 342.9 L 160.4 337.8 L 158.4 331.5 L 153.0 327.3 L 154.6 321.7 L 151.3 318.4 L 153.9 317.1 L 166.1 320.4 Z M 429.3 333.7 L 418.2 336.3 L 405.2 335.0 L 388.0 335.0 L 382.8 343.7 L 377.0 346.4 L 369.3 357.0 L 357.1 358.7 L 342.9 356.5 L 335.7 357.2 L 327.0 361.1 L 317.4 360.5 L 307.7 362.1 L 297.5 357.7 L 294.9 352.6 L 305.9 355.2 L 317.5 353.8 L 320.6 347.3 L 344.9 344.2 L 363.1 333.3 L 369.9 337.3 L 373.0 334.7 L 380.2 334.9 L 381.8 326.2 L 393.3 320.9 L 400.9 314.9 L 406.9 314.9 L 414.7 318.8 L 415.3 322.1 L 437.7 326.5 L 436.7 329.5 L 426.6 329.9 L 429.3 333.7 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 543.3 296.8 L 548.1 312.9 L 543.0 319.9 L 537.5 312.1 L 530.5 316.0 L 535.2 321.6 L 530.9 325.2 L 513.3 320.8 L 509.1 315.2 L 513.7 311.6 L 504.2 307.9 L 499.4 311.1 L 492.4 310.8 L 481.3 315.1 L 478.8 312.9 L 484.7 306.4 L 502.3 301.4 L 507.6 304.8 L 519.0 302.7 L 521.5 299.3 L 532.1 299.1 L 531.2 293.2 L 543.3 296.8 Z M 509.7 289.2 L 494.9 298.8 L 485.7 293.5 L 492.6 289.3 L 494.2 284.6 L 502.5 284.1 L 500.1 289.3 L 511.2 281.9 L 509.7 289.2 Z M 427.6 296.6 L 407.6 303.8 L 415.0 298.5 L 434.8 288.4 L 442.7 280.8 L 445.3 287.1 L 435.4 291.3 L 427.6 296.6 Z M 478.3 276.8 L 487.3 279.2 L 496.8 279.2 L 496.5 282.4 L 489.6 285.6 L 480.0 288.0 L 480.6 280.5 L 478.3 276.8 Z M 532.5 274.8 L 536.8 283.3 L 525.2 281.3 L 529.2 288.6 L 522.0 290.3 L 521.4 284.9 L 516.9 284.5 L 514.5 279.9 L 523.4 280.5 L 523.2 277.6 L 514.0 271.7 L 528.4 271.9 L 532.5 274.8 Z M 472.9 267.8 L 468.9 274.4 L 454.9 264.8 L 467.7 265.0 L 472.9 267.8 Z M 469.8 226.1 L 479.1 228.3 L 483.7 226.3 L 485.1 228.3 L 482.6 231.5 L 487.7 236.9 L 483.8 243.3 L 474.9 245.9 L 472.6 252.0 L 475.9 258.1 L 483.9 259.0 L 490.5 258.1 L 509.3 262.3 L 507.8 266.5 L 512.7 268.4 L 511.2 271.9 L 499.5 268.1 L 493.9 264.1 L 490.1 266.9 L 480.5 262.3 L 466.9 263.5 L 459.4 261.8 L 460.2 258.6 L 464.9 256.6 L 460.4 254.9 L 458.5 257.6 L 451.1 253.2 L 448.8 249.9 L 448.3 242.5 L 454.3 245.1 L 455.9 233.1 L 460.7 226.1 L 469.8 226.1 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 988.2 420.3 L 984.0 421.1 L 977.5 418.1 L 970.9 413.2 L 967.7 407.4 L 969.8 406.7 L 971.4 408.9 L 990.3 418.1 L 988.2 420.3 Z M 929.7 410.0 L 921.9 410.6 L 919.5 412.8 L 903.6 416.4 L 895.6 416.4 L 874.8 412.1 L 876.0 409.7 L 889.5 410.8 L 897.7 410.2 L 899.9 406.5 L 902.1 406.3 L 903.6 410.4 L 912.1 409.8 L 916.3 407.2 L 924.7 404.5 L 923.1 400.0 L 932.1 399.8 L 935.1 401.1 L 934.8 405.3 L 929.7 410.0 Z M 857.9 424.6 L 871.3 429.7 L 881.0 437.8 L 889.6 437.5 L 889.0 440.9 L 900.6 442.2 L 896.1 443.7 L 912.0 446.9 L 910.4 449.1 L 900.4 449.7 L 896.7 447.7 L 868.7 445.7 L 848.5 436.6 L 840.7 429.9 L 821.2 426.5 L 799.3 431.2 L 801.2 436.9 L 789.4 439.5 L 781.0 438.2 L 765.5 437.9 L 765.0 387.9 L 818.8 397.6 L 837.4 405.4 L 839.7 409.9 L 864.7 414.6 L 868.4 418.7 L 854.6 419.5 L 857.9 424.6 Z M 947.1 402.5 L 942.4 404.5 L 936.1 397.1 L 920.8 391.3 L 909.9 389.0 L 914.1 387.2 L 933.6 392.8 L 945.3 398.5 L 947.1 402.5 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 599.9 38.4 L 611.7 44.3 L 606.0 43.9 L 595.0 49.1 L 595.6 54.6 L 587.8 56.3 L 579.5 59.9 L 569.5 61.1 L 563.0 63.2 L 562.5 66.5 L 560.8 67.4 L 575.2 72.0 L 573.1 73.8 L 556.1 74.7 L 550.3 78.2 L 543.6 77.9 L 542.6 78.6 L 535.3 77.1 L 533.5 78.6 L 529.1 79.2 L 528.6 77.8 L 520.7 75.8 L 524.8 72.5 L 528.3 71.6 L 527.0 70.2 L 530.8 66.0 L 529.8 64.8 L 521.1 63.9 L 514.0 61.9 L 526.2 57.0 L 542.7 52.8 L 553.0 47.4 L 560.2 49.8 L 573.1 50.1 L 570.8 46.0 L 594.0 42.7 L 599.9 38.4 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 804.7 -21.1 L 819.8 -7.5 L 797.6 -10.0 L 788.4 1.1 L 803.0 8.9 L 802.6 14.3 L 791.2 9.7 L 781.4 15.6 L 778.6 9.2 L 780.3 1.7 L 778.6 -6.6 L 782.0 -12.4 L 782.7 -22.6 L 773.9 -30.2 L 775.2 -40.6 L 789.1 -44.2 L 783.1 -47.7 L 789.8 -48.8 L 798.9 -36.3 L 798.5 -28.8 L 804.7 -21.1 Z M -1009.0 -48.5 L -1036.6 -48.4 L -1055.1 -49.3 L -1051.7 -52.6 L -1031.0 -55.1 L -1008.6 -52.6 L -1010.2 -50.5 L -1009.0 -48.5 Z M -3975.2 -142.5 L -3965.1 -140.6 L -3968.6 -146.1 L -3927.9 -145.0 L -3898.5 -137.8 L -3913.4 -134.5 L -3938.0 -133.7 L -3938.3 -126.2 L -3944.3 -124.6 L -3958.4 -124.8 L -3969.8 -127.5 L -3989.8 -129.7 L -3993.1 -133.1 L -4008.3 -134.3 L -4025.4 -133.3 L -4033.5 -136.0 L -4030.3 -138.9 L -4048.3 -137.0 L -4041.5 -133.4 L -4050.0 -130.2 L -4050.0 -160.7 L -4013.2 -154.9 L -3973.9 -147.2 L -3975.2 -142.5 Z M 1350.0 -175.0 L 1333.6 -174.7 L 1330.9 -177.1 L 1350.0 -180.3 L 1350.0 -175.0 Z M -4030.4 -175.5 L -4050.0 -175.0 L -4050.0 -180.3 L -4035.4 -180.6 L -4013.7 -178.4 L -4015.0 -177.4 L -4030.4 -175.5 Z M 804.1 -193.3 L 781.3 -193.2 L 747.9 -194.5 L 762.2 -197.5 L 780.9 -198.2 L 802.2 -195.3 L 804.1 -193.3 Z M 911.0 -207.6 L 893.6 -204.6 L 869.7 -205.3 L 841.8 -208.3 L 845.4 -210.8 L 911.0 -207.6 Z M 826.3 -211.3 L 814.5 -205.6 L 759.2 -205.8 L 734.3 -204.0 L 704.6 -209.0 L 712.7 -214.3 L 732.5 -215.7 L 772.1 -215.4 L 826.3 -211.3 Z M -487.0 -174.2 L -495.8 -173.5 L -544.8 -174.5 L -548.8 -177.9 L -576.0 -180.0 L -578.2 -184.1 L -562.8 -185.8 L -563.3 -189.9 L -533.6 -196.5 L -547.4 -197.4 L -511.5 -204.1 L -515.5 -207.6 L -432.4 -216.6 L -382.5 -218.0 L -356.8 -220.9 L -327.6 -221.9 L -317.2 -218.8 L -327.3 -216.5 L -426.2 -209.0 L -472.8 -201.7 L -518.7 -186.8 L -515.7 -180.5 L -487.0 -174.2 Z M 254.6 -222.1 L 258.6 -218.3 L 272.3 -220.2 L 316.2 -220.1 L 350.0 -216.4 L 362.0 -213.5 L 358.3 -209.5 L 302.3 -203.0 L 291.0 -200.7 L 331.8 -197.7 L 345.3 -199.2 L 352.9 -194.2 L 359.5 -196.2 L 383.5 -197.4 L 431.6 -196.2 L 435.3 -192.6 L 498.0 -191.4 L 498.9 -197.3 L 554.6 -196.0 L 578.9 -192.0 L 585.8 -187.1 L 576.9 -183.8 L 595.7 -177.8 L 619.3 -174.7 L 633.8 -182.7 L 657.9 -179.3 L 683.4 -181.4 L 712.5 -179.0 L 723.5 -181.1 L 748.0 -180.1 L 737.2 -187.2 L 757.0 -190.5 L 892.5 -185.5 L 905.3 -181.0 L 944.5 -175.1 L 1005.1 -176.6 L 1035.0 -175.3 L 1047.5 -172.1 L 1045.6 -166.5 L 1064.1 -164.4 L 1084.2 -165.9 L 1110.8 -166.1 L 1139.1 -164.6 L 1167.5 -165.5 L 1193.7 -158.7 L 1212.3 -161.1 L 1200.1 -166.0 L 1206.8 -169.4 L 1254.7 -167.3 L 1285.9 -167.7 L 1329.0 -164.1 L 1350.0 -160.7 L 1350.0 -130.2 L 1330.6 -126.8 L 1311.2 -127.3 L 1324.7 -123.2 L 1333.6 -116.9 L 1340.6 -114.9 L 1342.3 -111.7 L 1338.4 -109.7 L 1310.5 -111.3 L 1268.5 -105.6 L 1255.2 -104.7 L 1210.5 -94.6 L 1205.0 -91.1 L 1183.5 -96.4 L 1144.4 -90.4 L 1137.6 -93.2 L 1123.2 -89.9 L 1103.1 -91.0 L 1098.3 -86.0 L 1080.3 -78.5 L 1080.8 -75.4 L 1097.9 -73.7 L 1095.9 -62.6 L 1081.9 -62.3 L 1075.5 -55.9 L 1081.8 -52.6 L 1055.5 -48.6 L 1050.3 -39.9 L 1028.0 -38.0 L 1023.5 -30.2 L 1001.8 -23.1 L 996.3 -28.4 L 981.5 -56.6 L 988.7 -67.2 L 1001.4 -71.8 L 1002.2 -75.4 L 1025.5 -77.1 L 1078.1 -94.6 L 1105.0 -100.7 L 1117.1 -111.6 L 1098.9 -110.9 L 1089.9 -104.6 L 1051.8 -96.2 L 1039.5 -105.6 L 1000.8 -103.0 L 963.3 -90.1 L 975.7 -85.4 L 919.0 -82.7 L 920.1 -88.2 L 896.8 -89.4 L 878.2 -85.6 L 832.3 -86.9 L 783.0 -84.6 L 676.9 -51.6 L 700.5 -50.6 L 707.9 -45.8 L 722.5 -44.1 L 732.1 -48.0 L 748.5 -47.5 L 770.2 -39.0 L 770.7 -32.5 L 759.0 -24.8 L 757.7 -15.7 L 750.9 -3.4 L 728.3 7.7 L 723.3 13.0 L 673.0 35.3 L 653.1 39.8 L 643.6 39.9 L 634.2 36.2 L 614.0 41.8 L 611.7 44.3 L 609.6 43.0 L 609.5 39.1 L 617.2 38.9 L 619.3 29.8 L 615.4 23.2 L 628.3 20.5 L 646.5 21.9 L 656.5 14.4 L 661.7 6.0 L 667.5 3.2 L 675.4 -3.7 L 650.6 -1.4 L 637.6 1.6 L 614.8 1.6 L 608.7 -5.6 L 591.0 -11.0 L 564.9 -13.5 L 559.3 -21.0 L 539.2 -36.7 L 526.0 -39.6 L 503.6 -41.9 L 465.0 -40.3 L 452.7 -36.4 L 460.9 -34.6 L 461.1 -30.4 L 452.7 -27.9 L 439.2 -19.8 L 439.3 -16.4 L 418.2 -11.6 L 400.2 -14.5 L 382.3 -13.8 L 374.4 -16.4 L 365.4 -17.2 L 343.5 -11.8 L 309.9 -8.7 L 277.1 -9.8 L 268.0 -13.8 L 253.3 -17.4 L 238.3 -18.4 L 205.1 -16.0 L 183.8 -19.2 L 181.0 -25.0 L 149.7 -27.9 L 132.9 -31.0 L 117.4 -23.1 L 123.5 -18.6 L 108.9 -13.2 L 87.2 -15.2 L 72.2 -15.4 L 62.2 -19.0 L 46.6 -19.1 L 33.5 -21.5 L 10.7 -17.9 L -17.9 -11.3 L -39.6 -9.3 L -47.6 -14.0 L -66.9 -13.0 L -73.3 -16.2 L -83.8 -17.7 L -91.0 -22.2 L -99.3 -23.5 L -120.8 -21.6 L -141.5 -26.0 L -149.5 -22.0 L -183.0 -41.4 L -202.1 -47.4 L -196.6 -49.8 L -234.2 -42.5 L -248.6 -42.1 L -247.4 -46.3 L -266.6 -48.9 L -282.3 -47.0 L -287.0 -55.0 L -314.0 -56.6 L -327.5 -53.4 L -365.0 -50.6 L -372.3 -48.7 L -428.5 -46.0 L -435.3 -43.4 L -424.5 -38.2 L -438.9 -36.2 L -436.1 -34.1 L -450.5 -30.4 L -426.2 -25.1 L -429.9 -21.5 L -451.0 -21.8 L -455.4 -19.5 L -474.6 -23.5 L -498.3 -23.3 L -514.2 -20.1 L -565.1 -28.5 L -588.5 -28.3 L -619.5 -20.0 L -621.3 -14.4 L -636.8 -18.8 L -648.7 -10.4 L -644.3 -8.8 L -653.0 -3.0 L -640.3 2.2 L -629.1 2.0 L -619.6 7.1 L -621.1 11.0 L -613.5 12.3 L -620.3 16.8 L -634.9 18.1 L -649.8 26.0 L -636.1 33.3 L -637.6 38.4 L -621.2 47.5 L -630.2 50.6 L -632.8 52.5 L -639.4 52.0 L -649.7 47.3 L -663.4 45.3 L -667.9 42.1 L -681.9 40.5 L -691.0 41.7 L -693.7 40.3 L -714.1 36.6 L -748.8 34.1 L -750.7 35.0 L -769.8 28.5 L -786.9 25.6 L -799.9 21.1 L -789.0 19.9 L -776.5 13.5 L -784.9 10.5 L -762.8 7.3 L -763.2 5.6 L -776.6 6.9 L -776.2 3.5 L -768.4 1.3 L -753.9 0.8 L -751.6 -1.8 L -754.9 -6.0 L -748.8 -10.0 L -749.0 -12.3 L -771.1 -14.8 L -779.8 -14.7 L -789.1 -18.3 L -800.6 -17.1 L -819.7 -19.8 L -819.3 -21.3 L -824.7 -24.6 L -836.6 -25.0 L -837.9 -27.3 L -834.1 -28.9 L -843.7 -33.2 L -863.8 -32.9 L -867.6 -31.1 L -873.2 -31.4 L -880.4 -38.9 L -877.5 -39.6 L -865.4 -39.4 L -859.6 -41.0 L -863.9 -43.1 L -874.0 -44.4 L -873.1 -45.8 L -879.2 -47.2 L -888.6 -52.2 L -885.4 -54.3 L -886.9 -57.9 L -901.6 -59.7 L -909.4 -58.8 L -911.6 -60.7 L -927.3 -62.6 L -932.2 -67.2 L -933.4 -70.9 L -940.7 -72.6 L -934.2 -75.1 L -938.7 -82.2 L -928.0 -86.6 L -930.3 -88.0 L -913.2 -92.2 L -929.0 -95.9 L -882.9 -110.1 L -877.3 -114.0 L -899.5 -119.2 L -893.3 -124.2 L -906.8 -129.9 L -896.7 -136.5 L -914.2 -145.2 L -900.3 -151.0 L -923.3 -156.1 L -921.1 -161.5 L -883.5 -165.3 L -868.0 -167.9 L -843.4 -163.3 L -802.3 -161.5 L -745.6 -152.8 L -734.1 -149.2 L -733.1 -144.1 L -749.8 -140.0 L -774.3 -138.0 L -841.2 -143.8 L -852.2 -142.8 L -827.8 -137.2 L -825.8 -125.8 L -794.8 -121.5 L -792.9 -125.2 L -801.9 -128.5 L -792.4 -131.4 L -756.1 -126.7 L -743.5 -128.5 L -753.6 -134.1 L -718.6 -141.7 L -704.8 -141.2 L -690.8 -138.5 L -682.0 -143.8 L -694.5 -148.4 L -687.2 -153.0 L -698.2 -157.7 L -656.2 -155.2 L -647.7 -151.0 L -666.7 -150.0 L -666.6 -145.7 L -654.8 -143.1 L -631.6 -144.8 L -627.9 -149.7 L -544.2 -159.9 L -532.9 -159.5 L -547.7 -154.9 L -529.1 -154.1 L -518.4 -156.7 L -490.2 -156.9 L -468.0 -160.1 L -450.9 -155.5 L -433.8 -160.5 L -449.6 -165.0 L -441.8 -167.5 L -397.4 -165.2 L -376.7 -162.8 L -322.3 -154.0 L -312.3 -158.1 L -327.5 -162.1 L -328.0 -163.7 L -346.0 -164.5 L -341.1 -168.1 L -349.1 -174.1 L -349.6 -176.6 L -321.9 -183.5 L -312.1 -190.5 L -300.9 -192.0 L -261.2 -190.0 L -258.1 -185.7 L -272.3 -179.5 L -262.9 -177.0 L -258.1 -171.7 L -261.5 -161.2 L -245.0 -156.5 L -251.4 -151.3 L -280.8 -140.5 L -263.7 -139.3 L -257.7 -142.1 L -241.2 -144.1 L -237.2 -147.8 L -224.2 -151.5 L -233.0 -155.9 L -226.0 -160.9 L -242.4 -161.5 L -246.0 -165.8 L -234.0 -173.5 L -253.5 -179.8 L -226.6 -184.9 L -230.1 -190.4 L -222.6 -190.6 L -214.7 -186.3 L -220.7 -178.9 L -204.6 -177.5 L -211.5 -183.0 L -186.4 -186.0 L -155.2 -186.5 L -127.5 -182.1 L -140.8 -188.5 L -142.3 -196.6 L -116.3 -198.2 L -80.2 -197.8 L -47.7 -198.8 L -59.9 -202.9 L -42.5 -207.9 L -25.3 -208.1 L 3.9 -211.9 L 43.5 -212.9 L 48.5 -215.0 L 87.9 -215.7 L 100.2 -214.0 L 133.8 -218.1 L 161.4 -218.0 L 165.5 -221.3 L 179.9 -224.5 L 215.3 -227.7 L 241.0 -225.2 L 220.6 -223.3 L 254.6 -222.1 Z M 226.1 -232.4 L 141.6 -229.4 L 169.0 -239.5 L 181.3 -240.3 L 230.6 -235.5 L 226.1 -232.4 Z M -583.0 -249.5 L -616.6 -247.9 L -618.7 -246.7 L -636.2 -245.4 L -652.5 -247.2 L -643.9 -249.6 L -677.3 -249.9 L -625.2 -251.3 L -622.2 -249.3 L -613.5 -251.1 L -599.4 -252.4 L -577.2 -250.7 L -583.0 -249.5 Z M 149.1 -236.8 L 116.4 -235.8 L 74.6 -238.0 L 49.7 -240.9 L 38.2 -246.4 L 17.7 -248.0 L 56.7 -253.2 L 89.1 -254.9 L 118.3 -251.1 L 152.8 -243.6 L 149.1 -236.8 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 188.8 274.6 L 175.3 271.0 L 162.5 271.2 L 164.7 265.2 L 151.5 265.2 L 150.3 273.6 L 137.3 291.6 L 138.3 297.2 L 148.1 297.4 L 154.2 304.4 L 156.9 311.0 L 165.3 315.4 L 174.3 316.3 L 182.1 320.3 L 177.2 323.5 L 167.3 324.4 L 166.1 320.4 L 153.9 317.1 L 151.3 318.4 L 145.4 315.5 L 142.8 311.7 L 127.6 303.7 L 125.1 308.2 L 122.3 304.0 L 128.3 291.8 L 143.8 276.8 L 137.9 269.8 L 136.5 262.0 L 126.5 255.9 L 122.9 252.1 L 128.1 250.6 L 133.6 244.0 L 117.9 233.3 L 110.6 226.6 L 117.0 225.2 L 123.8 216.9 L 134.4 216.6 L 143.1 213.2 L 151.7 211.5 L 158.2 213.8 L 159.1 218.4 L 169.2 218.8 L 165.5 226.9 L 165.9 233.7 L 181.7 229.2 L 186.2 230.5 L 195.0 230.3 L 198.0 227.6 L 209.3 228.2 L 220.8 234.4 L 221.7 241.9 L 233.8 248.6 L 233.2 255.1 L 228.3 258.6 L 214.2 257.5 L 194.8 258.9 L 185.2 265.3 L 188.8 274.6 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 524.5 436.2 L 526.3 434.4 L 539.2 432.6 L 554.4 431.4 L 560.0 432.4 L 554.5 434.5 L 526.3 440.0 L 524.5 436.2 Z" fill="#25406b" stroke="#dc2626" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 479.3 176.4 L 467.6 193.3 L 461.2 199.6 L 453.3 193.1 L 451.6 187.4 L 460.4 179.9 L 472.4 174.1 L 479.3 176.4 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
<path d="M 270.8 202.8 L 250.7 209.3 L 238.2 216.6 L 234.9 221.9 L 260.4 240.0 L 274.0 244.7 L 283.2 250.9 L 290.0 265.1 L 288.0 278.6 L 275.5 283.6 L 258.3 288.5 L 246.1 294.9 L 227.4 302.1 L 221.9 297.2 L 226.1 292.0 L 215.0 287.6 L 228.0 284.5 L 243.7 284.0 L 237.2 279.3 L 262.4 273.4 L 264.2 264.2 L 260.7 259.1 L 263.5 251.5 L 259.7 246.0 L 248.3 240.7 L 226.4 224.9 L 208.4 220.3 L 212.8 217.5 L 222.3 215.5 L 216.5 208.8 L 198.1 208.8 L 191.3 201.8 L 182.6 195.8 L 190.6 193.9 L 217.2 193.1 L 229.9 189.0 L 237.2 191.8 L 250.9 193.2 L 248.5 197.7 L 255.7 200.8 L 270.8 202.8 Z" fill="#16233f" stroke="#334155" stroke-width="0.6" stroke-opacity="0.7" />
                </g>

                <!-- Label negara -->
                <text x="330" y="430" fill="#93c5fd" font-size="12" font-weight="800" letter-spacing="1.5">INDONESIA</text>
                <text x="100" y="300" fill="#94a3b8" font-size="10" font-weight="700" letter-spacing="1">THAILAND</text>
                <text x="185" y="345" fill="#94a3b8" font-size="9" font-weight="700" letter-spacing="1">BATAM</text>
                <text x="500" y="90" fill="#94a3b8" font-size="11" font-weight="700" letter-spacing="1">CHINA</text>
                <text x="700" y="70" fill="#94a3b8" font-size="10" font-weight="700" letter-spacing="1">JEPANG</text>

                <!-- Rute: Patimban -> Batam -->
                <path id="rutePatBatam" d="M268 416 Q 235 388 210 360" stroke="#38bdf8" stroke-width="1.6" stroke-dasharray="4 5" fill="none" opacity="0.85" />
                <circle r="4.5" fill="#38bdf8" stroke="#ffffff" stroke-width="1">
                    <animateMotion dur="3.5s" repeatCount="indefinite" rotate="auto">
                        <mpath href="#rutePatBatam"/>
                    </animateMotion>
                </circle>

                <!-- Rute: Patimban -> Thailand (Bangkok) -->
                <path id="rutePatThailand" d="M268 416 Q 200 330 158 263" stroke="#facc15" stroke-width="1.6" stroke-dasharray="4 5" fill="none" opacity="0.85" />
                <circle r="4.5" fill="#facc15" stroke="#ffffff" stroke-width="1">
                    <animateMotion dur="6.5s" repeatCount="indefinite" rotate="auto">
                        <mpath href="#rutePatThailand"/>
                    </animateMotion>
                </circle>

                <!-- Rute: Patimban -> China (Shanghai) -->
                <path id="rutePatChina" d="M268 416 Q 350 250 472 129" stroke="#ef4444" stroke-width="1.6" stroke-dasharray="4 5" fill="none" opacity="0.85" />
                <circle r="4.5" fill="#ef4444" stroke="#ffffff" stroke-width="1">
                    <animateMotion dur="7.5s" repeatCount="indefinite" rotate="auto">
                        <mpath href="#rutePatChina"/>
                    </animateMotion>
                </circle>

                <!-- Rute: Patimban -> Jepang (Tokyo) -->
                <path id="rutePatJepang" d="M268 416 Q 480 260 745 95" stroke="#34d399" stroke-width="1.6" stroke-dasharray="4 5" fill="none" opacity="0.85" />
                <circle r="4.5" fill="#34d399" stroke="#ffffff" stroke-width="1">
                    <animateMotion dur="9s" repeatCount="indefinite" rotate="auto">
                        <mpath href="#rutePatJepang"/>
                    </animateMotion>
                </circle>

                <!-- Rute: Patimban -> Asia & Global (keluar sisi kanan peta) -->
                <path id="rutePatAsia" d="M275 420 Q 560 400 880 340" stroke="#f97316" stroke-width="1.6" stroke-dasharray="4 5" fill="none" opacity="0.85" />
                <circle r="4.5" fill="#f97316" stroke="#ffffff" stroke-width="1">
                    <animateMotion dur="8s" repeatCount="indefinite" rotate="auto">
                        <mpath href="#rutePatAsia"/>
                    </animateMotion>
                </circle>
                <path d="M880 340 L 862 331 L 866 340 L 862 349 Z" fill="#f97316" />
                <text x="795" y="368" fill="#fdba74" font-size="10" font-weight="700" letter-spacing="1">ASIA &amp; GLOBAL</text>

                <!-- Titik kota tujuan -->
                <circle cx="210" cy="360" r="4" fill="#38bdf8" stroke="#ffffff" stroke-width="1" />
                <circle cx="158" cy="263" r="4" fill="#facc15" stroke="#ffffff" stroke-width="1" />
                <circle cx="472" cy="129" r="4" fill="#ef4444" stroke="#ffffff" stroke-width="1" />
                <circle cx="745" cy="95" r="4" fill="#34d399" stroke="#ffffff" stroke-width="1" />

                <!-- Titik asal: Pelabuhan Patimban -->
                <circle cx="268" cy="416" r="18" fill="url(#patimbanGlow)">
                    <animate attributeName="r" values="10;20;10" dur="2.4s" repeatCount="indefinite" />
                    <animate attributeName="opacity" values="0.7;0.1;0.7" dur="2.4s" repeatCount="indefinite" />
                </circle>
                <circle cx="268" cy="416" r="5.5" fill="#dc2626" stroke="#ffffff" stroke-width="1.5" />
                <text x="150" y="446" fill="#ffffff" font-size="12" font-weight="800" letter-spacing="1">PELABUHAN PATIMBAN — SUBANG, JAWA BARAT</text>
            </svg>

            <!-- Legenda -->
            <div class="flex flex-wrap gap-x-6 gap-y-2 justify-center mt-6 pt-5 border-t border-white/10">
                <span class="flex items-center gap-2 text-xs font-semibold text-slate-300"><span class="w-2.5 h-2.5 rounded-full bg-red-600 inline-block"></span>Patimban (Asal)</span>
                <span class="flex items-center gap-2 text-xs font-semibold text-slate-300"><span class="w-2.5 h-2.5 rounded-full bg-sky-400 inline-block"></span>Batam</span>
                <span class="flex items-center gap-2 text-xs font-semibold text-slate-300"><span class="w-2.5 h-2.5 rounded-full bg-yellow-400 inline-block"></span>Thailand</span>
                <span class="flex items-center gap-2 text-xs font-semibold text-slate-300"><span class="w-2.5 h-2.5 rounded-full bg-red-500 inline-block"></span>China</span>
                <span class="flex items-center gap-2 text-xs font-semibold text-slate-300"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 inline-block"></span>Jepang</span>
                <span class="flex items-center gap-2 text-xs font-semibold text-slate-300"><span class="w-2.5 h-2.5 rounded-full bg-orange-500 inline-block"></span>Asia &amp; Global</span>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 6. LOKASI & FASILITAS ═══ -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-bold text-xs sm:text-sm tracking-wider uppercase">06 — Sarana Prasarana</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Lokasi &amp; Fasilitas</h2>
            </div>
            <a href="{{ url('/location') }}" class="text-blue-900 font-bold hover:text-red-600 transition flex items-center gap-1 text-sm">
                Lihat Peta Lokasi <span class="text-lg">&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <div class="lg:col-span-8 bg-slate-50 border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="p-5 bg-blue-950 text-white font-bold text-base flex justify-between items-center">
                    <span>Parameter Fasilitas Utama</span>
                    <span class="text-xs font-normal text-slate-300">Tahap 1 Operasional Aktif</span>
                </div>
                <div class="divide-y divide-slate-200 text-sm">
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Alamat Pelabuhan</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">Pelabuhan Patimban, Pusakanagara, Kab. Subang, Jawa Barat</span>
                    </div>
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Panjang Dermaga Ro-Ro</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">300 meter</span>
                    </div>
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Kedalaman Kolam (Draft)</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">-10.0 m LWS (Mampu disandari Kapal Car Carrier Besar)</span>
                    </div>
                    <div class="flex flex-col sm:flex-row p-4 justify-between hover:bg-slate-100 transition">
                        <span class="font-semibold text-slate-700 sm:w-1/2">Area Penumpukan (Staging Yard)</span>
                        <span class="text-slate-900 font-medium sm:w-1/2">Kapasitas hingga 218.000 unit CBU per tahun</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-4">
                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-blue-950 text-base mb-2">Keselamatan &amp; Keamanan K3</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Sistem pengamanan ISPS Code standar IMO dan perlindungan CCTV 24/7 di seluruh perimeter penumpukan kendaraan.
                    </p>
                </div>
                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-blue-950 text-base mb-2">Green Port Initiative</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Pengurangan emisi karbon operasional lewat efisiensi energi terminal dan manajemen limbah maritim berkelanjutan.
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
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Siap Bermitra dengan PICT?</h4>
            <p class="text-red-100 text-sm sm:text-base mt-1">Dapatkan penawaran tarif dan integrasi layanan terminal kendaraan terbaik.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ url('/location') }}" class="inline-block bg-blue-950 hover:bg-blue-900 text-white font-bold py-3.5 px-8 rounded-xl text-sm transition shadow-xl whitespace-nowrap">
                LOKASI TERMINAL
            </a>
            <a href="{{ url('/contact') }}" class="inline-block bg-white text-red-600 hover:bg-slate-100 font-bold py-3.5 px-8 rounded-xl text-sm transition shadow-xl whitespace-nowrap">
                Contact Us &rarr;
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<!-- OGL Library CDN untuk menjalankan shader WebGL SideRays -->
<script src="https://cdn.jsdelivr.net/npm/ogl@0.0.116/dist/ogl.umd.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('sideRaysCanvas');
    if (!container || typeof ogl === 'undefined') return;

    const { Renderer, Program, Triangle, Mesh } = ogl;

    const hexToRgb = hex => {
        const m = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return m ? [parseInt(m[1], 16) / 255, parseInt(m[2], 16) / 255, parseInt(m[3], 16) / 255] : [1, 1, 1];
    };

    const config = {
        speed: 2.5,
        rayColor1: '#EAB308',
        rayColor2: '#96c8ff',
        intensity: 2.0,
        spread: 2.0,
        origin: 'top-right',
        tilt: 0,
        saturation: 1.5,
        blend: 0.75,
        falloff: 1.6,
        opacity: 0.95
    };

    const originToFlip = origin => {
        switch (origin) {
            case 'top-left': return [1, 0];
            case 'bottom-right': return [0, 1];
            case 'bottom-left': return [1, 1];
            default: return [0, 0]; // top-right
        }
    };

    const renderer = new Renderer({
        dpr: Math.min(window.devicePixelRatio, 2),
        alpha: true
    });

    const gl = renderer.gl;
    gl.canvas.style.width = '100%';
    gl.canvas.style.height = '100%';
    gl.canvas.style.display = 'block';
    container.appendChild(gl.canvas);

    const vert = `
        attribute vec2 position;
        void main() {
            gl_Position = vec4(position, 0.0, 1.0);
        }
    `;

    const frag = `
        precision highp float;
        uniform float iTime;
        uniform vec2 iResolution;
        uniform float iSpeed;
        uniform vec3 iRayColor1;
        uniform vec3 iRayColor2;
        uniform float iIntensity;
        uniform float iSpread;
        uniform float iFlipX;
        uniform float iFlipY;
        uniform float iTilt;
        uniform float iSaturation;
        uniform float iBlend;
        uniform float iFalloff;
        uniform float iOpacity;

        float rayStrength(vec2 raySource, vec2 rayRefDirection, vec2 coord, float seedA, float seedB, float speed) {
            vec2 sourceToCoord = coord - raySource;
            float cosAngle = dot(normalize(sourceToCoord), rayRefDirection);
            return clamp(
                (0.45 + 0.15 * sin(cosAngle * seedA + iTime * speed)) +
                (0.3 + 0.2 * cos(-cosAngle * seedB + iTime * speed)),
                0.0, 1.0) *
                clamp((iResolution.x - length(sourceToCoord)) / iResolution.x, 0.5, 1.0);
        }

        void main() {
            vec2 fragCoord = gl_FragCoord.xy;
            if (iFlipX > 0.5) fragCoord.x = iResolution.x - fragCoord.x;
            if (iFlipY > 0.5) fragCoord.y = iResolution.y - fragCoord.y;

            vec2 coord = vec2(fragCoord.x, iResolution.y - fragCoord.y);
            vec2 rayPos = vec2(iResolution.x * 1.1, -0.5 * iResolution.y);

            float tiltRad = iTilt * 3.14159265 / 180.0;
            float cs = cos(tiltRad);
            float sn = sin(tiltRad);
            vec2 rel = coord - rayPos;
            vec2 tiltedCoord = vec2(rel.x * cs - rel.y * sn, rel.x * sn + rel.y * cs) + rayPos;

            float halfSpread = iSpread * 0.275;
            vec2 rayRefDir1 = normalize(vec2(cos(0.785398 + halfSpread), sin(0.785398 + halfSpread)));
            vec2 rayRefDir2 = normalize(vec2(cos(0.785398 - halfSpread), sin(0.785398 - halfSpread)));

            vec4 rays1 = vec4(iRayColor1, 1.0) * rayStrength(rayPos, rayRefDir1, tiltedCoord, 36.2214, 21.11349, iSpeed);
            vec4 rays2 = vec4(iRayColor2, 1.0) * rayStrength(rayPos, rayRefDir2, tiltedCoord, 22.3991, 18.0234, iSpeed * 0.2);

            vec4 color = rays1 * (1.0 - iBlend) * 0.9 + rays2 * iBlend * 0.9;

            float distanceToLight = length(fragCoord.xy - vec2(rayPos.x, iResolution.y - rayPos.y)) / iResolution.y;
            float brightness = iIntensity * 0.4 / pow(max(distanceToLight, 0.001), iFalloff);
            color.rgb *= brightness;

            float gray = dot(color.rgb, vec3(0.299, 0.587, 0.114));
            color.rgb = mix(vec3(gray), color.rgb, iSaturation);

            color.a = max(color.r, max(color.g, color.b)) * iOpacity;
            gl_FragColor = color;
        }
    `;

    const [flipX, flipY] = originToFlip(config.origin);
    const uniforms = {
        iTime: { value: 0 },
        iResolution: { value: [1, 1] },
        iSpeed: { value: config.speed },
        iRayColor1: { value: hexToRgb(config.rayColor1) },
        iRayColor2: { value: hexToRgb(config.rayColor2) },
        iIntensity: { value: config.intensity },
        iSpread: { value: config.spread },
        iFlipX: { value: flipX },
        iFlipY: { value: flipY },
        iTilt: { value: config.tilt },
        iSaturation: { value: config.saturation },
        iBlend: { value: config.blend },
        iFalloff: { value: config.falloff },
        iOpacity: { value: config.opacity }
    };

    const geometry = new Triangle(gl);
    const program = new Program(gl, { vertex: vert, fragment: frag, uniforms });
    const mesh = new Mesh(gl, { geometry, program });

    const updateSize = () => {
        if (!container || !renderer) return;
        const w = container.clientWidth;
        const h = container.clientHeight;
        renderer.setSize(w, h);
        uniforms.iResolution.value = [w * renderer.dpr, h * renderer.dpr];
    };

    window.addEventListener('resize', updateSize);
    updateSize();

    let animId;
    const loop = t => {
        uniforms.iTime.value = t * 0.001;
        renderer.render({ scene: mesh });
        animId = requestAnimationFrame(loop);
    };
    animId = requestAnimationFrame(loop);
});
</script>
@endpush