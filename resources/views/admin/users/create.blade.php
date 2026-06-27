@extends('layouts.app')

@section('content')

<h1>Tambah User</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('submit-user') }}" method="POST">
    @csrf

    <table>
        <tr>
            <td>
                <label for="name">Nama</label>
            </td>
            <td>
                <input
                    type="text"
                    id="name"
                    name="name"
                    required
                >
            </td>
        </tr>

        <tr>
            <td>
                <label for="email">Email</label>
            </td>
            <td>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                >
            </td>
        </tr>

        <tr>
            <td>
                <label for="password">Password</label>
            </td>
            <td>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >
            </td>
        </tr>

        <tr>
            <td>
                <label for="password_confirmation">Konfirmasi Password</label>
            </td>
            <td>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                >
            </td>
        </tr>

        <tr>
            <td>
                <label for="role">Role</label>
            </td>
            <td>
                <select id="role" name="role" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">
                    Simpan
                </button>

                <a href="{{ route('user-index') }}">
                    Batal
                </a>
            </td>
        </tr>
    </table>

</form>

@endsection
