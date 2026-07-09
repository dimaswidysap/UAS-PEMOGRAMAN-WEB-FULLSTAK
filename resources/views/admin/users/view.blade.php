@extends('layouts.app')

@section('content')
    <section class="main-container">
        <h1>Detail User</h1>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>

            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>

            {{-- <tr>
        <th>Email Terverifikasi</th>
        <td>
            @if ($user->email_verified_at)
                {{ $user->email_verified_at }}
            @else
                Belum terverifikasi
            @endif
        </td>
    </tr> --}}

            <tr>
                <th>Role</th>
                <td>{{ ucfirst($user->role) }}</td>
            </tr>

            {{-- <tr>
        <th>Remember Token</th>
        <td>{{ $user->remember_token ?? '-' }}</td>
    </tr> --}}

            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $user->created_at }}</td>
            </tr>

            <tr>
                <th>Diupdate Pada</th>
                <td>{{ $user->updated_at }}</td>
            </tr>
        </table>

        <br>

        <a href="{{ route('update-user-form', $user->id) }}">
            Edit
        </a>

        |

        <a href="{{ route('user-index') }}">
            Kembali
        </a>
    </section>
@endsection
