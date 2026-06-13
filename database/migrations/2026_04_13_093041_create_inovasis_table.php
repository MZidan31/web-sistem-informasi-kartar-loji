<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inovasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('kategori_id'); // Ganti dari 'kategori'
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('status')->default('pending');
            $table->text('catatan')->nullable(); // Ganti dari 'catatan_validasi'
            $table->timestamp('tanggal_diajukan')->nullable(); // Ganti dari 'tanggalDiajukan'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inovasis');
    }
};
