<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis increment
            $table->string('name'); // Kolom name tipe string
            $table->string('email')->unique(); // Kolom email tipe string dan unik
            $table->string('password'); // Kolom password tipe string
            $table->string('upload_resume')->nullable(); // Kolom upload_resume tipe string, nullable untuk data opsional
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
