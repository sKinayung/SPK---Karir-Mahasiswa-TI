<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('criteria', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // Contoh: C1, C2
            $table->string('name'); // Contoh: Minat Coding, Kerja Sama Tim
            $table->enum('type', ['benefit', 'cost'])->default('benefit');
            // Tambahkan kolom kategori di bawah ini
            $table->enum('category', ['hard_skill', 'interest', 'soft_skill'])->default('hard_skill');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criteria');
    }
};
