<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Peduli Guru Ngaji, Ringankan Beban Mereka Dari Himpitan Ekonomi',
                'description' => 'Guru ngaji adalah pilar penting dalam membentuk generasi Qur\'ani.',
                'target_amount' => 300000000,
                'category' => 'sedekah',
                'image_url' => 'https://via.placeholder.com/400x250?text=Gambar+Guru+Ngaji',
                'is_active' => true,
            ],
            [
                'title' => 'Bantuan Kemanusiaan Palestina',
                'description' => 'Di tengah eskalasi konflik yang semakin mencekam, jutaan masyarakat Palestina masih menjalani hari-hari yang penuh...',
                'target_amount' => 500000000,
                'category' => 'kemanusiaan',
                'image_url' => 'https://via.placeholder.com/400x250?text=Gambar+Palestina',
                'is_active' => true,
            ],
        ];

        foreach ($programs as $prog) {
            Program::firstOrCreate(['title' => $prog['title']], $prog);
        }
    }
}
