@php
    $navLinks = [
        'about' => ['label' => 'Home', 'url' => '/'],
        'Cargo' => ['label' => 'Cargo Handling', 'url' => '/Cargo-Handling'],
        'Operations' => ['label' => 'Operations', 'url' => '/Operations'],
        'services' => ['label' => 'Our Services', 'url' => '/services'],
        'sustainability' => ['label' => 'Sustainability', 'url' => '/sustainability'],
    ];
@endphp

<!-- Wrapper Navbar Melayang (Floating Island) -->
<header class="fixed top-4 inset-x-0 z-50 px-3 sm:px-6 pointer-events-none transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-between pointer-events-auto bg-slate-950/80 backdrop-blur-xl border border-white/15 rounded-full pl-3 pr-2.5 sm:pl-5 sm:pr-3 py-2 shadow-2xl shadow-black/50">
        
        <!-- ═══ BRAND / LOGO ═══ -->
        <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0 group">
            <div class="relative flex items-center justify-center p-1.5 rounded-full bg-white/5 border border-white/10 group-hover:border-red-500/50 transition">
                <img src="{{ asset('assets/images/pict.png') }}" alt="PICT Logo" class="h-7 sm:h-8 w-auto object-contain transition group-hover:scale-105">
                <span class="absolute -bottom-0.5 -right-0.5 flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                </span>
            </div>
            
            <div class="hidden sm:block leading-none tracking-tight">
                <div class="flex items-center gap-1.5">
                    <span class="text-white font-extrabold text-xs sm:text-sm tracking-wider">PATIMBAN INTERNATIONAL <BR> CAR TERMINAL</span>

                </div>
              
            </div>
        </a>

        <!-- ═══ DESKTOP SLIDING PILL NAVIGATION ═══ -->
        <nav id="navContainer" class="relative hidden lg:flex items-center p-1 rounded-full bg-white/[0.05] border border-white/10 shadow-inner">
            <!-- Pil Merah Meluncur Presisi -->
            <span id="navSlider" 
                  class="absolute rounded-full bg-gradient-to-r from-red-600 to-rose-600 shadow-md shadow-red-600/40 pointer-events-none transition-all duration-300 ease-[cubic-bezier(0.25,1,0.5,1)] opacity-0 z-0">
            </span>

            <div class="relative flex items-center z-10">
                @foreach($navLinks as $key => $link)
                    @php
                        $isActive = request()->is(ltrim($link['url'], '/') ?: '/');
                    @endphp
                    <a href="{{ $link['url'] }}" 
                       data-nav-key="{{ $key }}" 
                       class="nav-tab relative inline-flex items-center justify-center px-4 py-1.5 rounded-full text-[13px] font-medium transition-colors duration-200 select-none {{ $isActive ? 'active-tab text-white font-semibold' : 'text-slate-400 hover:text-slate-200' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </nav>

        <!-- ═══ ACTION & TOGGLE ═══ -->
        <div class="flex items-center gap-2">
            <!-- Contact Us Button -->
            <a href="{{ url('/contact') }}" class="hidden sm:inline-flex items-center gap-2 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-bold text-white bg-gradient-to-r from-red-600 via-red-500 to-rose-600 hover:from-red-500 hover:to-rose-500 shadow-lg shadow-red-600/25 hover:shadow-red-600/40 border border-red-400/30 transition transform hover:-translate-y-0.5">
                <span>Contact Us</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>

            <!-- Mobile Hamburger Button -->
            <button id="mobileMenuBtn" aria-label="Toggle Menu" class="lg:hidden p-2.5 rounded-full text-slate-300 hover:text-white bg-white/5 hover:bg-white/10 border border-white/10 transition focus:outline-none focus:ring-2 focus:ring-red-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- ═══ MOBILE FLOATING CARD MENU ═══ -->
    <div id="mobileMenu" class="hidden lg:hidden mt-2.5 pointer-events-auto max-w-md mx-auto">
        <div class="bg-slate-950/90 backdrop-blur-2xl border border-white/15 rounded-3xl p-4 shadow-2xl shadow-black/60 space-y-1">
            @foreach($navLinks as $link)
                @php
                    $isActive = request()->is(ltrim($link['url'], '/') ?: '/');
                @endphp
                <a href="{{ $link['url'] }}" class="flex items-center justify-between px-4 py-3 rounded-2xl text-sm font-medium transition {{ $isActive ? 'bg-red-600 text-white font-semibold shadow-md shadow-red-600/20' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <span>{{ $link['label'] }}</span>
                    @if($isActive)
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                    @else
                        <span class="text-slate-500">&rarr;</span>
                    @endif
                </a>
            @endforeach

            <div class="pt-2 mt-2 border-t border-white/10">
                <a href="{{ url('/contact') }}" class="flex items-center justify-center gap-2 w-full py-3 rounded-2xl bg-gradient-to-r from-red-600 to-rose-600 text-white font-bold text-sm shadow-lg shadow-red-600/30 transition hover:opacity-95">
                    <span>Contact Us</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- ═══ JAVASCRIPT SLIDER DENGAN KOORDINAT PRESISI ═══ -->
<script>
    function setupSlidingPill() {
        const container = document.getElementById('navContainer');
        const slider = document.getElementById('navSlider');
        if (!container || !slider) return;

        const tabs = container.querySelectorAll('.nav-tab');
        const activeTab = container.querySelector('.active-tab');

        function updateTabStyles(activeTarget) {
            tabs.forEach(tab => {
                if (tab === activeTarget) {
                    tab.classList.remove('text-slate-400');
                    tab.classList.add('text-white', 'font-semibold');
                } else {
                    tab.classList.remove('text-white', 'font-semibold');
                    tab.classList.add('text-slate-400');
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

            // Hitung koordinat relatif persis terhadap container
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

        // Posisi awal
        if (activeTab) {
            moveTo(activeTab, true);
        }

        // Event hover masuk menu
        tabs.forEach(tab => {
            tab.addEventListener('mouseenter', () => moveTo(tab));
        });

        // Event kursor keluar navbar -> balik ke menu aktif
        container.addEventListener('mouseleave', () => {
            moveTo(activeTab);
        });

        // Responsif layar
        window.addEventListener('resize', () => {
            const currentActive = container.querySelector('.active-tab');
            if (currentActive) moveTo(currentActive, true);
        });
    }

    document.addEventListener('DOMContentLoaded', setupSlidingPill);
    if (window.swup) {
        window.swup.hooks.on('page:view', setupSlidingPill);
    }
</script>