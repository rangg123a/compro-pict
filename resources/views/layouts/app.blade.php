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
        nav {
            background: rgba(7, 31, 69, .92);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }
        nav .nav-brand-title { color: #fff; }
        nav .nav-brand-subtitle { color: #f87171; }
        .nav-link { position: relative; transition: .3s; color: #e2e8f0; }
        .nav-link:hover { color: #f87171; }
        .nav-link.active { color: #f87171; font-weight: 700; }
        .nav-link.active::after {
            content: ""; position: absolute; bottom: -12px; left: 0;
            width: 100%; height: 2px; background: #ef4444; border-radius: 10px;
        }

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
            /* Aktifkan View Transitions API untuk browser modern */
@view-transition {
    navigation: auto;
}

/* Animasi geser untuk halaman baru yang masuk (Slide In) */
::view-transition-new(root) {
    animation: slideInRight 0.4s cubic-bezier(0.25, 1, 0.5, 1) both;
}

/* Animasi geser untuk halaman lama yang keluar (Slide Out) */
::view-transition-old(root) {
    animation: slideOutLeft 0.4s cubic-bezier(0.25, 1, 0.5, 1) both;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0.8;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutLeft {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(-30%);
        opacity: 0.3;
    }
}

/* Fallback untuk browser yang belum mendukung View Transitions API */
main.page-transition-enter {
    animation: pageSlideIn 0.45s cubic-bezier(0.22, 1, 0.36, 1) both;
}

@keyframes pageSlideIn {
    from {
        transform: translateX(40px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

main.page-transition-exit {
    animation: pageSlideOut 0.35s cubic-bezier(0.22, 1, 0.36, 1) both;
}

@keyframes pageSlideOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(-40px);
        opacity: 0;
    }
}
        }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 flex flex-col min-h-screen">

    <!-- ═══ INCLUDE NAVBAR ═══ -->
    @include('layouts.navbar')

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
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden'); 
            }); 
        }
        
        document.addEventListener('click', (e) => {
            if (mobileMenu && !mobileMenu.classList.contains('hidden') && !mobileBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

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
        <script>
    document.addEventListener('DOMContentLoaded', () => {
        const main = document.getElementById('mainContent');
        const links = document.querySelectorAll('a[href]:not([target="_blank"]):not([href^="#"]):not([href^="javascript:"])');

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                // Jangan jalankan efek jika menekan Ctrl/Cmd (buka di tab baru)
                if (e.metaKey || e.ctrlKey) return;

                const targetUrl = this.getAttribute('href');
                
                // Pastikan link menuju domain lokal/internal yang sama
                if (targetUrl.startsWith('/') || targetUrl.startsWith(window.location.origin)) {
                    // Jika browser mendukung View Transitions API natif
                    if (document.startViewTransition) {
                        return; // Biarkan browser menangani View Transition otomatis
                    }

                    // Fallback efek geser keluar sebelum pindah URL
                    e.preventDefault();
                    if (main) {
                        main.classList.remove('page-transition-enter');
                        main.classList.add('page-transition-exit');
                    }

                    setTimeout(() => {
                        window.location.href = targetUrl;
                    }, 300);
                }
            });
        });
    });

    </script>
    @stack('scripts')

</body>
</html>