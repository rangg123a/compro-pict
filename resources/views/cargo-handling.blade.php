@extends('layouts.app')

@section('title', 'Cargo Handling & Terminal Operating System — PT Patimban International Car Terminal')

@push('styles')
<style>
    .cargo-hero-bg {
        background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset("assets/images/patimban-yard-1.jpeg") }}');
        background-size: cover;
        background-position: center;
    }
    .feature-card { 
        transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease; 
    }
    .feature-card:hover { 
        transform: translateY(-4px); 
        border-color: #dc2626;
        box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.12); 
    }
    /* Styling untuk efek tumpukan kartu foto */
    .stack-card {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        transform-origin: bottom right;
    }
</style>
@endpush

@section('content')

<!-- ═══ HERO SECTION ═══ -->
<section class="relative w-full min-h-[75vh] flex items-center overflow-hidden border-b border-slate-200 bg-slate-900 pt-[env(safe-area-inset-top)]">
    <div class="absolute inset-0 cargo-hero-bg z-0"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/85 to-slate-950/40 z-1"></div>
    <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-white to-transparent z-1"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 w-full">
        <div class="max-w-3xl space-y-6">
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                Cargo Handling <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-rose-400">&amp; Digital Tally System</span>
            </h1>

            <p class="text-slate-200 text-sm sm:text-base leading-relaxed border-l-2 border-red-500 pl-4 font-normal">
                Wireless handheld terminal standardization seamlessly integrated into the Terminal Operating System (TOS) in real-time for accurate tracking of thousands of vehicle cargo units at Patimban Port.
            </p>
        </div>
    </div>
</section>

<!-- ═══ PRECISION OPERATION & YARD SHOWCASE (LIGHT MODE) ═══ -->
<section class="py-20 bg-white text-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <div>
                    <span class="text-red-600 font-mono text-xs uppercase tracking-widest font-semibold block mb-1">Precision Operation</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        Precise Parking Slot Allocation Based on Chassis Number (VIN)
                    </h2>
                </div>
                
                <p class="text-sm text-slate-600 leading-relaxed">
                    Every CBU unit discharged from the vessel (stevedoring) is instantly identified using industrial rugged handheld units. The system automatically validates customs manifest documents and assigns staging yard lane coordinates without manual intervention.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex gap-4 items-start shadow-sm">
                        <div class="w-8 h-8 rounded-lg bg-red-600/10 text-red-600 font-bold flex items-center justify-center shrink-0">✓</div>
                        <div>
                            <h4 class="text-slate-900 font-bold text-sm">Zero-Mismatch Validation</h4>
                            <p class="text-xs text-slate-600 mt-1">Prevents port-of-discharge grouping errors for export shipments.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex gap-4 items-start shadow-sm">
                        <div class="w-8 h-8 rounded-lg bg-blue-600/10 text-blue-600 font-bold flex items-center justify-center shrink-0">✓</div>
                        <div>
                            <h4 class="text-slate-900 font-bold text-sm">Visual Body Damage Inspection</h4>
                            <p class="text-xs text-slate-600 mt-1">Direct photo-capture features on the handheld screen to document vehicle condition during ramp-down.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian Tumpukan Foto Bertumpuk (Card Stack Showcase) -->
            <div class="lg:col-span-6 relative flex justify-center">
                <div class="relative w-full h-80 sm:h-96 rounded-2xl shadow-xl border border-slate-200 overflow-hidden bg-slate-100">
                    <div id="photo-stack" class="relative w-full h-full">
                        <img src="{{ asset('assets/images/patimban-yard-1.jpeg') }}" alt="Patimban Yard 1" class="stack-card card-item">
                        <img src="{{ asset('assets/images/patimban-yard-2.jpeg') }}" alt="Patimban Yard 2" class="stack-card card-item">
                        <img src="{{ asset('assets/images/patimban-yard-3.jpeg') }}" alt="Patimban Yard 3" class="stack-card card-item">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-80 pointer-events-none z-40"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══ FIELD DEVICE STANDARDS (LIGHT MODE) ═══ -->
<section class="py-20 bg-slate-50 border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl mb-12">
            <span class="text-red-600 text-xs font-bold uppercase tracking-widest block mb-1">Field Device Standards</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Handheld Operational Capacities</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="feature-card bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <span class="text-red-600 font-mono text-xs font-bold block mb-2">RUGGED INDUSTRIAL</span>
                <h3 class="text-slate-900 font-bold text-base mb-2">Field-Grade Durability</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    IP67 certified devices resistant to dust and seawater, built to withstand drops up to 1.8 meters for 24/7 continuous operations on the apron.
                </p>
            </div>

            <div class="feature-card bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <span class="text-red-600 font-mono text-xs font-bold block mb-2">INSTANT SYNC</span>
                <h3 class="text-slate-900 font-bold text-base mb-2">Sub-Second Synchronization</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Scanning data transmits instantly to the core Terminal Operating System server with zero latency, reducing truck transporter gate-out wait times.
                </p>
            </div>

            <div class="feature-card bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <span class="text-red-600 font-mono text-xs font-bold block mb-2">INTEGRATED GPS</span>
                <h3 class="text-slate-900 font-bold text-base mb-2">Yard Parking Position Accuracy</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    High-precision RTK GPS modules record exact coordinate points of rows and parking slots across the 25-hectare open staging yard.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ═══ INFRASTRUCTURE & FACILITIES (LIGHT MODE) ═══ -->
<section class="py-20 bg-white text-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="rounded-2xl overflow-hidden border border-slate-200 mb-12 relative shadow-lg">
            <img src="{{ asset('assets/images/patimban-yard-2.jpeg') }}" alt="Patimban Staging Yard Overview" class="w-full h-72 sm:h-96 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
            <div class="absolute bottom-6 left-6 right-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <div>
                    <span class="px-2.5 py-1 rounded bg-red-600 text-[10px] font-bold uppercase tracking-wider text-white">Facility Infrastructure</span>
                    <h3 class="text-xl sm:text-2xl font-black text-white mt-2">Staging Yard Capacity &amp; Handheld Integration</h3>
                </div>
                <div class="text-xs font-mono text-slate-200 bg-slate-900/80 px-4 py-2 rounded-lg backdrop-blur border border-white/20">
                    Total Area: <strong>±25 Hectares</strong> | Capacity: <strong>218,000 CBU/Year</strong>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-slate-50 border border-slate-200 rounded-xl shadow-sm">
                <h4 class="text-slate-900 font-bold text-sm mb-2">Gate-In Transporter</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Unit order verification and car-carrier routing assignment into parking slots without paper tickets.</p>
            </div>
            <div class="p-6 bg-slate-50 border border-slate-200 rounded-xl shadow-sm">
                <h4 class="text-slate-900 font-bold text-sm mb-2">Pre-Delivery Inspection (PDI)</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Accessory verification, rapigard protective film checks, and fuel status logs prior to vessel loading.</p>
            </div>
            <div class="p-6 bg-slate-50 border border-slate-200 rounded-xl shadow-sm">
                <h4 class="text-slate-900 font-bold text-sm mb-2">Customs Release Sync</h4>
                <p class="text-xs text-slate-600 leading-relaxed">Real-time clearance synchronization with CEISA and INAPORTNET directly on the operator's handheld display.</p>
            </div>
        </div>

    </div>
</section>

<!-- ═══ ACTION STRIP ═══ -->
<section class="bg-red-600 py-14 relative overflow-hidden text-white">
    <div class="absolute inset-0 bg-red-700 transform skew-x-12 translate-x-1/3 z-0 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Need Consultation on TOS &amp; Cargo Systems Integration?</h4>
            <p class="text-red-100 text-sm sm:text-base mt-1">Contact our operations team for EDI data exchange frameworks and cargo manifest support.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ url('/contact') }}" class="px-6 py-3 rounded-xl bg-blue-950 hover:bg-blue-900 text-white font-bold text-xs uppercase tracking-wider transition shadow-xl whitespace-nowrap">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.card-item');
        let currentIndex = 0;

        function updateStack() {
            cards.forEach((card, i) => {
                const offset = (i - currentIndex + cards.length) % cards.length;
                
                if (offset === 0) {
                    // Kartu paling depan (aktif)
                    card.style.zIndex = '30';
                    card.style.transform = 'translate(0px, 0px) scale(1) rotate(0deg)';
                    card.style.opacity = '1';
                } else if (offset === 1) {
                    // Kartu lapis pertama di belakangnya (sedikit bergeser & miring)
                    card.style.zIndex = '20';
                    card.style.transform = 'translate(16px, -14px) scale(0.95) rotate(3deg)';
                    card.style.opacity = '0.75';
                } else {
                    // Kartu lapis kedua di belakangnya
                    card.style.zIndex = '10';
                    card.style.transform = 'translate(32px, -28px) scale(0.90) rotate(6deg)';
                    card.style.opacity = '0.5';
                }
            });
        }

        // Jalankan posisi awal
        updateStack();

        // Putar tumpukan kartu setiap 4 detik
        setInterval(() => {
            currentIndex = (currentIndex + 1) % cards.length;
            updateStack();
        }, 4000);
    });
</script>
@endpush