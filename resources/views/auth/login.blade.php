@extends('layouts.app')
@vite(['resources/css/landing-page/index.css', 'resources/css/auth/signup.css', 'resources/css/auth/login.css'])

@section('content')
    <section class="main-container">
        <main class="signup-wrapper">
            <div class="signup-card">

                <div class="signup-header">
                    <h1 class="signup-title">Masuk</h1>
                    <p class="signup-subtitle">Selamat datang kembali</p>
                </div>

                <form class="signup-form" method="POST" action="{{ route('user-login-submit') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="form-alert">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email"
                            class="form-input @error('email') is-error @enderror" placeholder="Masukkan email Anda"
                            value="{{ old('email') }}" autocomplete="email" required>
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password"
                                class="form-input @error('password') is-error @enderror"
                                placeholder="Masukkan password Anda" autocomplete="current-password" required>
                            <button type="button" class="toggle-password" aria-label="Tampilkan password"
                                onclick="togglePassword()">
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-remember">
                        <label class="remember-label">
                            <input type="checkbox" name="remember" id="remember" class="remember-checkbox"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span class="remember-custom"></span>
                            Ingat saya
                        </label>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary">Masuk</button>
                        <a href="{{ route('landing-page') }}" class="btn-back">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </form>

                <p class="signup-login">
                    Belum punya akun?
                    <a href="{{ route('signup-page') }}" class="login-link">Daftar di sini</a>
                </p>

            </div>
        </main>

        @include('components.footer.index')
        <script>
            function togglePassword() {
                const input = document.getElementById('password');
                const icon = document.getElementById('eye-icon');
                const isHidden = input.type === 'password';

                input.type = isHidden ? 'text' : 'password';

                icon.innerHTML = isHidden ?
                    `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
               <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
               <line x1="1" y1="1" x2="23" y2="23"/>` :
                    `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
               <circle cx="12" cy="12" r="3"/>`;
            }
        </script>
    </section>
@endsection
