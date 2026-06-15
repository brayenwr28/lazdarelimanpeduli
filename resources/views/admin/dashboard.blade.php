@extends('admin.layout')
@section('page_title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1">Dashboard</h3>
        <p class="text-muted small m-0">Ringkasan data dan performa donasi saat ini.</p>
    </div>
    <span class="text-muted small px-3 py-2 bg-white rounded-pill shadow-sm border fw-medium">
        <i class="bi bi-calendar3 me-2 text-primary"></i>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
    </span>
</div>

<div class="row g-4 mb-4">
    <!-- Card 1: Total Donasi -->
    <div class="col-md-6 col-xl-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="card-body d-flex align-items-center p-0">
                <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 56px; height: 56px; background-color: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                    <i class="bi bi-wallet2 fs-4"></i>
                </div>
                <div>
                    <p class="text-muted small mb-1 fw-medium">Total Donasi Terkumpul</p>
                    <h4 class="fw-bold text-dark m-0">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card 2: Total Tersalurkan -->
    <div class="col-md-6 col-xl-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="card-body d-flex align-items-center p-0">
                <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 56px; height: 56px; background-color: rgba(25, 135, 84, 0.1); color: #198754;">
                    <i class="bi bi-box-seam fs-4"></i>
                </div>
                <div>
                    <p class="text-muted small mb-1 fw-medium">Total Tersalurkan</p>
                    <h4 class="fw-bold text-dark m-0">Rp {{ number_format($totalTersalurkan, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3: Saldo Donasi -->
    <div class="col-md-6 col-xl-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="card-body d-flex align-items-center p-0">
                <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 56px; height: 56px; background-color: rgba(255, 193, 7, 0.15); color: #ffc107;">
                    <i class="bi bi-piggy-bank fs-4"></i>
                </div>
                <div>
                    <p class="text-muted small mb-1 fw-medium">Saldo Donasi</p>
                    <h4 class="fw-bold text-dark m-0">Rp {{ number_format($saldoDonasi, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 4: Total Transaksi -->
    <div class="col-md-6 col-xl-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="card-body d-flex align-items-center p-0">
                <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 56px; height: 56px; background-color: rgba(111, 66, 193, 0.1); color: #6f42c1;">
                    <i class="bi bi-graph-up-arrow fs-4"></i>
                </div>
                <div>
                    <p class="text-muted small mb-1 fw-medium">Total Transaksi Donasi</p>
                    <div class="d-flex align-items-baseline">
                        <h4 class="fw-bold text-dark m-0 me-2">{{ number_format($totalTransaksi, 0, ',', '.') }}</h4>
                        <small class="text-muted" style="font-size: 0.75rem;">semua waktu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 5: Menunggu Konfirmasi -->
    <div class="col-md-6 col-xl-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="card-body d-flex align-items-center p-0">
                <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 56px; height: 56px; background-color: rgba(220, 53, 69, 0.1); color: #dc3545;">
                    <i class="bi bi-clock-history fs-4"></i>
                </div>
                <div>
                    <p class="text-muted small mb-1 fw-medium">Menunggu Konfirmasi</p>
                    <div class="d-flex align-items-baseline">
                        <h4 class="fw-bold text-dark m-0 me-2">{{ number_format($menungguKonfirmasi, 0, ',', '.') }}</h4>
                        <small class="text-muted" style="font-size: 0.75rem;">donasi</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 6: Donatur Unik -->
    <div class="col-md-6 col-xl-4">
        <div class="card border-0 shadow-sm rounded-4 p-3">
            <div class="card-body d-flex align-items-center p-0">
                <div class="rounded-4 d-flex align-items-center justify-content-center me-3" style="width: 56px; height: 56px; background-color: rgba(13, 202, 240, 0.1); color: #0dcaf0;">
                    <i class="bi bi-people-fill fs-4"></i>
                </div>
                <div>
                    <p class="text-muted small mb-1 fw-medium">Donatur Unik</p>
                    <div class="d-flex align-items-baseline">
                        <h4 class="fw-bold text-dark m-0 me-2">{{ number_format($donaturUnik, 0, ',', '.') }}</h4>
                        <small class="text-muted" style="font-size: 0.75rem;">orang</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Tren Donasi Chart -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h6 class="fw-bold text-dark mb-1">Tren Donasi</h6>
                    <p class="text-muted small m-0">Grafik perkembangan 6 bulan terakhir</p>
                </div>
                <div style="position: relative; height:320px; width:100%;">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Donasi Chart -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h6 class="fw-bold text-dark mb-1">Komposisi Kategori</h6>
                    <p class="text-muted small m-0">Persentase sebaran program donasi</p>
                </div>
                <div style="position: relative; height:280px; width:100%;" class="d-flex align-items-center justify-content-center">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Data untuk Tren Donasi (Smooth Area/Line Chart)
    const trendCtx = document.getElementById('trendChart').getContext('2d');
    
    // Membuat gradien warna untuk background chart line
    const gradient = trendCtx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(13, 110, 253, 0.3)');
    gradient.addColorStop(1, 'rgba(13, 110, 253, 0.0)');

    const trendChart = new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Donasi Terkumpul (Rp)',
                data: {!! json_encode($trendData) !!},
                backgroundColor: gradient,
                borderColor: '#0d6efd',
                borderWidth: 3,
                fill: true,
                tension: 0.35, // Membuat garis melengkung smooth
                pointBackgroundColor: '#0d6efd',
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { borderDash: [4, 4], color: '#eaeaea', drawBorder: false },
                    ticks: { font: { size: 11 }, color: '#a0aec0' }
                },
                x: {
                    grid: { display: false, drawBorder: false },
                    ticks: { font: { size: 11 }, color: '#a0aec0' }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Data untuk Komposisi Kategori (Doughnut Chart)
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const rawCategoryData = {!! json_encode($kategoriData) !!};
    const catLabels = Object.keys(rawCategoryData);
    const catData = Object.values(rawCategoryData);
    const catColors = ['#e83e8c', '#6f42c1', '#fd7e14', '#0dcaf0', '#0d6efd', '#198754'];
    
    const categoryChart = new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: catLabels,
            datasets: [{
                data: catData,
                backgroundColor: catColors,
                borderWidth: 0, // Menghilangkan border putih antar potongan agar lebih clean
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%', // Lebih tipis agar terlihat elegan
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { 
                        usePointStyle: true, 
                        pointStyle: 'circle',
                        padding: 15, 
                        font: { size: 11, weight: '500' },
                        color: '#4a5568'
                    }
                }
            }
        }
    });
</script>
@endpush