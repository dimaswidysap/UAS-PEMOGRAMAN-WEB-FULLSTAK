@extends('layouts.app')
@vite(['resources/css/user/booking/index.css', 'resources/css/layouts/index.css'])

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

        </section>

    </section>
@endsection
