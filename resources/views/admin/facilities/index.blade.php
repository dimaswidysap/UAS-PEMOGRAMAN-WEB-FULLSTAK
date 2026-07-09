@extends('layouts.app')
@vite(['resources/css/admin/facilities/index.css'])
@section('content')
@include('components.navigasi-admin.index')

<section class="main-container">
    <div class="header-section">
        <h1>Daftar Fasilitas Ruangan</h1>
        <a href="{{ route('facility-create') }}" class="btn-tambah">
            Tambah Fasilitas
        </a>
    </div>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Nama Ruangan</th>
                    <th>Nama Fasilitas</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($facilities as $facility)
                    <tr>
                        <td class="text-center data-id">{{ $facility->id }}</td>
                        <td>{{ $facility->room->name }}</td>
                        <td>{{ $facility->name }}</td>
                        <td>{{ $facility->quantity }}</td>
                        <td>
                            <span class="badge badge-kondisi">{{ ucfirst($facility->condition) }}</span>
                        </td>
                        <td class="text-center">
                            <div class="action-buttons">
                                <a href="{{ route('facility-view', $facility->id) }}" class="btn-action btn-detail">
                                    Detail
                                </a>

                                <a href="{{ route('facility-update-form', $facility->id) }}" class="btn-action btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('facility-delete', $facility->id) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn-action btn-hapus"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center no-data">
                            Tidak ada data fasilitas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection