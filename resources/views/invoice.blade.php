@extends('layouts.app')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-primary mb-2">Detail Pembayaran Donasi</h2>
                            <p class="text-muted">Kode Transaksi: <span class="fw-bold text-dark">{{ $donation->donation_code }}</span></p>
                        </div>

                        <!-- SUCCESS MESSAGE -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="p-4 bg-primary bg-opacity-10 rounded-3 border border-primary mb-4">
                            <h5 class="fw-bold mb-3 border-bottom border-primary pb-2">Ringkasan Donasi</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Nama Donatur:</span>
                                <strong>{{ $donation->donor_name }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Kategori:</span>
                                <strong class="text-capitalize">{{ $donation->campaign_category }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Metode Pembayaran:</span>
                                <strong class="text-uppercase">{{ str_replace('_', ' ', $donation->payment_method) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mt-3 pt-3 border-top border-primary">
                                <span class="h5 mb-0">Total Tagihan:</span>
                                <strong class="h4 text-primary mb-0">Rp {{ number_format($donation->amount, 0, ',', '.') }}</strong>
                            </div>
                        </div>

                        <div class="alert alert-warning border-warning rounded-3" role="alert">
                            <h6 class="fw-bold mb-2"><i class="bi bi-info-circle me-1"></i> Instruksi Pembayaran</h6>
                            <p class="mb-0 small">
                                Silakan lakukan pembayaran sesuai dengan metode yang Anda pilih sejumlah <strong>Rp {{ number_format($donation->amount, 0, ',', '.') }}</strong>. 
                                Setelah melakukan transfer, simpan bukti pembayaran Anda. Kami akan segera memverifikasi donasi Anda.
                            </p>
                        </div>

                        <div class="mt-4 d-grid gap-2">
                            <a href="/" class="btn btn-primary fw-bold py-3 rounded-2">
                                Kembali ke Beranda
                            </a>
                            <a href="/donasi" class="btn btn-outline-secondary fw-bold py-2 rounded-2">
                                Buat Donasi Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
