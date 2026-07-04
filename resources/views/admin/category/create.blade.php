@extends('layouts.app')
@vite(['resources/css/admin/category/create.css', 'resources/css/layouts/index.css'])
@section('content')
    <section class="main-container">
        <div class="cat-page">
            <div class="hero-head">
                <div class="hero-text">
                    <p class="eyebrow">Manajemen Venue</p>
                    <h1>Tambah Kategori Ruangan</h1>
                    <p class="subtitle">Buat kategori baru untuk mengelompokkan ruangan/venue di platform.</p>
                </div>
                <a href="{{ route('index-category') }}" class="btn btn-outline">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                    Kembali
                </a>
            </div>

            @if ($errors->any())

            @endif

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('category-submit') }}" method="POST" class="cat-form" id="catForm">
                @csrf

                <div class="card">
                    <div class="step-marker">1</div>
                    <div class="card-head">
                        <div class="card-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="3" />
                                <path d="M3 9h18" />
                                <path d="M9 21V9" />
                            </svg>
                        </div>
                        <div>
                            <h2>Informasi Dasar</h2>
                            <p>Nama, identitas, dan deskripsi kategori</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">NAMA KATEGORI</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Contoh: Gedung Pertemuan" required>
                            @error('name')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">SLUG</label>
                            <input type="text" name="slug" id="slug"
                                class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"
                                placeholder="gedung-pertemuan" required>
                            @error('slug')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="icon">ICON <span class="optional">(mis. "building")</span></label>
                            <input type="text" name="icon" id="icon"
                                class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon') }}"
                                placeholder="building">
                            @error('icon')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="color">WARNA PENANDA</label>
                            <div class="color-field">
                                <label class="color-swatch-wrap">
                                    <input type="color" id="color_picker" value="{{ old('color', '#3B82F6') }}">
                                    <span class="color-swatch" id="colorSwatch"
                                        style="background: <?= old('color', '#3B82F6') ?>"></span>
                                </label>
                                <input type="text" name="color" id="color"
                                    class="form-control @error('color') is-invalid @enderror"
                                    value="{{ old('color', '#3B82F6') }}" placeholder="#3B82F6">
                            </div>
                            @error('color')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full">
                            <label for="description">DESKRIPSI</label>
                            <textarea name="description" id="description" rows="4"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Jelaskan secara singkat kategori ruangan ini">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="step-marker">2</div>
                    <div class="card-head">
                        <div class="card-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="12" cy="12" r="9" />
                                <path d="M12 7v5l3 3" />
                            </svg>
                        </div>
                        <div>
                            <h2>Aturan Booking</h2>
                            <p>Batasan waktu dan durasi pemesanan</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="max_booking_days_ahead">MAKS. BOOKING DI MUKA (HARI)</label>
                            <div class="input-suffix">
                                <input type="number" name="max_booking_days_ahead" id="max_booking_days_ahead"
                                    class="form-control @error('max_booking_days_ahead') is-invalid @enderror"
                                    value="{{ old('max_booking_days_ahead') }}" placeholder="30" min="0">
                                <span>hari</span>
                            </div>
                            @error('max_booking_days_ahead')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="max_duration_hours">MAKS. DURASI</label>
                            <div class="input-suffix">
                                <input type="number" name="max_duration_hours" id="max_duration_hours"
                                    class="form-control @error('max_duration_hours') is-invalid @enderror"
                                    value="{{ old('max_duration_hours') }}" placeholder="8" min="0">
                                <span>jam</span>
                            </div>
                            @error('max_duration_hours')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="min_duration_minutes">MIN. DURASI</label>
                            <div class="input-suffix">
                                <input type="number" name="min_duration_minutes" id="min_duration_minutes"
                                    class="form-control @error('min_duration_minutes') is-invalid @enderror"
                                    value="{{ old('min_duration_minutes') }}" placeholder="30" min="0">
                                <span>menit</span>
                            </div>
                            @error('min_duration_minutes')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sort_order">URUTAN TAMPIL</label>
                            <input type="number" name="sort_order" id="sort_order"
                                class="form-control @error('sort_order') is-invalid @enderror"
                                value="{{ old('sort_order', 0) }}" min="0">
                            @error('sort_order')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="step-marker">3</div>
                    <div class="card-head">
                        <div class="card-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M9 12l2 2 4-4" />
                                <circle cx="12" cy="12" r="9" />
                            </svg>
                        </div>
                        <div>
                            <h2>Status</h2>
                            <p>Visibilitas dan persetujuan kategori</p>
                        </div>
                    </div>

                    <div class="toggle-grid">
                        <label class="toggle-card">
                            <input type="checkbox" name="requires_approval" value="1"
                                {{ old('requires_approval') == '1' ? 'checked' : '' }}>
                            <span class="toggle-switch"></span>
                            <span class="toggle-text">
                                <strong>Perlu Approval</strong>
                                <small>Booking harus disetujui admin sebelum dikonfirmasi</small>
                            </span>
                        </label>

                        <label class="toggle-card">
                            <input type="checkbox" name="is_active" value="1"
                                {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                            <span class="toggle-switch"></span>
                            <span class="toggle-text">
                                <strong>Aktifkan Kategori</strong>
                                <small>Kategori akan langsung tampil & bisa dipilih</small>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M5 12l5 5L20 7" />
                        </svg>
                        Simpan Kategori
                    </button>
                    <a href="{{ route('index-category') }}" class="btn btn-ghost">Batal</a>
                </div>
            </form>
        </div>

        <script>
            const colorPicker = document.getElementById('color_picker');
            const colorText = document.getElementById('color');
            const colorSwatch = document.getElementById('colorSwatch');

            colorPicker.addEventListener('input', () => {
                colorText.value = colorPicker.value;
                colorSwatch.style.background = colorPicker.value;
            });
            colorText.addEventListener('input', () => {
                if (/^#[0-9A-Fa-f]{6}$/.test(colorText.value)) {
                    colorPicker.value = colorText.value;
                    colorSwatch.style.background = colorText.value;
                }
            });
        </script>
    </section>
@endsection
