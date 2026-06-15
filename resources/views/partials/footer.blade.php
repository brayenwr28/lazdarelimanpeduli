<footer class="custom-footer text-white py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <!-- Kolom 1: Brand, Logo & Deskripsi Singkat -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/logo/DARELIMAN PEDULI 1A.png') }}" alt="Logo Dar El Iman" class="me-3" style="height: 57px; width: auto;">
                    <div>
                        <h5 class="fw-bold mb-0 text-white" style="letter-spacing: 0.5px;">LAZ Dareliman Peduli</h5>
                        <small class="text-white-50" style="font-size: 0.75rem;">Berta'awun Untuk Membangun</small>
                    </div>
                </div>
                <p class="small text-muted lh-lg pe-lg-3">Membangun kebaikan bersama melalui pengelolaan zakat, infak, sedekah, wakaf, serta program kemanusiaan secara amanah, transparan, dan profesional.</p>
                
                <!-- Ikon Sosial Media Modern -->
                <div class="footer-social mt-4">
                    <a href="#" class="social-link facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link instagram" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link youtube" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="social-link tiktok" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Navigasi Menu -->
            <div class="col-lg-2 col-md-6 ps-lg-4">
                <h6 class="fw-bold text-uppercase mb-3 footer-title">Navigasi</h6>
                <ul class="list-unstyled small footer-links">
                    <li class="mb-2"><a href="/" class="text-muted text-decoration-none">Beranda</a></li>
                    <li class="mb-2"><a href="/tentang" class="text-muted text-decoration-none">Profil Lembaga</a></li>
                    <li class="mb-2"><a href="/artikel" class="text-muted text-decoration-none">Artikel & Berita</a></li>
                    <li class="mb-2"><a href="/kontak" class="text-muted text-decoration-none">Hubungi Kami</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Program Unggulan -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-uppercase mb-3 footer-title">Program Utama</h6>
                <ul class="list-unstyled small footer-links">
                    <li class="mb-2"><a href="/program" class="text-muted text-decoration-none">Pendidikan & Beasiswa</a></li>
                    <li class="mb-2"><a href="/program" class="text-muted text-decoration-none">Dakwah & Sosial</a></li>
                    <li class="mb-2"><a href="/program" class="text-muted text-decoration-none">Kesehatan Masyarakat</a></li>
                    <li class="mb-2"><a href="/program" class="text-muted text-decoration-none">Tanggap Darurat</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Informasi Kontak Lengkap -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-uppercase mb-3 footer-title">Kontak & Kantor</h6>
                <ul class="list-unstyled small text-muted project-contact">
                    <li class="mb-3 d-flex align-items-start">
                        <span class="me-2 mt-1"><i class="fas fa-map-marker-alt text-white"></i></span>
                        <span class="lh-base">Jl. Belanti Barat 6, No. 12, Kecamatan Padang Utara, Kota Padang, Sumatera Barat</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <span class="me-2"><i class="fab fa-whatsapp text-success fw-bold"></i></span>
                        <a href="https://wa.me/6281211577715" target="_blank" class="text-muted text-decoration-none text-hover-white">+62 812-1157-7715</a>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <span class="me-2"><i class="fas fa-envelope text-white"></i></span>
                        <span>darelimanpeduli@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Garis Pembatas Tipis -->
        <hr class="my-4 border-secondary" style="opacity: 0.15;">
        
        <!-- Bagian Hak Cipta & Kebijakan -->
        <div class="row align-items-center small text-muted">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                &copy; 2026 <span class="text-white">LAZ Dareliman Peduli</span>. Semua hak dilindungi.
            </div>
            <div class="col-md-6 text-center text-md-end footer-policy">
                <a href="#" class="text-muted text-decoration-none me-3">Syarat & Ketentuan</a>
                <a href="#" class="text-muted text-decoration-none">Kebijakan Privasi</a>
            </div>
        </div>
    </div>
</footer>

<!-- Style Custom untuk Membuat Tampilan Lebih Tajam & Interaktif -->
<style>
    /* Latar Belakang Utama Footer (Warna Arang Premium) */
    .custom-footer {
        background-color: #3e98ec !important;
        font-family: system-ui, -apple-system, sans-serif;
    }

    /* Pengaturan teks abu-abu lembut agar kontras */
    .custom-footer .text-muted {
        color: #ffffff !important;
    }

    /* Efek Header Kolom */
    .footer-title {
        color: #ffffff;
        font-size: 0.9rem;
        letter-spacing: 1.2px;
        position: relative;
        padding-bottom: 5px;
    }

    /* Efek Hover Animasi Pada Tautan Menu Navigasi */
    .footer-links a {
        transition: all 0.25s ease-in-out;
        display: inline-block;
    }
    .footer-links a:hover {
        color: #ffffff !important;
        transform: translateX(4px);
    }

    /* Efek Hover Tautan Umum */
    .text-hover-white:hover {
        color: #ffffff !important;
    }
    .footer-policy a:hover {
        color: #ffffff !important;
    }

    /* Kustomisasi Lingkaran Ikon Sosial Media */
    .footer-social .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: rgba(111, 211, 251, 0.05);
        color: #ffffff;
        margin-right: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    /* Variasi Hover Berdasarkan Jenis Platform */
    .footer-social .social-link:hover {
        color: #ffffff;
        transform: translateY(-3px);
        background-color: #0b5ed7; /* Warna utama biru identitas */
        box-shadow: 0 4px 12px rgba(11, 94, 215, 0.3);
    }
</style>