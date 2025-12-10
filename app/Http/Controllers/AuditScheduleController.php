<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditSchedule;
use App\Models\Program;
use App\Models\User;

class AuditScheduleController extends Controller
{
    public function index()
    {
        $audits = AuditSchedule::with(['program', 'auditor'])
            ->latest()
            ->paginate(10);
        return view('ami.audits.index', compact('audits'));
    }

    public function create()
    {
        $programs = Program::all();
        $auditors = User::all();
        return view('ami.audits.create', compact('programs', 'auditors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'program_id' => 'required|exists:programs,id',
            'auditor_id' => 'required|exists:users,id',
            'status' => 'required|in:scheduled,ongoing,completed,cancelled',
        ]);

        AuditSchedule::create($validated);
        return redirect()->route('ami.audits.index')->with('success', 'Jadwal audit berhasil ditambahkan');
    }

    public function show(AuditSchedule $audit)
    {
        $audit->load(['program', 'auditor', 'findings', 'documents']);
        return view('ami.audits.show', compact('audit'));
    }

    public function edit(AuditSchedule $audit)
    {
        $programs = Program::all();
        $auditors = User::all();
        return view('ami.audits.edit', compact('audit', 'programs', 'auditors'));
    }

    public function update(Request $request, AuditSchedule $audit)
    {
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'program_id' => 'required|exists:programs,id',
            'auditor_id' => 'required|exists:users,id',
            'status' => 'required|in:scheduled,ongoing,completed,cancelled',
        ]);

        $audit->update($validated);
        return redirect()->route('ami.audits.index')->with('success', 'Jadwal audit berhasil diupdate');
    }

    public function destroy(AuditSchedule $audit)
    {
        $audit->delete();
        return redirect()->route('ami.audits.index')->with('success', 'Jadwal audit berhasil dihapus');
    }
}
