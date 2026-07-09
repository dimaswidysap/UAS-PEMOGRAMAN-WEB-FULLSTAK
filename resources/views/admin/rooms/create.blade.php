@extends('layouts.app')
@vite(['resources/css/admin/rooms/create.css', 'resources/js/admin/rooms/create.js'])
@section('content')
<section class='main-container' >

<div class="room-container">

    <form>

        <div class="card">

            <div class="card-header">

                <div class="card-title">

                    <div class="icon-box">
                        🏢
                    </div>

                    <div>

                        <h2>Informasi Dasar</h2>

                        <p>
                            Nama, identitas, dan deskripsi ruangan
                        </p>

                    </div>


                </div>

                <div class="step">
                    1
                </div>

            </div>

            <div class="form-grid">

                <div class="form-group">

                    <label>Nama Ruangan</label>

                    <input
                        type="text"
                        name="name"
                        placeholder="Contoh : Lab Komputer 1">

                </div>

                <div class="form-group">

                    <label>Kode Ruangan</label>

                    <input
                        type="text"
                        name="code"
                        placeholder="LAB-01">

                </div>

                <div class="form-group">

                    <label>Gedung</label>

                    <input
                        type="text"
                        name="building"
                        placeholder="Gedung A">

                </div>

                <div class="form-group">

                    <label>Kapasitas</label>

                    <input
                        type="number"
                        name="capacity"
                        placeholder="40">

                </div>

            </div>

            <div class="form-group">

                <label>Deskripsi</label>

                <textarea
                    rows="5"
                    placeholder="Masukkan deskripsi ruangan">
                </textarea>

            </div>

        </div>
            <div class="card">

                <div class="card-header">

                    <div class="card-title">

                        <div class="icon-box">
                            ⏰
                        </div>

                        <div>

                            <h2>Aturan Booking</h2>

                            <p>
                                Pengaturan batas peminjaman ruangan
                            </p>

                        </div>

                    </div>

                    <div class="step">
                        2
                    </div>

                </div>

                <div class="form-grid">

                    <div class="form-group">
                        <label>Maksimal Booking (Hari)</label>
                        <input type="number" name="max_day" value="30">
                    </div>

                    <div class="form-group">
                        <label>Maksimal Durasi (Jam)</label>
                        <input type="number" name="max_duration" value="8">
                    </div>

                </div>

            </div>
                <div class="card">

                    <div class="card-header">

                        <div class="card-title">

                            <div class="icon-box">
                                🛋️
                            </div>

                            <div>
                                <h2>Fasilitas Ruangan</h2>
                                <p>Daftar fasilitas yang tersedia</p>
                            </div>

                        </div>

                        <div class="step">
                            3
                        </div>

                    </div>

                    <div class="form-group">

                        <label>Fasilitas</label>

                        <textarea
                            rows="4"
                            name="facilities"
                            placeholder="Contoh:
                Proyektor
                AC
                WiFi
                Whiteboard">
                        </textarea>

                    </div>
                        <div class="footer-action">

                            <button type="submit" class="btn-save">
                                ✔ Simpan Ruangan
                            </button>

                            <button type="button" class="btn-cancel">
                                Batal
                            </button>

                        </div>
                </div>
    </form>

</div>
=======
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

</section>
@endsection
