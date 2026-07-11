@extends('layouts.app')

@section('content')
    @include('components.navigasi-admin.index')
    <section class="main-container">
        <h1>Daftar Ruangan</h1>

        <a href="{{ route('room-create') }}">
            Tambah Ruangan
        </a>


        <table border="1" cellpadding="10" cellspacing="0">
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
                            {{ $room->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </td>

                        <td>
                            <a href="{{ route('room-detail', $room->id) }}">
                                Detail
                            </a>

                            |

                            <a href="{{ route('room-update-form', $room->id) }}">
                                Edit
                            </a>


                            <form action="{{ route('destroy-room', $room->id) }}" method='POST'>

                                @csrf
                                @METHOD('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            Tidak ada data ruangan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
