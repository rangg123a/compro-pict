@extends('layouts.app')

@section('title', 'Sustainability — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-sustainability {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('{{ asset('assets/images/pict-roro-bg.jpg') }}');
        background-size: cover;
        background-position: center;
    }
    .pillar-card { transition: transform .2s ease, box-shadow .2s ease; }
    .pillar-card:hover { transform: translateY(-4px); box-shadow: 0 10px 25px -5px rgba(15,23,42,0.1); }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-sustainability min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative">

    <span class="text-yellow-400 font-bold tracking-widest text-sm uppercase mb-3">Sustainability</span>

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Berkomitmen pada Operasional yang Bertanggung Jawab
    </h2>

    <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed">
        PICT menjalankan operasional terminal dengan memperhatikan aspek lingkungan, keselamatan kerja,
        dan kontribusi terhadap masyarakat sekitar.
    </p>

</div>

{{-- ═══ PILLARS ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">

    <div class="text-center mb-14">
        <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Our Focus</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Pilar Keberlanjutan Kami</h3>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

        <div class="pillar-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-teal-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Lingkungan</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Pengelolaan limbah operasional, efisiensi energi, dan pemantauan kualitas udara serta air
                di sekitar area terminal untuk meminimalkan dampak lingkungan.
            </p>
        </div>

        <div class="pillar-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-teal-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Keselamatan Kerja</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Penerapan standar Kesehatan dan Keselamatan Kerja (K3) yang ketat bagi seluruh karyawan,
                mitra, dan pengunjung area terminal.
            </p>
        </div>

        <div class="pillar-card bg-slate-50 border border-slate-100 rounded-xl p-6">
            <div class="w-12 h-12 rounded-lg bg-teal-600 flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 0a4 4 0 10-4-4"/></svg>
            </div>
            <h4 class="font-bold text-slate-900 text-lg mb-2">Masyarakat &amp; Komunitas</h4>
            <p class="text-slate-600 text-sm leading-relaxed">
                Program pemberdayaan masyarakat sekitar Pelabuhan Patimban, termasuk pelatihan kerja dan
                dukungan terhadap perekonomian lokal.
            </p>
        </div>

    </div>

</section>

{{-- ═══ COMMITMENT STATEMENT ═══ --}}
<section class="bg-slate-50 py-20">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Our Commitment</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 mb-6 tracking-tight">
            Mendukung Pertumbuhan Industri yang Berkelanjutan
        </h3>
        <p class="text-slate-600 leading-relaxed">
            Sebagai bagian dari ekosistem logistik otomotif nasional, PICT berkomitmen untuk terus
            menyeimbangkan pertumbuhan bisnis dengan tanggung jawab terhadap lingkungan dan masyarakat,
            sejalan dengan pengembangan Pelabuhan Patimban sebagai gerbang otomotif utama Indonesia.
        </p>
    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-blue-900 py-14">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-white text-2xl font-extrabold mb-2 tracking-tight">Ingin Tahu Lebih Lanjut?</h4>
            <p class="text-slate-300 font-medium">Hubungi kami untuk informasi program keberlanjutan PICT.</p>
        </div>
        <a href="{{ url('/contact') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-8 rounded text-sm transition shadow-sm">
            HUBUNGI KAMI
        </a>
    </div>
</section>

@endsection