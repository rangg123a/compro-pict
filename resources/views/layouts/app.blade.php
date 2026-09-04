<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'PT Patimban International Car Terminal — PICT')</title>

    <meta name="description"
        content="PT Patimban International Car Terminal (PICT) — gerbang otomotif utama Indonesia dan terminal roll-on/roll-off (Ro-Ro) di Pelabuhan Patimban, Jawa Barat.">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/images/favicon-32.png') }}">

    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/images/favicon-180.png') }}">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Cookie --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/vanilla-cookieconsent@3.0.1/dist/cookieconsent.css">

    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        nav {
            backdrop-filter: blur(10px);
        }

        .nav-link {
            position: relative;
            transition: .3s;
        }

        .nav-link:hover {
            color: #0f766e;
        }

        .nav-link.active {
            color: #0f766e;
        }

        .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #0f766e;
            border-radius: 10px;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-white">


    </div>

    {{-- ===================== NAVBAR ===================== --}}

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

    <nav class="sticky top-0 z-50 bg-white border-b border-slate-200 shadow-sm">

        <div class="max-w-7xl mx-auto px-6">

            <div class="h-20 flex items-center justify-between gap-4">

                {{-- Logo --}}
                <a href="{{ url('/') }}"
                    class="flex items-center gap-3 shrink-0">

                    <div
                        class="w-12 h-12 rounded-xl bg-blue-900 flex items-center justify-center shadow shrink-0">

                        <span class="text-white text-xl font-bold">
                            P
                        </span>

                    </div>

                    <div class="hidden 2xl:block">

                        <h1 class="font-bold text-blue-900 tracking-wide text-base leading-tight whitespace-nowrap">
                            PATIMBAN INTERNATIONAL
                        </h1>

                        <p class="text-xs text-slate-600 tracking-wide">
                            CAR TERMINAL
                        </p>

                    </div>

                </a>

                {{-- Desktop Menu --}}
                <ul class="hidden lg:flex items-center gap-3 xl:gap-5 font-medium text-[13px] xl:text-sm whitespace-nowrap">

                    @foreach($navLinks as $key=>$link)

                    <li>

                        <a href="{{ $link['url'] }}"
                            data-nav-key="{{ $key }}"
                            class="nav-link">

                            {{ $link['label'] }}

                        </a>

                    </li>

                    @endforeach

                </ul>

                {{-- Contact --}}
                <div class="hidden lg:flex items-center shrink-0">

                    <a href="{{ url('/contact') }}"
                        class="bg-yellow-500 hover:bg-yellow-400 transition px-4 xl:px-5 py-2 xl:py-2.5 rounded-lg font-semibold text-slate-900 shadow whitespace-nowrap text-sm xl:text-base">

                        Contact Us

                    </a>

                </div>

                {{-- Mobile / Tablet --}}
                <button id="mobileMenuBtn"
                    class="lg:hidden p-2 rounded-lg hover:bg-gray-100 ml-auto">

                    <svg class="w-7 h-7"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                </button>

            </div>

        </div>

    </nav>

    {{-- Mobile Menu --}}
    <div id="mobileMenu"
        class="hidden lg:hidden border-t border-slate-200 bg-white shadow">

        <div class="max-w-7xl mx-auto px-6 py-5 space-y-3">

            @foreach($navLinks as $link)

                <a href="{{ $link['url'] }}"
                    class="block text-slate-700 hover:text-teal-600 py-2">

                    {{ $link['label'] }}

                </a>

            @endforeach

            <a href="{{ url('/contact') }}"
                class="block bg-yellow-500 hover:bg-yellow-400 text-center py-3 rounded-lg font-semibold mt-3">

                Contact Us

            </a>

        </div>

    </div>

    {{-- ===================== CONTENT ===================== --}}

    <main>

        @yield('content')

    </main>

    {{-- ===================== Back To Top ===================== --}}
<button id="backToTop"
    class="back-to-top fixed bottom-6 right-6 w-12 h-12 rounded-full bg-blue-900 text-white shadow-lg hover:bg-blue-800 transition duration-300 hidden z-50"
    onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">

    ↑

</button>

{{-- ===================== FOOTER ===================== --}}
<footer class="footer bg-slate-900 text-white mt-20">

    <div id="footerInner" class="container"></div>

</footer>

{{-- ===================== JAVASCRIPT ===================== --}}

<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/vanilla-cookieconsent@3.0.1/dist/cookieconsent.umd.js"></script>

<script src="{{ asset('assets/js/cookie-consent.js') }}"></script>

<script>

    // ==========================
    // Mobile Menu
    // ==========================

    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileBtn) {

        mobileBtn.addEventListener('click', () => {

            mobileMenu.classList.toggle('hidden');

        });

    }

    // ==========================
    // Back To Top Button
    // ==========================

    const backToTop = document.getElementById('backToTop');

    window.addEventListener('scroll', () => {

        if (window.scrollY > 300) {

            backToTop.classList.remove('hidden');

        } else {

            backToTop.classList.add('hidden');

        }

    });

    // ==========================
    // Close Mobile Menu
    // ==========================

    document.querySelectorAll('#mobileMenu a').forEach(item => {

        item.addEventListener('click', () => {

            mobileMenu.classList.add('hidden');

        });

    });

    // ==========================
    // Scrollspy — highlight active nav link
    // ==========================

    const navAnchors = document.querySelectorAll('.nav-link[data-nav-key]');

    const sections = Array.from(navAnchors)
        .map(a => document.getElementById(a.dataset.navKey))
        .filter(Boolean);

    if (sections.length) {

        const setActive = (key) => {

            navAnchors.forEach(a => {

                a.classList.toggle('active', a.dataset.navKey === key);

            });

        };

        const spyObserver = new IntersectionObserver((entries) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    setActive(entry.target.id);

                }

            });

        }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });

        sections.forEach(section => spyObserver.observe(section));

    }

</script>

{{-- ===================== Extra Script ===================== --}}
@stack('scripts')

</body>

</html>