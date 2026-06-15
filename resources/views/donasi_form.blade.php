@extends('layouts.app')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="fw-bold mb-3 text-primary">Mulai Berbagi Kebaikan</h1>
                    <p class="text-muted lead">Setiap donasi Anda membantu sesama yang membutuhkan. Silakan lengkapi formulir di bawah ini.</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        
                        <!-- ERROR MESSAGES -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                                <strong>Mohon periksa kembali form Anda:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="/donasi/form" id="donationForm">
                            @csrf
                            <input type="hidden" name="program_id" value="{{ request('program_id') }}">
                            
                            <h4 class="fw-bold mb-4 border-bottom pb-2">
                                <span class="badge bg-primary rounded-circle me-2">1</span> Data Donatur
                            </h4>

                            <div class="row g-3 mb-4">
                                <div class="col-md-12">
                                    <label for="donorName" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-3 py-2 @error('donor_name') is-invalid @enderror" id="donorName" name="donor_name" placeholder="Masukkan nama Anda" value="{{ old('donor_name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="donorPhone" class="form-label fw-bold">Nomor WhatsApp / HP <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control rounded-3 py-2 @error('donor_phone') is-invalid @enderror" id="donorPhone" name="donor_phone" placeholder="0812-xxxx-xxxx" value="{{ old('donor_phone') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="donorEmail" class="form-label fw-bold">Alamat Email (Opsional)</label>
                                    <input type="email" class="form-control rounded-3 py-2 @error('donor_email') is-invalid @enderror" id="donorEmail" name="donor_email" value="{{ old('donor_email') }}">
                                </div>
                            </div>

                            <h4 class="fw-bold mb-4 border-bottom pb-2 mt-5">
                                <span class="badge bg-primary rounded-circle me-2">2</span> Detail Donasi
                            </h4>

                            <div class="row g-3 mb-4">
                                <div class="col-md-12">
                                    <label for="campaignCategory" class="form-label fw-bold">Pilihan Kategori Kebaikan <span class="text-danger">*</span></label>
                                    <select class="form-select rounded-3 py-2 @error('campaign_category') is-invalid @enderror" id="campaignCategory" name="campaign_category" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="zakat" {{ (old('campaign_category') ?? $category ?? '') == 'zakat' ? 'selected' : '' }}>Zakat</option>
                                        <option value="infak" {{ (old('campaign_category') ?? $category ?? '') == 'infak' ? 'selected' : '' }}>Infak</option>
                                        <option value="sedekah" {{ (old('campaign_category') ?? $category ?? '') == 'sedekah' ? 'selected' : '' }}>Sedekah</option>
                                        <option value="kemanusiaan" {{ (old('campaign_category') ?? $category ?? '') == 'kemanusiaan' ? 'selected' : '' }}>Kemanusiaan</option>
                                        <option value="pemberdayaan" {{ (old('campaign_category') ?? $category ?? '') == 'pemberdayaan' ? 'selected' : '' }}>Pemberdayaan</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="amount" class="form-label fw-bold">Nominal Donasi (Rp) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text rounded-start-3 bg-light">Rp</span>
                                        <input type="number" class="form-control rounded-end-3 py-2 @error('amount') is-invalid @enderror" id="amount" name="amount" placeholder="0" min="10000" value="{{ old('amount') }}" required>
                                    </div>
                                    <small class="text-muted mt-1 d-block">Minimal donasi Rp 10.000</small>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <label for="paymentMethod" class="form-label fw-bold">Pilihan Metode Pembayaran <span class="text-danger">*</span></label>
                                    <select class="form-select rounded-3 py-2 @error('payment_method') is-invalid @enderror" id="paymentMethod" name="payment_method" required>
                                        <option value="">-- Pilih Metode Pembayaran --</option>
                                        <optgroup label="Transfer Bank">
                                            <option value="transfer_bsi" {{ (old('payment_method') ?? 'transfer_bsi') == 'transfer_bsi' ? 'selected' : '' }}>Bank Syariah Indonesia (BSI)</option>
                                            <option value="transfer_bca" {{ old('payment_method') == 'transfer_bca' ? 'selected' : '' }}>Bank Central Asia (BCA)</option>
                                            <option value="transfer_mandiri" {{ old('payment_method') == 'transfer_mandiri' ? 'selected' : '' }}>Bank Mandiri</option>
                                        </optgroup>
                                        <optgroup label="E-Wallet & QRIS">
                                            <option value="qris" {{ old('payment_method') == 'qris' ? 'selected' : '' }}>QRIS (Gopay, OVO, Dana, LinkAja)</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-5 d-grid">
                                <button type="submit" class="btn btn-primary fw-bold py-3 rounded-3 shadow-sm text-white" style="font-size: 1.1rem;">
                                    Lanjut ke Pembayaran <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <p class="small text-muted"><i class="bi bi-shield-check me-1 text-success"></i> Transaksi Anda aman dan terenkripsi. Data donatur tidak akan disalahgunakan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AUDIO NOTIFICATION FOR LOGIN SUCCESS -->
@if (session('success'))
<script>
    function playAudioNotification() {
        const successMessage = "{{ session('success') }}";
        const speech = new SpeechSynthesisUtterance();
        speech.text = "Ahlan wa Sahlan di Website Resmi LAZ Dar el-Iman Peduli. Jembatan Kebaikan, Mengalirkan Berkah untuk Sesama.";
        speech.lang = 'id-ID';
        speech.rate = 0.9;
        speech.pitch = 1;
        speech.volume = 1;
        
        speechSynthesis.cancel();
        speechSynthesis.speak(speech);
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', playAudioNotification);
    } else {
        playAudioNotification();
    }
    setTimeout(playAudioNotification, 500);
</script>
@endif
@endsection
