<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Menampilkan halaman formulir donasi
     */
    public function index()
    {
        $programs = \App\Models\Program::where('is_active', true)->latest()->get();
        return view('donasi', compact('programs'));
    }

    /**
     * Menampilkan formulir donasi
     */
    public function form(Request $request)
    {
        $category = $request->query('category', '');
        return view('donasi_form', compact('category'));
    }

    /**
     * Memvalidasi input dari donatur dan menyimpan datanya ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'nullable|exists:programs,id',
            'donor_name' => 'required|string|max:255',
            'donor_phone' => 'required|string|max:20',
            'donor_email' => 'nullable|email|max:255',
            'campaign_category' => 'required|in:zakat,infak,sedekah,kemanusiaan,pemberdayaan',
            'amount' => 'required|numeric|min:10000',
            'payment_method' => 'required|string|max:50',
        ], [
            'donor_name.required' => 'Nama lengkap wajib diisi.',
            'donor_phone.required' => 'Nomor telepon/WhatsApp wajib diisi.',
            'campaign_category.required' => 'Kategori donasi wajib dipilih.',
            'amount.required' => 'Nominal donasi wajib diisi.',
            'amount.min' => 'Nominal donasi minimal Rp 10.000.',
            'payment_method.required' => 'Metode pembayaran wajib dipilih.',
        ]);

        // Generate unique donation code
        $donationCode = 'DON-' . date('YmdHis') . '-' . strtoupper(substr(uniqid(), -4));

        $donation = Donation::create([
            'program_id' => $validated['program_id'] ?? null,
            'donation_code' => $donationCode,
            'donor_name' => $validated['donor_name'],
            'donor_phone' => $validated['donor_phone'],
            'donor_email' => $validated['donor_email'],
            'campaign_category' => $validated['campaign_category'],
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
        ]);

        return redirect()->route('donation.invoice', ['code' => $donation->donation_code])
            ->with('success', 'Alhamdulillah, data donasi Anda berhasil dicatat. Silakan lakukan pembayaran.');
    }

    /**
     * Menampilkan halaman invoice/detail pembayaran
     */
    public function invoice($code)
    {
        $donation = Donation::where('donation_code', $code)->firstOrFail();
        return view('invoice', compact('donation'));
    }
}
