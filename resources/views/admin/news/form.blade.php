@extends('admin.layout')
@section('page_title', isset($news) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">{{ isset($news) ? 'Edit Berita' : 'Tambah Berita' }}</h3>
    <a href="{{ route('admin.news.index') }}" class="btn btn-light border fw-bold"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="{{ isset($news) ? route('admin.news.update', $news->id) : route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($news)) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Judul Berita</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $news->title ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Konten Artikel</label>
                <textarea name="content" class="form-control" rows="8" required>{{ old('content', $news->content ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Gambar Utama (Thumbnail)</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Maksimal 10MB.</small>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Status Tayang</label>
                <select name="status" class="form-select">
                    <option value="published" {{ (old('status', $news->status ?? '') == 'published') ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ (old('status', $news->status ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary fw-bold px-4 rounded-pill">Simpan Berita</button>
        </form>
    </div>
</div>
@endsection
