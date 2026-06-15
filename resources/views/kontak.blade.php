@extends('layouts.app')

@section('content')

<!-- Header Section -->
<section class="py-5 text-center bg-light">
    <div class="container">
        <span class="text-uppercase text-primary fw-semibold">Hubungi Kami</span>
        <h1 class="fw-bold mt-2">Kontak</h1>
        <p class="text-muted mx-auto" style="max-width: 700px;">Hubungi kami untuk informasi, pertanyaan, atau kerja sama. Tim kami siap membantu Anda.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-start">
            <!-- Contact Info & Map -->
            <div class="col-lg-6">
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">Informasi Kontak</h5>
                    <div class="d-flex gap-3 mb-3">
                        <div class="text-primary" style="min-width: 24px;">📞</div>
                        <div>
                            <strong>WhatsApp</strong>
                            <p class="text-muted">+62 812-1157-7715</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mb-3">
                        <div class="text-primary" style="min-width: 24px;">📧</div>
                        <div>
                            <strong>Email</strong>
                            <p class="text-muted">darelimanpeduli@gmail.com
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="text-primary" style="min-width: 24px;">📍</div>
                        <div>
                            <strong>Alamat</strong>
                            <p class="text-muted">Jl. Belanti Barat 6, No. 12, Kecamatan Padang Utara, Kota Padang, Sumatera Barat
                        </div>
                    </div>
                </div>

               <div class="mt-4">
    <h5 class="fw-bold mb-3">Lokasi Kami</h5>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3142079038036!2d100.35059127593574!3d-0.9175608990736021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302fd900126e4b79%3A0x48cc49b42038b38d!2sDareliman%20Peduli!5e0!3m2!1sid!2sid!4v1718012000000!5m2!1sid!2sid" width="100%" height="350" style="border: 0; border-radius: 1rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="service-form-card p-4 p-lg-5">
                    <h5 class="fw-bold mb-4">Ajukan Pertanyaan Seputar Muamalah, Zakat & Waris</h5>
                    <p class="text-muted mb-4">Isi formulir di bawah ini untuk menghubungi kami secara langsung. Tim kami akan merespons pesan Anda secepat mungkin. Terima kasih atas kepercayaan Anda kepada LAZ Dareliman!</p>
                    
                    <form>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">No. Telp / WhatsApp <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" placeholder="Masukkan nomor telepon atau WhatsApp aktif" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" placeholder="Tuliskan alamat email Anda">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pekerjaan</label>
                            <input type="text" class="form-control" placeholder="Tuliskan pekerjaan atau profesi Anda">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pesan <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="5" placeholder="Tuliskan pertanyaan Anda" required></textarea>
                        </div>

                        <div class="mb-4 d-flex align-items-center gap-2">
                            <input type="checkbox" id="captcha" class="form-check-input">
                            <label for="captcha" class="form-check-label small">
                                <span class="text-success">✓ Berhasil</span>
                                <img src="https://www.gstatic.com/recaptcha/admin/channel_v3/images/sun_cloudflare_logo.svg" alt="Cloudflare" height="20" class="ms-2">
                            </label>
                        </div>

                        <button type="submit" class="btn btn-warning px-4 fw-bold">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
