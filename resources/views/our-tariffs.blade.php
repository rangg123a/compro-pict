@extends('layouts.app')

@section('title', 'Tarif Layanan Terminal — PT Patimban International Car Terminal')

@section('content')

@php
    // Cek keberadaan fisik file di folder public/assets/pdf/contoh.pdf
    $filePath = public_path('assets/pdf/contoh.pdf');
    $fileExists = file_exists($filePath);
    
    // Tentukan URL tujuan
    $pdfUrl = $fileExists ? secure_asset('assets/pdf/contoh.pdf') : '#';
@endphp

<!-- ═══ PREMIUM NOTIFICATION TOAST ═══ -->
<div id="pdfNotification" class="fixed bottom-6 right-6 z-50 transform translate-y-32 opacity-0 transition-all duration-400 ease-out pointer-events-none">
    <div class="pointer-events-auto bg-slate-900/95 backdrop-blur-xl border border-slate-800 text-white p-4 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.4)] flex items-start gap-4 max-w-sm relative overflow-hidden">
        
        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-gradient-to-b from-amber-400 to-rose-500"></div>

        <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center shrink-0 border border-amber-500/20">
            <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>

        <div class="flex-1 pr-2">
            <h5 class="font-bold text-sm text-slate-100 flex items-center gap-1.5">
                <span>Perhatian</span>
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-amber-400"></span>
            </h5>
            <p id="notificationText" class="text-xs text-slate-400 mt-1 leading-relaxed">
                Dokumen PDF untuk kategori ini sedang dalam pembaruan.
            </p>
        </div>

        <button type="button" onclick="hideNotification()" class="text-slate-500 hover:text-slate-200 transition-colors p-1 rounded-lg hover:bg-slate-800 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-slate-800">
            <div id="toastProgress" class="h-full bg-amber-500 w-full transition-all linear duration-[4500ms]"></div>
        </div>
    </div>
</div>

<!-- HEADER -->
<div class="relative bg-slate-950 py-20 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-2">
            Dokumen Resmi
        </span>

        <h1 class="text-4xl font-extrabold text-white">
            Tarif Pelayanan Terminal (PICT)
        </h1>

        <p class="mt-4 text-slate-400 max-w-3xl mx-auto">
            Transparansi struktur biaya layanan terminal kendaraan domestik maupun internasional.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-16 space-y-14">

    {{-- DOMESTIK --}}
    <div class="bg-white rounded-2xl shadow border overflow-hidden">
        <div class="p-6 flex justify-between items-center bg-slate-50">
            <div>
                <span class="bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-xs font-bold">
                    DOMESTIC
                </span>
                <h2 class="text-2xl font-bold mt-3">
                    Tarif Domestik
                </h2>
            </div>

            @if($fileExists)
                <a href="{{ $pdfUrl }}" download class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold transition shadow-sm inline-block">
                    Download PDF
                </a>
            @else
                <button type="button" onclick="showNotification('Dokumen PDF Tarif Domestik belum tersedia di server.')" class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold transition cursor-pointer shadow-sm">
                    Download PDF
                </button>
            @endif
        </div>

        <div class="p-5 bg-slate-100">
            <div class="w-full h-[700px] rounded-lg bg-white border relative overflow-hidden">
                @if($fileExists)
                    <iframe src="{{ $pdfUrl }}#view=FitH" width="100%" height="100%" class="w-full h-full border-0"></iframe>
                @else
                    <div class="flex flex-col items-center justify-center h-full text-slate-400 text-sm">
                        <p>Pratinjau PDF belum tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- INTERNASIONAL --}}
    <div class="bg-white rounded-2xl shadow border overflow-hidden">
        <div class="p-6 flex justify-between items-center bg-slate-50">
            <div>
                <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-bold">
                    INTERNATIONAL
                </span>
                <h2 class="text-2xl font-bold mt-3">
                    Tarif Internasional
                </h2>
            </div>

            @if($fileExists)
                <a href="{{ $pdfUrl }}" download class="bg-amber-600 hover:bg-amber-700 text-white px-5 py-3 rounded-xl font-semibold transition shadow-sm inline-block">
                    Download PDF
                </a>
            @else
                <button type="button" onclick="showNotification('Dokumen PDF Tarif Internasional belum tersedia di server.')" class="bg-amber-600 hover:bg-amber-700 text-white px-5 py-3 rounded-xl font-semibold transition cursor-pointer shadow-sm">
                    Download PDF
                </button>
            @endif
        </div>

        <div class="p-5 bg-slate-100">
            <div class="w-full h-[700px] rounded-lg bg-white border relative overflow-hidden">
                @if($fileExists)
                    <iframe src="{{ $pdfUrl }}#view=FitH" width="100%" height="100%" class="w-full h-full border-0"></iframe>
                @else
                    <div class="flex flex-col items-center justify-center h-full text-slate-400 text-sm">
                        <p>Pratinjau PDF belum tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    let notificationTimeout;

    function showNotification(message) {
        const toast = document.getElementById('pdfNotification');
        const textEl = document.getElementById('notificationText');
        const progressBar = document.getElementById('toastProgress');
        
        textEl.textContent = message;
        
        progressBar.style.transition = 'none';
        progressBar.style.width = '100%';
        
        toast.classList.remove('translate-y-32', 'opacity-0');
        
        setTimeout(() => {
            progressBar.style.transition = 'width 4500ms linear';
            progressBar.style.width = '0%';
        }, 50);
        
        clearTimeout(notificationTimeout);
        notificationTimeout = setTimeout(() => {
            hideNotification();
        }, 4500);
    }

    function hideNotification() {
        const toast = document.getElementById('pdfNotification');
        toast.classList.add('translate-y-32', 'opacity-0');
    }
</script>
@endpush

@endsection