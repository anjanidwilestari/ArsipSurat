@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <h2>Tambah Kategori</h2>
        <form action="{{ route('kategoris.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
