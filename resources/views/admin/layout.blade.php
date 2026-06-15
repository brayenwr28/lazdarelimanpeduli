<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Laz Dareliman Peduli</title>
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { 
            background-color: #f8fafc; 
            font-family: 'Inter', sans-serif; 
            color: #334155;
        }
        
        /* Custom Scrollbar untuk Sidebar */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .sidebar { 
            min-height: 100vh; 
            background-color: #ffffff; 
            border-right: 1px solid #edf2f7; 
        }
        
        .sidebar .nav-link { 
            color: #64748b; 
            padding: 12px 20px; 
            border-radius: 12px; 
            font-weight: 500; 
            margin-bottom: 6px; 
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
        }
        
        .sidebar .nav-link i { 
            font-size: 1.2rem; 
            margin-right: 12px;
            transition: transform 0.2s ease;
        }
        
        .sidebar .nav-link:hover { 
            background-color: #f1f5f9; 
            color: #0066b2; 
        }

        .sidebar .nav-link:hover i {
            transform: translateX(2px);
        }
        
        .sidebar .nav-link.active { 
            background-color: #0066b2; 
            color: #ffffff; 
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(0, 102, 178, 0.25); 
        }
        
        .sidebar-logo { 
            border-bottom: 1px solid #f1f5f9; 
            padding-bottom: 24px; 
        }
        
        .topbar { 
            background-color: rgba(255, 255, 255, 0.95); 
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #edf2f7; 
            padding: 18px 32px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            position: sticky; 
            top: 0; 
            z-index: 1000; 
        }
        
        .main-content { 
            margin-left: 260px; 
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Desain Card Statis */
        .stat-card { 
            background: #fff; 
            border-radius: 16px; 
            border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02), 0 4px 12px rgba(0,0,0,0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        
        .stat-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 12px 24px rgba(0,0,0,0.06); 
        }
        
        .icon-box { 
            width: 54px; 
            height: 54px; 
            border-radius: 14px; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            font-size: 24px; 
        }

        /* Sweet Alert & Toast Styling untuk Alert Bawaan */
        .custom-alert {
            border-radius: 14px;
            padding: 16px 20px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-4" style="width: 260px; position: fixed; height: 100vh; overflow-y: auto; z-index: 1050;">
            <div class="sidebar-logo text-center mb-4">
                <img src="{{ asset('assets/logo/DARELIMAN PEDULI 1A.png') }}" alt="Logo Dar El Iman" class="navbar-logo d-inline-block align-top img-fluid" style="height: 52px; width: auto; max-height: 100%;">
            </div>
            
            <nav class="nav flex-column mb-auto">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
                <a href="{{ route('admin.programs.index') }}" class="nav-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                    <i class="bi bi-folder-fill"></i> Program
                </a>
                <a href="{{ route('admin.donations.index') }}" class="nav-link {{ request()->routeIs('admin.donations.*') ? 'active' : '' }}">
                    <i class="bi bi-heart-fill"></i> Donasi
                </a>
                <a href="{{ route('admin.distributions.index') }}" class="nav-link {{ request()->routeIs('admin.distributions.*') ? 'active' : '' }}">
                    <i class="bi bi-arrow-up-right-square-fill"></i> Penyaluran
                </a>
                <a href="#" class="nav-link">
                    <i class="bi bi-tags-fill"></i> Kategori
                </a>
                <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
                <a href="#" class="nav-link">
                    <i class="bi bi-moon-stars-fill"></i> Qurban
                </a>
                <a href="{{ route('admin.popups.index') }}" class="nav-link {{ request()->routeIs('admin.popups.*') ? 'active' : '' }}">
                    <i class="bi bi-window-stack"></i> Popup
                </a>
                <a href="#" class="nav-link">
                    <i class="bi bi-gear-fill"></i> Pengaturan
                </a>
            </nav>
            
            <hr class="mt-4 mb-3" style="border-color: #edf2f7; opacity: 1;">
            
            <a href="/" class="nav-link mb-2 text-secondary"><i class="bi bi-house-door-fill"></i> Ke Website</a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link text-danger bg-transparent border-0 w-100 text-start" style="cursor:pointer; padding: 12px 20px;">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>

        <!-- Content Area -->
        <div class="flex-grow-1 main-content">
            <!-- Topbar -->
            <div class="topbar">
                <h4 class="fw-bold m-0 text-dark" style="letter-spacing: -0.5px;">@yield('page_title', 'Dashboard')</h4>
                
                <div class="d-flex align-items-center bg-light px-3 py-2 rounded-3 border" style="border-color: #edf2f7 !important;">
                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-semibold me-2 shadow-sm" style="width: 36px; height: 36px; background-color: #0066b2; font-size: 14px;">
                        A
                    </div>
                    <div class="d-flex flex-column text-start">
                        <span class="fw-semibold text-dark lh-1" style="font-size: 13px; margin-bottom: 3px;">Admin Dareliman Peduli</span>
                        <small class="text-muted" style="font-size: 11px;">Administrator</small>
                    </div>
                </div>
            </div>

            <!-- Main Content Container -->
            <div class="p-4 flex-grow-1">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm custom-alert d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle-fill me-3 fs-5 text-success"></i>
                        <div>
                            <strong class="d-block text-dark small fw-bold">Berhasil</strong>
                            <span class="small text-muted">{{ session('success') }}</span>
                        </div>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close" style="top: 18px;"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm custom-alert d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-3 fs-5 text-danger"></i>
                        <div>
                            <strong class="d-block text-dark small fw-bold">Gagal</strong>
                            <span class="small text-muted">{{ session('error') }}</span>
                        </div>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close" style="top: 18px;"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>