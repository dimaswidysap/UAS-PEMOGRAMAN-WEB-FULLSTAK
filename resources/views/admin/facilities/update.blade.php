@extends('layouts.app')
 
@section('content')
    @vite('resources/css/admin/facilities/update.css')
 
    @include('components.navigasi-admin.index')
 
    <section class="main-container">
        <div class="fac-page">
             <div class="hero-head">
                <div class="hero-text">
                    <p class="eyebrow">Manajemen Fasilitas</p>
                    <h1>Edit Fasilitas Ruangan</h1>
                    <p class="subtitle">Perbarui informasi fasilitas yang tersedia di ruangan.</p>
                </div>
                <a href="{{ route('facility-index') }}" class="btn btn-outline">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
 
            <form action="{{ route('facility-update-submit', $update->id) }}" method="POST" class="fac-form">
                @csrf
 
                <div class="card">
                    <div class="step-marker">1</div>
                    <div class="card-head">
                        <div class="card-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="3"/>
                                <path d="M3 9h18"/><path d="M9 21V9"/>
                            </svg>
                        </div>
                        <div>
                            <h2>Informasi Fasilitas</h2>
                            <p>Nama dan jumlah fasilitas ruangan</p>
                        </div>
                    </div>
 
                    <div class="form-grid">
                        <div class="form-group full">
                            <label for="room_id">RUANGAN</label>
                            <select name="room_id" id="room_id" class="form-control">
                                <option value="">Pilih Ruangan</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" {{ $room->id == $update->room_id ? 'selected' : '' }}>
                                        {{ $room->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
 
                        <div class="form-group">
                            <label for="name">NAMA FASILITAS</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ $update->name }}" required
                                placeholder="Contoh: Proyektor">
                            @error('name')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
 
                        <div class="form-group">
                            <label for="quantity">JUMLAH</label>
                            <div class="input-suffix">
                                <input type="number" name="quantity" id="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    value="{{ $update->quantity }}" required min="0">
                                <span>unit</span>
                            </div>
                            @error('quantity')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
 
                <div class="card">
                    <div class="step-marker">2</div>
                    <div class="card-head">
                        <div class="card-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="9"/>
                            </svg>
                        </div>
                        <div>
                            <h2>Kondisi</h2>
                            <p>Status kondisi fasilitas saat ini</p>
                        </div>
                    </div>
 
                    <div class="kondisi-grid">
                        <label class="kondisi-card @if($update->condition == 'Baik') active @endif" id="label-baik">
                            <input type="radio" name="condition" value="Baik" {{ $update->condition == 'Baik' ? 'checked' : '' }}>
                            <div class="kondisi-icon baik">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="9"/>
                                </svg>
                            </div>
                            <strong>Baik</strong>
                            <small>Fasilitas berfungsi normal</small>
                        </label>
 
                        <label class="kondisi-card @if($update->condition == 'Rusak Ringan') active @endif" id="label-rusak-ringan">
                            <input type="radio" name="condition" value="Rusak Ringan" {{ $update->condition == 'Rusak Ringan' ? 'checked' : '' }}>
                            <div class="kondisi-icon rusak-ringan">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 8v4M12 16h.01"/>
                                </svg>
                            </div>
                            <strong>Rusak Ringan</strong>
                            <small>Masih bisa digunakan</small>
                        </label>
 
                        <label class="kondisi-card @if($update->condition == 'Rusak Berat') active @endif" id="label-rusak-berat">
                            <input type="radio" name="condition" value="Rusak Berat" {{ $update->condition == 'Rusak Berat' ? 'checked' : '' }}>
                            <div class="kondisi-icon rusak-berat">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M15 9l-6 6M9 9l6 6"/>
                                </svg>
                            </div>
                            <strong>Rusak Berat</strong>
                            <small>Tidak bisa digunakan</small>
                        </label>
                    </div>
                </div>
 
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12l5 5L20 7"/>
                        </svg>
                        Update Fasilitas
                    </button>
                    <a href="{{ route('facility-index') }}" class="btn btn-ghost">Batal</a>
                </div>
            </form>
 
        </div>
    </section>
 
    <script>
        document.querySelectorAll('.kondisi-card input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.kondisi-card').forEach(c => c.classList.remove('active'));
                radio.closest('.kondisi-card').classList.add('active');
            });
        });
    </script>
 
@endsection
 
