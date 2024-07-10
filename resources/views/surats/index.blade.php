@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <h2>Arsip Surat</h2>
        <form method="GET" action="{{ route('surats.index') }}">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Surat...">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </span>
            </div>
        </form>
        <a href="{{ route('surats.create') }}" class="btn btn-success mt-3">Arsipkan Surat..</a>
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($surats as $surat)
                    <tr>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->kategori->nama }}</td>
                        <td>{{ $surat->judul }}</td>
                        <td>{{ $surat->created_at }}</td>
                        <td>
                            <a href="{{ route('surats.show', $surat->id) }}" class="btn btn-info">Lihat >></a>
                            <a href="{{ route('surats.download', $surat->id) }}" class="btn btn-primary">Unduh</a>
                            <form action="{{ route('surats.destroy', $surat->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger delete-button">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var deleteButtons = document.querySelectorAll('.delete-button');
    
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function () {
            var form = this.closest('form');
            if (confirm('Apakah Anda yakin ingin menghapus surat ini?')) {
                form.submit();
            }
        });
    });
});
</script>
@endsection
