@extends('admin.layout')
@section('page_title', isset($admin) ? 'Edit Admin' : 'Tambah Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">{{ isset($admin) ? 'Edit Admin' : 'Tambah Admin' }}</h3>
    <a href="{{ route('admin.admins.index') }}" class="btn btn-light border fw-bold"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <form action="{{ isset($admin) ? route('admin.admins.update', $admin->id) : route('admin.admins.store') }}" method="POST">
                    @csrf
                    @if(isset($admin)) @method('PUT') @endif

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name ?? '') }}" required>
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email *</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email ?? '') }}" required>
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Password {{ isset($admin) ? '(Kosongkan jika tidak ingin mengubah)' : '*' }}</label>
                        <input type="password" name="password" class="form-control" {{ isset($admin) ? '' : 'required' }}>
                        @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    @if(isset($admin))
                    <div class="form-check mb-4">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" class="form-check-input" id="isActive" {{ old('is_active', $admin->is_active ?? true) ? 'checked' : '' }} value="1">
                        <label class="form-check-label fw-bold" for="isActive">Akun Aktif (Bisa Login)</label>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary fw-bold px-4 py-2 w-100 rounded-pill">Simpan Data Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
