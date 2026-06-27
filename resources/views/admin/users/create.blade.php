@extends('layouts.app')

@section('content')
    @include('components.navigasi-admin.index')

    {{-- GAYA CSS DIKUNCI DI SINI: Dijamin langsung rapi di tengah tanpa merubah layout kelompok --}}
    <style>
        .page-wrapper {
            display: flex; 
            justify-content: center; 
            align-items: center; 
            width: 100%; 
            min-height: 85vh; 
            padding: 20px; 
            box-sizing: border-box;
            background-color: #f3f4f6; /* Latar belakang abu-abu terang sesuai halaman login */
        }
        
        .form-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 500px; /* Lebar kartu pas mirip halaman login */
            padding: 2.5rem;
            border-radius: 16px;
            border: 2px solid #d9a036; /* Garis tepi kuning emas */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header-title-wrapper {
            text-align: center;
            margin-bottom: 30px;
        }

        .ui-title {
            font-size: 2rem;
            color: #1e3a8a; /* Biru Navy */
            font-weight: 700;
            margin: 0;
        }

        .ui-underline {
            width: 60px;
            height: 3px;
            background-color: #d9a036;
            margin: 10px auto 0 auto;
            border-radius: 2px;
        }

        .form-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.875rem;
            color: #1f2937;
            text-align: left;
        }

        .form-input {
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 0.95rem;
            background-color: #ffffff;
            color: #1f2937;
            outline: none;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .form-input:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.15);
        }

        .form-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 10px;
        }

        .btn-submit {
            background-color: #1e3a8a;
            color: #ffffff;
            font-weight: 600;
            padding: 14px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            text-align: center;
            font-size: 1rem;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: #172554;
        }

        .btn-cancel {
            background-color: transparent;
            color: #1e3a8a;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #1e3a8a;
            text-decoration: none;
            text-align: center;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .btn-cancel:hover {
            background-color: #f3f4f6;
        }

        .alert-error {
            background-color: #fef2f2;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #ef4444;
            font-size: 0.85rem;
            text-align: left;
        }
    </style>

    {{-- HTML UTAMA --}}
    <div class="page-wrapper">
        <div class="form-container">
            <div class="header-title-wrapper">
                <h1 class="ui-title">Tambah User</h1>
                <p style="color: #6b7280; font-size: 0.9rem; margin-top: 5px; font-family: sans-serif;">Silakan isi data user baru di bawah ini</p>
                <div class="ui-underline"></div>
            </div>

            {{-- Menampilkan Pesan Validasi Error --}}
            @if ($errors->any())
                <div class="alert-error">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('submit-user') }}" method="POST" class="form-grid">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="Masukkan email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Masukkan password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Ulangi password" required>
                </div>

                <div class="form-group">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" name="role" class="form-input" required>
                        <option value="" disabled selected>-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                        <option value="employee">Employee</option>
                        <option value="customer">Customer</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">Simpan</button>
                    <a href="{{ route('user-index') }}" class="btn-cancel">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection