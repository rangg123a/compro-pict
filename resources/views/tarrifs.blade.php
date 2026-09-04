@extends('layouts.app')

@section('title', 'Our Tariffs — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-tariffs {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('{{ asset('assets/images/pict-roro-bg.jpg') }}');
        background-size: cover;
        background-position: center;
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-tariffs min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative">

    <span class="text-yellow-400 font-bold tracking-widest text-sm uppercase mb-3">Our Tariffs</span>

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Struktur Tarif Layanan Terminal
    </h2>

    <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed">
        Tarif layanan PICT disusun secara transparan dan kompetitif mengikuti ketentuan yang berlaku.
        Untuk penawaran khusus volume besar, silakan hubungi tim komersial kami.
    </p>

</div>

{{-- ═══ TARIFF TABLE ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">

    <div class="text-center mb-12">
        <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Pricing</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Daftar Tarif Layanan</h3>
    </div>

    <div class="overflow-x-auto rounded-xl border border-slate-100 shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-blue-900 text-white">
                    <th class="px-6 py-4 font-semibold text-sm">Jenis Layanan</th>
                    <th class="px-6 py-4 font-semibold text-sm">Satuan</th>
                    <th class="px-6 py-4 font-semibold text-sm">Tarif (IDR)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-slate-700 font-medium">Stevedoring (Bongkar Muat)</td>
                    <td class="px-6 py-4 text-slate-600 text-sm">per unit kendaraan</td>
                    <td class="px-6 py-4 text-slate-900 font-semibold">Hubungi Kami</td>
                </tr>
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-slate-700 font-medium">Cargodoring &amp; Storage</td>
                    <td class="px-6 py-4 text-slate-600 text-sm">per unit / hari</td>
                    <td class="px-6 py-4 text-slate-900 font-semibold">Hubungi Kami</td>
                </tr>
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-slate-700 font-medium">Pre-Delivery Inspection (PDI)</td>
                    <td class="px-6 py-4 text-slate-600 text-sm">per unit kendaraan</td>
                    <td class="px-6 py-4 text-slate-900 font-semibold">Hubungi Kami</td>
                </tr>
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-slate-700 font-medium">Weighbridge</td>
                    <td class="px-6 py-4 text-slate-600 text-sm">per unit kendaraan</td>
                    <td class="px-6 py-4 text-slate-900 font-semibold">Hubungi Kami</td>
                </tr>
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-slate-700 font-medium">Domestic Distribution</td>
                    <td class="px-6 py-4 text-slate-600 text-sm">per rute pengiriman</td>
                    <td class="px-6 py-4 text-slate-900 font-semibold">Hubungi Kami</td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="text-slate-500 text-sm mt-6 leading-relaxed">
        *Tarif dapat berubah sewaktu-waktu mengikuti kebijakan perusahaan dan ketentuan pemerintah yang
        berlaku. Silakan hubungi tim komersial kami untuk mendapatkan penawaran resmi dan detail biaya
        sesuai kebutuhan layanan Anda.
    </p>

</section>

{{-- ═══ NOTE / TERMS ═══ --}}
<section class="bg-slate-50 py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h4 class="text-2xl font-extrabold text-slate-900 mb-4 tracking-tight">Butuh Penawaran Khusus?</h4>
        <p class="text-slate-600 leading-relaxed mb-8">
            Untuk kebutuhan volume besar, kontrak jangka panjang, atau layanan tambahan di luar daftar
            di atas, tim komersial kami siap membantu menyusun penawaran yang sesuai dengan kebutuhan
            bisnis Anda.
        </p>
        <a href="{{ url('/contact') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-8 rounded text-sm transition shadow-sm">
            HUBUNGI TIM KOMERSIAL
        </a>
    </div>
</section>

@endsection