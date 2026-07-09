@extends('layouts.app')

@section('content')

    <section class="main-container">
        <h1>Edit User</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('user-update-submit', $user->id) }}" method="POST">
            @csrf

            <table>
                <tr>
                    <td>
                        <label for="name">Nama</label>
                    </td>
                    <td>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="email">Email</label>
                    </td>
                    <td>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="password">Password Baru</label>
                    </td>
                    <td>
                        <input type="password" id="password" name="password">
                        <br>
                        <small>Kosongkan jika tidak ingin mengubah password.</small>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                    </td>
                    <td>
                        <input type="password" id="password_confirmation" name="password_confirmation">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="role">Role</label>
                    </td>
                    <td>
                        <select id="role" name="role">
                            <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>
                                Customer
                            </option>

                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>
                                Employee
                            </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button type="submit">
                            Update
                        </button>

                        <a href="{{ route('user-index') }}">
                            Batal
                        </a>
                    </td>
                </tr>
            </table>
        </form>

        <br>

        <form action="{{ route('destroy-user', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                Hapus User
            </button>
        </form>

    </section>
@endsection
