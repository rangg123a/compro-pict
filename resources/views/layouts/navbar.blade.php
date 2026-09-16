@php
    $navLinks = [
        'home'           => ['label' => 'Home', 'url' => '/'],
        'about'          => ['label' => 'About Us', 'url' => '/about'],
        'our-tariffs'    => ['label' => 'Our Tariffs', 'url' => '/our-tariffs'],
        'operations'     => ['label' => 'Operations', 'url' => '/operations'],
        'services'       => ['label' => 'Our Services', 'url' => '/services'],
        'sustainability' => ['label' => 'Sustainability', 'url' => '/sustainability'],
        'contact'        => ['label' => 'Contact Us', 'url' => '/contact'],
    ];
    $currentPath = trim(request()->path(), '/');
@endphp

<style>
    /* ═══ FONT CENTURY GOTHIC UNTUK NAVBAR ═══ */
    #mobileMenu, #mobileMenu *, header, header * {
        font-family: 'Century Gothic', 'CenturyGothic', 'Poppins', sans-serif !important;
    }

    #mobileMenu {
        transition: opacity 0.3s ease, transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transform-origin: top center;
    }
    #mobileMenu.is-closed {
        opacity: 0;
        transform: scaleY(0.95) translateY(-10px);
        pointer-events: none;
    }
</style>

<!-- ═══ FLOATING COMPACT NAVBAR (LIGHT THEME) ═══ -->
<header class="fixed top-0 inset-x-0 z-50 px-4 pointer-events-none" style="padding-top: max(0.75rem, env(safe-area-inset-top));">
    <div class="max-w-6xl mx-auto flex items-center justify-between pointer-events-auto bg-white/90 backdrop-blur-xl border border-slate-200/90 rounded-full px-4 sm:px-5 py-2 shadow-xl shadow-slate-900/5 gap-4 relative z-50">
        
        <!-- Brand Logo & Nama -->
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 shrink-0 group">
            <img src="{{ asset('assets/images/pict.png') }}" alt="PICT Logo" class="relative z-10 h-7 sm:h-8 w-auto object-contain transition-transform duration-300 group-hover:scale-105 shrink-0">
            <div class="leading-tight hidden sm:block">
                <span class="text-slate-900 font-extrabold text-[13px] tracking-tight block">
                    Patimban International Car Terminal
                </span>
            </div>
        </a>

        <!-- Desktop Navigation (Tengah & Kompak) -->
        <nav id="navContainer" class="relative hidden lg:flex items-center p-1 rounded-full bg-slate-100/90 border border-slate-200/60">
            <span id="navSlider" class="absolute rounded-full bg-gradient-to-r from-red-600 to-rose-600 shadow-md shadow-red-600/30 pointer-events-none transition-all duration-300 opacity-0 z-0"></span>
            <div class="relative flex items-center z-10">
                @foreach($navLinks as $key => $link)
                    @php
                        $targetPath = trim($link['url'], '/');
                        $isCurrent = ($targetPath === '' && $currentPath === '') || ($targetPath !== '' && request()->is($targetPath . '*'));
                    @endphp
                    <a href="{{ url($link['url']) }}" data-nav-key="{{ $key }}" class="nav-tab relative inline-flex items-center justify-center px-3.5 py-1.5 rounded-full text-xs font-medium transition-colors duration-200 select-none whitespace-nowrap {{ $isCurrent ? 'active-tab text-white font-bold' : 'text-slate-600 hover:text-slate-900' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </nav>

        <!-- Kanan: Tombol PICTOS Login (Hanya Desktop) & Mobile Menu Toggle -->
        <div class="flex items-center gap-2 shrink-0">
            <!-- Tombol PICTOS Login (Desktop) -->
            <a href="https://patimbancarterminal.com/login" target="_blank" class="hidden sm:inline-flex items-center gap-2 px-3.5 py-2 rounded-full bg-[#0A2540] text-white text-xs font-bold tracking-wide hover:bg-[#1D4E74] transition-all shadow-sm border border-white/10 shrink-0">
                <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                <span>PICTOS Login</span>
            </a>

            <!-- Tombol Mobile Menu (Burger) -->
            <button id="mobileMenuBtn" type="button" aria-label="Toggle Menu" class="relative z-50 flex lg:hidden w-9 h-9 rounded-full items-center justify-center text-slate-700 hover:text-slate-900 bg-slate-100 border border-slate-200 active:scale-90 transition shrink-0 cursor-pointer">
                <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobileMenu" class="lg:hidden mt-3 pointer-events-auto max-w-xs mx-auto is-closed relative z-50">
        <div class="bg-white/95 backdrop-blur-2xl border border-slate-200 rounded-3xl p-4 shadow-2xl shadow-slate-900/10 space-y-2">
            
            <!-- Tombol PICTOS Login (Masuk ke dalam Burger Menu Mobile) -->
            <a href="https://patimbancarterminal.com/login" target="_blank" class="flex items-center justify-between px-4 py-3 rounded-2xl text-xs font-bold bg-[#0A2540] text-white shadow-sm mb-2">
                <span class="flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    PICTOS Login
                </span>
                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>

            <div class="border-t border-slate-100 pt-2 space-y-1">
                @foreach($navLinks as $link)
                    @php
                        $targetPath = trim($link['url'], '/');
                        $isCurrent = ($targetPath === '' && $currentPath === '') || ($targetPath !== '' && request()->is($targetPath . '*'));
                    @endphp
                    <a href="{{ url($link['url']) }}" class="flex items-center justify-between px-4 py-2.5 rounded-2xl text-xs font-medium transition active:scale-95 {{ $isCurrent ? 'bg-gradient-to-r from-red-600 to-rose-600 text-white font-bold shadow-md shadow-red-600/20' : 'text-slate-700 bg-slate-50 hover:bg-slate-100' }}">
                        <span>{{ $link['label'] }}</span>
                        @if($isCurrent)
                            <span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</header>

<!-- ═══ SCRIPT SINKRONISASI KLIK & PERPINDAHAN PIL ═══ -->
<script>
    function setupSlidingPill() {
        const container = document.getElementById('navContainer');
        const slider = document.getElementById('navSlider');
        if (!container || !slider) return;

        const tabs = container.querySelectorAll('.nav-tab');
        const currentPath = window.location.pathname.replace(/\/$/, '') || '/';
        
        let activeTab = null;

        tabs.forEach(tab => {
            const tabPath = new URL(tab.href, window.location.origin).pathname.replace(/\/$/, '') || '/';
            
            tab.classList.remove('active-tab', 'text-white', 'font-bold');
            tab.classList.add('text-slate-600');

            if (tabPath === currentPath) {
                activeTab = tab;
            } else if (tabPath !== '/' && currentPath.startsWith(tabPath)) {
                activeTab = tab;
            }
        });

        if (!activeTab && tabs.length > 0) {
            activeTab = tabs[0];
        }

        if (activeTab) {
            activeTab.classList.add('active-tab', 'text-white', 'font-bold');
            activeTab.classList.remove('text-slate-600');
        }

        function updateTabStyles(target) {
            tabs.forEach(tab => {
                if (tab === target) {
                    tab.classList.remove('text-slate-600');
                    tab.classList.add('text-white', 'font-bold');
                } else {
                    tab.classList.remove('text-white', 'font-bold');
                    tab.classList.add('text-slate-600');
                }
            });
        }

        function moveTo(target, isInstant = false) {
            if (!target) {
                slider.style.opacity = '0';
                updateTabStyles(activeTab);
                return;
            }

            const containerRect = container.getBoundingClientRect();
            const targetRect = target.getBoundingClientRect();

            const left = targetRect.left - containerRect.left;
            const top = targetRect.top - containerRect.top;
            const width = targetRect.width;
            const height = targetRect.height;

            if (isInstant) {
                slider.style.transition = 'none';
            } else {
                slider.style.transition = 'all 280ms cubic-bezier(0.25, 1, 0.5, 1)';
            }

            slider.style.left = `${left}px`;
            slider.style.top = `${top}px`;
            slider.style.width = `${width}px`;
            slider.style.height = `${height}px`;
            slider.style.opacity = '1';

            updateTabStyles(target);
        }

        if (activeTab) {
            moveTo(activeTab, true);
        }

        tabs.forEach(tab => {
            tab.onclick = function () {
                activeTab = this;
                tabs.forEach(t => t.classList.remove('active-tab'));
                this.classList.add('active-tab');
                moveTo(this, false);
            };

            tab.onmouseenter = function () {
                moveTo(this, false);
            };
        });

        container.onmouseleave = function () {
            moveTo(activeTab, false);
        };

        window.onresize = function () {
            if (activeTab) moveTo(activeTab, true);
        };
    }

    // ═══ Toggle Mobile Menu — pakai EVENT DELEGATION ═══
    // Dipasang sekali di document, jadi tetap jalan walau elemen
    // di-render ulang / partial ke-include lebih dari sekali /
    // halaman berpindah lewat Swup (tanpa perlu re-attach listener).
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('#mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');
        if (!menu) return;

        if (btn) {
            e.preventDefault();
            e.stopPropagation();
            menu.classList.toggle('is-closed');
            return;
        }

        // Klik di luar menu -> tutup menu
        if (!menu.contains(e.target)) {
            menu.classList.add('is-closed');
        }
    });

    // Tutup menu otomatis kalau salah satu link di dalamnya diklik
    document.addEventListener('click', (e) => {
        const link = e.target.closest('#mobileMenu a');
        if (link) {
            const menu = document.getElementById('mobileMenu');
            if (menu) menu.classList.add('is-closed');
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        setupSlidingPill();
    });

    if (window.swup) {
        window.swup.hooks.on('page:view', () => {
            setTimeout(setupSlidingPill, 50);
        });
    }
</script>