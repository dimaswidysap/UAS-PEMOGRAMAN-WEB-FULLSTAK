@extends('layouts.app')
@vite(['resources/css/admin/rooms/create.css', 'resources/js/admin/rooms/create.js'])
@section('content')

    <section class="main-container">
        <h1>Tambah Ruangan Baru</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('room-submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <table>
                <tr>
                    <td>
                        <label for="name">Nama Ruangan</label>
                    </td>
                    <td>
                        <input type="text" name="name" id="name" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="code">Kode Ruangan</label>
                    </td>
                    <td>
                        <input type="text" name="code" id="code" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="category_id">Kategori</label>
                    </td>
                    <td>
                        <select name="category_id" id="category_id">

                            <option value="">Pilih kategori!</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="building">Gedung</label>
                    </td>
                    <td>
                        <input type="text" name="building" id="building">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="floor">Lantai</label>
                    </td>
                    <td>
                        <input type="number" name="floor" id="floor">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="capacity">Kapasitas</label>
                    </td>
                    <td>
                        <input type="number" name="capacity" id="capacity">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="description">Deskripsi</label>
                    </td>
                    <td>
                        <textarea name="description" id="description" rows="5" cols="50"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="image">Gambar Ruangan</label>
                    </td>
                    <td>
                        <div class="imagePreview">
                            <input id='imageInput' type="file" name="image" id="image" accept="image/*">
                            <img id="imagePreview" src="#" alt="Preview">
                        </div>
                    </td>


                </tr>

                <tr>
                    <td>
                        <label for="is_active">Status</label>
                    </td>
                    <td>
                        <select name="is_active" id="is_active">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="open_time">Jam Buka</label>
                    </td>
                    <td>
                        <input type="time" name="open_time" id="open_time">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="close_time">Jam Tutup</label>
                    </td>
                    <td>
                        <input type="time" name="close_time" id="close_time">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button type="submit">
                            Simpan
                        </button>

                        <a href="{{ route('index-rooms') }}">
                            Batal
                        </a>
                    </td>
                </tr>
            </table>

        </form>




    </section>
@endsection
