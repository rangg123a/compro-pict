@extends('layouts.app')

@section('title', 'PT Patimban International Car Terminal — PICT')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* ═══ 1. HERO BANNER BASE ═══ */
    .pict-hero { 
        position: relative; 
        overflow: hidden; 
        background-color: ;
    }
    
    .hero-banner {
        background-size: cover;
        background-position: center right;
    }

    .hero-video-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
        opacity: 1;
    }

    /* ═══ LUMINOUS THREADS BACKGROUND (Pure CSS/SVG) ═══ */
    .hero-threads-bg {
        position: absolute;
        inset: 0;
        z-index: 1;
        pointer-events: none;
        overflow: hidden;
    }

    .luminous-wave {
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        opacity: 0.6;
        filter: drop-shadow(0 0 8px rgba(192, 132, 252, 0.8));
        animation: threadMove 8s ease-in-out infinite alternate;
    }

    .luminous-wave:nth-child(2) {
        animation-duration: 12s;
        animation-direction: alternate-reverse;
        opacity: 0.4;
    }

    .luminous-wave:nth-child(3) {
        animation-duration: 10s;
        opacity: 0.5;
    }

    @keyframes threadMove {
        0% { transform: translateY(-20px) scaleY(0.9); }
        50% { transform: translateY(20px) scaleY(1.1); }
        100% { transform: translateY(-10px) scaleY(1); }
    }

    /* ═══ 2. VESSEL SCENE ANIMATION STYLES ═══ */
    .pict-vessel-scene {
        position: relative;
        width: 100%;
        max-width: 650px;
        aspect-ratio: 16/10;
        margin: 0 auto;
        background: transparent;
        overflow: hidden;
        font-family: "Segoe UI", Arial, sans-serif;
    }

    .pict-vessel-scene svg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        display: block;
    }

    /* subtle floating on the whole ship, like it's on water */
    .pv-ship-float{
        animation: pv-bob 5.5s ease-in-out infinite;
        transform-origin: 620px 430px;
    }
    @keyframes pv-bob{
        0%,100%{ transform:translateY(0px); }
        50%{ transform:translateY(4px); }
    }

    /* radar sweep rotation */
    .pv-radar-sweep{
        transform-origin: 0 0;
        animation: pv-spin 4s linear infinite;
    }
    @keyframes pv-spin{ to{ transform:rotate(360deg); } }

    .pv-radar-blip{
        animation: pv-blip 2.6s ease-in-out infinite;
    }
    @keyframes pv-blip{
        0%,100%{ opacity:.25; }
        50%{ opacity:1; }
    }

    /* mast light pulse */
    .pv-mast-light{
        animation: pv-pulse 1.6s ease-in-out infinite;
    }
    @keyframes pv-pulse{
        0%,100%{ opacity:.3; }
        50%{ opacity:1; }
    }

    /* gentle water shimmer */
    .pv-wave{
        animation: pv-drift 9s ease-in-out infinite;
    }
    .pv-wave.pv-wave-2{ animation-duration: 13s; animation-direction: reverse; }
    @keyframes pv-drift{
        0%,100%{ transform:translateX(0); }
        50%{ transform:translateX(14px); }
    }

    .pict-vessel-scene text{
        fill:#eaf6fb;
        user-select:none;
    }

    @media (prefers-reduced-motion: reduce){
        .pict-vessel-scene *{ animation:none !important; }
    }

    /* ═══ 3. CARD & COMPONENT STYLES ═══ */
    .hero-content {
        animation: fadeUp .8s cubic-bezier(.22, 1, .36, 1) both;
    }

    .stats-strip .stat-item {
        opacity: 1;
        transform: translateY(0);
        transition: opacity .6s ease, transform .6s cubic-bezier(.22, 1, .36, 1), background-color .3s ease;
    }
    .stats-strip.is-visible .stat-item:hover {
        background-color: #f8fafc;
        transform: translateY(-4px);
    }

    .about-section {
        position: relative;
        overflow: hidden;
    }
    .about-section::before {
        content: "";
        position: absolute;
        top: 5rem;
        right: -8rem;
        width: 24rem;
        height: 24rem;
        border-radius: 9999px;
        background: radial-gradient(circle, rgba(219, 39, 39, .08), transparent 68%);
        pointer-events: none;
    }
    .about-section .section-inner {
        position: relative;
        z-index: 1;
    }
    .about-copy {
        border-left: 3px solid #ec2029;
        padding-left: 1.25rem;
    }
    .about-values {
        position: relative;
        padding-left: 1.75rem;
    }
    .about-values::before {
        content: "";
        position: absolute;
        left: .35rem;
        top: .8rem;
        bottom: .8rem;
        width: 1px;
        background: linear-gradient(to bottom, #ec2029, #26347a);
    }
    .about-value-item {
        position: relative;
        padding-bottom: 1.5rem;
    }
    .about-value-item:last-child {
        padding-bottom: 0;
    }
    .about-value-item::before {
        content: "";
        position: absolute;
        left: -1.75rem;
        top: .35rem;
        width: .75rem;
        height: .75rem;
        border: 3px solid #ffffff;
        border-radius: 9999px;
        background: #ec2029;
        box-shadow: 0 0 0 1px #ec2029;
    }
    .about-value-item:last-child::before {
        background: #26347a;
        box-shadow: 0 0 0 1px #26347a;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .location-reveal {
        opacity: 0;
        animation: locationFadeUp .8s ease-out forwards;
    }
    @keyframes locationFadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Route Map Interactivity Styles */
    #routeMapSvg { touch-action: manipulation; }
    #routeMapSvg .route-line { transition: opacity .3s ease, stroke-width .3s ease; }
    #routeMapSvg .route-line.is-dim { opacity: .12 !important; }
    #routeMapSvg .route-line.is-active { opacity: 1 !important; }
    #routeMapSvg path.route-line.is-active { stroke-width: 3; }
    #routeMapSvg .route-marker.is-dim { opacity: .12; }
    #routeMapSvg .dest-marker, #routeMapSvg .origin-marker {
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
    }
    #routeMapSvg .dest-marker .visible-dot,
    #routeMapSvg .origin-marker .visible-dot {
        transition: transform .25s ease;
        transform-box: fill-box;
        transform-origin: center;
    }
    #routeMapSvg .dest-marker.is-active .visible-dot,
    #routeMapSvg .origin-marker.is-active .visible-dot {
        transform: scale(1.7);
    }
    .route-legend-btn { -webkit-tap-highlight-color: transparent; min-height: 40px; }
    .route-legend-btn.is-active { background: rgba(255,255,255,.14); color: #ec2029; }
    #routeInfoPanel { min-height: 3.25rem; }

    .no-scrollbar { scrollbar-width: none; -ms-overflow-style: none; }
    .no-scrollbar::-webkit-scrollbar { display: none; }
</style>
@endpush

@section('content')
<!-- ═══ 1. HERO SECTION DENGAN ANIMASI LUMINOUS THREADS, KAPAL & MOBIL DI KANAN ═══ -->
<div class="pict-hero relative w-full min-h-[88vh] flex items-center overflow-hidden border-b border-white/10 pt-[env(safe-area-inset-top)]">
    
    <img src="{{ asset('assets/images/background.jpeg') }}" alt="" class="hero-video-bg">
    
    <!-- Luminous Threads Glowing Waves Background (Pure CSS/SVG) -->
    <div class="hero-threads-bg">
        <svg class="w-full h-full" viewBox="0 0 1440 800" preserveAspectRatio="none">
            <defs>
                <linearGradient id="threadGrad1" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#7c3aed" stop-opacity="0" />
                    <stop offset="50%" stop-color="#c084fc" stop-opacity="0.8" />
                    <stop offset="100%" stop-color="#7c3aed" stop-opacity="0" />
                </linearGradient>
                <linearGradient id="threadGrad2" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#4f46e5" stop-opacity="0" />
                    <stop offset="50%" stop-color="#818cf8" stop-opacity="0.7" />
                    <stop offset="100%" stop-color="#9333ea" stop-opacity="0" />
                </linearGradient>
            </defs>
            <path class="luminous-wave" d="M -100,200 Q 360,450 720,300 T 1540,400" stroke="url(#threadGrad1)" stroke-width="2.5" />
            <path class="luminous-wave" d="M -100,450 Q 400,150 800,500 T 1540,250" stroke="url(#threadGrad2)" stroke-width="2" />
            <path class="luminous-wave" d="M -100,600 Q 450,300 900,450 T 1540,550" stroke="url(#threadGrad1)" stroke-width="1.8" />
        </svg>
    </div>
    
    <!-- Konten Teks & Card Utama Hero -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 py-20 lg:py-24 w-full mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Kolom Kiri: Judul & Deskripsi Utama -->
            <div class="lg:col-span-6 hero-content space-y-6 text-left" data-aos="fade-right">
                <h1 class="text-white text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.15] drop-shadow-md">
                    PT PATIMBAN <br class="hidden sm:inline">INTERNATIONAL <br>
                    <span class="text-red-500">CAR TERMINAL</span>
                </h1>

                <p class="text-slate-100 max-w-xl leading-relaxed text-base sm:text-lg border-l-4 border-amber-500 pl-4 font-normal bg-slate-900/60 backdrop-blur-md py-3 rounded-r-xl border-y border-r border-white/15 shadow-sm">
                    Providing professional Ro-Ro vehicle and cargo loading and unloading services at Patimban Port, featuring international safety standards, high efficiency, and integrated technology.
                </p>

                <div class="pt-2 flex flex-wrap gap-4">
                    <a href="{{ url('/about') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-red-600/30 transition transform hover:-translate-y-0.5">
                        <span>About Us</span>
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Animasi SVG Kapal & Mobil Turun Ramp (Versi Terbaru) -->
            <div class="lg:col-span-6 flex justify-center lg:justify-end items-center" data-aos="fade-left">
<div class="pict-vessel-scene bg-slate-950/25 rounded-2xl p-2 border border-white/15 shadow-xl">                    <svg viewBox="0 0 1280 720" preserveAspectRatio="xMidYMid meet">
                        <defs>
                            <filter id="pvGlow" x="-40%" y="-40%" width="180%" height="180%">
                                <feGaussianBlur stdDeviation="1.6" result="blur"/>
                                <feMerge>
                                    <feMergeNode in="blur"/>
                                    <feMergeNode in="SourceGraphic"/>
                                </feMerge>
                            </filter>

                            <!-- route the cars follow: from inside the ship, down the ramp, onto the yard -->
                            <path id="pvCarRoute" d="M 335,392 L 232,458 Q 165,503 65,545 Q -35,586 -150,624" fill="none"/>

                            <!-- reusable car silhouettes (local origin = car center, facing +x) -->
                            <g id="pvCarSedan">
                                <path d="M 30,10 L 26,-3 L 13,-12 L -11,-12 L -22,-3 L -30,-3 L -30,10 Z"/>
                                <path d="M 26,-3 L -22,-3"/>
                                <circle cx="15" cy="10" r="6.2"/>
                                <circle cx="-16" cy="10" r="6.2"/>
                            </g>
                            <g id="pvCarSuv">
                                <path d="M 34,12 L 30,-6 L 19,-17 L -20,-17 L -29,-6 L -34,-6 L -34,12 Z"/>
                                <path d="M 30,-6 L -29,-6"/>
                                <circle cx="19" cy="12" r="7.2"/>
                                <circle cx="-19" cy="12" r="7.2"/>
                            </g>
                        </defs>

                        <!-- ============ RADAR (top-right) ============ -->
                        <g transform="translate(1150,108)" fill="none" stroke="#26347a">
                            <circle r="95" stroke-width="1" opacity="0.45"/>
                            <circle r="63" stroke-width="1" opacity="0.45"/>
                            <circle r="31" stroke-width="1" opacity="0.45"/>
                            <path d="M -95 0 L 95 0 M 0 -95 L 0 95" stroke-width="0.7" opacity="0.3"/>
                            <g class="pv-radar-sweep">
                                <path d="M 0 0 L 95 0 A 95 95 0 0 1 67 67 Z" fill="url(#pvSweepGrad)" stroke="none"/>
                            </g>
                            <circle class="pv-radar-blip" cx="34" cy="-52" r="2.6" fill="#ec2029" stroke="none"/>
                            <circle class="pv-radar-blip" cx="-18" cy="-70" r="2.2" fill="#ec2029" stroke="none" style="animation-delay:.8s"/>
                        </g>
                        <defs>
                            <linearGradient id="pvSweepGrad" x1="0" y1="0" x2="1" y2="0">
                                <stop offset="0%" stop-color="#ec2029" stop-opacity="0.55"/>
                                <stop offset="100%" stop-color="#ec2029" stop-opacity="0"/>
                            </linearGradient>
                        </defs>

                        <!-- ============ LABELS ============ -->
                        <g font-weight="700">
                            <text x="300" y="228" font-size="34" letter-spacing="1">PICT - 01</text>
                            <path d="M 300 253 L 545 253 L 580 288" fill="none" stroke="#7fd8f2" stroke-width="1.4"/>
                            <text x="305" y="278" font-size="17" font-weight="600">PATIMBAN PORT</text>
                            <text x="700" y="473" font-size="19" letter-spacing="0.5">PATIMBAN PORT</text>
                        </g>

                        <!-- ============ SHIP GROUP (hull, deckhouse, bridge, cranes) ============ -->
                        <g class="pv-ship-float" filter="url(#pvGlow)">
                            <g fill="none" stroke="#7fd8f2" stroke-width="2.2" stroke-linejoin="round" stroke-linecap="round">

                                <!-- hull + deck outline -->
                                <path d="M 300 470
                                       L 330 440
                                       L 330 400
                                       L 300 400
                                       L 300 380
                                       L 420 380
                                       L 420 355
                                       L 640 355
                                       L 640 395
                                       L 760 395
                                       L 795 355
                                       L 870 355
                                       L 895 320
                                       L 960 320
                                       L 960 280
                                       L 985 280
                                       L 985 320
                                       L 1010 320
                                       L 1010 460
                                       L 700 492
                                       L 420 502
                                       Z"/>

                                <!-- forward mast -->
                                <path d="M 315 400 L 315 360 M 305 365 L 325 365"/>

                                <!-- midship deckhouse grid -->
                                <path d="M 420 380 L 420 355 M 460 380 L 460 355 M 500 380 L 500 355 M 540 380 L 540 355 M 580 380 L 580 355 M 620 380 L 620 355"/>
                                <path d="M 420 367 L 640 367"/>

                                <!-- cargo cranes -->
                                <path d="M 460 355 L 480 305 L 500 355 M 480 305 L 480 280"/>
                                <path d="M 570 355 L 590 300 L 610 355 M 590 300 L 590 270 L 630 270 L 630 300"/>

                                <!-- bridge tower window tiers -->
                                <path d="M 795 355 L 795 395 M 820 355 L 820 395 M 845 355 L 845 395 M 870 355 L 870 395"/>
                                <path d="M 895 320 L 895 355 M 920 320 L 920 355 M 945 320 L 945 355"/>
                                <path d="M 960 280 L 960 320 M 975 280 L 975 320"/>

                                <!-- mast + antenna array -->
                                <path d="M 995 280 L 995 210 M 985 220 L 1005 220 M 985 235 L 1005 235 M 995 210 L 995 195"/>

                                <!-- ramp door (open, bow) -->
                                <path d="M 300 400 L 190 470 L 190 500 L 300 470 Z"/>
                                <path d="M 300 400 L 200 460 M 300 420 L 200 480 M 300 440 L 210 494"/>

                                <!-- name plate -->
                                <rect x="345" y="440" width="55" height="14" rx="2"/>
                            </g>

                            <circle class="pv-mast-light" cx="995" cy="192" r="3" fill="#7fd8f2" stroke="none"/>

                            <!-- waterline -->
                            <g stroke="#7fd8f2" fill="none">
                                <path class="pv-wave" d="M 140 505 Q 240 495 320 502 T 480 500 T 640 504 T 800 498 T 1040 495" stroke-width="1.6" opacity="0.85"/>
                                <path class="pv-wave pv-wave-2" d="M 120 522 Q 260 512 400 520 T 660 518 T 900 514 T 1060 512" stroke-width="1.2" opacity="0.5"/>
                            </g>
                        </g>

                        <!-- ============ CARS DRIVING DOWN THE RAMP (loop dengan rotate="15") ============ -->
                        <g stroke="#bfeaf7" stroke-width="1.8" fill="none" stroke-linejoin="round" stroke-linecap="round" filter="url(#pvGlow)">

                            <g opacity="0">
                                <use href="#pvCarSedan"/>
                                <animateMotion dur="7s" begin="0s" repeatCount="indefinite" rotate="15">
                                    <mpath href="#pvCarRoute"/>
                                </animateMotion>
                                <animate attributeName="opacity" values="0;1;1;0" keyTimes="0;0.06;0.88;1" dur="7s" begin="0s" repeatCount="indefinite"/>
                            </g>

                            <g opacity="0">
                                <use href="#pvCarSuv"/>
                                <animateMotion dur="7s" begin="1.6s" repeatCount="indefinite" rotate="15">
                                    <mpath href="#pvCarRoute"/>
                                </animateMotion>
                                <animate attributeName="opacity" values="0;1;1;0" keyTimes="0;0.06;0.88;1" dur="7s" begin="1.6s" repeatCount="indefinite"/>
                            </g>

                            <g opacity="0">
                                <use href="#pvCarSedan"/>
                                <animateMotion dur="7s" begin="3.2s" repeatCount="indefinite" rotate="15">
                                    <mpath href="#pvCarRoute"/>
                                </animateMotion>
                                <animate attributeName="opacity" values="0;1;1;0" keyTimes="0;0.06;0.88;1" dur="7s" begin="3.2s" repeatCount="indefinite"/>
                            </g>

                            <g opacity="0">
                                <use href="#pvCarSuv"/>
                                <animateMotion dur="7s" begin="4.8s" repeatCount="indefinite" rotate="15">
                                    <mpath href="#pvCarRoute"/>
                                </animateMotion>
                                <animate attributeName="opacity" values="0;1;1;0" keyTimes="0;0.06;0.88;1" dur="7s" begin="4.8s" repeatCount="indefinite"/>
                            </g>

                        </g>
                    </svg>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ═══ 2. STATS STRIP ═══ -->
<section class="stats-strip max-w-7xl mx-auto px-4 sm:px-6 mt-8 sm:mt-10 relative z-20" data-aos="fade-up">
    <div class="bg-white rounded-2xl shadow-xl p-5 sm:p-8 grid grid-cols-2 md:grid-cols-4 gap-y-6 sm:gap-y-0 divide-x-0 md:divide-x divide-slate-200 border-t-4 border-red-600">
        <div class="stat-item text-center px-2 sm:px-4">
            <p class="text-3xl sm:text-4xl font-extrabold text-blue-900 mb-1"><span class="stat-number" data-target="400">400</span><span class="text-red-600 text-xl sm:text-2xl">k</span></p>
            <p class="text-slate-500 text-[10px] sm:text-sm font-medium uppercase tracking-wide">Annual Capacity</p>
        </div>
        <div class="stat-item text-center px-2 sm:px-4 border-l border-slate-200 md:border-l-0">
            <p class="text-3xl sm:text-4xl font-extrabold text-blue-900 mb-1"><span class="stat-number" data-target="600">600</span><span class="text-red-600 text-xl sm:text-2xl">k</span></p>
            <p class="text-slate-500 text-[10px] sm:text-sm font-medium uppercase tracking-wide">Phase 3 Target</p>
        </div>
        <div class="stat-item text-center px-2 sm:px-4 border-t pt-4 md:border-t-0 md:pt-0 border-slate-200">
            <p class="text-3xl sm:text-4xl font-extrabold text-blue-900 mb-1"><span class="stat-number" data-target="300">300</span><span class="text-slate-400 text-lg sm:text-xl ml-1">m</span></p>
            <p class="text-slate-500 text-[10px] sm:text-sm font-medium uppercase tracking-wide">Berth Length</p>
        </div>
        <div class="stat-item text-center px-2 sm:px-4 border-t border-l pt-4 md:border-t-0 md:pt-0 border-slate-200">
            <p class="text-3xl sm:text-4xl font-extrabold text-blue-900 mb-1"><span class="text-slate-400 text-xl mr-1">&plusmn;</span><span class="stat-number" data-target="120">120</span><span class="text-slate-400 text-lg sm:text-xl ml-1">km</span></p>
            <p class="text-slate-500 text-[10px] sm:text-sm font-medium uppercase tracking-wide">Industrial Distance</p>
        </div>
    </div>
</section>

<!-- ═══ 3. ABOUT US ═══ -->
<section class="about-section py-20 bg-white" data-aos="fade-up">
    <div class="section-inner max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">About PICT</h2>
            </div>
            <p class="text-slate-500 text-sm max-w-md">Solusi pengelolaan terminal kendaraan internasional yang efisien, andal, dan aman sebagai penggerak logistik otomotif Indonesia.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="about-copy lg:col-span-6 space-y-6" data-aos="fade-right">
                <h3 class="text-2xl font-bold text-blue-950">Indonesia's Strategic Gateway for Automotive Export Import</h3>
                <p class="text-slate-600 leading-relaxed">
                    PT Patimban International Car Terminal (PICT) mengelola fasilitas terminal mobil seluas standar dunia yang terintegrasi secara strategis dengan koridor industri manufaktur Jawa Barat.
                </p>
                <p class="text-slate-600 leading-relaxed">
                    Dengan dukungan teknologi mutakhir dan infrastruktur dermaga yang dirancang khusus untuk kapal ekspor/impor Ro-Ro, kami memastikan seluruh alur bongkar muat kendaraan berlangsung secara tepat waktu dan aman.
                </p>
            </div>

            <div class="about-values lg:col-span-6" data-aos="fade-left">
                <div class="about-value-item">
                    <h4 class="text-lg font-bold text-blue-950 mb-2">Vision</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Menjadi pelabuhan pengangkut kendaraan bertaraf internasional utama di Asia Tenggara yang mengedepankan efisiensi, keandalan, dan keselamatan operasional.
                    </p>
                </div>

                <div class="about-value-item">
                    <h4 class="text-lg font-bold text-blue-950 mb-2">Mission</h4>
                    <ul class="text-slate-600 text-sm space-y-2 list-disc list-inside">
                        <li>Menyediakan layanan logistik otomotif kelas dunia bagi produsen kendaraan domestik maupun global.</li>
                        <li>Mengoptimalkan rantai pasok ekspor-impor CBU melalui teknologi terminal terintegrasi.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ═══ 4. TERMINAL GALLERY ═══ -->
<section class="py-20 bg-slate-50 border-y border-slate-200 overflow-hidden" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Terminal Gallery</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Operational Excellence in Action</h2>
            </div>
            <p class="text-slate-600 text-sm max-w-md">Dokumentasi langsung aktivitas bongkar muat kendaraan, kapasitas lapangan penumpukan (staging yard), dan standar keamanan tinggi di PT Patimban International Car Terminal.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group relative rounded-2xl overflow-hidden shadow-md bg-white border border-slate-200 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('assets/images/vessel-1.jpeg') }}" alt="Ro-Ro Vessel at Patimban Port" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent opacity-90"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-red-600 transition-colors">Deep-Sea Ro-Ro Handling</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Pelayanan sandar kapal pengangkut kendaraan internasional berteknologi tinggi dengan efisiensi tinggi di dermaga Patimban.
                    </p>
                </div>
            </div>

            <div class="group relative rounded-2xl overflow-hidden shadow-md bg-white border border-slate-200 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('assets/images/patimban-yard-1.jpeg') }}" alt="Patimban Staging Yard" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <!-- <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent opacity-90"></div> -->
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-red-600 transition-colors">Wide Capacity Staging Yard</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Area lapangan penumpukan kendaraan CBU yang luas, tertata rapi, dan aman untuk menampung distribusi domestik maupun ekspor.
                    </p>
                </div>
            </div>

            <div class="group relative rounded-2xl overflow-hidden shadow-md bg-white border border-slate-200 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('assets/images/car-5.jpeg') }}" alt="Vehicle Inspection Process" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent opacity-90"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-red-600 transition-colors">Strict Quality Inspection</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Prosedur pengecekan fisik dan mesin kendaraan secara teliti guna memastikan standar kualitas zero defect sebelum didistribusikan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 5. SHIPPING ROUTE NETWORK ═══ -->
<section class="py-20 bg-slate-50 relative overflow-hidden border-b border-slate-200" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-red-600 font-extrabold tracking-widest text-xs uppercase block mb-1">Global Connectivity</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Shipping Route Network</h2>
            </div>
            <p class="text-slate-600 text-sm max-w-md leading-relaxed">
                Patimban Port is seamlessly linked to domestic feeder channels and international deep-sea lanes connecting major Asian automotive hubs.
            </p>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-6 shadow-sm">
            
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 pb-5 mb-5 border-b border-slate-100">
                <div id="routeLegend" class="inline-flex p-1 bg-slate-100 rounded-xl gap-1 self-start sm:self-auto">
                    <button type="button" data-route="all" class="route-legend-btn is-active flex items-center gap-2 text-xs font-bold text-slate-600 rounded-lg px-4 py-2 transition-all duration-200">
                        <span class="w-2 h-2 rounded-full bg-red-600"></span>
                        <span>All Routes</span>
                    </button>
                    <button type="button" data-route="international" class="route-legend-btn flex items-center gap-2 text-xs font-bold text-slate-600 rounded-lg px-4 py-2 transition-all duration-200">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        <span>International</span>
                    </button>
                    <button type="button" data-route="domestic" class="route-legend-btn flex items-center gap-2 text-xs font-bold text-slate-600 rounded-lg px-4 py-2 transition-all duration-200">
                        <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                        <span>Domestic</span>
                    </button>
                </div>

                <p class="md:hidden text-[11px] text-slate-400 font-medium flex items-center gap-1 self-center">
                    <span>&larr;</span> Drag or scroll map to explore <span>&rarr;</span>
                </p>
            </div>

            <div class="overflow-x-auto no-scrollbar snap-x snap-mandatory rounded-xl bg-slate-50 border border-slate-100">
                <div class="min-w-[750px] lg:min-w-0">
                    <svg id="routeMapSvg" class="w-full h-auto touch-manipulation snap-center" viewBox="0 0 900 460" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="earthSeaGrad" x1="0" y1="0" x2="900" y2="460" gradientUnits="userSpaceOnUse">
                                <stop offset="0%" stop-color="#e0f2fe" />
                                <stop offset="100%" stop-color="#bae6fd" />
                            </linearGradient>
                            <radialGradient id="patimbanGlow" cx="50%" cy="50%" r="50%">
                                <stop offset="0%" stop-color="#ef4444" stop-opacity="0.9" />
                                <stop offset="100%" stop-color="#ef4444" stop-opacity="0" />
                            </radialGradient>

                            <g id="shipIcon">
                                <path d="M-8 -3.5 L4 -3.5 L9 0 L4 3.5 L-8 3.5 Z" fill="currentColor" />
                                <rect x="-4" y="-2" width="5" height="4" rx="0.8" fill="#ffffff" />
                                <rect x="-6" y="-1.2" width="1.5" height="2.4" fill="#0f172a" />
                            </g>

                            <!-- Flag SVG Definitions -->
                            <clipPath id="flagClip"><rect width="20" height="14" rx="2" /></clipPath>
                            <g id="flag-id"><rect width="20" height="14" rx="2" fill="#ffffff" stroke="#cbd5e1" stroke-width="0.5" /><rect width="20" height="7" fill="#ec2029" rx="2" /><rect width="20" height="2" y="5" fill="#ec2029" /></g>
                            <g id="flag-jp"><rect width="20" height="14" rx="2" fill="#ffffff" stroke="#cbd5e1" stroke-width="0.5" /><circle cx="10" cy="7" r="4" fill="#ec2029" /></g>
                            <g id="flag-cn"><rect width="20" height="14" rx="2" fill="#ec2029" stroke="#cbd5e1" stroke-width="0.5" /><polygon points="4,2 5,4 3,3 5,3 3,4" fill="#facc15" /></g>
                            <g id="flag-th"><rect width="20" height="14" rx="2" fill="#ffffff" stroke="#cbd5e1" stroke-width="0.5" /><rect width="20" height="2.3" y="0" fill="#ec2029" /><rect width="20" height="2.3" y="11.7" fill="#ec2029" /><rect width="20" height="4.6" y="4.7" fill="#26347a" /></g>
                            <g id="flag-ph"><rect width="20" height="14" rx="2" fill="#ffffff" stroke="#cbd5e1" stroke-width="0.5" /><rect width="20" height="7" fill="#1d4ed8" /><rect width="20" height="7" y="7" fill="#ec2029" /><polygon points="0,0 10,7 0,14" fill="#ffffff" /><circle cx="3.5" cy="7" r="1.5" fill="#facc15" /></g>
                            <g id="flag-my"><rect width="22" height="14" fill="#CC0000" rx="1"/><rect width="22" height="2" y="2" fill="#FFFFFF"/><rect width="22" height="2" y="6" fill="#FFFFFF"/><rect width="22" height="2" y="10" fill="#FFFFFF"/><rect width="11" height="8" fill="#003366"/></g>
                            <g id="flag-sg"><rect width="22" height="14" fill="#EE1C25" rx="1"/><rect width="22" height="7" y="7" fill="#FFFFFF"/><circle cx="5" cy="3.5" r="2" fill="#FFFFFF"/><circle cx="5.8" cy="3.5" r="1.6" fill="#EE1C25"/></g>
                        </defs>

                        <rect x="0" y="0" width="900" height="460" rx="16" fill="url(#earthSeaGrad)" />

                        <g stroke="#7dd3fc" stroke-opacity="0.4" stroke-width="1">
                            <line x1="0" y1="115" x2="900" y2="115" />
                            <line x1="0" y1="230" x2="900" y2="230" />
                            <line x1="0" y1="345" x2="900" y2="345" />
                            <line x1="150" y1="0" x2="150" y2="460" />
                            <line x1="300" y1="0" x2="300" y2="460" />
                            <line x1="450" y1="0" x2="450" y2="460" />
                            <line x1="600" y1="0" x2="600" y2="460" />
                            <line x1="750" y1="0" x2="750" y2="460" />
                        </g>

                        <clipPath id="mapClip"><rect x="0" y="0" width="900" height="460" rx="16" /></clipPath>
                        <g clip-path="url(#mapClip)">
                            <path d="M 831.0 680.7 L 845.5 683.4 L 865.3 680.9 L 874.3 681.4 L 875.4 690.5 L 870.3 693.1 L 868.7 699.3 L 863.5 697.2 L 853.1 702.5 L 840.7 701.9 L 831.5 695.3 L 829.4 690.3 L 820.8 683.6 L 821.2 680.1 L 831.0 680.7 Z M 803.4 473.5 L 808.8 479.5 L 818.5 476.6 L 830.6 482.9 L 829.1 486.3 L 832.3 492.9 L 834.6 496.7 L 838.3 497.6 L 842.4 504.2 L 841.0 508.1 L 845.8 513.3 L 862.1 517.4 L 882.7 524.3 L 880.8 526.2 L 889.3 531.0 L 895.2 539.3 L 901.2 537.6 L 907.2 540.9 L 910.9 539.8 L 913.5 547.9 L 942.8 561.7 L 947.0 567.9 L 946.4 577.0 L 953.5 583.5 L 952.7 590.3 L 946.0 600.7 L 946.3 605.1 L 943.4 610.6 L 936.8 617.6 L 925.6 621.3 L 915.2 631.0 L 910.7 637.7 L 904.9 641.5 L 901.1 647.2 L 900.0 654.9 L 891.4 657.6 L 874.6 657.9 L 860.7 661.0 L 844.8 667.3 L 823.2 662.5 L 825.5 658.5 L 817.3 660.0 L 804.1 665.5 L 759.6 659.5 L 749.9 654.8 L 743.6 645.1 L 736.2 642.0 L 721.8 641.0 L 726.7 637.3 L 723.1 631.6 L 715.8 636.9 L 702.4 638.3 L 710.3 634.1 L 712.6 629.7 L 718.4 625.9 L 717.2 620.2 L 705.0 626.8 L 695.6 629.4 L 689.8 635.5 L 678.1 632.3 L 678.6 628.3 L 669.2 622.7 L 661.3 619.8 L 664.1 618.1 L 644.9 613.4 L 634.3 613.2 L 619.9 609.5 L 593.0 610.2 L 556.5 615.5 L 542.2 615.0 L 526.3 618.9 L 513.3 620.7 L 510.4 624.7 L 504.9 627.8 L 482.7 628.7 L 469.5 627.3 L 448.4 628.5 L 439.5 632.6 L 435.1 632.2 L 420.4 636.8 L 399.4 636.5 L 375.4 630.2 L 375.7 625.8 L 383.2 624.7 L 385.7 623.0 L 387.0 614.9 L 385.3 610.4 L 377.4 602.6 L 375.0 598.2 L 375.6 593.9 L 369.6 588.9 L 369.2 586.6 L 362.6 583.6 L 360.7 577.6 L 352.2 571.5 L 350.1 568.2 L 356.7 571.5 L 351.6 564.4 L 359.1 566.7 L 363.5 569.6 L 363.2 565.7 L 350.9 554.9 L 352.5 550.5 L 355.6 548.6 L 357.7 544.8 L 356.0 540.3 L 362.2 534.8 L 363.4 540.6 L 369.7 535.4 L 381.9 532.8 L 389.2 529.5 L 400.7 526.7 L 407.5 526.1 L 411.6 527.1 L 423.4 524.2 L 432.5 523.4 L 434.8 521.7 L 438.8 521.0 L 447.1 521.2 L 462.8 518.9 L 471.0 515.5 L 474.8 511.4 L 483.6 507.5 L 484.7 500.3 L 495.2 493.8 L 501.5 500.4 L 507.9 498.9 L 502.5 495.2 L 507.3 491.5 L 513.9 493.2 L 515.7 487.3 L 523.9 483.6 L 527.5 480.5 L 535.1 479.2 L 535.3 477.1 L 541.9 478.0 L 542.1 476.1 L 556.0 473.9 L 567.1 477.5 L 575.4 482.0 L 594.3 482.8 L 591.1 478.6 L 598.3 472.4 L 605.1 470.4 L 602.8 468.5 L 609.3 464.1 L 618.4 461.4 L 626.0 462.3 L 638.6 460.9 L 638.4 457.0 L 627.4 454.4 L 635.4 453.3 L 645.3 455.2 L 653.3 458.4 L 665.9 460.3 L 670.2 459.5 L 679.5 461.9 L 688.2 459.7 L 693.9 460.4 L 697.4 458.9 L 704.3 462.7 L 700.3 466.8 L 694.6 469.9 L 689.4 470.2 L 691.2 473.2 L 681.4 480.8 L 682.5 483.0 L 694.4 487.2 L 706.0 489.7 L 724.5 496.9 L 728.8 496.9 L 736.6 498.8 L 738.9 501.2 L 753.2 503.8 L 763.1 501.2 L 769.1 493.6 L 775.5 483.3 L 772.8 473.0 L 774.8 467.2 L 777.6 465.7 L 775.3 463.1 L 782.2 452.7 L 787.7 449.8 L 792.0 453.5 L 793.0 458.3 L 796.7 459.3 L 797.4 462.5 L 802.8 466.4 L 803.4 473.5 Z" fill="#dcfce7" stroke="#86efac" stroke-width="0.8" stroke-opacity="0.8" />
                            <path d="M 40.1 199.0 L 39.8 204.5 L 34.5 203.4 L 35.5 209.5 L 31.2 205.5 L 27.5 197.9 L 21.3 193.5 L 7.4 193.2 L 8.8 196.3 L 4.1 200.6 L -2.3 199.0 L -4.5 200.4 L -14.5 198.9 L -16.9 192.6 L -22.1 186.8 L -19.5 182.2 L -28.7 180.2 L -25.4 177.4 L -16.0 174.5 L -26.9 170.4 L -21.6 165.2 L -9.7 168.6 L -2.5 168.9 L -1.2 174.3 L 27.0 175.2 L 35.6 176.5 L 28.7 183.0 L 22.0 183.4 L 17.4 187.8 L 25.6 191.8 L 28.0 186.9 L 32.2 186.9 L 40.1 199.0 Z" fill="#dcfce7" stroke="#86efac" stroke-width="0.8" stroke-opacity="0.8" />
                            <path d="M 363.1 333.3 L 369.0 330.4 L 381.8 326.2 L 380.2 334.9 L 373.0 334.7 L 369.9 337.3 L 363.1 333.3 Z" fill="#dcfce7" stroke="#86efac" stroke-width="0.8" stroke-opacity="0.8" />
                            <path d="M 305.1 224.8 L 292.1 228.5 L 279.8 226.1 L 279.4 219.5 L 286.8 216.0 L 303.2 213.9 L 311.8 214.1 L 315.2 217.0 L 308.6 220.4 L 305.1 224.8 Z M 564.9 -13.5 L 591.0 -11.0 L 608.7 -5.6 L 614.8 1.6 L 637.6 1.6 L 650.6 -1.4 L 675.4 -3.7 L 667.5 3.2 L 661.7 6.0 L 656.5 14.4 L 646.5 21.9 L 628.3 20.5 L 615.4 23.2 L 619.3 29.8 L 617.2 38.9 L 609.5 39.1 L 609.6 43.0 L 599.9 38.4 L 594.0 42.7 L 570.8 46.0 L 573.1 50.1 L 560.2 49.8 L 553.0 47.4 L 542.7 52.8 L 526.2 57.0 L 514.0 61.9 L 493.0 64.1 L 482.0 67.7 L 465.8 69.8 L 473.8 66.2 L 470.7 63.2 L 482.5 58.1 L 474.6 54.1 L 461.5 56.8 L 444.6 62.1 L 435.4 67.1 L 420.6 67.4 L 413.0 71.0 L 420.9 76.2 L 433.2 77.5 L 433.7 80.9 L 445.5 83.1 L 462.4 77.7 L 475.7 80.6 L 485.4 80.8 L 487.8 84.9 L 466.6 87.0 L 459.6 91.1 L 445.0 95.0 L 437.3 100.4 L 453.4 104.6 L 459.3 112.1 L 478.6 125.0 L 478.4 130.7 L 469.0 132.8 L 472.6 136.9 L 481.4 139.3 L 475.3 151.6 L 466.9 152.3 L 443.8 170.7 L 429.9 179.8 L 388.4 193.3 L 371.5 194.2 L 362.3 197.6 L 357.1 195.1 L 348.6 198.9 L 327.7 202.8 L 311.8 204.0 L 306.7 212.1 L 298.3 212.5 L 294.4 206.9 L 298.0 204.0 L 277.8 201.5 L 270.8 202.8 L 255.7 200.8 L 248.5 197.7 L 250.9 193.2 L 237.2 191.8 L 229.9 189.0 L 217.2 193.1 L 190.6 193.9 L 174.8 196.9 L 177.0 205.7 L 169.1 205.5 L 167.3 200.5 L 156.2 202.7 L 138.6 198.4 L 143.0 192.1 L 133.5 190.6 L 129.9 183.5 L 114.1 184.8 L 115.9 175.7 L 130.1 169.3 L 130.2 157.1 L 123.7 155.3 L 118.7 150.8 L 109.9 151.3 L 93.7 150.2 L 98.8 147.0 L 91.8 142.2 L 81.1 145.4 L 68.5 143.5 L 51.2 148.4 L 37.5 154.1 L 25.4 155.1 L 18.9 153.0 L 11.0 152.8 L 0.2 151.1 L -7.9 153.0 L -17.8 158.7 L -19.0 152.7 L -28.2 154.3 L -62.7 151.8 L -74.8 148.4 L -86.5 146.9 L -91.5 143.2 L -99.9 142.1 L -115.1 137.1 L -127.1 134.8 L -133.3 136.6 L -154.2 131.2 L -168.9 126.4 L -173.1 117.9 L -162.4 119.0 L -161.9 115.0 L -167.8 111.1 L -166.3 104.9 L -182.4 95.9 L -207.1 92.8 L -211.5 86.9 L -222.6 83.3 L -225.3 81.1 L -227.6 76.7 L -227.0 73.8 L -236.1 72.0 L -241.1 72.8 L -244.9 65.7 L -240.6 63.9 L -242.7 62.1 L -228.3 58.5 L -218.0 57.0 L -202.1 58.1 L -196.4 53.2 L -177.2 52.2 L -171.8 49.2 L -148.2 45.0 L -146.1 43.3 L -147.3 38.9 L -137.0 37.0 L -150.5 23.6 L -120.8 20.6 L -113.1 18.9 L -102.3 5.1 L -72.5 7.7 L -64.2 4.2 L -63.5 -3.5 L -51.0 -4.2 L -39.6 -9.3 L -33.7 -9.9 L -29.8 -4.6 L -17.2 -0.5 L 4.2 2.3 L 14.6 8.5 L 8.8 17.5 L 14.2 20.8 L 52.2 23.2 L 70.3 28.0 L 79.6 28.8 L 86.4 35.9 L 95.2 40.4 L 111.8 40.3 L 142.7 42.0 L 162.7 40.9 L 177.5 42.1 L 199.7 46.7 L 217.8 46.7 L 224.5 49.1 L 241.9 45.0 L 266.2 42.3 L 288.7 42.0 L 306.2 39.3 L 316.9 35.2 L 327.4 32.6 L 320.2 27.2 L 328.1 22.2 L 352.0 24.5 L 366.9 20.4 L 389.8 17.4 L 400.8 12.4 L 411.3 10.2 L 433.1 9.2 L 444.9 10.0 L 446.6 7.3 L 433.0 1.9 L 421.0 -0.5 L 409.4 2.3 L 394.6 1.1 L 386.1 2.1 L 382.3 -1.0 L 400.2 -14.5 L 418.2 -11.6 L 439.3 -16.4 L 439.2 -19.8 L 452.7 -27.9 L 461.1 -30.4 L 460.9 -34.6 L 452.7 -36.4 L 465.0 -40.3 L 503.6 -41.9 L 526.0 -39.6 L 539.2 -36.7 L 559.3 -21.0 L 564.9 -13.5 Z" fill="#dcfce7" stroke="#86efac" stroke-width="0.8" stroke-opacity="0.8" />
                            <path d="M 460.7 446.5 L 454.4 446.6 L 434.5 441.3 L 448.5 439.8 L 461.6 444.4 L 460.7 446.5 Z M 516.5 445.7 L 503.7 447.4 L 501.9 446.5 L 503.3 443.9 L 509.7 439.2 L 524.5 436.2 L 526.3 440.0 L 516.5 445.7 Z M 418.5 430.1 L 423.9 432.1 L 433.2 431.5 L 436.9 434.7 L 409.2 437.3 L 401.1 437.3 L 406.3 432.8 L 414.5 432.8 L 418.5 430.1 Z M 493.6 430.1 L 491.4 434.3 L 468.8 436.5 L 448.9 435.5 L 448.8 432.7 L 460.7 431.2 L 470.1 433.4 L 480.1 432.9 L 493.6 430.1 Z M 279.4 420.0 L 308.1 420.7 L 311.4 417.6 L 339.2 421.3 L 344.7 426.2 L 367.2 427.6 L 385.6 432.2 L 368.5 435.1 L 352.0 432.0 L 322.8 431.6 L 280.4 426.6 L 274.2 427.5 L 246.8 424.4 L 244.2 421.1 L 230.5 420.5 L 240.8 413.2 L 259.0 413.7 L 277.3 417.2 L 279.4 420.0 Z M 670.9 415.6 L 663.2 420.9 L 661.7 415.1 L 667.5 409.7 L 670.9 412.0 L 670.9 415.6 Z M 558.7 394.5 L 553.1 397.1 L 542.8 395.7 L 539.8 392.4 L 555.0 392.0 L 558.7 394.5 Z M 607.1 391.7 L 612.5 397.6 L 599.9 394.4 L 568.5 394.0 L 572.0 389.8 L 590.6 389.5 L 607.1 391.7 Z M 659.8 374.0 L 666.3 389.2 L 681.9 393.8 L 694.4 385.7 L 711.6 381.1 L 724.9 381.1 L 748.9 386.5 L 765.0 387.9 L 765.5 437.9 L 752.2 431.6 L 736.9 430.1 L 733.2 432.3 L 714.2 432.5 L 720.6 426.3 L 730.0 424.1 L 726.1 415.8 L 718.9 409.3 L 689.8 402.9 L 677.5 402.2 L 654.9 395.1 L 650.5 398.9 L 644.8 399.5 L 641.4 396.7 L 641.3 393.4 L 629.8 389.6 L 646.0 386.9 L 656.7 387.0 L 655.4 385.0 L 633.5 385.0 L 627.5 380.4 L 614.1 379.0 L 607.8 375.2 L 628.0 373.3 L 635.7 370.8 L 659.8 374.0 Z M 528.6 357.1 L 516.6 364.7 L 505.3 366.2 L 490.8 364.7 L 452.7 366.2 L 450.6 372.0 L 464.0 378.8 L 472.1 375.3 L 500.1 372.7 L 498.9 376.3 L 492.3 375.1 L 485.8 379.6 L 472.6 382.6 L 486.8 392.4 L 484.1 395.1 L 497.6 403.9 L 497.4 408.9 L 489.4 411.2 L 483.5 408.5 L 490.8 402.2 L 476.1 405.2 L 472.3 403.1 L 474.3 400.1 L 463.5 395.6 L 464.6 388.1 L 454.6 390.5 L 456.5 410.4 L 446.9 411.5 L 440.5 409.2 L 444.8 402.2 L 442.5 394.8 L 436.2 394.7 L 431.5 389.5 L 437.7 384.5 L 439.9 378.4 L 450.5 363.7 L 463.3 358.0 L 475.0 360.2 L 493.9 361.3 L 511.2 361.0 L 526.0 355.4 L 528.6 357.1 Z M 580.3 359.3 L 579.5 366.0 L 571.8 365.3 L 569.5 369.9 L 575.7 374.0 L 571.5 374.9 L 565.4 370.0 L 561.0 360.2 L 564.0 354.1 L 569.0 351.3 L 570.1 355.5 L 578.9 356.2 L 580.3 359.3 Z M 418.1 354.0 L 435.0 361.1 L 417.2 362.0 L 412.2 367.2 L 412.8 374.2 L 398.4 379.4 L 398.0 387.0 L 392.2 398.8 L 390.0 396.0 L 373.0 399.5 L 367.0 394.8 L 356.3 394.4 L 348.9 391.9 L 331.0 394.7 L 325.5 391.0 L 315.7 391.4 L 303.4 390.5 L 301.1 380.2 L 293.6 378.1 L 286.4 371.5 L 284.3 364.8 L 286.0 357.7 L 294.9 352.6 L 297.5 357.7 L 307.7 362.1 L 317.4 360.5 L 327.0 361.1 L 335.7 357.2 L 342.9 356.5 L 357.1 358.7 L 369.3 357.0 L 377.0 346.4 L 382.8 343.7 L 388.0 335.0 L 405.2 335.0 L 418.2 336.3 L 409.7 343.2 L 420.7 350.5 L 418.1 354.0 Z M 237.3 412.9 L 220.7 413.0 L 208.0 406.6 L 188.8 400.4 L 171.0 389.5 L 152.1 373.0 L 139.0 366.6 L 129.0 354.0 L 115.5 349.2 L 107.7 342.6 L 96.4 338.3 L 80.7 329.9 L 79.4 326.0 L 112.3 327.8 L 125.5 335.3 L 145.4 343.7 L 159.6 351.9 L 174.9 352.0 L 187.5 357.3 L 196.2 363.7 L 207.6 367.2 L 201.6 373.5 L 210.2 376.1 L 215.5 376.3 L 218.1 381.7 L 223.3 385.9 L 234.3 386.6 L 241.6 391.5 L 237.9 401.0 L 237.3 412.9 Z" fill="#dcfce7" stroke="#86efac" stroke-width="0.8" stroke-opacity="0.8" />
                            <path d="M -182.4 95.9 L -166.3 104.9 L -167.8 111.1 L -161.9 115.0 L -162.4 119.0 L -173.1 117.9 L -168.9 126.4 L -133.3 136.6 L -142.8 140.1 L -148.7 147.2 L -100.4 158.2 L -79.9 159.2 L -71.2 163.1 L -41.6 165.6 L -29.1 165.5 L -27.4 162.5 L -29.4 157.6 L -28.2 154.3 L -19.0 152.7 L -17.5 160.2 L -3.8 163.2 L 5.6 162.0 L 30.5 162.2 L 31.6 157.5 L 25.4 155.1 L 37.5 154.1 L 51.2 148.4 L 68.5 143.5 L 81.1 145.4 L 91.8 142.2 L 98.8 147.0 L 93.7 150.2 L 109.9 151.3 L 111.0 154.2 L 105.8 155.6 L 107.0 160.4 L 96.3 159.0 L 76.9 164.3 L 77.3 168.7 L 69.0 175.1 L 68.3 178.8 L 61.6 185.1 L 49.9 183.4 L 49.3 191.3 L 45.9 193.9 L 47.5 197.2 L 40.1 199.0 L 32.2 186.9 L 28.0 186.9 L 25.6 191.8 L 17.4 187.8 L 22.0 183.4 L 28.7 183.0 L 35.6 176.5 L 27.0 175.2 L -1.2 174.3 L -2.5 168.9 L -9.7 168.6 L -21.6 165.2 L -26.9 170.4 L -16.0 174.5 L -25.4 177.4 L -28.7 180.2 L -19.5 182.2 L -22.1 186.8 L -16.9 192.6 L -14.5 198.9 L -16.7 201.7 L -26.9 201.6 L -45.4 203.2 L -44.5 209.0 L -52.5 213.5 L -74.1 218.7 L -90.9 227.7 L -117.1 237.5 L -117.1 241.1 L -138.1 245.7 L -145.1 246.1 L -149.6 252.0 L -145.7 268.3 L -152.1 275.6 L -152.1 288.6 L -159.9 289.0 L -166.7 294.8 L -162.2 297.3 L -175.8 299.5 L -180.9 304.7 L -186.9 306.9 L -201.1 299.8 L -213.8 281.3 L -227.0 270.3 L -233.3 255.9 L -247.0 245.4 L -257.7 220.7 L -257.6 211.5 L -260.5 204.3 L -282.4 208.9 L -292.9 207.9 L -312.5 198.6 L -305.3 195.9 L -309.8 192.9 L -327.4 186.4 L -317.4 181.2 L -284.4 181.3 L -287.3 174.7 L -295.8 170.8 L -297.5 164.9 L -307.3 161.5 L -290.8 153.4 L -273.3 154.0 L -257.6 146.0 L -248.2 138.2 L -233.7 130.5 L -233.9 125.0 L -221.1 120.6 L -233.2 116.8 L -243.8 104.9 L -236.4 101.6 L -213.6 103.5 L -196.9 102.3 L -182.4 95.9 Z" fill="#dcfce7" stroke="#86efac" stroke-width="0.8" stroke-opacity="0.8" />
                            <text x="330" y="430" fill="#0369a1" font-size="12" font-weight="800" letter-spacing="1.5">INDONESIA</text>
                            <text x="70" y="240" fill="#475569" font-size="10" font-weight="700" letter-spacing="1">THAILAND</text>
                            <text x="500" y="90" fill="#475569" font-size="11" font-weight="700" letter-spacing="1">CHINA</text>
                            <text x="700" y="70" fill="#475569" font-size="10" font-weight="700" letter-spacing="1">JAPAN</text>

                            <!-- Domestic Routes -->
                            <path class="route-hit" data-route="domestic" d="M268 416 Q 284 390 300 370" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="rutePatPontianak" class="route-line" data-route="domestic" d="M268 416 Q 284 390 300 370" stroke="#0284c7" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="domestic" fill="#0284c7"><use href="#shipIcon" /><animateMotion dur="4s" repeatCount="indefinite" rotate="auto"><mpath href="#rutePatPontianak"/></animateMotion></g>

                            <path class="route-hit" data-route="domestic" d="M268 416 Q 224 383 180 350" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="rutePatBatam" class="route-line" data-route="domestic" d="M268 416 Q 224 383 180 350" stroke="#0284c7" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="domestic" fill="#0284c7"><use href="#shipIcon" /><animateMotion dur="4.5s" repeatCount="indefinite" rotate="auto"><mpath href="#rutePatBatam"/></animateMotion></g>

                            <path class="route-hit" data-route="domestic" d="M268 416 Q 189 368 110 320" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="rutePatBelawan" class="route-line" data-route="domestic" d="M268 416 Q 189 368 110 320" stroke="#0284c7" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="domestic" fill="#0284c7"><use href="#shipIcon" /><animateMotion dur="5.5s" repeatCount="indefinite" rotate="auto"><mpath href="#rutePatBelawan"/></animateMotion></g>

                            <path class="route-hit" data-route="domestic" d="M268 416 Q 330 380 390 350" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="rutePatBanjarmasin" class="route-line" data-route="domestic" d="M268 416 Q 330 380 390 350" stroke="#0284c7" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="domestic" fill="#0284c7"><use href="#shipIcon" /><animateMotion dur="3.8s" repeatCount="indefinite" rotate="auto"><mpath href="#rutePatBanjarmasin"/></animateMotion></g>

                            <!-- International Routes -->
                            <path class="route-hit" data-route="international" d="M268 416 Q 200 320 140 250" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="ruteIntKlangChabang" class="route-line" data-route="international" d="M268 416 Q 200 320 140 250" stroke="#d97706" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="international" fill="#d97706"><use href="#shipIcon" /><animateMotion dur="6s" repeatCount="indefinite" rotate="auto"><mpath href="#ruteIntKlangChabang"/></animateMotion></g>

                            <path class="route-hit" data-route="international" d="M268 416 Q 350 250 472 129" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="ruteIntHKGZ" class="route-line" data-route="international" d="M268 416 Q 350 250 472 129" stroke="#d97706" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="international" fill="#d97706"><use href="#shipIcon" /><animateMotion dur="7.5s" repeatCount="indefinite" rotate="auto"><mpath href="#ruteIntHKGZ"/></animateMotion></g>

                            <path class="route-hit" data-route="international" d="M268 416 Q 480 260 745 95" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="ruteIntJapan" class="route-line" data-route="international" d="M268 416 Q 480 260 745 95" stroke="#d97706" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="international" fill="#d97706"><use href="#shipIcon" /><animateMotion dur="9s" repeatCount="indefinite" rotate="auto"><mpath href="#ruteIntJapan"/></animateMotion></g>

                            <path class="route-hit" data-route="international" d="M275 420 Q 420 380 580 320" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="ruteIntRegional" class="route-line" data-route="international" d="M275 420 Q 420 380 580 320" stroke="#d97706" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="international" fill="#d97706"><use href="#shipIcon" /><animateMotion dur="7s" repeatCount="indefinite" rotate="auto"><mpath href="#ruteIntRegional"/></animateMotion></g>

                            <!-- Destination Port Markers -->
                            <g class="dest-marker" data-route="domestic" tabindex="0" role="button"><circle cx="300" cy="330" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="300" cy="370" r="4" fill="#0284c7" stroke="#ffffff" stroke-width="1" /><text x="300" y="360" fill="#006aff" font-size="10" font-weight="700" letter-spacing="1">Pontianak</text></g>
                            <g class="dest-marker" data-route="domestic" tabindex="0" role="button"><circle cx="180" cy="350" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="180" cy="350" r="4" fill="#0284c7" stroke="#ffffff" stroke-width="1" /><text x="160" y="340" fill="#006aff" font-size="10" font-weight="700" letter-spacing="1">Batam</text></g>
                            <g class="dest-marker" data-route="domestic" tabindex="0" role="button"><circle cx="110" cy="320" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="110" cy="320" r="4" fill="#0284c7" stroke="#ffffff" stroke-width="1" /><text x="80" y="310" fill="#006aff" font-size="10" font-weight="700" letter-spacing="1">Belawan</text></g>
                            <g class="dest-marker" data-route="domestic" tabindex="0" role="button"><circle cx="390" cy="350" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="390" cy="350" r="4" fill="#0284c7" stroke="#ffffff" stroke-width="1" /><text x="400" y="340" fill="#006aff" font-size="10" font-weight="700" letter-spacing="1">Banjarmasin</text></g>

                            <g class="dest-marker" data-route="international" tabindex="0" role="button"><circle cx="140" cy="250" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="140" cy="250" r="4" fill="#d97706" stroke="#ffffff" stroke-width="1" /><use href="#flag-th" x="130" y="230" /></g>
                            <g class="dest-marker" data-route="international" tabindex="0" role="button"><circle cx="150" cy="330" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="150" cy="330" r="4" fill="#d97706" stroke="#ffffff" stroke-width="1" /><use href="#flag-my" x="139" y="306" /></g>

                            <path class="route-hit" data-route="international" d="M268 416 Q 209 373 150 330" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="ruteIntMalaysia" class="route-line" data-route="international" d="M268 416 Q 209 373 150 330" stroke="#d97706" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="international" fill="#d97706"><use href="#shipIcon" /><animateMotion dur="5.5s" repeatCount="indefinite" rotate="auto"><mpath href="#ruteIntMalaysia"/></animateMotion></g>

                            <g class="dest-marker" data-route="international" tabindex="0" role="button"><circle cx="165" cy="305" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="165" cy="305" r="4" fill="#d97706" stroke="#ffffff" stroke-width="1" /><use href="#flag-sg" x="154" y="281" /></g>

                            <path class="route-hit" data-route="international" d="M268 416 Q 216 360 165 305" stroke="transparent" stroke-width="18" fill="none" pointer-events="stroke" />
                            <path id="ruteIntSingapore" class="route-line" data-route="international" d="M268 416 Q 216 360 165 305" stroke="#d97706" stroke-width="1.8" stroke-dasharray="4 5" fill="none" opacity="0.85" pointer-events="none" />
                            <g class="route-marker" data-route="international" fill="#d97706"><use href="#shipIcon" /><animateMotion dur="5s" repeatCount="indefinite" rotate="auto"><mpath href="#ruteIntSingapore"/></animateMotion></g>

                            <g class="dest-marker" data-route="international" tabindex="0" role="button"><circle cx="472" cy="129" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="472" cy="129" r="4" fill="#d97706" stroke="#ffffff" stroke-width="1" /><use href="#flag-cn" x="462" y="109" /></g>
                            <g class="dest-marker" data-route="international" tabindex="0" role="button"><circle cx="745" cy="95" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="745" cy="95" r="4" fill="#d97706" stroke="#ffffff" stroke-width="1" /><use href="#flag-jp" x="735" y="75" /></g>

                            <g class="dest-marker" data-route="international" tabindex="0" role="button"><circle cx="580" cy="320" r="14" fill="transparent" pointer-events="all" /><circle class="visible-dot" cx="580" cy="320" r="4" fill="#d97706" stroke="#ffffff" stroke-width="1" /><use href="#flag-ph" x="570" y="300" /><text x="600" y="310" fill="#473f3a" font-size="10" font-weight="700" letter-spacing="1">Philippines (Batangas)</text></g>

                            <g class="origin-marker" data-route="all" tabindex="0" role="button"><circle cx="268" cy="416" r="20" fill="transparent" pointer-events="all" /><circle cx="268" cy="416" r="18" fill="url(#patimbanGlow)"><animate attributeName="r" values="10;20;10" dur="2.4s" repeatCount="indefinite" /><animate attributeName="opacity" values="0.7;0.1;0.7" dur="2.4s" repeatCount="indefinite" /></circle><circle class="visible-dot" cx="268" cy="416" r="5.5" fill="#ec2029" stroke="#ffffff" stroke-width="1.5" /><use href="#flag-id" x="278" y="402" /></g>
                            <text x="150" y="446" fill="#1e293b" font-size="12" font-weight="800" letter-spacing="1">PATIMBAN PORT — SUBANG, WEST JAVA</text>
                        </g>
                    </svg>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ═══ 6. LOCATION & FACILITIES ═══ -->
<section class="py-20 bg-white" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="max-w-3xl mb-10">
            <p class="text-red-600 text-xs font-extrabold uppercase tracking-[0.22em] mb-3">Infrastructure Access</p>
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900">Port Location</h2>
            <p class="mt-3 text-slate-600 leading-relaxed">An integrated vehicle terminal facility engineered to streamline domestic and international automotive supply chains.</p>
        </div>   
    
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
            <div class="lg:col-span-3 bg-slate-50 rounded-2xl border border-slate-200 shadow-sm overflow-hidden" data-aos="fade-right">
                <div class="px-6 py-5 border-b border-slate-200">
                    <h3 class="text-lg font-extrabold text-slate-900">Key Facility Specifications</h3>
                </div>
                <div class="divide-y divide-slate-100">
                    <div class="grid sm:grid-cols-2 gap-2 px-6 py-4"><span class="text-sm font-semibold text-slate-500">Port Address</span><span class="text-sm font-semibold text-slate-900">Patimban Port, Pusakanagara, Subang Regency, West Java</span></div>
                    <div class="grid sm:grid-cols-2 gap-2 px-6 py-4"><span class="text-sm font-semibold text-slate-500">Ro-Ro Berth</span><span class="text-sm font-semibold text-slate-900">300 meters</span></div>
                    <div class="grid sm:grid-cols-2 gap-2 px-6 py-4"><span class="text-sm font-semibold text-slate-500">Basin Draft (Depth)</span><span class="text-sm font-semibold text-slate-900">-10.0 m LWS</span></div>
                    <div class="grid sm:grid-cols-2 gap-2 px-6 py-4"><span class="text-sm font-semibold text-slate-500">Staging Yard Capacity</span><span class="text-sm font-semibold text-slate-900">218,000 CBU units / year</span></div>
                </div>
            </div>

            <div class="lg:col-span-2 grid sm:grid-cols-2 lg:grid-cols-1 gap-6" data-aos="fade-left">
                <div class="rounded-2xl bg-blue-950 p-6 text-white shadow-sm">
                    <h3 class="font-extrabold text-lg">Safety Security</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-300">Compliant with IMO ISPS Code standards and equipped with 24/7 CCTV surveillance across all terminal zones.</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-6 border border-slate-200 shadow-sm">
                    <h3 class="font-extrabold text-lg text-slate-900">Green Port Initiative</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">Energy efficiency and proactive marine waste management to champion sustainable terminal operations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ MAP & GOOGLE ADDRESS ═══ -->
<section class="max-w-7xl mx-auto px-6 pt-10 pb-20 bg-white text-slate-800" data-aos="fade-up">
    <div class="grid lg:grid-cols-12 gap-14 items-start">
        <div class="lg:col-span-5 location-reveal space-y-6" style="animation-delay:.15s" data-aos="fade-right">
            <div>
                <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Our Address</span>
                <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">Patimban Port Terminal</h3>
            </div>
            <p class="text-slate-600 leading-relaxed text-sm">
                Situated within the Patimban National Strategic Project zone in Subang Regency, offering optimized transit routes for automotive manufacturers across West Java.
            </p>
            <div class="space-y-4 pt-2">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200 shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-red-600/10 text-red-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1 text-sm">Port Location</h5>
                        <p class="text-slate-600 text-xs leading-relaxed">Patimban Port, Pusakanagara, Subang Regency, West Java, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-7 location-reveal rounded-2xl overflow-hidden shadow-lg border border-slate-200 h-80 md:h-[420px] bg-slate-100" style="animation-delay:.3s" data-aos="fade-left">
            <iframe
                src="https://www.google.com/maps?q=Pelabuhan+Patimban,+Subang,+Jawa+Barat&output=embed"
                class="w-full h-full"
                style="border:0;" 
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- ═══ 7. ACTION STRIP ═══ -->
<section class="bg-red-600 py-14 relative overflow-hidden text-white" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Ready to Partner with PICT?</h4>
        <p class="text-red-100 text-sm sm:text-base mt-1">Inquire about terminal tariffs, berthing schedules, and automotive handling solutions.</p>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({ duration: 900, easing: 'ease-out-cubic', once: true, offset: 120 });

    // Shipping Route Interactivity Script
    const svg = document.getElementById('routeMapSvg');
    if (svg) {
        const ROUTE_INFO = {
            all: {
                title: 'Patimban Port Comprehensive Network',
                desc: 'Displaying all combined active international deep-sea lanes and domestic feeder channels connecting Patimban Port to global and regional markets.'
            },
            international: {
                title: 'International Shipping Routes',
                desc: 'Destinations: Port Klang (Malaysia), Laem Chabang (Thailand), Hong Kong, Guangzhou, Nagoya, Yokohama, Osaka (Japan).'
            },
            domestic: {
                title: 'Domestic Feeder Network',
                desc: 'Connecting major domestic maritime trade pathways across Indonesia: Pontianak, Batam, Belawan, and Banjarmasin.'
            }
        };

        const infoTitle = document.getElementById('routeInfoTitle');
        const infoDesc = document.getElementById('routeInfoDesc');
        const legendButtons = document.querySelectorAll('.route-legend-btn');
        const routeLines = svg.querySelectorAll('.route-line');
        const routeMarkers = svg.querySelectorAll('.route-marker');
        const routeHits = svg.querySelectorAll('.route-hit');
        const destMarkers = svg.querySelectorAll('.dest-marker');
        const originMarker = svg.querySelector('.origin-marker');

        function setActiveRoute(route) {
            const target = route || 'all';
            routeLines.forEach(el => {
                const match = el.dataset.route === target;
                el.classList.toggle('is-active', target !== 'all' && match);
                el.classList.toggle('is-dim', target !== 'all' && !match);
            });
            routeMarkers.forEach(el => {
                const match = el.dataset.route === target;
                el.classList.toggle('is-dim', target !== 'all' && !match);
            });
            destMarkers.forEach(el => {
                el.classList.toggle('is-active', target !== 'all' && el.dataset.route === target);
            });
            if (originMarker) {
                originMarker.classList.toggle('is-active', target === 'all');
            }
            legendButtons.forEach(btn => {
                const isActive = btn.dataset.route === target;
                btn.classList.toggle('is-active', isActive);
                btn.setAttribute('aria-pressed', String(isActive));
            });
            const info = ROUTE_INFO[target] || ROUTE_INFO.all;
            if (infoTitle && infoDesc) {
                infoTitle.textContent = info.title;
                infoDesc.textContent = info.desc;
            }
        }

        routeHits.forEach(el => {
            el.style.cursor = 'pointer';
            el.addEventListener('click', () => setActiveRoute(el.dataset.route));
        });

        destMarkers.forEach(el => {
            el.addEventListener('click', () => setActiveRoute(el.dataset.route));
        });

        legendButtons.forEach(btn => {
            btn.addEventListener('click', () => setActiveRoute(btn.dataset.route));
        });

        setActiveRoute('all');
    }
});
</script>
@endpush