@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <h2>Edit Kategori</h2>
        <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
