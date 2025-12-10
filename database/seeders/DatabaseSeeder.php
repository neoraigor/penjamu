<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Users (Auditors)
        $auditor1 = User::factory()->create([
            'name' => 'Dr. Ahmad Hidayat',
            'email' => 'ahmad@example.com',
        ]);

        $auditor2 = User::factory()->create([
            'name' => 'Dr. Siti Nurhaliza',
            'email' => 'siti@example.com',
        ]);

        // Create Programs
        $program1 = \App\Models\Program::create([
            'code' => 'TI',
            'name' => 'Teknik Informatika',
            'level' => 'S1',
        ]);

        $program2 = \App\Models\Program::create([
            'code' => 'SI',
            'name' => 'Sistem Informasi',
            'level' => 'S1',
        ]);

        $program3 = \App\Models\Program::create([
            'code' => 'TE',
            'name' => 'Teknik Elektro',
            'level' => 'S1',
        ]);

        // Create Lecturers
        \App\Models\Lecturer::create([
            'nip' => '1234567890',
            'name' => 'Dr. Budi Santoso, M.Kom',
            'email' => 'budi@example.com',
            'phone' => '081234567890',
            'program_id' => $program1->id,
        ]);

        \App\Models\Lecturer::create([
            'nip' => '1234567891',
            'name' => 'Dr. Dewi Lestari, M.T',
            'email' => 'dewi@example.com',
            'phone' => '081234567891',
            'program_id' => $program1->id,
        ]);

        \App\Models\Lecturer::create([
            'nip' => '1234567892',
            'name' => 'Dr. Eko Prasetyo, M.Kom',
            'email' => 'eko@example.com',
            'phone' => '081234567892',
            'program_id' => $program2->id,
        ]);

        // Create Courses
        \App\Models\Course::create([
            'code' => 'TIF101',
            'name' => 'Algoritma dan Pemrograman',
            'credits' => 3,
            'program_id' => $program1->id,
        ]);

        \App\Models\Course::create([
            'code' => 'TIF102',
            'name' => 'Basis Data',
            'credits' => 3,
            'program_id' => $program1->id,
        ]);

        \App\Models\Course::create([
            'code' => 'SI101',
            'name' => 'Sistem Informasi Manajemen',
            'credits' => 3,
            'program_id' => $program2->id,
        ]);

        // Create Audit Schedules
        $audit1 = \App\Models\AuditSchedule::create([
            'title' => 'AMI Standar 1: Visi, Misi, Tujuan dan Strategi',
            'date' => '2025-12-15',
            'time' => '09:00:00',
            'program_id' => $program1->id,
            'auditor_id' => $auditor1->id,
            'status' => 'scheduled',
        ]);

        $audit2 = \App\Models\AuditSchedule::create([
            'title' => 'AMI Standar 2: Tata Pamong, Tata Kelola dan Kerjasama',
            'date' => '2025-12-20',
            'time' => '10:00:00',
            'program_id' => $program2->id,
            'auditor_id' => $auditor2->id,
            'status' => 'scheduled',
        ]);

        $audit3 = \App\Models\AuditSchedule::create([
            'title' => 'AMI Standar 3: Mahasiswa',
            'date' => '2025-12-10',
            'time' => '13:00:00',
            'program_id' => $program1->id,
            'auditor_id' => $auditor1->id,
            'status' => 'completed',
        ]);

        // Create Audit Findings for completed audit
        \App\Models\AuditFinding::create([
            'audit_schedule_id' => $audit3->id,
            'category' => 'Standar 3: Mahasiswa',
            'finding' => 'Belum ada sistem monitoring kehadiran mahasiswa yang terintegrasi',
            'severity' => 'medium',
            'recommendation' => 'Mengembangkan sistem presensi online yang terintegrasi dengan SIAKAD',
            'status' => 'open',
        ]);

        \App\Models\AuditFinding::create([
            'audit_schedule_id' => $audit3->id,
            'category' => 'Standar 3: Mahasiswa',
            'finding' => 'Data alumni belum terdokumentasi dengan baik',
            'severity' => 'low',
            'recommendation' => 'Membuat database alumni yang komprehensif',
            'status' => 'in_progress',
        ]);
    }
}
