@extends('layouts.app')
@vite(['resources/css/admin/facilities/create.css'])
@section('content')

    <section class="main-container">
        <div class="page-wrapper">
            <div class="form-container">
                <div class="header-title-wrapper">
                    <h1 class="ui-title">Tambah Fasilitas</h1>
                    <p style="color: #6b7280; font-size: 0.9rem; margin-top: 5px; font-family: sans-serif;">Silakan isi data
                        fasilitas baru di bawah ini</p>
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

                <form action="{{ route('facility-create-submit') }}" method="POST" class="form-grid">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">Nama Fasilitas</label>
                        <input type="text" id="name" name="name" class="form-input"
                            placeholder="Masukkan nama fasilitas" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Deskripsi Fasilitas</label>
                        <textarea id="description" name="description" class="form-input form-textarea"
                            placeholder="Jelaskan detail singkat mengenai fasilitas ini..." required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-submit">Simpan Fasilitas</button>
                        <a href="{{ route('facility-index') }}" class="btn-cancel">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
