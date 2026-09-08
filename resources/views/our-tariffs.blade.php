@extends('layouts.app')

@section('title', 'Terminal Service Tariffs — PT Patimban International Car Terminal')

@php
    $filePathDomestik = public_path('assets/pdf/contoh.pdf');
    $fileExistsDomestik = file_exists($filePathDomestik);
    $pdfUrlDomestik = $fileExistsDomestik ? asset('assets/pdf/contoh.pdf') : '#';

    $filePathIntl = public_path('assets/pdf/contoh.pdf');
    $fileExistsIntl = file_exists($filePathIntl);
    $pdfUrlIntl = $fileExistsIntl ? asset('assets/pdf/contoh.pdf') : '#';
@endphp

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    .page-transition {
        animation: pageMorphIn 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    @keyframes pageMorphIn {
        from {
            opacity: 0;
            transform: translateY(16px) scale(0.99);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
</style>
@endpush

@section('content')

<div class="page-transition">

    <!-- ═══ NOTIFICATION TOAST ═══ -->
    <div id="pdfNotification" class="fixed bottom-6 right-6 z-50 transform translate-y-32 opacity-0 transition-all duration-300 ease-out pointer-events-none">
        <div class="pointer-events-auto bg-blue-950 border-l-4 border-red-600 text-white pl-4 pr-3 py-3 shadow-lg flex items-start gap-3 max-w-sm">
            <div class="flex-1">
                <p class="text-xs font-bold uppercase tracking-wide text-red-400">Information</p>
                <p id="notificationText" class="text-sm text-slate-200 mt-1 leading-relaxed">
                    Document not available.
                </p>
            </div>
            <button type="button" onclick="hideNotification()" class="text-slate-400 hover:text-white transition-colors cursor-pointer leading-none text-lg">
                &times;
            </button>
        </div>
    </div>

    <!-- HERO SECTION -->
    <div class="relative w-full min-h-[400px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-20 pt-40 border-b border-white/10 bg-slate-950 overflow-hidden">
        <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.85)), url('{{ asset("assets/images/background.jpeg") }}');"></div>
        
        <div class="relative z-10 max-w-7xl mx-w-full w-full" data-aos="fade-down">
            <span class="text-red-500 font-bold tracking-widest text-xs uppercase block mb-2">Terminal Capabilities</span>
            <h1 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
                Terminal Service Tariffs
            </h1>
            <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed text-sm sm:text-base">
                Official fee structure for domestic and international vehicle handling services at Patimban Terminal.
            </p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-14" data-aos="fade-up" data-aos-delay="100">

        {{-- DOMESTIC --}}
        <div class="border border-slate-300 bg-white shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="border-b border-slate-300 bg-slate-50 px-6 py-6 flex flex-wrap justify-between items-center gap-4">
                <div class="flex items-center gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900">Domestic Tariffs</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Inter-island domestic services</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <button type="button" onclick="togglePreview('preview-domestik', this)" class="border border-slate-400 text-slate-700 hover:bg-slate-100 px-4 py-2.5 text-sm font-semibold transition inline-flex items-center gap-2 cursor-pointer">
                        <span class="preview-label">View Document</span>
                        <svg class="w-3.5 h-3.5 transition-transform preview-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                </div>
            </div>

            <div id="preview-domestik" class="hidden border-t border-slate-300 transition-all duration-300">
                <div class="p-6 bg-slate-100 flex flex-col items-center justify-center">
                    <div class="w-full max-w-2xl bg-white border border-slate-300 p-8 rounded-2xl shadow-sm text-center">
                        @if($fileExistsDomestik)
                            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-900 mb-1">Domestic_Tariff_2026.pdf</h3>
                            <p class="text-xs text-slate-500 mb-6">Official document detailing domestic port handling fees.</p>
                            <div class="flex justify-center gap-3">
                                <a href="{{ $pdfUrlDomestik }}" target="_blank" class="bg-red-600 hover:bg-red-500 text-white px-5 py-2.5 rounded-xl text-xs font-bold transition inline-flex items-center gap-2">
                                    <span>Preview in New Tab</span>
                                </a>
                                <a href="{{ $pdfUrlDomestik }}" download class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-xl text-xs font-bold transition inline-flex items-center gap-2">
                                    <span>Download PDF</span>
                                </a>
                            </div>
                        @else
                            <p class="text-slate-400 text-sm">Document preview is not available yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- INTERNATIONAL --}}
        <div class="border border-slate-300 border-t-0 bg-white shadow-sm transition-all duration-300 hover:shadow-md mt-6">
            <div class="border-b border-slate-300 bg-slate-50 px-6 py-6 flex flex-wrap justify-between items-center gap-4">
                <div class="flex items-center gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900">International Tariffs</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Cross-border export-import services</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <button type="button" onclick="togglePreview('preview-internasional', this)" class="border border-slate-400 text-slate-700 hover:bg-slate-100 px-4 py-2.5 text-sm font-semibold transition inline-flex items-center gap-2 cursor-pointer">
                        <span class="preview-label">View Document</span>
                        <svg class="w-3.5 h-3.5 transition-transform preview-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    @if($fileExistsIntl)
                       
                    @else
                        <button type="button" onclick="showNotification('The International Tariff PDF document is not yet available on the server.')" class="bg-blue-950 hover:bg-blue-900 text-white px-4 py-2.5 text-sm font-semibold transition cursor-pointer">
                            Download PDF
                        </button>
                    @endif
                </div>
            </div>

            <div id="preview-internasional" class="hidden border-t border-slate-300 transition-all duration-300">
                <div class="p-6 bg-slate-100 flex flex-col items-center justify-center">
                    <div class="w-full max-w-2xl bg-white border border-slate-300 p-8 rounded-2xl shadow-sm text-center">
                        @if($fileExistsIntl)
                            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-900 mb-1">International_Tariff_2026.pdf</h3>
                            <p class="text-xs text-slate-500 mb-6">Official document detailing international port handling fees.</p>
                            <div class="flex justify-center gap-3">
                                <a href="{{ $pdfUrlIntl }}" target="_blank" class="bg-red-600 text-white px-5 py-2.5 rounded-xl text-xs font-bold transition inline-flex items-center gap-2">
                                    <span>Preview in New Tab</span>
                                </a>
                                <a href="{{ $pdfUrlIntl }}" download class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-xl text-xs font-bold transition inline-flex items-center gap-2">
                                    <span>Download PDF</span>
                                </a>
                            </div>
                        @else
                            <p class="text-slate-400 text-sm">Document preview is not available yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <p class="text-xs text-slate-400 mt-6 pt-4 border-t border-slate-200">
            Tariffs are subject to change at any time in accordance with company policy. Contact info@pict.co.id to confirm the latest rates.
        </p>

    </div>

</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof AOS !== 'undefined') {
            AOS.init({ duration: 800, once: true });
        }
    });

    let notificationTimeout;

    function showNotification(message) {
        const toast = document.getElementById('pdfNotification');
        document.getElementById('notificationText').textContent = message;
        toast.classList.remove('translate-y-32', 'opacity-0');
        clearTimeout(notificationTimeout);
        notificationTimeout = setTimeout(hideNotification, 4000);
    }

    function hideNotification() {
        document.getElementById('pdfNotification').classList.add('translate-y-32', 'opacity-0');
    }

    function togglePreview(previewId, btn) {
        const preview = document.getElementById(previewId);
        const icon = btn.querySelector('.preview-icon');
        const label = btn.querySelector('.preview-label');
        const isHidden = preview.classList.contains('hidden');

        if (isHidden) {
            preview.classList.remove('hidden');
            icon.classList.add('rotate-180');
            label.textContent = 'Close Document';
        } else {
            preview.classList.add('hidden');
            icon.classList.remove('rotate-180');
            label.textContent = 'View Document';
        }
    }
</script>
@endpush

@endsection