@extends('layouts.app')

@section('title', 'Ro-Ro Services — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-services {
        background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset("assets/images/patimban-yard-3.jpeg") }}');
        background-size: cover;
        background-position: center;
    }
    .service-card { 
        transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease; 
    }
    .service-card:hover { 
        transform: translateY(-4px); 
        border-color: #dc2626;
        box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.12); 
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-services min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative border-b border-white/10 bg-slate-950 pt-[env(safe-area-inset-top)]">

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Integrated Roll-on/Roll-off Cargo Handling Services
    </h2>
    <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed text-sm">
        Comprehensive port handling solutions designed for maximum efficiency, safety, and seamless vehicle distribution from vessel ramp to regional industrial corridors.
    </p>
</div>

{{-- ═══ SERVICES GRID (LIGHT MODE) ═══ --}}
<section class="max-w-7xl mx-auto px-6 py-20 bg-white text-slate-800">
    <div class="text-center mb-14">
        <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">What We Do</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Our Main Services</h3>
        <p class="text-slate-500 max-w-2xl mx-auto mt-3 text-sm">
            Professional port terminal management adhering to rigorous international automotive logistics benchmarks.
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-red-600/10 text-red-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4M4 17h12m0 0l-4 4m4-4l-4-4"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Stevedoring</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Systematic and secure vessel unloading and loading operations handled by certified professional drivers at our dedicated 300-meter Ro-Ro berth.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-blue-600/10 text-blue-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7l9-4 9 4M4 10v9a1 1 0 001 1h4v-6h6v6h4a1 1 0 001-1v-9"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Cargodoring &amp; Storage</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Efficient transfer of vehicles from the quay apron to our high-capacity staging yards utilizing digital lot mapping and automated slot allocation.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-emerald-600/10 text-emerald-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Pre-Delivery Inspection</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Thorough physical checks, quality control logging, and optical barcode scanning to guarantee zero-scratch delivery before onward transport.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-yellow-600/10 text-yellow-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7h1a2 2 0 012 2v6a2 2 0 01-2 2h-1M5 7H4a2 2 0 00-2 2v6a2 2 0 002 2h1m0-10h14M5 7v10m14-10v10"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Domestic Distribution</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Streamlined gate-out coordination connecting port staging yards directly to regional car-carrier transporter trucks and domestic networks.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-purple-600/10 text-purple-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.6 9h16.8M3.6 15h16.8M12 3a15 15 0 010 18 15 15 0 010-18z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Export &amp; Import Handling</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Seamless customs clearance synchronization via electronic data interchange (EDI) for international vehicle export and import shipments.
            </p>
        </div>

        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-rose-600/10 text-rose-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Vehicle Maintenance</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Specialized technical support, washing facilities, battery charging maintenance, and minor pre-delivery adjustments on-site.
            </p>
        </div>

    </div>
</section>

{{-- ═══ WORKFLOW (LIGHT MODE) ═══ --}}
<section class="bg-slate-100 py-20 border-t border-slate-200 text-slate-800">
    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center mb-14">
            <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">How It Works</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Ro-Ro Service Workflow</h3>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            <div class="text-center">
                <h5 class="font-bold text-slate-900 text-base mb-2">Vessel Berthing</h5>
                <p class="text-slate-600 text-xs leading-relaxed">Car carrier vessel docks safely at the 300m dedicated Ro-Ro berth.</p>
            </div>
            <div class="text-center">
                <h5 class="font-bold text-slate-900 text-base mb-2">Cargo Handling</h5>
                <p class="text-slate-600 text-xs leading-relaxed">Ramp deployment and systematic vehicle discharge via skilled drivers.</p>
            </div>
            <div class="text-center">
                <h5 class="font-bold text-slate-900 text-base mb-2">Inspect &amp; Store</h5>
                <p class="text-slate-600 text-xs leading-relaxed">VIN scanning, digital logging, and marshalling into staging yards.</p>
            </div>
            <div class="text-center">
                <h5 class="font-bold text-slate-900 text-base mb-2">Distribution</h5>
                <p class="text-slate-600 text-xs leading-relaxed">Gate-out processing and transport dispatch to final destinations.</p>
            </div>
        </div>

    </div>
</section>

<!-- ═══ 6. TERMINAL SERVICE FLOW ═══ -->
<section class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Terminal Service Flow</h2>
            </div>
            <span class="text-slate-500 text-sm">Integrated Terminal Operating System (TOS) SOP</span>
        </div>

        <p class="md:hidden text-xs text-slate-500 font-medium mb-3 flex items-center gap-1.5">
            <span class="text-red-600">&larr;</span> Swipe to view all steps <span class="text-red-600">&rarr;</span>
        </p>

        <div class="flex md:grid md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-0 bg-slate-200 p-1 rounded-2xl overflow-x-auto md:overflow-visible snap-x snap-mandatory scroll-smooth no-scrollbar -mx-4 px-4 md:mx-0 md:px-1">
            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none lg:first:rounded-l-xl flex flex-col justify-between shrink-0 w-[72%] xs:w-[62%] sm:w-[45%] md:w-auto snap-start">
                <div>
                    <span class="text-2xl font-black text-red-600">01</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Vessel Berthing</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">The Ro-Ro vessel berths and deploys its stern/quarter ramp onto the quay.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none flex flex-col justify-between shrink-0 w-[72%] xs:w-[62%] sm:w-[45%] md:w-auto snap-start">
                <div>
                    <span class="text-2xl font-black text-red-600">02</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Stevedoring</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Discharging and driving vehicles off the ship by certified professional drivers.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none flex flex-col justify-between shrink-0 w-[72%] xs:w-[62%] sm:w-[45%] md:w-auto snap-start">
                <div>
                    <span class="text-2xl font-black text-red-600">03</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Inspection PDI</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Exterior condition check, barcode VIN optical scanning, and initial tally.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none flex flex-col justify-between shrink-0 w-[72%] xs:w-[62%] sm:w-[45%] md:w-auto snap-start">
                <div>
                    <span class="text-2xl font-black text-red-600">04</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Cargodoring</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Organized vehicle marshalling to designated parking slots across high-capacity yards.</p>
                </div>
            </div>

            <div class="flow-step relative bg-white p-6 rounded-xl lg:rounded-none lg:last:rounded-r-xl flex flex-col justify-between shrink-0 w-[72%] xs:w-[62%] sm:w-[45%] md:w-auto snap-start">
                <div>
                    <span class="text-2xl font-black text-red-600">05</span>
                    <h4 class="font-bold text-blue-950 mt-2 mb-1.5 text-base">Receiving Delivery</h4>
                    <p class="text-slate-600 text-xs leading-relaxed">Gate-out dispatch onto car-carrier transporter trucks toward dealerships and assembly hubs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 5. OUR SERVICE LINES ═══ -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 pb-4 border-b border-slate-200 gap-4">
            <div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Our Service Lines</h2>
            </div>
            <a href="{{ url('/services') }}" class="text-blue-900 font-bold hover:text-red-600 transition flex items-center gap-1.5 text-sm">
                View All Services <span class="text-lg">&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="service-item">
                <span class="text-2xl font-black text-red-600">01</span>
                <h3 class="text-lg font-bold text-blue-950 mt-3 mb-2">Stevedoring</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Systematic vessel loading and discharging operations at the dedicated Ro-Ro berth.
                </p>
            </div>

            <div class="service-item">
                <span class="text-2xl font-black text-red-600">02</span>
                <h3 class="text-lg font-bold text-blue-950 mt-3 mb-2">Cargodoring</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Marshalling and moving vehicles from the quay apron to designated staging yards by unit category.
                </p>
            </div>

            <div class="service-item">
                <span class="text-2xl font-black text-red-600">03</span>
                <h3 class="text-lg font-bold text-blue-950 mt-3 mb-2">Receiving Delivery</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Gate-in receiving and delivery handover for logistics transport partners and car carriers.
                </p>
            </div>

            <div class="service-item">
                <span class="text-2xl font-black text-red-600">04</span>
                <h3 class="text-lg font-bold text-blue-950 mt-3 mb-2">Value Added Services</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Complementary services including pre-delivery inspection (PDI), wash bays, and secure holding yards.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-red-600 py-14 relative overflow-hidden text-white">
    <div class="absolute inset-0 bg-red-700 transform skew-x-12 translate-x-1/3 z-0 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Would You Like to Use Our Services?</h4>
            <p class="text-red-100 text-sm sm:text-base mt-1">Review our competitive terminal service tariffs or speak with our commercial team.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ url('/tariffs') }}" class="px-6 py-3 rounded-xl bg-blue-950 hover:bg-blue-900 text-white font-bold text-xs uppercase tracking-wider transition shadow-xl whitespace-nowrap">
                View Tariffs
            </a>
            <a href="{{ url('/contact') }}" class="px-6 py-3 rounded-xl bg-white text-red-600 hover:bg-slate-100 font-bold text-xs uppercase tracking-wider transition shadow-xl whitespace-nowrap">
                Contact Us 
            </a>
        </div>
    </div>
</section>

@endsection