@extends('layouts.app')

@section('title', 'Our Services — PT Patimban International Car Terminal')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    .hero-bg-services {
        background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ secure_asset("assets/images/patimban-yard-3.jpeg") }}');
        background-size: cover;
        background-position: center;
    }
    .service-card { 
        transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease; 
    }
    .service-card:hover { 
        transform: translateY(-4px); 
        border-color: #dc2626;
        box-shadow: 0 12px 28px -6px rgba(15, 23, 42, 0.12); 
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ -->
<div class="hero-bg-services min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative border-b border-white/10 bg-slate-950 pt-[env(safe-area-inset-top)]" data-aos="fade-down">
    <span class="text-red-500 font-bold tracking-widest text-xs uppercase block mb-2">Terminal Capabilities</span>
    <h1 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Our Services
    </h1>
    <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed text-sm sm:text-base">
        Solusi penanganan kargo dan layanan kepelabuhanan terpadu yang dirancang untuk efisiensi, keamanan, dan kelancaran distribusi logistik otomotif global.
    </p>
</div>

{{-- ═══ 1. MAIN SERVICES SECTION (Cargodoring, Stevedoring, Wharfage, Equipment Rental) ═══ --}}
<section class="max-w-7xl mx-auto px-6 py-20 bg-white text-slate-800" data-aos="fade-up">
    <div class="text-center mb-14">
        <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Core Offerings</span>
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Main Services</h2>
        <p class="text-slate-500 max-w-2xl mx-auto mt-3 text-sm">
            Layanan inti penanganan kapal, bongkar muat kargo, penyediaan dermaga, serta dukungan alat berat berstandar internasional.
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Cargodoring -->
        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100">
            <div>
                <div class="w-12 h-12 rounded-lg bg-red-600/10 text-red-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Cargodoring</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Pengaturan, pemindahan, dan penataan kargo dari apron dermaga menuju lapangan penumpukan (staging yard) secara sistematis menggunakan TOS digital.
                </p>
            </div>
        </div>

        <!-- Stevedoring -->
        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200">
            <div>
                <div class="w-12 h-12 rounded-lg bg-blue-600/10 text-blue-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4M4 17h12m0 0l-4 4m4-4l-4-4"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Stevedoring</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Kegiatan bongkar muat kendaraan dari dan ke kapal car carrier melalui ramp door kapal yang dikelola oleh pengemudi bersertifikasi profesional.
                </p>
            </div>
        </div>

        <!-- Wharfage -->
        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="300">
            <div>
                <div class="w-12 h-12 rounded-lg bg-emerald-600/10 text-emerald-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Wharfage</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Penyediaan fasilitas dermaga Ro-Ro sepanjang 300 meter dengan kedalaman kolam mumpuni untuk menjamin kelancaran sandar kapal ekapanjang.
                </p>
            </div>

        </div>

        <!-- Equipment Rental -->
        <div class="service-card bg-slate-50 border border-slate-200 rounded-xl p-6 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="400">
            <div>
                <div class="w-12 h-12 rounded-lg bg-amber-600/10 text-amber-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Equipment Rental</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Penyewaan alat-alat pendukung terminal dan logistik penunjang operasional bongkar muat kendaraan serta kargo khusus.
                </p>
            </div>
        </div>

    </div>
</section>

{{-- ═══ 2. SERVICES EXPORT & IMPORT SECTION ═══ --}}
<section class="bg-slate-100 py-20 border-t border-slate-200 text-slate-800" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">
            <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Global Trade Support</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Services: Export & Import</h2>
            <p class="text-slate-500 max-w-2xl mx-auto mt-3 text-sm">
                Integrasi penuh dengan alur kepabeanan internasional untuk mempercepat arus logistik kendaraan luar dan dalam negeri.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            
            <!-- Export Handling -->
            <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm flex flex-col justify-between" data-aos="fade-right">
                <div>
                    <div class="w-14 h-14 rounded-xl bg-sky-600/10 text-sky-600 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">Export Handling</h3>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                        Layanan pengiriman kendaraan buatan Indonesia menuju berbagai hub internasional. Mencakup penerimaan unit dari pabrikan, pemeriksaan kualitas fisik akhir (PDI), penumpukan sementara di staging yard, hingga proses muat ke kapal ekspor secara terjadwal.
                    </p>
                </div>
                <div class="flex items-center gap-2 text-xs font-bold text-sky-700 bg-sky-50 px-4 py-2.5 rounded-xl w-fit">
                    <span>⚡ Seamless Outbound Logistics</span>
                </div>
            </div>

            <!-- Import Handling -->
            <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm flex flex-col justify-between" data-aos="fade-left">
                <div>
                    <div class="w-14 h-14 rounded-xl bg-purple-600/10 text-purple-600 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">Import Handling</h3>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                        Pengelolaan bongkar muat kargo impor dari kapal internasional dengan sinkronisasi data kepabeanan (EDI). Memastikan proses pengeluaran unit dari terminal menuju jaringan distribusi domestik berjalan cepat, aman, dan transparan.
                    </p>
                </div>
                <div class="flex items-center gap-2 text-xs font-bold text-purple-700 bg-purple-50 px-4 py-2.5 rounded-xl w-fit">
                    <span>🔒 Secure Customs Synchronization</span>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ═══ CTA STRIP ═══ --}}
<section class="bg-red-600 py-14 relative overflow-hidden text-white" data-aos="fade-up">
    <div class="absolute inset-0 bg-red-700 transform skew-x-12 translate-x-1/3 z-0 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Ready to Utilize Our Services?</h4>
            <p class="text-red-100 text-sm sm:text-base mt-1">Cek struktur tarif layanan terminal kami atau hubungi tim komersial untuk konsultasi logistik.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ url('/our-tariffs') }}" class="px-6 py-3 rounded-xl bg-blue-950 hover:bg-blue-900 text-white font-bold text-xs uppercase tracking-wider transition shadow-xl whitespace-nowrap">
                View Tariffs
            </a>
            <a href="{{ url('/contact') }}" class="px-6 py-3 rounded-xl bg-white text-red-600 hover:bg-slate-100 font-bold text-xs uppercase tracking-wider transition shadow-xl whitespace-nowrap">
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
});
</script>
@endpush