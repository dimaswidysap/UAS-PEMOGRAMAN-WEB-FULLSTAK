@extends('layouts.app')

@section('content')
    @vite('resources/css/admin/dashboard/index.css')

    @include('components.navigasi-admin.index')

    <section class="main-container approvals-page">

        <div class="hero-head">
            <div class="hero-deco-line"></div>
            <div class="hero-deco">
                <span></span><span></span><span></span>
            </div>

            <div class="hero-text">
                <p class="eyebrow">Persetujuan Booking</p>
                <h1>Pengajuan Ruangan</h1>
                <p class="subtitle">Tinjau dan kelola permintaan peminjaman ruangan yang masuk.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-card">
            <div class="table-toolbar">
                <span class="table-toolbar-title">Daftar Pengajuan Menunggu Persetujuan</span>
            </div>

            @if($bookings->isEmpty())
                <div class="empty-state">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    <p>Tidak ada pengajuan booking yang perlu disetujui saat ini.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>No. Booking</th>
                                <th>Peminjam</th>
                                <th>Ruangan</th>
                                <th>Tanggal & Waktu</th>
                                <th>Detail Kegiatan</th>
                                <th>Aksi Persetujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>
                                        <span class="booking-number">{{ $booking->booking_number }}</span>
                                        <span class="time-ago">{{ $booking->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td>
                                        <p class="primary-text">{{ $booking->user->name }}</p>
                                        <span class="secondary-text">{{ $booking->user->nim_nip }}</span>
                                    </td>
                                    <td>
                                        <p class="primary-text">{{ $booking->room->name }}</p>
                                        <span class="secondary-text badge-category">{{ $booking->room->category->name }}</span>
                                    </td>
                                    <td>
                                        <div class="schedule-list">
                                            @foreach($booking->slots as $slot)
                                                <div class="schedule-item">
                                                    <span class="schedule-date">{{ \Carbon\Carbon::parse($slot->date)->translatedFormat('d M Y') }}</span>
                                                    <span class="schedule-time">{{ substr($slot->start_time, 0, 5) }} – {{ substr($slot->end_time, 0, 5) }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <p class="purpose-text">{{ $booking->purpose }}</p>
                                        <span class="participant-count">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                            </svg>
                                            {{ $booking->participant_count }} Orang
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-forms">
                                            {{-- Approve Form --}}
                                            <form action="{{ route('admin.booking.approve', $booking->id) }}" method="POST" onsubmit="return confirm('Setujui booking ini?')">
                                                @csrf
                                                <button type="submit" class="btn-action btn-approve" title="Setujui">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <polyline points="20 6 9 17 4 12"/>
                                                    </svg>
                                                    Setujui
                                                </button>
                                            </form>

                                            {{-- Reject Form --}}
                                            <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST" class="reject-form" onsubmit="return confirm('Tolak booking ini?')">
                                                @csrf
                                                <input type="text" name="remarks" class="reject-input" placeholder="Alasan ditolak..." required>
                                                <button type="submit" class="btn-action btn-reject" title="Tolak">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($bookings->hasPages())
                    <div class="pagination-wrapper">
                        {{ $bookings->links() }}
                    </div>
                @endif
            @endif
        </div>
    </section>
@endsection
