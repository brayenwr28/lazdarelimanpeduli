@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-uppercase text-warning fw-semibold">Layanan</span>
            <h1 class="fw-bold">Konfirmasi Zakat / Donasi</h1>
            <p class="text-muted mx-auto" style="max-width: 700px;">Terima kasih telah menunaikan zakat atau donasi melalui kami. Mohon isi formulir ini untuk mengonfirmasi transaksi Anda, agar kami dapat memastikan dana Anda tersalur tercatat dengan baik dan digunakan sesuai dengan tujuan Anda.</p>
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
                    <input type="email" class="form-control" placeholder="Tuliskan alamat email Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Pekerjaan</label>
                    <input type="text" class="form-control" placeholder="Tuliskan pekerjaan atau profesi Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Konfirmasi <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="konfirmasiType" id="konfirmasiZakat" checked>
                        <label class="form-check-label" for="konfirmasiZakat">Zakat</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="konfirmasiType" id="konfirmasiDonasi">
                        <label class="form-check-label" for="konfirmasiDonasi">Donasi</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jumlah</label>
                    <input type="text" class="form-control" placeholder="Rp. Masukkan nominal zakat atau donasi Anda (dalam Rupiah)">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Rekening Asal</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama dan nomor rekening pengirim">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Bukti Transfer</label>
                    <input class="form-control" type="file">
                </div>
                <div class="mb-4 alert alert-success d-flex align-items-center gap-3" role="alert">
                    <span class="badge bg-success rounded-pill">Berhasil!</span>
                    <div>Formulir siap dikirim. Data Anda akan kami cek dan verifikasi.</div>
                </div>
                <div class="mb-4 small text-muted">Dengan mengirimkan formulir ini, saya menyatakan bahwa dana yang didonasikan melalui LAZ Dareliman adalah berasal dari dana yang halal dan bukan bersumber dari atau untuk tujuan pencucian uang (money laundering), termasuk terorisme maupun tindakan kejahatan lainnya.</div>
                <button type="submit" class="btn btn-warning px-4">Kirim</button>
            </form>
        </div>
    </div>
</section>
@endsection
