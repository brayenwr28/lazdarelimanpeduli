<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class FidyahProgramSeeder extends Seeder
{
    public function run()
    {
        // Empty programs to replace with a specific single card
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Program::truncate();
        \Illuminate\Support\Facades\DB::table('distributions')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        Program::create([
            'title' => 'Fidyah Puasa Ramadhan',
            'description' => '
                <p><strong>🌙 FIDYAH YANG DITUNAIKAN, KEBAIKAN YANG DIHADIRKAN</strong></p>
                <p>Bismillāhirrahmānirrahīm.</p>
                <br>
                <p>Ramadhan adalah bulan ibadah yang penuh kemuliaan. Namun tidak semua orang mampu menjalaninya secara sempurna. Ada yang terhalang karena sakit menahun, usia lanjut, atau sebab syar\'i lainnya yang membuat puasa tak lagi mampu ditunaikan.</p>
                <br>
                <p>Allah Ta\'ala berfirman:</p>
                <p><em>"Dan wajib bagi orang-orang yang berat menjalankannya (jika tidak berpuasa) membayar fidyah, yaitu memberi makan seorang miskin."</em><br>(QS. Al-Baqarah: 184)</p>
                <br>
                <p>Dalam ayat ini, Allah menghadirkan jalan keringanan melalui fidyah. Sebuah bentuk tanggung jawab yang tetap menjaga nilai ibadah, sekaligus menghadirkan manfaat nyata bagi mereka yang membutuhkan.</p>
                <p>Setiap satu hari puasa yang ditinggalkan diganti dengan satu paket makanan. Bagi kita mungkin terlihat sederhana, tetapi bagi saudara kita yang kekurangan, itu bisa menjadi hidangan yang sangat berarti dan menguatkan hari-hari mereka.</p>
                <br>
                <p>🍱 Rp30.000 / paket<br>(Sudah termasuk operasional)</p>
                <br>
                <p>📌 Penyaluran fidyah insyaAllah dilakukan setelah Idul Fitri kepada fakir miskin yang berhak menerima.</p>
                <br>
                <p>💳 Rekening Donasi:<br>BSI 111 222 9937<br>A.n Fidyah Yayasan Dar El-Iman</p>
                <p>📱 Konfirmasi:<br>0812 1157 7715<br>Format: Fidyah#Nama#Nominal</p>
                <br>
                <p><strong>Mari tunaikan fidyah dengan hati yang tenang dan penuh keikhlasan. Semoga Allah menerima ibadah kita dan menjadikannya amal yang terus mengalir pahalanya. Aamiin💙</strong></p>
            ',
            'target_amount' => 0, // 0 artinya Tak terbatas
            'category' => 'sedekah',
            'image_url' => 'https://via.placeholder.com/800x400/0066b2/ffffff?text=Fidyah+Puasa+Ramadhan',
            'is_active' => true,
            'end_date' => null, // Terus berjalan
            'bank_name' => 'BSI',
            'bank_account' => '111 222 9937',
            'bank_account_name' => 'FIDYAH YAYASAN DAR EL-IMAN',
            'qris_image_url' => 'https://via.placeholder.com/300x300/ffffff/000000?text=QRIS+Mockup'
        ]);
    }
}
