@extends('layouts.app')

{{-- Memanggil file CSS eksternal menggunakan Vite --}}
@vite(['resources/css/admin/category/index.css'])

@section('content')
    @include('components.navigasi-admin.index')

    {{-- Seluruh isi HTML wajib berada di dalam blok @section dan sebelum @endsection --}}
    <section class="main-container">
        <div class="header-title-wrapper">
            <h1 class="ui-title">Daftar Kategori</h1>
            <div class="ui-underline"></div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="action-header">
            <a href="{{ route('category-create') }}" class="btn-primary">Tambah Kategori</a>
        </div>

        <div class="table-responsive">
            <table class="ui-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Approval</th>
                        <th>Urutan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataCategory as $category)
                        <tr>
                            <td><strong>{{ $category->id }}</strong></td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <span class="badge {{ $category->is_active ? 'badge-success' : 'badge-danger' }}">
                                    {{ $category->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $category->requires_approval ? 'badge-warning' : 'badge-secondary' }}">
                                    {{ $category->requires_approval ? 'Ya' : 'Tidak' }}
                                </span>
                            </td>
                            <td>{{ $category->sort_order }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('category-view', $category->id) }}" class="btn-action btn-view">
                                        Detail
                                    </a>

                                    <a href="{{ route('category-update', $category->id) }}" class="btn-action btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('category-destroy', $category->id) }}" method="POST" class="inline-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center empty-row">
                                Tidak ada data kategori.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection {{-- Tag penutup ditaruh di paling bawah --}}
