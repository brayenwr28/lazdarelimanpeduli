@extends('admin.layout')
@section('page_title', isset($program) ? 'Edit Program' : 'Tambah Program')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">{{ isset($program) ? 'Edit Program' : 'Tambah Program' }}</h3>
    <a href="{{ route('admin.programs.index') }}" class="btn btn-light border fw-bold"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="{{ isset($program) ? route('admin.programs.update', $program->id) : route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($program)) @method('PUT') @endif

            <div class="mb-4">
                <label class="form-label fw-bold">Gambar / Flyer Program</label>
                <div class="border border-dashed rounded p-4 text-center bg-light" style="border-style: dashed !important; border-width: 2px !important;">
                    <i class="bi bi-upload fs-3 text-muted mb-2"></i>
                    <p class="text-muted small m-0">Klik untuk upload gambar<br>JPG, PNG, WebP (Maks. 10MB)</p>
                    <input type="file" name="image" class="form-control mt-3" accept="image/*">
                </div>
                @if(isset($program) && $program->image_url)
                    <div class="mt-2">
                        <img src="{{ asset($program->image_url) }}" alt="Preview" class="rounded" style="height: 100px; object-fit: cover;">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Program *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $program->title ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="6" placeholder="Tuliskan penjelasan program, manfaat, atau target yang ingin dicapai">{{ old('description', $program->description ?? '') }}</textarea>
                <small class="text-muted">Anda dapat menulis deskripsi program dengan format teks biasa. Jika nanti ingin editor kaya format, kami bisa menambahkannya lagi.</small>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Kategori *</label>
                    <select name="category" class="form-select" required>
                        <option value="zakat" {{ (old('category', $program->category ?? '') == 'zakat') ? 'selected' : '' }}>Zakat Maal</option>
                        <option value="sedekah" {{ (old('category', $program->category ?? '') == 'sedekah') ? 'selected' : '' }}>Sedekah</option>
                        <option value="infak" {{ (old('category', $program->category ?? '') == 'infak') ? 'selected' : '' }}>Infak</option>
                        <option value="kemanusiaan" {{ (old('category', $program->category ?? '') == 'kemanusiaan') ? 'selected' : '' }}>Kemanusiaan</option>
                        <option value="pemberdayaan" {{ (old('category', $program->category ?? '') == 'pemberdayaan') ? 'selected' : '' }}>Pemberdayaan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Target (Rp)</label>
                    <input type="number" name="target_amount" class="form-control" value="{{ old('target_amount', $program->target_amount ?? '') }}" placeholder="Opsional (Kosongkan untuk tanpa batas)">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Tanggal Berakhir (Opsional)</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $program->end_date ?? '') }}">
                <small class="text-muted">Kosongkan untuk program tanpa batas waktu</small>
            </div>

            <h5 class="fw-bold mt-5 mb-3 text-dark"><i class="bi bi-bank2 me-2 text-primary"></i>Info Rekening Bank</h5>
            <div class="card bg-light border-0 mb-4 rounded-3">
                <div class="card-body p-3">
                    <div class="mb-3">
                        <input type="text" name="bank_name" class="form-control" placeholder="Nama Bank (contoh: BSI, BCA)" value="{{ old('bank_name', $program->bank_name ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="bank_account" class="form-control" placeholder="Nomor Rekening" value="{{ old('bank_account', $program->bank_account ?? '') }}">
                    </div>
                    <div>
                        <input type="text" name="bank_account_name" class="form-control" placeholder="Atas Nama" value="{{ old('bank_account_name', $program->bank_account_name ?? '') }}">
                    </div>
                </div>
            </div>

            <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-qr-code-scan me-2 text-primary"></i>QRIS (Opsional)</h5>
            <div class="card bg-light border-0 mb-4 rounded-3">
                <div class="card-body p-3 text-center">
                    <div class="border border-dashed rounded p-4 border-secondary" style="border-style: dashed !important; border-width: 2px !important;">
                        <i class="bi bi-qr-code fs-3 text-muted mb-2"></i>
                        <p class="text-muted small m-0">Upload gambar QRIS<br>JPG, PNG, WebP (Maks. 5MB)</p>
                        <input type="file" name="qris_image" class="form-control mt-3" accept="image/*">
                    </div>
                    @if(isset($program) && $program->qris_image_url)
                        <div class="mt-2 text-start">
                            <span class="badge bg-success">QRIS Tersimpan</span>
                            <img src="{{ asset($program->qris_image_url) }}" alt="QRIS" class="d-block mt-2 rounded border" style="height: 100px;">
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-check mb-4">
                <input type="checkbox" name="is_active" class="form-check-input" id="isActive" {{ old('is_active', $program->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label fw-bold" for="isActive">Program Aktif (Tampil di Website)</label>
            </div>

            <button type="submit" class="btn btn-primary fw-bold px-4 py-2 w-100 rounded-pill">Simpan Program</button>
        </form>
    </div>
</div>

@endsection
