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
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .location-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(15, 23, 42, .10);
        border-color: rgba(13, 148, 136, .25);
    }

    @media (prefers-reduced-motion: reduce) {
        .location-reveal, .location-hero-image { animation: none; opacity: 1; }
        .location-card { transition: none; }
    }
</style>

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-location min-h-[420px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative overflow-hidden"
    style="background-image: linear-gradient(110deg, rgba(15, 23, 42, .94), rgba(15, 23, 42, .68)), url('/assets/images/pict-roro-bg.jpg'); background-size: cover; background-position: center;">

    <div class="location-hero-image absolute inset-0 -z-10 bg-cover bg-center" style="background-image: url('/assets/images/pict-roro-bg.jpg');"></div>

    <span class="location-reveal text-yellow-400 font-bold tracking-[.24em] text-xs uppercase mb-4" style="animation-delay:.15s">Strategic Location</span>

    <h2 class="location-reveal text-white text-4xl md:text-6xl font-extrabold tracking-tight leading-tight max-w-4xl" style="animation-delay:.3s">
        The Automotive Logistics Gateway on the North Coast of West Java
    </h2>

    <p class="location-reveal text-slate-200 max-w-2xl mt-5 leading-relaxed text-lg" style="animation-delay:.45s">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vitae justo nec ipsum
        facilisis consequat at vel lorem.
    </p>

</div>

{{-- ═══ MAP + ADDRESS ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-14 items-start">

        <div class="location-reveal" style="animation-delay:.15s">
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Our Address</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 mb-6 leading-snug tracking-tight">
                Pelabuhan Patimban
            </h3>
            <p class="text-slate-600 leading-relaxed mb-6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua.
            </p>

            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-teal-600 mt-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                    </p>
                </div>
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-teal-600 mt-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7l9-4 9 4M4 10v9a1 1 0 001 1h4v-6h6v6h4a1 1 0 001-1v-9"/></svg>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation.
                    </p>
                </div>
            </div>
        </div>

        {{-- Google Maps Embed --}}
        <div class="location-reveal rounded-2xl overflow-hidden shadow-xl border border-slate-100 h-80 md:h-full min-h-[320px] transition-transform duration-500 hover:scale-[1.01]" style="animation-delay:.3s">
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

{{-- ═══ DISTANCE STATS ═══ --}}
<section class="bg-slate-50 py-20">
    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Accessibility</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Travel Distances to Industrial Estates</h3>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="location-card bg-white border border-slate-100 rounded-xl p-6 text-center">
                <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">&plusmn;120 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-sm font-medium">Lorem ipsum</p>
            </div>
            <div class="location-card bg-white border border-slate-100 rounded-xl p-6 text-center">
                <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">&plusmn;40 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-sm font-medium">Lorem ipsum</p>
            </div>
            <div class="location-card bg-white border border-slate-100 rounded-xl p-6 text-center">
                <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">&plusmn;80 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-sm font-medium">Lorem ipsum</p>
            </div>
            <div class="location-card bg-white border border-slate-100 rounded-xl p-6 text-center">
                <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">&plusmn;15 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-sm font-medium">Lorem ipsum</p>
            </div>
        </div>

    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-blue-900 py-14">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-white text-2xl font-extrabold mb-2 tracking-tight">Need Directions to the Terminal?</h4>
            <p class="text-slate-300 font-medium">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
        </div>
        <a href="{{ url('/contact') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 hover:-translate-y-1 text-slate-900 font-bold py-3 px-8 rounded text-sm transition-all duration-300 shadow-sm hover:shadow-lg">
            CONTACT US
        </a>
    </div>
</section>

@endsection