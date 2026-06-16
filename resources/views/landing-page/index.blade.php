@extends('layouts.app')

@vite(['resources/css/landing-page/index.css', 'resources/js/landing-page/index.js'])

@section('content')
    <section class="container">

        <section class="hero-section">
            <header class="header">
                <div>
                    <div class="icon-app">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none">
                            <!-- Gedung kiri -->
                            <rect x="12" y="35" width="20" height="50" rx="2" fill="currentColor" />

                            <!-- Gedung tengah (tertinggi) -->
                            <rect x="38" y="15" width="24" height="70" rx="2" fill="currentColor" />

                            <!-- Gedung kanan -->
                            <rect x="68" y="28" width="20" height="57" rx="2" fill="currentColor" />

                            <!-- Jendela gedung kiri -->
                            <g fill="white">
                                <rect x="17" y="42" width="3" height="3" />
                                <rect x="24" y="42" width="3" height="3" />
                                <rect x="17" y="50" width="3" height="3" />
                                <rect x="24" y="50" width="3" height="3" />

                                <!-- Jendela gedung tengah -->
                                <rect x="44" y="24" width="3" height="3" />
                                <rect x="53" y="24" width="3" height="3" />
                                <rect x="44" y="33" width="3" height="3" />
                                <rect x="53" y="33" width="3" height="3" />
                                <rect x="44" y="42" width="3" height="3" />
                                <rect x="53" y="42" width="3" height="3" />

                                <!-- Jendela gedung kanan -->
                                <rect x="73" y="36" width="3" height="3" />
                                <rect x="80" y="36" width="3" height="3" />
                                <rect x="73" y="44" width="3" height="3" />
                                <rect x="80" y="44" width="3" height="3" />
                            </g>
                        </svg>
                    </div>
                    <strong>Booking</strong>
                </div>

                <nav>
                    @include('landing-page.nav-links')
                </nav>
                <ul class="con-auth">
                    @include('landing-page.btn-auth')
                </ul>


                <div class="hamburger-btn">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2" stroke-linecap="round">
                            <line x1="5" y1="7" x2="19" y2="7" />
                            <line x1="9" y1="12" x2="19" y2="12" />
                            <line x1="13" y1="17" x2="19" y2="17" />
                        </svg>
                    </button>
                </div>

                <section class="container-sidebar">
                    <header>
                        <div>
                            <button class="ham-close">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="9" />
                                    <path d="M8 8L16 16M16 8L8 16" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    </header>

                    <nav class="container-navlink">
                        @include('landing-page.nav-links')
                        <span class="adefwsdw">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none">
                                <!-- Gedung kiri -->
                                <rect x="12" y="35" width="20" height="50" rx="2" fill="currentColor" />

                                <!-- Gedung tengah (tertinggi) -->
                                <rect x="38" y="15" width="24" height="70" rx="2" fill="currentColor" />

                                <!-- Gedung kanan -->
                                <rect x="68" y="28" width="20" height="57" rx="2" fill="currentColor" />

                                <!-- Jendela gedung kiri -->
                                <g fill="white">
                                    <rect x="17" y="42" width="3" height="3" />
                                    <rect x="24" y="42" width="3" height="3" />
                                    <rect x="17" y="50" width="3" height="3" />
                                    <rect x="24" y="50" width="3" height="3" />

                                    <!-- Jendela gedung tengah -->
                                    <rect x="44" y="24" width="3" height="3" />
                                    <rect x="53" y="24" width="3" height="3" />
                                    <rect x="44" y="33" width="3" height="3" />
                                    <rect x="53" y="33" width="3" height="3" />
                                    <rect x="44" y="42" width="3" height="3" />
                                    <rect x="53" y="42" width="3" height="3" />

                                    <!-- Jendela gedung kanan -->
                                    <rect x="73" y="36" width="3" height="3" />
                                    <rect x="80" y="36" width="3" height="3" />
                                    <rect x="73" y="44" width="3" height="3" />
                                    <rect x="80" y="44" width="3" height="3" />
                                </g>
                            </svg>
                        </span>
                    </nav>

                    <section class="container-btn-auth"> @include('landing-page.btn-auth')</section>
                </section>

            </header>

            <div class="hero-banner">
                <img src="{{ asset('images/aula.png') }}" alt="Aula acara" class="hero-image">

                <div class="hero-overlay">
                    <h1>
                        Temukan tempat acara <span class='text-decoration'>terbaik</span>, bandingkan penawaran,
                        dan <span class='text-decoration'>rasakan acara yang sempurna</span> untuk Anda.
                    </h1>
                </div>
            </div>
        </section>

        <section class="feature-section">
            <div class="location">
                <section class="con-text"></section>
                <section class="con-figure">
                    <div>
                        <span>KOTA MADIUN</span>
                        <span>Jawa Timur</span>
                    </div>
                    <div>
                        <img src="{{ asset('images/city.png') }}" alt="city">
                    </div>
                </section>
            </div>
        </section>

    </section>
@endsection
