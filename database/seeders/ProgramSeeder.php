<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs-unggulan')->insert([
            [
                'judul' => 'Pembiasaan karakter',
                'isi' => 'MTs Muhammadiyah Jayapura memiliki program unggulan dalam pembentukan karakter siswa melalui pembiasaan nilai-nilai keislaman dalam kegiatan harian. Setiap pagi, seluruh siswa mengikuti kegiatan sholat dhuha berjamaah yang dilanjutkan dengan tadarus Al-Qur’an secara bersama-sama. Setelah itu, kegiatan ditutup dengan penyampaian kultum singkat yang dilakukan secara bergilir oleh siswa. Program ini bertujuan untuk menanamkan kebiasaan baik, memperkuat spiritualitas, dan melatih kepercayaan diri siswa sejak dini. Melalui kegiatan ini, diharapkan terbentuk generasi yang tidak hanya cerdas secara akademik, tetapi juga berakhlak mulia dan religius.',
                'gambar' => 'unggulan/utama.jpeg',
                'kategori' => 'Pmebiasaan',
                'gambar_tambahan' => null,
                'gambar_cadangan' => 'unggulan/cadangan.jpeg',
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
