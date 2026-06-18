@extends('layouts.app')

@vite(['resources/css/landing-page/index.css', 'resources/js/landing-page/index.js'])

@section('content')

<div class="lp-wrapper">

    {{-- ===== HERO SECTION ===== --}}
    <section class="hero-section">

        {{-- Navbar --}}
        <header class="lp-header">
            <a  class="lp-logo">
                <div class="lp-logo-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none">
                        <rect x="12" y="35" width="20" height="50" rx="2" fill="currentColor" />
                        <rect x="38" y="15" width="24" height="70" rx="2" fill="currentColor" />
                        <rect x="68" y="28" width="20" height="57" rx="2" fill="currentColor" />
                        <g fill="white" opacity="0.65">
                            <rect x="17" y="42" width="3" height="3" />
                            <rect x="24" y="42" width="3" height="3" />
                            <rect x="17" y="50" width="3" height="3" />
                            <rect x="24" y="50" width="3" height="3" />
                            <rect x="44" y="24" width="3" height="3" />
                            <rect x="53" y="24" width="3" height="3" />
                            <rect x="44" y="33" width="3" height="3" />
                            <rect x="53" y="33" width="3" height="3" />
                            <rect x="44" y="42" width="3" height="3" />
                            <rect x="53" y="42" width="3" height="3" />
                            <rect x="73" y="36" width="3" height="3" />
                            <rect x="80" y="36" width="3" height="3" />
                            <rect x="73" y="44" width="3" height="3" />
                            <rect x="80" y="44" width="3" height="3" />
                        </g>
                    </svg>
                </div>
                <strong>Booking</strong>
            </a>

            <nav class="lp-nav">
                @include('landing-page.nav-links')
            </nav>

            <ul class="lp-auth-desktop">
                @include('landing-page.btn-auth')
            </ul>

            {{-- Hamburger --}}
            <button class="hamburger-btn" aria-label="Buka menu" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                    <line x1="5" y1="7" x2="19" y2="7" />
                    <line x1="9" y1="12" x2="19" y2="12" />
                    <line x1="13" y1="17" x2="19" y2="17" />
                </svg>
            </button>

            {{-- Mobile Sidebar --}}
            <div class="sidebar-overlay"></div>
            <aside class="sidebar">
                <div class="sidebar-header">
                    <a  class="lp-logo">
                        <div class="lp-logo-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none">
                                <rect x="12" y="35" width="20" height="50" rx="2" fill="currentColor" />
                                <rect x="38" y="15" width="24" height="70" rx="2" fill="currentColor" />
                                <rect x="68" y="28" width="20" height="57" rx="2" fill="currentColor" />
                            </svg>
                        </div>
                        <strong>Booking</strong>
                    </a>
                    <button class="sidebar-close" aria-label="Tutup menu">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round">
                            <path d="M18 6L6 18M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <nav class="sidebar-nav">
                    @include('landing-page.nav-links')
                </nav>
                <div class="sidebar-auth">
                    @include('landing-page.btn-auth')
                </div>
            </aside>
        </header>

        {{-- Hero Banner --}}
        <div class="hero-banner">
            <img
                src="{{ asset('images/aula.png') }}"
                alt="Aula acara terbaik di Kota Madiun"
                class="hero-image"
            >
            <div class="hero-overlay"></div>

            <div class="hero-content">
                <span class="hero-eyebrow">
                    <span class="eyebrow-dot"></span>
                    Platform Venue Kota Madiun
                </span>
                <h1 class="hero-heading">
                    Temukan tempat acara
                    <em>terbaik</em>, rasakan
                    momen yang <em>sempurna</em>
                </h1>
                <p class="hero-sub">
                    Bandingkan penawaran venue terpercaya dan pesan dengan mudah —
                    semua dalam satu platform.
                </p>
                <div class="hero-cta-row">
                    <a href='{{ route('login-page') }}' class="btn-cta-primary">
                        Cari Venue Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round">
                            <path d="M4 10h12M11 5l5 5-5 5" />
                        </svg>
                    </a>
                    <a href="#about" class="btn-cta-ghost">Pelajari lebih lanjut</a>
                </div>
            </div>

            <div class="hero-stats">
                <div class="stat-pill">
                    <span class="stat-num">200+</span>
                    <span class="stat-label">Venue aktif</span>
                </div>
                <div class="stat-pill">
                    <span class="stat-num">4.9★</span>
                    <span class="stat-label">Rating pengguna</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== LOCATION SECTION ===== --}}
    <section class="location-section" id="about">
        <div class="location-inner">
            <div class="location-text">
                <p class="section-label">Lokasi layanan kami</p>
                <h2 class="location-heading">
                    Melayani seluruh wilayah<br>Kota Madiun
                </h2>
                <p class="location-desc">
                    Kami menghubungkan Anda dengan venue terbaik di Kota Madiun —
                    dari aula modern hingga gedung bersejarah yang penuh karakter.
                </p>
                <div class="location-badge">
                    <span class="location-city">Kota Madiun</span>
                    <span class="location-province">Jawa Timur</span>
                </div>
            </div>
            <div class="location-figure">
                <img src="{{ asset('images/city.png') }}" alt="Kota Madiun" class="location-img">
            </div>
        </div>
    </section>

</div>

@endsection
