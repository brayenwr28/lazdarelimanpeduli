@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-uppercase text-primary fw-semibold">Penyaluran</span>
            <h1 class="fw-bold">Laporan Penyaluran</h1>
            <p class="text-muted mx-auto" style="max-width: 700px;">Berikut ringkasan laporan penyaluran dana dan kegiatan amal yang telah dilaksanakan oleh Dareliman Peduli.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Laporan Triwulan</h5>
                        <p class="text-muted">Overview penyaluran dana selama tiga bulan terakhir, termasuk jumlah penerima dan jenis bantuan.</p>
                        <a href="#" class="btn btn-outline-primary">Unduh Laporan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Realisasi Program</h5>
                        <p class="text-muted">Detail realisasi program zakat, infak, sedekah, dan pemberdayaan masyarakat.</p>
                        <a href="#" class="btn btn-outline-primary">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
