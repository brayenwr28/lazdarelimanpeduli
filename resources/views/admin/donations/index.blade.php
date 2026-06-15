@extends('admin.layout')
@section('page_title', 'Donasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">Kelola Donasi</h3>
    <a href="#" class="btn btn-success fw-bold px-4 rounded-3"><i class="bi bi-file-earmark-excel me-2"></i>Export Excel</a>
</div>

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div class="d-flex gap-2 flex-wrap">
        <a href="#" class="btn btn-primary rounded-pill px-4 fw-bold">Semua</a>
        <a href="#" class="btn btn-white border rounded-pill px-4 text-muted fw-semibold hover-bg-light" style="background: white;">Menunggu</a>
        <a href="#" class="btn btn-white border rounded-pill px-4 text-muted fw-semibold hover-bg-light" style="background: white;">Terbayar</a>
        <a href="#" class="btn btn-white border rounded-pill px-4 text-muted fw-semibold hover-bg-light" style="background: white;">Gagal</a>
    </div>
    <div>
        <select class="form-select rounded-pill px-4 shadow-sm border-0 py-2 text-muted fw-semibold" style="min-width: 220px; outline: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <option value="">Semua Program</option>
        </select>
    </div>
</div>

<p class="text-muted small mb-3">Total: <strong class="text-dark">{{ $donations->count() }}</strong> donasi</p>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-muted small bg-white" style="border-bottom: 2px solid #f4f7f6;">
                    <tr>
                        <th class="border-0 px-4 py-3">Donatur</th>
                        <th class="border-0 py-3">Program</th>
                        <th class="border-0 py-3">Jenis</th>
                        <th class="border-0 py-3">Jumlah</th>
                        <th class="border-0 py-3">Tanggal</th>
                        <th class="border-0 py-3">Status</th>
                        <th class="border-0 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($donations as $donasi)
                    <tr>
                        <td class="px-4 py-3" style="border-bottom: 1px solid #f4f7f6;">
                            <strong class="text-dark d-block" style="font-size: 0.95rem;">{{ $donasi->donor_name }}</strong>
                            <small class="text-muted" style="font-size: 0.8rem;">{{ $donasi->donor_email ?? $donasi->donor_phone }}</small>
                        </td>
                        <td class="py-3" style="border-bottom: 1px solid #f4f7f6;">
                            <span class="fw-bold text-dark" style="font-size: 0.9rem;">{{ $donasi->program ? Str::limit($donasi->program->title, 40) : '- Tanpa Program Spesifik -' }}</span>
                        </td>
                        <td class="py-3" style="border-bottom: 1px solid #f4f7f6;">
                            <span class="badge bg-light text-secondary rounded-pill fw-normal px-3 py-2 text-capitalize border">{{ $donasi->campaign_category }}</span>
                        </td>
                        <td class="py-3" style="border-bottom: 1px solid #f4f7f6;">
                            <strong class="text-primary fs-6">Rp {{ number_format($donasi->amount, 0, ',', '.') }}</strong>
                        </td>
                        <td class="py-3 text-muted small" style="border-bottom: 1px solid #f4f7f6;">
                            {{ $donasi->created_at->translatedFormat('d M Y') }}
                        </td>
                        <td class="py-3" style="border-bottom: 1px solid #f4f7f6;">
                            @if($donasi->status == 'success')
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold border border-success border-opacity-25">Terbayar</span>
                            @elseif($donasi->status == 'pending')
                                <span class="badge bg-warning bg-opacity-10 rounded-pill px-3 py-2 fw-bold border border-warning border-opacity-25" style="color: #e67e22 !important;">Menunggu</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2 fw-bold border border-danger border-opacity-25">Gagal</span>
                            @endif
                        </td>
                        <td class="py-3 text-center" style="border-bottom: 1px solid #f4f7f6;">
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="#" class="btn btn-sm btn-light rounded-circle text-muted d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Detail"><i class="bi bi-eye"></i></a>
                                @if($donasi->status == 'pending')
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Set Success"><i class="bi bi-check-lg"></i></button>
                                </form>
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-light rounded-circle text-secondary border d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Set Gagal"><i class="bi bi-x-lg"></i></button>
                                </form>
                                @endif
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light rounded-circle text-secondary border d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">Belum ada transaksi donasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
