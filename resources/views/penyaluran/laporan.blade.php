@extends('layouts.app')

@push('styles')
<style>
    .poster-card { 
        transition: all 0.3s ease; 
        cursor: pointer; 
    }
    .poster-card:hover { 
        transform: translateY(-10px); 
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    /* Tinggi untuk poster dibuat lebih panjang ke bawah */
    .poster-img { 
        height: 450px; 
        object-fit: cover; 
        object-position: top; 
        transition: transform 0.5s ease;
    }
    .poster-card:hover .poster-img {
        transform: scale(1.02);
    }
</style>
@endpush

@section('content')
<!-- Header Section -->
<section class="py-5 text-center bg-light" data-aos="fade-down" data-aos-duration="800">
    <div class="container">
        <span class="text-uppercase text-primary fw-semibold tracking-wider">Laporan Transparansi</span>
        <h1 class="fw-bold mt-2 text-dark">Poster Laporan Penyaluran</h1>
        <div class="mx-auto bg-primary mt-3" style="width: 50px; height: 3px; border-radius: 2px;"></div>
        <p class="text-muted mt-3 mx-auto" style="max-width: 600px;">
            Berikut adalah poster-poster ringkasan laporan penyaluran dana zakat, infaq, sedekah, dan kemanusiaan yang telah dilaksanakan.
        </p>
    </div>
</section>

<!-- Poster Grid Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            <!-- Tempat Poster 1 -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 poster-card rounded-4 overflow-hidden">
                    <div class="overflow-hidden">
                        <!-- ⚠️ GANTI SRC GAMBAR DI BAWAH INI DENGAN FOTO POSTER ANDA (Gunakan ukuran poster seperti A4/A5 vertikal) ⚠️ -->
                        <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=600&q=80" class="card-img-top poster-img" alt="Poster Laporan 1">
                    </div>
                    <div class="card-body text-center p-4">
                        <span class="badge bg-primary bg-opacity-10 text-primary mb-2 rounded-pill px-3">Januari 2026</span>
                        <h5 class="fw-bold text-dark">Laporan Penyaluran Awal Tahun</h5>
                        <p class="text-muted small mb-3">Rekapitulasi penyaluran bantuan pendidikan dan sembako.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-4 fw-semibold">Lihat Gambar Penuh</a>
                    </div>
                </div>
            </div>

            <!-- Tempat Poster 2 -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card shadow-sm border-0 poster-card rounded-4 overflow-hidden">
                    <div class="overflow-hidden">
                        <!-- ⚠️ GANTI SRC GAMBAR DI BAWAH INI DENGAN FOTO POSTER ANDA ⚠️ -->
                        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=600&q=80" class="card-img-top poster-img" alt="Poster Laporan 2">
                    </div>
                    <div class="card-body text-center p-4">
                        <span class="badge bg-primary bg-opacity-10 text-primary mb-2 rounded-pill px-3">Ramadhan 1447 H</span>
                        <h5 class="fw-bold text-dark">Laporan Spesial Ramadhan</h5>
                        <p class="text-muted small mb-3">Distribusi zakat fitrah dan paket berbuka puasa.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-4 fw-semibold">Lihat Gambar Penuh</a>
                    </div>
                </div>
            </div>

            <!-- Tempat Poster 3 -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card shadow-sm border-0 poster-card rounded-4 overflow-hidden">
                    <div class="overflow-hidden">
                        <!-- ⚠️ GANTI SRC GAMBAR DI BAWAH INI DENGAN FOTO POSTER ANDA ⚠️ -->
                        <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=600&q=80" class="card-img-top poster-img" alt="Poster Laporan 3">
                    </div>
                    <div class="card-body text-center p-4">
                        <span class="badge bg-primary bg-opacity-10 text-primary mb-2 rounded-pill px-3">Qurban 2026</span>
                        <h5 class="fw-bold text-dark">Laporan Tabungan Qurban</h5>
                        <p class="text-muted small mb-3">Penyaluran daging qurban ke pelosok Sumatera Barat.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-4 fw-semibold">Lihat Gambar Penuh</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
