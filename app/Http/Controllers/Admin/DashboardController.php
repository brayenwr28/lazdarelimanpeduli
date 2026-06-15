<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\User;
use App\Models\Distribution;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDonasi = Donation::where('status', 'success')->sum('amount');
        $totalTersalurkan = Distribution::sum('amount');
        $saldoDonasi = $totalDonasi - $totalTersalurkan;
        
        $totalTransaksi = Donation::where('status', 'success')->count();
        $menungguKonfirmasi = Donation::where('status', 'pending')->count();
        
        $donaturUnik = Donation::where('status', 'success')->whereNotNull('donor_email')->distinct('donor_email')->count('donor_email');
        if ($donaturUnik == 0) {
            $donaturUnik = Donation::where('status', 'success')->count();
        }

        // Chart Data: Tren Donasi 6/12 Bulan (Mocked/Calculated)
        // Since it's a new db, most will be in current month.
        $months = [];
        $trendData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months[] = $date->translatedFormat('M Y');
            $sum = Donation::where('status', 'success')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('amount');
            $trendData[] = $sum;
        }

        // Chart Data: Komposisi per Kategori
        $kategoriData = Donation::select('campaign_category', DB::raw('SUM(amount) as total'))
            ->where('status', 'success')
            ->groupBy('campaign_category')
            ->pluck('total', 'campaign_category')
            ->toArray();
            
        // Provide defaults if empty
        if (empty($kategoriData)) {
            $kategoriData = ['sedekah' => 0, 'zakat' => 0, 'infak' => 0, 'kemanusiaan' => 0];
        }

        return view('admin.dashboard', compact(
            'totalDonasi', 'totalTersalurkan', 'saldoDonasi', 
            'totalTransaksi', 'menungguKonfirmasi', 'donaturUnik',
            'months', 'trendData', 'kategoriData'
        ));
    }
}
