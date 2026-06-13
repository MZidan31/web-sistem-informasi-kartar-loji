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
        Schema::table('approval_logs', function (Blueprint $table) {
            // Kita ubah jadi string biasa (default 255 chars) biar lega
            $table->string('status')->change();
        });
    }
};
