<style>
    .main-clock {
        /* font-family: 'JetBrains Mono', monospace; */
        background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .clock-container {
        font-family: 'JetBrains Mono', monospace;
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        margin-bottom: 24px;
        width: 100%;
        max-width: 800px;
    }

    /* Ultra Premium Background Layers */
    .background-layer {
        position: absolute;
        inset: 0;
    }

    .base-gradient {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #0f172a 0%, #7f1d1d 50%, #0f172a 100%);
    }

    .animated-mesh {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, rgba(220, 38, 38, 0.2) 0%, rgba(249, 115, 22, 0.2) 50%, rgba(234, 179, 8, 0.2) 100%);
        animation: gradient-x 15s ease infinite;
    }

    .radial-overlay-1 {
        position: absolute;
        top: 0;
        left: 0;
        width: 384px;
        height: 384px;
        background: radial-gradient(circle, rgba(239, 68, 68, 0.3) 0%, transparent 70%);
        border-radius: 50%;
        filter: blur(48px);
        animation: pulse-slow 4s ease-in-out infinite;
    }

    .radial-overlay-2 {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 320px;
        height: 320px;
        background: radial-gradient(circle, rgba(249, 115, 22, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        filter: blur(48px);
        animation: pulse-slow 4s ease-in-out infinite;
        animation-delay: 1s;
    }

    .radial-overlay-3 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 256px;
        height: 256px;
        background: radial-gradient(circle, rgba(234, 179, 8, 0.1) 0%, transparent 70%);
        border-radius: 50%;
        filter: blur(32px);
        animation: pulse-slow 4s ease-in-out infinite;
        animation-delay: 2s;
    }

    .noise-texture {
        position: absolute;
        inset: 0;
        opacity: 0.015;
        background-image: radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.15) 1px, transparent 0);
        background-size: 20px 20px;
    }

    /* Floating Particles */
    .particles-container {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    /* Islamic Pattern */
    .islamic-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.05;
        background-image:
            repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255, 255, 255, 0.03) 10px, rgba(255, 255, 255, 0.03) 20px),
            repeating-linear-gradient(-45deg, transparent, transparent 10px, rgba(255, 255, 255, 0.03) 10px, rgba(255, 255, 255, 0.03) 20px);
    }

    /* Main Content */
    .main-content {
        position: relative;
        z-index: 10;
        padding: 40px;
    }

    /* Header Section */
    .header-section {
        text-align: center;
        margin-bottom: 32px;
    }

    .islamic-greeting {
        font-size: 14px;
        font-family: 'Amiri', serif;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 8px;
        letter-spacing: 2px;
    }

    .time-period-indicator {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 16px;
    }

    .period-icon {
        padding: 12px;
        border-radius: 16px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        transform: scale(1);
        transition: all 0.5s ease;
    }

    .period-icon:hover {
        transform: scale(1.1);
    }

    .period-icon svg {
        width: 24px;
        height: 24px;
        color: white;
        filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
    }

    .period-text {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        font-size: 18px;
        letter-spacing: 1px;
    }

    /* Date Display */
    .date-display {
        text-align: center;
        margin-bottom: 40px;
    }

    .date-container {
        display: inline-flex;
        align-items: center;
        gap: 16px;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        padding: 16px 32px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .date-container svg {
        width: 20px;
        height: 20px;
        color: rgba(255, 255, 255, 0.7);
    }

    .date-text {
        color: white;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 1px;
    }

    .date-day {
        color: rgba(255, 255, 255, 0.8);
    }

    .date-full {
        font-weight: 700;
    }

    /* Ultra Premium Time Display */
    .time-display {
        position: relative;
        margin-bottom: 40px;
    }

    .glow-background {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, rgba(239, 68, 68, 0.2) 0%, rgba(249, 115, 22, 0.2) 50%, rgba(234, 179, 8, 0.2) 100%);
        border-radius: 24px;
        filter: blur(32px);
        animation: pulse-glow 3s ease-in-out infinite;
    }

    .time-container {
        position: relative;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(40px);
        border-radius: 24px;
        padding: 32px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .time-components {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 24px;
        flex-wrap: wrap;
    }

    .time-component {
        position: relative;
    }

    .component-glow {
        position: absolute;
        inset: 0;
        border-radius: 16px;
        filter: blur(20px);
        transition: all 0.5s ease;
    }

    .component-glow.hours {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.3) 0%, rgba(249, 115, 22, 0.3) 100%);
    }

    .component-glow.minutes {
        background: linear-gradient(135deg, rgba(249, 115, 22, 0.3) 0%, rgba(234, 179, 8, 0.3) 100%);
    }

    .component-glow.seconds {
        background: linear-gradient(135deg, rgba(234, 179, 8, 0.3) 0%, rgba(239, 68, 68, 0.3) 100%);
    }

    .time-component:hover .component-glow {
        filter: blur(32px);
    }

    .component-box {
        position: relative;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        padding: 24px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .time-number {
        font-size: 64px;
        font-family: 'JetBrains Mono', monospace;
        font-weight: 700;
        color: white;
        letter-spacing: 2px;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
        line-height: 1;
    }

    .time-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.6);
        text-align: center;
        margin-top: 8px;
        font-weight: 500;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .separator {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .separator-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        animation: pulse 2s ease-in-out infinite;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .separator-dot:nth-child(1) {
        background: linear-gradient(45deg, #ef4444, #f97316);
    }

    .separator-dot:nth-child(2) {
        background: linear-gradient(45deg, #f97316, #eab308);
        animation-delay: 0.5s;
    }

    /* Status Indicators */
    .status-indicators {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 24px;
        margin-bottom: 32px;
        flex-wrap: wrap;
    }

    .status-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border-radius: 50px;
        padding: 12px 24px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .live-indicator {
        position: relative;
    }

    .live-ping {
        position: absolute;
        width: 12px;
        height: 12px;
        background: #4ade80;
        border-radius: 50%;
        animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    .live-dot {
        width: 12px;
        height: 12px;
        background: #22c55e;
        border-radius: 50%;
    }

    .status-text {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .status-item svg {
        width: 16px;
        height: 16px;
        color: rgba(255, 255, 255, 0.7);
    }

    .weather-star {
        color: #facc15 !important;
        animation: pulse 2s ease-in-out infinite;
    }

    .timezone-globe {
        animation: spin-slow 8s linear infinite;
    }

    /* Location Info */
    .location-info {
        text-align: center;
    }

    .location-container {
        display: inline-flex;
        align-items: center;
        gap: 16px;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.1) 100%);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        padding: 16px 32px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .location-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .location-item svg {
        width: 16px;
        height: 16px;
    }

    .location-item.village svg {
        color: #ef4444;
    }

    .location-item.timezone svg {
        color: #f97316;
        animation: spin-slow 8s linear infinite;
    }

    .location-text {
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
        font-size: 14px;
    }

    .location-divider {
        width: 1px;
        height: 24px;
        background: rgba(255, 255, 255, 0.2);
    }

    /* Premium Border Effects */
    .border-effects {
        position: absolute;
        inset: 0;
        border-radius: 24px;
        pointer-events: none;
    }

    .animated-border {
        position: absolute;
        inset: 0;
        border-radius: 24px;
        background: linear-gradient(45deg, rgba(239, 68, 68, 0.5), rgba(249, 115, 22, 0.5), rgba(234, 179, 8, 0.5));
        padding: 2px;
        animation: border-spin 8s linear infinite;
    }

    .animated-border::before {
        content: '';
        position: absolute;
        inset: 2px;
        border-radius: 22px;
        background: transparent;
    }

    .corner-accent {
        position: absolute;
        width: 32px;
        height: 32px;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .corner-accent.top-left {
        top: 16px;
        left: 16px;
        border-right: none;
        border-bottom: none;
        border-top-left-radius: 12px;
    }

    .corner-accent.top-right {
        top: 16px;
        right: 16px;
        border-left: none;
        border-bottom: none;
        border-top-right-radius: 12px;
    }

    .corner-accent.bottom-left {
        bottom: 16px;
        left: 16px;
        border-right: none;
        border-top: none;
        border-bottom-left-radius: 12px;
    }

    .corner-accent.bottom-right {
        bottom: 16px;
        right: 16px;
        border-left: none;
        border-top: none;
        border-bottom-right-radius: 12px;
    }

    /* Animations */
    @keyframes gradient-x {

        0%,
        100% {
            transform: translateX(0%);
        }

        50% {
            transform: translateX(100%);
        }
    }

    @keyframes pulse-slow {

        0%,
        100% {
            opacity: 0.3;
            transform: scale(1);
        }

        50% {
            opacity: 0.8;
            transform: scale(1.05);
        }
    }

    @keyframes pulse-glow {

        0%,
        100% {
            opacity: 0.4;
            transform: scale(1);
        }

        50% {
            opacity: 0.8;
            transform: scale(1.02);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.3;
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
            opacity: 0.8;
        }
    }

    @keyframes border-spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes spin-slow {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes ping {

        75%,
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }

        .time-components {
            gap: 16px;
        }

        .time-number {
            font-size: 48px;
        }

        .component-box {
            padding: 16px;
        }

        .status-indicators {
            gap: 12px;
        }

        .location-container {
            flex-direction: column;
            gap: 12px;
        }

        .location-divider {
            width: 24px;
            height: 1px;
        }
    }

    @media (max-width: 480px) {
        .time-number {
            font-size: 36px;
        }

        .component-box {
            padding: 12px;
        }

        .time-components {
            gap: 8px;
        }
    }

    /* Loading Animation */
    .loading {
        display: none;
    }

    .loading.show {
        display: block;
    }

    .loading-container {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        margin-bottom: 24px;
        width: 100%;
        max-width: 800px;
    }

    .loading-bg {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #0f172a 0%, #7f1d1d 50%, #0f172a 100%);
        animation: pulse 2s ease-in-out infinite;
    }

    .loading-content {
        position: relative;
        padding: 48px;
    }

    .loading-skeleton {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        animation: pulse 2s ease-in-out infinite;
    }

    .loading-skeleton.h-8 {
        height: 32px;
        margin-bottom: 16px;
    }

    .loading-skeleton.h-16 {
        height: 64px;
        margin-bottom: 16px;
    }

    .loading-skeleton.h-6 {
        height: 24px;
    }
</style>

<div id="loading" class="loading show">
    <div class="loading-container">
        <div class="loading-bg"></div>
        <div class="loading-content">
            <div class="loading-skeleton h-8"></div>
            <div class="loading-skeleton h-16"></div>
            <div class="loading-skeleton h-6"></div>
        </div>
    </div>
</div>

<div id="clock" class="clock-container" style="display: none;">
    <!-- Background Layers -->
    <div class="background-layer">
        <div class="base-gradient"></div>
        <div class="animated-mesh"></div>
        <div class="radial-overlay-1"></div>
        <div class="radial-overlay-2"></div>
        <div class="radial-overlay-3"></div>
        <div class="noise-texture"></div>
    </div>

    <!-- Floating Particles -->
    <div class="particles-container" id="particles"></div>

    <!-- Islamic Pattern -->
    <div class="islamic-pattern"></div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header Section -->
        <div class="header-section">
            <!-- Islamic Greeting -->
            <div class="islamic-greeting" id="islamicGreeting">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</div>

            <!-- Time Period Indicator -->
            <div class="time-period-indicator">
                <div class="period-icon" id="periodIcon">
                    <svg id="periodSvg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
                <div class="period-text" id="periodText">Selamat Pagi</div>
            </div>
        </div>

        <!-- Date Display -->
        <div class="date-display">
            <div class="date-container">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <div class="date-text">
                    <span class="date-day" id="dayName">Senin</span>,
                    <span class="date-full" id="fullDate">1 Januari 2024</span>
                </div>
            </div>
        </div>

        <!-- Ultra Premium Time Display -->
        <div class="time-display">
            <div class="glow-background"></div>
            <div class="time-container">
                <div class="time-components">
                    <!-- Hours -->
                    <div class="time-component">
                        <div class="component-glow hours"></div>
                        <div class="component-box">
                            <div class="time-number" id="hours">00</div>
                            <div class="time-label">Jam</div>
                        </div>
                    </div>

                    <!-- Separator -->
                    <div class="separator" style="display: none;">
                        <div class="separator-dot"></div>
                        <div class="separator-dot"></div>
                    </div>

                    <!-- Minutes -->
                    <div class="time-component" style="display: none;">
                        <div class="component-glow minutes"></div>
                        <div class="component-box">
                            <div class="time-number" id="minutes">00</div>
                            <div class="time-label">Menit</div>
                        </div>
                    </div>

                    <!-- Separator -->
                    <div class="separator" style="display: none;">
                        <div class="separator-dot"></div>
                        <div class="separator-dot"></div>
                    </div>

                    <!-- Seconds -->
                    <div class="time-component" style="display: none;">
                        <div class="component-glow seconds"></div>
                        <div class="component-box">
                            <div class="time-number" id="seconds">00</div>
                            <div class="time-label">Detik</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Indicators -->
        <div class="status-indicators">
            <!-- Live Indicator -->
            <div class="status-item">
                <div class="live-indicator">
                    <div class="live-ping"></div>
                    <div class="live-dot"></div>
                </div>
                <span class="status-text">Live</span>
            </div>

            <!-- Timezone -->
            <div class="status-item">
                <svg class="timezone-globe" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                    </path>
                </svg>
                <span class="status-text">WIB</span>
            </div>

            <!-- Weather -->
            <div class="status-item">
                <svg class="weather-star" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                    </path>
                </svg>
                <span class="status-text">Cerah</span>
            </div>
        </div>

        <!-- Location Info -->
        <div class="location-info">
            <div class="location-container">
                <div class="location-item village">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="location-text">Desa Tandikek Barat</span>
                </div>
                <div class="location-divider"></div>
                <div class="location-item timezone">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="location-text">Waktu Indonesia Barat</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Premium Border Effects -->
    <div class="border-effects">
        <div class="animated-border"></div>
        <div class="corner-accent top-left"></div>
        <div class="corner-accent top-right"></div>
        <div class="corner-accent bottom-left"></div>
        <div class="corner-accent bottom-right"></div>
    </div>
</div>

<script>
    // Global variables
    let mounted = false;
    let currentTime = new Date();

    // Indonesian day and month names
    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    const months = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    // Time period configurations
    const timePeriods = {
        pagi: {
            period: "Pagi",
            icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 11-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>`,
            gradient: "linear-gradient(135deg, #f59e0b 0%, #f97316 100%)"
        },
        siang: {
            period: "Siang",
            icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>`,
            gradient: "linear-gradient(135deg, #eab308 0%, #f97316 100%)"
        },
        sore: {
            period: "Sore",
            icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>`,
            gradient: "linear-gradient(135deg, #f97316 0%, #ef4444 100%)"
        },
        malam: {
            period: "Malam",
            icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>`,
            gradient: "linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%)"
        }
    };

    // Utility functions
    function formatTime(date) {
        return date.toLocaleTimeString("id-ID", {
            hour12: false,
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit"
        });
    }

    function formatDateIndonesian(date) {
        const dayName = days[date.getDay()];
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return {
            dayName,
            day,
            month,
            year
        };
    }

    function getTimeOfDay(date) {
        const hour = date.getHours();
        if (hour >= 5 && hour < 12) return timePeriods.pagi;
        if (hour >= 12 && hour < 15) return timePeriods.siang;
        if (hour >= 15 && hour < 18) return timePeriods.sore;
        return timePeriods.malam;
    }

    function getIslamicGreeting() {
        return "بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم";
    }

    // Create floating particles
    function createParticles() {
        const particlesContainer = document.getElementById('particles');
        particlesContainer.innerHTML = '';

        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 10 + 's';
            particle.style.animationDuration = (8 + Math.random() * 4) + 's';
            particlesContainer.appendChild(particle);
        }
    }

    // Update clock display
    function updateClock() {
        currentTime = new Date();

        // Update time components
        const timeString = formatTime(currentTime);
        const [hours, minutes, seconds] = timeString.split(':');

        document.getElementById('hours').textContent = hours;
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;

        // Update date
        const dateData = formatDateIndonesian(currentTime);
        document.getElementById('dayName').textContent = dateData.dayName;
        document.getElementById('fullDate').textContent = `${dateData.day} ${dateData.month} ${dateData.year}`;

        // Update time period
        const timeData = getTimeOfDay(currentTime);
        document.getElementById('periodText').textContent = `Selamat ${timeData.period}`;
        document.getElementById('periodSvg').innerHTML = timeData.icon;
        document.getElementById('periodIcon').style.background = timeData.gradient;

        // Update Islamic greeting
        document.getElementById('islamicGreeting').textContent = getIslamicGreeting();
    }

    // Initialize the clock
    function initClock() {
        // Hide loading and show clock
        document.getElementById('loading').classList.remove('show');
        document.getElementById('clock').style.display = 'block';

        // Create particles
        createParticles();

        // Initial update
        updateClock();

        // Set up timer
        setInterval(updateClock, 1000);

        mounted = true;
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Simulate loading time
        setTimeout(initClock, 1500);
    });

    // Handle window resize for responsive particles
    window.addEventListener('resize', function() {
        if (mounted) {
            createParticles();
        }
    });

    // Add some interactive effects
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effects to time components
        const timeComponents = document.querySelectorAll('.time-component');
        timeComponents.forEach(component => {
            component.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });

            component.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Add click effect to status indicators
        const statusItems = document.querySelectorAll('.status-item');
        statusItems.forEach(item => {
            item.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
            });
        });
    });
</script>