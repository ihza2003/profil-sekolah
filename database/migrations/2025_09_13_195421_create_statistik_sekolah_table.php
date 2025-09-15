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
        Schema::create('statistik_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->unsignedInteger('jumlah_guru')->default(0);
            $table->unsignedInteger('jumlah_kelas')->default(0);
            $table->unsignedInteger('jumlah_siswa')->default(0);
            $table->foreignId('admin_id')->nullable()->constrained('admins')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_sekolah');
    }
};
