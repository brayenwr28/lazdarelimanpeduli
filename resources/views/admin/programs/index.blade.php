@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Manajemen Program Donasi</h3>
    <a href="{{ route('admin.programs.create') }}" class="btn btn-primary fw-bold"><i class="bi bi-plus-circle me-2"></i>Tambah Program</a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Program</th>
                        <th>Kategori</th>
                        <th>Target</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $index => $program)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $program->title }}</strong><br>
                            <small class="text-muted">{{ Str::limit($program->description, 50) }}</small>
                        </td>
                        <td class="text-capitalize">{{ $program->category }}</td>
                        <td>Rp {{ number_format($program->target_amount, 0, ',', '.') }}</td>
                        <td>
                            @if($program->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus program ini? (Donasi terkait akan tertahan)');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada program donasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
