@extends('layouts.app')

@section('title', 'Our Services — PT Patimban International Car Terminal')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@700;800&display=swap" rel="stylesheet">
<style>
    /* ═══ DESIGN SYSTEM OVERRIDES (PICT PREMIUM LIGHT LUXURY) ═══ */
    :root {
        --color-navy: #071E3D;
        --color-ocean: #0F4C81;
        --color-steel: #2563EB;
        --color-accent-red: #D62828;
        --color-light-gray: #F8FAFC;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--color-light-gray);
        color: #0f172a;
        overflow-x: hidden;
    }

    h1, h2, h3, h4, h5, h6, .font-heading {
        font-family: 'Manrope', sans-serif;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.05);
    }

    .glow-effect {
        position: relative;
        overflow: hidden;
    }
    .glow-effect::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(37,99,235,0.08) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
    }
    .glow-effect:hover::before {
        opacity: 1;
    }

    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #F8FAFC;
    }
    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION WITH ASSET IMAGE ═══ --}}
<section class="relative min-h-[75vh] w-full flex flex-col justify-between overflow-hidden bg-slate-900 pt-32 pb-16">
    <div class="absolute inset-0 bg-cover bg-center transform scale-105 transition-transform duration-1000 ease-out opacity-45" 
         style="background-image: url('{{ secure_asset("assets/images/patimban-yard-3.jpeg") }}');"
         data-aos="zoom-out" data-aos-duration="1500">
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-slate-950/40"></div>

    <div class="relative max-w-7xl mx-auto px-6 z-10 w-full my-auto">
       

        <div class="max-w-4xl">
            <h1 class="text-5xl sm:text-7xl font-extrabold text-white tracking-tight font-heading leading-none mb-6" data-aos="fade-up" data-aos-delay="300">
                Enterprise Port Portfolio
            </h1>
            <p class="text-lg sm:text-2xl text-slate-200 font-light leading-relaxed max-w-3xl mb-10" data-aos="fade-up" data-aos-delay="400">
                Specialized marine, stevedoring, and multi-modal logistics solutions engineered for global automotive manufacturers.
            </p>

            <!-- <div class="flex flex-wrap items-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="500">
                <a href="#commercial-matrix" class="px-8 py-4 rounded-full bg-[#2563EB] text-white font-semibold tracking-wide text-sm hover:bg-blue-700 transition-all duration-300 shadow-lg shadow-blue-600/30 flex items-center gap-3 group">
                    <span>Service Matrix</span>
                    <svg class="w-4 h-4 transform group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </a>
                <a href="{{ url('/contact') }}" class="px-8 py-4 rounded-full bg-white/10 backdrop-blur-md text-white font-semibold tracking-wide text-sm hover:bg-white/20 transition-all duration-300 border border-white/25 flex items-center gap-3">
                    <span>Commercial Inquiry</span>
                </a>
            </div> -->
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 w-full z-10 pt-8 border-t border-white/15 mt-12" data-aos="fade-up" data-aos-delay="600">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400 font-bold text-xs">★</div>
                <span class="text-xs font-medium text-slate-200">Tariff Transparency</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400 font-bold text-xs">★</div>
                <span class="text-xs font-medium text-slate-200">Dedicated Account Team</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-red-500/20 flex items-center justify-center text-red-400 font-bold text-xs">★</div>
                <span class="text-xs font-medium text-slate-200">Custom SLA Guarantee</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400 font-bold text-xs">★</div>
                <span class="text-xs font-medium text-slate-200">EDI Custom Link</span>
            </div>
        </div>
    </div>
</section>

{{-- ═══ COMMERCIAL TARIFF HIGHLIGHTS ═══ --}}
<section class="relative z-20 max-w-7xl mx-auto px-6 -mt-8 sm:-mt-12 mb-28" data-aos="fade-up">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="glass-card rounded-3xl p-8 text-center relative overflow-hidden group hover:border-blue-400 transition-all duration-500 shadow-xl">
            <div class="text-xs font-bold uppercase tracking-widest text-[#2563EB] mb-1">Berthage Rate</div>
            <div class="text-3xl font-extrabold text-[#071E3D] font-heading tracking-tight mb-2">Competitive</div>
            <div class="text-xs text-slate-500">Based on GT per 24 hours block</div>
        </div>
        <div class="glass-card rounded-3xl p-8 text-center relative overflow-hidden group hover:border-blue-400 transition-all duration-500 shadow-xl">
            <div class="text-xs font-bold uppercase tracking-widest text-[#2563EB] mb-1">Staging Yard Tariff</div>
            <div class="text-3xl font-extrabold text-[#071E3D] font-heading tracking-tight mb-2">Tiered Slabs</div>
            <div class="text-xs text-slate-500">Optimized for volume manufacturers</div>
        </div>
        <div class="glass-card rounded-3xl p-8 text-center relative overflow-hidden group hover:border-red-400 transition-all duration-500 shadow-xl">
            <div class="text-xs font-bold uppercase tracking-widest text-[#D62828] mb-1">Handling SLA</div>
            <div class="text-3xl font-extrabold text-[#071E3D] font-heading tracking-tight mb-2">&lt; 2 Minutes</div>
            <div class="text-xs text-slate-500">Average unit discharge turnaround</div>
        </div>
    </div>
</section>

{{-- ═══ COMPREHENSIVE SERVICE MATRIX WITH IMAGES ═══ --}}
<section id="commercial-matrix" class="max-w-7xl mx-auto px-6 py-12 bg-white text-slate-800" data-aos="fade-up">
    <div class="text-center mb-16">
        <span class="text-[#D62828] font-bold tracking-widest text-xs uppercase block mb-2">Commercial Portfolio</span>
        <h2 class="text-3xl sm:text-5xl font-extrabold text-[#071E3D] tracking-tight font-heading">Core Service Matrix</h2>
        <p class="text-slate-600 max-w-2xl mx-auto mt-4 text-base">
            Detailed breakdown of our operational divisions designed to accommodate diverse automotive manufacturing needs.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Matrix 1 -->
        <div class="bg-slate-50 rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="100">
            <div class="relative h-56 overflow-hidden">
                <img src="{{ secure_asset('assets/images/vessel-2.jpeg') }}" alt="Wharfage" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 to-transparent"></div>
                <div class="absolute bottom-4 left-6 text-white font-bold text-lg font-heading">Wharfage & Marine</div>
            </div>
            <div class="p-8 flex flex-col justify-between flex-grow">
                <div>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-6">
                        Berth allocation, tugboat coordination, and harbor clearance management for scheduled car carriers.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-700 font-medium mb-6">
                        <li>• 300m Dedicated Ro-Ro Pier</li>
                        <li>• Mooring & Unmooring Teams</li>
                        <li>• Fresh Water Bunkering Support</li>
                    </ul>
                </div>
                <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 text-[#2563EB] font-bold text-xs uppercase tracking-wider">
                    <span>Book Service</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Matrix 2 -->
        <div class="bg-slate-50 rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="200">
            <div class="relative h-56 overflow-hidden">
                <img src="{{ secure_asset('assets/images/vessel-1.jpeg') }}" alt="Stevedoring" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 to-transparent"></div>
                <div class="absolute bottom-4 left-6 text-white font-bold text-lg font-heading">Stevedoring & Discharge</div>
            </div>
            <div class="p-8 flex flex-col justify-between flex-grow">
                <div>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-6">
                        High-speed vehicle offloading via vessel ramps with rigorous damage prevention protocols.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-700 font-medium mb-6">
                        <li>• Certified Driver Pool</li>
                        <li>• Ramp Safety Supervision</li>
                        <li>• Lashing & Unlashing Audit</li>
                    </ul>
                </div>
                <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 text-[#D62828] font-bold text-xs uppercase tracking-wider">
                    <span>Book Service</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Matrix 3 -->
        <div class="bg-slate-50 rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="300">
            <div class="relative h-56 overflow-hidden">
                <img src="{{ secure_asset('assets/images/patimban-yard-1.jpeg') }}" alt="Cargodoring" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 to-transparent"></div>
                <div class="absolute bottom-4 left-6 text-white font-bold text-lg font-heading">Cargodoring & Staging</div>
            </div>
            <div class="p-8 flex flex-col justify-between flex-grow">
                <div>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-6">
                        Secure vehicle marshalling, digital slot allocation, and inventory reporting via TMS.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-700 font-medium mb-6">
                        <li>• 218K+ Annual Capacity Slots</li>
                        <li>• Automated RFID Bay Mapping</li>
                        <li>• 24/7 CCTV & Security Patrol</li>
                    </ul>
                </div>
                <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 text-[#2563EB] font-bold text-xs uppercase tracking-wider">
                    <span>Book Service</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ═══ VALUE-ADDED SERVICE ADD-ONS ═══ --}}
<section class="py-24 bg-[#F8FAFC] relative overflow-hidden border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-[#2563EB] font-bold tracking-widest text-xs uppercase block mb-3">Customized Packages</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-[#071E3D] tracking-tight font-heading">
                Value-Added Solutions
            </h2>
            <p class="mt-4 text-slate-600 text-base">
                Enhance your supply chain with specialized pre-delivery inspections and washing services.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm flex flex-col sm:flex-row items-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-full sm:w-1/2 h-48 sm:h-auto relative">
                    <img src="{{ secure_asset('assets/images/car-5.jpeg') }}" alt="PDI" class="w-full h-full object-cover">
                </div>
                <div class="w-full sm:w-1/2 p-8">
                    <h3 class="text-xl font-bold text-[#071E3D] mb-2 font-heading">Pre-Delivery Inspection (PDI)</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Comprehensive physical audits, battery health checks, and fluid level verifications performed prior to domestic or export release.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm flex flex-col sm:flex-row items-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-full sm:w-1/2 h-48 sm:h-auto relative">
                    <img src="{{ secure_asset('assets/images/car-3.jpeg') }}" alt="Washing Bay" class="w-full h-full object-cover">
                </div>
                <div class="w-full sm:w-1/2 p-8">
                    <h3 class="text-xl font-bold text-[#071E3D] mb-2 font-heading">Washing & Detailing Bay</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        High-pressure automated exterior washing and salt-residue removal facilities to maintain showroom perfection upon vessel arrival.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ CALL TO ACTION WITH BACKGROUND IMAGE ═══ --}}
<section class="py-24 relative overflow-hidden bg-cover bg-center" style="background-image: url('{{ secure_asset("assets/images/background.jpeg") }}')">
    <div class="absolute inset-0 bg-[#071E3D]/90"></div>
    <div class="max-w-5xl mx-auto px-6 text-center relative z-10" data-aos="fade-up">
        <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight font-heading mb-6">
            Ready to Move Your Automotive Logistics to the Next Level?
        </h2>
        <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto mb-10">
            Connect with our commercial and operations team to discuss berth reservation, cargo handling, and long-term partnership opportunities.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="{{ url('/contact') }}" class="px-8 py-4 rounded-full bg-[#D62828] text-white font-semibold tracking-wide text-sm hover:bg-red-700 transition-all shadow-lg shadow-red-600/30">
                Contact Commercial Team
            </a>
            <a href="{{ url('/our-tariffs') }}" class="px-8 py-4 rounded-full bg-white/10 backdrop-blur-md text-white font-semibold tracking-wide text-sm hover:bg-white/20 transition-all border border-white/25">
                View Tariff Structure
            </a>
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
        offset: 100
    });
});
</script>
@endpush