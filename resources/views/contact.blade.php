@extends('layouts.app')

@section('title', 'Contact Us — PT Patimban International Car Terminal')

@push('styles')
<style>
    .hero-bg-contact {
        background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset("assets/images/patimban-yard-2.jpeg") }}');
        background-size: cover;
        background-position: center;
    }
</style>
@endpush

@section('content')

{{-- ═══ HERO SECTION ═══ --}}
<div class="hero-bg-contact min-h-[380px] flex flex-col items-start justify-center text-left px-8 md:px-16 py-16 relative border-b border-slate-800 bg-slate-900 pt-[env(safe-area-inset-top)]">

    <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl">
        Get in Touch with PICT
    </h2>
    <p class="text-slate-200 max-w-2xl mt-4 leading-relaxed text-sm">
        Reach out to our commercial and operational teams for inquiries regarding terminal services, berthing schedules, or logistics coordination.
    </p>
</div>

{{-- ═══ CONTACT INFO + FORM (LIGHT MODE) ═══ --}}
<section class="max-w-7xl mx-auto px-6 py-20 bg-white text-slate-800">
    <div class="grid lg:grid-cols-12 gap-14 items-start">

        {{-- Contact Info --}}
        <div class="lg:col-span-5 space-y-6">
            <div>
                <span class="text-red-600 font-bold tracking-widest text-xs uppercase block mb-1">Get in Touch</span>
                <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Contact Information
                </h3>
            </div>

            <div class="space-y-6 pt-4">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200 shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-red-600/10 text-red-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1 text-sm">Address</h5>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            Patimban Port, Pusakanagara, Subang Regency, West Java 41255, Indonesia
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200 shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-blue-600/10 text-blue-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1 text-sm">Phone</h5>
                        <p class="text-slate-600 text-xs leading-relaxed">+62 (0260) xxx-xxxx</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200 shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-emerald-600/10 text-emerald-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1 text-sm">Email</h5>
                        <p class="text-slate-600 text-xs leading-relaxed">info@pict.co.id</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200 shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-purple-600/10 text-purple-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-900 mb-1 text-sm">Office Hours</h5>
                        <p class="text-slate-600 text-xs leading-relaxed">Monday &ndash; Friday, 08:00 &ndash; 17:00 WIB (Terminal Operations: 24/7)</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contact Form --}}
        <div class="lg:col-span-7 bg-slate-50 border border-slate-200 rounded-2xl p-8 shadow-sm">
            <h3 class="text-xl font-extrabold text-slate-900 mb-6">Send Us a Message</h3>

            <form action="{{ url('/contact') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Full Name</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-red-600 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Email Address</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-red-600 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Subject</label>
                    <input type="text" name="subject"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-red-600 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Message</label>
                    <textarea name="message" rows="5" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-red-600 text-sm"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-500 text-white font-bold py-3.5 px-6 rounded-xl text-xs uppercase tracking-wider transition shadow-lg shadow-red-600/20">
                    Send Message 
                </button>
            </form>
        </div>

    </div>
</section>

@endsection