<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('judul');
            $table->integer('kategori_id'); // Sinkron Swagger
            $table->date('tanggal_diajukan'); // Sinkron Swagger
            $table->date('tanggal_berjalan'); // Sinkron Swagger
            $table->text('deskripsi');
            $table->string('status')->default('pending');
            $table->text('catatan')->nullable(); // Sinkron Swagger
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
