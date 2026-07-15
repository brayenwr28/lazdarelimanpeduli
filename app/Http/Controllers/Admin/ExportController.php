<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ExportController extends Controller
{
    /**
     * Export data ke format Excel (CSV UTF-8 BOM agar karakter Indonesia tampil dengan benar di Excel)
     */
    private function exportCsv($filename, $headers, $rows)
    {
        $callback = function() use ($headers, $rows) {
            $file = fopen('php://output', 'w');
            // UTF-8 BOM agar Excel membaca karakter khusus dengan benar
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, $headers, ';');
            foreach ($rows as $row) {
                fputcsv($file, $row, ';');
            }
            fclose($file);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /**
     * Export Laporan Anggota / Registrasi User
     */
    public function exportUsers()
    {
        $users = \App\Models\User::where('role', 'user')->latest()->get();

        $headers = ['No', 'Nama Lengkap', 'Email', 'No HP', 'Jenis Kelamin', 'Alamat', 'Kota', 'Provinsi', 'Tanggal Daftar'];
        $rows = [];
        foreach ($users as $i => $user) {
            $rows[] = [
                $i + 1,
                $user->name,
                $user->email,
                $user->phone ?? '-',
                $user->gender ?? '-',
                $user->address ?? '-',
                $user->city ?? '-',
                $user->province ?? '-',
                $user->created_at->format('d/m/Y H:i'),
            ];
        }

        return $this->exportCsv('laporan_anggota_' . date('Ymd') . '.csv', $headers, $rows);
    }

    /**
     * Export Laporan Donasi
     */
    public function exportDonations()
    {
        $donations = \App\Models\Donation::with('program')->latest()->get();

        $headers = ['No', 'Kode Donasi', 'Nama Donatur', 'Email', 'No HP', 'Program', 'Jumlah (Rp)', 'Metode Bayar', 'Status', 'Tanggal'];
        $rows = [];
        foreach ($donations as $i => $d) {
            $rows[] = [
                $i + 1,
                $d->donation_code ?? '-',
                $d->donor_name ?? '-',
                $d->donor_email ?? '-',
                $d->donor_phone ?? '-',
                $d->program->title ?? '-',
                number_format($d->amount ?? 0, 0, ',', '.'),
                $d->payment_method ?? '-',
                $d->status ?? '-',
                $d->created_at->format('d/m/Y H:i'),
            ];
        }

        return $this->exportCsv('laporan_donasi_' . date('Ymd') . '.csv', $headers, $rows);
    }

    /**
     * Export Laporan Penyaluran
     */
    public function exportDistributions()
    {
        $distributions = \App\Models\Distribution::with('program')->latest()->get();

        $headers = ['No', 'Penerima', 'Program', 'Jumlah (Rp)', 'Lokasi', 'Keterangan', 'Tanggal'];
        $rows = [];
        foreach ($distributions as $i => $d) {
            $rows[] = [
                $i + 1,
                $d->recipient_name ?? '-',
                $d->program->title ?? '-',
                number_format($d->amount ?? 0, 0, ',', '.'),
                $d->location ?? '-',
                $d->notes ?? '-',
                $d->created_at->format('d/m/Y H:i'),
            ];
        }

        return $this->exportCsv('laporan_penyaluran_' . date('Ymd') . '.csv', $headers, $rows);
    }

    /**
     * Export Laporan Program
     */
    public function exportPrograms()
    {
        $programs = \App\Models\Program::latest()->get();

        $headers = ['No', 'Judul Program', 'Kategori', 'Target Dana (Rp)', 'Status', 'Tanggal Berakhir', 'Tanggal Dibuat'];
        $rows = [];
        foreach ($programs as $i => $p) {
            $rows[] = [
                $i + 1,
                $p->title,
                $p->category ?? '-',
                number_format($p->target_amount ?? 0, 0, ',', '.'),
                $p->is_active ? 'Aktif' : 'Nonaktif',
                $p->end_date ? \Carbon\Carbon::parse($p->end_date)->format('d/m/Y') : 'Tidak terbatas',
                $p->created_at->format('d/m/Y H:i'),
            ];
        }

        return $this->exportCsv('laporan_program_' . date('Ymd') . '.csv', $headers, $rows);
    }

    /**
     * Export Laporan Berita
     */
    public function exportNews()
    {
        $news = \App\Models\News::latest()->get();

        $headers = ['No', 'Judul Berita', 'Status', 'Tanggal Publish', 'Tanggal Dibuat'];
        $rows = [];
        foreach ($news as $i => $n) {
            $rows[] = [
                $i + 1,
                $n->title,
                $n->status ?? '-',
                $n->published_at ? \Carbon\Carbon::parse($n->published_at)->format('d/m/Y H:i') : '-',
                $n->created_at->format('d/m/Y H:i'),
            ];
        }

        return $this->exportCsv('laporan_berita_' . date('Ymd') . '.csv', $headers, $rows);
    }
}
