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
        Schema::table('kurikulum', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'kelas', 'deksripsi']);
            $table->string('nama_kurikulum')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kurikulum', function (Blueprint $table) {
            $table->dropColumn('nama_kurikulum');
            $table->string('kategori')->nullable();
            $table->string('kelas')->nullable();
            $table->text('deksripsi')->nullable();
        });
    }
};
