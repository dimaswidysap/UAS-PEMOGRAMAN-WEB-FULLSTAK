@extends('layouts.app')

@section('content')

<h1>Edit Fasilitas Ruangan</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('facility-update-submit', $update->id) }}" method="POST">
    @csrf

    <table>
        <tr>
            <td>
                <label for="room_id">Ruangan</label>
            </td>
            <td>
                <select name="room_id" id="room_id">
                    <option value="">Pilih Ruangan</option>

                    @foreach ($rooms as $room)
                        <option
                            value="{{ $room->id }}"
                            {{ $room->id == $update->room_id ? 'selected' : '' }}
                        >
                            {{ $room->name }}
                        </option>
                    @endforeach

                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="name">Nama Fasilitas</label>
            </td>
            <td>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ $update->name }}"
                    required
                >
            </td>
        </tr>

        <tr>
            <td>
                <label for="quantity">Jumlah</label>
            </td>
            <td>
                <input
                    type="number"
                    name="quantity"
                    id="quantity"
                    value="{{ $update->quantity }}"
                    required
                >
            </td>
        </tr>

        <tr>
            <td>
                <label for="condition">Kondisi</label>
            </td>
            <td>
                <select name="condition" id="condition">
                    <option
                        value="Baik"
                        {{ $update->condition == 'Baik' ? 'selected' : '' }}
                    >
                        Baik
                    </option>

                    <option
                        value="Rusak Ringan"
                        {{ $update->condition == 'Rusak Ringan' ? 'selected' : '' }}
                    >
                        Rusak Ringan
                    </option>

                    <option
                        value="Rusak Berat"
                        {{ $update->condition == 'Rusak Berat' ? 'selected' : '' }}
                    >
                        Rusak Berat
                    </option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">
                    Update
                </button>

                <a href="{{ route('facility-index') }}">
                    Batal
                </a>
            </td>
        </tr>
    </table>

</form>

@endsection
