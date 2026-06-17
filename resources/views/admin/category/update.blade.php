@extends('layouts.app')

@section('content')

    <h1>Update Kategori Ruangan</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('category-update-submit', $updateCategory->id) }}" method="POST">
        @csrf


        <table>
            <tr>
                <td><label for="name">Nama Kategori</label></td>
                <td>
                    <input type="text" id="name" name="name" value="{{ $updateCategory->name }}" required>
                </td>
            </tr>

            <tr>
                <td><label for="slug">Slug</label></td>
                <td>
                    <input type="text" id="slug" name="slug" value="{{ $updateCategory->slug }}" required>
                </td>
            </tr>

            <tr>
                <td><label for="icon">Icon</label></td>
                <td>
                    <input type="text" id="icon" name="icon" value="{{ $updateCategory->icon }}">
                </td>
            </tr>

            <tr>
                <td><label for="color">Warna</label></td>
                <td>
                    <input type="text" id="color" name="color" value="{{ $updateCategory->color }}">
                </td>
            </tr>

            <tr>
                <td><label for="description">Deskripsi</label></td>
                <td>
                    <textarea id="description" name="description" rows="4" cols="50">{{ $updateCategory->description }}</textarea>
                </td>
            </tr>

            <tr>
                <td><label for="max_booking_days_ahead">Maksimal Booking (Hari)</label></td>
                <td>
                    <input type="number" id="max_booking_days_ahead" name="max_booking_days_ahead"
                        value="{{ $updateCategory->max_booking_days_ahead }}">
                </td>
            </tr>

            <tr>
                <td><label for="max_duration_hours">Maksimal Durasi (Jam)</label></td>
                <td>
                    <input type="number" id="max_duration_hours" name="max_duration_hours"
                        value="{{ $updateCategory->max_duration_hours }}">
                </td>
            </tr>

            <tr>
                <td><label for="min_duration_minutes">Minimal Durasi (Menit)</label></td>
                <td>
                    <input type="number" id="min_duration_minutes" name="min_duration_minutes"
                        value="{{ $updateCategory->min_duration_minutes }}">
                </td>
            </tr>

            <tr>
                <td><label for="requires_approval">Perlu Approval</label></td>
                <td>
                    <select name="requires_approval" id="requires_approval">
                        <option value="1" {{ $updateCategory->requires_approval == 1 ? 'selected' : '' }}>
                            Ya
                        </option>
                        <option value="0" {{ $updateCategory->requires_approval == 0 ? 'selected' : '' }}>
                            Tidak
                        </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="is_active">Status</label></td>
                <td>
                    <select name="is_active" id="is_active">
                        <option value="1" {{ $updateCategory->is_active == 1 ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="0" {{ $updateCategory->is_active == 0 ? 'selected' : '' }}>
                            Tidak Aktif
                        </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="sort_order">Urutan</label></td>
                <td>
                    <input type="number" id="sort_order" name="sort_order" value="{{ $updateCategory->sort_order }}">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit">
                        Update
                    </button>



                    <a href="{{ route('index-category') }}">
                        Batal
                    </a>
                </td>
            </tr>
        </table>



    </form>

@endsection
