@extends('layouts.app')

@section('content')

    <h1>Tambah Fasilitas Ruangan</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('facility-create-submit') }}" method="POST">
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
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>

                </td>
            </tr>

            <tr>
                <td>
                    <label for="name">Nama Fasilitas</label>
                </td>
                <td>
                    <input type="text" name="name" id="name" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="quantitiy">Jumlah</label>
                </td>
                <td>
                    <input type="number" name="quantity" id="quantity" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="condition">Kondisi</label>
                </td>
                <td>
                    <select name="condition" id="condition">
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit">
                        Simpan
                    </button>

                    <a href="{{ route('facility-index') }}">
                        Batal
                    </a>
                </td>
            </tr>
        </table>

    </form>

@endsection
