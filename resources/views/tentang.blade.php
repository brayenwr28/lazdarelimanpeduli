@extends('layouts.app')

@section('content')

<!-- Header Section -->
<section class="py-5 text-center bg-light">
    <div class="container">
        <span class="text-uppercase text-primary fw-semibold">About Me</span>
        <h1 class="fw-bold mt-2">Profil Laz Dareliman Peduli</h1>
    </div>
</section>

<!-- Profile Section -->
<section class="py-5" style="background: linear-gradient(to bottom, #ffffff, #f8f9fa);">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- Bagian Gambar dengan Efek Hover & Dekorasi -->
            <div class="col-lg-6">
                <div class="position-relative p-2">
                    <!-- Efek background dekoratif di belakang gambar -->
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-10 rounded translation-middle" style="transform: translate(-10px, -10px); z-index: 1;"></div>
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=60" 
                         alt="Profil Dareliman" 
                         class="img-fluid rounded-4 shadow-lg position-relative" 
                         style="z-index: 2; transition: transform 0.3s ease; object-fit: cover;"
                         onmouseover="this.style.transform='scale(1.02)'" 
                         onmouseout="this.style.transform='scale(1)'">
                </div>
            </div>
            
            <!-- Bagian Teks -->
            <div class="col-lg-6">
                <div class="ps-lg-3">
                    <span class="text-uppercase text-primary fw-bold small tracking-wider mb-2 d-block">Tentang Kami</span>
                    <h3 class="fw-bold mb-4 position-relative pb-2" style="color: #74b6f8;">
                        Sekilas Profil & Sejarah Laz Dareliman Peduli!
                        <span class="position-absolute bottom-0 start-0 bg-primary" style="width: 60px; hieght: 3px; height: 3px; border-radius: 2px;"></span>
                    </h3>
                    
                    <!-- Paragraf 1 -->
                    <p class="text-muted mb-3" style="text-align: justify; line-height: 1.7;">
                        LAZ Dareliman Peduli adalah Lembaga Amil Zakat tingkat Provinsi di bawah naungan Yayasan Darel Iman Peduli. LAZ DEIPED memiliki tujuan menjadi Lembaga Amil Zakat yang profesional, tunduk terhadap Syari’at Islam, Amanah dan Terpercaya di Sumatera Barat Khususnya, Indonesia Umumnya.
                    </p>
                    
                    <!-- Paragraf 2 -->
                    <p class="text-muted mb-3" style="text-align: justify; line-height: 1.7;">
                        LAZ Dareliman Peduli menyalurkan Zakat, Infaq, Sedekah dan Dana Sosial lainnya di bidang Dakwah, Pendidikan, Kesehatan, Pengentasan Kemiskinan, Bencana & Kemanusiaan. Kepercayaan masyarakat adalah aset terbesar kami. Oleh karena itu, setiap rupiah yang Anda sumbangkan dikelola dengan penuh tanggung jawab untuk memberikan dampak maksimal.
                    </p>
                    
                    <!-- Paragraf 3 -->
                    <p class="text-muted mb-0" style="text-align: justify; line-height: 1.7;">
                        Awalnya, LAZ Dareliman Peduli merupakan Div. Sosial di bawah naungan Yayasan Dar el-Iman, bergerak di bidang sosial menyalurkan Zakat Infaq Sedekah serta dana sosial lainnya. Lahirnya sejak tahun 2019 dengan nama Divisi Sosial Yayasan Dar el-Iman, tahun 2021 re-branding menjadi Dareliman Peduli dan pada 19 Mei 2023 resmi menjadi badan hukum sendiri bernama YAYASAN DAREL IMAN PEDULI.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visi & Misi -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Visi & Misi</h2>
        </div>
        <div class="row g-4 justify-content-center">
            
            <!-- Visi (Card Biru Gradasi Elegan) -->
            <div class="col-12 col-lg-10">
                <div class="card shadow border-0 mb-4 bg-primary bg-gradient text-white rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="mb-3 display-6">🎯</div>
                        <h4 class="fw-bold text-warning mb-3">Visi</h4>
                        <p class="lead mb-0" style="opacity: 0.95; line-height: 1.8;">
                            Menjadi Lembaga Amil Zakat yang tunduk terhadap syari’at Islam, profesional, amanah, terpercaya, cepat, bermanfaat, dan tepat sasaran di Prov. Sumatera Barat & Indonesia.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Misi (Card Putih Bersih dengan Detail Aksen Biru) -->
            <div class="col-12 col-lg-10">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="me-3 display-6 text-primary">📋</div>
                            <h4 class="fw-bold text-primary mb-0">Misi</h4>
                        </div>
                        
                        <div class="row g-4">
                            <!-- Poin A -->
                            <div class="col-12">
                                <div class="p-3 rounded-3" style="background-color: #f0f7ff; border-left: 4px solid #0d6efd;">
                                    <h6 class="fw-bold text-primary mb-2">a. Syari’at Islam</h6>
                                    <ul class="text-muted ps-3 mb-0" style="list-style-type: disc;">
                                        <li class="mb-2">Beraqidah dan bermanhaj yang lurus sesuai Al-Qur’an dan Sunnah sesuai pemahaman salaful ummah.</li>
                                        <li class="mb-2">Melengkapi keilmuan yang mumpuni yang menjadi dasar dalam bertindak dan berperilaku.</li>
                                        <li class="mb-2">Koordinasi dengan Dewan Pengawas Syari’ah.</li>
                                        <li class="mb-2">Membentuk tim dengan ukhuwah yang baik.</li>
                                        <li class="mb-0">Memperkuat tim yang menjaga adab dalam beribadah.</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Poin B -->
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-3 h-100" style="background-color: #f0f7ff; border-left: 4px solid #0d6efd;">
                                    <h6 class="fw-bold text-primary mb-2">b. Berlandaskan Pancasila & UUD 1945</h6>
                                    <ul class="text-muted ps-3 mb-0" style="list-style-type: disc;">
                                        <li class="mb-2">Sesuai dengan aturan dan Undang-Undang yang berlaku.</li>
                                        <li class="mb-0">Menyalurkan program berkolaborasi dengan unsur-unsur regulator.</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Poin C -->
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-3 h-100" style="background-color: #f0f7ff; border-left: 4px solid #0d6efd;">
                                    <h6 class="fw-bold text-primary mb-2">c. Profesional dan Amanah</h6>
                                    <ul class="text-muted ps-3 mb-0" style="list-style-type: disc;">
                                        <li class="mb-0">Menjadi lembaga amil zakat terpercaya dalam menerima & menyalurkan ZIS.</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Poin D -->
                            <div class="col-12">
                                <div class="p-3 rounded-3" style="background-color: #f0f7ff; border-left: 4px solid #0d6efd;">
                                    <h6 class="fw-bold text-primary mb-2">d. Bermanfaat, Cepat & Tepat Sasaran</h6>
                                    <ul class="text-muted ps-3 mb-0" style="list-style-type: disc;">
                                        <li class="mb-2">Memastikan dana yang disalurkan terverifikasi.</li>
                                        <li class="mb-0">Memastikan dana yang terhimpun disalurkan dengan cepat dan memiliki manfaat yang maksimal.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Filosofi Logo Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-4">
            
            <!-- SEBELAH KIRI: Deskripsi Filosofi Logo (Bentuk Card Modern) -->
            <div class="col-lg-7 order-2 order-lg-1">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white" style="border-left: 5px solid #0dcaf0 !important;">
                    <div class="mb-3">
                        <span class="badge bg-info text-dark px-3 py-2 rounded-pill fw-semibold">Filosofi Lembaga</span>
                    </div>
                    <h2 class="fw-bold text-dark mb-4">Filosofi & Makna Logo</h2>
                    
                    <!-- Hadits Rasulullah (Blockquote dengan style biru) -->
                    <div class="p-3 bg-light rounded-3 mb-4 border-start border-info border-3">
                        <p class="fst-italic text-muted mb-2" style="font-size: 0.95rem;">
                            "Perumpamaan orang beriman itu bagaikan lebah. Ia makan yang bersih, mengeluarkan sesuatu yang bersih, hinggap di tempat yang bersih, dan tidak merusak atau mematahkan (yang dihinggapinya)"
                        </p>
                        <small class="fw-bold text-info">— HR. Ahmad, al-Hakim, dan al-Bazzar</small>
                    </div>
                    
                    <!-- Penjelasan Filosofi -->
                    <div class="text-muted" style="line-height: 1.8; text-align: justify;">
                        <p class="mb-3">
                            Logo ini terinspirasi dari lebah, mereka bekerja secara kolektif dan tunduk pada satu pimpinan. 
                            Lebah selalu hidup dalam koloni besar, tidak pernah menyendiri. Mereka pun bekerja secara 
                            kolektif dan masing-masing mempunyai tugas sendiri-sendiri.
                        </p>
                        <p class="mb-0">
                            Ketika mereka mendapatkan sumber sari madu, mereka akan memanggil teman-temannya untuk menghisapnya. 
                            Demikian pula ketika ada bahaya, seekor lebah akan mengeluarkan feromon (suatu zat kimia yang dikeluarkan 
                            oleh binatang tertentu untuk memberi isyarat tertentu) untuk mengundang teman-temannya agar membantu dirinya. 
                            Itulah seharusnya sikap orang-orang beriman yang diibaratkan seperti suatu bangunan yang tersusun kokoh 
                            <strong class="text-dark">(QS. ash-Shaff [61]:4)</strong>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- SEBELAH KANAN: Gambar Logo -->
            <div class="col-lg-5 order-1 order-lg-2 text-center">
                <div class="position-relative p-2">
                    <!-- Ornamen dekoratif latar belakang berwarna biru terang -->
                    <div class="position-absolute top-50 start-50 translate-middle bg-info opacity-10 rounded-circle" style="width: 80%; height: 80%; filter: blur(30px); z-index: 0;"></div>
                    
                    <!-- Pemanggilan file gambar -->
                    <img src="{{ asset('assets/images/Filosofi Logo.png') }}" alt="Filosofi Logo" class="img-fluid rounded-4 shadow position-relative" style="z-index: 1; max-height: 550px; object-fit: contain;">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Penghargaan Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold position-relative d-inline-block pb-2">
                Penghargaan
                <span class="position-absolute bottom-0 start-50 translate-middle-x" style="width: 50px; height: 3px; border-radius: 2px; background-color: #0d6efd;"></span>
            </h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- List Penghargaan 1 -->
                <div class="card border-0 border-bottom rounded-0 py-4 mb-2 style-award" style="transition: all 0.3s ease;">
                    <div class="row align-items-center g-4">
                        <div class="col-sm-3 col-md-2 text-sm-start text-center">
                            <h5 class="fw-bold text-dark mb-1">2025</h5>
                            <span class="fw-bold text-primary small text-uppercase">BAZNAS RI</span>
                        </div>
                        <div class="col-sm-6 col-md-7 text-sm-start text-center">
                            <p class="text-muted mb-0 fs-5" style="line-height: 1.6;">Piagam Penghargaan Dalam Kategori LAZ Kabupaten/Kota Pendistribusian Terbaik BAZNAS Award 2025</p>
                        </div>
                        <div class="col-sm-3 text-center">
                            <img src="{{ asset('assets/images/piagam1.png') }}" alt="Sertifikat BAZNAS Award 2025" class="img-fluid rounded shadow-sm border" style="max-height: 110px; object-fit: contain; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                </div>

                <!-- List Penghargaan 2 -->
                <div class="card border-0 border-bottom rounded-0 py-4 mb-2 style-award" style="transition: all 0.3s ease;">
                    <div class="row align-items-center g-4">
                        <div class="col-sm-3 col-md-2 text-sm-start text-center">
                            <h5 class="fw-bold text-dark mb-1">2025</h5>
                            <span class="fw-bold text-primary small text-uppercase">BAZNAS RI</span>
                        </div>
                        <div class="col-sm-6 col-md-7 text-sm-start text-center">
                            <p class="text-muted mb-0 fs-5" style="line-height: 1.6;">Piagam Penghargaan Dalam Kategori LAZ Kabupaten/Kota Pengumpulan Palestina Terbaik BAZNAS Award 2025</p>
                        </div>
                        <div class="col-sm-3 text-center">
                            <img src="{{ asset('assets/images/piagam2.png') }}" alt="Sertifikat BAZNAS Palestina" class="img-fluid rounded shadow-sm border" style="max-height: 110px; object-fit: contain; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                </div>

                <!-- List Penghargaan 3 -->
                <div class="card border-0 rounded-0 py-4 style-award" style="transition: all 0.3s ease;">
                    <div class="row align-items-center g-4">
                        <div class="col-sm-3 col-md-2 text-sm-start text-center">
                            <h5 class="fw-bold text-dark mb-1">2024</h5>
                            <span class="fw-bold text-primary small text-uppercase">Kemenag Kab. Bogor</span>
                        </div>
                        <div class="col-sm-6 col-md-7 text-sm-start text-center">
                            <p class="text-muted mb-0 fs-5" style="line-height: 1.6;">Piagam Penghargaan Atas Kolaborasi dan Kontribusi dalam Mendukung Program Pemberdayaan Ekonomi Umat Melalui Program Layanan Sertifikasi Produk Halal Tahun 2024</p>
                        </div>
                        <div class="col-sm-3 text-center">
                            <img src="{{ asset('assets/images/piagam3.png') }}" alt="Sertifikat Kemenag 2024" class="img-fluid rounded shadow-sm border" style="max-height: 110px; object-fit: contain; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-white position-relative" style="background-image: linear-gradient(rgb(132, 216, 247), rgb(118, 202, 255)), url('{{ asset('assets/images/baground.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container text-center position-relative" style="z-index: 2;">
        <h2 class="fw-bold mb-3">Mari Menjadi Bagian Dari Kebaikan</h2>
        <p class="mb-4 text-white-60">Bersama Dareliman Peduli, kontribusi Anda dapat membantu banyak saudara.</p>
<a href="donasi" class="btn btn-primary btn-lg fw-bold">Donasi Sekarang</a>
    </div>
</section>

@endsection