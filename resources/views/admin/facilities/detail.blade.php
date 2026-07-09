@extends('layouts.app')

@section('content')
    <section class="main-container">
        <h1>Detail Fasilitas</h1>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <td>{{ $view->id }}</td>
            </tr>

            <tr>
                <th>ID Ruangan</th>
                <td>{{ $view->room_id }}</td>
            </tr>

            <tr>
                <th>Nama Fasilitas</th>
                <td>{{ $view->name }}</td>
            </tr>

            <tr>
                <th>Jumlah</th>
                <td>{{ $view->quantity }}</td>
            </tr>

            <tr>
                <th>Kondisi</th>
                <td>{{ $view->condition }}</td>
            </tr>

            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $view->created_at }}</td>
            </tr>

            <tr>
                <th>Diupdate Pada</th>
                <td>{{ $view->updated_at }}</td>
            </tr>
        </table>

        <br>

        <a href="{{ route('facility-update-form', $view->id) }}">
            Edit
        </a>

        |

        <a href="{{ route('facility-index') }}">
            Kembali
        </a>

    </section>
@endsection
