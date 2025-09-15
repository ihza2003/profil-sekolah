<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('informasi_ppdbs', function (Blueprint $table) {
            $table->string('gelombang')->nullable()->after('banner_ppdb');
            $table->year('tahun')->after('gelombang');
        });
    }

    public function down(): void
    {
        Schema::table('informasi_ppdbs', function (Blueprint $table) {
            $table->dropColumn(['gelombang', 'tahun']);
        });
    }
};
