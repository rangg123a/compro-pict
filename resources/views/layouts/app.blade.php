<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT Patimban International Car Terminal — PICT')</title>
    <meta name="description" content="PT Patimban International Car Terminal (PICT) — gerbang otomotif utama Indonesia dan terminal roll-on/roll-off (Ro-Ro) di Pelabuhan Patimban, Jawa Barat.">
    
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon-180.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanilla-cookieconsent@3.0.1/dist/cookieconsent.css">

    <style>
        body { font-family: 'DM Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        nav { backdrop-filter: blur(10px); }
        .nav-link { position: relative; transition: .3s; }
        .nav-link:hover { color: #dc2626; /* Merah */ }
        .nav-link.active { color: #dc2626; font-weight: 700; }
        .nav-link.active::after {
            content: ""; position: absolute; bottom: -12px; left: 0;
            width: 100%; height: 2px; background: #dc2626; border-radius: 10px;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50">

    @php
        $navLinks = [
            'about' => ['label'=>'About PICT','url'=>'/'],
            'facilities'=>['label'=>'Terminal Facilities','url'=>'/facilities'],
            'location'=>['label'=>'Strategic Location','url'=>'/location'],
            'services'=>['label'=>'Ro-Ro Services','url'=>'/services'],
            'tariffs'=>['label'=>'Our Tariffs','url'=>'/tariffs'],
            'sustainability'=>['label'=>'Sustainability','url'=>'/sustainability'],
            'news'=>['label'=>'News','url'=>'/news'],
        ];
    @endphp

    <nav class="sticky top-0 z-50 bg-white/95 border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6">
            <div class="h-20 flex items-center justify-between gap-4">
                <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0">
                    <div class="w-12 h-12 rounded-xl bg-red-600 flex items-center justify-center shadow shrink-0">
                        <span class="text-white text-xl font-bold">P</span>
                    </div>
                    <div class="hidden 2xl:block">
                        <h1 class="font-bold text-blue-900 tracking-wide text-base leading-tight whitespace-nowrap">
                            PATIMBAN INTERNATIONAL
                        </h1>
                        <p class="text-xs text-red-600 tracking-wide font-bold">CAR TERMINAL</p>
                    </div>
                </a>

                <ul class="hidden lg:flex items-center gap-3 xl:gap-5 font-medium text-[13px] xl:text-sm whitespace-nowrap text-blue-950">
                    @foreach($navLinks as $key=>$link)
                    <li>
                        <a href="{{ $link['url'] }}" data-nav-key="{{ $key }}" class="nav-link">
                            {{ $link['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>

                <div class="hidden lg:flex items-center shrink-0">
                    <a href="{{ url('/contact') }}" class="bg-red-600 hover:bg-red-700 transition px-5 py-2.5 rounded-lg font-semibold text-white shadow whitespace-nowrap text-sm xl:text-base">
                        Contact Us
                    </a>
                </div>

                <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg text-blue-900 hover:bg-red-50 ml-auto">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div id="mobileMenu" class="hidden lg:hidden border-t border-slate-200 bg-blue-900 shadow">
        <div class="max-w-7xl mx-auto px-6 py-5 space-y-3">
            @foreach($navLinks as $link)
                <a href="{{ $link['url'] }}" class="block text-white hover:text-red-400 py-2">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="{{ url('/contact') }}" class="block bg-red-600 hover:bg-red-700 text-white text-center py-3 rounded-lg font-semibold mt-3">
                Contact Us
            </a>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <button id="backToTop" class="back-to-top fixed bottom-6 right-6 w-12 h-12 rounded-full bg-red-600 text-white shadow-lg hover:bg-red-700 transition duration-300 hidden z-50 flex items-center justify-center text-xl font-bold" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">
        ↑
    </button>

    <footer class="footer bg-blue-950 text-white mt-20 border-t-4 border-red-600">
        <div id="footerInner" class="container mx-auto px-6 py-10">
            <!-- Footer Content Here -->
        </div>
    </footer>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-cookieconsent@3.0.1/dist/cookieconsent.umd.js"></script>
    <script src="{{ asset('assets/js/cookie-consent.js') }}"></script>
    <script>
        const mobileBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileBtn) { mobileBtn.addEventListener('click', () => { mobileMenu.classList.toggle('hidden'); }); }
        
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) { backToTop.classList.remove('hidden'); } 
            else { backToTop.classList.add('hidden'); }
        });
        
        document.querySelectorAll('#mobileMenu a').forEach(item => {
            item.addEventListener('click', () => { mobileMenu.classList.add('hidden'); });
        });
        
        const navAnchors = document.querySelectorAll('.nav-link[data-nav-key]');
        const sections = Array.from(navAnchors).map(a => document.getElementById(a.dataset.navKey)).filter(Boolean);
        if (sections.length) {
            const setActive = (key) => { navAnchors.forEach(a => { a.classList.toggle('active', a.dataset.navKey === key); }); };
            const spyObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => { if (entry.isIntersecting) { setActive(entry.target.id); } });
            }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });
            sections.forEach(section => spyObserver.observe(section));
        }
    </script>
    @stack('scripts')
</body>
</html>