@extends('layouts.app')
@vite(['resources/css/user/booking/index.css', 'resources/css/layouts/index.css', 'resources/js/user/booking/index.js'])

@section('content')
    @include('components.navigasi-user.index')
    <section class="room-page">


        <section class="container-rooms">

            @forelse ($rooms as $room)
                <section class="container-room">

                    <figure class="container-image">

                        @if ($room->image)
                            <img src="{{ asset('uploads/rooms/' . $room->image) }}" alt="{{ $room->name }}">
                        @endif

                    </figure>

                    <div class="container-desc">

                        <h2>{{ $room->name }}</h2>

                        <span class="capacity">
                            <span class="nnaowm">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <!-- Kepala pengguna utama -->
                                    <circle cx="9" cy="8" r="3"></circle>

                                    <!-- Kepala pengguna kedua -->
                                    <circle cx="17" cy="10" r="2.5"></circle>

                                    <!-- Badan pengguna utama -->
                                    <path d="M3 19c0-3.3 2.7-6 6-6s6 2.7 6 6"></path>

                                    <!-- Badan pengguna kedua -->
                                    <path d="M14 19c0-2.2 1.8-4 4-4s4 1.8 4 4"></path>
                                </svg>
                            </span>
                            {{ $room->capacity }} Orang
                        </span>

                        <p>
                            {{ Str::limit($room->description, 100) }}
                        </p>

                    </div>

                    <a href="{{ route('booking-detail', $room->id) }}" class="btn-booking">

                        Lihat Detail

                    </a>

                </section>

            @empty
                <h1>Data ruangan belum tersedia</h1>
            @endforelse

            <!-- Berikan ID agar mudah dipanggil di JavaScript -->
            <div id="no-match-message" class="no-match-message">
                <div class="no-match-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                        <!-- Lingkaran kaca pembesar -->
                        <circle cx="11" cy="11" r="7"></circle>

                        <!-- Gagang -->
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>

                        <!-- Tanda X -->
                        <line x1="8.5" y1="8.5" x2="13.5" y2="13.5"></line>
                        <line x1="13.5" y1="8.5" x2="8.5" y2="13.5"></line>
                    </svg>
                </div>

                <h3>Ruangan Tidak Ditemukan</h3>

                <p>
                    Maaf, ruangan yang Anda cari tidak tersedia.
                </p>

                <span>
                    Coba gunakan kata kunci yang berbeda atau periksa kembali ejaannya.
                </span>
            </div>
        </section>

    </section>
@endsection
