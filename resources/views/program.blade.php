@extends('layouts.app')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container">
        <div class="mb-5 text-center">
            <h2 class="fw-bold m-0" style="color: #0066b2; font-size: 2.25rem;">Program Pilihan Kami</h2>
            <p class="text-muted mt-2">Pilih program kebaikan yang ingin Anda dukung hari ini.</p>
        </div>

        <div class="row g-4">
            @forelse($programs as $program)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover" style="transition: transform 0.2s ease, box-shadow 0.2s ease; background: #ffffff;">
                    <a href="{{ route('program.show', $program->id) }}">
                        <img src="{{ $program->image_url ? asset($program->image_url) : 'https://via.placeholder.com/400x250?text=Gambar+Program' }}" class="card-img-top" alt="{{ $program->title }}" style="height: 210px; object-fit: cover;">
                    </a>
                    
                    <div class="card-body d-flex flex-column p-4">
                        <a href="{{ route('program.show', $program->id) }}" class="text-decoration-none">
                            <h5 class="fw-bold mb-2 text-dark text-hover" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 48px; line-height: 1.4; transition: color 0.2s;">
                                {{ $program->title }}
                            </h5>
                        </a>
                        
                        <p class="text-muted small mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 38px;">
                            {{ Str::limit(strip_tags($program->description), 100) }}
                        </p>
                        
                        @php
                            $terkumpul = $program->donations()->where('status', 'success')->sum('amount');
                            $donatur = $program->donations()->distinct('donor_email')->count('donor_email');
                            if($donatur == 0) $donatur = $program->donations()->count();
                            $progress = $program->target_amount > 0 ? min(100, ($terkumpul / $program->target_amount) * 100) : 0;
                        @endphp

                        <div class="mb-2">
                            <span class="text-muted d-block small mb-1" style="font-size: 0.8rem;">Terkumpul</span>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h5 class="fw-bold m-0" style="color: #0066b2; font-weight: 800;">
                                    Rp {{ number_format($terkumpul, 0, ',', '.') }}
                                </h5>
                                <span class="fw-bold small" style="color: #0066b2;">{{ number_format($progress, 0) }}%</span>
                            </div>
                        </div>
                        
                        <div class="progress mb-3" style="height: 7px; background-color: #e9ecef; border-radius: 10px;">
                            <div class="progress-bar rounded-pill" role="progressbar" style="width: {{ $progress }}%; background-color: #0066b2;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center small text-muted border-top pt-3 mb-4">
                            <div>
                                <span class="d-block text-muted" style="font-size: 0.75rem;">Target</span>
                                <span class="fw-semibold text-dark">Rp {{ number_format($program->target_amount, 0, ',', '.') }}</span>
                            </div>
                            <div class="text-end">
                                <span class="d-block text-muted" style="font-size: 0.75rem;">Donatur</span>
                                <span class="fw-semibold text-dark"><i class="bi bi-people-fill me-1 text-secondary"></i>{{ $donatur }}</span>
                            </div>
                        </div>
                        
                        <a href="/donasi/form?category={{ $program->category }}&program_id={{ $program->id }}" class="btn text-white w-100 fw-bold py-25 rounded-3 shadow-sm btn-donasi" style="background-color: #0066b2; border: none; transition: background-color 0.2s;">
                            Bantu Sekarang
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white shadow-sm rounded-4 border border-light">
                    <i class="bi bi-heart text-muted mb-3" style="font-size: 3rem; color: #6c757d;"></i>
                    <h5 class="text-muted mb-0">Belum ada program yang aktif saat ini.</h5>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.08) !important;
    }
    .text-hover:hover {
        color: #0066b2 !important;
    }
    .btn-donasi:hover {
        background-color: #005292 !important; /* Warna biru sedikit lebih gelap saat di-hover */
    }
</style>
@endsection