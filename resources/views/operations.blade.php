@extends('layouts.app')

@section('title', 'Operations — PT Patimban International Car Terminal')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Animasi Staggered Slide & Zoom Bergantian (Selang-seling) khusus layar Desktop */
    @media (min-width: 1024px) {
        @keyframes slideZoomOdd {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-12px) scale(1.04); }
        }

        @keyframes slideZoomEven {
            0%, 100% { transform: translateY(0px) scale(1.02); }
            50% { transform: translateY(12px) scale(0.97); }
        }

        .animate-selang-seling-1 { animation: slideZoomOdd 6s ease-in-out infinite; }
        .animate-selang-seling-2 { animation: slideZoomEven 7s ease-in-out infinite; }
        .animate-selang-seling-3 { animation: slideZoomOdd 6.5s ease-in-out infinite 0.5s; }
        .animate-selang-seling-4 { animation: slideZoomEven 6.8s ease-in-out infinite 1s; }
    }

    /* Infinite Marquee Slider khusus untuk Tampilan HP (Mobile) */
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
</style>
@endpush

@section('content')

<!-- ═══ 1. OPERATIONS HEADER SECTION ═══ -->
<div class="relative bg-slate-950 py-24 border-b border-red-600/30 overflow-hidden" data-aos="fade-down">
    <div class="absolute inset-0 opacity-20 bg-cover bg-center" style="background-image: url('{{ secure_asset("assets/images/background.jpeg") }}')"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-transparent"></div>

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
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Bus & Commercial Truck</h3>
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

<!-- ═══ 4. DOKUMENTASI OPERASIONAL ═══ -->
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

    <!-- TAMPILAN HP (MOBILE): INFINITE MARQUEE SLIDER -->
    <div class="block lg:hidden relative w-full overflow-hidden py-4">
        <div class="absolute left-0 top-0 bottom-0 w-16 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-16 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>

        <div class="animate-marquee-mobile flex items-center gap-6">
            <!-- Set 1 -->
            <div class="flex items-center gap-6 shrink-0">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/background.jpeg') }}" alt="Dermaga" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Dock Activities</h4>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-1.jpeg') }}" alt="Yard 1" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Staging Yard Utama</h4>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-2.jpeg') }}" alt="Yard 2" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Area Penumpukan</h4>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-3.jpeg') }}" alt="Logistik" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Logistik Otomotif</h4>
                    </div>
                </div>
            </div>

            <!-- Set 2 (Duplikat) -->
            <div class="flex items-center gap-6 shrink-0" aria-hidden="true">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/background.jpeg') }}" alt="Dermaga" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Dock Activities</h4>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-1.jpeg') }}" alt="Yard 1" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Staging Yard Utama</h4>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-2.jpeg') }}" alt="Yard 2" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Staging Area</h4>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[360px] w-[260px] relative shrink-0">
                    <img src="{{ secure_asset('assets/images/patimban-yard-3.jpeg') }}" alt="Logistik" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                        <h4 class="text-white font-bold text-lg">Logistics</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TAMPILAN DESKTOP: GRID SELANG-SELING & ANIMASI DINAMIS -->
    <div class="hidden lg:block max-w-7xl mx-auto px-4 sm:px-6 py-6">
        <div class="grid grid-cols-4 gap-6 items-center">
            
            <!-- Foto 1 -->
            <div class="animate-selang-seling-1 rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[380px] relative group">
                <img src="{{ secure_asset('assets/images/background.jpeg') }}" alt="Aktivitas Dermaga" class="w-full h-full object-cover transform transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent flex items-end p-8">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-blue-400">Terminal Area</span>
                        <h4 class="text-white font-bold text-xl mt-1">Dock Activities</h4>
                    </div>
                </div>
            </div>

            <!-- Foto 2 (Selang-seling turun) -->
            <div class="animate-selang-seling-2 rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[380px] relative group translate-y-8">
                <img src="{{ secure_asset('assets/images/patimban-yard-1.jpeg') }}" alt="Staging Yard 1" class="w-full h-full object-cover transform transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent flex items-end p-8">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-red-400">Storage Yard</span>
                        <h4 class="text-white font-bold text-xl mt-1">Staging Yard Utama</h4>
                    </div>
                </div>
            </div>

            <!-- Foto 3 -->
            <div class="animate-selang-seling-3 rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[380px] relative group">
                <img src="{{ secure_asset('assets/images/patimban-yard-2.jpeg') }}" alt="Staging Yard 2" class="w-full h-full object-cover transform transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent flex items-end p-8">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-blue-400">Yard Capacity</span>
                        <h4 class="text-white font-bold text-xl mt-1">Staging Area</h4>
                    </div>
                </div>
            </div>

            <!-- Foto 4 (Selang-seling turun) -->
            <div class="animate-selang-seling-4 rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100 h-[380px] relative group translate-y-8">
                <img src="{{ secure_asset('assets/images/patimban-yard-3.jpeg') }}" alt="Logistik Otomotif" class="w-full h-full object-cover transform transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent flex items-end p-8">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-red-400">Supply Chain</span>
                        <h4 class="text-white font-bold text-xl mt-1">Logistics</h4>
                    </div>
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
@endpush