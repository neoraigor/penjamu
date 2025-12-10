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
        // Tabel Program Studi
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('name');
            $table->string('level'); // S1, S2, S3, D3, D4
            $table->timestamps();
        });

        // Tabel Dosen
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 30)->unique();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone', 20)->nullable();
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel Mata Kuliah
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('name');
            $table->integer('credits');
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('lecturers');
        Schema::dropIfExists('programs');
    }
};
