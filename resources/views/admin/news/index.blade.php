@extends('admin.layout')
@section('page_title', 'Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">Kelola Berita</h3>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary fw-bold px-4 rounded-3"><i class="bi bi-plus-lg me-2"></i>Tambah Berita</a>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-muted small bg-white" style="border-bottom: 2px solid #f4f7f6;">
                    <tr>
                        <th class="border-0 px-4 py-3">Gambar</th>
                        <th class="border-0 py-3">Judul</th>
                        <th class="border-0 py-3">Tanggal</th>
                        <th class="border-0 py-3">Status</th>
                        <th class="border-0 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($news as $item)
                    <tr>
                        <td class="px-4 py-3 border-light" style="width: 120px;">
                            @if($item->image_url)
                                <img src="{{ asset($item->image_url) }}" alt="Gambar" class="rounded" style="width: 80px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 80px; height: 50px;"><i class="bi bi-image"></i></div>
                            @endif
                        </td>
                        <td class="py-3 border-light">
                            <strong class="text-dark d-block" style="font-size: 0.95rem;">{{ Str::limit($item->title, 60) }}</strong>
                            <small class="text-muted">Admin Dareliman Peduli</small>
                        </td>
                        <td class="py-3 text-muted small border-light">
                            {{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : '-' }}
                        </td>
                        <td class="py-3 border-light">
                            @if($item->status == 'published')
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold border border-success border-opacity-25"><i class="bi bi-eye-fill me-1"></i>Published</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-2 fw-bold border border-secondary border-opacity-25">Draft</span>
                            @endif
                        </td>
                        <td class="py-3 text-center border-light">
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-light rounded-circle text-primary border" style="width: 32px; height: 32px;"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light rounded-circle text-danger border" style="width: 32px; height: 32px;"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">Belum ada berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
