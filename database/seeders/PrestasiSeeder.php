<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prestasi')->insert([
            [
                'judul' => 'MTQ Tingkat Distrik Abepura Tahun 2024',
                'isi' => "Siswa-siswi MTs Muhammadiyah Jayapura kembali mengukir prestasi
                    membanggakan dalam ajang Musabaqah Tilawatil Qur’an (MTQ) tingkat Distrik Abepura.
                    Dalam perlombaan yang berlangsung dengan penuh semangat dan kompetisi yang ketat ini,
                    mereka berhasil meraih juara di berbagai cabang perlombaan. Prestasi ini menjadi bukti nyata dari
                    semangat belajar dan dedikasi para siswa dalam mendalami dan mencintai Al-Qur’an.  Indah meraih Juara 2 dalam cabang Hifzil Qur’an Putri, sementara Dewi berhasil
                    mendapatkan Juara 2 dalam cabang Tilawah Qur’an Putri. Di kategori putra, Mufid tampil
                    gemilang dengan menyabet Juara 1 dalam cabang Tilawah Qur’an Putra, dan Rangga turut menyumbangkan
                    prestasi sebagai Juara 1 dalam cabang Kaligrafi. Keberhasilan ini menjadi kebanggaan bagi sekolah dan
                    menunjukkan komitmen MTs Muhammadiyah Jayapura dalam membina generasi Qur’ani yang berprestasi.",
                'gambar' => 'berita/prestasi1.jpg',
                'gambar_tambahan' => null,
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Juara II Lomba Gerak Jalan tahun 2024',
                'isi' => 'Pada peringatan Hari Kemerdekaan Republik Indonesia ke-79, tim gerak jalan dari MTs Muhammadiyah Jayapura berhasil meraih Juara II dalam lomba gerak jalan tingkat SMP/MTs se-Kabupaten Jayapura yang diselenggarakan pada tanggal 16 Agustus 2024.
                        Lomba ini diikuti oleh puluhan sekolah dengan rute sepanjang 5 kilometer yang dimulai dari Kantor Kecamatan hingga Lapangan Merdeka. Tim yang terdiri dari 16 siswa ini tampil dengan semangat, kekompakan, dan disiplin tinggi yang menjadi kunci keberhasilan mereka.
                        Prestasi ini menjadi bukti semangat nasionalisme dan kerja sama tim yang kuat di kalangan siswa. Pihak sekolah memberikan apresiasi penuh kepada peserta dan pembina atas kerja keras yang telah ditunjukkan.',
                'gambar' => 'berita/prestasi2.jpg',
                'gambar_tambahan' => null,
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Juara 3 Kejuaraan Futsal Tahun 2025',
                'isi' => 'Tim futsal MTs Muhammadiyah Jayapura berhasil meraih Juara 3 dalam Kejuaraan Futsal antar pelajar tingkat SMP/MTs se-Kabupaten Jayapura yang digelar pada bulan Mei 2025 di GOR Sentani.Kompetisi ini diikuti oleh lebih dari 20 tim dari berbagai sekolah. Dengan semangat sportivitas dan kerja sama tim yang solid, tim futsal MTs Muhammadiyah Jayapura berhasil menembus babak semifinal dan mengamankan posisi ketiga setelah pertandingan sengit melawan SMPN 2 Sentani.
                            Prestasi ini menjadi motivasi bagi para siswa untuk terus mengembangkan bakat di bidang olahraga, khususnya futsal, serta memperkuat semangat kompetitif dan solidaritas antar siswa.',
                'gambar' => 'berita/prestasi3.jpg',
                'gambar_tambahan' => null,
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
