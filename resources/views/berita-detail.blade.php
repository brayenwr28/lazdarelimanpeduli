@extends('layouts.app')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb small mb-0">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="/berita" class="text-decoration-none">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
                    </ol>
                </nav>

                <article class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    @if($news->image_url)
                        <img src="{{ asset($news->image_url) }}" class="w-100" alt="{{ $news->title }}" style="max-height: 420px; object-fit: cover;">
                    @endif

                    <div class="card-body p-4 p-md-5">
                        <p class="text-muted small mb-3">
                            <i class="bi bi-calendar-event me-2"></i>
                            {{ $news->published_at ? $news->published_at->translatedFormat('d F Y') : $news->created_at->translatedFormat('d F Y') }}
                        </p>
                        <h1 class="fw-bold mb-3" style="color: #0066b2; line-height: 1.3;">{{ $news->title }}</h1>
                        <p class="text-muted">Update terbaru dari Dareliman Peduli.</p>

                        <div class="mt-4" style="line-height: 1.8; color: #334155; font-size: 1.02rem;">
                            {!! nl2br(e($news->content)) !!}
                        </div>
                    </div>
                </article>
            </div>

            <aside class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 100px;">
                    <h5 class="fw-bold mb-3">Berita Lainnya</h5>
                    <div class="d-grid gap-3">
                        @forelse($latestNews as $item)
                            <a href="{{ route('news.show', $item->slug) }}" class="text-decoration-none text-dark">
                                <div class="border rounded-4 p-3 bg-light">
                                    <small class="text-muted d-block mb-2">{{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : $item->created_at->translatedFormat('d F Y') }}</small>
                                    <h6 class="fw-bold mb-0">{{ $item->title }}</h6>
                                </div>
                            </a>
                        @empty
                            <p class="text-muted small mb-0">Belum ada berita lain saat ini.</p>
                        @endforelse
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
