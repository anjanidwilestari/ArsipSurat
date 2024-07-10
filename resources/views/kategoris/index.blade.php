@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="container">
    <h2>Daftar Kategori</h2>
    <form method="GET" action="{{ route('kategoris.index') }}">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari Kategori..." value="{{ request()->get('search') }}">
            <span class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </span>
        </div>
    </form>
    <a href="{{ route('kategoris.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->nama }}</td>
                    <td>{{ $kategori->keterangan }}</td>
                    <td>
                        <a href="{{ route('kategoris.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada kategori ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
