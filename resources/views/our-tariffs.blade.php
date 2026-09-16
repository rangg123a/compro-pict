@extends('layouts.app')

@section('title', 'Terminal Service Tariffs — PT Patimban International Car Terminal')

@php
    $filePathDomestik = public_path('assets/pdf/Domestic_Tariff_2026.pdf');
    $fileExistsDomestik = file_exists($filePathDomestik);
    $pdfUrlDomestik = $fileExistsDomestik ? asset('assets/pdf/Domestic_Tariff_2026.pdf') : '#';

    $filePathIntl = public_path('assets/pdf/International_Tariff_2026.pdf');
    $fileExistsIntl = file_exists($filePathIntl);
    $pdfUrlIntl = $fileExistsIntl ? asset('assets/pdf/International_Tariff_2026.pdf') : '#';

    $filePathOthers = public_path('assets/pdf/Others_Tariff_2026.pdf');
    $fileExistsOthers = file_exists($filePathOthers);
    $pdfUrlOthers = $fileExistsOthers ? asset('assets/pdf/Others_Tariff_2026.pdf') : '#';
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

    /* ═══ PDF DOCUMENT VIEWER ═══ */
    body.pdf-modal-open {
        overflow: hidden;
    }
    #pdf-page-wrap {
        line-height: 0;
    }
    #pdf-draw-canvas {
        touch-action: none;
    }
    #pdf-draw-canvas.tool-pan {
        pointer-events: none;
    }
    #pdf-draw-canvas.tool-pen {
        cursor: crosshair;
    }
    #pdf-draw-canvas.tool-eraser {
        cursor: cell;
    }
    .pdf-tool-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 0.375rem;
        color: rgba(255,255,255,0.7);
        transition: all 0.15s ease;
        flex-shrink: 0;
    }
    .pdf-tool-btn:hover {
        background: rgba(255,255,255,0.08);
        color: #ffffff;
    }
    .pdf-tool-btn.active {
        background: #DC2626;
        color: #ffffff;
    }
    .pdf-tool-btn:disabled {
        opacity: 0.3;
        pointer-events: none;
    }
</style>
@endpush

@section('content')

<div class="page-transition bg-slate-50 min-h-screen">

    <!-- ═══ NOTIFICATION TOAST ═══ -->
    <div id="pdfNotification" class="fixed bottom-6 right-6 z-50 transform translate-y-32 opacity-0 transition-all duration-300 ease-out pointer-events-none">
        <div class="pointer-events-auto bg-slate-900 rounded-xl border border-slate-700 shadow-2xl flex items-start gap-4 max-w-sm overflow-hidden">
            <div class="bg-red-600 w-1.5 self-stretch"></div>
            <div class="flex-1 py-4 pr-2">
                <p class="text-[11px] font-bold uppercase tracking-wider text-red-500 mb-1">System Notice</p>
                <p id="notificationText" class="text-sm text-slate-200 leading-relaxed">
                    Document not available.
                </p>
            </div>
            <button type="button" onclick="hideNotification()" class="p-4 text-slate-400 hover:text-white transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <!-- HERO SECTION (Diperbaiki padding atasnya agar tidak mepet navbar) -->
    <div class="relative w-full min-h-[420px] flex flex-col items-start justify-center text-left px-6 sm:px-12 md:px-16 lg:px-24 py-16 pt-28 sm:pt-32 md:pt-36 border-b border-slate-800 bg-slate-900 overflow-hidden">
        <!-- Overlay Gradient for better readability -->
        <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('{{ asset("assets/images/background.jpeg") }}');"></div>
        <div class="absolute inset-0 z-0 bg-gradient-to-r from-slate-950 via-slate-900/90 to-slate-900/40"></div>

        <div class="relative z-10 max-w-5xl w-full mx-auto" data-aos="fade-down">
            <h1 class="text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight max-w-3xl">
                Terminal Service Tariffs
            </h1>
            <p class="text-slate-300 max-w-xl mt-4 sm:mt-6 leading-relaxed text-sm sm:text-base md:text-lg font-light">
                Official fee structure for domestic, international, and other vehicle handling services at Patimban Terminal.
            </p>
        </div>
    </div>

    <!-- CONTENT SECTION -->
    <div class="max-w-5xl mx-auto px-6 py-16 -mt-8 relative z-20" data-aos="fade-up" data-aos-delay="100">

        <div class="grid gap-6">
            {{-- DOMESTIC --}}
            <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-200 transition-all duration-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:-translate-y-1 overflow-hidden relative group">
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-slate-200 group-hover:bg-red-600 transition-colors duration-300"></div>
                <div class="p-6 sm:p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 ml-2">
                    <div class="flex items-start gap-5">
                        <div class="hidden sm:flex items-center justify-center w-12 h-12 rounded-full bg-slate-50 border border-slate-100 text-slate-400 group-hover:text-red-600 group-hover:bg-red-50 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <div>
                            <div class="inline-flex items-center gap-2 mb-1 sm:hidden">
                                <span class="bg-slate-100 text-slate-600 px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider">Domestic</span>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 group-hover:text-red-600 transition-colors">Domestic Tariffs</h2>
                            <p class="text-sm text-slate-500 mt-1.5">Standardized rates for inter-island domestic vehicle handling services.</p>
                        </div>
                    </div>

                    <div class="flex flex-col xs:flex-row gap-3 w-full sm:w-auto shrink-0 pt-4 sm:pt-0 border-t sm:border-0 border-slate-100">
                        @if($fileExistsDomestik)
                            <button type="button" onclick="openPdfViewer('{{ $pdfUrlDomestik }}', 'Domestic Tariff 2026')" class="w-full sm:w-auto bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl px-5 py-3 text-sm font-semibold transition-all shadow-sm flex items-center justify-center gap-2 group/btn">
                                <svg class="w-4 h-4 text-slate-400 group-hover/btn:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                View Document
                            </button>
                            <button type="button" onclick="window.location.href='{{ route('tarif.download.domestik') }}'" class="w-full sm:w-auto bg-slate-900 hover:bg-slate-800 text-white rounded-xl px-5 py-3 text-sm font-semibold transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Download PDF
                            </button>
                        @else
                            <button type="button" onclick="showNotification('The Domestic Tariff PDF document is not yet available on the server.')" class="w-full sm:w-auto bg-slate-100 text-slate-400 rounded-xl px-5 py-3 text-sm font-semibold cursor-not-allowed flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                Unavailable
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            {{-- INTERNATIONAL --}}
            <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-200 transition-all duration-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:-translate-y-1 overflow-hidden relative group">
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-slate-200 group-hover:bg-red-600 transition-colors duration-300"></div>
                <div class="p-6 sm:p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 ml-2">
                    <div class="flex items-start gap-5">
                        <div class="hidden sm:flex items-center justify-center w-12 h-12 rounded-full bg-slate-50 border border-slate-100 text-slate-400 group-hover:text-red-600 group-hover:bg-red-50 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <div class="inline-flex items-center gap-2 mb-1 sm:hidden">
                                <span class="bg-slate-100 text-slate-600 px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider">International</span>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 group-hover:text-red-600 transition-colors">International Tariffs</h2>
                            <p class="text-sm text-slate-500 mt-1.5">Official fee structure for cross-border export and import services.</p>
                        </div>
                    </div>

                    <div class="flex flex-col xs:flex-row gap-3 w-full sm:w-auto shrink-0 pt-4 sm:pt-0 border-t sm:border-0 border-slate-100">
                        @if($fileExistsIntl)
                            <button type="button" onclick="openPdfViewer('{{ $pdfUrlIntl }}', 'International Tariff 2026')" class="w-full sm:w-auto bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl px-5 py-3 text-sm font-semibold transition-all shadow-sm flex items-center justify-center gap-2 group/btn">
                                <svg class="w-4 h-4 text-slate-400 group-hover/btn:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                View Document
                            </button>
                            <button type="button" onclick="window.location.href='{{ route('tarif.download.internasional') }}'" class="w-full sm:w-auto bg-slate-900 hover:bg-slate-800 text-white rounded-xl px-5 py-3 text-sm font-semibold transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Download PDF
                            </button>
                        @else
                            <button type="button" onclick="showNotification('The International Tariff PDF document is not yet available on the server.')" class="w-full sm:w-auto bg-slate-100 text-slate-400 rounded-xl px-5 py-3 text-sm font-semibold cursor-not-allowed flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                Unavailable
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            {{-- OTHERS --}}
            <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-200 transition-all duration-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:-translate-y-1 overflow-hidden relative group">
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-slate-200 group-hover:bg-red-600 transition-colors duration-300"></div>
                <div class="p-6 sm:p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 ml-2">
                    <div class="flex items-start gap-5">
                        <div class="hidden sm:flex items-center justify-center w-12 h-12 rounded-full bg-slate-50 border border-slate-100 text-slate-400 group-hover:text-red-600 group-hover:bg-red-50 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <div class="inline-flex items-center gap-2 mb-1 sm:hidden">
                                <span class="bg-slate-100 text-slate-600 px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider">Others</span>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 group-hover:text-red-600 transition-colors">Others Tariffs</h2>
                            <p class="text-sm text-slate-500 mt-1.5">Official fee structure for other miscellaneous services.</p>
                        </div>
                    </div>

                    <div class="flex flex-col xs:flex-row gap-3 w-full sm:w-auto shrink-0 pt-4 sm:pt-0 border-t sm:border-0 border-slate-100">
                        @if($fileExistsOthers)
                            <button type="button" onclick="openPdfViewer('{{ $pdfUrlOthers }}', 'Others Tariff 2026')" class="w-full sm:w-auto bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl px-5 py-3 text-sm font-semibold transition-all shadow-sm flex items-center justify-center gap-2 group/btn">
                                <svg class="w-4 h-4 text-slate-400 group-hover/btn:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                View Document
                            </button>
                            <button type="button" onclick="window.location.href='{{ route('tarif.download.others') }}'" class="w-full sm:w-auto bg-slate-900 hover:bg-slate-800 text-white rounded-xl px-5 py-3 text-sm font-semibold transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Download PDF
                            </button>
                        @else
                            <button type="button" onclick="showNotification('The Others Tariff PDF document is not yet available on the server.')" class="w-full sm:w-auto bg-slate-100 text-slate-400 rounded-xl px-5 py-3 text-sm font-semibold cursor-not-allowed flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                Unavailable
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-sm text-slate-500 max-w-2xl mx-auto bg-white px-6 py-4 rounded-xl border border-slate-200/60 shadow-sm">
                <span class="font-semibold text-slate-700">Disclaimer:</span> Tariffs are subject to change at any time in accordance with company policy. For further inquiries, please contact <a href="mailto:info@pict.co.id" class="text-red-600 hover:underline font-medium">info@pict.co.id</a> to confirm the latest rates.
            </p>
        </div>

    </div>

</div>

<!-- {{-- ═══ IN-PAGE PDF VIEWER MODAL ═══ --> 
<div id="pdf-viewer-modal" class="fixed inset-0 z-[200] hidden">
    <div id="pdf-modal-backdrop" class="absolute inset-0 bg-slate-900/90 backdrop-blur-sm transition-opacity"></div>

    <div class="relative z-10 w-full h-full flex flex-col">
        <!-- Toolbar -->
        <div class="flex items-center justify-between gap-3 px-4 sm:px-6 py-3 bg-slate-900 shadow-lg flex-wrap">
            <div class="flex items-center gap-3 min-w-0">
                <svg class="w-4 h-4 text-white/40 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 3H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V8l-6-5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 3v5h5"/>
                </svg>
                <div class="flex flex-col">
                    <span id="pdf-modal-title" class="font-bold text-sm text-white truncate max-w-[40vw]">Document</span>
                    <span id="pdf-page-info" class="text-[10px] text-white/50 whitespace-nowrap uppercase tracking-wider hidden sm:block">Page 1 / 1</span>
                </div>
            </div>

            <div class="flex items-center gap-1 flex-wrap justify-end">
                <!-- Page navigation -->
                <button id="pdf-prev-page" class="pdf-tool-btn" title="Previous page">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button id="pdf-next-page" class="pdf-tool-btn" title="Next page">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>

                <span class="w-px h-6 bg-white/15 mx-1.5"></span>

                <!-- Zoom -->
                <button id="pdf-zoom-out" class="pdf-tool-btn" title="Zoom out">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M8 11h6"/></svg>
                </button>
                <span id="pdf-zoom-level" class="text-xs text-white/70 w-11 text-center select-none">100%</span>
                <button id="pdf-zoom-in" class="pdf-tool-btn" title="Zoom in">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 8v6M8 11h6"/></svg>
                </button>
                <button id="pdf-zoom-reset" class="pdf-tool-btn text-[10px] font-bold" title="Reset zoom">1:1</button>

                <span class="w-px h-6 bg-white/15 mx-1.5"></span>

                <!-- Drawing tools -->
                <button id="pdf-tool-pan" class="pdf-tool-btn active" title="Pan / scroll">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 11V6a2 2 0 114 0v5m0-3V4a2 2 0 114 0v7m0-2a2 2 0 114 0v6a8 8 0 01-8 8h-1a8 8 0 01-6.29-3.05l-2.3-3.5a1.5 1.5 0 012.4-1.8L7 15.5V6a2 2 0 114 0v5"/></svg>
                </button>
                <button id="pdf-tool-pen" class="pdf-tool-btn" title="Draw / mark up">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"/><path stroke-linecap="round" stroke-linejoin="round" d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                </button>
                <input type="color" id="pdf-pen-color" value="#DC2626" title="Pen color" class="w-7 h-7 border border-white/20 bg-transparent cursor-pointer p-0.5 mx-1">
                <button id="pdf-tool-eraser" class="pdf-tool-btn" title="Eraser">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 20H8l-6-6a2 2 0 010-2.8L13.6 2 22 10.4 13.6 18.8"/></svg>
                </button>
                <button id="pdf-undo" class="pdf-tool-btn" title="Undo last stroke">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 14l-4-4 4-4M5 10h9a5 5 0 010 10h-1"/></svg>
                </button>
                <button id="pdf-clear" class="pdf-tool-btn text-[10px] font-bold" title="Clear markup on this page">CLR</button>

                <span class="w-px h-6 bg-white/15 mx-1.5"></span>

                <a id="pdf-download" href="#" download class="pdf-tool-btn" title="Download PDF">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"/></svg>
                </a>
                <button id="pdf-modal-close" class="pdf-tool-btn hover:bg-white/10" title="Close">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Canvas area -->
        <div id="pdf-canvas-container" class="flex-1 overflow-auto bg-[#1a1c23] flex items-start justify-center p-6 sm:p-10 scroll-smooth">
            <div id="pdf-page-wrap" class="relative bg-white shadow-[0_0_40px_rgba(0,0,0,0.5)] transition-transform duration-200">
                <canvas id="pdf-render-canvas"></canvas>
                <canvas id="pdf-draw-canvas" class="absolute inset-0 tool-pan"></canvas>
            </div>
            
            <div id="pdf-loading-msg" class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col items-center gap-4">
                <div class="w-10 h-10 border-4 border-slate-700 border-t-red-600 rounded-full animate-spin"></div>
                <p class="text-white/70 text-sm font-medium tracking-wide">Rendering Document...</p>
            </div>

            <div id="pdf-error-msg" class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col items-center gap-3 text-center">
                <div class="w-12 h-12 rounded-full bg-red-600/20 text-red-500 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-white text-sm font-medium">Could not load this document.</p>
                <p class="text-slate-400 text-xs">Please try again later or download the file directly.</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof AOS !== 'undefined') {
            AOS.init({ duration: 800, once: true });
        }

        // ═══ NOTIFICATION TOAST ═══
        window.showNotification = function (message) {
            const toast = document.getElementById('pdfNotification');
            document.getElementById('notificationText').textContent = message;
            toast.classList.remove('translate-y-32', 'opacity-0');
            clearTimeout(window._notificationTimeout);
            window._notificationTimeout = setTimeout(hideNotification, 4000);
        };
        window.hideNotification = function () {
            document.getElementById('pdfNotification').classList.add('translate-y-32', 'opacity-0');
        };

        // ═══════════════════════════════════════════════════════════
        // IN-PAGE PDF VIEWER — zoom + freehand markup
        // ═══════════════════════════════════════════════════════════
        if (window['pdfjsLib']) {
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
        }

        const modal = document.getElementById('pdf-viewer-modal');
        const backdrop = document.getElementById('pdf-modal-backdrop');
        const titleEl = document.getElementById('pdf-modal-title');
        const pageInfoEl = document.getElementById('pdf-page-info');
        const container = document.getElementById('pdf-canvas-container');
        const pageWrap = document.getElementById('pdf-page-wrap');
        const renderCanvas = document.getElementById('pdf-render-canvas');
        const drawCanvas = document.getElementById('pdf-draw-canvas');
        const zoomLevelEl = document.getElementById('pdf-zoom-level');
        const loadingMsg = document.getElementById('pdf-loading-msg');
        const errorMsg = document.getElementById('pdf-error-msg');
        const downloadLink = document.getElementById('pdf-download');

        const prevBtn = document.getElementById('pdf-prev-page');
        const nextBtn = document.getElementById('pdf-next-page');
        const zoomInBtn = document.getElementById('pdf-zoom-in');
        const zoomOutBtn = document.getElementById('pdf-zoom-out');
        const zoomResetBtn = document.getElementById('pdf-zoom-reset');
        const panBtn = document.getElementById('pdf-tool-pan');
        const penBtn = document.getElementById('pdf-tool-pen');
        const eraserBtn = document.getElementById('pdf-tool-eraser');
        const penColorInput = document.getElementById('pdf-pen-color');
        const undoBtn = document.getElementById('pdf-undo');
        const clearBtn = document.getElementById('pdf-clear');
        const closeBtn = document.getElementById('pdf-modal-close');

        const BASE_SCALE = 1.25;
        const MIN_SCALE = 0.5;
        const MAX_SCALE = 3.5;

        let pdfDoc = null;
        let currentPage = 1;
        let currentScale = BASE_SCALE;
        let currentTool = 'pan'; // pan | pen | eraser
        let strokesByPage = {};  // { pageNum: [{color, width, erase, points:[{x,y}]}] }
        let activeStroke = null;
        let isPointerDown = false;
        let renderToken = 0;

        function setTool(tool) {
            currentTool = tool;
            [panBtn, penBtn, eraserBtn].forEach(b => b.classList.remove('active'));
            drawCanvas.classList.remove('tool-pan', 'tool-pen', 'tool-eraser');
            if (tool === 'pan') { panBtn.classList.add('active'); drawCanvas.classList.add('tool-pan'); }
            if (tool === 'pen') { penBtn.classList.add('active'); drawCanvas.classList.add('tool-pen'); }
            if (tool === 'eraser') { eraserBtn.classList.add('active'); drawCanvas.classList.add('tool-eraser'); }
        }

        function clampScale(s) {
            return Math.min(MAX_SCALE, Math.max(MIN_SCALE, s));
        }

        function updateZoomLabel() {
            zoomLevelEl.textContent = Math.round((currentScale / BASE_SCALE) * 100) + '%';
        }

        function updateNavButtons() {
            if (!pdfDoc) return;
            prevBtn.disabled = currentPage <= 1;
            nextBtn.disabled = currentPage >= pdfDoc.numPages;
            pageInfoEl.textContent = 'PAGE ' + currentPage + ' / ' + pdfDoc.numPages;
        }

        function normalizedPointFromEvent(e) {
            const rect = drawCanvas.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width;
            const y = (e.clientY - rect.top) / rect.height;
            return { x: Math.min(1, Math.max(0, x)), y: Math.min(1, Math.max(0, y)) };
        }

        function redrawAnnotations() {
            const ctx = drawCanvas.getContext('2d');
            ctx.clearRect(0, 0, drawCanvas.width, drawCanvas.height);
            const strokes = strokesByPage[currentPage] || [];
            strokes.forEach(s => drawStroke(ctx, s));
        }

        function drawStroke(ctx, stroke) {
            if (!stroke.points || stroke.points.length < 1) return;
            ctx.save();
            ctx.globalCompositeOperation = stroke.erase ? 'destination-out' : 'source-over';
            ctx.strokeStyle = stroke.color;
            ctx.lineWidth = stroke.width;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';
            ctx.beginPath();
            stroke.points.forEach((p, i) => {
                const x = p.x * drawCanvas.width;
                const y = p.y * drawCanvas.height;
                if (i === 0) ctx.moveTo(x, y); else ctx.lineTo(x, y);
            });
            ctx.stroke();
            ctx.restore();
        }

        function renderPage(num) {
            if (!pdfDoc) return;
            const myToken = ++renderToken;
            pageWrap.style.opacity = '0.5'; 
            pdfDoc.getPage(num).then(page => {
                if (myToken !== renderToken) return;
                const viewport = page.getViewport({ scale: currentScale });
                renderCanvas.width = viewport.width;
                renderCanvas.height = viewport.height;
                drawCanvas.width = viewport.width;
                drawCanvas.height = viewport.height;
                pageWrap.style.width = viewport.width + 'px';
                pageWrap.style.height = viewport.height + 'px';

                const ctx = renderCanvas.getContext('2d');
                page.render({ canvasContext: ctx, viewport: viewport }).promise.then(() => {
                    if (myToken !== renderToken) return;
                    pageWrap.style.opacity = '1';
                    loadingMsg.classList.add('hidden');
                    redrawAnnotations();
                    updateZoomLabel();
                    updateNavButtons();
                });
            }).catch(() => {
                loadingMsg.classList.add('hidden');
                errorMsg.classList.remove('hidden');
            });
        }

        window.openPdfViewer = function (url, title) {
            if (!url || url === '#') {
                showNotification('This document is not yet available on the server.');
                return;
            }
            if (!window['pdfjsLib']) {
                window.open(url, '_blank');
                return;
            }
            currentPage = 1;
            currentScale = BASE_SCALE;
            strokesByPage = {};
            titleEl.textContent = title || 'Document';
            downloadLink.href = url;
            errorMsg.classList.add('hidden');
            loadingMsg.classList.remove('hidden');
            pageWrap.style.opacity = '0';

            modal.classList.remove('hidden');
            document.body.classList.add('pdf-modal-open');
            setTool('pan');

            pdfjsLib.getDocument(url).promise.then(doc => {
                pdfDoc = doc;
                renderPage(currentPage);
            }).catch(() => {
                loadingMsg.classList.add('hidden');
                errorMsg.classList.remove('hidden');
            });
        };

        function closePdfViewer() {
            modal.classList.add('hidden');
            document.body.classList.remove('pdf-modal-open');
            pdfDoc = null;
            renderToken++;
        }

        closeBtn.addEventListener('click', closePdfViewer);
        backdrop.addEventListener('click', closePdfViewer);
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) closePdfViewer();
        });

        prevBtn.addEventListener('click', () => {
            if (currentPage > 1) { currentPage--; renderPage(currentPage); }
        });
        nextBtn.addEventListener('click', () => {
            if (pdfDoc && currentPage < pdfDoc.numPages) { currentPage++; renderPage(currentPage); }
        });

        zoomInBtn.addEventListener('click', () => {
            currentScale = clampScale(currentScale + 0.25);
            renderPage(currentPage);
        });
        zoomOutBtn.addEventListener('click', () => {
            currentScale = clampScale(currentScale - 0.25);
            renderPage(currentPage);
        });
        zoomResetBtn.addEventListener('click', () => {
            currentScale = BASE_SCALE;
            renderPage(currentPage);
        });

        container.addEventListener('wheel', e => {
            if (!e.ctrlKey) return;
            e.preventDefault();
            currentScale = clampScale(currentScale + (e.deltaY < 0 ? 0.15 : -0.15));
            renderPage(currentPage);
        }, { passive: false });

        panBtn.addEventListener('click', () => setTool('pan'));
        penBtn.addEventListener('click', () => setTool('pen'));
        eraserBtn.addEventListener('click', () => setTool('eraser'));

        undoBtn.addEventListener('click', () => {
            const strokes = strokesByPage[currentPage] || [];
            strokes.pop();
            redrawAnnotations();
        });
        clearBtn.addEventListener('click', () => {
            strokesByPage[currentPage] = [];
            redrawAnnotations();
        });

        drawCanvas.addEventListener('pointerdown', e => {
            if (currentTool === 'pan') return;
            isPointerDown = true;
            drawCanvas.setPointerCapture(e.pointerId);
            const pt = normalizedPointFromEvent(e);
            activeStroke = {
                color: currentTool === 'eraser' ? '#000000' : penColorInput.value,
                width: currentTool === 'eraser' ? 22 : 3,
                erase: currentTool === 'eraser',
                points: [pt]
            };
        });

        drawCanvas.addEventListener('pointermove', e => {
            if (!isPointerDown || !activeStroke) return;
            const pt = normalizedPointFromEvent(e);
            activeStroke.points.push(pt);
            const ctx = drawCanvas.getContext('2d');
            redrawAnnotations();
            drawStroke(ctx, activeStroke);
        });

        function finishStroke() {
            if (activeStroke && activeStroke.points.length > 1) {
                strokesByPage[currentPage] = strokesByPage[currentPage] || [];
                strokesByPage[currentPage].push(activeStroke);
            }
            activeStroke = null;
            isPointerDown = false;
            redrawAnnotations();
        }

        drawCanvas.addEventListener('pointerup', finishStroke);
        drawCanvas.addEventListener('pointerleave', () => { if (isPointerDown) finishStroke(); });
    });
</script>
@endpush