# Setup Donation Payment System - Dareliman Peduli

## 📋 Alur Donasi

```
┌─────────────────────────────────────────────────────────────┐
│ 1. User memilih jenis donasi & program                     │
│    (Zakat, Infak, Wakaf, Program Khusus)                  │
└────────────────┬────────────────────────────────────────────┘
                 │
┌────────────────▼────────────────────────────────────────────┐
│ 2. User input nominal & data donatur                        │
│    (nama, email, telepon, alamat)                          │
└────────────────┬────────────────────────────────────────────┘
                 │
┌────────────────▼────────────────────────────────────────────┐
│ 3. Form dikirim ke backend (/api/donations)                │
│    - Create Donation record di database                    │
│    - Generate transaction ID (DARELIMAN-YYYYMMDDHHmmss)   │
└────────────────┬────────────────────────────────────────────┘
                 │
┌────────────────▼────────────────────────────────────────────┐
│ 4. Backend call Midtrans Snap API                           │
│    - Buat snap token untuk payment widget                 │
│    - Return token ke frontend                             │
└────────────────┬────────────────────────────────────────────┘
                 │
┌────────────────▼────────────────────────────────────────────┐
│ 5. Tampilkan Midtrans Snap Widget (Modal)                  │
│    - User pilih metode pembayaran                         │
│    - Proses pembayaran di Midtrans                        │
└────────────────┬────────────────────────────────────────────┘
                 │
     ┌───────────┴───────────┐
     │                       │
┌────▼──────────┐  ┌────────▼────────────┐
│ BERHASIL      │  │ GAGAL / PENDING    │
│ → /donation/  │  │ → /donation/error  │
│   finish      │  │ → /donation/pending│
└─────┬────────┘  └────────┬───────────┘
      │                    │
      ▼                    ▼
Update DB        Update DB status
Payment status   Email notif
= success        User redirect
Send email
User redirect
```

## 🔧 Setup Instructions

### 1. Dapatkan Midtrans Account
- Signup di https://dashboard.midtrans.com
- Ambil credentials dari Dashboard:
  - Merchant ID
  - Server Key (SB-Mid-server-xxx untuk sandbox)
  - Client Key (SB-Mid-client-xxx untuk sandbox)

### 2. Update .env
```env
MIDTRANS_IS_PRODUCTION=false  # Ganti ke true di production
MIDTRANS_MERCHANT_ID=G12345678
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxxxxxxxxxxxxxxxxxxx
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxxxxxxxxxxxxxxxxxxx
```

### 3. Test Metode Pembayaran (Sandbox)
Gunakan test credentials dari Midtrans docs:
- **Kartu Kredit**: 4111 1111 1111 1111
- **E-Wallet**: Lihat https://docs.midtrans.com/en/technical-reference/sandbox-test-credentials

## 📁 File Structure

```
app/
├── Services/
│   └── MidtransService.php          # Service untuk Midtrans API
├── Models/
│   └── Donation.php                  # Model untuk tabel donations
├── Http/Controllers/
│   └── DonationController.php        # Handle donation requests

config/
└── midtrans.php                      # Config Midtrans

database/migrations/
└── 2026_06_03_040433_create_donations_table.php

resources/views/
└── donasi.blade.php                  # Frontend donation form

routes/
└── web.php                           # API routes untuk donation

.env                                  # Midtrans credentials
```

## 🔗 API Endpoints

### 1. Create Donation Transaction
**POST** `/api/donations`

Request Body:
```json
{
  "donation_type": "zakat|infak|wakaf|program",
  "program": "pendidikan|kemanusiaan|kesehatan|pemberdayaan|dakwah|umum",
  "amount": 50000,
  "donor_name": "Nama Donatur",
  "donor_email": "email@example.com",
  "donor_phone": "081234567890",
  "donor_address": "Alamat lengkap",
  "anonymous": false,
  "receive_update": true,
  "agree_terms": true
}
```

Response Success:
```json
{
  "success": true,
  "snap_token": "token_xxxxxxx",
  "snap_url": "https://app.sandbox.midtrans.com/snap/v1/...",
  "donation_id": 1
}
```

### 2. Payment Callbacks
- **Finish**: `/donation/finish?order_id=DARELIMAN-xxx`
- **Error**: `/donation/error?order_id=DARELIMAN-xxx`
- **Pending**: `/donation/pending?order_id=DARELIMAN-xxx`

### 3. Check Status
**GET** `/api/donations/{transactionId}/status`

Response:
```json
{
  "success": true,
  "payment_status": "success|pending|failed",
  "amount": 50000,
  "donor_name": "Anonimus atau Nama Donatur"
}
```

## 📊 Database Schema

### Tabel: donations

| Column | Type | Description |
|--------|------|-------------|
| id | int | Primary key |
| transaction_id | string | Unique transaction ID (DARELIMAN-xxx) |
| donation_type | enum | zakat, infak, wakaf, program |
| program | string | Program tujuan donasi |
| amount | decimal | Jumlah donasi |
| donor_name | string | Nama donatur |
| donor_email | string | Email donatur |
| donor_phone | string | Nomor telepon |
| donor_address | text | Alamat (opsional) |
| is_anonymous | boolean | Donasi anonim? |
| wants_update | boolean | Menerima update/laporan? |
| payment_status | enum | pending, success, failed, expired |
| payment_method | string | Transfer bank, e-wallet, dll |
| midtrans_response | json | Response dari Midtrans |
| paid_at | timestamp | Waktu pembayaran berhasil |
| notes | text | Catatan tambahan |
| created_at | timestamp | |
| updated_at | timestamp | |

## 🧪 Testing Manual

### 1. Test di Sandbox
```bash
# Jalankan server
php artisan serve

# Buka di browser
http://localhost:8000/donasi
```

### 2. Test Pembayaran
1. Isi form donasi lengkap
2. Klik "Lanjut ke Pembayaran"
3. Di Midtrans widget, pilih metode pembayaran
4. Gunakan test credentials (lihat section Setup)
5. Lanjutkan hingga berhasil

### 3. Verifikasi Database
```sql
-- Cek donasi yang sudah dibuat
SELECT * FROM donations ORDER BY created_at DESC;

-- Filter by payment status
SELECT * FROM donations WHERE payment_status = 'success';
```

## ✅ Fitur yang Sudah Diimplementasikan

- ✅ Database migration & model
- ✅ Form donation UI (sudah ada)
- ✅ Frontend form validation
- ✅ Backend donation controller
- ✅ Midtrans integration (Snap modal)
- ✅ Transaction lifecycle (pending → success/failed)
- ✅ Callback handlers untuk hasil pembayaran
- ✅ Transaction status checking

## 🚀 Fitur untuk Ditambahkan (Optional)

- [ ] Email notification (PHPMailer/SMTP)
- [ ] Invoice/bukti donasi PDF
- [ ] Donatur dashboard
- [ ] Admin dashboard untuk manage donasi
- [ ] SMS notification untuk pembayaran pending
- [ ] Laporan penyaluran otomatis
- [ ] Analytics dashboard
- [ ] CSV export untuk accounting

## 📝 Catatan Penting

1. **Credentials**: Jangan commit `.env` ke git! Gunakan `.env.example`
2. **CSRF Token**: Frontend sudah include CSRF token dari `<meta name="csrf-token">`
3. **SSL**: Midtrans production memerlukan SSL certificate
4. **Callback URL**: Pastikan callback URLs bisa diakses dari Midtrans servers
5. **Test Credentials**: https://docs.midtrans.com/en/technical-reference/sandbox-test-credentials

## 🔗 Links Berguna

- Midtrans Dashboard: https://dashboard.midtrans.com
- Midtrans Documentation: https://docs.midtrans.com
- Test Credentials: https://docs.midtrans.com/en/technical-reference/sandbox-test-credentials
- API Reference: https://api-docs.midtrans.com/

## 🆘 Troubleshooting

### "snap is not defined"
- Pastikan Midtrans Snap library sudah ter-load
- Check console untuk error saat load snap.js
- Verify MIDTRANS_CLIENT_KEY di .env

### "CSRF token mismatch"
- Pastikan form include CSRF token
- Check `<meta name="csrf-token">` di layout

### "Callback tidak dipanggil"
- Pastikan public URL bisa diakses dari Midtrans (tidak localhost)
- Setup public URL di Midtrans dashboard
- Check firewall/security settings

### "Payment status tidak update"
- Check database - lihat di tabel donations
- Review logs di storage/logs/laravel.log
- Verify Midtrans webhook configuration
