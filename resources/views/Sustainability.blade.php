@extends('layouts.app')

@section('title', 'Sustainability — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-sustainability {
        background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset("assets/images/background.jpeg") }}');
        background-size: cover;
        background-position: center;
    }
    .pillar-card { 
        transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease; 
    }
    .pillar-card:hover { 
        transform: translateY(-4px); 
        border-color: #dc2626;
        box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.12); 
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-sustainability min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative border-b border-slate-200 bg-slate-900 pt-[env(safe-area-inset-top)]">
<br>
<br>
    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Committed to Responsible Operations
    </h2>
    <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed text-sm">
        PICT manages terminal operations with strict adherence to environmental stewardship, occupational safety, and active community engagement.
    </p>
</div>

{{-- ═══ PILLARS (LIGHT MODE) ═══ --}}
<section class="max-w-7xl mx-auto px-6 py-20 bg-white text-slate-800">
    <div class="text-center mb-14">
        <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Our Focus</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Our Sustainability Pillars</h3>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

        <div class="pillar-card bg-slate-50 border border-slate-200 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-emerald-600/10 text-emerald-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Environment</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Operational waste management, energy efficiency initiatives, and regular air and water quality monitoring around the terminal zone to minimize environmental impact.
            </p>
        </div>

        <div class="pillar-card bg-slate-50 border border-slate-200 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-red-600/10 text-red-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Occupational Health &amp; Safety</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Implementation of strict Health, Safety, and Environment (HSE) standards for all employees, logistics partners, and visitors within the terminal zone.
            </p>
        </div>

        <div class="pillar-card bg-slate-50 border border-slate-200 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-600/10 text-blue-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 0a4 4 0 10-4-4"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Society &amp; Community</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Community empowerment programs around Patimban Port, including local skills training and initiatives supporting the regional economy.
            </p>
        </div>

    </div>
</section>

{{-- ═══ COMMITMENT STATEMENT (LIGHT MODE) ═══ --}}
<section class="bg-slate-100 py-20 border-t border-slate-200 text-slate-800">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Our Commitment</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6 tracking-tight">
            Supporting Sustainable Industry Growth
        </h3>
        <p class="text-slate-600 leading-relaxed text-sm">
            As an integral part of the national automotive logistics ecosystem, PICT is dedicated to balancing commercial growth with environmental and social responsibilities, aligning with the comprehensive development of Patimban Port as Indonesia's premier automotive gateway.
        </p>
    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-red-600 py-14 relative overflow-hidden text-white">
    <div class="absolute inset-0 bg-red-700 transform skew-x-12 translate-x-1/3 z-0 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Would You Like to Learn More?</h4>
            <p class="text-red-100 text-sm sm:text-base mt-1">Get in touch with us for further information on PICT's sustainability framework and initiatives.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ url('/contact') }}" class="px-6 py-3 rounded-xl bg-blue-950 hover:bg-blue-900 text-white font-bold text-xs uppercase tracking-wider transition shadow-xl whitespace-nowrap">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection