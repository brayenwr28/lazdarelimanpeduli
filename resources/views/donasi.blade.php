@extends('layouts.app')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container">
        <div class="mb-5 d-flex justify-content-between align-items-center">
            <h2 class="fw-bold m-0">Mari Bantu Mereka</h2>
        </div>

        <div class="row g-4">
            @forelse($programs as $program)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ $program->image_url ?: 'https://via.placeholder.com/400x250?text=Gambar+Program' }}" class="card-img-top" alt="{{ $program->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="fw-bold mb-3">{{ $program->title }}</h5>
                        <p class="text-muted small mb-4 flex-grow-1">{{ Str::limit($program->description, 100) }}</p>
                        
                        @php
                            $terkumpul = $program->donations()->where('status', 'success')->sum('amount');
                            $donatur = $program->donations()->distinct('donor_email')->count('donor_email');
                            if($donatur == 0) $donatur = $program->donations()->count();
                            $progress = $program->target_amount > 0 ? min(100, ($terkumpul / $program->target_amount) * 100) : 0;
                        @endphp

                        <div class="d-flex justify-content-between align-items-end mb-2">
                            <h6 class="fw-bold text-dark m-0">Rp {{ number_format($terkumpul, 0, ',', '.') }}</h6>
                            <small class="text-muted"><i class="bi bi-people-fill me-1"></i>{{ $donatur }} Donatur</small>
                        </div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between small text-muted mb-4">
                            <span>{{ number_format($progress, 2) }} % dari target Rp {{ number_format($program->target_amount, 0, ',', '.') }}</span>
                            <span><i class="bi bi-clock me-1"></i>- hari lagi</span>
                        </div>
                        
                        <a href="/donasi/form?category={{ $program->category }}&program_id={{ $program->id }}" class="btn btn-warning w-100 fw-bold rounded-3">Bantu Sekarang</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white shadow-sm rounded-4">
                    <h4 class="text-muted mb-0">Belum ada program donasi yang aktif.</h4>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- AUDIO NOTIFICATION FOR LOGIN SUCCESS -->
@if (session('success'))
<script>
    function playAudioNotification() {
        const speech = new SpeechSynthesisUtterance();
        speech.text = "Ahlan wa Sahlan di Website Resmi LAZ Dar el-Iman Peduli. Jembatan Kebaikan, Mengalirkan Berkah untuk Sesama.";
        speech.lang = 'id-ID';
        speech.rate = 0.9;git push.
        speech.pitch = 1;
        speech.volume = 1;
        
        speechSynthesis.cancel();
        speechSynthesis.speak(speech);
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', playAudioNotification);
    } else {
        playAudioNotification();
    }
    setTimeout(playAudioNotification, 500);
</script>
@endif
@endsection
