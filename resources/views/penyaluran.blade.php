@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <span class="text-uppercase text-primary fw-semibold">Penyaluran</span>
            <h1 class="fw-bold">Penyaluran Dana</h1>
            <p class="text-muted mx-auto" style="max-width: 680px;">Lihat laporan penyaluran dan dokumentasi kegiatan kami untuk memastikan donasi Anda tersalurkan dengan transparan dan tepat sasaran.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-5">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold">Laporan Penyaluran</h5>
                        <p class="text-muted">Ringkasan laporan penyaluran dana dan kegiatan sosial yang telah kami salurkan.</p>
                        <a href="/penyaluran/laporan" class="btn btn-primary">Lihat Laporan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold">Dokumentasi</h5>
                        <p class="text-muted">Galeri dokumentasi kegiatan, distribusi donasi, dan penyaluran bantuan.</p>
                        <a href="/penyaluran/dokumentasi" class="btn btn-primary">Lihat Dokumentasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
