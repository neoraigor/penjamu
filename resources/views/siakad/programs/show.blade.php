@extends('layouts.app')

@section('title', 'Detail Program Studi - SIAKAD')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Detail Program Studi</h2>
        <div>
            <a href="{{ route('siakad.programs.edit', $program) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('siakad.programs.index') }}" class="btn">Kembali</a>
        </div>
    </div>
    
    <table style="margin-top: 0;">
        <tr>
            <th style="width: 200px;">Kode</th>
            <td>{{ $program->code }}</td>
        </tr>
        <tr>
            <th>Nama Program</th>
            <td>{{ $program->name }}</td>
        </tr>
        <tr>
            <th>Jenjang</th>
            <td>{{ $program->level }}</td>
        </tr>
        <tr>
            <th>Jumlah Dosen</th>
            <td>{{ $program->lecturers->count() }}</td>
        </tr>
        <tr>
            <th>Jumlah Mata Kuliah</th>
            <td>{{ $program->courses->count() }}</td>
        </tr>
    </table>

    @if($program->lecturers->count() > 0)
        <h3 style="margin-top: 2rem; margin-bottom: 1rem; color: #2c3e50;">Daftar Dosen</h3>
        <table>
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach($program->lecturers as $lecturer)
                <tr>
                    <td>{{ $lecturer->nip }}</td>
                    <td>{{ $lecturer->name }}</td>
                    <td>{{ $lecturer->email ?? '-' }}</td>
                    <td>{{ $lecturer->phone ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($program->courses->count() > 0)
        <h3 style="margin-top: 2rem; margin-bottom: 1rem; color: #2c3e50;">Daftar Mata Kuliah</h3>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($program->courses as $course)
                <tr>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->credits }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
