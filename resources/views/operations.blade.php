@extends('layouts.app')

@section('title', 'Operations — PT Patimban International Car Terminal')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@700;800&display=swap" rel="stylesheet">
<style>
    /* ═══ DESIGN SYSTEM OVERRIDES (PICT LIGHT LUXURY CORPORATE) ═══ */
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

    /* Light Glass / Clean Card Effects */
    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.05);
    }

    .glass-card-dark {
        background: #071E3D;
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Mouse Light Effect / Glow */
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

    /* Custom Scrollbar */
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

<!-- ═══ 1. FULLSCREEN CINEMATIC HERO (LIGHT THEME) ═══ -->
<section class="relative min-h-screen w-full flex flex-col justify-between overflow-hidden bg-slate-900 pt-32 pb-16">
    <!-- Background Image with Parallax & Soft Overlay -->
        <div class="absolute inset-0 bg-cover bg-center transform scale-105 transition-transform duration-1000 ease-out" 
         style="background-image: url('{{ secure_asset("assets/images/background.jpeg") }}');"
         data-aos="zoom-out" data-aos-duration="1500">
    </div>

    <div class="relative max-w-7xl mx-auto px-6 z-10 w-full my-auto">
          
        <div class="max-w-4xl">
            <h1 class="text-5xl sm:text-7xl font-extrabold text-white tracking-tight font-heading leading-none mb-6" data-aos="fade-up" data-aos-delay="300">
                Terminal Operations
            </h1>
            <p class="text-lg sm:text-2xl text-slate-200 font-light leading-relaxed max-w-3xl mb-10" data-aos="fade-up" data-aos-delay="400">
                World-Class Ro-Ro Automotive Terminal Connecting Indonesia to the Global Automotive Supply Chain.
            </p>
        </div>
    </div>

    <!-- Badges Footer of Hero -->
    <div class="relative max-w-7xl mx-auto px-6 w-full z-10 pt-8 border-t border-white/30 mt-12" data-aos="fade-up" data-aos-delay="600">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-500/35 flex items-center justify-center text-blue-300 font-bold text-xs shadow-lg">✓</div>
                <span class="text-xs font-semibold text-white">Smart Terminal</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-500/35 flex items-center justify-center text-blue-300 font-bold text-xs shadow-lg">✓</div>
                <span class="text-xs font-semibold text-white">ISO Standards</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-red-500/35 flex items-center justify-center text-red-300 font-bold text-xs shadow-lg">✓</div>
                <span class="text-xs font-semibold text-white">Zero Scratch</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-500/35 flex items-center justify-center text-blue-300 font-bold text-xs shadow-lg">✓</div>
                <span class="text-xs font-semibold text-white">Real-Time Monitoring</span>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 2. FLOATING GLASS STATISTICS (CLEAN LIGHT STYLE) ═══ -->
<section class="relative z-20 max-w-7xl mx-auto px-6 -mt-8 sm:-mt-12 mb-28" data-aos="fade-up">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat 1 -->
        <div class="glass-card rounded-3xl p-8 text-center relative overflow-hidden group hover:border-blue-400 transition-all duration-500 shadow-xl">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-blue-50 rounded-full blur-xl group-hover:bg-blue-100 transition-all"></div>
            <div class="text-4xl sm:text-5xl font-extrabold text-[#071E3D] font-heading tracking-tight mb-2 counter" data-target="218">0</div>
            <div class="text-xs font-semibold uppercase tracking-widest text-slate-500">Annual Capacity</div>
        </div>

        <!-- Stat 2 -->
        <div class="glass-card rounded-3xl p-8 text-center relative overflow-hidden group hover:border-blue-400 transition-all duration-500 shadow-xl">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-blue-50 rounded-full blur-xl group-hover:bg-blue-100 transition-all"></div>
            <div class="text-4xl sm:text-5xl font-extrabold text-[#071E3D] font-heading tracking-tight mb-2 counter" data-target="300">0</div>
            <div class="text-xs font-semibold uppercase tracking-widest text-slate-500">Ro-Ro Berth (Meters)</div>
        </div>

        <!-- Stat 3 -->
        <div class="glass-card rounded-3xl p-8 text-center relative overflow-hidden group hover:border-blue-400 transition-all duration-500 shadow-xl">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-blue-50 rounded-full blur-xl group-hover:bg-blue-100 transition-all"></div>
            <div class="text-4xl sm:text-5xl font-extrabold text-[#071E3D] font-heading tracking-tight mb-2">24/7</div>
            <div class="text-xs font-semibold uppercase tracking-widest text-slate-500">Operations</div>
        </div>

        <!-- Stat 4 -->
        <div class="glass-card rounded-3xl p-8 text-center relative overflow-hidden group hover:border-red-400 transition-all duration-500 shadow-xl">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-red-50 rounded-full blur-xl group-hover:bg-red-100 transition-all"></div>
            <div class="text-4xl sm:text-5xl font-extrabold text-[#D62828] font-heading tracking-tight mb-2">ZERO</div>
            <div class="text-xs font-semibold uppercase tracking-widest text-slate-500">Scratch Policy</div>
        </div>
    </div>
</section>

<!-- ═══ 3. WHY PICT (LIGHT THEME) ═══ -->
<section class="py-24 bg-white relative overflow-hidden border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-[#D62828] font-bold tracking-widest text-xs uppercase block mb-3">Excellence in Port Management</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-[#071E3D] tracking-tight font-heading">
                Why PT Patimban International Car Terminal
            </h2>
            <p class="mt-4 text-slate-600 text-base sm:text-lg">
                Setting the benchmark for automotive maritime logistics through digital integration, uncompromising safety, and unmatched operational efficiency.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-slate-50 rounded-3xl p-8 relative glow-effect group hover:-translate-y-2 transition-all duration-500 border border-slate-200/80 shadow-sm hover:shadow-xl" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 rounded-2xl bg-blue-100 border border-blue-200 flex items-center justify-center mb-8 text-[#2563EB] group-hover:bg-[#2563EB] group-hover:text-white transition-all duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#071E3D] mb-4 font-heading">Smart Terminal Technology</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Powered by state-of-the-art Terminal Management Systems (TMS), automated gate controls, and RFID tracking for instant vessel and yard visibility.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-slate-50 rounded-3xl p-8 relative glow-effect group hover:-translate-y-2 transition-all duration-500 border border-slate-200/80 shadow-sm hover:shadow-xl" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 rounded-2xl bg-red-100 border border-red-200 flex items-center justify-center mb-8 text-[#D62828] group-hover:bg-[#D62828] group-hover:text-white transition-all duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#071E3D] mb-4 font-heading">International Safety Standard</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Adhering strictly to ISPS Code, ISO certifications, and rigorous safety protocols ensuring complete protection for all personnel and valuable vehicle cargo.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-slate-50 rounded-3xl p-8 relative glow-effect group hover:-translate-y-2 transition-all duration-500 border border-slate-200/80 shadow-sm hover:shadow-xl" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 rounded-2xl bg-blue-100 border border-blue-200 flex items-center justify-center mb-8 text-[#2563EB] group-hover:bg-[#2563EB] group-hover:text-white transition-all duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#071E3D] mb-4 font-heading">Efficient Automotive Logistics</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Strategic location on the northern coast of West Java connecting manufacturing hubs directly to international shipping routes with minimal turnaround time.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 4. INTERACTIVE TERMINAL OPERATION FLOW ═══ -->
<section id="operations-flow" class="py-24 bg-[#F8FAFC] relative overflow-hidden border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-[#2563EB] font-bold tracking-widest text-xs uppercase block mb-3">Seamless Workflow</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-[#071E3D] tracking-tight font-heading">
                Interactive Terminal Operation Flow
            </h2>
            <p class="mt-4 text-slate-600 text-base">
                Hover or click each milestone to inspect operational parameters, equipment deployed, and safety standards.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-7 gap-4 relative">
            @php
                $steps = [
                    ['title' => 'Ship Arrival', 'time' => '1-2 Hours Prior', 'equip' => 'Vessel Traffic Services (VTS)', 'safety' => 'ISPS Code Compliance', 'div' => 'Marine Operations'],
                    ['title' => 'Berthing', 'time' => '45 - 60 Minutes', 'equip' => 'Tugboats & Mooring Lines', 'safety' => 'Port Safety Clearance', 'div' => 'Harbor Master Team'],
                    ['title' => 'Vehicle Inspection', 'time' => '10 Min / Unit', 'equip' => 'Digital Handheld Scanners', 'safety' => 'Zero-Scratch Protocol', 'div' => 'Quality Assurance'],
                    ['title' => 'Ro-Ro Discharge', 'time' => '2-4 Hours Total', 'equip' => 'Hydraulic Ramps & Lashing', 'safety' => 'PPE & Traffic Control', 'div' => 'Stevedoring Division'],
                    ['title' => 'Yard Management', 'time' => 'Immediate Staging', 'equip' => 'Automated Yard Locator (TMS)', 'safety' => 'Speed Limit 20 km/h', 'div' => 'Yard Control Center'],
                    ['title' => 'Quality Check', 'time' => 'Final Audit', 'equip' => 'High-Resolution Cameras', 'safety' => 'Pre-Delivery Inspection', 'div' => 'Inspection Team'],
                    ['title' => 'Distribution', 'time' => 'On-Demand Gate Out', 'equip' => 'Car Carriers / Transporters', 'safety' => 'Gate Security Check', 'div' => 'Logistics & Delivery']
                ];
            @endphp

            @foreach($steps as $index => $step)
            <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-blue-500 shadow-sm hover:shadow-md transition-all duration-300 group cursor-pointer relative" 
                 data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}"
                 onclick="setActiveStep(this.dataset.step)" data-step="{{ $index }}">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-[#2563EB]">0{{ $index + 1 }}</span>
                    <div class="w-2 h-2 rounded-full bg-slate-300 group-hover:bg-[#D62828] transition-colors"></div>
                </div>
                <h3 class="text-[#071E3D] font-bold text-base mb-2 font-heading">{{ $step['title'] }}</h3>
                <div class="space-y-1 text-xs text-slate-500 pt-3 border-t border-slate-100">
                    <p><strong class="text-slate-700">Time:</strong> {{ $step['time'] }}</p>
                    <p><strong class="text-slate-700">Equip:</strong> {{ $step['equip'] }}</p>
                    <p><strong class="text-slate-700">Safety:</strong> {{ $step['safety'] }}</p>
                    <p><strong class="text-slate-700">Team:</strong> {{ $step['div'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- ═══ 6. WORLD CLASS SERVICES ═══ -->
<section class="py-24 bg-[#F8FAFC] relative overflow-hidden border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-[#D62828] font-bold tracking-widest text-xs uppercase block mb-3">Enterprise Capabilities</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-[#071E3D] tracking-tight font-heading">
                World-Class Services
            </h2>
            <p class="mt-4 text-slate-600 text-base">
                Comprehensive terminal solutions designed for global automotive manufacturers.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="group relative h-[420px] rounded-3xl overflow-hidden bg-slate-900 border border-slate-200 shadow-xl" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute inset-0 bg-cover bg-center transform group-hover:scale-105 transition-transform duration-700" style="background-image: url('{{ secure_asset("assets/images/background.jpeg") }}')"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    <span class="text-xs font-semibold uppercase tracking-wider text-blue-400 mb-2">Maritime Solutions</span>
                    <h3 class="text-2xl font-bold text-white mb-3 font-heading">Ro-Ro Vessel Handling</h3>
                    <p class="text-slate-200 text-sm mb-6 line-clamp-2">
                        State-of-the-art berth facilities and expert mooring teams ensuring rapid, safe vessel turnaround.
                    </p>
                    <a href="#contact" class="inline-flex items-center gap-2 text-white font-semibold text-sm group-hover:text-blue-400 transition-colors">
                        <span>Learn More</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <div class="group relative h-[420px] rounded-3xl overflow-hidden bg-slate-900 border border-slate-200 shadow-xl" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute inset-0 bg-cover bg-center transform group-hover:scale-105 transition-transform duration-700" style="background-image: url('{{ secure_asset("assets/images/patimban-yard-1.jpeg") }}')"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    <span class="text-xs font-semibold uppercase tracking-wider text-red-400 mb-2">Storage Facility</span>
                    <h3 class="text-2xl font-bold text-white mb-3 font-heading">Advanced Yard Management</h3>
                    <p class="text-slate-200 text-sm mb-6 line-clamp-2">
                        High-capacity staging yards with automated tracking, security surveillance, and weather protection.
                    </p>
                    <a href="#contact" class="inline-flex items-center gap-2 text-white font-semibold text-sm group-hover:text-red-400 transition-colors">
                        <span>Learn More</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 7. VEHICLE CARGO TYPES ═══ -->
<section class="py-24 bg-white relative overflow-hidden border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-[#2563EB] font-bold tracking-widest text-xs uppercase block mb-3">Cargo Specifications</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-[#071E3D] tracking-tight font-heading">
                Vehicle Cargo Types
            </h2>
            <p class="mt-4 text-slate-600 text-base">
                Specialized handling protocols tailored to diverse automotive and heavy machinery dimensions.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200 hover:border-red-400 transition-all duration-300 group shadow-sm hover:shadow-xl" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 rounded-2xl bg-red-100 border border-red-200 flex items-center justify-center mb-6 text-[#D62828] group-hover:bg-[#D62828] group-hover:text-white transition-all">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 15h18M5 15l2-5h10l2 5M5 15v2a1 1 0 001 1h1a1 1 0 001-1v-1m10 1v-1a1 1 0 00-1-1h-1a1 1 0 00-1 1v1M7 11l1-3h8l1 3M7 16a2 2 0 100 4 2 2 0 000-4zm10 0a2 2 0 100 4 2 2 0 000-4z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#071E3D] mb-2 font-heading">Passenger Vehicle</h3>
                <p class="text-slate-600 text-xs leading-relaxed mb-6">
                    Sedans, SUVs, MPVs, and electric vehicles handled with precision scratch-free procedures.
                </p>
                <span class="text-xs font-semibold text-[#D62828] tracking-wider uppercase">Light Vehicle</span>
            </div>

            <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200 hover:border-blue-400 transition-all duration-300 group shadow-sm hover:shadow-xl" data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 rounded-2xl bg-blue-100 border border-blue-200 flex items-center justify-center mb-6 text-[#2563EB] group-hover:bg-[#2563EB] group-hover:text-white transition-all">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#071E3D] mb-2 font-heading">Bus & Truck</h3>
                <p class="text-slate-600 text-xs leading-relaxed mb-6">
                    Heavy logistics trucks, industrial chassis, and transport vehicles with robust ramp pathways.
                </p>
                <span class="text-xs font-semibold text-[#2563EB] tracking-wider uppercase">Commercial</span>
            </div>

            <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200 hover:border-red-400 transition-all duration-300 group shadow-sm hover:shadow-xl" data-aos="fade-up" data-aos-delay="300">
                <div class="w-14 h-14 rounded-2xl bg-red-100 border border-red-200 flex items-center justify-center mb-6 text-[#D62828] group-hover:bg-[#D62828] group-hover:text-white transition-all">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5a3 3 0 100-6 3 3 0 000 6z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#071E3D] mb-2 font-heading">Heavy Equipment</h3>
                <p class="text-slate-600 text-xs leading-relaxed mb-6">
                    Excavators, wheel loaders, and bulldozers for mining and agricultural developments.
                </p>
                <span class="text-xs font-semibold text-[#D62828] tracking-wider uppercase">Project Cargo</span>
            </div>

            <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200 hover:border-blue-400 transition-all duration-300 group shadow-sm hover:shadow-xl" data-aos="fade-up" data-aos-delay="400">
                <div class="w-14 h-14 rounded-2xl bg-blue-100 border border-blue-200 flex items-center justify-center mb-6 text-[#2563EB] group-hover:bg-[#2563EB] group-hover:text-white transition-all">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#071E3D] mb-2 font-heading">General Cargo</h3>
                <p class="text-slate-600 text-xs leading-relaxed mb-6">
                    Static cargo and non-vehicle shipments managed under rigorous warehousing standards.
                </p>
                <span class="text-xs font-semibold text-[#2563EB] tracking-wider uppercase">General Cargo</span>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 8. PREMIUM OPERATION GALLERY ═══ -->
<section id="gallery" class="py-24 bg-[#F8FAFC] relative overflow-hidden border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-[#2563EB] font-bold tracking-widest text-xs uppercase block mb-3">Visual Showcase</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-[#071E3D] tracking-tight font-heading">
                Premium Operation Gallery
            </h2>
            <p class="mt-4 text-slate-600 text-base">
                A glimpse into our state-of-the-art terminal infrastructure and vessel operations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $gallery = [
                    ['img' => 'car-1.jpeg', 'title' => 'Ready for Export', 'tag' => 'Staging'],
                    ['img' => 'car-3.jpeg', 'title' => 'Vehicle Lineup', 'tag' => 'CBU Units'],
                    ['img' => 'car-5.jpeg', 'title' => 'Quality Check Kendaraan', 'tag' => 'Inspection'],
                    ['img' => 'vessel-1.jpeg', 'title' => 'Aktivitas Dermaga', 'tag' => 'Terminal Area'],
                    ['img' => 'vessel-2.jpeg', 'title' => 'Proses Penyandaran Kapal', 'tag' => 'Ro-Ro Ship'],
                    ['img' => 'vessel-3.jpeg', 'title' => 'Ramp Loading Operations', 'tag' => 'Logistics']
                ];
            @endphp

            @foreach($gallery as $item)
            <div class="group relative h-80 rounded-3xl overflow-hidden bg-white border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer" data-aos="fade-up">
                <img src="{{ secure_asset('assets/images/' . $item['img']) }}" alt="{{ $item['title'] }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-end">
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-blue-400 mb-1">{{ $item['tag'] }}</span>
                    <h3 class="text-xl font-bold text-white font-heading">{{ $item['title'] }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══ 9. GLOBAL CONNECTION ═══ -->
<section class="py-24 bg-white relative overflow-hidden border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-[#D62828] font-bold tracking-widest text-xs uppercase block mb-3">Global Maritime Network</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-[#071E3D] tracking-tight font-heading">
                Connecting Indonesia to the World
            </h2>
            <p class="mt-4 text-slate-600 text-base">
                Strategic shipping corridors linking Patimban Port to major automotive manufacturing nations.
            </p>
        </div>

        <div class="bg-slate-50 rounded-3xl p-10 border border-slate-200 text-center relative overflow-hidden shadow-sm" data-aos="fade-up">
            <div class="grid grid-cols-2 sm:grid-cols-5 gap-6 mb-12">
                <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                    <p class="text-[#071E3D] font-bold font-heading text-lg">Japan</p>
                    <span class="text-xs text-[#2563EB] font-medium">Primary Hub</span>
                </div>
                <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                    <p class="text-[#071E3D] font-bold font-heading text-lg">Thailand</p>
                    <span class="text-xs text-[#2563EB] font-medium">Regional Route</span>
                </div>
                <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                    <p class="text-[#071E3D] font-bold font-heading text-lg">China</p>
                    <span class="text-xs text-[#2563EB] font-medium">Strategic Corridor</span>
                </div>
                <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                    <p class="text-[#071E3D] font-bold font-heading text-lg">Asia</p>
                    <span class="text-xs text-[#2563EB] font-medium">Export Market</span>
                </div>
                <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm col-span-2 sm:col-span-1">
                    <p class="text-[#071E3D] font-bold font-heading text-lg">Indonesia</p>
                    <span class="text-xs text-[#D62828] font-medium">Patimban Hub</span>
                </div>
            </div>
            <p class="text-slate-600 text-sm max-w-2xl mx-auto">
                Our advanced deep-water berths accommodate the largest global car carriers, ensuring seamless international trade and supply chain continuity.
            </p>
        </div>
    </div>
</section>

<!-- ═══ 10. CALL TO ACTION ═══ -->
<section id="contact" class="py-24 relative overflow-hidden bg-cover bg-center" style="background-image: url('{{ secure_asset("assets/images/background.jpeg") }}')">
    <div class="absolute inset-0 bg-[#071E3D]/90"></div>
    <div class="max-w-5xl mx-auto px-6 text-center relative z-10" data-aos="fade-up">
        <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight font-heading mb-6">
            Ready to Partner with Indonesia's Leading Automotive Terminal?
        </h2>
        <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto mb-10">
            Connect with our commercial and operations team to discuss berth reservation, cargo handling, and long-term partnership opportunities.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="{{ url('/contact') }}" class="px-8 py-4 rounded-full bg-[#D62828] text-white font-semibold tracking-wide text-sm hover:bg-red-700 transition-all shadow-lg shadow-red-600/30">
                Contact Us
            </a>
            <a href="{{ url('/services') }}" class="px-8 py-4 rounded-full bg-white/10 backdrop-blur-md text-white font-semibold tracking-wide text-sm hover:bg-white/20 transition-all border border-white/25">
                View Services
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

    const counters = document.querySelectorAll('.counter');
    const speed = 200;

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText.replace(/,/g, '');
            const inc = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + inc).toLocaleString();
                setTimeout(updateCount, 15);
            } else {
                counter.innerText = target.toLocaleString();
            }
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCount();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(counter);
    });
});

function setActiveStep(index) {
    console.log('Selected step:', index);
}
</script>
@endpush