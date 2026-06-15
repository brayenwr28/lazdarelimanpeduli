@extends('admin.layout')
@section('page_title', 'Popup Promosi')

@section('content')
<div class="row g-4">
    <div class="col-lg-7">
        <form action="{{ route('admin.popups.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-dark m-0"><i class="bi bi-megaphone me-2 text-primary"></i>Popup Promosi</h4>
                    <p class="text-muted small m-0">Kelola popup promosi yang muncul di halaman utama website</p>
                </div>
                <button type="submit" class="btn btn-primary fw-bold px-4 rounded-3"><i class="bi bi-save me-2"></i>Simpan Perubahan</button>
            </div>

            <!-- Toggle Aktif -->
            <div class="card border-success bg-success bg-opacity-10 mb-4 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center p-3">
                    <div>
                        <h6 class="fw-bold text-dark m-0 d-flex align-items-center"><i class="bi bi-eye-fill text-success me-2"></i>Popup Aktif</h6>
                        <small class="text-muted">Popup akan muncul saat pengunjung membuka halaman utama</small>
                    </div>
                    <div class="form-check form-switch fs-4">
                        <input class="form-check-input" type="checkbox" name="is_active" {{ old('is_active', $popup->is_active ?? false) ? 'checked' : '' }}>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold"><i class="bi bi-image me-2 text-primary"></i>Gambar Flyer</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="text-muted d-block mt-1">Maksimal 10MB.</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Judul</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $popup->title ?? '') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $popup->description ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold"><i class="bi bi-box-arrow-up-right me-2 text-primary"></i>Call to Action (CTA)</label>
                        <div class="row g-3 mt-1">
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Teks Tombol</label>
                                <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $popup->button_text ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Tujuan URL (Link)</label>
                                <input type="text" name="button_url" class="form-control" value="{{ old('button_url', $popup->button_url ?? '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fw-bold"><i class="bi bi-clock-history me-2 text-primary"></i>Delay Tampil</label>
                        <div class="d-flex align-items-center gap-2">
                            <input type="number" name="delay" class="form-control text-center" style="width: 80px;" value="{{ old('delay', $popup->delay ?? 3) }}" min="0" required>
                            <span class="text-muted small">detik setelah halaman dibuka</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-5">
        <h6 class="fw-bold mb-3"><i class="bi bi-eye me-2 text-primary"></i>Preview Popup</h6>
        <div class="card bg-dark border-0 rounded-4 overflow-hidden shadow-lg" style="min-height: 500px; display: flex; align-items: center; justify-content: center; position: relative;">
            
            <!-- Simulasi Backdrop -->
            <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5);"></div>

            <!-- Kotak Popup -->
            <div class="bg-white rounded-4 overflow-hidden shadow" style="width: 85%; z-index: 10; position: relative;">
                @if(isset($popup) && $popup->image_url)
                    <img src="{{ asset($popup->image_url) }}" alt="Flyer" class="w-100" style="object-fit: cover; max-height: 250px;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                        <i class="bi bi-image" style="font-size: 3rem;"></i>
                    </div>
                @endif
                
                <div class="p-3 text-center">
                    <h6 class="fw-bold text-dark mb-2">{{ $popup->title ?? 'Judul Popup' }}</h6>
                    <p class="text-muted small mb-3">{{ $popup->description ?? 'Deskripsi singkat popup promosi akan muncul di sini.' }}</p>
                    
                    @if(isset($popup) && $popup->button_text)
                        <button class="btn btn-primary w-100 rounded-pill fw-bold small py-2">{{ $popup->button_text }}</button>
                    @else
                        <button class="btn btn-primary w-100 rounded-pill fw-bold small py-2">Tombol CTA</button>
                    @endif
                </div>

                <!-- Tombol Close -->
                <button class="btn btn-light rounded-circle shadow-sm position-absolute" style="top: 10px; right: 10px; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; opacity: 0.8;">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
