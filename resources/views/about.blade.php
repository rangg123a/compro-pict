@extends('layouts.app')

@section('title', 'About PICT — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-about {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('/assets/images/pict-roro-bg.jpg');
        background-size: cover;
        background-position: center;
    }
    .stat-card { transition: transform .2s ease; }
    .stat-card:hover { transform: translateY(-4px); }
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
<div class="hero-bg-about min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative">

    <span class="text-yellow-400 font-bold tracking-widest text-sm uppercase mb-3">About PICT</span>

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        A Modern Vehicle Terminal at the Heart of Indonesia's Automotive Industry
    </h2>

</div>

{{-- ═══ ABOUT / COMPANY PROFILE ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-14 items-start">
        <div>
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Company Profile</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 mb-6 leading-snug tracking-tight">
                Who We Are
            </h3>
            <p class="text-slate-600 leading-relaxed mb-4">
                PT Patimban International Car Terminal (PICT) is a vehicle terminal operator located at Patimban Port,
                Pusakanagara, Subang Regency, West Java &mdash; approximately 120 kilometers east of central Jakarta. The
                company was established in November 2021 by the Toyota Tsusho Group and officially commenced operations
                in December 2021.
            </p>
            <p class="text-slate-600 leading-relaxed mb-4">
                The development of Patimban Port is a National Strategic Project that has been implemented in phases since
                2018 at the initiative of the Government of Indonesia, with financial support provided through an Official
                Development Assistance (ODA) scheme. After being temporarily managed by PT Pelabuhan Indonesia (Pelindo),
                responsibility for the vehicle terminal was officially transferred to PICT, a company fully capitalized by
                a consortium of Japanese enterprises.
            </p>
            <p class="text-slate-600 leading-relaxed">
                PICT's current shareholders comprise Toyota Tsusho Corporation Group (34%), Toyofuji Shipping Co., Ltd.
                (26%), Nippon Yusen Kabushiki Kaisha &mdash; NYK Line (25%), and Kamigumi Co., Ltd. (15%), making PICT a
                collaboration among leading Japanese companies in the automotive logistics and shipping industries.
            </p>
        </div>

        <div class="space-y-4">
            <div class="stat-card bg-slate-50 border border-slate-100 rounded-xl p-6 flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Current Handling Capacity</p>
                    <p class="text-2xl font-extrabold text-blue-900 tracking-tight">400.000 <span class="text-base font-medium text-slate-500">unit/tahun</span></p>
                </div>
                <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4M4 17h12m0 0l-4 4m4-4l-4-4"/></svg>
            </div>
            <div class="stat-card bg-slate-50 border border-slate-100 rounded-xl p-6 flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Capacity Expansion Target</p>
                    <p class="text-2xl font-extrabold text-blue-900 tracking-tight">600.000 <span class="text-base font-medium text-slate-500">unit/tahun</span></p>
                </div>
                <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <div class="stat-card bg-slate-50 border border-slate-100 rounded-xl p-6 flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Vehicle Terminal Berth Length</p>
                    <p class="text-2xl font-extrabold text-blue-900 tracking-tight">300 <span class="text-base font-medium text-slate-500">meter</span></p>
                </div>
                <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12h18M3 12l4-4m-4 4l4 4M21 12l-4-4m4 4l-4 4"/></svg>
            </div>
            <div class="stat-card bg-slate-50 border border-slate-100 rounded-xl p-6 flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Distance from Central Jakarta</p>
                    <p class="text-2xl font-extrabold text-blue-900 tracking-tight">&plusmn;120 <span class="text-base font-medium text-slate-500">km</span></p>
                </div>
                <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
        </div>
    </div>
</section>

{{-- ═══ SEJARAH / TIMELINE ═══ --}}
<section class="bg-slate-50 py-20">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14">
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Our Journey</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">PICT's Development History</h3>
        </div>

        <div class="relative border-l-2 border-teal-600/30 ml-4 md:ml-0 md:pl-0 space-y-12">
            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow flex items-center justify-center">
                    <svg class="timeline-check w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                </span>
                <p class="text-yellow-600 font-bold text-sm mb-1">2018</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Construction of Patimban Port Begins</h4>
                <p class="text-slate-600 leading-relaxed">
                    Construction of Patimban Port commenced in phases as a National Strategic Project at the initiative of
                    the Government of Indonesia, supported by funding under an Official Development Assistance (ODA) loan
                    agreement.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow flex items-center justify-center">
                    <svg class="timeline-check w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                </span>
                <p class="text-yellow-600 font-bold text-sm mb-1">November 2021</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">PT Patimban International Car Terminal Established</h4>
                <p class="text-slate-600 leading-relaxed">
                    PICT was officially established by the Toyota Tsusho Group to manage the vehicle terminal at Patimban
                    Port.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow flex items-center justify-center">
                    <svg class="timeline-check w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                </span>
                <p class="text-yellow-600 font-bold text-sm mb-1">Desember 2021</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Operations Commence</h4>
                <p class="text-slate-600 leading-relaxed">
                    PICT officially commenced vehicle terminal operations, replacing the temporary management previously
                    provided by PT Pelabuhan Indonesia (Pelindo).
                </p>
            </div>

            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow flex items-center justify-center">
                    <svg class="timeline-check w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                </span>
                <p class="text-yellow-600 font-bold text-sm mb-1">30 Juni 2023</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Shareholder Consortium Strengthened</h4>
                <p class="text-slate-600 leading-relaxed">
                    Toyota Tsusho transferred part of its shareholding to Toyofuji Shipping, NYK Line, and Kamigumi Co.,
                    strengthening PICT's operational structure with the expertise of leading automotive terminal operators
                    from Japan and around the world.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow flex items-center justify-center">
                    <svg class="timeline-check w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                </span>
                <p class="text-yellow-600 font-bold text-sm mb-1">Present &amp; Future</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Capacity Expansion to 600,000 Units per Year</h4>
                <p class="text-slate-600 leading-relaxed">
                    With a current handling capacity of 400,000 vehicles per year, PICT continues to expand its facilities
                    to increase capacity to 600,000 units per year, in line with the comprehensive development of Patimban
                    Port as Indonesia's leading automotive logistics gateway.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ═══ SHAREHOLDERS ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="text-center mb-12">
        <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Our Shareholders</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Shareholder Consortium</h3>
        <p class="text-slate-600 max-w-2xl mx-auto mt-4">
            PICT is supported by a consortium of leading Japanese automotive logistics and shipping companies.
        </p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">34%</p>
            <p class="text-slate-600 text-sm font-medium">Toyota Tsusho Corporation Group</p>
        </div>
        <div class="border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">26%</p>
            <p class="text-slate-600 text-sm font-medium">Toyofuji Shipping Co., Ltd.</p>
        </div>
        <div class="border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">25%</p>
            <p class="text-slate-600 text-sm font-medium">NYK Line</p>
        </div>
        <div class="border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
            <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">15%</p>
            <p class="text-slate-600 text-sm font-medium">Kamigumi Co., Ltd.</p>
        </div>
    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-blue-900 py-14">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-white text-2xl font-extrabold mb-2 tracking-tight">Would You Like to Learn More About Our Strategic Location?</h4>
            <p class="text-slate-300 font-medium">Patimban Port, Pusakanagara, Subang, West Java, Indonesia</p>
        </div>
        <a href="{{ url('/location') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-8 rounded text-sm transition shadow-sm">
            VIEW LOCATION MAP
        </a>
    </div>
</section>

@endsection