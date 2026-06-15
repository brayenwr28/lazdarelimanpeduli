@extends('layouts.app')

@section('content')

<section class="py-5 bg-light min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 auth-card">
                    <div class="card-body p-5">
                        <h2 class="fw-bold mb-2 text-primary">Buat Akun Baru</h2>
                        <p class="text-muted mb-4">Daftar untuk memulai pengalaman Anda bersama Dareliman Peduli</p>
                        
                        <!-- ERROR MESSAGE -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Terjadi Kesalahan:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- SUCCESS MESSAGE -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <form method="POST" action="/register">
                            @csrf
                            <div class="mb-3">
                                <label for="registerName" class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" class="form-control rounded-2 py-2 @error('name') is-invalid @enderror" id="registerName" name="name" placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}" required>
                                @error('name')
                                    <small class="invalid-feedback d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="registerEmail" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control rounded-2 py-2 @error('email') is-invalid @enderror" id="registerEmail" name="email" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                                @error('email')
                                    <small class="invalid-feedback d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="registerPhone" class="form-label fw-bold">Nomor Telepon</label>
                                <input type="tel" class="form-control rounded-2 py-2 @error('phone') is-invalid @enderror" id="registerPhone" name="phone"value="{{ old('phone') }}" required>
                                @error('phone')
                                    <small class="invalid-feedback d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="registerPassword" class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control rounded-2 py-2 @error('password') is-invalid @enderror" id="registerPassword" name="password" placeholder="Buat password yang kuat (min. 8 karakter)" required>
                                <small class="text-muted d-block mt-1">Password harus mengandung huruf besar, huruf kecil, dan angka</small>
                                @error('password')
                                    <small class="invalid-feedback d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="registerPasswordConfirm" class="form-label fw-bold">Konfirmasi Password</label>
                                <input type="password" class="form-control rounded-2 py-2 @error('password_confirmation') is-invalid @enderror" id="registerPasswordConfirm" name="password_confirmation" placeholder="Ulangi password Anda" required>
                                @error('password_confirmation')
                                    <small class="invalid-feedback d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input @error('agree_terms') is-invalid @enderror" id="agreeTerms" name="agree_terms" required>
                                    <label class="form-check-label" for="agreeTerms">
                                        Saya setuju dengan <a href="#" class="text-primary text-decoration-none">Syarat & Ketentuan</a> dan <a href="#" class="text-primary text-decoration-none">Kebijakan Privasi</a>
                                    </label>
                                    @error('agree_terms')
                                        <small class="invalid-feedback d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary fw-bold w-100 py-2 rounded-2 mb-3">Daftar</button>
                        </form>

                        <hr class="my-3">

                        <div class="text-center mb-3">
                            <small class="text-muted">atau daftar dengan</small>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-2 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google me-2" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.776-2.353 6.553c-1.485 1.776-3.640 2.821-6.084 2.821c-3.521 0-6.604-1.387-8.669-3.850c-.859-1.035-1.573-2.228-1.994-3.526a9.854 9.854 0 0 1-.451-3.218c0-2.43.871-4.768 2.352-6.553C2.004 2.71 4.160 1.666 6.604 1.666c1.708 0 3.262.62 4.44 1.641c.622.533 1.151 1.203 1.55 1.973C13.462 4.566 15.364 5.454 15.545 6.558Z"/>
                                </svg>
                                Google
                            </button>
                            <button type="button" class="btn btn-outline-secondary rounded-2 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook me-2" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.166 1.791.166v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951Z"/>
                                </svg>
                                Facebook
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <small class="text-muted">Sudah punya akun? <a href="/login" class="text-primary fw-bold text-decoration-none">Masuk di sini</a></small>
                        </div>
                    </div>
                </div>

                <!-- INFO SIDEBAR -->
                <div class="mt-5 text-center text-muted">
                    <h5 class="fw-bold text-dark mb-3">Kenapa Mendaftar?</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2">✓ Lacak donasi dan penyalurannya</li>
                        <li class="mb-2">✓ Dapatkan notifikasi program terbaru</li>
                        <li class="mb-2">✓ Akses laporan transparansi lengkap</li>
                        <li class="mb-2">✓ Kemudahan untuk donasi berulang</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<!-- AUDIO NOTIFICATION SCRIPT -->
@if (session('success'))
<script>
    console.log('✅ Register Success - Audio Script Loaded');
    
    function playAudioNotification() {
        console.log('🔊 Attempting to play audio...');
        
        const speech = new SpeechSynthesisUtterance();
        speech.text = "Jazakumullahu khairan, terima kasih telah mendaftar di Laz Dareliman Peduli.";
        speech.lang = 'id-ID';
        speech.rate = 0.9;
        speech.pitch = 1;
        speech.volume = 1;
        
        // Cancel any ongoing speech
        speechSynthesis.cancel();
        
        // Speak after a short delay
        speechSynthesis.speak(speech);
        console.log('✅ Audio command sent to browser');
    }
    
    // Run audio immediately
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', playAudioNotification);
    } else {
        playAudioNotification();
    }
    
    // Also try after a slight delay to ensure DOM is ready
    setTimeout(playAudioNotification, 500);
</script>
<style>
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endif

