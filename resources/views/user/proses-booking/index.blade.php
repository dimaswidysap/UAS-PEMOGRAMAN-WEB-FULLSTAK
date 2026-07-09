@extends('layouts.app')
@vite(['resources/css/user/proses-booking/index.css'])
@section('content')


{{-- Header Halaman --}}
<header class="booking-header">
    <div>
        <div class="subtitle">Manajemen Venue</div>
        <h1>Form Booking Ruangan</h1>
        <p>Lengkapi detail di bawah ini untuk mengajukan pemesanan venue.</p>
    </div>
    <a href="{{ route('index-user') }}" class="btn-back">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
    </a>
</header>

<section class="main-container">

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Kartu 1: Info Ruangan --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title-group">
                <div class="icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                </div>
                <div class="card-title-text">
                    <h3>Informasi Dasar Ruangan</h3>
                    <p>Identitas dan deskripsi ruangan yang akan dibooking</p>
                </div>
            </div>
            <div class="step-number">1</div>
        </div>

        <div class="room-preview">
            <img src="{{ $room->image_url }}" alt="{{ $room->name }}">
            <div class="room-details">
                <h4>{{ $room->name }}</h4>
                <p><strong>{{ $room->category->name }}</strong> · {{ $room->building }}, Lantai {{ $room->floor }}</p>
                <p>Kapasitas: {{ $room->capacity }} orang | Jam Operasional: {{ $room->open_time }} – {{ $room->close_time }}</p>

                @if($room->facilities->isNotEmpty())
                    <div class="facility-tags">
                        @foreach($room->facilities as $facility)
                            <span class="facility-tag">{{ $facility->name }} ({{ $facility->quantity }})</span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Form Booking --}}
    <form action="{{ route('proses-booking.store', $room->id) }}" method="POST">
        @csrf

        {{-- Kartu 2: Detail Booking --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title-group">
                    <div class="icon-box blue">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <div class="card-title-text">
                        <h3>Aturan & Jadwal Booking</h3>
                        <p>Tentukan waktu dan detail keperluan pemesanan</p>
                    </div>
                </div>
                <div class="step-number">2</div>
            </div>

            <div class="form-grid">
                {{-- Keperluan --}}
                <div class="form-group full">
                    <label for="purpose">Keperluan <span>*</span></label>
                    <input type="text" id="purpose" name="purpose" value="{{ old('purpose') }}" placeholder="Contoh: Praktikum Pemrograman Web" required>
                    @error('purpose') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Jumlah Peserta --}}
                <div class="form-group">
                    <label for="participant_count">Jumlah Peserta <span>*</span></label>
                    <input type="number" id="participant_count" name="participant_count" value="{{ old('participant_count', 1) }}" min="1" max="{{ $room->capacity }}" required>
                    <small>Maks. {{ $room->capacity }} orang sesuai kapasitas</small>
                    @error('participant_count') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Tanggal --}}
                <div class="form-group">
                    <label for="date">Tanggal <span>*</span></label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}" min="{{ today()->toDateString() }}" max="{{ today()->addDays($room->category->max_booking_days_ahead)->toDateString() }}" required>
                    @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Jam Mulai --}}
                <div class="form-group">
                    <label for="start_time">Jam Mulai <span>*</span></label>
                    <input type="time" id="start_time" name="start_time" value="{{ old('start_time') }}" min="{{ $room->open_time }}" max="{{ $room->close_time }}" required>
                    @error('start_time') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Jam Selesai --}}
                <div class="form-group">
                    <label for="end_time">Jam Selesai <span>*</span></label>
                    <input type="time" id="end_time" name="end_time" value="{{ old('end_time') }}" min="{{ $room->open_time }}" max="{{ $room->close_time }}" required>
                    @error('end_time') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Catatan --}}
                <div class="form-group full">
                    <label for="notes">Catatan Tambahan</label>
                    <textarea id="notes" name="notes" rows="3" placeholder="Opsional, jelaskan jika ada kebutuhan khusus...">{{ old('notes') }}</textarea>
                    @error('notes') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        {{-- Kartu 3: Aksi / Submit --}}
        <div class="card action-bar">
            <button type="submit" class="btn-submit">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                Ajukan Booking
            </button>
            <a href="{{ route('index-user') }}" class="btn-cancel">Batal</a>
        </div>
    </form>

</section>
@endsection
