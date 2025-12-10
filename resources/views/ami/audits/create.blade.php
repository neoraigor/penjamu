@extends('layouts.app')

@section('title', 'Tambah Jadwal Audit - AMI')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Jadwal Audit</h2>
    </div>
    
    <form action="{{ route('ami.audits.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Judul Audit *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="program_id">Program Studi *</label>
            <select id="program_id" name="program_id" required>
                <option value="">Pilih Program Studi</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                        {{ $program->name }} ({{ $program->level }})
                    </option>
                @endforeach
            </select>
            @error('program_id')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="auditor_id">Auditor *</label>
            <select id="auditor_id" name="auditor_id" required>
                <option value="">Pilih Auditor</option>
                @foreach($auditors as $auditor)
                    <option value="{{ $auditor->id }}" {{ old('auditor_id') == $auditor->id ? 'selected' : '' }}>
                        {{ $auditor->name }}
                    </option>
                @endforeach
            </select>
            @error('auditor_id')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="date">Tanggal *</label>
            <input type="date" id="date" name="date" value="{{ old('date') }}" required>
            @error('date')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="time">Waktu *</label>
            <input type="time" id="time" name="time" value="{{ old('time') }}" required>
            @error('time')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="status">Status *</label>
            <select id="status" name="status" required>
                <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('status')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        
        <div style="margin-top: 1rem;">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('ami.audits.index') }}" class="btn">Batal</a>
        </div>
    </form>
</div>
@endsection
