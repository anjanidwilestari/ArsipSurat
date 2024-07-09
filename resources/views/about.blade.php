@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <h2>About</h2>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-3 d-flex align-items-start">
        <img src="img/anjani.jpg" alt="Foto Anda" class="img-fluid mb-3" style="width: 150px; height: 150px; border-radius: 15px;">
    </div>
    <div class="col d-flex align-items-start">
        <div>
            <p>Aplikasi ini dibuat oleh:</p>
            <dl>
                <div>
                    <dt style="width: 120px;"><strong>Nama</strong></dt>
                    <dd>Anjani Dwilestari</dd>
                </div>
                <div>
                    <dt style="width: 120px;"><strong>Prodi</strong></dt>
                    <dd>D4 Teknik Informatika JTI</dd>
                </div>
                <div>
                    <dt style="width: 120px;"><strong>NIM</strong></dt>
                    <dd>2041720180</dd>
                </div>
                <div>
                    <dt style="width: 200px;"><strong>Tanggal Pembuatan</strong></dt>
                    <dd>{{ date('d M Y') }}</dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
