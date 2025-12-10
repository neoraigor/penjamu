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
        // Tabel Jadwal Audit
        Schema::create('audit_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->time('time');
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->foreignId('auditor_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['scheduled', 'ongoing', 'completed', 'cancelled'])->default('scheduled');
            $table->timestamps();
        });

        // Tabel Temuan Audit
        Schema::create('audit_findings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_schedule_id')->constrained('audit_schedules')->onDelete('cascade');
            $table->string('category'); // Standar yang diaudit
            $table->text('finding'); // Deskripsi temuan
            $table->enum('severity', ['low', 'medium', 'high'])->default('medium');
            $table->text('recommendation')->nullable(); // Rekomendasi perbaikan
            $table->enum('status', ['open', 'in_progress', 'resolved'])->default('open');
            $table->timestamps();
        });

        // Tabel Dokumen Audit
        Schema::create('audit_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_schedule_id')->constrained('audit_schedules')->onDelete('cascade');
            $table->string('title');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_documents');
        Schema::dropIfExists('audit_findings');
        Schema::dropIfExists('audit_schedules');
    }
};
