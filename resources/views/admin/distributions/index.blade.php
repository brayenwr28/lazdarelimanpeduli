@extends('admin.layout')
@section('page_title', 'Penyaluran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">Penyaluran Dana</h3>
    <a href="{{ route('admin.distributions.create') }}" class="btn btn-primary fw-bold px-4 rounded-3"><i class="bi bi-plus-lg me-2"></i>Catat Penyaluran</a>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-muted small bg-white" style="border-bottom: 2px solid #f4f7f6;">
                    <tr>
                        <th class="border-0 px-4 py-3">Penerima</th>
                        <th class="border-0 py-3">Program</th>
                        <th class="border-0 py-3">Jumlah</th>
                        <th class="border-0 py-3">Keterangan</th>
                        <th class="border-0 py-3">Foto</th>
                        <th class="border-0 py-3">Lokasi</th>
                        <th class="border-0 py-3">Tanggal</th>
                        <th class="border-0 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($distributions as $dist)
                    <tr>
                        <td class="px-4 py-3 border-light">
                            <strong class="text-dark d-block">{{ $dist->recipient_name }}</strong>
                        </td>
                        <td class="py-3 border-light">
                            <span class="text-muted">{{ $dist->program->title ?? '-' }}</span>
                        </td>
                        <td class="py-3 border-light">
                            <strong class="text-success">Rp {{ number_format($dist->amount, 0, ',', '.') }}</strong>
                        </td>
                        <td class="py-3 border-light text-muted small">
                            {{ Str::limit($dist->notes, 30) }}
                        </td>
                        <td class="py-3 border-light">
                            @if($dist->photo_url)
                                <img src="{{ asset($dist->photo_url) }}" alt="Foto" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="py-3 border-light text-primary small">
                            @if($dist->location)
                                <i class="bi bi-geo-alt-fill me-1"></i>{{ $dist->location }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="py-3 text-muted small border-light">
                            {{ $dist->created_at->translatedFormat('d F Y') }}
                        </td>
                        <td class="py-3 text-center border-light">
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('admin.distributions.edit', $dist->id) }}" class="btn btn-sm btn-light rounded-circle text-primary border" style="width: 32px; height: 32px;"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.distributions.destroy', $dist->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light rounded-circle text-danger border" style="width: 32px; height: 32px;"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">Belum ada data penyaluran.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
