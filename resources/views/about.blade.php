@extends('layouts.app')

@section('title', 'About PICT — PT Patimban International Car Terminal')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* ═══ GLOBAL FONT: CENTURY GOTHIC ═══ */
    body, * {
        font-family: 'Century Gothic', 'CenturyGothic', 'Poppins', sans-serif !important;
    }

    .hero-bg-about {
        background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset("assets/images/background.jpeg") }}');
        background-size: cover;
        background-position: center;
    }
    
    .stat-card { 
        transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease; 
    }
    .stat-card:hover { 
        transform: translateY(-4px); 
        border-color: #ec2029;
        box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.12); 
    }
    
    /* Smooth Transition untuk Chart Container & Segmen */
    .chart-container {
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .pie-segment {
        transition: transform 0.3s ease, filter 0.3s ease, opacity 0.3s ease;
        transform-origin: center;
        cursor: pointer;
    }
    
    /* Efek Interaktif Hover Kartu Shareholder */
    .shareholder-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
@endpush

@section('content')

{{-- ═══ 1. HERO SECTION ═══ --}}
<div class="hero-bg-about min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative border-b border-slate-200 bg-slate-900 pt-[env(safe-area-inset-top)]" data-aos="fade-down">
  <br><br>
    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        A Modern Vehicle Terminal at the Heart of Indonesia's Automotive Industry
    </h2>
</div>

{{-- ═══ 2. COMPANY PROFILE ═══ --}}
<section class="max-w-7xl mx-auto px-6 py-20 bg-white text-slate-800" data-aos="fade-up">
    <div class="grid lg:grid-cols-12 gap-14 items-start">
        <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
            <div>
                <span class="text-[#ec2029] font-bold tracking-widest text-xs uppercase block mb-1">Company Profile</span>
                <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Who We Are
                </h3>
            </div>
            <p class="text-slate-600 leading-relaxed text-sm">
                PT Patimban International Car Terminal (PICT) is a vehicle terminal operator located at Patimban Port, Pusakanagara, Subang Regency, West Java approximately 120 kilometers east of central Jakarta. The company was established in November 2021 by the Toyota Tsusho Group and officially commenced operations in December 2021.
            </p>
            <p class="text-slate-600 leading-relaxed text-sm">
                The development of Patimban Port is a National Strategic Project that has been implemented in phases since 2018 at the initiative of the Government of Indonesia, with financial support provided through an Official Development Assistance (ODA) scheme. After being temporarily managed by PT Pelabuhan Indonesia (Pelindo), responsibility for the vehicle terminal was officially transferred to PICT, a company fully capitalized by a consortium of Japanese enterprises.
            </p>
            <p class="text-slate-600 leading-relaxed text-sm">
                PICT's current shareholders comprise Toyota Tsusho Corporation Group (34%), Toyofuji Shipping Co., Ltd. (26%), Nippon Yusen Kabushiki Kaisha NYK Line (25%), and Kamigumi Co., Ltd. (15%), making PICT a collaboration among leading Japanese companies in the automotive logistics and shipping industries.
            </p>
        </div>

        <div class="lg:col-span-6 space-y-4" data-aos="fade-left">
            <div class="stat-card bg-slate-50 border border-slate-200 rounded-xl p-6 flex items-center justify-between shadow-sm">
                <div>
                    <p class="text-slate-500 text-xs uppercase tracking-wider font-semibold">Current Handling Capacity</p>
                    <p class="text-2xl font-extrabold text-slate-900 tracking-tight mt-1">400,000 <span class="text-sm font-medium text-slate-500">units/year</span></p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-[#ec2029]/10 text-[#ec2029] flex items-center justify-center font-bold">&#8594;</div>
            </div>
            <div class="stat-card bg-slate-50 border border-slate-200 rounded-xl p-6 flex items-center justify-between shadow-sm">
                <div>
                    <p class="text-slate-500 text-xs uppercase tracking-wider font-semibold">Capacity Expansion Target</p>
                    <p class="text-2xl font-extrabold text-slate-900 tracking-tight mt-1">600,000 <span class="text-sm font-medium text-slate-500">units/year</span></p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-600/10 text-blue-600 flex items-center justify-center font-bold">&#8599;</div>
            </div>
            <div class="stat-card bg-slate-50 border border-slate-200 rounded-xl p-6 flex items-center justify-between shadow-sm">
                <div>
                    <p class="text-slate-500 text-xs uppercase tracking-wider font-semibold">Vehicle Terminal Berth Length</p>
                    <p class="text-2xl font-extrabold text-slate-900 tracking-tight mt-1">300 <span class="text-sm font-medium text-slate-500">meters</span></p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-600/10 text-emerald-600 flex items-center justify-center font-bold">&#8596;</div>
            </div>
            <div class="stat-card bg-slate-50 border border-slate-200 rounded-xl p-6 flex items-center justify-between shadow-sm">
                <div>
                    <p class="text-slate-500 text-xs uppercase tracking-wider font-semibold">Distance from Central Jakarta</p>
                    <p class="text-2xl font-extrabold text-slate-900 tracking-tight mt-1">&plusmn;120 <span class="text-sm font-medium text-slate-500">km</span></p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-yellow-600/10 text-yellow-600 flex items-center justify-center font-bold">&#9873;</div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ 3. TIMELINE / HISTORY ═══ --}}
<section class="bg-slate-100 py-20 border-t border-slate-200 text-slate-800" data-aos="fade-up">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14">
            <span class="text-[#ec2029] font-bold tracking-widest text-xs uppercase block mb-1">Our Journey</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">PICT's Development History</h3>
        </div>

        <div class="relative border-l-2 border-[#ec2029] ml-4 md:ml-0 space-y-12">
            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="100">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-[#ec2029] rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-[#ec2029] font-mono text-xs mb-1 font-bold">2018</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Construction of Patimban Port Begins</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Construction of Patimban Port commenced in phases as a National Strategic Project at the initiative of the Government of Indonesia, supported by funding under an Official Development Assistance (ODA) loan agreement.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="200">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-[#ec2029] rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-[#ec2029] font-mono text-xs mb-1 font-bold">November 2021</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">PT Patimban International Car Terminal Established</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    PICT was officially established by the Toyota Tsusho Group to manage the vehicle terminal at Patimban Port.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="300">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-[#ec2029] rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-[#ec2029] font-mono text-xs mb-1 font-bold">December 2021</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Operations Commence</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    PICT officially commenced vehicle terminal operations, replacing the temporary management previously provided by PT Pelabuhan Indonesia (Pelindo).
                </p>
            </div>

            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="400">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-[#ec2029] rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-[#ec2029] font-mono text-xs mb-1 font-bold">June 30, 2023</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Shareholder Consortium Strengthened</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Toyota Tsusho transferred part of its shareholding to Toyofuji Shipping, NYK Line, and Kamigumi Co., strengthening PICT's operational structure with the expertise of leading automotive terminal operators from Japan and around the world.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="500">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-[#ec2029] rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-[#ec2029] font-mono text-xs mb-1 font-bold">Present Future</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Capacity Expansion to 600,000 Units per Year</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    With a current handling capacity of 400,000 vehicles per year, PICT continues to expand its facilities to increase capacity to 600,000 units per year, in line with the comprehensive development of Patimban Port as Indonesia's leading automotive logistics gateway.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ═══ 4. SHAREHOLDERS: INTERACTIVE GRID WITH SHIFTING PIE CHART ═══ --}}
<section class="max-w-7xl mx-auto px-6 py-24 bg-white text-slate-800 border-t border-slate-200 overflow-hidden" data-aos="fade-up">
    <div class="text-center mb-16">
        <span class="text-[#ec2029] font-bold tracking-widest text-xs uppercase block mb-1">Our Shareholders</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Shareholder Consortium Composition</h3>
        <p class="text-slate-500 max-w-2xl mx-auto mt-3 text-sm">
            PICT is powered by a strategic alliance of leading Japanese enterprises. Hover over any shareholder card to inspect their segment on the chart.
        </p>
    </div>

    <!-- CONTAINER GRID 3 KOLOM -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center max-w-6xl mx-auto">
        
        {{-- KOLOM KIRI: 2 Kartu (Toyota & NYK Line) --}}
        <div class="lg:col-span-4 flex flex-col gap-5">
            
            <!-- Toyota Tsusho (34%) -->
            <a href="https://www.toyota-tsusho.com/" target="_blank" rel="noopener noreferrer" 
               class="shareholder-card group bg-white border border-slate-200 hover:border-blue-500 p-5 rounded-2xl shadow-sm hover:shadow-md flex items-center justify-between"
               data-target="toyota" data-shift="right" data-aos="fade-right" data-aos-delay="100">
                <div class="flex items-center gap-3.5">
                    <div class="h-10 w-14 flex items-center justify-center shrink-0">
                        <img src="{{ asset('assets/images/logo-toyota.png') }}" alt="Toyota Tsusho" class="max-h-7 max-w-full object-contain opacity-85 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-xs group-hover:text-blue-600 transition-colors">Toyota Tsusho</h4>
                        <p class="text-slate-500 text-[11px]">General Trading</p>
                    </div>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 font-extrabold text-xs border border-blue-200 shrink-0">34%</span>
            </a>

            <!-- NYK Line (25%) -->
            <a href="https://www.nyk.com/english/" target="_blank" rel="noopener noreferrer" 
               class="shareholder-card group bg-white border border-slate-200 hover:border-emerald-500 p-5 rounded-2xl shadow-sm hover:shadow-md flex items-center justify-between"
               data-target="nyk" data-shift="right" data-aos="fade-right" data-aos-delay="200">
                <div class="flex items-center gap-3.5">
                    <div class="h-10 w-14 flex items-center justify-center shrink-0">
                        <img src="{{ asset('assets/images/nyk-logo.jpg') }}" alt="NYK Line" class="max-h-7 max-w-full object-contain opacity-85 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-xs group-hover:text-emerald-600 transition-colors">NYK Line</h4>
                        <p class="text-slate-500 text-[11px]">Global Maritime</p>
                    </div>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-xs border border-emerald-200 shrink-0">25%</span>
            </a>

        </div>

        {{-- KOLOM TENGAH: PIE CHART (DONUT) YANG DAPAT BERGESER & MENONJOL --}}
        <div class="lg:col-span-4 flex flex-col items-center justify-center py-4 chart-container" id="pieChartWrapper" data-aos="zoom-in" data-aos-duration="900">
            <div class="relative w-64 h-64 sm:w-72 sm:h-72 flex items-center justify-center">
                <svg viewBox="0 0 42 42" class="w-full h-full transform -rotate-90 drop-shadow-sm">
                    <!-- Toyota Tsusho: 34% -->
                    <circle cx="21" cy="21" r="15.9155" fill="transparent" stroke="#2563eb" stroke-width="5.5" 
                        stroke-dasharray="34 66" stroke-dashoffset="0" class="pie-segment" data-id="toyota"></circle>
                    
                    <!-- Toyofuji Shipping: 26% -->
                    <circle cx="21" cy="21" r="15.9155" fill="transparent" stroke="#dc2626" stroke-width="5.5" 
                        stroke-dasharray="26 74" stroke-dashoffset="-34" class="pie-segment" data-id="toyofuji"></circle>
                    
                    <!-- NYK Line: 25% -->
                    <circle cx="21" cy="21" r="15.9155" fill="transparent" stroke="#059669" stroke-width="5.5" 
                        stroke-dasharray="25 75" stroke-dashoffset="-60" class="pie-segment" data-id="nyk"></circle>
                    
                    <!-- Kamigumi: 15% -->
                    <circle cx="21" cy="21" r="15.9155" fill="transparent" stroke="#d97706" stroke-width="5.5" 
                        stroke-dasharray="15 85" stroke-dashoffset="-85" class="pie-segment" data-id="kamigumi"></circle>
                </svg>
                
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center pointer-events-none">
                    <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400" id="chartLabelTop">Consortium</span>
                    <span class="text-3xl font-extrabold text-slate-900 tracking-tight" id="chartValueMain">100%</span>
                    <span class="text-[10px] text-slate-500 font-medium" id="chartLabelSub">Japanese Alliance</span>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: 2 Kartu (Toyofuji & Kamigumi) --}}
        <div class="lg:col-span-4 flex flex-col gap-5">
            
            <!-- Toyofuji Shipping (26%) -->
            <a href="https://www.toyofuji.co.jp/en/english/company/company.html" target="_blank" rel="noopener noreferrer" 
               class="shareholder-card group bg-white border border-slate-200 hover:border-red-500 p-5 rounded-2xl shadow-sm hover:shadow-md flex items-center justify-between"
               data-target="toyofuji" data-shift="left" data-aos="fade-left" data-aos-delay="100">
                <div class="flex items-center gap-3.5">
                    <div class="h-10 w-14 flex items-center justify-center shrink-0">
                        <img src="{{ asset('assets/images/toyofuji-logo.jpg') }}" alt="Toyofuji Shipping" class="max-h-7 max-w-full object-contain opacity-85 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-xs group-hover:text-red-600 transition-colors">Toyofuji Shipping</h4>
                        <p class="text-slate-500 text-[11px]">Marine Logistics</p>
                    </div>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-red-50 text-red-700 font-extrabold text-xs border border-red-200 shrink-0">26%</span>
            </a>

            <!-- Kamigumi Co. (15%) -->
            <a href="https://www.kamigumi.co.jp/english/" target="_blank" rel="noopener noreferrer" 
               class="shareholder-card group bg-white border border-slate-200 hover:border-amber-500 p-5 rounded-2xl shadow-sm hover:shadow-md flex items-center justify-between"
               data-target="kamigumi" data-shift="left" data-aos="fade-left" data-aos-delay="200">
                <div class="flex items-center gap-3.5">
                    <div class="h-10 w-14 flex items-center justify-center shrink-0">
                        <img src="{{ asset('assets/images/logo-kamigumi.png') }}" alt="Kamigumi" class="max-h-8 max-w-full object-contain opacity-85 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-xs group-hover:text-amber-600 transition-colors">Kamigumi Co.</h4>
                        <p class="text-slate-500 text-[11px]">Terminal & Warehousing</p>
                    </div>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 font-extrabold text-xs border border-amber-200 shrink-0">15%</span>
            </a>

        </div>

    </div>
</section>

{{-- ═══ 5. CTA STRIP ═══ --}}
<section class="bg-[#ec2029] py-14 relative overflow-hidden text-white" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
        <div>
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Would You Like to Learn More About Our Strategic Location?</h4>
            <p class="text-red-100 text-sm sm:text-base mt-1">Patimban Port, Pusakanagara, Subang, West Java, Indonesia</p>
        </div>
        
        <div class="shrink-0">
            <a href="/contact" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#26347a] text-white font-bold rounded-full border-2 border-[#26347a] hover:bg-transparent hover:border-white transition-all duration-300 shadow-md">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 900,
        easing: 'ease-out-cubic',
        once: true,
        offset: 120
    });

    // Interaksi Hover Kartu Shareholder dengan Pergeseran Pie Chart & Highlight Segmen
    const cards = document.querySelectorAll('.shareholder-card');
    const chartWrapper = document.getElementById('pieChartWrapper');
    const segments = document.querySelectorAll('.pie-segment');
    
    const labelTop = document.getElementById('chartLabelTop');
    const valueMain = document.getElementById('chartValueMain');
    const labelSub = document.getElementById('chartLabelSub');

    const infoData = {
        toyota: { name: "Toyota Tsusho", share: "34%" },
        toyofuji: { name: "Toyofuji Shipping", share: "26%" },
        nyk: { name: "NYK Line", share: "25%" },
        kamigumi: { name: "Kamigumi Co.", share: "15%" }
    };

    cards.forEach(card => {
        const targetId = card.getAttribute('data-target');
        const shiftDir = card.getAttribute('data-shift');

        card.addEventListener('mouseenter', () => {
            // Geser Pie Chart ke arah berlawanan dari kartu yang di-hover
            if (shiftDir === 'right') {
                chartWrapper.style.transform = 'translateX(28px) scale(1.05)';
            } else {
                chartWrapper.style.transform = 'translateX(-28px) scale(1.05)';
            }

            // Ubah teks di tengah chart menjadi detail shareholder
            if (infoData[targetId]) {
                labelTop.textContent = infoData[targetId].name;
                valueMain.textContent = infoData[targetId].share;
                labelSub.textContent = "Shareholder";
            }

            // Atur highlight segmen chart
            segments.forEach(seg => {
                if (seg.getAttribute('data-id') === targetId) {
                    seg.style.transform = 'scale(1.08)';
                    seg.style.filter = 'brightness(1.2) drop-shadow(0 0 6px rgba(0,0,0,0.2))';
                    seg.style.opacity = '1';
                } else {
                    seg.style.opacity = '0.35';
                    seg.style.transform = 'scale(1)';
                }
            });
        });

        card.addEventListener('mouseleave', () => {
            // Kembalikan posisi normal
            chartWrapper.style.transform = 'translateX(0px) scale(1)';
            
            labelTop.textContent = "Consortium";
            valueMain.textContent = "100%";
            labelSub.textContent = "Japanese Alliance";

            segments.forEach(seg => {
                seg.style.opacity = '1';
                seg.style.transform = 'scale(1)';
                seg.style.filter = 'none';
            });
        });
    });
});
</script>
@endpush