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
        Schema::create('project', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis increment
            $table->string('project_name'); // Kolom project_name tipe string
            $table->text('project_description'); // Kolom project_description tipe text
            $table->string('project_photo'); // Kolom project_photo tipe string
            $table->string('project_link'); // Kolom project_link tipe string
            $table->unsignedBigInteger('project_service'); // Kolom project_service sebagai foreign key
            $table->foreign('project_service')->references('id')->on('service')->onDelete('cascade'); // Relasi dengan tabel service
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
