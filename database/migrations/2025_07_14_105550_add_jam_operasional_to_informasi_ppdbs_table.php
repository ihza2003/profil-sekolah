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
        Schema::table('informasi_ppdbs', function (Blueprint $table) {
            $table->string('jam_operasional_hari')->nullable();
            $table->string('jam_operasional_jam')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informasi_ppdbs', function (Blueprint $table) {
            $table->dropColumn(['jam_operasional_hari', 'jam_operasional_jam']);
        });
    }
};
