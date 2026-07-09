@extends('layouts.app')

@section('content')

    @vite(['resources/css/user/pengajuan/index.css'])



    <section class="main-container bookings-page">



        <div class="hero-head">
            <div class="hero-deco-line"></div>
            <div class="hero-deco">
                <span></span><span></span><span></span>
            </div>

            <div class="hero-text">
                <p class="eyebrow">Manajemen Ruangan</p>
                <h1>Daftar Booking</h1>
                <p class="subtitle">Kelola seluruh pengajuan peminjaman ruangan.</p>
            </div>

            {{-- Tombol aksi jika diperlukan --}}
            <a href="{{ route('index-user') }}" class="btn btn-white">
                {{-- <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M5 12h14"/>
                </svg> --}}
                Kembali
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <div class="table-card">
            <div class="table-toolbar">
                <span class="table-toolbar-title">Semua Data Booking</span>
                <div class="search-box">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                    </svg>
                    <input type="text" id="searchInput" placeholder="Cari no booking atau tujuan...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="custom-table" id="bookingsTable">
                    <thead>
                        <tr>
                            <th>No Booking</th>
                            <th>Tujuan</th>
                            <th>Peserta</th>
                            <th>Status</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                        <tr>
                            <td>
                                <span class="booking-number">{{ $booking->booking_number }}</span>
                            </td>
                            <td>
                                <p class="purpose-text">{{ $booking->purpose }}</p>
                                @if($booking->notes)
                                    <span class="notes-text">{{ Str::limit($booking->notes, 30) }}</span>
                                @endif
                            </td>
                            <td>{{ $booking->participant_count }} Orang</td>
                            <td>
                                @php
                                    $statusClass = match(strtolower($booking->status)) {
                                        'pending' => 'badge-pending',
                                        'approved' => 'badge-approved',
                                        'cancelled', 'expired' => 'badge-danger',
                                        default => 'badge-default',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ ucfirst($booking->status) }}</span>
                            </td>
                            <td>
                                <span class="date-cell">{{ \Carbon\Carbon::parse($booking->created_at)->format('d M Y, H:i') }}</span>
                            </td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn" title="Detail">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn danger" title="Batalkan">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <p>Belum ada data booking ruangan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const q = this.value.toLowerCase();
            document.querySelectorAll('#bookingsTable tbody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    </script>
@endsection
