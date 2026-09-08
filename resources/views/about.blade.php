@extends('layouts.app')

@section('title', 'About PICT — PT Patimban International Car Terminal')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
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
        border-color: #dc2626;
        box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.12); 
    }
    .shareholder-card {
        transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease, background-color .25s ease;
    }
    .shareholder-card:hover {
        transform: translateY(-4px);
        border-color: #dc2626;
        box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.12);
        background-color: #f8fafc;
    }
    @keyframes timeline-check-pop {
        0%, 100% { opacity: 0; transform: scale(0.35) rotate(-45deg); }
        20%, 75% { opacity: 1; transform: scale(1) rotate(0deg); }
    }
    .timeline-check {
        animation: timeline-check-pop 2.4s ease-in-out infinite;
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-about min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative border-b border-slate-200 bg-slate-900 pt-[env(safe-area-inset-top)]" data-aos="fade-down">
  <br><br>
    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        A Modern Vehicle Terminal at the Heart of Indonesia's Automotive Industry
    </h2>
</div>

{{-- ═══ ABOUT / COMPANY PROFILE (LIGHT MODE) ═══ --}}
<section class="max-w-7xl mx-auto px-6 py-20 bg-white text-slate-800" data-aos="fade-up">
    <div class="grid lg:grid-cols-12 gap-14 items-start">
        <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
            <div>
                <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Company Profile</span>
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
                <div class="w-12 h-12 rounded-xl bg-red-600/10 text-red-600 flex items-center justify-center font-bold">&#8594;</div>
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

{{-- ═══ SEJARAH / TIMELINE (LIGHT MODE) ═══ --}}
<section class="bg-slate-100 py-20 border-t border-slate-200 text-slate-800" data-aos="fade-up">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14">
            <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Our Journey</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">PICT's Development History</h3>
        </div>

        <div class="relative border-l-2 border-red-600 ml-4 md:ml-0 space-y-12">
            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="100">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-red-600 rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-red-600 font-mono text-xs mb-1 font-bold">2018</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Construction of Patimban Port Begins</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Construction of Patimban Port commenced in phases as a National Strategic Project at the initiative of the Government of Indonesia, supported by funding under an Official Development Assistance (ODA) loan agreement.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="200">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-red-600 rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-red-600 font-mono text-xs mb-1 font-bold">November 2021</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">PT Patimban International Car Terminal Established</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    PICT was officially established by the Toyota Tsusho Group to manage the vehicle terminal at Patimban Port.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="300">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-red-600 rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-red-600 font-mono text-xs mb-1 font-bold">December 2021</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Operations Commence</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    PICT officially commenced vehicle terminal operations, replacing the temporary management previously provided by PT Pelabuhan Indonesia (Pelindo).
                </p>
            </div>

            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="400">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-red-600 rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-red-600 font-mono text-xs mb-1 font-bold">June 30, 2023</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Shareholder Consortium Strengthened</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Toyota Tsusho transferred part of its shareholding to Toyofuji Shipping, NYK Line, and Kamigumi Co., strengthening PICT's operational structure with the expertise of leading automotive terminal operators from Japan and around the world.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14" data-aos="fade-up" data-aos-delay="500">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-red-600 rounded-full border-4 border-slate-100 shadow"></span>
                <p class="text-red-600 font-mono text-xs mb-1 font-bold">Present Future</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Capacity Expansion to 600,000 Units per Year</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    With a current handling capacity of 400,000 vehicles per year, PICT continues to expand its facilities to increase capacity to 600,000 units per year, in line with the comprehensive development of Patimban Port as Indonesia's leading automotive logistics gateway.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ═══ SHAREHOLDERS (LIGHT MODE WITH LINKS) ═══ --}}
<section class="max-w-7xl mx-auto px-6 py-20 bg-white text-slate-800 border-t border-slate-200" data-aos="fade-up">
    <div class="text-center mb-12">
        <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Our Shareholders</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Shareholder Consortium</h3>
        <p class="text-slate-500 max-w-2xl mx-auto mt-3 text-sm">
            PICT is supported by a consortium of leading Japanese automotive logistics and shipping companies. Click a card to visit their official site.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Toyota Tsusho Corporation -->
        <a href="https://www.toyota-tsusho.com/" target="_blank" rel="noopener noreferrer" class="shareholder-card bg-slate-50 border border-slate-200 rounded-xl p-6 text-center shadow-sm block group" data-aos="fade-up" data-aos-delay="100">
            <p class="text-3xl font-extrabold text-slate-900 mb-1 tracking-tight group-hover:text-red-600 transition-colors">34%</p>
            <p class="text-slate-600 text-xs font-medium">Toyota Tsusho Corporation Group</p>
            <span class="inline-flex items-center gap-1 text-[10px] font-bold text-red-600 mt-3 opacity-0 group-hover:opacity-100 transition-opacity">Visit Website</span>
        </a>

        <!-- Toyofuji Shipping Co., Ltd. -->
        <a href="https://www.toyofuji.co.jp/en/english/company/company.html" target="_blank" rel="noopener noreferrer" class="shareholder-card bg-slate-50 border border-slate-200 rounded-xl p-6 text-center shadow-sm block group" data-aos="fade-up" data-aos-delay="200">
            <p class="text-3xl font-extrabold text-slate-900 mb-1 tracking-tight group-hover:text-red-600 transition-colors">26%</p>
            <p class="text-slate-600 text-xs font-medium">Toyofuji Shipping Co., Ltd.</p>
            <span class="inline-flex items-center gap-1 text-[10px] font-bold text-red-600 mt-3 opacity-0 group-hover:opacity-100 transition-opacity">Visit Website</span>
        </a>

        <!-- NYK Line -->
        <a href="https://www.nyk.com/english/" target="_blank" rel="noopener noreferrer" class="shareholder-card bg-slate-50 border border-slate-200 rounded-xl p-6 text-center shadow-sm block group" data-aos="fade-up" data-aos-delay="300">
            <p class="text-3xl font-extrabold text-slate-900 mb-1 tracking-tight group-hover:text-red-600 transition-colors">25%</p>
            <p class="text-slate-600 text-xs font-medium">NYK Line</p>
            <span class="inline-flex items-center gap-1 text-[10px] font-bold text-red-600 mt-3 opacity-0 group-hover:opacity-100 transition-opacity">Visit Website</span>
        </a>

        <!-- Kamigumi Co., Ltd. -->
        <a href="https://www.kamigumi.co.jp/english/" target="_blank" rel="noopener noreferrer" class="shareholder-card bg-slate-50 border border-slate-200 rounded-xl p-6 text-center shadow-sm block group" data-aos="fade-up" data-aos-delay="400">
            <p class="text-3xl font-extrabold text-slate-900 mb-1 tracking-tight group-hover:text-red-600 transition-colors">15%</p>
            <p class="text-slate-600 text-xs font-medium">Kamigumi Co., Ltd.</p>
            <span class="inline-flex items-center gap-1 text-[10px] font-bold text-red-600 mt-3 opacity-0 group-hover:opacity-100 transition-opacity">Visit Website</span>
        </a>
    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-red-600 py-14 relative overflow-hidden text-white" data-aos="fade-up">
    <div class="absolute inset-0 bg-red-700 transform skew-x-12 translate-x-1/3 z-0 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Would You Like to Learn More About Our Strategic Location?</h4>
            <p class="text-red-100 text-sm sm:text-base mt-1">Patimban Port, Pusakanagara, Subang, West Java, Indonesia</p>
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
});
</script>
@endpush