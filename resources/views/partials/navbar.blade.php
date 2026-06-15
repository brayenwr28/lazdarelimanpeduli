<div class="topbar bg-light py-2 border-bottom">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center text-secondary small">
        <div>
            <span class="me-3">Tel: (+62) 811-8891-601</span>
            <span>Email: darelimanpeduli@gmail.com</span>
        </div>
        <div>
            <a href="#" class="text-secondary text-decoration-none me-3">Facebook</a>
            <a href="#" class="text-secondary text-decoration-none">Instagram</a>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid px-md-5">
        <!-- Bagian Brand yang sudah diperbaiki posisinya -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&display=swap" rel="stylesheet">

<a class="navbar-brand d-flex align-items-center ps-0" href="/">
    <img src="{{ asset('assets/logo/DARELIMAN PEDULI 1A.png') }}" alt="Logo Dar El Iman" class="navbar-logo d-inline-block align-top" style="height: 54px; width: auto;">
</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="/edukasi">Edukasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="/berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="/program">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="/pemberdayaan">Pemberdayaan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-primary" href="#" id="layananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Layanan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                        <li><a class="dropdown-item" href="/layanan/konsultasi">Konsultasi Zakat</a></li>
                        <li><a class="dropdown-item" href="/layanan/jemput">Jemput Zakat / Donasi</a></li>
                        <li><a class="dropdown-item" href="/layanan/konfirmasi">Konfirmasi Zakat / Donasi</a></li>
                    </ul>
                </option>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-primary" href="#" id="penyaluranDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Penyaluran
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="penyaluranDropdown">
                        <li><a class="dropdown-item" href="/penyaluran/laporan">Laporan</a></li>
                        <li><a class="dropdown-item" href="/penyaluran/dokumentasi">Dokumentasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-primary" href="#" id="tentangDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tentang Kami
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="tentangDropdown">
                        <li><a class="dropdown-item" href="/tentang">Profil Dareliman</a></li>
                        <li><a class="dropdown-item" href="/tentang/kontak">Kontak</a></li>
                        <li><a class="dropdown-item" href="/tentang/laporan">Laporan Keuangan Yayasan</a></li>
                    </ul>
                </li>
                <li class="nav-item d-none d-lg-block ms-2">
                    <a class="nav-link text-secondary" href="/search" aria-label="Cari">
                        🔍
                    </a>
                </li>

                <!-- AUTH BUTTONS -->
                @guest
                    <!-- Tampil saat belum login -->
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0 d-flex gap-2">
                        <a href="/login" class="btn btn-outline-primary fw-bold">
                            Masuk
                        </a>
                        <a href="/register" class="btn btn-outline-primary fw-bold">
                            Daftar
                        </a>
                    </li>
                @endguest

                @auth
                    <!-- Tampil saat sudah login -->
                    <li class="nav-item dropdown ms-lg-3 mt-2 mt-lg-0">
                        <a class="nav-link dropdown-toggle text-primary fw-bold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            👤 {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            @if(Auth::user()->role === 'admin')
                            <li><a class="dropdown-item fw-bold text-primary" href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                            <li><hr class="dropdown-divider"></li>
                            @endif
                            <li><a class="dropdown-item" href="/profile">Profil Saya</a></li>
                            <li><a class="dropdown-item" href="/donasi-saya">Riwayat Donasi</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <a href="/donasi" class="btn btn-primary fw-bold text-white px-4">
                        Ikut Berbagi!
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>