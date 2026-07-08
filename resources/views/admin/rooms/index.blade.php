@extends('layouts.app')

@vite([
    'resources/css/admin/rooms/create.css',
    'resources/js/admin/rooms/create.js'
])

@section('content')
<section class="room-container">

    <div class="page-header">

        <div class="page-title">

            <h1>Daftar Ruangan</h1>

            <p>
                Kelola seluruh data ruangan yang tersedia.
            </p>

        </div>

        <a href="{{ route('room-create') }}" class="btn-add">
            + Tambah Ruangan
        </a>

    </div>


    <div class="search-box">

        <input
            type="text"
            id="searchRoom"
            placeholder="Cari nama ruangan, gedung, atau kode...">

    </div>
    
    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-number">
                {{ $rooms->count() }}
            </div>

            <div class="stat-title">
                Total Ruangan
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-number">
                {{ $rooms->where('is_active',1)->count() }}
            </div>

            <div class="stat-title">
                Ruangan Aktif
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-number">
                {{ $rooms->sum('capacity') }}
            </div>

            <div class="stat-title">
                Total Kapasitas
            </div>

        </div>

    </div>


    <div class="table-card">

        <table>

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Nama Ruangan</th>

                    <th>Kategori</th>

                    <th>Kode</th>

                    <th>Gedung</th>

                    <th>Lantai</th>

                    <th>Kapasitas</th>

                    <th>Status</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse ($rooms as $room)

                <tr>

                    <td>{{ $room->id }}</td>

                    <td>{{ $room->name }}</td>

                    <td>{{ $room->category->name }}</td>

                    <td>{{ $room->code }}</td>

                    <td>{{ $room->building }}</td>

                    <td>{{ $room->floor }}</td>

                    <td>{{ $room->capacity }}</td>

                    <td>

                        @if($room->is_active)

                            <span class="status available">
                                Aktif
                            </span>

                        @else

                            <span class="status booked">
                                Tidak Aktif
                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="action">

                            <a
                                href="{{ route('room-detail',$room->id) }}"
                                class="view">
                                Detail
                            </a>

                            <a
                                href="{{ route('room-update-form',$room->id) }}"
                                class="edit">
                                Edit
                            </a>

                            <form
                                action="{{ route('destroy-room',$room->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="delete"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="9">

                        Tidak ada data ruangan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</section>
@endsection