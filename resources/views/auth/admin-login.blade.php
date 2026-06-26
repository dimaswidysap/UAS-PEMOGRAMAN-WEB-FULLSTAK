@extends('layouts.app')
@vite([
    'resources/css/landing-page/index.css',
    'resources/css/auth/admin-login.css'
])

@section('content')

<main class="login-wrapper">

    <div class="login-card">

        <div class="login-header">
            <h1 class="login-title">Login ke Akun</h1>
            <p class="login-subtitle">
                Silakan login dulu sebelum mengakses ke halaman
            </p>
        </div>

        <form
            class="login-form"
            action="{{ route('admin.login.submit') }}"
            method="POST">
    @csrf

    <div class="form-group">

        <label class="form-label">
            Email
        </label>

    <div class="input-wrapper">

        <i class="bi bi-person-fill left-icon"></i>

        <input
             type="email"
             id="email"
             name="email"
             class="form-input"
             placeholder="Masukkan Email Anda">

    </div>

        @error('email')
             <span class="form-error">
                 {{ $message }}
             </span>
        @enderror

</div>

   <div class="form-group">

        <label class="form-label">
            Password
        </label>

    <div class="input-wrapper">

        <i class="bi bi-lock-fill left-icon"></i>

        <input
            type="password"
            class="form-input"
            id="password"
            name="password"
            placeholder="Masukkan Password">

        <i
           class="bi bi-eye-slash-fill right-icon"
           id="togglePassword">
        </i>

    </div>

        @error('password')
            <span class="form-error">
                {{ $message }}
            </span>
        @enderror
 
</div>

   <div class="form-group">

       <label class="form-label">
           Konfirmasi Password
       </label>

    <div class="input-wrapper">

        <i class="bi bi-lock-fill left-icon"></i>

        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            class="form-input"
            placeholder="Password Anda">

        <i
           class="bi bi-eye-slash-fill right-icon"
           id="toggleConfirmPassword">
        </i>

    </div>

        @error('password_confirmation')
            <span class="form-error">
                {{ $message }}
            </span>
        @enderror

</div>

    <div class="form-actions">

    <button
        type="submit"
        class="btn-primary">

        Masuk

    </button>

</div>

</form>

@if ($errors->any())
    <ul class="error-list">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<script>

const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');

togglePassword.addEventListener('click', function () {

    const type = password.getAttribute('type') === 'password'
        ? 'text'
        : 'password';

    password.setAttribute('type', type);

    this.classList.toggle('bi-eye-fill');
    this.classList.toggle('bi-eye-slash-fill');

});

const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
const confirmPassword = document.getElementById('password_confirmation');

toggleConfirmPassword.addEventListener('click', function () {

    const type = confirmPassword.getAttribute('type') === 'password'
        ? 'text'
        : 'password';

    confirmPassword.setAttribute('type', type);

    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');

});

</script>

@endsection

