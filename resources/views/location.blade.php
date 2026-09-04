@extends('layouts.app')

@section('title', 'Strategic Location — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-location {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('{{ asset('assets/images/pict-roro-bg.jpg') }}');
        background-size: cover;
        background-position: center;
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-location min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative">

    <span class="text-yellow-400 font-bold tracking-widest text-sm uppercase mb-3">Strategic Location</span>

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Gerbang Logistik Otomotif di Pantai Utara Jawa Barat
    </h2>

    <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed">
        Pelabuhan Patimban dirancang sebagai simpul logistik utama yang menghubungkan kawasan industri
        otomotif terbesar di Indonesia dengan jalur distribusi domestik dan ekspor.
    </p>

</div>

{{-- ═══ MAP + ADDRESS ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-14 items-start">

        <div>
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Our Address</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 mb-6 leading-snug tracking-tight">
                Pelabuhan Patimban
            </h3>
            <p class="text-slate-600 leading-relaxed mb-6">
                Terminal PICT berlokasi di kawasan Pelabuhan Patimban, Kecamatan Pusakanagara, Kabupaten
                Subang, Provinsi Jawa Barat &mdash; berdekatan langsung dengan kawasan industri otomotif
                Karawang dan Bekasi.
            </p>

            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-teal-600 mt-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Jl. Raya Patimban, Pusakanagara, Kabupaten Subang, Jawa Barat 41255, Indonesia
                    </p>
                </div>
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-teal-600 mt-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7l9-4 9 4M4 10v9a1 1 0 001 1h4v-6h6v6h4a1 1 0 001-1v-9"/></svg>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        &plusmn;120 km di sebelah timur pusat Kota Jakarta, terhubung melalui akses tol dan jalan nasional Pantura.
                    </p>
                </div>
            </div>
        </div>

        {{-- Google Maps Embed --}}
        <div class="rounded-xl overflow-hidden shadow border border-slate-100 h-80 md:h-full min-h-[320px]">
            <iframe
                src="https://www.google.com/maps?q=Pelabuhan+Patimban,+Subang,+Jawa+Barat&output=embed"
                class="w-full h-full"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </div>
</section>

{{-- ═══ DISTANCE STATS ═══ --}}
<section class="bg-slate-50 py-20">
    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Accessibility</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Jarak Tempuh ke Kawasan Industri</h3>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
                <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">&plusmn;120 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-sm font-medium">Jakarta</p>
            </div>
            <div class="bg-white border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
                <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">&plusmn;40 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-sm font-medium">Kawasan Industri Karawang</p>
            </div>
            <div class="bg-white border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
                <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">&plusmn;80 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-sm font-medium">Kawasan Industri Bekasi</p>
            </div>
            <div class="bg-white border border-slate-100 rounded-xl p-6 text-center hover:shadow-md transition">
                <p class="text-3xl font-extrabold text-blue-900 mb-1 tracking-tight">&plusmn;15 <span class="text-base font-medium text-slate-500">km</span></p>
                <p class="text-slate-600 text-sm font-medium">Pusat Kota Subang</p>
            </div>
        </div>

    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-blue-900 py-14">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-white text-2xl font-extrabold mb-2 tracking-tight">Butuh Petunjuk Akses ke Terminal?</h4>
            <p class="text-slate-300 font-medium">Tim kami siap membantu perencanaan pengiriman dan akses kendaraan Anda.</p>
        </div>
        <a href="{{ url('/contact') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-8 rounded text-sm transition shadow-sm">
            HUBUNGI KAMI
        </a>
    </div>
</section>

@endsection