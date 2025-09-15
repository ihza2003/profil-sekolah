<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ekskuls')->insert([
            [
                'judul' => 'Ikatan Pelajar Muhammadiyah (IPM)',
                'isi' => 'Ikatan Pelajar Muhammadiyah (IPM) adalah organisasi pelajar di bawah naungan Muhammadiyah yang fokus pada pembinaan keislaman, kepemimpinan, dan pengembangan potensi pelajar. Dengan mengikuti IPM, siswa dapat melatih jiwa kepemimpinan, kemampuan berbicara di depan umum, serta pengalaman mengelola program kegiatan sosial dan keagamaan. IPM juga telah menorehkan prestasi seperti Juara 1 Lomba Debat Pelajar Se-Kota Jayapura tahun 2023 dan mendapatkan penghargaan sebagai Organisasi Teraktif tingkat provinsi pada tahun 2022.',
                'gambar' => 'ekskul/ekskul.jpg',
                'kategori' => 'Organisasi',
                'gambar_tambahan' => 'ekskul/ipm1.jpeg',
                'gambar_cadangan' => 'ekskul/ipm2.jpeg',
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tahfidzul Qur\'an',
                'isi' => 'Program Tahfidz Quran merupakan program islami yang membimbing siswa untuk menghafal Al-Quran secara bertahap dengan metode yang mudah dipahami dan bimbingan rutin dari pembina. Kegiatan ini meningkatkan kedisiplinan ibadah, memperkuat nilai spiritual, dan menumbuhkan kecintaan terhadap Al-Qur’an. Ekskul ini juga berhasil menjadi finalis Musabaqah Hifdzil Qur’an Tingkat Provinsi Papua tahun 2023.',
                'gambar' => 'ekskul/tahfidz.jpeg',
                'kategori' => 'keislaman',
                'gambar_tambahan' => 'ekskul/tahfidz2.jpeg',
                'gambar_cadangan' => 'ekskul/tahfidz1.jpeg',
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Hizbul Wathan',
                'isi' => 'Hizbul Wathan adalah gerakan kepanduan Muhammadiyah yang bertujuan mendidik siswa menjadi pribadi yang disiplin, tangguh, dan cinta tanah air serta agama. Peserta didik akan memperoleh pengalaman dalam kegiatan lapangan seperti baris-berbaris, kemah, survival, dan bakti sosial.',
                'gambar' => 'ekskul/hizbul.jpg',
                'kategori' => 'Kepemanduan',
                'gambar_tambahan' => 'ekskul/hw1.jpeg',
                'gambar_cadangan' => null,
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tapak Suci Putra Muhammadiyah',
                'isi' => 'Tapak Suci adalah seni bela diri asli Muhammadiyah yang membentuk karakter disiplin, tangguh, dan mandiri. Ekskul ini mengajarkan teknik bela diri serta nilai-nilai kejujuran dan keberanian. Tapak Suci telah menjuarai berbagai kejuaraan seperti Juara 2 Kejurda Tapak Suci Papua Barat (2022) dan Juara 1 Lomba Jurus antar Pelajar tingkat Kota (2023).',
                'gambar' => 'ekskul/konten1.png',
                'kategori' => 'Bela diri',
                'gambar_tambahan' => 'ekskul/ts1.jpeg',
                'gambar_cadangan' => null,
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Futsal',
                'isi' => 'Ekskul Futsal adalah wadah pengembangan bakat siswa dalam bidang olahraga, khususnya futsal. Kegiatan ini melatih kekompakan tim, stamina, dan sportivitas. Tim futsal sekolah telah meraih Juara 3 Turnamen Futsal Pelajar Se-Kota Jayapura tahun 2023 dan rutin mengikuti kompetisi tahunan antar sekolah.',
                'gambar' => 'ekskul/futsal.png',
                'kategori' => 'Olahraga',
                'gambar_tambahan' => 'ekskul/prestasi3.jpg',
                'gambar_cadangan' => null,
                'video' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
