@extends('layouts.app')

@section('content')

<h1>Tambah Kategori Ruangan</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('category-submit') }}" method="POST">
    @csrf

    <table>
        <tr>
            <td><label for="name">Nama Kategori</label></td>
            <td>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                >
            </td>
        </tr>

        <tr>
            <td><label for="slug">Slug</label></td>
            <td>
                <input
                    type="text"
                    name="slug"
                    id="slug"
                    value="{{ old('slug') }}"
                    required
                >
            </td>
        </tr>

        <tr>
            <td><label for="icon">Icon</label></td>
            <td>
                <input
                    type="text"
                    name="icon"
                    id="icon"
                    value="{{ old('icon') }}"
                >
            </td>
        </tr>

        <tr>
            <td><label for="color">Warna</label></td>
            <td>
                <input
                    type="text"
                    name="color"
                    id="color"
                    value="{{ old('color') }}"
                    placeholder="#3B82F6"
                >
            </td>
        </tr>

        <tr>
            <td><label for="description">Deskripsi</label></td>
            <td>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    cols="50"
                >{{ old('description') }}</textarea>
            </td>
        </tr>

        <tr>
            <td><label for="max_booking_days_ahead">Maksimal Booking (Hari)</label></td>
            <td>
                <input
                    type="number"
                    name="max_booking_days_ahead"
                    id="max_booking_days_ahead"
                    value="{{ old('max_booking_days_ahead') }}"
                >
            </td>
        </tr>

        <tr>
            <td><label for="max_duration_hours">Maksimal Durasi (Jam)</label></td>
            <td>
                <input
                    type="number"
                    name="max_duration_hours"
                    id="max_duration_hours"
                    value="{{ old('max_duration_hours') }}"
                >
            </td>
        </tr>

        <tr>
            <td><label for="min_duration_minutes">Minimal Durasi (Menit)</label></td>
            <td>
                <input
                    type="number"
                    name="min_duration_minutes"
                    id="min_duration_minutes"
                    value="{{ old('min_duration_minutes') }}"
                >
            </td>
        </tr>

        <tr>
            <td><label for="requires_approval">Perlu Approval</label></td>
            <td>
                <select name="requires_approval" id="requires_approval">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </td>
        </tr>

        <tr>
            <td><label for="is_active">Status</label></td>
            <td>
                <select name="is_active" id="is_active">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </td>
        </tr>

        <tr>
            <td><label for="sort_order">Urutan</label></td>
            <td>
                <input
                    type="number"
                    name="sort_order"
                    id="sort_order"
                    value="{{ old('sort_order', 0) }}"
                >
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">
                    Simpan
                </button>

                <a href="{{ route('index-category') }}">
                    Batal
                </a>
            </td>
        </tr>
    </table>

</form>

@endsection
