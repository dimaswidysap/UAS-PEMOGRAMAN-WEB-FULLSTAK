@extends('layouts.app')

@section('content')

<h1>Daftar Ruangan</h1>

<a>
    Tambah Ruangan
</a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Ruangan</th>
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

                <td>{{ $room->code }}</td>

                <td>{{ $room->building }}</td>

                <td>{{ $room->floor }}</td>

                <td>{{ $room->capacity }}</td>

                <td>
                    {{ $room->is_active ? 'Aktif' : 'Tidak Aktif' }}
                </td>

                <td>
                    <a >
                        Detail
                    </a>

                    |

                    <a >
                        Edit
                    </a>
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

@endsection
