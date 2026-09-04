<footer class="footer bg-blue-950 text-white mt-16 md:mt-20 border-t-4 border-red-600">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-12 md:py-16">
        <!-- Grid: 1 kolom di mobile, 2 di tablet (sm/md), 4 di desktop (lg) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-10 md:gap-8 lg:gap-12">
            
            <!-- Company Info -->
            <div class="min-w-0 space-y-4 sm:col-span-2 lg:col-span-1">
                <div class="flex items-center gap-3 mb-4 md:mb-6">
                    <img src="{{ asset('assets/images/pict.png') }}" alt="PICT Logo" class="h-10 md:h-12 w-auto shrink-0 object-contain bg-white p-1 rounded">
                    <div class="min-w-0">
                        <h4 class="font-bold text-white tracking-wide text-xs sm:text-sm leading-tight">
                            PATIMBAN INTERNATIONAL
                        </h4>
                        <p class="text-xs text-red-500 tracking-wide font-bold">CAR TERMINAL</p>
                    </div>
                </div>
                <p class="text-blue-200 text-sm leading-relaxed break-words">
                    Indonesia's premier automotive gateway and modern roll-on/roll-off (Ro-Ro) terminal located at Patimban Port, West Java.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="min-w-0">
                <h4 class="text-lg font-bold mb-4 md:mb-6 text-white border-b border-blue-800 pb-2 inline-block">Quick Links</h4>
                <ul class="space-y-3 text-sm text-blue-200">
                    <li><a href="{{ url('/') }}" class="hover:text-red-400 transition flex items-center gap-2"><span class="text-red-500">&rsaquo;</span> About PICT</a></li>
                    <li><a href="{{ url('/facilities') }}" class="hover:text-red-400 transition flex items-center gap-2"><span class="text-red-500">&rsaquo;</span> Terminal Facilities</a></li>
                    <li><a href="{{ url('/services') }}" class="hover:text-red-400 transition flex items-center gap-2"><span class="text-red-500">&rsaquo;</span> Ro-Ro Services</a></li>
                    <li><a href="{{ url('/location') }}" class="hover:text-red-400 transition flex items-center gap-2"><span class="text-red-500">&rsaquo;</span> Strategic Location</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div class="min-w-0">
                <h4 class="text-lg font-bold mb-4 md:mb-6 text-white border-b border-blue-800 pb-2 inline-block">Company</h4>
                <ul class="space-y-3 text-sm text-blue-200">
                    <li><a href="{{ url('/tariffs') }}" class="hover:text-red-400 transition flex items-center gap-2"><span class="text-red-500">&rsaquo;</span> Our Tariffs</a></li>
                    <li><a href="{{ url('/sustainability') }}" class="hover:text-red-400 transition flex items-center gap-2"><span class="text-red-500">&rsaquo;</span> Sustainability</a></li>
                    <li><a href="{{ url('/news') }}" class="hover:text-red-400 transition flex items-center gap-2"><span class="text-red-500">&rsaquo;</span> Latest News</a></li>
                    <li><a href="{{ url('/careers') }}" class="hover:text-red-400 transition flex items-center gap-2"><span class="text-red-500">&rsaquo;</span> Careers</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="min-w-0">
                <h4 class="text-lg font-bold mb-4 md:mb-6 text-white border-b border-blue-800 pb-2 inline-block">Contact Us</h4>
                <ul class="space-y-4 text-sm text-blue-200">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="min-w-0 break-words">Patimban Port, Pusakanagara,<br>Subang, West Java, Indonesia</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:info@pict.co.id" class="hover:text-white transition break-all">info@pict.co.id</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>+62 123 4567 890</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Copyright (Responsive Flex & Text Alignment) -->
    <div class="border-t border-blue-900 bg-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-5 sm:py-6 flex flex-col md:flex-row justify-between items-center gap-3 sm:gap-4 text-xs sm:text-sm text-blue-300 text-center md:text-left">
            <p class="max-w-full break-words">&copy; {{ date('Y') }} PT Patimban International Car Terminal. All Rights Reserved.</p>
            <div class="flex flex-wrap justify-center gap-3 md:gap-4">
                <a href="{{ url('/privacy') }}" class="hover:text-white transition">Privacy Policy</a>
                <span class="hidden md:inline">|</span>
                <a href="{{ url('/terms') }}" class="hover:text-white transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>