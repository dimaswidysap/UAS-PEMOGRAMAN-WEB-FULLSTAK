@extends('layouts.app')

@vite([
    'resources/css/admin/rooms/update.css',
    'resources/js/admin/rooms/update.js'
])

@section('content')
<form action="{{ route('room-update-submit',$room->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="room-container">

        {{-- CARD 1 --}}
        <div class="card">

            <div class="card-header">

                <div class="card-title">

                    <div class="icon-box">🏢</div>

                    <div>
                        <h2>Informasi Ruangan</h2>
                        <p>Perbarui informasi dasar ruangan</p>
                    </div>

                </div>

                <div class="step">1</div>

            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label>Nama Ruangan</label>
                    <input type="text" name="name"
                        value="{{ old('name',$room->name) }}">
                    @error('name')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kode Ruangan</label>
                    <input type="text" name="code"
                        value="{{ old('code',$room->code) }}">
                    @error('code')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kategori</label>

                    <select name="category_id">

                        @foreach($category as $item)

                            <option value="{{ $item->id }}"
                                {{ $room->category_id==$item->id ? 'selected':'' }}>

                                {{ $item->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="form-group">
                    <label>Gedung</label>
                    <input type="text"
                        name="building"
                        value="{{ old('building',$room->building) }}">
                </div>

                <div class="form-group">
                    <label>Lantai</label>
                    <input type="number"
                        name="floor"
                        value="{{ old('floor',$room->floor) }}">
                </div>

                <div class="form-group">
                    <label>Kapasitas</label>
                    <input type="number"
                        name="capacity"
                        value="{{ old('capacity',$room->capacity) }}">
                </div>

            </div>

            <div class="form-group">

                <label>Deskripsi</label>

                <textarea rows="5"
                    name="description">{{ old('description',$room->description) }}</textarea>

            </div>

        </div>

        {{-- CARD 2 --}}
        <div class="card">

            <div class="card-header">

                <div class="card-title">

                    <div class="icon-box">🖼️</div>

                    <div>

                        <h2>Gambar Ruangan</h2>

                        <p>Upload gambar terbaru ruangan</p>

                    </div>

                </div>

                <div class="step">2</div>

            </div>

            <div class="form-grid">

                <div class="form-group">

                    <label>Gambar Saat Ini</label>

                    <img
                        src="{{ asset('uploads/rooms/'.$room->image) }}"
                        id="imagePreview"
                        style="
                        width:100%;
                        height:260px;
                        object-fit:cover;
                        border-radius:15px;
                        border:1px solid #ddd;">

                </div>

                <div class="form-group">

                    <label>Upload Gambar Baru</label>

                    <input
                        type="file"
                        id="imageInput"
                        name="image">

                </div>

            </div>

        </div>

        {{-- CARD 3 --}}
        <div class="card">

            <div class="card-header">

                <div class="card-title">

                    <div class="icon-box">⚙️</div>

                    <div>

                        <h2>Pengaturan Operasional</h2>

                        <p>Status dan jam operasional</p>

                    </div>

                </div>

                <div class="step">3</div>

            </div>

            <div class="form-grid">

                <div class="form-group">

                    <label>Status</label>

                    <select name="is_active">

                        <option value="1"
                            {{ $room->is_active ? 'selected':'' }}>
                            Aktif
                        </option>

                        <option value="0"
                            {{ !$room->is_active ? 'selected':'' }}>
                            Tidak Aktif
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Jam Buka</label>

                    <input
                        type="time"
                        name="open_time"
                        value="{{ old('open_time',$room->open_time) }}">

                </div>

                <div class="form-group">

                    <label>Jam Tutup</label>

                    <input
                        type="time"
                        name="close_time"
                        value="{{ old('close_time',$room->close_time) }}">

                </div>

            </div>

        </div>

        <div class="footer-action">

            <a
                href="{{ route('index-rooms') }}"
                class="btn-cancel">

                Batal

            </a>

            <button
                type="submit"
                class="btn-save">

                Simpan Perubahan

            </button>

        </div>

    </div>

</form>