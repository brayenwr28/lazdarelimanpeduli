@extends('layouts.app')

@section('content')
<div class="bg-white py-3 border-bottom shadow-sm">
    <div class="container">
        <a href="/program" class="text-muted text-decoration-none small fw-bold"><i class="bi bi-arrow-left me-2"></i>Kembali ke Program</a>
    </div>
</div>

<section class="py-5" style="background-color: #fdfdfd;">
    <div class="container">
        <div class="row g-5">
            <!-- Sisi Kiri: Gambar dan Deskripsi -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
                    <img src="{{ $program->image_url ? asset($program->image_url) : 'https://via.placeholder.com/800x400' }}" alt="{{ $program->title }}" class="w-100" style="object-fit: cover;">
                </div>

                @php
                    $description = strip_tags($program->description, '<p><br><strong><em><ul><li><ol>');
                @endphp

                <div class="px-2">
                    <div class="prose max-w-none text-dark" style="line-height: 1.8; font-size: 1.05rem;">
                        {!! nl2br($description) !!}
                    </div>
                </div>

                <div class="d-flex gap-2 mt-5 px-2">
                    <button class="btn btn-success fw-bold px-4 rounded-pill"><i class="bi bi-share me-2"></i>Bagikan</button>
                    <button class="btn btn-light border fw-bold px-4 rounded-pill"><i class="bi bi-link-45deg me-2"></i>Salin Link</button>
                </div>

                @php
                    $terkumpul = $program->donations()->where('status', 'success')->sum('amount');
                    $progress = $program->target_amount > 0 ? min(100, ($terkumpul / $program->target_amount) * 100) : 0;
                @endphp
                <div class="card border border-light shadow-sm rounded-4 mt-5 mb-5">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3 text-dark">Progress</h6>
                        <h3 class="fw-bold mb-4" style="color: #0066b2;">Rp {{ number_format($terkumpul, 0, ',', '.') }}</h3>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%; background-color: #0066b2;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between small text-muted">
                            <span><i class="bi bi-bullseye me-1"></i>{{ $program->target_amount ? 'Target Rp ' . number_format($program->target_amount, 0, ',', '.') : 'Target Tak Terbatas' }}</span>
                            <span><i class="bi bi-clock me-1"></i>{{ $program->end_date ? \Carbon\Carbon::parse($program->end_date)->diffForHumans() : 'Terus Berjalan' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Sidebar Pembayaran -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    
                    <a href="/donasi/form?category={{ $program->category }}&program_id={{ $program->id }}" class="btn w-100 rounded-3 py-3 fw-bold fs-5 text-white shadow mb-4" style="background-color: #f39c12; border: none;">
                        Tunaikan Sekarang
                    </a>

                    @if($program->bank_name && $program->bank_account)
                    <div class="card border border-light shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-3 text-dark d-flex align-items-center"><i class="bi bi-bank me-2 text-primary fs-5"></i>Info Rekening</h6>
                            <div class="mb-3">
                                <small class="text-muted d-block mb-1">Bank</small>
                                <strong class="text-dark">{{ $program->bank_name }}</strong>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted d-block mb-1">Nomor Rekening</small>
                                <div class="d-flex align-items-center gap-2">
                                    <strong class="text-dark fs-5">{{ $program->bank_account }}</strong>
                                    <button class="btn btn-sm btn-light text-primary border p-1" title="Salin Rekening"><i class="bi bi-files"></i></button>
                                </div>
                            </div>
                            <div>
                                <small class="text-muted d-block mb-1">Atas Nama</small>
                                <strong class="text-dark">{{ $program->bank_account_name }}</strong>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($program->qris_image_url)
                    <div class="card border border-light shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-3 text-dark d-flex align-items-center"><i class="bi bi-qr-code-scan me-2 text-primary fs-5"></i>QRIS</h6>
                            <div class="text-center bg-light p-3 rounded-4 mb-3 border">
                                <img src="{{ asset($program->qris_image_url) }}" alt="QRIS" class="img-fluid rounded shadow-sm">
                            </div>
                            <p class="text-center small text-muted m-0">Scan QRIS di atas untuk pembayaran</p>
                        </div>
                    </div>
                    @endif

                    <div class="card border border-light shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-3 text-dark d-flex align-items-center"><i class="bi bi-cash-coin me-2 text-primary fs-5"></i>Pembayaran Tunai</h6>
                            <p class="small text-muted mb-0" style="line-height: 1.6;">
                                Bagi Anda yang ingin berdonasi secara tunai, silakan klik tombol <strong>Tunaikan Sekarang</strong> secara online, pilih metode <strong>Tunai</strong>, dan serahkan donasi langsung ke kantor layanan Dareliman Peduli.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
