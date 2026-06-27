@extends('layouts.app')

{{-- Memanggil file CSS kustom via Vite --}}
@vite(['resources/css/admin/user/create-user.css'])

@section('content')
    @include('components.navigasi-admin.index')

    <div class="form-container">
        <div class="header-title-wrapper">
            <h1 class="ui-title">Tambah User</h1>
            <div class="ui-underline"></div>
        </div>

        {{-- Pesan Error Validasi Bantuan --}}
        @if ($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form disesuaikan pas dengan gambar kamu --}}
        <form action="#" method="POST" class="form-grid">
            @csrf

            <!-- Nama -->
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama" value="{{ old('name') }}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="Masukkan email" value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Masukkan password" required>
            </div>

            <!-- Konfirmasi Password -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Ulangi password" required>
            </div>

            <!-- Role -->
            <div class="form-group full-width">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-input" required>
                    <option value="" disabled selected>-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <!-- Tombol Aksi -->
            <div class="form-actions full-width">
                <button type="submit" class="btn-submit">Simpan</button>
                <a href="#" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
@endsection