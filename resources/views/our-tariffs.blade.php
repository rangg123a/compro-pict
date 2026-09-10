@extends('layouts.app')

@section('title', 'Terminal Service Tariffs — PT Patimban International Car Terminal')

@php
    $filePathDomestik = public_path('assets/pdf/Domestic_Tariff_2026.pdf');
    $fileExistsDomestik = file_exists($filePathDomestik);
    $pdfUrlDomestik = $fileExistsDomestik ? asset('assets/pdf/Domestic_Tariff_2026.pdf') : '#';

    $filePathIntl = public_path('assets/pdf/International_Tariff_2026.pdf');
    $fileExistsIntl = file_exists($filePathIntl);
    $pdfUrlIntl = $fileExistsIntl ? asset('assets/pdf/International_Tariff_2026.pdf') : '#';
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
                    <button type="button" onclick="togglePreview('preview-domestik', 'embed-domestik', '{{ $pdfUrlDomestik }}', this)" class="border border-slate-400 text-slate-700 hover:bg-slate-100 px-4 py-2.5 text-sm font-semibold transition inline-flex items-center gap-2 cursor-pointer">
                        <span class="preview-label">View Document</span>
                        <svg class="w-3.5 h-3.5 transition-transform preview-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    @if($fileExistsDomestik)
                        <button type="button" onclick="window.location.href='{{ route('tarif.download.domestik') }}'" class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-semibold transition inline-flex items-center gap-2 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            Download PDF
                        </button>
                    @endif
                </div>
            </div>

            <div id="preview-domestik" class="hidden border-t border-slate-300 transition-all duration-300">
                <div class="p-4 sm:p-6 bg-slate-100 flex flex-col items-center justify-center">
                    <div class="w-full max-w-4xl bg-white border border-slate-300 p-4 rounded-2xl shadow-sm text-center">
                        @if($fileExistsDomestik)
                            <div class="flex items-center justify-between px-4 py-2 mb-3 bg-slate-50 border border-slate-200 rounded-xl text-left">
                                <div>
                                    <h3 class="text-xs sm:text-sm font-bold text-slate-900">Domestic_Tariff_2026.pdf</h3>
                                    <p class="text-[10px] text-slate-500">Official document detailing domestic port handling fees.</p>
                                </div>
            
                            </div>
                            <div class="w-full h-[600px] border border-slate-200 rounded-xl overflow-hidden bg-white">
                                <iframe id="embed-domestik" src="" width="100%" height="100%" class="w-full h-full border-0"></iframe>
                            </div>
                        @else
                            <p class="text-slate-400 text-sm py-8">Document preview is not available yet.</p>
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
                    <button type="button" onclick="togglePreview('preview-internasional', 'embed-internasional', '{{ $pdfUrlIntl }}', this)" class="border border-slate-400 text-slate-700 hover:bg-slate-100 px-4 py-2.5 text-sm font-semibold transition inline-flex items-center gap-2 cursor-pointer">
                        <span class="preview-label">View Document</span>
                        <svg class="w-3.5 h-3.5 transition-transform preview-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    @if($fileExistsIntl)
                        <button type="button" onclick="window.location.href='{{ route('tarif.download.internasional') }}'" class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-semibold transition inline-flex items-center gap-2 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            Download PDF
                        </button>
                    @else
                        <button type="button" onclick="showNotification('The International Tariff PDF document is not yet available on the server.')" class="bg-blue-950 hover:bg-blue-900 text-white px-4 py-2.5 text-sm font-semibold transition cursor-pointer">
                            Download PDF
                        </button>
                    @endif
                </div>
            </div>

            <div id="preview-internasional" class="hidden border-t border-slate-300 transition-all duration-300">
                <div class="p-4 sm:p-6 bg-slate-100 flex flex-col items-center justify-center">
                    <div class="w-full max-w-4xl bg-white border border-slate-300 p-4 rounded-2xl shadow-sm text-center">
                        @if($fileExistsIntl)
                            <div class="flex items-center justify-between px-4 py-2 mb-3 bg-slate-50 border border-slate-200 rounded-xl text-left">
                                <div>
                                    <h3 class="text-xs sm:text-sm font-bold text-slate-900">International_Tariff_2026.pdf</h3>
                                    <p class="text-[10px] text-slate-500">Official document detailing international port handling fees.</p>
                                </div>
                            </div>
                            <div class="w-full h-[600px] border border-slate-200 rounded-xl overflow-hidden bg-white">
                                <iframe id="embed-internasional" src="" width="100%" height="100%" class="w-full h-full border-0"></iframe>
                            </div>
                        @else
                            <p class="text-slate-400 text-sm py-8">Document preview is not available yet.</p>
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

    function togglePreview(previewId, embedId, pdfUrl, btn) {
        const preview = document.getElementById(previewId);
        const embed = document.getElementById(embedId);
        const icon = btn.querySelector('.preview-icon');
        const label = btn.querySelector('.preview-label');
        const isHidden = preview.classList.contains('hidden');

        if (isHidden) {
            preview.classList.remove('hidden');
            icon.classList.add('rotate-180');
            label.textContent = 'Close Document';

            if (embed && !embed.src) {
                embed.src = pdfUrl + '#view=FitH';
            }
        } else {
            preview.classList.add('hidden');
            icon.classList.remove('rotate-180');
            label.textContent = 'View Document';
        }
    }
</script>
@endpush