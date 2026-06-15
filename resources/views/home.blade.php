@extends('layouts.app')

@section('content')

<div id="homePage">

    <!-- HERO CAROUSEL -->
    <section class="hero">
        <div class="container">
            <!-- Menghilangkan tombol geser manual dan mengatur jeda waktu auto-slide menjadi 4 detik (4000ms) -->
            <div id="homeCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-indicators mb-0">
                    <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                
                <div class="carousel-inner">
                    <!-- SLIDE 1: PROFIL LAZ -->
                    <div class="carousel-item active">
                        <div class="slide-card p-4 p-lg-5">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <span class="badge bg-warning text-dark mb-3">Mengenal Kami</span>
                                    <h1 class="display-5 fw-bold mb-2">LAZ DARELIMAN PEDULI</h1>
                                    <p class="text-muted mb-3">Lembaga Amil Zakat resmi, amanah, dan transparan yang bergerak di bidang kemanusiaan, dakwah, serta sosial.</p>
                                    
                                    <!-- Poin Keunggulan Mini -->
                                    <div class="row g-2 mb-4 text-muted small">
                                        <div class="col-sm-6 d-flex align-items-center gap-2">
                                            <span style="color: #7db2fc;">&#10004;</span> Pengelolaan Sesuai Syariat
                                        </div>
                                        <div class="col-sm-6 d-flex align-items-center gap-2">
                                            <span style="color: #7db2fc;">&#10004;</span> Penyaluran Tepat Sasaran
                                        </div>
                                        <div class="col-sm-6 d-flex align-items-center gap-2">
                                            <span style="color: #7db2fc;">&#10004;</span> Laporan Publik Transparan
                                        </div>
                                        <div class="col-sm-6 d-flex align-items-center gap-2">
                                            <span style="color: #7db2fc;">&#10004;</span> Program Pemberdayaan Nyata
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column flex-sm-row gap-3">
                                        <a href="{{ url('/tentang') }}" class="btn btn-primary btn-lg">Lihat Profil Kami</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                                    <!-- GAMBAR PROFILE -->
                                    <img src="{{ asset('assets/images/Foto Ustadz 1x1.png') }}" alt="Slide 1 - Profil Ustadz" class="slide-image img-fluid rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SLIDE 2: MEMBANTU SAUDARA -->
                    <div class="carousel-item">
                        <div class="slide-card p-4 p-lg-5">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <span class="badge bg-warning text-dark mb-3">Bersama Membangun</span>
                                    <h1 class="display-5 fw-bold mb-3">Kita Bantu Saudara yang Membutuhkan</h1>
                                    <p class="text-muted mb-4">LAZ Dareliman hadir untuk mengelola zakat, infak, sedekah, wakaf, dan berbagai program sosial secara amanah dan transparan.</p>
                                    <div class="d-flex flex-column flex-sm-row gap-3">
                                        <a href="#" class="btn btn-primary btn-lg">Donasi Sekarang</a>
                                        <a href="#program" class="btn btn-outline-primary btn-lg">Lihat Program</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                                    <!-- GAMBAR 1 -->
                                    <img src="{{ asset('assets/images/berbagii.jpg') }}" alt="Slide 2 - Kemanusiaan" class="slide-image img-fluid rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SLIDE 3: PENDIDIKAN -->
                    <div class="carousel-item">
                        <div class="slide-card p-4 p-lg-5">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <span class="badge bg-warning text-dark mb-3">Program Pendidikan</span>
                                    <h1 class="display-5 fw-bold mb-3">Membantu Anak Belajar dan Tumbuh</h1>
                                    <p class="text-muted mb-4">Dukungan pendidikan untuk anak yatim, santri, dan keluarga kurang mampu melalui program beasiswa dan sekolah.</p>
                                    <div class="d-flex flex-column flex-sm-row gap-3">
                                        <a href="#" class="btn btn-primary btn-lg">Donasi Pendidikan</a>
                                        <a href="#program" class="btn btn-outline-primary btn-lg">Lihat Program</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                                    <!-- GAMBAR 2 -->
                                    <img src="{{ asset('assets/images/belajar.jpg') }}" alt="Slide 3 - Pendidikan" class="slide-image img-fluid rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SLIDE 4: KORBAN BENCANA -->
                    <div class="carousel-item">
                        <div class="slide-card p-4 p-lg-5">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <span class="badge bg-warning text-dark mb-3">Program Kemanusiaan</span>
                                    <h1 class="display-5 fw-bold mb-3">Bantuan Segera untuk Korban Bencana</h1>
                                    <p class="text-muted mb-4">Respons cepat dan amanah untuk keluarga terdampak bencana, kemiskinan, dan kesulitan sosial.</p>
                                    <div class="d-flex flex-column flex-sm-row gap-3">
                                        <a href="#" class="btn btn-primary btn-lg">Bantu Kemanusiaan</a>
                                        <a href="#program" class="btn btn-outline-primary btn-lg">Lihat Program</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                                    <!-- GAMBAR 3 -->
                                    <img src="{{ asset('assets/images/korban.jpg') }}" alt="Slide 4 - Tanggap Bencana" class="slide-image img-fluid rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SLIDE 5: PEMBERDAYAAN -->
                    <div class="carousel-item">
                        <div class="slide-card p-4 p-lg-5">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <span class="badge bg-warning text-dark mb-3">Program Pemberdayaan</span>
                                    <h1 class="display-5 fw-bold mb-3">Membangun Kemandirian Komunitas</h1>
                                    <p class="text-muted mb-4">Program pemberdayaan ekonomi dan sosial untuk keluarga, desa, dan pelaku UMKM.</p>
                                    <div class="d-flex flex-column flex-sm-row gap-3">
                                        <a href="#" class="btn btn-primary btn-lg">Dukung Pemberdayaan</a>
                                        <a href="#program" class="btn btn-outline-primary btn-lg">Lihat Program</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                                    <!-- GAMBAR 4 -->
                                    <img src="{{ asset('assets/images/komunitas.jpg') }}" alt="Slide 5 - Pemberdayaan" class="slide-image img-fluid rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Tutup carousel-inner -->
            </div> <!-- Tutup homeCarousel -->
        </div>
    </section>

    <!-- LAYANAN UTAMA -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center section-title mx-auto mb-5">
                <h2 class="fw-bold">Layanan Utama Kami</h2>
                <p class="text-muted">Program yang dirancang untuk membantu keluarga, pendidikan, and pemberdayaan masyarakat.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center card-zakat">
                        <div class="mb-3 display-6 text-warning">&#127969;</div>
                        <h5 class="fw-bold">Zakat</h5>
                        <p class="text-muted">Distribusi zakat secara cepat dan amanah ke yang paling membutuhkan.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center card-infak">
                        <div class="mb-3 display-6 text-warning">&#128176;</div>
                        <h5 class="fw-bold">Infak & Sedekah</h5>
                        <p class="text-muted">Salurkan donasi infak dan sedekah untuk kegiatan sosial yang nyata.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center card-pemberdayaan">
                        <div class="mb-3 display-6 text-warning">&#127979;</div>
                        <h5 class="fw-bold">Pemberdayaan</h5>
                        <p class="text-muted">Memberi bantuan dan pelatihan untuk kemandirian ekonomi.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center card-kemanusiaan">
                        <div class="mb-3 display-6 text-warning">&#128155;</div>
                        <h5 class="fw-bold">Kemanusiaan</h5>
                        <p class="text-muted">Respon cepat untuk korban bencana dan keluarga terdampak.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROGRAM UNGGULAN -->
    <section class="py-5" id="program">
        <div class="container">
            <div class="text-center section-title mx-auto mb-5">
                <h2 class="fw-bold">Program Unggulan</h2>
                <p class="text-muted">Program-program utama yang membantu masyarakat dan memberdayakan komunitas.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm card-edu">
                        <img src="https://placehold.co/600x400" class="card-img-top" alt="Program Pendidikan">
                        <div class="card-body">
                            <h5>Pendidikan</h5>
                            <p>Mendukung pelajar dan santri melalui beasiswa serta fasilitas belajar.</p>
                            <a href="#" class="btn btn-primary">Lihat Program</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm card-human">
                        <img src="https://placehold.co/600x400" class="card-img-top" alt="Program Kemanusiaan">
                        <div class="card-body">
                            <h5>Kemanusiaan</h5>
                            <p>Bantuan sosial dan tanggap darurat untuk keluarga yang terdampak.</p>
                            <a href="#" class="btn btn-primary">Lihat Program</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm card-dakwah">
                        <img src="https://placehold.co/600x400" class="card-img-top" alt="Program Dakwah">
                        <div class="card-body">
                            <h5>Dakwah</h5>
                            <p>Menebarkan nilai Islam melalui kegiatan dakwah dan pengajian.</p>
                            <a href="#" class="btn btn-primary">Lihat Program</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ARTIKEL EDUKASI -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-4">
                <div>
                    <h2 class="fw-bold">Artikel Edukasi</h2>
                    <p class="text-muted">Berisi artikel dan panduan zakat, infak, sedekah, serta informasi keagamaan.</p>
                </div>
                <a href="/edukasi" class="btn btn-warning btn-lg mt-3 mt-md-0">Lihat Semua Artikel</a>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card article-card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="Zakat Mal untuk Korban Musibah">
                        <div class="card-body">
                            <h5 class="fw-bold">Zakat Mal untuk Korban Musibah</h5>
                            <p class="text-muted">Diperbolehkan memberikan zakat mal kepada orang yang terkena musibah, yang menyebabkan hartanya ludes. Orang tersebut berhak...</p>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center py-3">
                            <small class="text-warning">Zakat</small>
                            <small class="text-muted">1 Desember 2026</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card article-card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="Kewajiban Harta Selain Zakat">
                        <div class="card-body">
                            <h5 class="fw-bold">Apakah Ada Kewajiban Lain pada Harta Selain Zakat?</h5>
                            <p class="text-muted">Pentingnya pembahasan ini karena menjadi landasan bagi para ulama dalam menjawab pertanyaan: bolehkah...</p>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center py-3">
                            <small class="text-warning">Zakat</small>
                            <small class="text-muted">18 Agustus 2026</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card article-card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="Zakat Harta yang Habis">
                        <div class="card-body">
                            <h5 class="fw-bold">Zakat Harta yang Habis karena Zakatnya dan Harta Gadaian</h5>
                            <p class="text-muted">Hukum Zakat Harta yang Habis karena Zakatnya dan Prinsip Dasar Apabila seseorang wajib mengeluarkan zakat sebesar 1.000...</p>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center py-3">
                            <small class="text-warning">Zakat</small>
                            <small class="text-muted">15 Agustus 2026</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BERITA TERBARU -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h2 class="fw-bold">Berita Terbaru</h2>
                    <p class="text-muted">Update kegiatan dan kisah nyata dari program kami. Lihat lebih lengkap di halaman Berita.</p>
                </div>
                <a href="/berita" class="btn btn-warning btn-lg">Lihat Semua Berita</a>
            </div>

            @if($latestNews->isNotEmpty())
                <div class="row g-4">
                    @foreach($latestNews as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="card article-card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                                <img src="{{ $item->image_url ? asset($item->image_url) : 'https://via.placeholder.com/400x250?text=Berita' }}" class="card-img-top" alt="{{ $item->title }}" style="height: 220px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <small class="text-muted mb-2"><i class="bi bi-calendar-event me-2"></i>{{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : $item->created_at->translatedFormat('d F Y') }}</small>
                                    <h5 class="fw-bold mb-3">{{ $item->title }}</h5>
                                    <p class="text-muted small mb-4 flex-grow-1">{{ Str::limit(strip_tags($item->content), 110) }}</p>
                                    <a href="{{ route('news.show', $item->slug) }}" class="btn btn-outline-primary fw-bold rounded-pill">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-light border rounded-4 text-muted mb-0">Belum ada berita terbaru untuk ditampilkan.</div>
            @endif
        </div>
    </section>

    <!-- CTA BANNER CALL TO ACTION -->
    <section class="py-5 text-white position-relative" style="background-image: linear-gradient(rgb(132, 216, 247), rgb(118, 202, 255)), url('{{ asset('assets/images/baground.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container text-center position-relative" style="z-index: 2;">
            <h2 class="fw-bold mb-3">Mari Menjadi Bagian Dari Kebaikan</h2>
            <p class="mb-4">Bersama Dareliman Peduli, kontribusi Anda dapat membantu banyak saudara.</p>
            <a href="/donasi" class="btn btn-primary btn-lg fw-bold">Donasi Sekarang</a>
        </div>
    </section>

</div>

@endsection