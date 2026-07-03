@extends('layouts.app')
@vite(['resources/css/admin/category/update.css'])
@section('content')
    <section class="main-container">
        <form action="{{ route('room-update-submit', $room->id) }}" method="POST" enctype="multipart/form-data"
            class="modern-form">
            @csrf

            <!-- CARD 1 -->
            <div class="section-card">
                <div class="section-header">
                    <div class="section-title">
                        <span class="icon">🏢</span> Informasi Ruangan
                    </div>
                    <div class="step-number">1</div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Ruangan</label>
                        <input type="text" name="name" class="@error('name') is-invalid @enderror"
                            value="{{ old('name', $room->name) }}" placeholder="Contoh: Ruang Meeting Merapi">
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kode Ruangan</label>
                        <input type="text" name="code" class="@error('code') is-invalid @enderror"
                            value="{{ old('code', $room->code) }}" placeholder="Contoh: R-101">
                        @error('code')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category_id" class="@error('category_id') is-invalid @enderror">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}" {{ $room->category_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gedung</label>
                        <input type="text" name="building" class="@error('building') is-invalid @enderror"
                            value="{{ old('building', $room->building) }}" placeholder="Contoh: Gedung A Utama">
                        @error('building')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Lantai</label>
                        <input type="number" name="floor" class="@error('floor') is-invalid @enderror"
                            value="{{ old('floor', $room->floor) }}" placeholder="0">
                        @error('floor')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kapasitas (Orang)</label>
                        <input type="number" name="capacity" class="@error('capacity') is-invalid @enderror"
                            value="{{ old('capacity', $room->capacity) }}" placeholder="0">
                        @error('capacity')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full-width">
                        <label>Deskripsi Ruangan</label>
                        <textarea name="description" rows="4" class="@error('description') is-invalid @enderror"
                            placeholder="Tuliskan fasilitas atau detail ruangan di sini...">{{ old('description', $room->description) }}</textarea>
                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="section-card">
                <div class="section-header">
                    <div class="section-title">
                        <span class="icon">🖼️</span> Gambar Ruangan
                    </div>
                    <div class="step-number">2</div>
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
                                <span class="upload-icon">📤</span>
                                <span class="upload-text">Klik atau seret file gambar ke sini</span>
                            </div>
                        </div>
                        @error('image')
                            <span class="error-message">{{ $message }}</span>
                        @enderror

                        <div class="img-container mt-3" id="previewContainer" style="display:none;">
                            <label class="image-label text-muted">Pratinjau Gambar Baru:</label>
                            <img id="imagePreview" class="preview-image hidden-preview" alt="New Image Preview">
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="section-card">
                <div class="section-header">
                    <div class="section-title">
                        <span class="icon">⚙️</span> Pengaturan Operasional
                    </div>
                    <div class="step-number">3</div>
                </div>

                <div class="form-grid profile-settings">
                    <div class="form-group">
                        <label>Status Ruangan</label>
                        <select name="is_active">
                            <option value="1" {{ $room->is_active ? 'selected' : '' }}>🟢 Aktif (Dapat Dipesan)
                            </option>
                            <option value="0" {{ !$room->is_active ? 'selected' : '' }}>🔴 Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jam Buka</label>
                        <input type="time" name="open_time" class="@error('open_time') is-invalid @enderror"
                            value="{{ old('open_time', $room->open_time) }}">
                        @error('open_time')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jam Tutup</label>
                        <input type="time" name="close_time" class="@error('close_time') is-invalid @enderror"
                            value="{{ old('close_time', $room->close_time) }}">
                        @error('close_time')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- BOTTOM ACTIONS -->
            <div class="bottom-action">
                <a href="{{ route('index-rooms') }}" class="btn-cancel">
                    Batal
                </a>
                <button class="btn-save" type="submit">
                    Simpan Perubahan
                </button>
            </div>
        </form>

        <script>
            // Script untuk memunculkan live preview gambar baru saat di-upload
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

    </section>
@endsection
