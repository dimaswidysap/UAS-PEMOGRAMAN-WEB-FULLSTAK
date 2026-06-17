@extends('layouts.app')

@section('content')

<h1>Detail Kategori Ruangan</h1>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <td>{{ $view->id }}</td>
    </tr>

    <tr>
        <th>Nama Kategori</th>
        <td>{{ $view->name }}</td>
    </tr>

    <tr>
        <th>Slug</th>
        <td>{{ $view->slug }}</td>
    </tr>

    <tr>
        <th>Icon</th>
        <td>{{ $view->icon }}</td>
    </tr>

    <tr>
        <th>Warna</th>
        <td>{{ $view->color }}</td>
    </tr>

    <tr>
        <th>Deskripsi</th>
        <td>{{ $view->description }}</td>
    </tr>

    <tr>
        <th>Maksimal Booking (Hari Sebelum)</th>
        <td>{{ $view->max_booking_days_ahead }}</td>
    </tr>

    <tr>
        <th>Maksimal Durasi (Jam)</th>
        <td>{{ $view->max_duration_hours }}</td>
    </tr>

    <tr>
        <th>Minimal Durasi (Menit)</th>
        <td>{{ $view->min_duration_minutes }}</td>
    </tr>

    <tr>
        <th>Memerlukan Approval</th>
        <td>
            {{ $view->requires_approval ? 'Ya' : 'Tidak' }}
        </td>
    </tr>

    <tr>
        <th>Status</th>
        <td>
            {{ $view->is_active ? 'Aktif' : 'Tidak Aktif' }}
        </td>
    </tr>

    <tr>
        <th>Urutan</th>
        <td>{{ $view->sort_order }}</td>
    </tr>

    <tr>
        <th>Dibuat Pada</th>
        <td>{{ $view->created_at }}</td>
    </tr>

    <tr>
        <th>Diubah Pada</th>
        <td>{{ $view->updated_at }}</td>
    </tr>

    <tr>
        <th>Dihapus Pada</th>
        <td>{{ $view->deleted_at ?? '-' }}</td>
    </tr>
</table>

<br>

<a href="{{ route('index-category') }}">Kembali ke daftar kategori</a>

@endsection
