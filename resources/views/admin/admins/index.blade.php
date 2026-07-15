@extends('admin.layout')
@section('page_title', 'Kelola Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">Daftar Admin Biasa</h3>
    <a href="{{ route('admin.admins.create') }}" class="btn btn-primary fw-bold px-4 rounded-3"><i class="bi bi-plus-lg me-2"></i>Tambah Admin</a>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-muted small bg-white" style="border-bottom: 2px solid #f4f7f6;">
                    <tr>
                        <th class="border-0 px-4 py-3">Nama Lengkap</th>
                        <th class="border-0 py-3">Email</th>
                        <th class="border-0 py-3">Status</th>
                        <th class="border-0 py-3">Tanggal Bergabung</th>
                        <th class="border-0 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($admins as $admin)
                    <tr>
                        <td class="px-4 py-3" style="border-bottom: 1px solid #f4f7f6;">
                            <strong class="text-dark d-block" style="font-size: 0.95rem;">{{ $admin->name }}</strong>
                        </td>
                        <td class="py-3 text-muted" style="border-bottom: 1px solid #f4f7f6;">
                            {{ $admin->email }}
                        </td>
                        <td class="py-3" style="border-bottom: 1px solid #f4f7f6;">
                            @if($admin->is_active)
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 border border-success border-opacity-25">Aktif</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-2 border">Nonaktif</span>
                            @endif
                        </td>
                        <td class="py-3 text-muted small" style="border-bottom: 1px solid #f4f7f6;">
                            {{ $admin->created_at->translatedFormat('d M Y') }}
                        </td>
                        <td class="py-3 text-center" style="border-bottom: 1px solid #f4f7f6;">
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-sm btn-light border text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus admin ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light border text-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">Belum ada Admin Biasa yang terdaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
