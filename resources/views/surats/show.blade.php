@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <h2>Detail Surat</h2>
        <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
        <p><strong>Kategori:</strong> {{ $surat->kategori->nama }}</p>
        <p><strong>Judul:</strong> {{ $surat->judul }}</p>
        <p><strong>Waktu Unggah:</strong> {{ $surat->created_at->format('d F Y H:i') }}</p>

        <!-- Tampilkan file PDF -->
        <embed src="{{ Storage::url($surat->file) }}" type="application/pdf" width="100%" height="600px" />
        
        <!-- Tombol untuk kembali, unduh, dan edit/ganti surat -->
        <div class="mt-3">
            <a href="{{ route('surats.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('surats.download', $surat->id) }}" class="btn btn-primary">Unduh</a>
            <a href="{{ route('surats.edit', $surat->id) }}" class="btn btn-info">Edit/Ganti Surat</a>
        </div>
    </div>
</div>
@endsection
