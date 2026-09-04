@extends('layouts.app')

@section('title', 'Contact Us — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-contact {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('{{ asset('assets/images/pict-roro-bg.jpg') }}');
        background-size: cover;
        background-position: center;
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-contact min-h-[320px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative">

    <span class="text-yellow-400 font-bold tracking-widest text-sm uppercase mb-3">Contact Us</span>

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Hubungi Kami
    </h2>

</div>

{{-- ═══ CONTACT INFO + FORM ═══ --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-14">

        {{-- Contact Info --}}
        <div>
            <span class="text-teal-600 font-bold tracking-widest text-sm uppercase">Get in Touch</span>
            <h3 class="text-3xl font-extrabold text-slate-900 mt-3 mb-6 leading-snug tracking-tight">
                Informasi Kontak
            </h3>

            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-teal-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1">Alamat</h5>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Pelabuhan Patimban, Pusakanagara, Kabupaten Subang, Jawa Barat 41255, Indonesia
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-teal-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1">Telepon</h5>
                        <p class="text-slate-600 text-sm leading-relaxed">+62 xxx-xxxx-xxxx</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-teal-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1">Email</h5>
                        <p class="text-slate-600 text-sm leading-relaxed">info@pict.co.id</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-teal-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1">Jam Operasional</h5>
                        <p class="text-slate-600 text-sm leading-relaxed">Senin &ndash; Jumat, 08.00 &ndash; 17.00 WIB (Operasional Terminal 24 Jam)</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contact Form --}}
        <div class="bg-slate-50 border border-slate-100 rounded-xl p-8">
            <h3 class="text-xl font-bold text-slate-900 mb-6">Kirim Pesan</h3>

            <form action="{{ url('/contact') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-600">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-600">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Subjek</label>
                    <input type="text" name="subject"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-600">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Pesan</label>
                    <textarea name="message" rows="5" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-600"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 rounded-lg transition shadow-sm">
                    KIRIM PESAN
                </button>
            </form>
        </div>

    </div>
</section>

@endsection