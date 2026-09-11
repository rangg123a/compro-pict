<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    
    <!-- Meta tags untuk Native App-like Experience -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="theme-color" content="#ffffff">

    <title>@yield('title', 'PT Patimban International Car Terminal — PICT')</title>
    <meta name="description" content="PT Patimban International Car Terminal (PICT) — Indonesia's premier automotive gateway and modern roll-on/roll-off (Ro-Ro) terminal at Patimban Port, West Java.">
    
    <link rel="icon" type="image/png" href="{{ asset('assets/images/pict.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/pict.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <!-- Cookie Consent CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanilla-cookieconsent@3.0.1/dist/cookieconsent.css">
    
    <link rel="preload" as="image" href="{{ asset('assets/images/background.jpeg') }}">

    <!-- Google reCAPTCHA API -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        body { 
            font-family: 'DM Sans', sans-serif; 
            overflow-x: hidden;
            -webkit-tap-highlight-color: transparent;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        .tap-highlight-transparent { -webkit-tap-highlight-color: transparent; }
        
        /* Aksen Gold/Brown Kustom */
        .text-gold { color: #b45309; }
        .bg-gold { background-color: #d97706; }
        .border-gold { border-color: #d97706; }
        
        footer { margin-top: auto; }
        footer .py-12 { padding-top: 2.5rem !important; padding-bottom: 2rem !important; }
        footer .py-10 { padding-top: 2rem !important; padding-bottom: 1.5rem !important; }
        footer .py-8 { padding-top: 1.5rem !important; padding-bottom: 1.25rem !important; }
        footer .gap-8, footer .gap-10, footer .gap-12 { gap: 1.5rem !important; }
        footer .space-y-6 > :not([hidden]) ~ :not([hidden]) { margin-top: .75rem !important; }
        footer .space-y-4 > :not([hidden]) ~ :not([hidden]) { margin-top: .5rem !important; }
        footer h2, footer h3, footer h4 { margin-bottom: .75rem !important; line-height: 1.3 !important; }
        footer .border-t { margin-top: 1.5rem !important; padding-top: 1rem !important; }
        
        @media (max-width: 640px) {
            footer .py-12, footer .py-10 { padding-top: 2rem !important; padding-bottom: 1.5rem !important; }
            footer .grid { row-gap: 1.25rem !important; }
        }

        .transition-slide {
            transition: transform 0.35s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.3s ease;
            will-change: transform, opacity;
        }

        html.is-animating .transition-slide {
            opacity: 0;
            transform: translateX(-35px);
        }

        html.is-rendering .transition-slide {
            opacity: 0;
            transform: translateX(35px);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main id="swup" class="transition-slide flex-grow w-full overflow-hidden pt-0">
        @yield('content')
    </main>

    <!-- Tombol Back to Top -->
    <button id="backToTop" aria-label="Back to top" class="fixed bottom-6 right-4 md:bottom-6 md:right-6 w-11 h-11 md:w-12 md:h-12 rounded-full bg-red-900 text-amber-400 border border-amber-500/30 shadow-xl hover:bg-red-800 transition duration-300 hidden z-50 items-center justify-center text-lg md:text-xl font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900 active:scale-90" style="margin-bottom: env(safe-area-inset-bottom);">
        &uarr;
    </button>

    @include('layouts.footer')

    <!-- Global Scripts -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/swup@4"></script>
    
    <script>
        function initInteractions() {
            const mobileBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            
            if (mobileBtn && mobileMenu) { 
                mobileBtn.onclick = (e) => { 
                    e.stopPropagation();
                    if(mobileMenu.classList.contains('is-closed')) {
                        mobileMenu.classList.remove('hidden');
                        setTimeout(() => mobileMenu.classList.remove('is-closed'), 10);
                    } else {
                        mobileMenu.classList.add('is-closed');
                        setTimeout(() => mobileMenu.classList.add('hidden'), 300);
                    }
                };
            }
            
            document.onclick = (e) => {
                if (mobileMenu && !mobileMenu.classList.contains('is-closed') && mobileBtn && !mobileBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.add('is-closed');
                    setTimeout(() => mobileMenu.classList.add('hidden'), 300);
                }
            };

            document.querySelectorAll('#mobileMenu a').forEach(item => {
                item.onclick = () => { 
                    if (mobileMenu) {
                        mobileMenu.classList.add('is-closed');
                        setTimeout(() => mobileMenu.classList.add('hidden'), 300);
                    }
                };
            });
        }

        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) { 
                backToTop?.classList.remove('hidden');
                backToTop?.classList.add('flex');
            } else { 
                backToTop?.classList.add('hidden');
                backToTop?.classList.remove('flex');
            }
        });

        if (backToTop) {
            backToTop.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        const swup = new Swup();
        swup.hooks.on('page:view', () => {
            window.scrollTo({ top: 0, behavior: 'instant' });
            initInteractions();
        });

        document.addEventListener('DOMContentLoaded', initInteractions);
    </script>
    @stack('scripts')

    <!-- AI Chatbot Widget -->
    @include('layouts.ai-chat')

    <!-- Custom Cookie Consent Banner -->
    @include('layouts.cookie-banner')

    <!-- Cookie Consent Script & Inisialisasi -->
    <script src="https://cdn.jsdelivr.net/npm/vanilla-cookieconsent@3.0.1/dist/cookieconsent.umd.js"></script>
    <script src="{{ asset('assets/js/cookie-consent.js') }}"></script>
</body>
</html>