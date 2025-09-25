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
        Schema::create('informasi_ppdbs', function (Blueprint $table) {
            $table->id();

            $table->string('banner_ppdb');
            $table->string('gelombang')->nullable();
            $table->string('tahun');

            // Periode Aktif
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            // Tanggal Penting Lainnya
            $table->date('tanggal_pengumuman')->nullable();
            $table->date('tanggal_daftar_ulang_mulai')->nullable();
            $table->date('tanggal_daftar_ulang_selesai')->nullable();

            // Informasi tambahan
            $table->json('syarat_pendaftaran');
            $table->json('prosedur_pendaftaran');

            $table->string('kontak_wa');

            // Jam operasional
            $table->string('jam_operasional_hari')->nullable();
            $table->string('jam_operasional_jam')->nullable();

            // Status aktif
            $table->boolean('status_aktif')->default(true);

            $table->foreignId('admin_id')->nullable()->constrained('admins')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_ppdbs');
    }
};
