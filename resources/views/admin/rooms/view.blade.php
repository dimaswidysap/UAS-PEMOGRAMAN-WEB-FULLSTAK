@extends('layouts.app')

@vite([
    'resources/css/admin/rooms/view.css',
    'resources/js/admin/rooms/view.js'
])

@section('content')
@include('components.navigasi-admin.index')

<div class="room-container">

    <div class="card">

        <div class="card-header">

            <div class="card-title">

                <div class="icon-box">
                    🏢
                </div>

                <div>

                    <h2>{{ $view->name }}</h2>

                    <p>
                        Detail informasi ruangan
                    </p>

                </div>

            </div>

            <div class="step">
                Detail
            </div>

        </div>

        <div class="detail-grid">

            <div class="detail-item">
                <span>Kode</span>
                <strong>{{ $view->code }}</strong>
            </div>

            <div class="detail-item">
                <span>Kategori</span>
                <strong>{{ $view->category->name }}</strong>
            </div>

            <div class="detail-item">
                <span>Gedung</span>
                <strong>{{ $view->building }}</strong>
            </div>

            <div class="detail-item">
                <span>Lantai</span>
                <strong>{{ $view->floor }}</strong>
            </div>

            <div class="detail-item">
                <span>Kapasitas</span>
                <strong>{{ $view->capacity }} Orang</strong>
            </div>

            <div class="detail-item">
                <span>Status</span>

                @if($view->is_active)

                    <span class="status available">
                        Aktif
                    </span>

                @else

                    <span class="status booked">
                        Tidak Aktif
                    </span>

                @endif

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-header">

            <div class="card-title">

                <div class="icon-box">
                    📝
                </div>

                <div>

                    <h2>Deskripsi</h2>

                    <p>
                        Informasi tambahan ruangan
                    </p>

                </div>

            </div>

        </div>

        <p class="description">

            {{ $view->description ?: 'Belum ada deskripsi.' }}

        </p>

    </div>

    <div class="card">

        <div class="card-header">

            <div class="card-title">

                <div class="icon-box">
                    🖼️
                </div>

                <div>

                    <h2>Foto Ruangan</h2>

                </div>

            </div>

        </div>

        <img
            class="room-image"
            src="{{ asset('uploads/rooms/'.$view->image) }}"
            alt="{{ $view->name }}">

    </div>

    <div class="footer-action">

        <a
            href="{{ route('index-rooms') }}"
            class="btn-cancel">

            Kembali

        </a>

        <a
            href="{{ route('room-update-form',$view->id) }}"
            class="btn-save">

            Edit Ruangan

        </a>

    </div>

</div>

@endsection
