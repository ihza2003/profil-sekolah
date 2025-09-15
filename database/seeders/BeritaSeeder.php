<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('berita')->insert([
            [
                'judul' => 'Perpisahan Kelas IX tahun 2023',
                'isi' => 'MTs Muhammadiyah Jayapura mengadakan Acara perpisahan untuk kelas IX dengan meriah dan khidmat. Acara ini diikuti oleh seluruh guru dan siswa di gedung serbaguna ump abepura. Dalam sambutannya, kepala sekolah menyampaikan apresiasi dan selamat kepada seluruh siswa kelas IX. Selain upacara, juga diadakan berbagai lomba seperti baca puisi, pidato, dan pemberian sertifikat kepada siswa berprestasi dan tahfidz.',
                'gambar' => 'berita/konten2.png',
                'gambar_tambahan' => 'berita/konten2.png',
                'video' => 'berita/video-sekolah.mp4',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Perpisahan Kelas IX tahun 2023',
                'isi' => 'MTs Muhammadiyah Jayapura mengadakan Acara perpisahan untuk kelas IX dengan meriah dan khidmat. Acara ini diikuti oleh seluruh guru dan siswa di gedung serbaguna ump abepura. Dalam sambutannya, kepala sekolah menyampaikan apresiasi dan selamat kepada seluruh siswa kelas IX. Selain upacara, juga diadakan berbagai lomba seperti baca puisi, pidato, dan pemberian sertifikat kepada siswa berprestasi dan tahfidz.',
                'gambar' => 'berita/konten2.png',
                'gambar_tambahan' => 'berita/konten2.png',
                'video' => 'berita/video-sekolah.mp4',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Latihan perdana Bela Diri Tapak Suci tahun ajaran 2024',
                'isi' => 'Kegiatan latihan perdana Tapak Suci tahun ajaran 2024 resmi dimulai pada Sabtu, 8 Juni 2024 di halaman sekolah. Latihan ini diikuti oleh puluhan siswa baru yang antusias mempelajari dasar-dasar bela diri khas Muhammadiyah ini.
                            Latihan dimulai dengan pengenalan gerakan dasar serta pemahaman nilai-nilai keislaman yang menjadi landasan utama Tapak Suci. Pelatih utama, Kak Arif, menyampaikan bahwa kegiatan ini bukan hanya tentang fisik, tetapi juga pembentukan karakter.
                            Dengan semangat dan disiplin, diharapkan seluruh peserta mampu mengikuti latihan secara rutin dan menunjukkan perkembangan positif di setiap pertemuan.',
                'gambar' => 'berita/konten1.png',
                'gambar_tambahan' => null,
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
