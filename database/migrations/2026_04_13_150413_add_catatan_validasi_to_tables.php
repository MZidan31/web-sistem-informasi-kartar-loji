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
        Schema::table('inovasis', function (Blueprint $table) {
            // Tambahin kolom catatan_validasi setelah status
            $table->text('catatan_validasi')->nullable()->after('status');
        });

        Schema::table('kegiatans', function (Blueprint $table) {
            // Tambahin kolom catatan_validasi setelah status
            $table->text('catatan_validasi')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('inovasis', function (Blueprint $table) {
            $table->dropColumn('catatan_validasi');
        });

        Schema::table('kegiatans', function (Blueprint $table) {
            $table->dropColumn('catatan_validasi');
        });
    }
};
