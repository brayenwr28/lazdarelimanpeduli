@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-uppercase text-primary fw-semibold">Tentang Kami</span>
            <h1 class="fw-bold">Laporan Audit Keuangan</h1>
            <p class="text-muted mx-auto" style="max-width: 720px;">Berikut adalah laporan keuangan yayasan kami yang menunjukkan transparansi dalam pengelolaan zakat, sedekah, dan donasi umat.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Laporan Tahunan</h5>
                        <p class="text-muted">Dokumen laporan keuangan tahunan yayasan yang telah diaudit oleh pihak independen.</p>
                        <a href="#" class="btn btn-outline-primary">Unduh Laporan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Audit dan Transparansi</h5>
                        <p class="text-muted">Informasi terkait proses audit keuangan dan jaminan transparansi penyaluran dana yayasan.</p>
                        <a href="#" class="btn btn-outline-primary">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
