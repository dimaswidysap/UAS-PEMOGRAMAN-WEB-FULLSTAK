@extends('layouts.app')
@vite(['resources/css/admin/rooms/create.css','resources/js/admin/rooms/create.js'])
@section('content')
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
@endsection
