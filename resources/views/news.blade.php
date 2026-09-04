@extends('layouts.app')

@section('title', 'News — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-news {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('/assets/images/pict-roro-bg.jpg');
        background-size: cover;
        background-position: center;
    }
    .news-card { transition: transform .2s ease, box-shadow .2s ease; }
    .news-card:hover { transform: translateY(-4px); box-shadow: 0 10px 25px -5px rgba(15,23,42,0.1); }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-news min-h-[320px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative">

    <span class="text-yellow-400 font-bold tracking-widest text-sm uppercase mb-3">News</span>

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Latest PICT News &amp; Information
    </h2>

</div>

{{-- ═══ NEWS GRID ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        {{-- NOTE: Replace with dynamic data from a database/CMS when available. --}}

        <article class="news-card bg-white border border-slate-100 rounded-xl overflow-hidden">
            <div class="h-44 bg-slate-200 flex items-center justify-center text-slate-400 text-sm">
                News Image
            </div>
            <div class="p-6">
                <p class="text-teal-600 text-xs font-bold uppercase tracking-widest mb-2">Company</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2 leading-snug">
                    PICT Strengthens Its Shareholder Consortium
                </h4>
                <p class="text-slate-600 text-sm leading-relaxed mb-4">
                    Toyota Tsusho transferred part of its shares to Toyofuji Shipping, NYK Line, and
                    Kamigumi Co. to strengthen the terminal's operational structure.
                </p>
                <span class="text-slate-400 text-xs">June 30, 2023</span>
            </div>
        </article>

        <article class="news-card bg-white border border-slate-100 rounded-xl overflow-hidden">
            <div class="h-44 bg-slate-200 flex items-center justify-center text-slate-400 text-sm">
                News Image
            </div>
            <div class="p-6">
                <p class="text-teal-600 text-xs font-bold uppercase tracking-widest mb-2">Operations</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2 leading-snug">
                    Capacity Expansion Toward 600,000 Units per Year
                </h4>
                <p class="text-slate-600 text-sm leading-relaxed mb-4">
                    PICT continues to expand its facilities to increase vehicle-handling capacity
                    in line with the growth of the national automotive industry.
                </p>
                <span class="text-slate-400 text-xs">2024</span>
            </div>
        </article>

        <article class="news-card bg-white border border-slate-100 rounded-xl overflow-hidden">
            <div class="h-44 bg-slate-200 flex items-center justify-center text-slate-400 text-sm">
                News Image
            </div>
            <div class="p-6">
                <p class="text-teal-600 text-xs font-bold uppercase tracking-widest mb-2">Inauguration</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2 leading-snug">
                    PICT Officially Begins Operations at Patimban Port
                </h4>
                <p class="text-slate-600 text-sm leading-relaxed mb-4">
                    The vehicle terminal officially took over from the temporary management by PT Pelabuhan
                    Indonesia (Pelindo) and began handling vehicle loading and unloading.
                </p>
                <span class="text-slate-400 text-xs">December 2021</span>
            </div>
        </article>

    </div>

    <div class="text-center mt-14">
        <p class="text-slate-500 text-sm">
            There are no other news items at this time. Please check back for our latest updates.
        </p>
    </div>

</section>

@endsection