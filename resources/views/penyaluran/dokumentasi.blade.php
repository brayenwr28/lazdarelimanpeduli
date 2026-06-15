@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-uppercase text-primary fw-semibold">Penyaluran</span>
            <h1 class="fw-bold">Dokumentasi</h1>
            <p class="text-muted mx-auto" style="max-width: 700px;">Kumpulan foto dan dokumentasi kegiatan penyaluran bantuan yang menunjukkan transparansi dan dampak nyata.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1520975913981-7b4a5d5b8b28?auto=format&fit=crop&w=900&q=60" class="card-img-top" alt="Dokumentasi 1">
                    <div class="card-body">
                        <h6 class="fw-bold">Penyaluran Sembako</h6>
                        <p class="text-muted">Kegiatan distribusi bantuan pangan kepada keluarga terdampak.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1509099836639-18ba6c6e92dc?auto=format&fit=crop&w=900&q=60" class="card-img-top" alt="Dokumentasi 2">
                    <div class="card-body">
                        <h6 class="fw-bold">Bantuan Pendidikan</h6>
                        <p class="text-muted">Dukungan beasiswa dan fasilitas belajar untuk anak-anak.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=900&q=60" class="card-img-top" alt="Dokumentasi 3">
                    <div class="card-body">
                        <h6 class="fw-bold">Pemberdayaan Masyarakat</h6>
                        <p class="text-muted">Dokumentasi pelatihan dan kegiatan pemberdayaan ekonomi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
