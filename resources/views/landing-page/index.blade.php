@extends('layouts.app')

@vite(['resources/css/landing-page/index.css', 'resources/js/landing-page/index.js'])

@section('content')

<div class="lp-wrapper">

    {{-- ===== NAVBAR ===== --}}
    <header class="lp-header" id="lp-header">
        <a href="{{ url('/') }}" class="lp-logo">
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
                        <rect x="73" y="36" width="3" height="3" />
                        <rect x="80" y="36" width="3" height="3" />
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
                <a href="{{ url('/') }}" class="lp-logo">
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

    {{-- ===== HERO SECTION ===== --}}
    <section class="hero-section">
        <div class="hero-banner">
            <img
                src="{{ asset('images/aula.png') }}"
                alt="Venue terbaik di Kota Madiun"
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
                    <a href="{{ route('login-page') }}" class="btn-cta-primary">
                        Cari Venue Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"
                            stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                            <path d="M4 10h12M11 5l5 5-5 5" />
                        </svg>
                    </a>
                    <a href="#cara-kerja" class="btn-cta-ghost">Pelajari lebih lanjut</a>
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
                <div class="stat-pill">
                    <span class="stat-num">1.2rb</span>
                    <span class="stat-label">Booking selesai</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== TRUSTED BAR ===== --}}
    <div class="trusted-bar">
        <p class="trusted-label">Dipercaya oleh organisasi di Kota Madiun</p>
        <div class="trusted-logos">
            <span>Pemkot Madiun</span>
            <span>DPRD</span>
            <span>Universitas</span>
            <span>BUMN</span>
            <span>Organisasi NGO</span>
        </div>
    </div>

    {{-- ===== VENUE CARDS ===== --}}
    <section class="venues-section" id="venues">
        <div class="section-header">
            <div>
                <p class="section-eyebrow">Venue unggulan</p>
                <h2 class="section-title">Pilihan terbaik di Madiun</h2>
            </div>
            <a href="{{ route('login-page') }}" class="see-all-link">
                Lihat semua
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"
                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
                    <path d="M4 10h12M11 5l5 5-5 5" />
                </svg>
            </a>
        </div>

        <div class="cards-grid">
            {{-- Card 1 --}}
            <div class="venue-card">
                <div class="card-img">
                    <img src="{{ asset('images/pertemuan.png') }}" alt="Gedung Pertemuan Kota"
                        onerror="this.style.display='none'">
                    <span class="card-badge">Aula</span>
                </div>
                <div class="card-body">
                    <p class="card-name">Gedung Pertemuan Kota</p>
                    <div class="card-meta">
                        <span class="card-stars">★★★★★</span>
                        <span>4.9 · 120 ulasan</span>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">
                            <strong>Rp800rb</strong><span>/hari</span>
                        </div>
                        <a href="{{ route('login-page') }}" class="btn-book">Pesan</a>
                    </div>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="venue-card">
                <div class="card-img">
                    <img src="{{ asset('images/taman.png') }}" alt="Taman Sumber Wangi"
                        onerror="this.style.display='none'">
                    <span class="card-badge">Outdoor</span>
                </div>
                <div class="card-body">
                    <p class="card-name">Taman Sumber Wangi</p>
                    <div class="card-meta">
                        <span class="card-stars">★★★★★</span>
                        <span>4.8 · 84 ulasan</span>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">
                            <strong>Rp350rb</strong><span>/hari</span>
                        </div>
                        <a href="{{ route('login-page') }}" class="btn-book">Pesan</a>
                    </div>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="venue-card">
                <div class="card-img">
                    <img src="{{ asset('images/aula-kampus.png') }}" alt="Aula Kampus Pusat"
                        onerror="this.style.display='none'">
                    <span class="card-badge">Seminar</span>
                </div>
                <div class="card-body">
                    <p class="card-name">Aula Kampus Pusat</p>
                    <div class="card-meta">
                        <span class="card-stars">★★★★☆</span>
                        <span>4.7 · 67 ulasan</span>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">
                            <strong>Rp500rb</strong><span>/hari</span>
                        </div>
                        <a href="{{ route('login-page') }}" class="btn-book">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== HOW IT WORKS ===== --}}
    <section class="how-section" id="cara-kerja">
        <p class="section-eyebrow">Cara kerja</p>
        <h2 class="section-title">Pesan dalam 3 langkah</h2>
        <p class="how-sub">Dari menemukan venue hingga konfirmasi — selesai dalam hitungan menit.</p>

        <div class="steps-grid">
            <div class="step">
                <div class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                        <circle cx="11" cy="11" r="7" />
                        <path d="M21 21l-4-4" />
                    </svg>
                </div>
                <p class="step-label">Langkah 1</p>
                <p class="step-title">Temukan venue</p>
                <p class="step-desc">Cari dan filter venue berdasarkan kapasitas, lokasi, dan fasilitas yang kamu butuhkan.</p>
            </div>
            <div class="step">
                <div class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M16 2v4M8 2v4M3 10h18" />
                        <path d="M9 16l2 2 4-4" />
                    </svg>
                </div>
                <p class="step-label">Langkah 2</p>
                <p class="step-title">Pilih jadwal</p>
                <p class="step-desc">Tentukan tanggal dan durasi acara, lalu konfirmasi ketersediaan secara langsung.</p>
            </div>
            <div class="step">
                <div class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                        <path d="M20 6L9 17l-5-5" />
                    </svg>
                </div>
                <p class="step-label">Langkah 3</p>
                <p class="step-title">Akses terkonfirmasi</p>
                <p class="step-desc">Terima konfirmasi instan dan detail venue langsung ke akun kamu.</p>
            </div>
        </div>
    </section>

    {{-- ===== LOCATION SECTION ===== --}}
    <section class="location-section" id="about">
        <div class="location-inner">
            <div class="location-text">
                <p class="section-eyebrow">Lokasi layanan kami</p>
                <h2 class="location-heading">
                    Melayani seluruh wilayah<br>Kota Madiun
                </h2>
                <p class="location-desc">
                    Kami menghubungkan Anda dengan venue terbaik di Kota Madiun —
                    dari aula modern hingga gedung bersejarah yang penuh karakter.
                </p>
                <div class="location-badge">
                    <span class="badge-city">Kota Madiun</span>
                    <span class="badge-province">Jawa Timur</span>
                </div>
            </div>
            <div class="location-figure">
                <img src="{{ asset('images/city.png') }}" alt="Kota Madiun" class="location-img">
            </div>
        </div>
    </section>

    {{-- ===== TESTIMONIALS ===== --}}
    <section class="testi-section">
        <div class="section-header">
            <div>
                <p class="section-eyebrow">Kata mereka</p>
                <h2 class="section-title">Standar profesional</h2>
            </div>
        </div>
        <div class="testi-grid">
            <div class="testi-card">
                <div class="testi-stars">★★★★★</div>
                <p class="testi-text">
                    Proses booking sangat mudah dan transparan. Venue sesuai ekspektasi,
                    staf responsif. Akan kami gunakan kembali untuk acara berikutnya.
                </p>
                <div class="testi-author">
                    <div class="author-avatar">BW</div>
                    <div>
                        <p class="author-name">Budi Wahyono</p>
                        <p class="author-role">Kepala Dinas, Pemkot Madiun</p>
                    </div>
                </div>
            </div>
            <div class="testi-card">
                <div class="testi-stars">★★★★★</div>
                <p class="testi-text">
                    Platform ini menghemat waktu kami dalam koordinasi venue. Informasi lengkap
                    dan harga tertera jelas — tidak ada biaya tersembunyi.
                </p>
                <div class="testi-author">
                    <div class="author-avatar">RN</div>
                    <div>
                        <p class="author-name">Rini Novitasari</p>
                        <p class="author-role">Event Manager, BUMN Madiun</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CTA SECTION ===== --}}
    <section class="cta-section">
        <h2 class="cta-heading">Siap memesan venue impian kamu?</h2>
        <p class="cta-sub">Bergabung dengan 1.200+ pengguna yang sudah mempercayai platform kami.</p>
        <div class="cta-btns">
            <a href="{{ route('login-page') }}" class="btn-cta-white">Mulai Booking</a>
            <a href="#cara-kerja" class="btn-cta-outline-white">Pelajari lebih lanjut</a>
        </div>
    </section>

    {{-- ===== FOOTER ===== --}}
@include('components.footer.index')
</div>
@endsection
