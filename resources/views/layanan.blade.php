@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <span class="text-uppercase text-warning fw-semibold">Layanan</span>
            <h1 class="fw-bold mt-2">Layanan Zakat dan Donasi</h1>
            <p class="text-muted mx-auto" style="max-width: 640px;">Pilih layanan sesuai kebutuhan Anda: konsultasi zakat, jemput zakat/donasi, atau konfirmasi transaksi. Kami siap melayani dengan proses yang mudah dan amanah.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body">
                        <h5 class="fw-bold">Konsultasi Zakat</h5>
                        <p class="text-muted">Dapatkan panduan zakat sesuai syariat untuk perorangan maupun perusahaan.</p>
                        <a href="/layanan/konsultasi" class="btn btn-outline-primary">Buka Form</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body">
                        <h5 class="fw-bold">Jemput Zakat / Donasi</h5>
                        <p class="text-muted">Jadwalkan penjemputan zakat atau donasi kami ke lokasi Anda.</p>
                        <a href="/layanan/jemput" class="btn btn-outline-primary">Buka Form</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body">
                        <h5 class="fw-bold">Konfirmasi Zakat / Donasi</h5>
                        <p class="text-muted">Kirim data konfirmasi agar donasi Anda tercatat dan diproses dengan benar.</p>
                        <a href="/layanan/konfirmasi" class="btn btn-outline-primary">Buka Form</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
