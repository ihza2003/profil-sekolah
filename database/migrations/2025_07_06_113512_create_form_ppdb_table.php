<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_ppdb', function (Blueprint $table) {
            $table->id();

            // Nomor Pendaftaran Unik
            $table->string('no_pendaftaran')->unique();
            // Data Calon Siswa
            $table->string('email');
            $table->string('nama');
            $table->string('nik');
            $table->string('nisn');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('jenis_tinggal');
            $table->text('alamat');

            // Data Periodik
            $table->string('hobby');
            $table->string('cita');
            $table->integer('anak_keberapa');
            $table->integer('berapa_saudara');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('kebutuhan_khusus');
            $table->string('jarak_sekolah');

            // Asal Sekolah
            $table->string('asal_sekolah');
            $table->string('NPSN_AsalSekolah');
            $table->text('alamat_asal_sekolah');
            $table->string('SKHUN')->nullable();
            $table->string('no_un')->nullable();
            $table->integer('tahun_kelulusan');
            $table->string('hp_siswa')->nullable();

            // Data Ayah
            $table->string('no_kk')->nullable();
            $table->string('nik_ayah');
            $table->string('nama_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tgl_lahir_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah')->nullable();
            $table->string('hp_ayah');

            // Data Ibu
            $table->string('nik_ibu');
            $table->string('nama_ibu');
            $table->string('tempat_lahir_ibu');
            $table->date('tgl_lahir_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu')->nullable();
            $table->string('hp_ibu');

            // Alamat Orang Tua dan Status
            $table->text('alamat_ortu');
            $table->string('status_keluarga');

            // Nilai Raport dan Ujian
            $table->float('nilai_kls4_smt1');
            $table->float('nilai_kls4_smt2');
            $table->float('nilai_kls5_smt1');
            $table->float('nilai_kls5_smt2');
            $table->float('nilai_kls6_smt1');
            $table->float('nilai_kls6_smt2');
            $table->float('nilai_ujian_sekolah');

            // Dokumen Upload (disimpan nama file-nya saja)
            $table->string('foto_3x4');
            $table->string('skl')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('kk');
            $table->string('kia')->nullable();
            $table->string('kip')->nullable();
            $table->string('kis')->nullable();

            // Status Proses
            $table->enum('status_verifikasi', ['belum_diverifikasi', 'proses_verifikasi', 'diterima', 'ditolak'])->default('belum_diverifikasi');
            $table->enum('status_kelulusan', ['belum_diseleksi', 'proses_seleksi', 'lulus', 'tidak_lulus'])->default('belum_diseleksi');

            // Relasi ke informasi_ppdb
            $table->foreignId('informasi_ppdb_id')->constrained('informasi_ppdbs')->onDelete('cascade');

            $table->foreignId('admin_id')->nullable()->constrained('admins')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_ppdb');
    }
};
