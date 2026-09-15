@extends('layouts.app')

@section('title', 'Operations — PT Patimban International Car Terminal')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@700;800&display=swap" rel="stylesheet">
<style>
    /* ═══ DESIGN SYSTEM — PICT TERMINAL DOSSIER ═══ */
    :root {
        --color-navy: #0A2540;
        --color-steel: #1D4E74;
        --color-signal: #B4232A;
        --color-paper: #F5F3EE;
        --color-ink: #16232E;
        --color-muted: #5B6672;
        --color-line: #D8D4C8;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--color-paper);
        color: var(--color-ink);
        overflow-x: hidden;
    }

    h1, h2, h3, h4, h5, h6, .font-heading {
        font-family: 'Manrope', sans-serif;
    }

    .plate {
        background: #FFFFFF;
        border: 1px solid var(--color-line);
    }
    .plate-dark {
        background: var(--color-navy);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.12);
    }

    .spec-frame {
        position: relative;
        width: 3.75rem;
        height: 3.75rem;
        flex-shrink: 0;
    }
    .spec-frame svg.frame {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
    }
    .spec-frame .icon-wrap {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem;
    }

    .index-label {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .index-label .num {
        font-family: 'Manrope', sans-serif;
        font-weight: 700;
        color: var(--color-signal);
        font-size: 0.85rem;
    }
    .index-label .rule {
        height: 1px;
        width: 2rem;
        background: var(--color-line);
        flex-shrink: 0;
    }
    .index-label .lbl {
        color: var(--color-muted);
        font-size: 0.85rem;
    }

    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    
    .flow-btn.active .node-indicator {
        background-color: #B4232A;
        border-color: #B4232A;
        color: white;
        box-shadow: 0 0 0 4px rgba(180, 35, 42, 0.2);
    }
    .flow-btn.active h3 { color: #B4232A; }
    .flow-btn.active .arrow-indicator {
        opacity: 1;
        transform: translateY(0);
    }
    
    .fade-content { animation: fadeInData 0.4s ease-out forwards; }
    @keyframes fadeInData {
        0% { opacity: 0; transform: translateY(10px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .grid-texture {
        background-image:
            linear-gradient(rgba(10,37,64,0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(10,37,64,0.05) 1px, transparent 1px);
        background-size: 48px 48px;
    }

    .hero-slide {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1.2s ease-in-out;
    }
    .hero-slide.active {
        opacity: 1;
    }

    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: var(--color-paper); }
    ::-webkit-scrollbar-thumb { background: #c3bda9; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #a89f84; }
</style>
@endpush

@section('content')

<!-- ═══ 1. HERO ═══ -->
<section class="relative min-h-[85vh] w-full flex flex-col justify-between overflow-hidden bg-slate-900 pt-28 pb-0">
    <div id="hero-slideshow"
         data-images='{{ json_encode([
             secure_asset("assets/images/background.jpeg"),
             secure_asset("assets/images/patimban-yard-1.jpeg"),
             secure_asset("assets/images/vessel-5.jpeg"),
             secure_asset("assets/images/car-4.jpeg")
         ]) }}'
         class="absolute inset-0 z-0">
    </div>

    <div class="absolute inset-0 bg-gradient-to-b from-slate-950/75 via-slate-950/45 to-slate-950/85 z-[1] pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-5 sm:px-6 z-10 w-full my-auto py-8">
        <div class="max-w-3xl" data-aos="fade-up" data-aos-duration="900">
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight font-heading leading-[1.1] mb-4 sm:mb-6">
                A Ro-Ro terminal built to move vehicles, not just words.
            </h1>
            <p class="text-sm sm:text-lg text-slate-200 font-light leading-relaxed max-w-2xl">
                From vessel arrival to gate-out, every unit that crosses our berth is tracked, inspected, and handled to a zero-scratch standard.
            </p>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-5 sm:px-6 w-full z-10 border-t border-white/15">
        <div class="grid grid-cols-2 sm:grid-cols-4">
            @php
                $credentials = ['Smart Terminal', 'ISO Standards', 'Zero Scratch Policy', 'Real-Time Monitoring'];
            @endphp
            @foreach($credentials as $i => $cred)
            <div class="flex items-center gap-2 py-4 px-2 sm:px-6 {{ $i > 0 ? 'border-l border-white/15' : '' }}">
                <svg viewBox="0 0 16 16" class="w-3.5 h-3.5 text-white/70 flex-shrink-0"><path d="M2 8.5L6 12L14 3" stroke="currentColor" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="text-xs sm:text-sm font-medium text-white/90">{{ $cred }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══ 2. TERMINAL AT A GLANCE ═══ -->
<section class="relative z-20 bg-white border-b border-[var(--color-line)]">
    <div class="max-w-7xl mx-auto px-5 sm:px-6">
        <div class="grid grid-cols-2 lg:grid-cols-4">
            <div class="py-8 pr-4 lg:border-r border-[var(--color-line)]">
                <div class="text-3xl sm:text-5xl font-extrabold text-[#0A2540] font-heading tracking-tight mb-1 counter" data-target="218">0</div>
                <div class="text-xs sm:text-sm text-[var(--color-muted)]">Thousand units, annual capacity</div>
            </div>
            <div class="py-8 pl-4 lg:pl-8 lg:pr-6 lg:border-r border-[var(--color-line)]">
                <div class="text-3xl sm:text-5xl font-extrabold text-[#0A2540] font-heading tracking-tight mb-1 counter" data-target="300">0</div>
                <div class="text-xs sm:text-sm text-[var(--color-muted)]">Metres of Ro-Ro berth</div>
            </div>
            <div class="py-8 pr-4 pl-4 lg:pl-8 lg:border-r border-[var(--color-line)] border-t lg:border-t-0">
                <div class="text-3xl sm:text-5xl font-extrabold text-[#0A2540] font-heading tracking-tight mb-1">24/7</div>
                <div class="text-xs sm:text-sm text-[var(--color-muted)]">Continuous operations</div>
            </div>
            <div class="py-8 pl-4 lg:pl-8 border-t lg:border-t-0">
                <div class="text-3xl sm:text-5xl font-extrabold text-[#B4232A] font-heading tracking-tight mb-1">Zero</div>
                <div class="text-xs sm:text-sm text-[var(--color-muted)]">Scratch tolerance policy</div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ LIVE WEATHER & MARINE CONDITIONS WIDGET ═══ --}}
<section class="py-10 sm:py-16 bg-slate-900 text-white relative overflow-hidden" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 sm:mb-8 gap-4">
            <div>
                <span class="text-red-500 font-bold tracking-widest text-[11px] sm:text-xs uppercase block mb-1">Safety & Operations</span>
                <h3 class="text-xl sm:text-3xl font-extrabold tracking-tight">Patimban Port Marine & Weather Conditions</h3>
            </div>
            <div class="flex items-center gap-2.5 bg-slate-800/80 px-3.5 py-2 rounded-xl border border-slate-700 text-xs text-slate-300">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span id="live-clock" class="font-mono font-medium text-slate-200">Loading time...</span>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-8 sm:mb-10">
            <div class="bg-slate-800/60 border border-slate-700/80 rounded-2xl p-3.5 sm:p-6 backdrop-blur-md">
                <div class="flex items-center justify-between text-slate-400 mb-2 sm:mb-4">
                    <span class="text-[11px] sm:text-sm font-semibold uppercase tracking-wider">Temperature</span>
                    <svg class="w-4 h-4 sm:w-6 sm:h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <p id="weather-temp" class="text-xl sm:text-3xl font-extrabold text-white">-- °C</p>
                <p class="text-slate-400 text-[10px] sm:text-xs mt-1">Patimban Harbor Area</p>
            </div>
            <div class="bg-slate-800/60 border border-slate-700/80 rounded-2xl p-3.5 sm:p-6 backdrop-blur-md">
                <div class="flex items-center justify-between text-slate-400 mb-2 sm:mb-4">
                    <span class="text-[11px] sm:text-sm font-semibold uppercase tracking-wider">Wind Speed</span>
                    <svg class="w-4 h-4 sm:w-6 sm:h-6 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
                <p id="weather-wind" class="text-xl sm:text-3xl font-extrabold text-white">-- km/h</p>
                <p class="text-slate-400 text-[10px] sm:text-xs mt-1">Safe for Berthing</p>
            </div>
            <div class="bg-slate-800/60 border border-slate-700/80 rounded-2xl p-3.5 sm:p-6 backdrop-blur-md">
                <div class="flex items-center justify-between text-slate-400 mb-2 sm:mb-4">
                    <span class="text-[11px] sm:text-sm font-semibold uppercase tracking-wider">Humidity</span>
                    <svg class="w-4 h-4 sm:w-6 sm:h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </div>
                <p id="weather-humidity" class="text-xl sm:text-3xl font-extrabold text-white">-- %</p>
                <p class="text-slate-400 text-[10px] sm:text-xs mt-1">Atmospheric Moisture</p>
            </div>
            <div class="bg-slate-800/60 border border-slate-700/80 rounded-2xl p-3.5 sm:p-6 backdrop-blur-md">
                <div class="flex items-center justify-between text-slate-400 mb-2 sm:mb-4">
                    <span class="text-[11px] sm:text-sm font-semibold uppercase tracking-wider">Berth Status</span>
                    <svg class="w-4 h-4 sm:w-6 sm:h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <p class="text-lg sm:text-2xl font-extrabold text-emerald-400">OPTIMAL</p>
                <p class="text-slate-400 text-[10px] sm:text-xs mt-1">Normal Ro-Ro Condition</p>
            </div>
        </div>

        <h4 class="text-base sm:text-lg font-bold text-slate-200 tracking-tight mb-3">7-Day Weather Forecast</h4>
        <div id="weather-forecast-container" class="flex items-stretch gap-3 overflow-x-auto pb-4 pt-1 snap-x scrollbar-thin scrollbar-thumb-slate-700">
            <div class="text-center py-6 text-slate-400 text-xs w-full">Loading forecast data...</div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function updateRealTimeClock() {
    const now = new Date();
    const options = {
        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
        hour: '2-digit', minute: '2-digit', second: '2-digit', timeZoneName: 'short'
    };
    document.getElementById('live-clock').innerText = now.toLocaleDateString('en-US', options);
}

setInterval(updateRealTimeClock, 1000);
updateRealTimeClock();

function fnGetWeatherDetails(code) {
    if (code === 0) return { icon: '☀️', desc: 'Sunny' };
    if ([1, 2, 3].includes(code)) return { icon: '⛅', desc: 'Partly Cloudy' };
    if ([45, 48].includes(code)) return { icon: '🌫️', desc: 'Foggy' };
    if ([51, 53, 55, 56, 57].includes(code)) return { icon: '🌧️', desc: 'Drizzle' };
    if ([61, 63, 65, 66, 67].includes(code)) return { icon: '🌧️', desc: 'Rain' };
    if ([71, 73, 75, 77].includes(code)) return { icon: '❄️', desc: 'Snow' };
    if ([95, 96, 99].includes(code)) return { icon: '⛈️', desc: 'Thunderstorm' };
    return { icon: '🌤️', desc: 'Fair' };
}

    async function fetchPatimbanWeatherAll() {
        try {
            let response = await fetch('https://api.open-meteo.com/v1/forecast?latitude=-6.23&longitude=107.85&current=temperature_2m,relative_humidity_2m,wind_speed_10m&daily=weathercode,temperature_2m_max,temperature_2m_min,wind_speed_10m_max&timezone=auto');
            let data = await response.json();

        if (data && data.current) {
            document.getElementById('weather-temp').innerText = data.current.temperature_2m + ' °C';
            document.getElementById('weather-wind').innerText = data.current.wind_speed_10m + ' km/h';
            document.getElementById('weather-humidity').innerText = data.current.relative_humidity_2m + ' %';
        }

        if (data && data.daily) {
            let container = document.getElementById('weather-forecast-container');
            container.innerHTML = '';
            const days = data.daily.time;
            
            days.forEach((dateStr, index) => {
                let dateObj = new Date(dateStr);
                let dayName = index === 0 ? 'Today' : dateObj.toLocaleDateString('en-US', { weekday: 'short' });
                let formattedDate = dateObj.toLocaleDateString('en-US', { month: 'numeric', day: 'numeric' });
                
                let maxTemp = Math.round(data.daily.temperature_2m_max[index]);
                let minTemp = Math.round(data.daily.temperature_2m_min[index]);
                let maxWind = Math.round(data.daily.wind_speed_10m_max[index]);
                let wCode = data.daily.weathercode[index];
                let weather = fnGetWeatherDetails(wCode);

                let cardHTML = `
                    <div class="bg-slate-800/70 border ${index === 0 ? 'border-red-500 ring-2 ring-red-500/20' : 'border-slate-700/80'} rounded-2xl p-3.5 flex flex-col items-center justify-between text-center backdrop-blur-md min-w-[130px] sm:min-w-[150px] shrink-0 snap-start transition hover:border-slate-500">
                        <div class="w-full pb-2.5 border-b border-slate-700/60">
                            <p class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-slate-300">${dayName}</p>
                            <p class="text-[10px] text-slate-400 mt-0.5">${formattedDate}</p>
                        </div>
                        <div class="py-3">
                            <span class="text-2xl sm:text-3xl block mb-1">${weather.icon}</span>
                            <span class="text-[10px] sm:text-[11px] text-slate-300 font-medium block">${weather.desc}</span>
                        </div>
                        <div class="w-full space-y-1.5 pt-2 border-t border-slate-700/60 text-xs">
                            <div class="bg-red-500/20 text-red-300 font-bold py-0.5 px-2 rounded text-[11px]">Max: ${maxTemp} °C</div>
                            <div class="bg-amber-500/20 text-amber-300 font-bold py-0.5 px-2 rounded text-[11px]">Min: ${minTemp} °C</div>
                            <div class="text-slate-400 text-[10px] pt-0.5 flex items-center justify-center gap-1">
                                <svg class="w-3 h-3 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                <span>${maxWind} km/h</span>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += cardHTML;
            });
        }
    } catch (error) {
        console.error('Failed to load weather data:', error);
    }
}
fetchPatimbanWeatherAll();
</script>
@endpush

<!-- ═══ 3. WHY PICT ═══ -->
<section class="py-14 sm:py-20 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 relative z-10">
        <div class="max-w-2xl mb-10 sm:mb-14" data-aos="fade-up">
            <div class="index-label mb-4">
                <span class="lbl">Why PICT</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-[#0A2540] tracking-tight font-heading leading-tight">
                Three things a shipping line checks before choosing a terminal
            </h2>
            <p class="mt-3 text-[var(--color-muted)] text-sm sm:text-base leading-relaxed">
                Digital visibility, certified safety, and a location that shortens the distance between the factory and the ship.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 border-t border-[var(--color-line)]">
            <div class="py-8 md:pr-8 md:border-r border-[var(--color-line)]">
                <div class="spec-frame mb-5">
                    <svg class="frame" viewBox="0 0 68 68" fill="none">
                        <path d="M2 15V2H15" stroke="#0A2540" stroke-width="1.4"/>
                        <path d="M53 2H66V15" stroke="#0A2540" stroke-width="1.4"/>
                        <path d="M66 53V66H53" stroke="#0A2540" stroke-width="1.4"/>
                        <path d="M15 66H2V53" stroke="#0A2540" stroke-width="1.4"/>
                    </svg>
                    <div class="icon-wrap">
                        <svg viewBox="0 0 40 40" fill="none" class="w-full h-full">
                            <circle cx="20" cy="20" r="2.4" fill="#0A2540"/>
                            <path d="M20 20V6" stroke="#0A2540" stroke-width="1.3"/>
                            <path d="M12.5 20a7.5 7.5 0 0115 0" stroke="#0A2540" stroke-width="1.3" fill="none"/>
                            <path d="M6.5 20a13.5 13.5 0 0127 0" stroke="#0A2540" stroke-width="1" stroke-dasharray="1.5 3" fill="none"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-[#0A2540] mb-2 font-heading">Smart terminal technology</h3>
                <p class="text-[var(--color-muted)] text-xs sm:text-sm leading-relaxed">
                    A Terminal Management System, automated gate controls, and RFID tracking give operators instant visibility of every vessel and yard position.
                </p>
            </div>
            <div class="py-8 md:px-8 md:border-r border-[var(--color-line)] border-t md:border-t-0">
                <div class="spec-frame mb-5">
                    <svg class="frame" viewBox="0 0 68 68" fill="none">
                        <path d="M2 15V2H15" stroke="#0A2540" stroke-width="1.4"/>
                        <path d="M53 2H66V15" stroke="#0A2540" stroke-width="1.4"/>
                        <path d="M66 53V66H53" stroke="#0A2540" stroke-width="1.4"/>
                        <path d="M15 66H2V53" stroke="#0A2540" stroke-width="1.4"/>
                    </svg>
                    <div class="icon-wrap">
                        <svg viewBox="0 0 40 40" fill="none" class="w-full h-full">
                            <circle cx="20" cy="20" r="13" stroke="#B4232A" stroke-width="1.3"/>
                            <path d="M20 9 L22.6 20 L20 31 L17.4 20 Z" stroke="#B4232A" stroke-width="1.1" fill="none"/>
                            <path d="M20 6.5V10M20 30V33.5M7.5 20H11M29 20H32.5" stroke="#B4232A" stroke-width="1.1"/>
                            <circle cx="20" cy="20" r="1.4" fill="#B4232A"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-[#0A2540] mb-2 font-heading">International safety standard</h3>
                <p class="text-[var(--color-muted)] text-xs sm:text-sm leading-relaxed">
                    We hold to the ISPS Code and relevant ISO certifications, with safety protocols that protect personnel and cargo on every shift.
                </p>
            </div>
            <div class="py-8 md:pl-8 border-t md:border-t-0">
                <div class="spec-frame mb-5">
                    <svg class="frame" viewBox="0 0 68 68" fill="none">
                        <path d="M2 15V2H15" stroke="#0A2540" stroke-width="1.4"/>
                        <path d="M53 2H66V15" stroke="#0A2540" stroke-width="1.4"/>
                        <path d="M66 53V66H53" stroke="#0A2540" stroke-width="1.4"/>
                        <path d="M15 66H2V53" stroke="#0A2540" stroke-width="1.4"/>
                    </svg>
                    <div class="icon-wrap">
                        <svg viewBox="0 0 40 40" fill="none" class="w-full h-full">
                            <path d="M6 33H33" stroke="#0A2540" stroke-width="1.3"/>
                            <path d="M10 33V13L25 7" stroke="#0A2540" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                            <path d="M17.5 10.5L29 14.5" stroke="#0A2540" stroke-width="1.3"/>
                            <path d="M25 14.5V23.5" stroke="#0A2540" stroke-width="1" stroke-dasharray="1.4 2.2"/>
                            <rect x="21.5" y="23.5" width="7" height="5.5" stroke="#0A2540" stroke-width="1.1"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-[#0A2540] mb-2 font-heading">Efficient automotive logistics</h3>
                <p class="text-[var(--color-muted)] text-xs sm:text-sm leading-relaxed">
                    Positioned on the north coast of West Java, close to manufacturing hubs and on direct international shipping routes, cutting turnaround time.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 4. TERMINAL OPERATION FLOW (COMPACT & RESPONSIVE) ═══ -->
<section id="operations-flow" class="py-14 sm:py-20 bg-[var(--color-paper)] relative overflow-hidden border-t border-[var(--color-line)]">
    <div class="max-w-7xl mx-auto px-5 sm:px-6">
        <div class="max-w-2xl mb-10 sm:mb-14" data-aos="fade-up">
                        <h2 class="text-2xl sm:text-4xl font-extrabold text-[#0A2540] tracking-tight font-heading leading-tight mt-2">
                Seven stages, from ship arrival to gate-out
            </h2>
            <p class="mt-2.5 text-[var(--color-muted)] text-sm">
                Select a stage below to explore its timing, equipment, safety standard, and assigned division.
            </p>
        </div>

        @php
            $steps = [
                ['title' => 'Ship Arrival', 'time' => '1–2 Hours Prior', 'equip' => 'Vessel Traffic Services (VTS)', 'safety' => 'ISPS Code Compliance', 'div' => 'Marine Operations', 'desc' => 'Coordination with maritime authorities to ensure safe entry into the port limits before docking procedures begin.'],
                ['title' => 'Berthing', 'time' => '45–60 Minutes', 'equip' => 'Tugboats & Mooring Lines', 'safety' => 'Port Safety Clearance', 'div' => 'Harbor Master Team', 'desc' => 'Securing the vessel to the terminal dock using specialized tugs and heavy-duty mooring systems.'],
                ['title' => 'Vehicle Inspection', 'time' => '10 Min / Unit', 'equip' => 'Digital Handheld Scanners', 'safety' => 'Zero-Scratch Protocol', 'div' => 'Quality Assurance', 'desc' => 'Pre-discharge visual and digital scanning of units to document condition and ensure zero damage.'],
                ['title' => 'Ro-Ro Discharge', 'time' => '2–4 Hours Total', 'equip' => 'Hydraulic Ramps & Lashing', 'safety' => 'PPE & Traffic Control', 'div' => 'Stevedoring Division', 'desc' => 'Safe and systematic driving of vehicles from the vessel decks down the ramps into the initial staging area.'],
                ['title' => 'Yard Management', 'time' => 'Immediate Staging', 'equip' => 'Automated Yard Locator (TMS)', 'safety' => 'Speed Limit 20 km/h', 'div' => 'Yard Control Center', 'desc' => 'Routing and parking units in designated zones utilizing our proprietary Terminal Management System.'],
                ['title' => 'Quality Check', 'time' => 'Final Audit', 'equip' => 'High-Resolution Cameras', 'safety' => 'Pre-Delivery Inspection', 'div' => 'Inspection Team', 'desc' => 'Comprehensive post-discharge inspection to verify VIN numbers, accessories, and overall vehicle integrity.'],
                ['title' => 'Distribution', 'time' => 'On-Demand Gate Out', 'equip' => 'Car Carriers / Transporters', 'safety' => 'Gate Security Check', 'div' => 'Logistics & Delivery', 'desc' => 'Loading units onto commercial transporters and finalizing documentation for domestic or international dispatch.']
            ];
        @endphp

        <!-- Timeline Navigation -->
        <div class="relative z-10" data-aos="fade-up" data-aos-delay="100">
            <div class="hidden md:block absolute top-[24px] left-[7%] right-[7%] h-[2px] bg-slate-200 -z-10"></div>
            <div class="flex overflow-x-auto md:grid md:grid-cols-7 gap-3 md:gap-2 pb-4 md:pb-0 hide-scrollbar" id="flow-navigation">
                @foreach($steps as $index => $step)
                <button type="button" 
                        onclick="activateFlowStep({{ $index }})" 
                        class="flow-btn group relative flex flex-col items-center min-w-[100px] md:min-w-0 text-center transition-all duration-300 focus:outline-none"
                        data-index="{{ $index }}">
                    <div class="node-indicator w-11 h-11 md:w-12 md:h-12 rounded-full bg-white border-2 border-slate-200 flex items-center justify-center text-[#0A2540] font-bold text-xs md:text-sm shadow-sm transition-all duration-300 group-hover:border-[#B4232A] group-hover:text-[#B4232A] mb-2.5 relative z-10">
                        0{{ $index + 1 }}
                    </div>
                    <h3 class="text-[#0A2540] font-bold text-xs leading-tight group-hover:text-[#B4232A] transition-colors h-8 flex items-start justify-center">
                        {{ $step['title'] }}
                    </h3>
                    <div class="arrow-indicator opacity-0 transform -translate-y-2 transition-all duration-300 mt-1 text-[#B4232A]">
                        <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                    </div>
                </button>
                @endforeach
            </div>
        </div>

        <!-- Detail Presentation Panel (Compact 2-Column Grid on Mobile) -->
        <div class="mt-6 relative" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white border border-[var(--color-line)] rounded-xl shadow-sm overflow-hidden">
                <div class="p-4 sm:p-6 flex flex-col lg:flex-row gap-4 lg:gap-8 items-center">
                    
                    <!-- Main Title & Desc Area -->
                    <div class="w-full lg:flex-1 border-b lg:border-b-0 lg:border-r border-slate-100 pb-4 lg:pb-0 lg:pr-6">
                        <div class="flex items-center gap-3 lg:block">
                            <span class="text-[#B4232A] font-extrabold text-3xl sm:text-4xl opacity-15 font-heading lg:mb-1" id="detail-number">01</span>
                            <h3 class="text-lg sm:text-2xl font-bold text-[#0A2540] font-heading lg:mb-2" id="detail-title">Ship Arrival</h3>
                        </div>
                        <p class="text-[var(--color-muted)] text-xs sm:text-sm leading-relaxed mt-2 lg:mt-0" id="detail-desc">
                            Coordination with maritime authorities to ensure safe entry into the port limits before docking procedures begin.
                        </p>
                    </div>

                    <!-- Specs Grid (2x2 Grid for Mobile Efficiency) -->
                    <div class="w-full lg:flex-1 grid grid-cols-2 gap-2.5 sm:gap-3">
                        <div class="bg-slate-50 p-2.5 sm:p-3 rounded-lg border border-slate-100">
                            <span class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Est. Time</span>
                            <span class="block text-[#0A2540] text-xs sm:text-sm font-semibold truncate" id="detail-time">1–2 Hours Prior</span>
                        </div>
                        <div class="bg-slate-50 p-2.5 sm:p-3 rounded-lg border border-slate-100">
                            <span class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Equipment</span>
                            <span class="block text-[#0A2540] text-xs sm:text-sm font-semibold truncate" id="detail-equip">Vessel Traffic Services</span>
                        </div>
                        <div class="bg-slate-50 p-2.5 sm:p-3 rounded-lg border border-slate-100">
                            <span class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Safety</span>
                            <span class="block text-[#B4232A] text-xs sm:text-sm font-semibold truncate" id="detail-safety">ISPS Code Compliance</span>
                        </div>
                        <div class="bg-slate-50 p-2.5 sm:p-3 rounded-lg border border-slate-100">
                            <span class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Division</span>
                            <span class="block text-[#0A2540] text-xs sm:text-sm font-semibold truncate" id="detail-div">Marine Operations</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const stepsData = @json($steps);
    const buttons = document.querySelectorAll('.flow-btn');
    const elNum = document.getElementById('detail-number');
    const elTitle = document.getElementById('detail-title');
    const elDesc = document.getElementById('detail-desc');
    const elTime = document.getElementById('detail-time');
    const elEquip = document.getElementById('detail-equip');
    const elSafety = document.getElementById('detail-safety');
    const elDiv = document.getElementById('detail-div');

    window.activateFlowStep = function(index) {
        buttons.forEach(btn => btn.classList.remove('active'));
        const activeBtn = document.querySelector(`.flow-btn[data-index="${index}"]`);
        if(activeBtn) activeBtn.classList.add('active');

        const panel = elTitle.closest('.flex-col');
        const grid = elTime.closest('.grid');
        
        panel.classList.remove('fade-content');
        grid.classList.remove('fade-content');
        void panel.offsetWidth;
        
        const data = stepsData[index];
        elNum.textContent = '0' + (index + 1);
        elTitle.textContent = data.title;
        elDesc.textContent = data.desc;
        elTime.textContent = data.time;
        elEquip.textContent = data.equip;
        elSafety.textContent = data.safety;
        elDiv.textContent = data.div;

        panel.classList.add('fade-content');
        grid.classList.add('fade-content');
    };
    activateFlowStep(0);
});
</script>
@endpush

<!-- ═══ 5. WORLD-CLASS SERVICES ═══ -->
<section class="py-14 sm:py-20 bg-white relative overflow-hidden border-t border-[var(--color-line)]">
    <div class="max-w-7xl mx-auto px-5 sm:px-6">
        <div class="max-w-2xl mb-10 sm:mb-14" data-aos="fade-up">
            <div class="index-label mb-4">
                <span class="lbl">Services</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-[#0A2540] tracking-tight font-heading leading-tight">
                Two capabilities, one terminal
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="group relative h-80 sm:h-[380px] rounded-xl overflow-hidden bg-slate-900">
                <div class="absolute inset-0 bg-cover bg-center transform group-hover:scale-105 transition-transform duration-700" style="background-image: url('{{ secure_asset("assets/images/background.jpeg") }}')"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/35 to-transparent"></div>
                <div class="absolute inset-0 p-6 sm:p-8 flex flex-col justify-end">
                    <span class="text-[11px] font-medium text-white/60 mb-1">Maritime solutions</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-2 font-heading">Ro-Ro vessel handling</h3>
                    <p class="text-slate-200 text-xs sm:text-sm mb-4 max-w-md">
                        Deep-water berth facilities and experienced mooring teams for a fast, safe vessel turnaround.
                    </p>
                    <a href="#contact" class="inline-flex items-center gap-2 text-white font-semibold text-xs sm:text-sm w-fit border-b border-white/40 pb-0.5 group-hover:border-white transition-colors">
                        Learn more
                    </a>
                </div>
            </div>

            <div class="group relative h-80 sm:h-[380px] rounded-xl overflow-hidden bg-slate-900">
                <div class="absolute inset-0 bg-cover bg-center transform group-hover:scale-105 transition-transform duration-700"
                    id="yard-slideshow"
                    data-images="{{ json_encode([
                        secure_asset('assets/images/patimban-yard-1.jpeg'),
                        secure_asset('assets/images/car.jpeg'),
                        secure_asset('assets/images/vessel-5.jpeg'),
                        secure_asset('assets/images/car-4.jpeg')
                    ]) }}"
                    style="background-image: url('{{ secure_asset('assets/images/patimban-yard-1.jpeg') }}');">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/35 to-transparent"></div>
                <div class="absolute inset-0 p-6 sm:p-8 flex flex-col justify-end">
                    <span class="text-[11px] font-medium text-white/60 mb-1">Storage facility</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-2 font-heading">Advanced yard management</h3>
                    <p class="text-slate-200 text-xs sm:text-sm mb-4 max-w-md">
                        High-capacity staging yards with automated tracking, surveillance, and weather protection.
                    </p>
                    <a href="#contact" class="inline-flex items-center gap-2 text-white font-semibold text-xs sm:text-sm w-fit border-b border-white/40 pb-0.5 group-hover:border-white transition-colors">
                        Learn more
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 6. VEHICLE CARGO TYPES ═══ -->
<section class="py-14 sm:py-20 bg-[var(--color-paper)] relative overflow-hidden border-t border-[var(--color-line)]">
    <div class="max-w-7xl mx-auto px-5 sm:px-6">
        <div class="max-w-2xl mb-10 sm:mb-14" data-aos="fade-up">
            <div class="index-label mb-4">
                <span class="lbl">Cargo specifications</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-[#0A2540] tracking-tight font-heading leading-tight">
                Handling protocols by vehicle class
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px bg-[var(--color-line)] border border-[var(--color-line)]">
            <div class="bg-white p-6 sm:p-8">
                <svg viewBox="0 0 48 28" class="w-12 h-auto mb-4" fill="none">
                    <path d="M4 20 Q4 14 10 13 L14 8 Q16 6 20 6 H30 Q34 6 36 9 L40 13 Q44 14 44 20" stroke="#0A2540" stroke-width="1.4" fill="none"/>
                    <path d="M4 20 H44" stroke="#0A2540" stroke-width="1.4"/>
                    <circle cx="13" cy="21" r="3.4" stroke="#0A2540" stroke-width="1.4" fill="#F5F3EE"/>
                    <circle cx="35" cy="21" r="3.4" stroke="#0A2540" stroke-width="1.4" fill="#F5F3EE"/>
                    <path d="M17 8 V13 M31 8 V13" stroke="#0A2540" stroke-width="1"/>
                </svg>
                <h3 class="text-base sm:text-lg font-bold text-[#0A2540] mb-1.5 font-heading">Passenger vehicle</h3>
                <p class="text-[var(--color-muted)] text-xs leading-relaxed mb-4">Sedans, SUVs, MPVs, and electric vehicles handled under scratch-free procedures.</p>
                <span class="text-[11px] font-medium text-[#B4232A]">Light vehicle</span>
            </div>
            <div class="bg-white p-6 sm:p-8">
                <svg viewBox="0 0 48 28" class="w-12 h-auto mb-4" fill="none">
                    <path d="M4 20 V10 H30 L44 16 V20" stroke="#0A2540" stroke-width="1.4" fill="none"/>
                    <path d="M4 20 H44" stroke="#0A2540" stroke-width="1.4"/>
                    <path d="M30 10 V20" stroke="#0A2540" stroke-width="1"/>
                    <circle cx="13" cy="21" r="3.2" stroke="#0A2540" stroke-width="1.4" fill="#F5F3EE"/>
                    <circle cx="37" cy="21" r="3.2" stroke="#0A2540" stroke-width="1.4" fill="#F5F3EE"/>
                </svg>
                <h3 class="text-base sm:text-lg font-bold text-[#0A2540] mb-1.5 font-heading">Bus &amp; truck</h3>
                <p class="text-[var(--color-muted)] text-xs leading-relaxed mb-4">Heavy logistics trucks, industrial chassis, and transport vehicles with reinforced ramp pathways.</p>
                <span class="text-[11px] font-medium text-[#1D4E74]">Commercial</span>
            </div>
            <div class="bg-white p-6 sm:p-8">
                <svg viewBox="0 0 48 28" class="w-12 h-auto mb-4" fill="none">
                    <rect x="6" y="16" width="16" height="8" rx="1" stroke="#0A2540" stroke-width="1.4"/>
                    <path d="M18 16 L30 6 L34 10 L26 16" stroke="#0A2540" stroke-width="1.4" fill="none"/>
                    <path d="M34 10 L40 14 L36 18" stroke="#0A2540" stroke-width="1.4" fill="none"/>
                    <path d="M4 24 H24" stroke="#0A2540" stroke-width="1.4"/>
                    <circle cx="9" cy="24" r="2.4" stroke="#0A2540" stroke-width="1.2"/>
                    <circle cx="19" cy="24" r="2.4" stroke="#0A2540" stroke-width="1.2"/>
                </svg>
                <h3 class="text-base sm:text-lg font-bold text-[#0A2540] mb-1.5 font-heading">Heavy equipment</h3>
                <p class="text-[var(--color-muted)] text-xs leading-relaxed mb-4">Excavators, wheel loaders, and bulldozers destined for mining and agricultural projects.</p>
                <span class="text-[11px] font-medium text-[#B4232A]">Project cargo</span>
            </div>
            <div class="bg-white p-6 sm:p-8">
                <svg viewBox="0 0 40 40" class="w-10 h-auto mb-4" fill="none">
                    <path d="M6 14 L20 8 L34 14 L20 20 Z" stroke="#0A2540" stroke-width="1.4" fill="none"/>
                    <path d="M6 14 V26 L20 32 V20" stroke="#0A2540" stroke-width="1.4" fill="none"/>
                    <path d="M34 14 V26 L20 32" stroke="#0A2540" stroke-width="1.4" fill="none"/>
                    <path d="M13 11 L27 17" stroke="#0A2540" stroke-width="1"/>
                </svg>
                <h3 class="text-base sm:text-lg font-bold text-[#0A2540] mb-1.5 font-heading">General cargo</h3>
                <p class="text-[var(--color-muted)] text-xs leading-relaxed mb-4">Static cargo and non-vehicle shipments managed under standard warehousing procedures.</p>
                <span class="text-[11px] font-medium text-[#1D4E74]">General cargo</span>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 7. OPERATION GALLERY (AUTO-SLIDE & FLEXIBLE INTERACTIVE) ═══ -->
<section id="gallery" class="py-12 sm:py-20 bg-white relative overflow-hidden border-t border-[var(--color-line)]">
    <div class="max-w-7xl mx-auto px-5 sm:px-6">
        <div class="flex items-end justify-between mb-8" data-aos="fade-up">
            <div>
                <div class="index-label mb-2">
                    <span class="lbl">Visual record</span>
                </div>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-[#0A2540] tracking-tight font-heading">
                    Inside the terminal
                </h2>
            </div>
        
        </div>

        @php
            $gallery = [
                ['img' => 'car-1.jpeg', 'title' => 'Ready for Export', 'tag' => 'Staging', 'desc' => 'Vehicles are neatly arranged in the stacking yard before loading onto the vessel.'],
                ['img' => 'car-3.jpeg', 'title' => 'Vehicle Lineup', 'tag' => 'CBU Units', 'desc' => 'A thorough physical inspection process to ensure factory quality standards are met.'],
                ['img' => 'car-5.jpeg', 'title' => 'Quality Check', 'tag' => 'Inspection', 'desc' => 'Final audit before vehicles are cleared to proceed to the distribution line.'],
                ['img' => 'vessel-1.jpeg', 'title' => 'Port Activity', 'tag' => 'Terminal Area', 'desc' => 'Vehicle loading and unloading activities in the berth area under strict supervision.'],
                ['img' => 'vessel-2.jpeg', 'title' => 'Vessel Berthing', 'tag' => 'Ro-Ro Ship', 'desc' => 'The transport vessel is securely docked at the deep-water berth facility.'],
                ['img' => 'vessel-3.jpeg', 'title' => 'Ramp Loading', 'tag' => 'Logistics', 'desc' => 'Vehicles are loaded onto the ship through a specialized Ro-Ro hydraulic ramp.'],
            ];
        @endphp

        <!-- Container Slider Berita -->
        <div id="news-gallery-slider" class="flex items-stretch gap-4 sm:gap-6 overflow-x-auto pb-4 pt-1 snap-x scrollbar-thin hide-scrollbar" data-aos="fade-up" data-aos-delay="100">
            @foreach($gallery as $index => $item)
            <div class="gallery-card group relative bg-white border border-[var(--color-line)] rounded-xl overflow-hidden min-w-[280px] sm:min-w-[340px] max-w-[340px] flex-shrink-0 snap-start flex flex-col shadow-sm hover:shadow-md transition-shadow cursor-pointer" onclick="pauseAutoSlideAndFocus({{ $index }})">
                <div class="relative h-48 sm:h-52 overflow-hidden bg-slate-900">
                    <img src="{{ secure_asset('assets/images/' . $item['img']) }}" alt="{{ $item['title'] }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute top-3 left-3 bg-slate-900/80 backdrop-blur-md px-2.5 py-1 rounded text-[10px] font-semibold text-white uppercase tracking-wider">
                        {{ $item['tag'] }}
                    </div>
                </div>
                <div class="p-4 sm:p-5 flex flex-col justify-between flex-grow">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-[#0A2540] font-heading mb-1.5 group-hover:text-[#B4232A] transition-colors line-clamp-1">{{ $item['title'] }}</h3>
                        <p class="text-[var(--color-muted)] text-xs leading-relaxed line-clamp-2">{{ $item['desc'] }}</p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] font-semibold text-[#1D4E74]">
                        <span>PICT Documentation</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
let galleryInterval = null;
let resumeTimeout = null;
let isAutoSlideActive = true;

function startAutoGallerySlide() {
    const slider = document.getElementById('news-gallery-slider');
    if (!slider) return;

    galleryInterval = setInterval(() => {
        if (!isAutoSlideActive) return;

        const card = slider.querySelector('.gallery-card');
        if (!card) return;
        
        const cardWidth = card.offsetWidth + 24; // Lebar kartu + gap
        const maxScrollLeft = slider.scrollWidth - slider.clientWidth;

        if (slider.scrollLeft >= maxScrollLeft - 10) {
            slider.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            slider.scrollBy({ left: cardWidth, behavior: 'smooth' });
        }
    }, 3500); // Geser otomatis setiap 3.5 detik
}

function pauseAutoSlideAndFocus(index) {
    isAutoSlideActive = false; // Jeda sementara saat diklik
    
    const statusText = document.getElementById('slider-status');
    if (statusText) {
        statusText.innerHTML = '<span class="w-2 h-2 rounded-full bg-amber-500"></span> Paused (Interacted)';
    }

    const slider = document.getElementById('news-gallery-slider');
    const cards = slider.querySelectorAll('.gallery-card');
    if (cards[index]) {
        cards[index].scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
    }

    // Batalkan timer resume sebelumnya jika ada (agar tidak bentrok)
    clearTimeout(resumeTimeout);

    // Otomatis aktifkan kembali auto-slide setelah 7 detik jika pengguna tidak mengklik lagi
    resumeTimeout = setTimeout(() => {
        isAutoSlideActive = true;
        if (statusText) {
            statusText.innerHTML = '<span class="w-2 h-2 rounded-full bg-emerald-500"></span> Auto-sliding';
        }
    }, 7000); 
}

document.addEventListener('DOMContentLoaded', function() {
    startAutoGallerySlide();

    const slider = document.getElementById('news-gallery-slider');
    if (slider) {
        // Saat disentuh/digeser manual, jeda sebentar lalu jalan lagi otomatis
        ['mousedown', 'touchstart'].forEach(eventType => {
            slider.addEventListener(eventType, () => {
                isAutoSlideActive = false;
                const statusText = document.getElementById('slider-status');
                if (statusText) {
                    statusText.innerHTML = '<span class="w-2 h-2 rounded-full bg-amber-500"></span> Paused (Interacted)';
                }

                clearTimeout(resumeTimeout);
                resumeTimeout = setTimeout(() => {
                    isAutoSlideActive = true;
                    if (statusText) {
                        statusText.innerHTML = '<span class="w-2 h-2 rounded-full bg-emerald-500"></span> Auto-sliding';
                    }
                }, 7000);
            });
        });
    }
});
</script>
@endpush

<!-- ═══ 8. GLOBAL CONNECTION ═══ -->
<section class="py-14 sm:py-20 bg-[var(--color-paper)] relative overflow-hidden border-t border-[var(--color-line)]">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 relative z-10">
        <div class="max-w-2xl mb-10 sm:mb-14" data-aos="fade-up">
            <div class="index-label mb-4">
                <span class="lbl">Shipping network</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-[#0A2540] tracking-tight font-heading leading-tight">
                Routes from Patimban
            </h2>
        </div>

        <div class="plate rounded-xl overflow-hidden">
            @php
                $routes = [
                    ['country' => 'Japan', 'note' => 'Primary hub'],
                    ['country' => 'Thailand', 'note' => 'Regional route'],
                    ['country' => 'China', 'note' => 'Strategic corridor'],
                    ['country' => 'Asia (regional)', 'note' => 'Export market'],
                ];
            @endphp
            @foreach($routes as $i => $r)
            <div class="flex items-center justify-between px-6 py-4 {{ $i > 0 ? 'border-t border-[var(--color-line)]' : '' }}">
                <div class="flex items-center gap-3">
                    <span class="text-xs text-[var(--color-muted)] w-5">0{{ $i + 1 }}</span>
                    <span class="text-[#0A2540] font-bold font-heading text-base sm:text-lg">{{ $r['country'] }}</span>
                </div>
                <span class="text-xs sm:text-sm text-[#1D4E74] font-medium">{{ $r['note'] }}</span>
            </div>
            @endforeach
            <div class="flex items-center justify-between px-6 py-4 border-t border-[var(--color-line)] bg-[#0A2540]">
                <div class="flex items-center gap-3">
                    <span class="text-xs text-white/50 w-5">05</span>
                    <span class="text-white font-bold font-heading text-base sm:text-lg">Indonesia</span>
                </div>
                <span class="text-xs sm:text-sm text-[#F5C6C6] font-medium">Patimban hub point of origin</span>
            </div>
        </div>
        <p class="text-[var(--color-muted)] text-xs sm:text-sm max-w-2xl mt-6">
            Deep-water berths accommodate the largest global car carriers, keeping international trade and the supply chain moving without interruption.
        </p>
    </div>
</section>

<!-- ═══ 9. CALL TO ACTION ═══ -->
<section id="contact" class="py-16 sm:py-24 relative overflow-hidden bg-[#0A2540]">
    <div class="absolute inset-0 grid-texture opacity-40"></div>
    <div class="max-w-4xl mx-auto px-5 sm:px-6 text-center relative z-10" data-aos="fade-up">
        <div class="index-label justify-center mb-4">
            <span class="lbl text-white/50">Get in touch</span>
        </div>
        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight font-heading mb-4 leading-tight">
            Ready to move your cargo through Patimban?
        </h2>
        <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto mb-8">
            Talk to our commercial and operations team about berth reservation, cargo handling, and long-term partnership.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-3.5">
            <a href="{{ url('/contact') }}" class="px-7 py-3 rounded-md bg-[#B4232A] text-white font-semibold tracking-wide text-xs sm:text-sm hover:bg-[#961c22] transition-colors">
                Contact us
            </a>
            <a href="{{ url('/services') }}" class="px-7 py-3 rounded-md text-white font-semibold tracking-wide text-xs sm:text-sm border border-white/25 hover:border-white/50 transition-colors">
                View services
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 80
    });

    const heroSlideshow = document.getElementById('hero-slideshow');
    if (heroSlideshow) {
        const images = JSON.parse(heroSlideshow.dataset.images);
        let currentIndex = 0;
        images.forEach((imgUrl, index) => {
            const slide = document.createElement('div');
            slide.className = `hero-slide ${index === 0 ? 'active' : ''}`;
            slide.style.backgroundImage = `url('${imgUrl}')`;
            heroSlideshow.appendChild(slide);
        });
        const slides = heroSlideshow.querySelectorAll('.hero-slide');
        if (slides.length > 1) {
            setInterval(() => {
                slides[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % slides.length;
                slides[currentIndex].classList.add('active');
            }, 5000);
        }
    }

    const yardSlideshow = document.getElementById('yard-slideshow');
    if (yardSlideshow) {
        const images = JSON.parse(yardSlideshow.dataset.images);
        let currentImage = 0;
        setInterval(() => {
            currentImage = (currentImage + 1) % images.length;
            yardSlideshow.style.backgroundImage = `url('${images[currentImage]}')`;
        }, 4000);
    }

    const counters = document.querySelectorAll('.counter');
    const speed = 200;
    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText.replace(/,/g, '');
            const inc = target / speed;
            if (count < target) {
                counter.innerText = Math.ceil(count + inc).toLocaleString();
                setTimeout(updateCount, 15);
            } else {
                counter.innerText = target.toLocaleString();
            }
        };
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCount();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        observer.observe(counter);
    });
});
</script>
@endpush