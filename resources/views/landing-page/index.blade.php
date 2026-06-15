@extends('layouts.app')

@vite(['resources/css/landing-page/index.css'])

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

                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Service</a></li>
                </ul>

                <ul class="con-auth">
                    <li>
                        <button class="btn-header">
                            <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <!-- Lingkaran -->
                                    <path d="M7 3.8A10 10 0 1 1 7 20.2" />

                                    <!-- Panah masuk -->
                                    <path d="M2 12h8" />
                                    <path d="M7 7l5 5-5 5" />

                                    <!-- Kepala user -->
                                    <circle cx="15" cy="9" r="2.2" fill="currentColor" stroke="none" />

                                    <!-- Badan user -->
                                    <path
                                        d="M12.8 14.2c0-.8.6-1.4 1.4-1.4h1.6c2.2 0 4.2.8 4.2 2.6v1.4c0 .8-.6 1.4-1.4 1.4h-5.8c-.8 0-1.4-.6-1.4-1.4v-1.2z"
                                        fill="currentColor" stroke="none" />
                                </svg></div>
                            <span>Sign In</span>
                        </button>
                    </li>
                    <li>
                        <button class="btn-header">
                            <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <!-- Pintu -->
                                    <path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8" />

                                    <!-- Panah masuk -->
                                    <path d="M10 12h10" />
                                    <path d="M16 8l4 4-4 4" />
                                </svg></div>
                            <span>Login</span>
                        </button>
                    </li>
                </ul>

            </header>

            <div class="hero-banner">
                <img src="{{ asset('images/aula.png') }}" alt="Aula acara" class="hero-image">

                <div class="hero-overlay">
                    <h1>
                        Temukan tempat acara terbaik, bandingkan penawaran,
                        dan rasakan acara yang sempurna untuk Anda.
                    </h1>
                </div>
            </div>
        </section>

        <section class="feature-section">
            <!-- Content -->
        </section>

    </section>
@endsection
