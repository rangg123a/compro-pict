<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            overflow-x: hidden;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        
        /* Footer Compact Styling */
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

        /* ═══ SWUP SLIDE TRANSITIONS (TANPA JEDA RELOAD) ═══ */
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
<!-- Mengubah bg-slate-50 menjadi bg-slate-950 agar area dasar halaman selaras dengan tema gelap -->
<body class="bg-slate-950 flex flex-col min-h-screen">

    <!-- ═══ INCLUDE NAVBAR ═══ -->
    @include('layouts.navbar')

    <!-- Menghilangkan padding-top (pt-20 md:pt-24 dihapus total) agar hero section langsung mengisi ujung paling atas layar di belakang floating navbar -->
    <main id="swup" class="transition-slide flex-grow w-full overflow-hidden pt-0">
        @yield('content')
    </main>

    <!-- Back to top -->
    <button id="backToTop" aria-label="Back to top" class="fixed bottom-4 right-4 md:bottom-6 md:right-6 w-10 h-10 md:w-12 md:h-12 rounded-full bg-red-600 text-white shadow-lg hover:bg-red-700 transition duration-300 hidden z-50 flex items-center justify-center text-lg md:text-xl font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
        &uarr;
    </button>

    <!-- ═══ INCLUDE FOOTER ═══ -->
    @include('layouts.footer')

    <!-- Scripts Core -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-cookieconsent@3.0.1/dist/cookieconsent.umd.js"></script>
    <script src="{{ asset('assets/js/cookie-consent.js') }}"></script>
    
    <!-- Swup Core via CDN -->
    <script src="https://unpkg.com/swup@4"></script>
    
    <script>
        function initInteractions() {
            const mobileBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            
            if (mobileBtn && mobileMenu) { 
                mobileBtn.onclick = (e) => { 
                    e.stopPropagation();
                    mobileMenu.classList.toggle('hidden'); 
                };
            }
            
            document.onclick = (e) => {
                if (mobileMenu && !mobileMenu.classList.contains('hidden') && mobileBtn && !mobileBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.add('hidden');
                }
            };

            document.querySelectorAll('#mobileMenu a').forEach(item => {
                item.onclick = () => { 
                    if (mobileMenu) mobileMenu.classList.add('hidden'); 
                };
            });
        }

        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) { 
                backToTop?.classList.remove('hidden'); 
            } else { 
                backToTop?.classList.add('hidden'); 
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

</body>
</html>