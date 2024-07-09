@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
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
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($surats as $surat)
                    <tr>
                        <td>{{ $surat->judul }}</td>
                        <td>{{ $surat->kategori->nama }}</td>
                        <td>
                            <a href="{{ route('surats.show', $surat->id) }}" class="btn btn-info">Lihat >></a>
                            <a href="{{ route('surats.download', $surat->id) }}" class="btn btn-primary">Unduh</a>
                            <form action="{{ route('surats.destroy', $surat->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
