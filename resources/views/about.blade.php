@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-12 text-center">
        <h2>About</h2>
        <img src="img/anjani.jpg" alt="Foto Anda" class="img-fluid rounded-circle mb-3" width="150" height="150">
        <p>Nama: Anjani Dwilestari</p>
        <p>NIM: 2041720180</p>
        <p>Tanggal Pembuatan: {{ date('d M Y') }}</p>
    </div>
</div>
@endsection
