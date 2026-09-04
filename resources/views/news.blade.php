@extends('layouts.app')

@section('title', 'News — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-news {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('{{ asset('assets/images/pict-roro-bg.jpg') }}');
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
        Berita &amp; Informasi Terbaru PICT
    </h2>

</div>

{{-- ═══ NEWS GRID ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        {{-- NOTE: Ganti dengan data dinamis dari database/CMS bila sudah tersedia --}}

        <article class="news-card bg-white border border-slate-100 rounded-xl overflow-hidden">
            <div class="h-44 bg-slate-200 flex items-center justify-center text-slate-400 text-sm">
                Gambar Berita
            </div>
            <div class="p-6">
                <p class="text-teal-600 text-xs font-bold uppercase tracking-widest mb-2">Perusahaan</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2 leading-snug">
                    PICT Perkuat Konsorsium Pemegang Saham
                </h4>
                <p class="text-slate-600 text-sm leading-relaxed mb-4">
                    Toyota Tsusho mengalihkan sebagian sahamnya kepada Toyofuji Shipping, NYK Line, dan
                    Kamigumi Co. untuk memperkuat struktur operasional terminal.
                </p>
                <span class="text-slate-400 text-xs">30 Juni 2023</span>
            </div>
        </article>

        <article class="news-card bg-white border border-slate-100 rounded-xl overflow-hidden">
            <div class="h-44 bg-slate-200 flex items-center justify-center text-slate-400 text-sm">
                Gambar Berita
            </div>
            <div class="p-6">
                <p class="text-teal-600 text-xs font-bold uppercase tracking-widest mb-2">Operasional</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2 leading-snug">
                    Ekspansi Kapasitas Menuju 600.000 Unit per Tahun
                </h4>
                <p class="text-slate-600 text-sm leading-relaxed mb-4">
                    PICT terus melakukan perluasan fasilitas untuk meningkatkan kapasitas penanganan
                    kendaraan sejalan dengan pertumbuhan industri otomotif nasional.
                </p>
                <span class="text-slate-400 text-xs">2024</span>
            </div>
        </article>

        <article class="news-card bg-white border border-slate-100 rounded-xl overflow-hidden">
            <div class="h-44 bg-slate-200 flex items-center justify-center text-slate-400 text-sm">
                Gambar Berita
            </div>
            <div class="p-6">
                <p class="text-teal-600 text-xs font-bold uppercase tracking-widest mb-2">Peresmian</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2 leading-snug">
                    PICT Resmi Mulai Beroperasi di Pelabuhan Patimban
                </h4>
                <p class="text-slate-600 text-sm leading-relaxed mb-4">
                    Terminal kendaraan resmi menggantikan pengelolaan sementara oleh PT Pelabuhan
                    Indonesia (Pelindo) dan mulai melayani bongkar muat kendaraan.
                </p>
                <span class="text-slate-400 text-xs">Desember 2021</span>
            </div>
        </article>

    </div>

    <div class="text-center mt-14">
        <p class="text-slate-500 text-sm">
            Belum ada berita lain saat ini. Nantikan pembaruan terbaru dari kami.
        </p>
    </div>

</section>

@endsection