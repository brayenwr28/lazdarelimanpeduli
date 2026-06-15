@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-uppercase text-warning fw-semibold">Layanan</span>
            <h1 class="fw-bold">Jemput Zakat / Donasi</h1>
            <p class="text-muted mx-auto" style="max-width: 700px;">Mudahnya berbagi dengan layanan jemput zakat dan donasi dari kami. Isi formulir ini untuk menjadwalkan penjemputan zakat atau donasi Anda, dan kami akan datang ke lokasi Anda sesuai waktu yang disepakati.</p>
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
                    <label class="form-label fw-semibold">Jenis Zakat / Donasi <span class="text-danger">*</span></label>
                    <select class="form-select">
                        <option selected>Pilih jenis zakat atau donasi</option>
                        <option>Zakat Fitrah</option>
                        <option>Zakat Mal</option>
                        <option>Infak/Sedekah</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="4" placeholder="Tuliskan alamat lengkap Anda"></textarea>
                </div>
                <div class="mb-4 alert alert-success d-flex align-items-center gap-3" role="alert">
                    <span class="badge bg-success rounded-pill">Berhasil!</span>
                    <div>Data siap diproses. Tim kami akan menghubungi Anda untuk konfirmasi jadwal.</div>
                </div>
                <button type="submit" class="btn btn-warning px-4">Kirim</button>
            </form>
        </div>
    </div>
</section>
@endsection
