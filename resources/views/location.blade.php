@extends('layouts.app')

@section('title', 'Strategic Location — PT Patimban International Car Terminal')

@section('content')

<style>
    @keyframes locationFadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes locationZoom {
        from { transform: scale(1.06); }
        to { transform: scale(1); }
    }

    .location-reveal {
        opacity: 0;
        animation: locationFadeUp .8s ease-out forwards;
    }

    .location-hero-image {
        animation: locationZoom 1.4s ease-out both;
    }

    .location-card {
        transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
    }

    .location-card:hover {
        transform: translateY(-4px);
        border-color: #dc2626;
        box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.12);
    }

    @media (prefers-reduced-motion: reduce) {
        .location-reveal, .location-hero-image { animation: none; opacity: 1; }
        .location-card { transition: none; }
    }
</style>

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-location min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative overflow-hidden border-b border-slate-800 bg-slate-900 pt-[env(safe-area-inset-top)]"
    style="background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset("assets/images/background.jpeg") }}'); background-size: cover; background-position: center;">

    <span class="location-reveal text-red-500 font-bold tracking-widest text-xs uppercase mb-3" style="animation-delay:.15s">Strategic Location</span>

    <h2 class="location-reveal text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-4xl" style="animation-delay:.3s">
        The Automotive Logistics Gateway on the North Coast of West Java
    </h2>

    <p class="location-reveal text-slate-200 max-w-2xl mt-4 leading-relaxed text-sm" style="animation-delay:.45s">
        Strategically positioned along the northern corridor of West Java, providing seamless maritime connectivity and direct infrastructure access to major industrial clusters.
    </p>

</div>

{{-- ═══ MAP + ADDRESS (LIGHT MODE) ═══ --}}
<section class="max-w-7xl mx-auto px-6 py-20 bg-white text-slate-800">
    <div class="grid lg:grid-cols-12 gap-14 items-start">

        <div class="lg:col-span-5 location-reveal space-y-6" style="animation-delay:.15s">
            <div>
                <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Our Address</span>
                <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Patimban Port Terminal
                </h3>
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
                        <p class="text-slate-600 text-xs leading-relaxed">
                            Patimban Port, Pusakanagara, Subang Regency, West Java, Indonesia
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200 shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-blue-600/10 text-blue-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7l9-4 9 4M4 10v9a1 1 0 001 1h4v-6h6v6h4a1 1 0 001-1v-9"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1 text-sm">Accessibility Access</h5>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            Direct connectivity to arterial highways and dedicated port access roads.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Google Maps Embed --}}
        <div class="lg:col-span-7 location-reveal rounded-2xl overflow-hidden shadow-lg border border-slate-200 h-80 md:h-[420px] bg-slate-100" style="animation-delay:.3s">
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

{{-- ═══ DISTANCE STATS (LIGHT MODE) ═══ --}}
<section class="bg-slate-100 py-20 border-t border-slate-200 text-slate-800">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Accessibility</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Travel Distances to Industrial Estates</h3>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="location-card bg-white border border-slate-200 rounded-xl p-6 text-center shadow-sm">
                <p class="text-3xl font-extrabold text-slate-900 mb-1 tracking-tight">&plusmn;120 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-xs font-semibold uppercase tracking-wider">Central Jakarta</p>
            </div>
            <div class="location-card bg-white border border-slate-200 rounded-xl p-6 text-center shadow-sm">
                <p class="text-3xl font-extrabold text-slate-900 mb-1 tracking-tight">&plusmn;40 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-xs font-semibold uppercase tracking-wider">Karawang Area</p>
            </div>
            <div class="location-card bg-white border border-slate-200 rounded-xl p-6 text-center shadow-sm">
                <p class="text-3xl font-extrabold text-slate-900 mb-1 tracking-tight">&plusmn;80 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-xs font-semibold uppercase tracking-wider">Bekasi Corridor</p>
            </div>
            <div class="location-card bg-white border border-slate-200 rounded-xl p-6 text-center shadow-sm">
                <p class="text-3xl font-extrabold text-slate-900 mb-1 tracking-tight">&plusmn;15 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-xs font-semibold uppercase tracking-wider">Subang Smartpolitan</p>
            </div>
        </div>

    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-red-600 py-14 relative overflow-hidden text-white">
    <div class="absolute inset-0 bg-red-700 transform skew-x-12 translate-x-1/3 z-0 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Need Directions to the Terminal?</h4>
            <p class="text-red-100 text-sm sm:text-base mt-1">Get in touch with our operations team or visit our office at Patimban Port.</p>
        </div>
        <a href="{{ url('/contact') }}" class="px-6 py-3 rounded-xl bg-blue-950 hover:bg-blue-900 text-white font-bold text-xs uppercase tracking-wider transition shadow-xl whitespace-nowrap">
            Contact Us &rarr;
        </a>
    </div>
</section>

@endsection