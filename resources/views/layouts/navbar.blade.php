@php
    $navLinks = [
        'home'           => ['label' => 'Home', 'url' => '/'],
        'cargo'          => ['label' => 'Cargo Handling', 'url' => '/cargo-handling'],
        'operations'     => ['label' => 'Operations', 'url' => '/operations'],
        'services'       => ['label' => 'Our Services', 'url' => '/services'],
        'sustainability' => ['label' => 'Sustainability', 'url' => '/sustainability'],
        'contact'        => ['label' => 'Contact Us', 'url' => '/contact'],
    ];
    $currentPath = trim(request()->path(), '/');
@endphp

<style>
    .pict-logo-shell {
        box-shadow: 0 0 0 1px rgba(248, 113, 113, .12), 0 0 14px rgba(239, 68, 68, .28), 0 0 28px rgba(56, 189, 248, .12);
        animation: pictLogoGlow 3.6s ease-in-out infinite;
    }
    .pict-logo-shell::after {
        content: "";
        position: absolute;
        inset: -45% 35%;
        background: linear-gradient(105deg, transparent 35%, rgba(255, 255, 255, .72) 50%, transparent 65%);
        transform: translateX(-170%) rotate(12deg);
        animation: pictLogoShine 5s ease-in-out infinite;
        pointer-events: none;
    }
    .group:hover .pict-logo-shell {
        animation-duration: 1.8s;
        box-shadow: 0 0 0 1px rgba(248, 113, 113, .3), 0 0 18px rgba(239, 68, 68, .5), 0 0 34px rgba(56, 189, 248, .2);
    }
    @keyframes pictLogoGlow {
        0%, 100% { box-shadow: 0 0 0 1px rgba(248, 113, 113, .12), 0 0 14px rgba(239, 68, 68, .28), 0 0 28px rgba(56, 189, 248, .12); }
        50% { box-shadow: 0 0 0 1px rgba(248, 113, 113, .25), 0 0 22px rgba(239, 68, 68, .46), 0 0 38px rgba(56, 189, 248, .2); }
    }
    @keyframes pictLogoShine {
        0%, 35% { transform: translateX(-170%) rotate(12deg); opacity: 0; }
        45% { opacity: .9; }
        58%, 100% { transform: translateX(170%) rotate(12deg); opacity: 0; }
    }
    @media (prefers-reduced-motion: reduce) {
        .pict-logo-shell, .pict-logo-shell::after { animation: none; }
    }
    
    /* Native App Mobile Menu Animation */
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

<!-- ═══ FLOATING CAPSULE NAVBAR ═══ -->
<!-- Menggunakan env(safe-area-inset-top) agar aman dari poni (notch) HP modern -->
<header class="fixed top-0 inset-x-0 z-50 px-4 sm:px-6 pointer-events-none" style="padding-top: max(0.5rem, env(safe-area-inset-top));">
    <div class="max-w-7xl mx-auto flex items-center justify-between pointer-events-auto bg-[#0b1120]/80 backdrop-blur-md border border-white/10 rounded-full px-4 sm:px-6 py-2.5 shadow-2xl shadow-black/80">
        
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 sm:gap-3 shrink-0 group">
            <div class="pict-logo-shell relative flex items-center justify-center p-1.5 rounded-full bg-white/5 border border-white/10 overflow-hidden">
                <img src="{{ asset('assets/images/pict.png') }}" alt="PICT Logo" class="relative z-10 h-7 sm:h-8 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                <span class="absolute -bottom-0.5 -right-0.5 flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                </span>
            </div>
            
            <div class="leading-none">
                <div class="flex items-center gap-1.5">
                    <span class="text-white font-extrabold text-xs sm:text-sm tracking-wider">Patimban International <br> Car Terminal</span>
                </div>
            </div>
        </a>

        <!-- ═══ GABUNGAN NAVIGASI & TOMBOL MOBILE ═══ -->
        <div class="flex items-center gap-2">
            
            <!-- Desktop Navigation -->
            <nav id="navContainer" class="relative hidden lg:flex items-center p-1 rounded-full bg-white/[0.04]">
                <span id="navSlider" class="absolute rounded-full bg-gradient-to-r from-red-600 to-rose-600 shadow-lg shadow-red-600/40 pointer-events-none transition-all duration-300 opacity-0 z-0"></span>
                <div class="relative flex items-center z-10">
                    @foreach($navLinks as $key => $link)
                        @php
                            $targetPath = trim($link['url'], '/');
                            $isCurrent = ($targetPath === '' && $currentPath === '') || ($targetPath !== '' && request()->is($targetPath . '*'));
                        @endphp
                        <a href="{{ url($link['url']) }}" data-nav-key="{{ $key }}" class="nav-tab relative inline-flex items-center justify-center px-4 py-2 rounded-full text-xs lg:text-[13px] font-medium transition-colors duration-200 select-none whitespace-nowrap {{ $isCurrent ? 'active-tab text-white font-bold' : 'text-slate-300 hover:text-white' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>
            </nav>

            <!-- Tombol Mobile dengan area sentuh yang diperluas -->
            <button id="mobileMenuBtn" aria-label="Toggle Menu" class="flex lg:hidden w-11 h-11 rounded-full items-center justify-center text-slate-300 hover:text-white bg-white/5 border border-white/10 active:scale-90 transition tap-highlight-transparent">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobileMenu" class="lg:hidden mt-3 pointer-events-auto max-w-sm mx-auto is-closed">
        <div class="bg-[#0b1120]/95 backdrop-blur-2xl border border-white/15 rounded-3xl p-5 shadow-2xl shadow-black/80 space-y-2">
            @foreach($navLinks as $link)
                @php
                    $targetPath = trim($link['url'], '/');
                    $isCurrent = ($targetPath === '' && $currentPath === '') || ($targetPath !== '' && request()->is($targetPath . '*'));
                @endphp
                <a href="{{ url($link['url']) }}" class="flex items-center justify-between px-5 py-3.5 rounded-2xl text-sm font-medium transition tap-highlight-transparent active:scale-95 {{ $isCurrent ? 'bg-gradient-to-r from-red-600 to-rose-600 text-white font-bold shadow-lg' : 'text-slate-300 bg-white/5' }}">
                    <span>{{ $link['label'] }}</span>
                    @if($isCurrent)
                        <span class="w-2 h-2 rounded-full bg-white inline-block"></span>
                    @endif
                </a>
            @endforeach
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

        // 1. Sinkronisasi tab aktif sesuai URL browser saat ini
        tabs.forEach(tab => {
            const tabPath = new URL(tab.href, window.location.origin).pathname.replace(/\/$/, '') || '/';
            
            tab.classList.remove('active-tab', 'text-white', 'font-bold');
            tab.classList.add('text-slate-300');

            if (tabPath === currentPath) {
                activeTab = tab;
            } else if (tabPath !== '/' && currentPath.startsWith(tabPath)) {
                activeTab = tab;
            }
        });

        // Default ke Home jika di root domain
        if (!activeTab && tabs.length > 0) {
            activeTab = tabs[0];
        }

        if (activeTab) {
            activeTab.classList.add('active-tab', 'text-white', 'font-bold');
            activeTab.classList.remove('text-slate-300');
        }

        // 2. Fungsi style teks
        function updateTabStyles(target) {
            tabs.forEach(tab => {
                if (tab === target) {
                    tab.classList.remove('text-slate-300');
                    tab.classList.add('text-white', 'font-bold');
                } else {
                    tab.classList.remove('text-white', 'font-bold');
                    tab.classList.add('text-slate-300');
                }
            });
        }

        // 3. Fungsi memindahkan pil slider
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

        // Posisikan pil merah di tab aktif saat halaman tampil
        if (activeTab) {
            moveTo(activeTab, true);
        }

        // 4. EVENT KLIK: Langsung jadikan menu yang diklik sebagai activeTab baru
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

        // 5. Mouse keluar: Kembali ke menu aktif yang diklik
        container.onmouseleave = function () {
            moveTo(activeTab, false);
        };

        window.onresize = function () {
            if (activeTab) moveTo(activeTab, true);
        };
    }

    document.addEventListener('DOMContentLoaded', setupSlidingPill);

    // Wajib untuk Swup: panggil ulang setiap halaman baru selesai dimuat
    if (window.swup) {
        window.swup.hooks.on('page:view', () => {
            setTimeout(setupSlidingPill, 50);
        });
    }
</script>