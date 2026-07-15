@extends('admin.layout')
@section('page_title', 'Laporan Anggota')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">Laporan Registrasi User</h3>
    <a href="{{ route('admin.export.users') }}" class="btn btn-success fw-bold px-4 rounded-3"><i class="bi bi-file-earmark-excel me-2"></i>Export Excel</a>
</div>

<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body p-4">
        <form action="{{ route('admin.reports.users') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label text-muted small fw-bold">Dari Tanggal</label>
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label text-muted small fw-bold">Sampai Tanggal</label>
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label text-muted small fw-bold">Cari Nama/Email</label>
                <input type="text" name="search" class="form-control" placeholder="Ketik kata kunci..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100 fw-bold"><i class="bi bi-funnel-fill me-2"></i>Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center">
        <h6 class="m-0 fw-bold text-dark">Total Pendaftar: <span class="text-primary">{{ $users->total() }} User</span></h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-muted small bg-light" style="border-bottom: 2px solid #f4f7f6;">
                    <tr>
                        <th class="border-0 px-4 py-3">Nama Lengkap</th>
                        <th class="border-0 py-3">Kontak (Email / No HP)</th>
                        <th class="border-0 py-3">Jenis Kelamin</th>
                        <th class="border-0 py-3">Alamat Lengkap</th>
                        <th class="border-0 py-3">Tanggal Daftar</th>
                        @if(auth()->user()->role === 'super_admin')
                        <th class="border-0 py-3 text-center">Keamanan (Super Admin)</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($users as $user)
                    <tr>
                        <td class="px-4 py-3" style="border-bottom: 1px solid #f4f7f6;">
                            <strong class="text-dark d-block" style="font-size: 0.95rem;">{{ $user->name }}</strong>
                        </td>
                        <td class="py-3" style="border-bottom: 1px solid #f4f7f6;">
                            <span class="d-block text-primary small"><i class="bi bi-envelope me-1"></i>{{ $user->email }}</span>
                            <span class="d-block text-muted small"><i class="bi bi-whatsapp me-1"></i>{{ $user->phone ?? '-' }}</span>
                        </td>
                        <td class="py-3 text-muted small" style="border-bottom: 1px solid #f4f7f6;">
                            @if($user->gender)
                                <span class="badge {{ $user->gender === 'Laki-laki' ? 'bg-primary' : 'bg-danger' }} bg-opacity-10 {{ $user->gender === 'Laki-laki' ? 'text-primary' : 'text-danger' }} rounded-pill px-3 py-2 border">
                                    {{ $user->gender === 'Laki-laki' ? '♂' : '♀' }} {{ $user->gender }}
                                </span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="py-3 text-muted small" style="border-bottom: 1px solid #f4f7f6;">
                            {{ $user->address ?? 'Belum melengkapi' }}<br>
                            {{ $user->city ?? '' }} {{ $user->province ?? '' }}
                        </td>
                        <td class="py-3 text-muted small" style="border-bottom: 1px solid #f4f7f6;">
                            {{ $user->created_at->translatedFormat('d M Y, H:i') }}
                        </td>
                        @if(auth()->user()->role === 'super_admin')
                        <td class="py-3 text-center" style="border-bottom: 1px solid #f4f7f6;">
                            <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#resetModal{{ $user->id }}">
                                <i class="bi bi-key-fill me-1"></i>Ubah Password
                            </button>

                            <!-- Modal Reset Password -->
                            <div class="modal fade" id="resetModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content rounded-4 border-0 shadow">
                                        <div class="modal-header bg-light border-0 px-4 py-3">
                                            <h5 class="modal-title fw-bold text-dark"><i class="bi bi-shield-lock-fill text-danger me-2"></i>Reset Password User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-4 py-4 text-start">
                                            <p class="text-muted small mb-4">Anda akan mengubah password untuk user <strong>{{ $user->name }}</strong> ({{ $user->email }}).</p>
                                            <form action="{{ route('admin.reports.users.reset_password', $user->id) }}" method="POST">
                                                @csrf
                                                <div class="mb-4">
                                                    <label class="form-label fw-bold small text-dark">Masukkan Password Baru</label>
                                                    <input type="text" name="new_password" class="form-control py-2" required minlength="8" placeholder="Contoh: lazpeduli123">
                                                    <small class="text-muted d-block mt-2" style="font-size: 11px;">Password akan otomatis dienkripsi oleh sistem setelah disimpan. Beritahukan teks password yang Anda ketik ini kepada user agar dia bisa login.</small>
                                                </div>
                                                <div class="d-flex justify-content-end gap-2">
                                                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger fw-bold px-4">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ auth()->user()->role === 'super_admin' ? '5' : '4' }}" class="text-center py-5 text-muted">Belum ada data pendaftar yang cocok dengan filter.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($users->hasPages())
    <div class="card-footer bg-white border-top py-3 px-4">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
