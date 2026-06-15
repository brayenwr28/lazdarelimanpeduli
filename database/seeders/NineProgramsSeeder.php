<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class NineProgramsSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            ['title' => 'Tebar Ifthor Ramadhan 1447 H', 'category' => 'sedekah', 'target_amount' => 50000000],
            ['title' => 'Khitanan Massal 200 Anak', 'category' => 'kemanusiaan', 'target_amount' => 150000000],
            ['title' => 'Zakat Maal', 'category' => 'zakat', 'target_amount' => 500000000],
            ['title' => 'Zakat Fitrah', 'category' => 'zakat', 'target_amount' => 100000000],
            ['title' => 'Infaq Pembangunan Masjid', 'category' => 'infak', 'target_amount' => 2000000000],
            ['title' => 'Sedekah Air Bersih', 'category' => 'sedekah', 'target_amount' => 25000000],
            ['title' => 'Bantuan Kemanusiaan Palestina', 'category' => 'kemanusiaan', 'target_amount' => 300000000],
            ['title' => 'Fidyah', 'category' => 'sedekah', 'target_amount' => 10000000],
            ['title' => 'Pemberdayaan UMKM Mualaf', 'category' => 'pemberdayaan', 'target_amount' => 50000000]
        ];

        foreach ($programs as $prog) {
            Program::firstOrCreate(
                ['title' => $prog['title']],
                [
                    'description' => 'Program ' . $prog['title'] . ' diselenggarakan oleh LAZ Dar el-Iman Peduli. Mari bersama-sama kita dukung program ini.',
                    'target_amount' => $prog['target_amount'],
                    'category' => $prog['category'],
                    'image_url' => 'https://via.placeholder.com/600x400/0066b2/ffffff?text=' . urlencode($prog['title']),
                    'is_active' => true,
                ]
            );
        }
    }
}
