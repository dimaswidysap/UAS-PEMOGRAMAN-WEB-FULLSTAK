@extends('layouts.app')

@section('content')
    @vite('resources/css/admin/category/update.css')

    @include('components.navigasi-admin.index')

    <section class="main-container">
        <div class="room-page">
            <div class="hero-head">
                <div class="hero-text">
                    <p class="eyebrow">Manajemen Venue</p>
                    <h1>Edit Ruangan</h1>
                    <p class="subtitle">Perbarui informasi, gambar, dan pengaturan operasional ruangan.</p>
                </div>
                <a href="/admin/category" class="btn btn-outline">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                    Kembali
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Periksa kembali isian Anda:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('category-update-submit', $room->id) }}" method="POST" enctype="multipart/form-data"
                class="room-form">
                @csrf

                <div class="card">
                    <div class="step-badge">1</div>
                    <div class="card-head">
                        <div class="card-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="2" width="16" height="20" rx="1"/>
                                <path d="M9 22v-4h6v4"/>
                                <path d="M8 6h.01M12 6h.01M16 6h.01M8 10h.01M12 10h.01M16 10h.01M8 14h.01M12 14h.01M16 14h.01"/>
                            </svg>
                        </div>
                        <div>
                            <h2>Informasi Ruangan</h2>
                            <p>Nama, identitas, dan detail ruangan</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Nama Ruangan</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $room->name) }}" placeholder="Contoh: Ruang Meeting Merapi">
                            @error('name')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kode Ruangan</label>
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                value="{{ old('code', $room->code) }}" placeholder="Contoh: R-101">
                            @error('code')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}" {{ $room->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gedung</label>
                            <input type="text" name="building" class="form-control @error('building') is-invalid @enderror"
                                value="{{ old('building', $room->building) }}" placeholder="Contoh: Gedung A Utama">
                            @error('building')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Lantai</label>
                            <input type="number" name="floor" class="form-control @error('floor') is-invalid @enderror"
                                value="{{ old('floor', $room->floor) }}" placeholder="0">
                            @error('floor')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kapasitas (Orang)</label>
                            <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror"
                                value="{{ old('capacity', $room->capacity) }}" placeholder="0">
                            @error('capacity')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full">
                            <label>Deskripsi Ruangan</label>
                            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Tuliskan fasilitas atau detail ruangan di sini...">{{ old('description', $room->description) }}</textarea>
                            @error('description')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="step-badge">2</div>
                    <div class="card-head">
                        <div class="card-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <path d="M21 15l-5-5L5 21"/>
                            </svg>
                        </div>
                        <div>
                            <h2>Gambar Ruangan</h2>
                            <p>Foto tampilan ruangan untuk ditampilkan ke pengguna</p>
                        </div>
                    </div>

                    <div class="image-wrapper">
                        <div class="image-box">
                            <label class="image-label">Gambar Saat Ini</label>
                            <div class="img-container">
                                <img src="{{ asset('uploads/rooms/' . $room->image) }}" class="preview-image"
                                    alt="Current Room Image">
                            </div>
                        </div>

                        <div class="image-box">
                            <label class="image-label">Upload Gambar Baru</label>
                            <div class="file-upload-wrapper">
                                <input type="file" name="image" id="imageInput" accept="image/*"
                                    class="@error('image') is-invalid @enderror">
                                <div class="file-upload-design">
                                    <span class="upload-icon">
                                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 15V3"/>
                                            <path d="M8 7l4-4 4 4"/>
                                            <path d="M4 17v2a2 2 0 002 2h12a2 2 0 002-2v-2"/>
                                        </svg>
                                    </span>
                                    <span class="upload-text">Klik atau seret file gambar ke sini</span>
                                </div>
                            </div>
                            @error('image')
                                <span class="error-text">{{ $message }}</span>
                            @enderror

                            <div class="img-container mt-3" id="previewContainer" style="display:none;">
                                <label class="image-label">Pratinjau Gambar Baru:</label>
                                <img id="imagePreview" class="preview-image" alt="New Image Preview">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="step-badge">3</div>
                    <div class="card-head">
                        <div class="card-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 005 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06A1.65 1.65 0 009 4.6a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09A1.65 1.65 0 0015 4.6a1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
                            </svg>
                        </div>
                        <div>
                            <h2>Pengaturan Operasional</h2>
                            <p>Jam layanan dan status ketersediaan ruangan</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Jam Buka</label>
                            <input type="time" name="open_time" class="form-control @error('open_time') is-invalid @enderror"
                                value="{{ old('open_time', $room->open_time) }}">
                            @error('open_time')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jam Tutup</label>
                            <input type="time" name="close_time" class="form-control @error('close_time') is-invalid @enderror"
                                value="{{ old('close_time', $room->close_time) }}">
                            @error('close_time')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="switch-grid">
                        <label class="switch-card">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $room->is_active) ? 'checked' : '' }}>
                            <span class="switch-track"><span class="switch-thumb"></span></span>
                            <span class="switch-text">
                                <strong>Aktifkan Ruangan</strong>
                                <small>Ruangan dapat dipesan oleh pengguna</small>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12l5 5L20 7"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('index-rooms') }}" class="btn btn-ghost">Batal</a>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const container = document.getElementById('previewContainer');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                container.style.display = 'none';
            }
        });
    </script>
@endsection
