@extends('layouts.app')

@section('title', 'Cargo Handhelds & Terminal Operating System — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-cargo {
        background-image: url('{{ asset("assets/images/patimban-yard-1.jpeg") }}');
        background-size: cover;
        background-position: center;
    }
</style>
@endpush

@section('content')

<section class="relative w-full min-h-[75vh] flex items-center overflow-hidden border-b border-white/10 bg-slate-950">
    <div class="absolute inset-0 hero-cargo z-0"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/85 to-slate-950/40 z-1"></div>
    <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-slate-950 to-transparent z-1"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 w-full">
        <div class="max-w-3xl space-y-6">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-red-600/20 border border-red-500/30 text-xs font-bold uppercase tracking-widest text-red-400">
                <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                TOS Field Mobility &amp; IoT Scanner
            </span>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                Cargo Handhelds <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-rose-400">&amp; Digital Tally System</span>
            </h1>

            <p class="text-slate-300 text-sm sm:text-base leading-relaxed border-l-2 border-red-500 pl-4">
                Standardisasi pemindaian nirkabel (*wireless handheld terminal*) terintegrasi langsung ke Terminal Operating System (TOS) secara *real-time* untuk pelacakan akurat ribuan unit kargo kendaraan di Pelabuhan Patimban.
            </p>

            <div class="pt-2 flex flex-wrap gap-4 text-xs font-mono text-slate-300">
                <div class="px-3 py-2 rounded-lg bg-white/5 border border-white/10">
                    <span class="text-slate-500 block">Protokol</span>
                    <strong class="text-white">Barcode &amp; QR VIN Optical Scanning</strong>
                </div>
                <div class="px-3 py-2 rounded-lg bg-white/5 border border-white/10">
                    <span class="text-slate-500 block">Konektivitas</span>
                    <strong class="text-white">Private Industrial Wi-Fi 6 &amp; 4G LTE</strong>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-slate-950 text-slate-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <div>
                    <span class="text-red-500 font-mono text-xs uppercase tracking-widest font-semibold block mb-1">Precision Operation</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        Pemetaan Slot Parkir Presisi Berbasis Nomor Rangka (VIN)
                    </h2>
                </div>
                
                <p class="text-sm text-slate-400 leading-relaxed">
                    Setiap unit CBU yang turun dari kapal (*stevedoring*) langsung diidentifikasi menggunakan unit *handheld rugged industrial*. Sistem secara otomatis memvalidasi dokumen manifes kepabeanan dan menetapkan koordinat lajur staging yard tanpa campur tangan manual.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 flex gap-4 items-start">
                        <div class="w-8 h-8 rounded-lg bg-red-600/20 text-red-500 font-bold flex items-center justify-center shrink-0">1</div>
                        <div>
                            <h4 class="text-white font-bold text-sm">Validasi Zero-Mismatch</h4>
                            <p class="text-xs text-slate-400 mt-1">Mencegah kekeliruan pengelompokan pelabuhan tujuan (Port of Discharge) untuk pengapalan ekspor.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 flex gap-4 items-start">
                        <div class="w-8 h-8 rounded-lg bg-blue-600/20 text-blue-400 font-bold flex items-center justify-center shrink-0">2</div>
                        <div>
                            <h4 class="text-white font-bold text-sm">Inspeksi Visual Cacat Bodi</h4>
                            <p class="text-xs text-slate-400 mt-1">Fitur foto langsung pada layar handheld untuk mendokumentasikan kondisi fisik kendaraan saat ramp-down.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6 relative">
                <div class="relative rounded-2xl overflow-hidden border border-slate-800 shadow-2xl group">
                    <img src="{{ asset('assets/images/patimban-yard-3.jpeg') }}" alt="Area Penumpukan Mobil Patimban" class="w-full h-80 sm:h-96 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80"></div>
                    <div class="absolute bottom-4 left-4 right-4 p-4 rounded-xl bg-slate-900/80 backdrop-blur-md border border-white/10 text-xs">
                        <div class="flex justify-between items-center text-slate-400 mb-1 font-mono">
                            <span>TERMINAL MONITORING</span>
                            <span class="text-emerald-400 font-bold">● ONLINE</span>
                        </div>
                        <p class="text-white font-semibold">Staging Area Sektor Barat — Penataan Unit CBU Berdasarkan Lot Ekspor</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-20 bg-slate-900 border-y border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl mb-12">
            <span class="text-red-500 text-xs font-bold uppercase tracking-widest block mb-1">Field Device Standards</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Kapasitas Operasional Handheld</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-950 border border-slate-800 rounded-xl p-6">
                <span class="text-red-500 font-mono text-xs font-bold block mb-2">[01] RUGGED INDUSTRIAL</span>
                <h3 class="text-white font-bold text-base mb-2">Daya Tahan Standar Lapangan</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Perangkat bersertifikasi IP67 kedap debu dan air laut serta tahan jatuh hingga 1.8 meter untuk operasi ekstrem 24 jam nonstop di dermaga.
                </p>
            </div>

            <div class="bg-slate-950 border border-slate-800 rounded-xl p-6">
                <span class="text-red-500 font-mono text-xs font-bold block mb-2">[02] INSTANT SYNC</span>
                <h3 class="text-white font-bold text-base mb-2">Sinkronisasi Sub-Detik</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Data pemindaian terkirim instan ke server pusat Terminal Operating System tanpa *latency*, memangkas waktu tunggu gate-out pengangkut truk.
                </p>
            </div>

            <div class="bg-slate-950 border border-slate-800 rounded-xl p-6">
                <span class="text-red-500 font-mono text-xs font-bold block mb-2">[03] INTEGRATED GPS</span>
                <h3 class="text-white font-bold text-base mb-2">Akurasi Posisi Parkir Yard</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Modul GPS RTK akurasi tinggi mencatat titik koordinat baris dan slot tempat kendaraan diparkir di atas lahan penumpukan 25 hektar.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-slate-950 text-slate-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="rounded-2xl overflow-hidden border border-slate-800 mb-12 relative">
            <img src="{{ asset('assets/images/patimban-yard-2.jpeg') }}" alt="Panorama Lapangan Penumpukan Patimban" class="w-full h-72 sm:h-96 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
            <div class="absolute bottom-6 left-6 right-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <div>
                    <span class="px-2.5 py-1 rounded bg-red-600 text-[10px] font-bold uppercase tracking-wider text-white">Infrastruktur Fasilitas</span>
                    <h3 class="text-xl sm:text-2xl font-black text-white mt-2">Kapasitas Staging Yard &amp; Integrasi Handheld</h3>
                </div>
                <div class="text-xs font-mono text-slate-300 bg-slate-900/80 px-4 py-2 rounded-lg backdrop-blur border border-white/10">
                    Luas Area: <strong>±25 Hektar</strong> | Kapasitas: <strong>218.000 CBU/Tahun</strong>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-slate-900 border border-slate-800 rounded-xl">
                <h4 class="text-white font-bold text-sm mb-2">Gate-In Transporter</h4>
                <p class="text-xs text-slate-400 leading-relaxed">Verifikasi nomor pesanan unit dan alokasi rute car carrier masuk menuju slot parkir tanpa tiket kertas.</p>
            </div>
            <div class="p-6 bg-slate-900 border border-slate-800 rounded-xl">
                <h4 class="text-white font-bold text-sm mb-2">Pre-Delivery Inspection (PDI)</h4>
                <p class="text-xs text-slate-400 leading-relaxed">Pemeriksaan kondisi aksesoris, stiker pelindung rapigard, dan status bahan bakar sebelum proses muat kapal.</p>
            </div>
            <div class="p-6 bg-slate-900 border border-slate-800 rounded-xl">
                <h4 class="text-white font-bold text-sm mb-2">Customs Release Sync</h4>
                <p class="text-xs text-slate-400 leading-relaxed">Sinkronisasi status izin ekspor kepabeanan (CEISA &amp; INAPORTNET) langsung di layar handheld operator.</p>
            </div>
        </div>

    </div>
</section>

<section class="bg-slate-900 border-t border-slate-800 py-16 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h3 class="text-xl sm:text-2xl font-black">Butuh Konsultasi Integrasi Sistem TOS &amp; Cargo?</h3>
            <p class="text-xs sm:text-sm text-slate-400 mt-1">Hubungi tim operasional kami untuk skema EDI data exchange dan manifest kargo.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ url('/contact') }}" class="px-6 py-3 rounded-xl bg-red-600 hover:bg-red-500 font-bold text-xs uppercase tracking-wider transition shadow-lg shadow-red-600/20">
                Hubungi Kami &rarr;
            </a>
        </div>
    </div>
</section>

@endsection