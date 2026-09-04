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
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-about min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative">

    <span class="text-yellow-400 font-bold tracking-widest text-sm uppercase mb-3">About PICT</span>

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Terminal Kendaraan Modern di Jantung Industri Otomotif Indonesia
    </h2>

</div>

{{-- ═══ ABOUT / COMPANY PROFILE ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-14 items-start">
        <div>
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Company Profile</span>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 mb-6 leading-snug tracking-tight">
                Siapa Kami
            </h3>
            <p class="text-slate-600 leading-relaxed mb-4">
                PT Patimban International Car Terminal (PICT) adalah perusahaan operator terminal kendaraan yang berlokasi
                di Pelabuhan Patimban, Pusakanagara, Kabupaten Subang, Jawa Barat &mdash; sekitar 120 kilometer di sebelah
                timur pusat Kota Jakarta. Perusahaan ini didirikan pada November 2021 oleh Toyota Tsusho Group dan mulai
                beroperasi secara resmi pada Desember 2021.
            </p>
            <p class="text-slate-600 leading-relaxed mb-4">
                Pembangunan Pelabuhan Patimban sendiri merupakan Proyek Strategis Nasional yang telah dilaksanakan secara
                bertahap sejak tahun 2018 atas inisiatif Pemerintah Indonesia, dengan dukungan pendanaan melalui skema
                Official Development Assistance (ODA). Setelah sebelumnya dikelola sementara oleh PT Pelabuhan Indonesia
                (Pelindo), pengelolaan terminal kendaraan resmi diserahkan kepada PICT sebagai badan usaha yang sepenuhnya
                dimodali oleh konsorsium perusahaan Jepang.
            </p>
            <p class="text-slate-600 leading-relaxed">
                Saat ini, komposisi pemegang saham PICT terdiri dari Toyota Tsusho Corporation Group (34%), Toyofuji
                Shipping Co., Ltd. (26%), Nippon Yusen Kabushiki Kaisha &mdash; NYK Line (25%), dan Kamigumi Co., Ltd. (15%),
                menjadikan PICT sebagai kolaborasi para pemain utama industri logistik otomotif dan pelayaran dari Jepang.
            </p>
        </div>

        <div class="space-y-4">
            <div class="stat-card bg-slate-50 border border-slate-100 rounded-xl p-6 flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Kapasitas Penanganan Saat Ini</p>
                    <p class="text-2xl font-extrabold text-blue-900 tracking-tight">400.000 <span class="text-base font-medium text-slate-500">unit/tahun</span></p>
                </div>
                <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4M4 17h12m0 0l-4 4m4-4l-4-4"/></svg>
            </div>
            <div class="stat-card bg-slate-50 border border-slate-100 rounded-xl p-6 flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Target Ekspansi Kapasitas</p>
                    <p class="text-2xl font-extrabold text-blue-900 tracking-tight">600.000 <span class="text-base font-medium text-slate-500">unit/tahun</span></p>
                </div>
                <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <div class="stat-card bg-slate-50 border border-slate-100 rounded-xl p-6 flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Panjang Dermaga Terminal Kendaraan</p>
                    <p class="text-2xl font-extrabold text-blue-900 tracking-tight">300 <span class="text-base font-medium text-slate-500">meter</span></p>
                </div>
                <svg class="w-10 h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12h18M3 12l4-4m-4 4l4 4M21 12l-4-4m4 4l-4 4"/></svg>
            </div>
            <div class="stat-card bg-slate-50 border border-slate-100 rounded-xl p-6 flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Jarak dari Pusat Kota Jakarta</p>
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
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Sejarah Perkembangan PICT</h3>
        </div>

        <div class="relative border-l-2 border-teal-600/30 ml-4 md:ml-0 md:pl-0 space-y-12">
            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow"></span>
                <p class="text-yellow-600 font-bold text-sm mb-1">2018</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Awal Pembangunan Pelabuhan Patimban</h4>
                <p class="text-slate-600 leading-relaxed">
                    Pembangunan Pelabuhan Patimban dimulai secara bertahap sebagai Proyek Strategis Nasional atas
                    inisiatif Pemerintah Indonesia, didukung pendanaan melalui perjanjian pinjaman Official Development
                    Assistance (ODA).
                </p>
            </div>

            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow"></span>
                <p class="text-yellow-600 font-bold text-sm mb-1">November 2021</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Pendirian PT Patimban International Car Terminal</h4>
                <p class="text-slate-600 leading-relaxed">
                    PICT resmi didirikan oleh Toyota Tsusho Group sebagai badan usaha yang akan mengelola terminal
                    kendaraan di Pelabuhan Patimban.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow"></span>
                <p class="text-yellow-600 font-bold text-sm mb-1">Desember 2021</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Mulai Beroperasi</h4>
                <p class="text-slate-600 leading-relaxed">
                    PICT resmi memulai operasional terminal kendaraan, menggantikan pengelolaan sementara yang
                    sebelumnya dijalankan oleh PT Pelabuhan Indonesia (Pelindo).
                </p>
            </div>

            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow"></span>
                <p class="text-yellow-600 font-bold text-sm mb-1">30 Juni 2023</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Penguatan Konsorsium Pemegang Saham</h4>
                <p class="text-slate-600 leading-relaxed">
                    Toyota Tsusho mengalihkan sebagian sahamnya kepada Toyofuji Shipping, NYK Line, dan Kamigumi Co.,
                    memperkuat struktur operasional PICT dengan pengalaman perusahaan-perusahaan pengelola terminal
                    otomotif terkemuka dari Jepang dan mancanegara.
                </p>
            </div>

            <div class="relative pl-10 md:pl-14">
                <span class="absolute -left-[9px] top-1 w-4 h-4 bg-teal-600 rounded-full border-4 border-white shadow"></span>
                <p class="text-yellow-600 font-bold text-sm mb-1">Saat Ini &amp; Masa Depan</p>
                <h4 class="font-bold text-slate-900 text-lg mb-2">Ekspansi Kapasitas Menuju 600.000 Unit/Tahun</h4>
                <p class="text-slate-600 leading-relaxed">
                    Dengan kapasitas penanganan saat ini sebesar 400.000 unit kendaraan per tahun, PICT terus melakukan
                    perluasan fasilitas untuk meningkatkan kapasitas hingga 600.000 unit per tahun, sejalan dengan
                    pengembangan menyeluruh Pelabuhan Patimban sebagai gerbang logistik otomotif utama Indonesia.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ═══ SHAREHOLDERS ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="text-center mb-12">
        <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Our Shareholders</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Konsorsium Pemegang Saham</h3>
        <p class="text-slate-600 max-w-2xl mx-auto mt-4">
            PICT didukung oleh konsorsium perusahaan logistik dan pelayaran otomotif terkemuka asal Jepang.
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
            <h4 class="text-white text-2xl font-extrabold mb-2 tracking-tight">Ingin Tahu Lokasi Strategis Kami?</h4>
            <p class="text-slate-300 font-medium">Pelabuhan Patimban, Pusakanagara, Subang, Jawa Barat, Indonesia</p>
        </div>
        <a href="{{ url('/location') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-8 rounded text-sm transition shadow-sm">
            LIHAT PETA LOKASI
        </a>
    </div>
</section>

@endsection