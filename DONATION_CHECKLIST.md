# 🎯 Setup Checklist - Donation Payment System

## ✅ Yang Sudah Diimplementasikan

### Backend
- [x] Migration untuk tabel `donations` dengan 17 fields
- [x] Model `Donation` dengan fillable & casts
- [x] `DonationController` dengan 5 methods:
  - `store()` - Create donation & initiate payment
  - `finish()` - Handle successful payment
  - `error()` - Handle failed payment
  - `pending()` - Handle pending payment
  - `checkStatus()` - Check transaction status
- [x] `MidtransService` untuk API integration
- [x] Routes di `web.php` (4 public + 1 protected)
- [x] Config file `config/midtrans.php`
- [x] Service provider registration
- [x] Environment variables di `.env`

### Frontend
- [x] Donation form UI (sudah ada sebelumnya)
- [x] JavaScript untuk form validation
- [x] Midtrans Snap library integration
- [x] Form submission handler dengan fetch API
- [x] Success/error/pending page redirects

### Database
- [x] Migration created & migrated
- [x] Tabel `donations` siap digunakan

---

## 📌 TODO: Setup Credentials & Testing

### Step 1: Daftar Midtrans (5 menit)
```
1. Buka https://dashboard.midtrans.com
2. Sign up dengan email & password
3. Verifikasi email
4. Buka Settings → Merchant Information
5. Copy credentials:
   - Merchant ID: G12345678
   - Server Key: SB-Mid-server-xxxxx
   - Client Key: SB-Mid-client-xxxxx
```

### Step 2: Update `.env` (2 menit)
```env
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_MERCHANT_ID=G12345678
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxxxxxxxxxxxxxxxxxxx
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxxxxxxxxxxxxxxxxxxx
```

### Step 3: Clear Cache (1 menit)
```bash
php artisan config:cache
```

### Step 4: Test dengan Sandbox (10 menit)
```
1. Buka http://localhost:8000/donasi
2. Isi form donasi:
   - Jenis: Zakat
   - Program: Pendidikan
   - Nominal: Rp 50000
   - Nama: Test User
   - Email: test@example.com
   - Telepon: 081234567890
3. Klik "Lanjut ke Pembayaran"
4. Di modal Midtrans, pilih metode pembayaran
5. Gunakan test card: 4111 1111 1111 1111
6. Finish → Check database
```

### Step 5: Verifikasi Database (2 menit)
```bash
# Buka SQLite
sqlite3 database/database.sqlite

# Query donations
SELECT * FROM donations ORDER BY created_at DESC LIMIT 1;

# Check payment status
SELECT id, transaction_id, payment_status, amount FROM donations;
```

---

## 🔗 File Structure Reference

```
📁 app/
  ├── 📁 Services/
  │   └── MidtransService.php ⭐ API integration
  ├── 📁 Models/
  │   └── Donation.php ⭐ Database model
  └── 📁 Http/Controllers/
      └── DonationController.php ⭐ Request handlers

📁 config/
  └── midtrans.php ⭐ Configuration

📁 database/
  └── 📁 migrations/
      └── 2026_06_03_040433_create_donations_table.php ⭐ Schema

📁 resources/
  └── 📁 views/
      └── donasi.blade.php ⭐ Frontend form + JS

📁 routes/
  └── web.php ⭐ API endpoints

📄 .env ⭐ Credentials
📄 DONATION_SETUP.md 📖 Full documentation
```

---

## 🚀 Alur Lengkap (Dari User Perspective)

```
User opens /donasi page
    ↓
User fills donation form
    ↓
User clicks "Lanjut ke Pembayaran"
    ↓
JavaScript sends data to /api/donations [POST]
    ↓
Backend creates Donation record in DB
    ↓
Backend calls Midtrans API for snap token
    ↓
Frontend receives snap token
    ↓
Midtrans Snap widget pops up (modal)
    ↓
User selects payment method & pays
    ↓
Midtrans processes payment
    ↓
User redirected to callback URL (/donation/finish or /error)
    ↓
Database updated with payment status
    ↓
User sees success/error message
```

---

## 🔐 Environment Variables

| Variable | Value | Notes |
|----------|-------|-------|
| `MIDTRANS_IS_PRODUCTION` | `false` | Sandbox mode untuk testing |
| `MIDTRANS_MERCHANT_ID` | `G12345678` | Dari Midtrans dashboard |
| `MIDTRANS_SERVER_KEY` | `SB-Mid-server-xxx` | Secret key (jangan di-share!) |
| `MIDTRANS_CLIENT_KEY` | `SB-Mid-client-xxx` | Public key untuk frontend |

---

## 🧪 Test Credentials (Sandbox)

### Kartu Kredit
- **Nomor**: 4111 1111 1111 1111
- **CVV**: 123 (random)
- **Tanggal**: 12/25 (future date)

### E-Wallet (GCash, OVO, Dana, dll)
Lihat: https://docs.midtrans.com/en/technical-reference/sandbox-test-credentials

---

## ⚠️ Penting!

1. **Credentials di .env** - JANGAN di-commit ke Git
2. **Production Setup** - Ubah `MIDTRANS_IS_PRODUCTION=true` + URL untuk production
3. **HTTPS Required** - Production memerlukan SSL certificate
4. **Public URL** - Callback URL harus accessible dari Midtrans servers
5. **Webhook Configuration** - Setup di Midtrans dashboard untuk real-time updates

---

## 🎉 Next Steps

- [ ] Setup Midtrans account
- [ ] Update .env dengan credentials
- [ ] Test pembayaran di sandbox
- [ ] Check database records
- [ ] Setup email notifications (optional)
- [ ] Deploy ke production

---

## 📞 Support

Jika ada issues:
1. Check `storage/logs/laravel.log`
2. Verify Midtrans credentials di `.env`
3. Test dengan manual query ke database
4. Review DONATION_SETUP.md untuk troubleshooting

---

**Status**: ✅ Ready for Setup & Testing
**Last Updated**: June 3, 2026
