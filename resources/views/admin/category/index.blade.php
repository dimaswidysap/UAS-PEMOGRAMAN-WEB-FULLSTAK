@extends('layouts.app')

@section('content')
    <h1>Daftar Kategori</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('category-create') }}">Tambah Kategori</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Approval</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataCategory as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>


                    <td>
                        {{ $category->is_active ? 'Aktif' : 'Tidak Aktif' }}
                    </td>
                    <td>
                        {{ $category->requires_approval ? 'Ya' : 'Tidak' }}
                    </td>
                    <td>{{ $category->sort_order }}</td>
                    <td>
                        <a href="{{ route('category-view', $category->id) }}">
                            Detail
                        </a>

                        |

                        <a href="{{ route('category-update', $category->id) }}">
                            Edit
                        </a>
                        |
                        <form action="{{ route('category-destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">
                        Tidak ada data kategori.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
