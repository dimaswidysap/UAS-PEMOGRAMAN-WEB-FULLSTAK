@extends('layouts.app')
@vite(['resources/css/user/booking/index.css','resources/css/layouts/index.css'])

@section('content')

<section class="room-page">

    <div class="page-title">
        <h1>Temukan Ruangan</h1>
        <div class="line"></div>
        <p>
            Temukan ruangan terbaik untuk rapat, seminar, praktikum, dan berbagai kegiatan lainnya.
        </p>
    </div>

    <section class="container-rooms">

        @forelse ($rooms as $room)

            <section class="container-room">

                <figure class="container-image">

                    @if($room->image)
                        <img src="{{ asset('uploads/rooms/'.$room->image) }}"
                             alt="{{ $room->name }}">
                    @endif

                </figure>

                <div class="container-desc">

                    <h2>{{ $room->name }}</h2>

                    <span class="capacity">
                        👥 {{ $room->capacity }} Orang
                    </span>

                    <p>
                        {{ Str::limit($room->description,100) }}
                    </p>

                </div>

                <a href="{{ route('booking-detail',$room->id) }}"
                    class="btn-booking">

                    Lihat Detail

                </a>

            </section>

        @empty

            <h1>Data ruangan belum tersedia</h1>

        @endforelse

    </section>

</section>

@endsection
