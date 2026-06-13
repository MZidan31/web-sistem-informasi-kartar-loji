<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('foto_inovasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inovasi_id')->constrained('inovasis')->cascadeOnDelete();
            $table->string('file_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foto_inovasis');
    }
};
