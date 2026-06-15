@extends('layouts.app')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container">
        <div class="mb-5 text-center">
            <h2 class="fw-bold m-0" style="color: #0066b2;">Berita & Update</h2>
            <p class="text-muted mt-2">Informasi terkini seputar kegiatan dan penyaluran donasi LAZ Dar el-Iman Peduli.</p>
        </div>

        <div class="row g-4">
            @forelse($news as $item)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ $item->image_url ? asset($item->image_url) : 'https://via.placeholder.com/400x250?text=Berita' }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-muted small mb-2"><i class="bi bi-calendar-event me-2"></i>{{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : $item->created_at->translatedFormat('d F Y') }}</div>
                        <h5 class="fw-bold mb-3 text-dark">{{ $item->title }}</h5>
                        <p class="text-muted small mb-4 flex-grow-1">{{ Str::limit(strip_tags($item->content), 120) }}</p>
                        
                        <a href="{{ route('news.show', $item->slug) }}" class="btn btn-outline-primary fw-bold rounded-pill w-100">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white shadow-sm rounded-4">
                    <h4 class="text-muted mb-0">Belum ada berita yang diterbitkan saat ini.</h4>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
