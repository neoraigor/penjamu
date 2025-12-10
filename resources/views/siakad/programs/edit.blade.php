@extends('layouts.app')

@section('title', 'Edit Program Studi - SIAKAD')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Program Studi</h2>
    </div>
    
    <form action="{{ route('siakad.programs.update', $program) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="code">Kode Program *</label>
            <input type="text" id="code" name="code" value="{{ old('code', $program->code) }}" required>
            @error('code')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="name">Nama Program *</label>
            <input type="text" id="name" name="name" value="{{ old('name', $program->name) }}" required>
            @error('name')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="level">Jenjang *</label>
            <select id="level" name="level" required>
                <option value="">Pilih Jenjang</option>
                <option value="D3" {{ old('level', $program->level) == 'D3' ? 'selected' : '' }}>D3</option>
                <option value="D4" {{ old('level', $program->level) == 'D4' ? 'selected' : '' }}>D4</option>
                <option value="S1" {{ old('level', $program->level) == 'S1' ? 'selected' : '' }}>S1</option>
                <option value="S2" {{ old('level', $program->level) == 'S2' ? 'selected' : '' }}>S2</option>
                <option value="S3" {{ old('level', $program->level) == 'S3' ? 'selected' : '' }}>S3</option>
            </select>
            @error('level')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        
        <div style="margin-top: 1rem;">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('siakad.programs.show', $program) }}" class="btn">Batal</a>
        </div>
    </form>
</div>
@endsection
