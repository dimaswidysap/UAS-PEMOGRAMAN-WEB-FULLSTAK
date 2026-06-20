@extends('layouts.app')

@section('content')

<h1>Daftar Fasilitas Ruangan</h1>

<a href="{{ route('facility-create') }}">
    Tambah Fasilitas
</a>

<br><br>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Ruangan</th>
            <th>Nama Fasilitas</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($facilities as $facility)
            <tr>
                <td>{{ $facility->id }}</td>

                <td>{{ $facility->room->name }}</td>

                <td>{{ $facility->name }}</td>

                <td>{{ $facility->quantity }}</td>

                <td>{{ ucfirst($facility->condition) }}</td>

                <td>
                    <a href="{{ route('facility-view', $facility->id) }}">
                        Detail
                    </a>

                    |

                    <a href="{{ route('facility-update-form', $facility->id) }}">
                        Edit
                    </a>

                    |

                    <form action="{{ route('facility-delete', $facility->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">
                    Tidak ada data fasilitas.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
