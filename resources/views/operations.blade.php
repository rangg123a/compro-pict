@extends('layouts.app')

@section('title', 'Operations — PT Patimban International Car Terminal')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Infinite Marquee Slider khusus untuk Tampilan Mobile */
    @keyframes marqueeMobile {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
    }

    .animate-marquee-mobile {
        display: flex;
        width: max-content;
        animation: marqueeMobile 25s linear infinite;
    }

    .animate-marquee-mobile:hover {
        animation-play-state: paused;
    }

    /* ═══ CSS GRID LAYOUT FOR ANIME.JS TRANSITIONS ═══ */
    .layout-container {
        display: grid;
        width: 100%;
        position: relative;
        gap: 1.5rem;
    }

    .cargo-item {
        border-top: 3px solid #cbd5e1;
        background: #ffffff;
        border-radius: 1rem;
        padding: 1.75rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        transition: border-color .3s ease, box-shadow .3s ease;
        will-change: transform;
    }
    .cargo-item:hover { 
        border-top-color: #dc2626; 
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.1);
    }

    @media (min-width: 768px) {
        .layout-container[data-grid="1"] {
            grid-template-columns: 1.35fr 1fr;
            grid-template-rows: 1fr 1fr;
        }
        .layout-container[data-grid="1"] .cargo-item:nth-child(1) { grid-column: 1; grid-row: 1 / 3; }
        .layout-container[data-grid="1"] .cargo-item:nth-child(2) { grid-column: 2; grid-row: 1; }
        .layout-container[data-grid="1"] .cargo-item:nth-child(3) { grid-column: 2; grid-row: 2; }

        .layout-container[data-grid="2"] {
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: 1fr;
        }
        .layout-container[data-grid="2"] .cargo-item { grid-column: auto; grid-row: auto; }

        .layout-container[data-grid="3"] {
            grid-template-columns: 1fr 1.35fr;
            grid-template-rows: 1fr 1fr;
        }
        .layout-container[data-grid="3"] .cargo-item:nth-child(2) { grid-column: 2; grid-row: 1 / 3; }
        .layout-container[data-grid="3"] .cargo-item:nth-child(1) { grid-column: 1; grid-row: 1; }
        .layout-container[data-grid="3"] .cargo-item:nth-child(3) { grid-column: 1; grid-row: 2; }

        .layout-container[data-grid="4"] {
            grid-template-columns: 1fr 1.35fr;
            grid-template-rows: 1fr 1fr;
        }
        .layout-container[data-grid="4"] .cargo-item:nth-child(3) { grid-column: 2; grid-row: 1 / 3; }
        .layout-container[data-grid="4"] .cargo-item:nth-child(1) { grid-column: 1; grid-row: 2; }
        .layout-container[data-grid="4"] .cargo-item:nth-child(2) { grid-column: 1; grid-row: 1; }
    }

    @media (max-width: 767px) {
        .layout-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')

<!-- ═══ 1. OPERATIONS HEADER SECTION ═══ -->
<div class="relative bg-slate-950 py-24 border-b border-red-600/30 overflow-hidden" data-aos="fade-down">
    <div class="absolute inset-0 opacity-40 bg-cover bg-center" style="background-image: url('{{ secure_asset("assets/images/background.jpeg") }}')"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/30 via-slate-950/10 to-transparent"></div>

    <div class="relative max-w-7xl mx-auto px-6 text-center lg:text-left">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">
            Terminal Operations
        </h1>
        <p class="mt-4 text-slate-300 max-w-2xl text-base sm:text-lg leading-relaxed">
            Providing professional Ro-Ro vehicle and cargo loading and unloading services at Patimban Port, featuring international safety standards, high efficiency, and integrated technology.
        </p>
    </div>
</div>

<!-- ═══ 2. OVERVIEW OPERATIONS SECTION ═══ -->
<section class="py-20 bg-white" data-aos="fade-up">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            Integrated Ro-Ro Cargo Handling System
        </h2>
        <p class="text-slate-600 leading-relaxed text-sm sm:text-base mt-4 max-w-3xl mx-auto">
            PT Patimban International Car Terminal (PICT) manages the operational flow of vehicles from the vessel ramp to the staging yard under a strict “zero scratch” safety protocol. Supported by a digital terminal management system, each vehicle is tracked in real time to ensure fast loading and unloading, accurate inventory data, and a smooth national automotive supply chain as well as import and export operations.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-10 max-w-2xl mx-auto">
            <div class="p-6 rounded-2xl bg-slate-50 border-t-4 border-blue-600 shadow-sm" data-aos="fade-right">
                <p class="text-3xl font-extrabold text-blue-900">218k+</p>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide mt-1">Kapasitas Lapangan / Tahun</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50 border-t-4 border-red-600 shadow-sm" data-aos="fade-left">
                <p class="text-3xl font-extrabold text-red-600">300 m</p>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide mt-1">Panjang Dermaga Ro-Ro</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 3. VEHICLE CARGO TYPE SECTION (WARNA BIRU & MERAH) ═══ -->
<section class="py-20 bg-slate-50 border-t border-slate-200" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-2">Kategori Layanan</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Vehicle Cargo Type
            </h2>
            <p class="mt-3 text-slate-600 text-sm sm:text-base">
                Specialized handling tailored to the specifications and dimensions of various types of vehicles and heavy cargo.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Card 1: CBU (Aksen Merah) -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 border-t-4 border-t-red-600 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="100">
                <div>
                    <div class="w-16 h-16 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center mb-5 group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 15h18M5 15l2-5h10l2 5M5 15v2a1 1 0 001 1h1a1 1 0 001-1v-1m10 1v-1a1 1 0 00-1-1h-1a1 1 0 00-1 1v1M7 11l1-3h8l1 3M7 16a2 2 0 100 4 2 2 0 000-4zm10 0a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Passenger Vehicles (CBU)</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Handling of Completely Built-Up (CBU) vehicles—such as sedans, SUVs, MPVs, and electric vehicles (EVs)—using a scratch-free procedure.
                    </p>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-400">
                    <span>Classification</span>
                    <span class="text-red-600 font-bold">Light Vehicle</span>
                </div>
            </div>

            <!-- Card 2: Bus & Truck (Aksen Biru) -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 border-t-4 border-t-blue-600 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="200">
                <div>
                    <div class="w-16 h-16 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Bus & Truck</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Accommodation for heavy commercial vehicles, tourist buses, logistics trucks, and industrial chassis through robust ramp pathways.
                    </p>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-400">
                    <span>Classification</span>
                    <span class="text-blue-900 font-bold">Commercial</span>
                </div>
            </div>

            <!-- Card 3: Heavy Equipment (Aksen Merah) -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 border-t-4 border-t-red-600 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="300">
                <div>
                    <div class="w-16 h-16 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center mb-5 group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5a3 3 0 100-6 3 3 0 000 6z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Heavy Equipment</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Management of heavy machinery in the mining, plantation, and construction sectors such as excavators, wheel loaders, and bulldozers.
                    </p>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-400">
                    <span>Classification</span>
                    <span class="text-red-600 font-bold">Project Cargo</span>
                </div>
            </div>

            <!-- Card 4: Static & General Cargo (Aksen Biru) -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 border-t-4 border-t-blue-600 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="400">
                <div>
                    <div class="w-16 h-16 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center mb-5 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Static & General Cargo</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Facilities for storage and handling of general non-vehicle cargo and static loads with integrated area management.
                    </p>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-400">
                    <span>Classification</span>
                    <span class="text-blue-900 font-bold">General Cargo</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══ 4. VEHICLE & CARGO TYPES (ANIME.JS DYNAMIC GRID LAYOUT) ═══ -->
<section class="py-20 bg-slate-50 border-y border-slate-200 overflow-hidden" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Vehicle Cargo Types</h2>
            </div>
            <span class="text-slate-500 text-sm font-medium">Standardized handling protocols for Ro-Ro automotive cargo</span>
        </div>

        <div id="cargoLayout" class="layout-container" data-grid="1">
            
            <!-- Card 1: Passenger Vehicles -->
            <div class="cargo-item item flex flex-col justify-between group">
                <div>
                    <div class="w-24 h-24 sm:w-28 sm:h-28 mb-4 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-full h-full drop-shadow-[0_12px_16px_rgba(15,23,42,0.14)]" viewBox="0 0 100 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 40H90V45H10V40Z" fill="#1e293b"/>
                            <circle cx="25" cy="45" r="7" fill="none" stroke="#1e293b" stroke-width="4"/>
                            <circle cx="75" cy="45" r="7" fill="none" stroke="#1e293b" stroke-width="4"/>
                            <path d="M20 40L30 20H70L80 40H20Z" fill="none" stroke="#dc2626" stroke-width="5" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Passenger Vehicles (CBU)</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Handling Completely Built Up (CBU) units including sedans, SUVs, MPVs, and EVs from vessel ramp doors to the staging yard under strict zero scratch protocols.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                    <span class="text-slate-400">Cargo Classification</span>
                    <span class="text-red-600 font-bold tracking-wide">LIGHT VEHICLE</span>
                </div>
            </div>

            <!-- Card 2: Commercial Trucks & Buses -->
            <div class="cargo-item item flex flex-col justify-between group">
                <div>
                    <div class="w-24 h-24 sm:w-28 sm:h-28 mb-4 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-full h-full drop-shadow-[0_12px_16px_rgba(15,23,42,0.14)]" viewBox="0 0 100 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 42H90V46H10V42Z" fill="#1e293b"/>
                            <circle cx="25" cy="46" r="6" fill="none" stroke="#1e293b" stroke-width="3"/>
                            <circle cx="45" cy="46" r="6" fill="none" stroke="#1e293b" stroke-width="3"/>
                            <circle cx="80" cy="46" r="6" fill="none" stroke="#1e293b" stroke-width="3"/>
                            <path d="M15 42V25H55V42H15Z" fill="none" stroke="#dc2626" stroke-width="4"/>
                            <path d="M55 30H75L85 42H55V30Z" fill="none" stroke="#1e293b" stroke-width="4" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Commercial Trucks Buses</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Accommodating heavy duty commercial vehicles, coaches, prime movers, and industrial chassis via high load bearing vessel ramp access.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                    <span class="text-slate-400">Cargo Classification</span>
                    <span class="text-blue-900 font-bold tracking-wide">COMMERCIAL BUS</span>
                </div>
            </div>

            <!-- Card 3: Heavy Equipment & Project Cargo -->
            <div class="cargo-item item flex flex-col justify-between group">
                <div>
                    <div class="w-24 h-24 sm:w-28 sm:h-28 mb-4 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-full h-full drop-shadow-[0_12px_16px_rgba(15,23,42,0.14)]" viewBox="0 0 100 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 42H85V46H15V42Z" fill="#1e293b"/>
                            <circle cx="30" cy="46" r="7" fill="none" stroke="#1e293b" stroke-width="4"/>
                            <circle cx="70" cy="46" r="7" fill="none" stroke="#1e293b" stroke-width="4"/>
                            <path d="M30 42L40 25H60L70 42H30Z" fill="none" stroke="#dc2626" stroke-width="4" stroke-linejoin="round"/>
                            <path d="M45 25L35 15H50" fill="none" stroke="#dc2626" stroke-width="4" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Heavy Equipment Special Cargo</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Handling mining, agricultural, and construction machinery (excavators, wheel loaders, bulldozers) using certified self-propelled roll-on/roll-off and towing methods.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                    <span class="text-slate-400">Cargo Classification</span>
                    <span class="text-red-600 font-bold tracking-wide">HEAVY EQUIPMENT</span>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ═══ 5. DOKUMENTASI OPERASIONAL (Hanya 4 Foto) ═══ -->
<section class="py-24 bg-white border-t border-slate-200 overflow-hidden" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 mb-12 sm:mb-16">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Field Activity</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Dokumentasi Operasional</h2>
            <p class="text-slate-500 mt-2 text-sm">
                A firsthand look at cargo handling operations, the vehicle staging area, and the dock facilities at Patimban Port.
            </p>
        </div>
    </div>

    <!-- TAMPILAN HP (MOBILE): INFINITE MARQUEE SLIDER (4 Foto) -->
    <div class="block lg:hidden relative w-full overflow-hidden py-4">
        <div class="absolute left-0 top-0 bottom-0 w-16 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-16 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>

        <div class="animate-marquee-mobile flex items-center gap-6">
            <!-- Set 1 (4 Items) -->
            <div class="flex items-center gap-6 shrink-0">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/background.jpeg') }}" alt="Terminal Area" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-blue-400">Terminal Area</span>
                            <h4 class="text-white font-bold text-lg mt-0.5">Dock Activities</h4>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-1.jpeg') }}" alt="Storage Yard" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-red-400">Storage Yard</span>
                            <h4 class="text-white font-bold text-lg mt-0.5">Staging Yard Utama</h4>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-2.jpeg') }}" alt="Yard Capacity" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-blue-400">Yard Capacity</span>
                            <h4 class="text-white font-bold text-lg mt-0.5">Staging Area</h4>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-3.jpeg') }}" alt="Supply Chain" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-red-400">Supply Chain</span>
                            <h4 class="text-white font-bold text-lg mt-0.5">Logistics</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Set 2 (Duplikat 4 Items untuk efek infinite loop halus) -->
            <div class="flex items-center gap-6 shrink-0" aria-hidden="true">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/background.jpeg') }}" alt="Terminal Area" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-blue-400">Terminal Area</span>
                            <h4 class="text-white font-bold text-lg mt-0.5">Dock Activities</h4>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-1.jpeg') }}" alt="Storage Yard" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-red-400">Storage Yard</span>
                            <h4 class="text-white font-bold text-lg mt-0.5">Staging Yard Utama</h4>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-2.jpeg') }}" alt="Yard Capacity" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-blue-400">Yard Capacity</span>
                            <h4 class="text-white font-bold text-lg mt-0.5">Staging Area</h4>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-3.jpeg') }}" alt="Supply Chain" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-red-400">Supply Chain</span>
                            <h4 class="text-white font-bold text-lg mt-0.5">Logistics</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TAMPILAN DESKTOP: INTERACTIVE EXPANDING CARDS ON HOVER (Hanya 4 Kartu) -->
    <div class="hidden lg:block max-w-7xl mx-auto px-4 sm:px-6 py-6">
        <div class="flex flex-row gap-4 h-[500px] w-full">
            
            <!-- Kartu 1 -->
            <div class="group relative overflow-hidden rounded-3xl bg-slate-900 flex-1 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] hover:flex-[2.5_1_0%] shadow-xl">
                <img src="{{ secure_asset('assets/images/background.jpeg') }}" alt="Dock Activities" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 w-full p-8 flex flex-col justify-end h-full">
                    <span class="text-xs font-semibold uppercase tracking-wider text-blue-400 opacity-80 group-hover:opacity-100 transition-opacity">Terminal Area</span>
                    <h4 class="text-white font-bold text-2xl mt-1">Dock Activities</h4>
                    <p class="text-slate-200 text-sm mt-2 max-w-xs opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform translate-y-4 group-hover:translate-y-0">
                        Sistem bongkar muat kapal Ro-Ro dengan standar keamanan internasional yang efisien.
                    </p>
                </div>
            </div>

            <!-- Kartu 2 -->
            <div class="group relative overflow-hidden rounded-3xl bg-slate-900 flex-1 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] hover:flex-[2.5_1_0%] shadow-xl">
                <img src="{{ secure_asset('assets/images/patimban-yard-1.jpeg') }}" alt="Staging Yard Utama" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 w-full p-8 flex flex-col justify-end h-full">
                    <span class="text-xs font-semibold uppercase tracking-wider text-red-400 opacity-80 group-hover:opacity-100 transition-opacity">Storage Yard</span>
                    <h4 class="text-white font-bold text-2xl mt-1">Staging Yard Utama</h4>
                    <p class="text-slate-200 text-sm mt-2 max-w-xs opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform translate-y-4 group-hover:translate-y-0">
                        Area penumpukan kendaraan CBU berkapasitas tinggi dengan pengawasan digital 24 jam.
                    </p>
                </div>
            </div>

            <!-- Kartu 3 -->
            <div class="group relative overflow-hidden rounded-3xl bg-slate-900 flex-1 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] hover:flex-[2.5_1_0%] shadow-xl">
                <img src="{{ secure_asset('assets/images/patimban-yard-2.jpeg') }}" alt="Staging Area" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 w-full p-8 flex flex-col justify-end h-full">
                    <span class="text-xs font-semibold uppercase tracking-wider text-blue-400 opacity-80 group-hover:opacity-100 transition-opacity">Yard Capacity</span>
                    <h4 class="text-white font-bold text-2xl mt-1">Staging Area</h4>
                    <p class="text-slate-200 text-sm mt-2 max-w-xs opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform translate-y-4 group-hover:translate-y-0">
                        Pengaturan alur kendaraan yang terstruktur untuk mempercepat proses distribusi logistik.
                    </p>
                </div>
            </div>

            <!-- Kartu 4 -->
            <div class="group relative overflow-hidden rounded-3xl bg-slate-900 flex-1 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] hover:flex-[2.5_1_0%] shadow-xl">
                <img src="{{ secure_asset('assets/images/patimban-yard-3.jpeg') }}" alt="Logistics" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 w-full p-8 flex flex-col justify-end h-full">
                    <span class="text-xs font-semibold uppercase tracking-wider text-red-400 opacity-80 group-hover:opacity-100 transition-opacity">Supply Chain</span>
                    <h4 class="text-white font-bold text-2xl mt-1">Logistics</h4>
                    <p class="text-slate-200 text-sm mt-2 max-w-xs opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform translate-y-4 group-hover:translate-y-0">
                        Integrasi rantai pasok otomotif nasional dan internasional secara mulus dan aman.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ═══ 6. GALERI FOTO TAMBAHAN (SECTION BARU UNTUK SISA FOTO) ═══ -->
<section class="py-24 bg-slate-50 border-t border-slate-200" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 mb-12 sm:mb-16">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-blue-600 font-bold tracking-widest text-xs uppercase block mb-1">Port Gallery</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Galeri Foto & Aktivitas Kapal</h2>
            <p class="text-slate-500 mt-2 text-sm">
                Dokumentasi tambahan armada kapal Ro-Ro, proses inspeksi kendaraan, serta kesiapan fasilitas terminal PICT.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Foto 1 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ secure_asset('assets/images/car-1.jpeg') }}" alt="Quality Check" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="p-6">
   <span class="text-[10px] font-semibold uppercase tracking-wider text-red-600">Staging</span>
                    <h4 class="text-slate-900 font-bold text-lg mt-1">Ready for Export</h4>
                    <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                        Tahap penyiapan unit kendaraan sebelum proses pemuatan ke kapal ekspor.
                    </p>                </div>
            </div>

            <!-- Foto 2 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ secure_asset('assets/images/car-3.jpeg') }}" alt="Vehicle Lineup" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="p-6">
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-blue-600">CBU Units</span>
                    <h4 class="text-slate-900 font-bold text-lg mt-1">Vehicle Lineup</h4>
                    <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                        Deretan unit CBU yang tersusun rapi di area lapangan penumpukan.
                    </p>
                </div>
            </div>

            <!-- Foto 3 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ secure_asset('assets/images/car-5.jpeg') }}" alt="Ready for Export" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="p-6">
                                   <span class="text-[10px] font-semibold uppercase tracking-wider text-red-600">Inspection</span>
                    <h4 class="text-slate-900 font-bold text-lg mt-1">Quality Check Kendaraan</h4>
                    <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                        Inspeksi fisik secara cermat demi memastikan kualitas kendaraan tetap terjaga sempurna.
                    </p>
                </div>
            </div>

            <!-- Foto 4 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ secure_asset('assets/images/vessel-1.jpeg') }}" alt="Dock Activities" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="p-6">
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-blue-600">Terminal Area</span>
                    <h4 class="text-slate-900 font-bold text-lg mt-1">Aktivitas Dermaga</h4>
                    <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                        Pelayanan sandar kapal Ro-Ro internasional di dermaga utama Patimban.
                    </p>
                </div>
            </div>

            <!-- Foto 5 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ secure_asset('assets/images/vessel-2.jpeg') }}" alt="Berthing Process" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="p-6">
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-red-600">Ro-Ro Ship</span>
                    <h4 class="text-slate-900 font-bold text-lg mt-1">Proses Penyandaran Kapal</h4>
                    <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                        Panduan operasional kapal pengangkut kendaraan dengan standar keselamatan tinggi.
                    </p>
                </div>
            </div>

            <!-- Foto 6 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ secure_asset('assets/images/vessel-3.jpeg') }}" alt="Ramp Loading" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="p-6">
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-blue-600">Logistics</span>
                    <h4 class="text-slate-900 font-bold text-lg mt-1">Ramp Loading Operations</h4>
                    <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                        Akses keluar masuk kendaraan melalui pintu rampa roro secara lancar.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        duration: 900,
        easing: 'ease-out-cubic',
        once: true,
        offset: 120
    });
});
</script>

<script type="module">
    import { createLayout, stagger } from 'https://esm.sh/animejs';

    document.addEventListener('DOMContentLoaded', () => {
        const layoutEl = document.querySelector('#cargoLayout');
        if (!layoutEl) return;

        // Nonaktifkan animasi grid otomatis pada perangkat mobile agar performa tetap ringan
        if (window.innerWidth < 768) return;

        const layout = createLayout('#cargoLayout');
        let i = 0;

        function animateLayout() {
            layout.update(({ root }) => {
                root.dataset.grid = (++i % 4) + 1;
            }, {
                duration: 900,
                ease: 'out(3)',
                delay: stagger(100),
                onComplete: () => {
                    setTimeout(animateLayout, 3000);
                }
            });
        }

        setTimeout(animateLayout, 3000);
    });
</script>
@endpush