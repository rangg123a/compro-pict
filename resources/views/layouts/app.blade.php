<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Memastikan scaling awal benar di perangkat mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'PT Patimban International Car Terminal — PICT')</title>
    <meta name="description" content="PT Patimban International Car Terminal (PICT) — Indonesia's premier automotive gateway and modern roll-on/roll-off (Ro-Ro) terminal at Patimban Port, West Java.">
    
    <!-- ═══ BROWSER LOGO / FAVICON ═══ -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/pict.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/pict.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanilla-cookieconsent@3.0.1/dist/cookieconsent.css">

    <style>
        body { 
            font-family: 'DM Sans', sans-serif; 
            overflow-x: hidden; /* Mencegah horizontal scroll di mobile */
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        nav { backdrop-filter: blur(10px); }
        .nav-link { position: relative; transition: .3s; }
        .nav-link:hover { color: #dc2626; /* Red */ }
        .nav-link.active { color: #dc2626; font-weight: 700; }
        .nav-link.active::after {
            content: ""; position: absolute; bottom: -12px; left: 0;
            width: 100%; height: 2px; background: #dc2626; border-radius: 10px;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 flex flex-col min-h-screen">

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

    <nav class="sticky top-0 z-50 bg-white/95 border-b border-slate-200 shadow-sm w-full">
        <!-- Penyesuaian px-4 untuk layar sangat kecil -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="h-16 md:h-20 flex items-center justify-between gap-4">
                
                <!-- ═══ NAVBAR LOGO ═══ -->
                <a href="{{ url('/') }}" class="flex items-center gap-2 md:gap-3 shrink-0">
                    <!-- Ukuran logo diperkecil di mobile (h-8) -->
                    <img src="{{ asset('assets/images/pict.png') }}" alt="PICT Logo" class="h-8 sm:h-10 md:h-12 w-auto object-contain">
                    
                    <!-- Menampilkan text di layar medium/besar saja -->
                    <div class="hidden md:block">
                        <h1 class="font-bold text-blue-900 tracking-wide text-sm md:text-base leading-tight whitespace-nowrap">
                            PATIMBAN INTERNATIONAL
                        </h1>
                        <p class="text-[10px] md:text-xs text-red-600 tracking-wide font-bold">CAR TERMINAL</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <ul class="hidden lg:flex items-center gap-3 xl:gap-5 font-medium text-[13px] xl:text-sm whitespace-nowrap text-blue-950">
                    @foreach($navLinks as $key=>$link)
                    <li>
                        <a href="{{ $link['url'] }}" data-nav-key="{{ $key }}" class="nav-link">
                            {{ $link['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>

                <!-- Desktop Contact Button -->
                <div class="hidden lg:flex items-center shrink-0">
                    <a href="{{ url('/contact') }}" class="bg-red-600 hover:bg-red-700 transition px-5 py-2.5 rounded-lg font-semibold text-white shadow whitespace-nowrap text-sm xl:text-base">
                        Contact Us
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" aria-label="Toggle Menu" class="lg:hidden p-2 rounded-lg text-blue-900 hover:bg-red-50 ml-auto focus:outline-none focus:ring-2 focus:ring-red-500">
                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Dropdown -->
    <div id="mobileMenu" class="hidden lg:hidden border-t border-slate-200 bg-blue-900 shadow-xl absolute w-full z-40 top-[64px] md:top-[80px]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-5 space-y-2">
            @foreach($navLinks as $link)
                <a href="{{ $link['url'] }}" class="block text-white hover:text-red-400 hover:bg-blue-800 rounded px-3 py-2.5 text-sm md:text-base transition">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <div class="pt-4 mt-2 border-t border-blue-800">
                <a href="{{ url('/contact') }}" class="block bg-red-600 hover:bg-red-700 text-white text-center py-3 rounded-lg font-semibold text-sm transition">
                    Contact Us
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Wrapper -->
    <main class="flex-grow w-full overflow-hidden">
        @yield('content')
    </main>

    <!-- Back to top -->
    <button id="backToTop" aria-label="Back to top" class="back-to-top fixed bottom-4 right-4 md:bottom-6 md:right-6 w-10 h-10 md:w-12 md:h-12 rounded-full bg-red-600 text-white shadow-lg hover:bg-red-700 transition duration-300 hidden z-50 flex items-center justify-center text-lg md:text-xl font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
        &uarr;
    </button>

    <!-- ═══ INCLUDE FOOTER ═══ -->
    @include('layouts.footer')

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-cookieconsent@3.0.1/dist/cookieconsent.umd.js"></script>
    <script src="{{ asset('assets/js/cookie-consent.js') }}"></script>
    <script>
        // Toggle Menu Mobile
        const mobileBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        
        if (mobileBtn && mobileMenu) { 
            mobileBtn.addEventListener('click', (e) => { 
                e.stopPropagation(); // Mencegah event klik menjalar ke document
                mobileMenu.classList.toggle('hidden'); 
            }); 
        }
        
        // Menutup menu mobile saat mengklik di luar area menu
        document.addEventListener('click', (e) => {
            if (mobileMenu && !mobileMenu.classList.contains('hidden') && !mobileBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Menutup menu saat link diklik
        document.querySelectorAll('#mobileMenu a').forEach(item => {
            item.addEventListener('click', () => { 
                mobileMenu.classList.add('hidden'); 
            });
        });
        
        // Back to Top Button Logic
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) { 
                backToTop.classList.remove('hidden'); 
            } else { 
                backToTop.classList.add('hidden'); 
            }
        });

        // Smooth Scroll to Top
        if(backToTop) {
            backToTop.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
        
        // Scrollspy Logic
        const navAnchors = document.querySelectorAll('.nav-link[data-nav-key]');
        const sections = Array.from(navAnchors).map(a => document.getElementById(a.dataset.navKey)).filter(Boolean);
        
        if (sections.length) {
            const setActive = (key) => { 
                navAnchors.forEach(a => { 
                    a.classList.toggle('active', a.dataset.navKey === key); 
                }); 
            };
            const spyObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => { 
                    if (entry.isIntersecting) { setActive(entry.target.id); } 
                });
            }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });
            sections.forEach(section => spyObserver.observe(section));
        }
    </script>
    @stack('scripts')

</body>
</html>