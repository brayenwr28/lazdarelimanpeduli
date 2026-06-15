@extends('admin.layout')
@section('page_title', isset($distribution) ? 'Edit Penyaluran' : 'Catat Penyaluran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">{{ isset($distribution) ? 'Edit Penyaluran' : 'Catat Penyaluran' }}</h3>
    <a href="{{ route('admin.distributions.index') }}" class="btn btn-light border fw-bold"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="{{ isset($distribution) ? route('admin.distributions.update', $distribution->id) : route('admin.distributions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($distribution)) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Penerima Manfaat / Vendor</label>
                <input type="text" name="recipient_name" class="form-control" value="{{ old('recipient_name', $distribution->recipient_name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Program yang Disalurkan</label>
                <select name="program_id" class="form-select" required>
                    <option value="">-- Pilih Program --</option>
                    @foreach(\App\Models\Program::all() as $prog)
                        <option value="{{ $prog->id }}" {{ (old('program_id', $distribution->program_id ?? '') == $prog->id) ? 'selected' : '' }}>{{ $prog->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Dana (Rp)</label>
                <input type="number" name="amount" class="form-control" value="{{ old('amount', $distribution->amount ?? '') }}" required min="0">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Lokasi Penyaluran</label>
                <input type="text" name="location" class="form-control" value="{{ old('location', $distribution->location ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Keterangan / Detail Bantuan</label>
                <textarea name="notes" class="form-control" rows="3">{{ old('notes', $distribution->notes ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Foto Dokumentasi</label>
                <input type="file" name="photo" class="form-control" accept="image/*">
                <small class="text-muted">Maksimal 10MB.</small>
            </div>

            <button type="submit" class="btn btn-primary fw-bold px-4 rounded-pill">Simpan Data</button>
        </form>
    </div>
</div>
@endsection
