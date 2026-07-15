@extends('layouts.app')

@push('styles')
<style>
    /* Styling khusus Galeri Foto */
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        margin-bottom: 24px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .gallery-item img {
        width: 100%;
        height: 280px; /* Tinggi seragam untuk semua foto */
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .gallery-item:hover img {
        transform: scale(1.1);
    }
    
    /* Overlay hitam bergradasi saat dihover */
    .gallery-overlay {
        position: absolute;
        bottom: -100%;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.85), transparent);
        padding: 30px 20px 20px 20px;
        transition: bottom 0.4s ease;
        color: white;
    }
    .gallery-item:hover .gallery-overlay {
        bottom: 0;
    }
</style>
@endpush

@section('content')
<!-- Header Section -->
<section class="py-5 text-center text-white" style="background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);" data-aos="fade-down" data-aos-duration="800">
    <div class="container py-3">
        <span class="text-uppercase fw-semibold tracking-wider text-white-50">Jejak Kebaikan</span>
        <h1 class="fw-bold mt-2">Dokumentasi Penyaluran</h1>
        <div class="mx-auto bg-white mt-3" style="width: 50px; height: 3px; border-radius: 2px;"></div>
        <p class="mt-3 mx-auto text-white-50" style="max-width: 600px;">
            Bukti nyata dari setiap donasi yang Anda titipkan, kami abadikan dalam galeri kebaikan ini.
        </p>
    </div>
</section>

<!-- Gallery Grid Section -->
<section class="py-5 bg-light">
    <div class="container">
        
        <div class="row g-4">
            
            <!-- Tempat Foto Dokumentasi 1 -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="gallery-item">
                    <!-- ⚠️ GANTI SRC GAMBAR DI BAWAH INI DENGAN FOTO DOKUMENTASI ANDA ⚠️ -->
                    <img src="https://images.unsplash.com/photo-1520975913981-7b4a5d5b8b28?auto=format&fit=crop&w=800&q=80" alt="Dokumentasi 1">
                    
                    <div class="gallery-overlay">
                        <span class="badge bg-warning text-dark mb-2">Bantuan Pangan</span>
                        <h5 class="mb-1 fw-bold">Penyaluran Sembako</h5>
                        <p class="small text-white-50 mb-0"><i class="bi bi-geo-alt-fill me-1"></i> Padang, Sumatera Barat</p>
                    </div>
                </div>
            </div>

            <!-- Tempat Foto Dokumentasi 2 -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="gallery-item">
                    <!-- ⚠️ GANTI SRC GAMBAR DI BAWAH INI DENGAN FOTO DOKUMENTASI ANDA ⚠️ -->
                    <img src="https://images.unsplash.com/photo-1509099836639-18ba6c6e92dc?auto=format&fit=crop&w=800&q=80" alt="Dokumentasi 2">
                    
                    <div class="gallery-overlay">
                        <span class="badge bg-warning text-dark mb-2">Pendidikan</span>
                        <h5 class="mb-1 fw-bold">Beasiswa Yatim</h5>
                        <p class="small text-white-50 mb-0"><i class="bi bi-geo-alt-fill me-1"></i> Pasaman Barat</p>
                    </div>
                </div>
            </div>

            <!-- Tempat Foto Dokumentasi 3 -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="gallery-item">
                    <!-- ⚠️ GANTI SRC GAMBAR DI BAWAH INI DENGAN FOTO DOKUMENTASI ANDA ⚠️ -->
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=800&q=80" alt="Dokumentasi 3">
                    
                    <div class="gallery-overlay">
                        <span class="badge bg-warning text-dark mb-2">Pemberdayaan</span>
                        <h5 class="mb-1 fw-bold">Pelatihan UMKM</h5>
                        <p class="small text-white-50 mb-0"><i class="bi bi-geo-alt-fill me-1"></i> Bukittinggi</p>
                    </div>
                </div>
            </div>
            
            <!-- Tempat Foto Dokumentasi 4 -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="gallery-item">
                    <!-- ⚠️ GANTI SRC GAMBAR DI BAWAH INI DENGAN FOTO DOKUMENTASI ANDA ⚠️ -->
                    <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?auto=format&fit=crop&w=800&q=80" alt="Dokumentasi 4">
                    
                    <div class="gallery-overlay">
                        <span class="badge bg-warning text-dark mb-2">Sosial</span>
                        <h5 class="mb-1 fw-bold">Bedah Rumah Dhuafa</h5>
                        <p class="small text-white-50 mb-0"><i class="bi bi-geo-alt-fill me-1"></i> Pariaman</p>
                    </div>
                </div>
            </div>
            
            <!-- Tempat Foto Dokumentasi 5 -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="500">
                <div class="gallery-item">
                    <!-- ⚠️ GANTI SRC GAMBAR DI BAWAH INI DENGAN FOTO DOKUMENTASI ANDA ⚠️ -->
                    <img src="https://images.unsplash.com/photo-1603048297172-c92544798d5e?auto=format&fit=crop&w=800&q=80" alt="Dokumentasi 5">
                    
                    <div class="gallery-overlay">
                        <span class="badge bg-warning text-dark mb-2">Kesehatan</span>
                        <h5 class="mb-1 fw-bold">Layanan Ambulans Gratis</h5>
                        <p class="small text-white-50 mb-0"><i class="bi bi-geo-alt-fill me-1"></i> Padang Panjang</p>
                    </div>
                </div>
            </div>
            
            <!-- Tempat Foto Dokumentasi 6 -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="600">
                <div class="gallery-item">
                    <!-- ⚠️ GANTI SRC GAMBAR DI BAWAH INI DENGAN FOTO DOKUMENTASI ANDA ⚠️ -->
                    <img src="https://images.unsplash.com/photo-1593113565694-c8c3e80bd2e2?auto=format&fit=crop&w=800&q=80" alt="Dokumentasi 6">
                    
                    <div class="gallery-overlay">
                        <span class="badge bg-warning text-dark mb-2">Dakwah</span>
                        <h5 class="mb-1 fw-bold">Pembagian Mushaf Al-Quran</h5>
                        <p class="small text-white-50 mb-0"><i class="bi bi-geo-alt-fill me-1"></i> Mentawai</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
