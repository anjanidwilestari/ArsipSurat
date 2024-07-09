<!-- resources/views/surats/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Surat')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Surat</h2>
            <form action="{{ route('surats.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <!-- Field untuk nomor surat, judul, dan kategori -->
                <div class="form-group">
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control" value="{{ $surat->nomor_surat }}" required>
                </div>
            
                <div class="form-group">
                    <label for="judul">Judul Surat</label>
                    <input type="text" name="judul" class="form-control" value="{{ $surat->judul }}" required>
                </div>
            
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" class="form-control" required>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $kategori->id == $surat->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
            
                <!-- Field untuk file surat -->
                <div class="form-group">
                    <label for="file">File Surat (PDF)</label>
                    <input type="file" name="file" class="form-control-file">
                    @if ($surat->file)
                        <p><a href="{{ route('surats.download', $surat->id) }}">Download File Surat</a></p>
                    @endif
                </div>
            
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('surats.show', $surat->id) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
