@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <h2>Detail Surat</h2>
        <p><strong>Judul:</strong> {{ $surat->judul }}</p>
        <p><strong>Kategori:</strong> {{ $surat->kategori->nama }}</p>
        <a href="{{ route('surats.download', $surat->id) }}" class="btn btn-primary">Unduh</a>
        <a href="{{ route('surats.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
