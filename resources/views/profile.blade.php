@extends('layouts.app')

@section('content')

<style>
    .profile-hero {
        background: linear-gradient(135deg, #0066b2 0%, #004a8f 50%, #003570 100%);
        padding: 60px 0 80px;
        position: relative;
        overflow: hidden;
    }
    .profile-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }
    .profile-hero::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }
    .avatar-circle {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        font-weight: 700;
        color: #fff;
        border: 3px solid rgba(255,255,255,0.4);
        margin: 0 auto 16px;
    }
    .profile-card {
        background: #fff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        margin-top: -50px;
        position: relative;
        z-index: 10;
    }
    .section-label {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #0066b2;
        margin-bottom: 16px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f6ff;
    }
    .info-item {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #f8f9fa;
    }
    .info-item:last-child { border-bottom: none; }
    .info-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #f0f6ff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0066b2;
        font-size: 15px;
        flex-shrink: 0;
        margin-right: 14px;
    }
    .form-control:focus, .form-select:focus {
        border-color: #0066b2;
        box-shadow: 0 0 0 3px rgba(0,102,178,0.1);
    }
    .btn-save {
        background: linear-gradient(135deg, #0066b2, #004a8f);
        border: none;
        border-radius: 12px;
        padding: 12px 32px;
        font-weight: 700;
        color: #fff;
        transition: all 0.3s ease;
    }
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,102,178,0.3);
        color: #fff;
    }
    .tab-nav .nav-link {
        color: #64748b;
        border: none;
        border-bottom: 3px solid transparent;
        border-radius: 0;
        padding: 14px 24px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s;
    }
    .tab-nav .nav-link.active {
        color: #0066b2;
        border-bottom-color: #0066b2;
        background: transparent;
    }
    .tab-nav .nav-link:hover:not(.active) {
        color: #0066b2;
        background: #f8faff;
    }
    .completion-bar {
        height: 8px;
        border-radius: 10px;
        background: #e9ecef;
        overflow: hidden;
    }
    .completion-fill {
        height: 100%;
        border-radius: 10px;
        background: linear-gradient(90deg, #0066b2, #00a3e0);
        transition: width 0.5s ease;
    }
</style>

{{-- HERO SECTION --}}
<div class="profile-hero">
    <div class="container text-center">
        <div class="avatar-circle">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
        <h3 class="text-white fw-bold mb-1">{{ auth()->user()->name }}</h3>
        <p class="text-white-50 mb-0 small">{{ auth()->user()->email }}</p>

        {{-- KELENGKAPAN PROFIL --}}
        @php
            $u = auth()->user();
            $fields = [$u->phone, $u->address, $u->city, $u->province];
            $filled = collect($fields)->filter()->count();
            $percent = ($filled / count($fields)) * 100;
        @endphp
        <div class="mt-4 mx-auto" style="max-width: 320px;">
            <div class="d-flex justify-content-between mb-1">
                <small class="text-white-50">Kelengkapan Profil</small>
                <small class="text-white fw-bold">{{ $percent }}%</small>
            </div>
            <div class="completion-bar">
                <div class="completion-fill" style="width: {{ $percent }}%"></div>
            </div>
            @if($percent < 100)
                <small class="text-warning d-block mt-2"><i class="bi bi-exclamation-circle me-1"></i>Lengkapi data diri Anda agar kami dapat melayani lebih baik</small>
            @else
                <small class="text-success d-block mt-2"><i class="bi bi-check-circle-fill me-1"></i>Profil Anda sudah lengkap!</small>
            @endif
        </div>
    </div>
</div>

{{-- MAIN CONTENT --}}
<div class="container pb-5" style="font-family: 'Inter', sans-serif;">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            @if(session('success'))
            <div class="alert alert-success border-0 rounded-3 shadow-sm mt-4 d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger border-0 rounded-3 shadow-sm mt-4">
                <ul class="mb-0 small">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="profile-card mt-4">
                {{-- TABS --}}
                <ul class="nav tab-nav border-bottom px-4" id="profileTabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="showTab(event, 'edit', this)">
                            <i class="bi bi-pencil-square me-2"></i>Edit Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showTab(event, 'password', this)">
                            <i class="bi bi-lock me-2"></i>Ganti Password
                        </a>
                    </li>
                </ul>

                {{-- TAB EDIT PROFIL --}}
                <div id="tab-edit" class="p-4">
                    <p class="section-label"><i class="bi bi-person me-2"></i>Data Diri Lengkap</p>

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-dark">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control rounded-3" value="{{ old('name', auth()->user()->name) }}" required placeholder="Masukkan nama lengkap">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-dark">Email</label>
                                <input type="email" class="form-control rounded-3 bg-light" value="{{ auth()->user()->email }}" disabled>
                                <small class="text-muted">Email tidak dapat diubah</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-dark">No Handphone / WhatsApp <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted rounded-start-3">+62</span>
                                    <input type="text" name="phone" class="form-control rounded-end-3" value="{{ old('phone', ltrim(auth()->user()->phone ?? '', '0')) }}" placeholder="8xxxxxxxxxx" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-dark">Jenis Kelamin</label>
                                <select name="gender" class="form-select rounded-3">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old('gender', auth()->user()->gender ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('gender', auth()->user()->gender ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="col-12 mt-2">
                                <p class="section-label"><i class="bi bi-geo-alt me-2"></i>Alamat Domisili</p>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold small text-dark">Alamat Lengkap</label>
                                <textarea name="address" class="form-control rounded-3" rows="3" placeholder="Contoh: Jl. Merdeka No. 10, RT 05 / RW 03">{{ old('address', auth()->user()->address) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-dark">Kota / Kabupaten</label>
                                <input type="text" name="city" class="form-control rounded-3" value="{{ old('city', auth()->user()->city) }}" placeholder="Contoh: Jakarta Selatan">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-dark">Provinsi</label>
                                <select name="province" class="form-select rounded-3">
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach(['Aceh','Bali','Banten','Bengkulu','DI Yogyakarta','DKI Jakarta','Gorontalo','Jambi','Jawa Barat','Jawa Tengah','Jawa Timur','Kalimantan Barat','Kalimantan Selatan','Kalimantan Tengah','Kalimantan Timur','Kalimantan Utara','Kepulauan Bangka Belitung','Kepulauan Riau','Lampung','Maluku','Maluku Utara','Nusa Tenggara Barat','Nusa Tenggara Timur','Papua','Papua Barat','Riau','Sulawesi Barat','Sulawesi Selatan','Sulawesi Tengah','Sulawesi Tenggara','Sulawesi Utara','Sumatera Barat','Sumatera Selatan','Sumatera Utara'] as $prov)
                                    <option value="{{ $prov }}" {{ old('province', auth()->user()->province) == $prov ? 'selected' : '' }}>{{ $prov }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-save"><i class="bi bi-check-circle me-2"></i>Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- TAB GANTI PASSWORD --}}
                <div id="tab-password" class="p-4 d-none">
                    <p class="section-label"><i class="bi bi-lock me-2"></i>Ubah Password</p>

                    <form action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3" style="max-width: 500px;">
                            <div class="col-12">
                                <label class="form-label fw-semibold small text-dark">Password Saat Ini <span class="text-danger">*</span></label>
                                <input type="password" name="current_password" class="form-control rounded-3" required placeholder="Masukkan password lama">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small text-dark">Password Baru <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control rounded-3" required placeholder="Minimal 8 karakter">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small text-dark">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control rounded-3" required placeholder="Ketik ulang password baru">
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-save"><i class="bi bi-lock me-2"></i>Ubah Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function showTab(e, tab, el) {
    e.preventDefault();
    document.querySelectorAll('[id^="tab-"]').forEach(t => t.classList.add('d-none'));
    document.querySelectorAll('.tab-nav .nav-link').forEach(l => l.classList.remove('active'));
    document.getElementById('tab-' + tab).classList.remove('d-none');
    el.classList.add('active');
}
</script>

@endsection
