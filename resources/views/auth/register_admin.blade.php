@extends('layouts.app')

@section('content')
<section class="py-5 min-vh-100 d-flex align-items-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-primary text-white text-center py-4 border-0">
                        <h4 class="fw-bold mb-0">Registrasi Admin</h4>
                        <p class="small mb-0 text-white-50">Daftar sebagai Admin Panel</p>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 pb-0">
                                <ul class="small mb-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.register') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold text-dark small">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control rounded-3 py-2" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-dark small">Email</label>
                                <input type="email" name="email" class="form-control rounded-3 py-2" value="{{ old('email') }}" required placeholder="Masukkan alamat email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-dark small">Password</label>
                                <input type="password" name="password" class="form-control rounded-3 py-2" required placeholder="Minimal 8 karakter">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-dark small">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control rounded-3 py-2" required placeholder="Ketik ulang password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold mb-3">Daftar sebagai Admin</button>
                            
                            <div class="text-center mt-3">
                                <p class="text-muted small">Sudah punya akun? <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">Login di sini</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
