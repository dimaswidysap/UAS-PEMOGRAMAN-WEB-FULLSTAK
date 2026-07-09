@extends('layouts.app')

@section('content')
    @vite([
        'resources/css/admin/user/index.css',
        'resources/js/admin/user/index.js'
    ])
    @include('components.navigasi-admin.index')
    <section class="main-container">
        <h1>Daftar User</h1>

        <a href="{{ route('user-create-form') }}">
            Tambah User
        </a>

        <br><br>

        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>{{ ucfirst($user->role) }}</td>

                        <td>{{ $user->created_at }}</td>

                        <td>
                            <a href="{{ route('user-view', $user->id) }}">
                                Detail
                            </a>

                            |

                            <a href="{{ route('update-user-form', $user->id) }}">
                                Edit
                            </a>
                            |
                            <form action="{{ route('destroy-user', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                    Hapus User
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            Tidak ada data user.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
