@extends('layouts.app')
@vite(['resources/css/user/booking/view.css','resources/css/layouts/index.css'])

@section('content')

<div class="room-detail">

    <div class="room-image-card">
        @if ($room->image)
            <img src="{{ asset('uploads/rooms/' . $room->image) }}"
                 alt="{{ $room->name }}">
        @else
            <h2 style="font-family: var(--font-primary);">Gambar belum tersedia</h2>
        @endif
    </div>


    <div class="room-info-card">

        <div class="title-section">
            <h1>{{ $room->name }}</h1>
            <div class="line"></div>
            <p>{{ $room->description }}</p>
        </div>


        <div class="detail-card">

            <h2>Informasi Ruangan</h2>

            <div class="detail-grid">
                <div>
                    <span>Gedung</span>
                    <strong>{{ $room->building }}</strong>
                </div>

                <div>
                    <span>Lantai</span>
                    <strong>{{ $room->floor }}</strong>
                </div>

                <div>
                    <span>Kapasitas</span>
                    <strong>{{ $room->capacity }} Orang</strong>
                </div>

                <div>
                    <span>Jam Operasional</span>
                    <strong>{{ $room->open_time }} - {{ $room->close_time }}</strong>
                </div>
            </div>

        </div>


        <div class="facility-card">

            <h2>Fasilitas Ruangan</h2>

            <table>
                <thead>
                    <tr>
                        <th>Fasilitas</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($room->facilities as $facility)
                    <tr>
                        <td>{{ $facility->name }}</td>
                        <td>{{ $facility->quantity }}</td>
                        <td>{{ $facility->condition }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


        <div class="button-group">
            <a href="#" class="booking-btn">
                Pesan Ruangan
            </a>

            <a href="{{ route('index-user') }}" class="back-btn">
                Kembali
            </a>
        </div>

    </div>

</div>

@endsection
