@extends('layouts.app')

@vite(['resources/css/landing-page/index.css', 'resources/css/auth/admin-login.css'])

@section('content')
    <section class="main-container">
        <section class="main-container">

            <section class="login-wrapper">
                <div class="login-card">

                    <div class="login-header">
                        <h1 class="login-title">Masuk</h1>
                        <div class="title-line"></div>
                        <p class="login-subtitle">
                            Selamat datang dilogin page admin
                        </p>
                    </div>

                    <form class="login-form" action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="email">
                                EMAIL
                            </label>
                            <div class="input-wrapper">
                                <input type="email" id="email" name="email"
                                    class="form-input @error('email') is-invalid @enderror"
                                    placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <span class="form-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">
                                PASSWORD
                            </label>
                            <div class="input-wrapper">
                                <input type="password" class="form-input @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Masukkan password Anda" required>
                                <i class="bi bi-eye-slash right-icon" id="togglePassword">
                                </i>
                            </div>
                            @error('password')
                                <span class="form-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="remember-wrapper">
                            <label class="remember-label">
                                <input type="checkbox" name="remember" class="remember-checkbox">
                                <span>Ingat saya</span>
                            </label>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                Masuk
                            </button>
                            <a href="{{ route('landing-page') }}" class="btn-secondary">
                                <i class="bi bi-chevron-left"></i> Kembali
                            </a>
                        </div>

                    </form>



                </div>
            </section>

        </section>

        @include('components.footer.index')
        <script>
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                // Toggle attribute type
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle icon classes
                this.classList.toggle('bi-eye');
                this.classList.toggle('bi-eye-slash');
            });
        </script>
    </section>
@endsection
