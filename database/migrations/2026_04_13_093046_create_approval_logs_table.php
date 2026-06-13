<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('approval_logs', function (Blueprint $table) {
            $table->id();
            $table->morphs('approvalable'); // Mencakup approvalable_id dan approvalable_type
            $table->foreignId('approvedBy')->constrained('users')->cascadeOnDelete();
            $table->enum('status', ['disetujui', 'ditolak']);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('approval_logs');
    }
};
