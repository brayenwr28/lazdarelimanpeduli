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
                                    <img src="{{ asset('assets/images/Foto ustdz elvi.jpeg') }}" alt="Slide 1 - Profil Ustadz" class="slide-image img-fluid rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                   <!-- SLIDE 2: CICILAN KURBAN -->
            <div class="carousel-item">
             <div class="slide-card p-4 p-lg-5">
             <div class="row align-items-center g-4"> <!-- Ditambah g-4 agar spacing antar kolom pas -->
            
            <!-- KOLOM TEKS (Diperbesar ke col-lg-7) -->
            <div class="col-lg-7">
                <span class="badge bg-warning text-dark mb-3 px-3 py-2 fs-6 fw-semibold">
                    <i class="bi bi-heart-fill me-1"></i> Bersama Berkurban
                </span>
                
                <h1 class="display-4 fw-bold mb-3 text-dark lh-sm">
                    Tebarkan Kebaikan Melalui Kurban
                </h1>
                
                <p class="text-muted fs-5 mb-4 leading-relaxed">
                    Mari persiapkan ibadah kurban terbaik Anda bersama LAZ Dareliman. Tabungan kurban Anda akan menyulut kebahagiaan dan senyuman bagi saudara-saudara yang membutuhkan.
                </p>

                <!-- FITUR TAMBAHAN (Mengisi ruang kosong agar seimbang dengan gambar) -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-primary-subtle text-primary rounded-circle p-2">
                                ✓
                            </span>
                            <span class="fw-medium text-secondary">Mudah & Terjangkau</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-primary-subtle text-primary rounded-circle p-2">
                                ✓
                            </span>
                            <span class="fw-medium text-secondary">Tepat Sasaran</span>
                        </div>
                    </div>
                </div>

                <!-- TOMBOL CTA -->
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a href="#" class="btn btn-primary btn-lg px-4 py-3 shadow-sm fw-bold">
                        Mari Berkurban Sekarang
                    </a>
                </div>
            </div>

            <!-- KOLOM GAMBAR (Dikecilkan ke col-lg-5) -->
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <!-- GAMBAR 1 -->
                <img src="{{ asset('assets/images/cicilan kurban.jpeg') }}" 
                     alt="Slide 2 - Kemanusiaan" 
                     class="slide-image img-fluid rounded-4 shadow-lg w-100 style-img">
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
            <div class="text-center section-title mx-auto mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Layanan Utama Kami</h2>
                <p class="text-muted">Program yang dirancang untuk membantu keluarga, pendidikan, and pemberdayaan masyarakat.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center card-zakat" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
                        <div class="mb-3 display-6 text-warning">&#127969;</div>
                        <h5 class="fw-bold">Zakat</h5>
                        <p class="text-muted">Distribusi zakat secara cepat dan amanah ke yang paling membutuhkan.</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center card-infak" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
                        <div class="mb-3 display-6 text-warning">&#128176;</div>
                        <h5 class="fw-bold">Infak & Sedekah</h5>
                        <p class="text-muted">Salurkan donasi infak dan sedekah untuk kegiatan sosial yang nyata.</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center card-pemberdayaan" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
                        <div class="mb-3 display-6 text-warning">&#127979;</div>
                        <h5 class="fw-bold">Pemberdayaan</h5>
                        <p class="text-muted">Memberi bantuan dan pelatihan untuk kemandirian ekonomi.</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center card-kemanusiaan" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
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
            <div class="text-center section-title mx-auto mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Program Unggulan</h2>
                <p class="text-muted">Program-program utama yang membantu masyarakat dan memberdayakan komunitas.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
                    <div class="card h-100 shadow-sm card-edu">
                        <img src="https://placehold.co/600x400" class="card-img-top" alt="Program Pendidikan">
                        <div class="card-body">
                            <h5>Pendidikan</h5>
                            <p>Mendukung pelajar dan santri melalui beasiswa serta fasilitas belajar.</p>
                            <a href="#" class="btn btn-primary">Lihat Program</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
                    <div class="card h-100 shadow-sm card-human">
                        <img src="https://placehold.co/600x400" class="card-img-top" alt="Program Kemanusiaan">
                        <div class="card-body">
                            <h5>Kemanusiaan</h5>
                            <p>Bantuan sosial dan tanggap darurat untuk keluarga yang terdampak.</p>
                            <a href="#" class="btn btn-primary">Lihat Program</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="flip-left" data-aos-delay="300">
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
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-4" data-aos="fade-up">
                <div>
                    <h2 class="fw-bold">Artikel Edukasi</h2>
                    <p class="text-muted">Berisi artikel dan panduan zakat, infak, sedekah, serta informasi keagamaan.</p>
                </div>
                <a href="/edukasi" class="btn btn-warning btn-lg mt-3 mt-md-0">Lihat Semua Artikel</a>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
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
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
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
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
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
            <div class="d-flex justify-content-between align-items-start mb-4" data-aos="fade-up">
                <div>
                    <h2 class="fw-bold">Berita Terbaru</h2>
                    <p class="text-muted">Update kegiatan dan kisah nyata dari program kami. Lihat lebih lengkap di halaman Berita.</p>
                </div>
                <a href="/berita" class="btn btn-warning btn-lg">Lihat Semua Berita</a>
            </div>

            @if($latestNews->isNotEmpty())
                <div class="row g-4">
                    @foreach($latestNews as $i => $item)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
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
    <section class="py-5 text-white position-relative" style="background-image: linear-gradient(rgba(13,110,253,0.85), rgba(132,216,247,0.9)), url('{{ asset('assets/images/baground.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="container text-center position-relative" style="z-index: 2;" data-aos="zoom-in" data-aos-duration="1000">
            <h2 class="fw-bold mb-3">Mari Menjadi Bagian Dari Kebaikan</h2>
            <p class="mb-4 lead text-white-50">Bersama Dareliman Peduli, kontribusi Anda dapat membantu banyak saudara.</p>
            <a href="/donasi" class="btn btn-warning btn-lg fw-bold rounded-pill px-5 shadow" style="transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">Donasi Sekarang</a>
        </div>
    </section>

</div>

@if(isset($popup) && $popup->is_active)
<!-- Global Promo Popup Modal -->
<div class="modal fade" id="promoPopupModal" tabindex="-1" aria-labelledby="promoPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden position-relative">
            <!-- Tombol Close -->
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 shadow-sm bg-dark bg-opacity-50" style="z-index: 10; border-radius: 50%; padding: 0.6rem;" data-bs-dismiss="modal" aria-label="Close"></button>
            
            <!-- Gambar Popup -->
            @if($popup->image_url)
            <img src="{{ asset($popup->image_url) }}" alt="Popup Promo" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
            @endif
            
            <div class="modal-body text-center p-4">
                <h4 class="fw-bold mb-3" id="promoPopupLabel">{{ $popup->title }}</h4>
                @if($popup->description)
                <p class="text-muted mb-4">{{ $popup->description }}</p>
                @endif
                
                @if($popup->button_url && $popup->button_text)
                <a href="{{ $popup->button_url }}" class="btn btn-primary btn-lg rounded-pill px-5 fw-semibold shadow-sm w-100 mb-2">{{ $popup->button_text }}</a>
                @endif
                
                <button type="button" class="btn btn-link text-muted text-decoration-none small p-0 mt-2" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@if(isset($popup) && $popup->is_active)
@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    if(!sessionStorage.getItem('popupShown')) {
        let delayInSeconds = {{ $popup->delay ?? 3 }};
        setTimeout(function() {
            var el = document.getElementById('promoPopupModal');
            if(el) {
                var promoModal = new bootstrap.Modal(el);
                promoModal.show();
                sessionStorage.setItem('popupShown', 'true');
            }
        }, delayInSeconds * 1000);
    }
});
</script>
@endpush
@endif