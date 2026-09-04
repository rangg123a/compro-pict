@extends('layouts.app')

@section('title', 'Ro-Ro Services — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-services {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), var(--services-bg);
        background-size: cover;
        background-position: center;
    }
    .service-card { transition: transform .2s ease, box-shadow .2s ease; }
    .service-card:hover { transform: translateY(-4px); box-shadow: 0 10px 25px -5px rgba(15,23,42,0.1); }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-services min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative" style="--services-bg: url('{{ asset('assets/images/pict-roro-bg.jpg') }}');">

    <span class="text-yellow-400 font-bold tracking-widest text-sm uppercase mb-3">Ro-Ro Services</span>

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Integrated Roll-on/Roll-off Cargo Handling Services
    </h2>

    <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vehicula, ipsum sed consequat
        posuere, lorem neque tincidunt erat, vitae facilisis magna justo at nisi.
    </p>

</div>

{{-- ═══ SERVICES GRID ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">

    <div class="text-center mb-14">
        <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">What We Do</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Our Main Services</h3>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="service-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4M4 17h12m0 0l-4 4m4-4l-4-4"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Stevedoring</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae sapien at justo
                efficitur consequat, sed porttitor lorem hendrerit.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7l9-4 9 4M4 10v9a1 1 0 001 1h4v-6h6v6h4a1 1 0 001-1v-9"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Cargodoring &amp; Storage</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Curabitur
                commodo, metus at tincidunt luctus, urna enim aliquet nulla.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Pre-Delivery Inspection</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent blandit, nibh sed
                vestibulum tincidunt, lectus lorem cursus nunc, quis vulputate magna erat vel mi.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7h1a2 2 0 012 2v6a2 2 0 01-2 2h-1M5 7H4a2 2 0 00-2 2v6a2 2 0 002 2h1m0-10h14M5 7v10m14-10v10"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Domestic Distribution</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam erat volutpat. Mauris
                luctus, sapien at dignissim suscipit, arcu libero gravida eros.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.6 9h16.8M3.6 15h16.8M12 3a15 15 0 010 18 15 15 0 010-18z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Export &amp; Import Handling</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam facilisis sem vel magna
                malesuada, sed bibendum lorem posuere.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Vehicle Maintenance</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat, justo non
                suscipit placerat, magna nisl faucibus neque, vitae tempus arcu lorem sed nibh.
            </p>
        </div>

    </div>

</section>

{{-- ═══ WORKFLOW ═══ --}}
<section class="bg-slate-50 py-20">
    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center mb-14">
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">How It Works</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Ro-Ro Service Workflow</h3>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="w-14 h-14 mx-auto rounded-full bg-teal-600 text-white flex items-center justify-center font-bold text-lg mb-4">1</div>
                <h5 class="font-bold text-slate-900 mb-2">Vessel Berthing</h5>
                <p class="text-slate-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="text-center">
                <div class="w-14 h-14 mx-auto rounded-full bg-blue-900 text-white flex items-center justify-center font-bold text-lg mb-4">2</div>
                <h5 class="font-bold text-slate-900 mb-2">Cargo Handling</h5>
                <p class="text-slate-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="text-center">
                <div class="w-14 h-14 mx-auto rounded-full bg-blue-900 text-white flex items-center justify-center font-bold text-lg mb-4">3</div>
                <h5 class="font-bold text-slate-900 mb-2">Inspect &amp; Store</h5>
                <p class="text-slate-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="text-center">
                <div class="w-14 h-14 mx-auto rounded-full bg-blue-900 text-white flex items-center justify-center font-bold text-lg mb-4">4</div>
                <h5 class="font-bold text-slate-900 mb-2">Distribution</h5>
                <p class="text-slate-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>

    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-blue-900 py-14">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-white text-2xl font-extrabold mb-2 tracking-tight">Would You Like to Use Our Services?</h4>
            <p class="text-slate-300 font-medium">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ url('/tariffs') }}" class="inline-block bg-white hover:bg-slate-100 text-blue-900 font-bold py-3 px-6 rounded text-sm transition shadow-sm">
                VIEW TARIFFS
            </a>
            <a href="{{ url('/contact') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-6 rounded text-sm transition shadow-sm">
                CONTACT US
            </a>
        </div>
    </div>
</section>

@endsection