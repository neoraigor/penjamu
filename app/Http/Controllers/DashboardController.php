<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Lecturer;
use App\Models\Course;
use App\Models\AuditSchedule;
use App\Models\AuditFinding;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'programs' => Program::count(),
            'lecturers' => Lecturer::count(),
            'courses' => Course::count(),
            'audits' => AuditSchedule::count(),
            'findings' => AuditFinding::where('status', 'open')->count(),
        ];

        $recentAudits = AuditSchedule::with(['program', 'auditor'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recentAudits'));
    }
}
