<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::withCount(['lecturers', 'courses'])->get();
        return view('siakad.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('siakad.programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:programs|max:20',
            'name' => 'required',
            'level' => 'required',
        ]);

        Program::create($validated);
        return redirect()->route('siakad.programs.index')->with('success', 'Program berhasil ditambahkan');
    }

    public function show(Program $program)
    {
        $program->load(['lecturers', 'courses']);
        return view('siakad.programs.show', compact('program'));
    }

    public function edit(Program $program)
    {
        return view('siakad.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'code' => 'required|max:20|unique:programs,code,' . $program->id,
            'name' => 'required',
            'level' => 'required',
        ]);

        $program->update($validated);
        return redirect()->route('siakad.programs.index')->with('success', 'Program berhasil diupdate');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('siakad.programs.index')->with('success', 'Program berhasil dihapus');
    }
}
