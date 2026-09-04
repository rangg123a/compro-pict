@extends('layouts.app')

@section('title', 'Terminal Facilities — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-facilities {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('/assets/images/pict-facilities-bg.jpg');
        background-size: cover;
        background-position: center;
    }
    .facility-card { transition: transform .2s ease, box-shadow .2s ease; }
    .facility-card:hover { transform: translateY(-4px); box-shadow: 0 10px 25px -5px rgba(15,23,42,0.1); }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-facilities min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative">

    <span class="text-yellow-400 font-bold tracking-widest text-sm uppercase mb-3">Terminal Facilities</span>

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        International-Standard Vehicle Terminal Facilities
    </h2>

    <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
        et dolore magna aliqua.
    </p>

</div>

{{-- ═══ FACILITIES OVERVIEW ═══ --}}
<section id="facilities" class="max-w-6xl mx-auto px-6 py-20">

    <div class="text-center mb-14">
        <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">What We Offer</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
            Main Infrastructure &amp; Facilities
        </h3>
        <p class="text-slate-600 max-w-2xl mx-auto mt-4">
            Specially designed to support Ro-Ro vehicle terminal operations with high safety and efficiency standards.
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="facility-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12h18M3 12l4-4m-4 4l4 4M21 12l-4-4m4 4l-4 4"/>
                </svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Berth</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
            </p>
        </div>

        <div class="facility-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7l9-4 9 4M4 10v9a1 1 0 001 1h4v-6h6v6h4a1 1 0 001-1v-9"/>
                </svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Storage Yard</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
            </p>
        </div>

        <div class="facility-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">PDI Center</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
            </p>
        </div>

        <div class="facility-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                </svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Workshop &amp; Maintenance Bay</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
            </p>
        </div>

        <div class="facility-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Weighbridge</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
            </p>
        </div>

        <div class="facility-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">CCTV &amp; Security System</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
            </p>
        </div>

    </div>

</section>

{{-- ═══ GATE & FLOW ═══ --}}
<section class="bg-slate-50 py-20">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-14 items-center">

        <div>
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Gate System</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 mb-6 leading-snug tracking-tight">
                Integrated Gate System &amp; Efficient Vehicle Flow
            </h3>
            <p class="text-slate-600 leading-relaxed mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
            </p>
            <p class="text-slate-600 leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua.
            </p>
        </div>

        <div class="space-y-4">
            <div class="bg-white border border-slate-100 rounded-xl p-6 flex items-start gap-4">
                <span class="w-8 h-8 shrink-0 rounded-full bg-teal-600 text-white flex items-center justify-center font-bold text-sm">1</span>
                <div>
                    <h5 class="font-bold text-slate-900 mb-1">Check-in Gate</h5>
                    <p class="text-slate-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="bg-white border border-slate-100 rounded-xl p-6 flex items-start gap-4">
                <span class="w-8 h-8 shrink-0 rounded-full bg-teal-600 text-white flex items-center justify-center font-bold text-sm">2</span>
                <div>
                    <h5 class="font-bold text-slate-900 mb-1">Inspection &amp; Placement</h5>
                    <p class="text-slate-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="bg-white border border-slate-100 rounded-xl p-6 flex items-start gap-4">
                <span class="w-8 h-8 shrink-0 rounded-full bg-teal-600 text-white flex items-center justify-center font-bold text-sm">3</span>
                <div>
                    <h5 class="font-bold text-slate-900 mb-1">Loading onto Vessel / Truck</h5>
                    <p class="text-slate-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="bg-white border border-slate-100 rounded-xl p-6 flex items-start gap-4">
                <span class="w-8 h-8 shrink-0 rounded-full bg-teal-600 text-white flex items-center justify-center font-bold text-sm">4</span>
                <div>
                    <h5 class="font-bold text-slate-900 mb-1">Check-out Gate</h5>
                    <p class="text-slate-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ═══ CAPACITY STATS ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">

    <div class="text-center mb-12">
        <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">By The Numbers</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Terminal Facility Capacity</h3>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">300 <span class="text-base font-medium text-slate-500">m</span></p>
            <p class="text-slate-600 text-sm font-medium">Berth Length</p>
        </div>
        <div class="border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">400.000</p>
            <p class="text-slate-600 text-sm font-medium">Current Units/Year</p>
        </div>
        <div class="border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">600.000</p>
            <p class="text-slate-600 text-sm font-medium">Target Capacity</p>
        </div>
        <div class="border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">24/7</p>
            <p class="text-slate-600 text-sm font-medium">Security Surveillance</p>
        </div>
    </div>

</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-blue-900 py-14">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-white text-2xl font-extrabold mb-2 tracking-tight">Need More Information?</h4>
            <p class="text-slate-300 font-medium">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
        </div>
        <a href="{{ url('/contact') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-8 rounded text-sm transition shadow-sm">
            CONTACT US
        </a>
    </div>
</section>

@endsection