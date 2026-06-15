@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-uppercase text-warning fw-semibold">Layanan</span>
            <h1 class="fw-bold">Konsultasi Zakat</h1>
            <p class="text-muted mx-auto" style="max-width: 700px;">Kami hadir untuk membantu Anda memahami dan melaksanakan zakat sesuai dengan ketentuan syariat. Isi formulir ini untuk mendapatkan konsultasi terkait zakat, baik untuk perorangan maupun perusahaan.</p>
        </div>

        <div class="service-form-card p-4 p-lg-5 mx-auto" style="max-width: 760px;">
            <form>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Masukkan nama lengkap Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">No. Telp / WhatsApp <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" placeholder="Masukkan nomor telepon atau WhatsApp aktif">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan alamat email Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Pekerjaan</label>
                    <input type="text" class="form-control" placeholder="Tuliskan pekerjaan atau profesi Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Pertanyaan <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="5" placeholder="Tuliskan pertanyaan Anda"></textarea>
                </div>
                <div class="mb-4 alert alert-success d-flex align-items-center gap-3" role="alert">
                    <span class="badge bg-success rounded-pill">Berhasil!</span>
                    <div>Formulir siap dikirim. Kami akan segera menghubungi Anda.</div>
                </div>
                <button type="submit" class="btn btn-warning px-4">Kirim</button>
            </form>
        </div>
    </div>
</section>
@endsection
