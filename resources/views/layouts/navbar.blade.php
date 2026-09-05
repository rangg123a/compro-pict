@php
    $navLinks = [
        'home'           => ['label' => 'Home', 'url' => '/'],
        'cargo'          => ['label' => 'Cargo Handling', 'url' => '/cargo-handling'],
        'operations'     => ['label' => 'Operations', 'url' => '/operations'],
        'services'       => ['label' => 'Our Services', 'url' => '/services'],
        'sustainability' => ['label' => 'Sustainability', 'url' => '/sustainability'],
    ];

    $currentPath = trim(request()->path(), '/');
@endphp

<!-- ═══ FLOATING CAPSULE NAVBAR ═══ -->
<header class="fixed top-4 inset-x-0 z-50 px-4 sm:px-6 pointer-events-none">
    <div class="max-w-7xl mx-auto flex items-center justify-between pointer-events-auto bg-[#0b1120]/80 backdrop-blur-md border border-white/10 rounded-full px-4 sm:px-6 py-2.5 shadow-2xl shadow-black/80">
        
        <!-- Brand Logo Bersih dengan Efek Kilatan -->
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 sm:gap-3 shrink-0 group">
            <div class="relative flex items-center justify-center p-1.5 rounded-full bg-white/5 border border-white/10 overflow-hidden">
                <img src="{{ asset('assets/images/pict.png') }}" alt="PICT Logo" class="h-7 sm:h-8 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                <span class="absolute -bottom-0.5 -right-0.5 flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                </span>
            </div>
            
            <div class="leading-none">
                <div class="flex items-center gap-1.5">
                    <span class="text-white font-extrabold text-xs sm:text-sm tracking-wider">PATIMBAN</span>
                    <span class="text-[10px] font-bold text-red-500 px-1.5 py-0.5 rounded bg-red-500/10 border border-red-500/20">PICT</span>
                </div>
                <p class="text-slate-400 text-[9px] uppercase tracking-widest mt-1 font-medium">International Car Terminal</p>
            </div>
        </a>

        <!-- Desktop Navigation dengan Sliding Pill -->
        <nav id="navContainer" class="relative hidden md:flex items-center p-1 rounded-full bg-white/[0.04]">
            <!-- Pil Merah Geser -->
            <span id="navSlider" 
                  class="absolute rounded-full bg-gradient-to-r from-red-600 to-rose-600 shadow-lg shadow-red-600/40 pointer-events-none transition-all duration-300 ease-[cubic-bezier(0.25,1,0.5,1)] opacity-0 z-0">
            </span>

            <div class="relative flex items-center z-10">
                @foreach($navLinks as $key => $link)
                    @php
                        $targetPath = trim($link['url'], '/');
                        $isCurrent = ($targetPath === '' && $currentPath === '') || ($targetPath !== '' && request()->is($targetPath . '*'));
                    @endphp
                    <a href="{{ url($link['url']) }}" 
                       data-nav-key="{{ $key }}"
                       class="nav-tab relative inline-flex items-center justify-center px-4 py-2 rounded-full text-xs lg:text-[13px] font-medium transition-colors duration-200 select-none whitespace-nowrap {{ $isCurrent ? 'active-tab text-white font-bold' : 'text-slate-300 hover:text-white' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </nav>

        <!-- Right Side: Contact Us & Mobile Button -->
        <div class="flex items-center gap-2">
            <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs sm:text-sm font-bold text-white bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 shadow-lg shadow-red-600/30 border border-red-400/20 transition transform hover:-translate-y-0.5 active:scale-95 whitespace-nowrap">
                <span>Contact Us</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>

            <button id="mobileMenuBtn" aria-label="Toggle Menu" class="flex md:hidden w-10 h-10 rounded-full items-center justify-center text-slate-300 hover:text-white bg-white/5 border border-white/10 active:scale-90 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobileMenu" class="hidden md:hidden mt-3 pointer-events-auto max-w-sm mx-auto">
        <div class="bg-[#0b1120]/95 backdrop-blur-2xl border border-white/15 rounded-3xl p-5 shadow-2xl shadow-black/80 space-y-2">
            @foreach($navLinks as $link)
                @php
                    $targetPath = trim($link['url'], '/');
                    $isCurrent = ($targetPath === '' && $currentPath === '') || ($targetPath !== '' && request()->is($targetPath . '*'));
                @endphp
                <a href="{{ url($link['url']) }}" 
                   class="mobile-nav-link flex items-center justify-between px-5 py-3.5 rounded-2xl text-sm font-medium transition {{ $isCurrent ? 'bg-gradient-to-r from-red-600 to-rose-600 text-white font-bold shadow-lg shadow-red-600/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <span>{{ $link['label'] }}</span>
                    @if($isCurrent)
                        <span class="w-2 h-2 rounded-full bg-white inline-block"></span>
                    @else
                        <span class="text-slate-500">&rarr;</span>
                    @endif
                </a>
            @endforeach

            <div class="pt-2">
                <a href="{{ url('/contact') }}" class="flex items-center justify-center gap-2 w-full py-3.5 rounded-2xl bg-gradient-to-r from-red-600 to-rose-600 text-white font-bold text-sm shadow-lg shadow-red-600/30 transition hover:opacity-95 active:scale-95">
                    <span>Contact Us</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
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