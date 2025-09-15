<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galeris')->insert([
            [
                'judul' => 'Lomba MTQ Distrik Abepura',
                'gambar' => 'galeri/prestasi1.jpg',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Proker Baksos IPM',
                'gambar' => 'galeri/ekskul.jpg',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kejuaraan lomba futsal tahun 2024',
                'gambar' => 'galeri/prestasi3.jpg',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Wisuda kelas IX Tahfiz',
                'gambar' => 'galeri/konten2.png',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Latihan Rutin Tapak Suci',
                'gambar' => 'galeri/konten1.png',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kunjungan PDM Kota Jayapura',
                'gambar' => 'galeri/berita2.png',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Ujian Madrasah kelas IX',
                'gambar' => 'galeri/berita3.jpeg',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan hizbul Wathan',
                'gambar' => 'galeri/hizbul.jpg',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
