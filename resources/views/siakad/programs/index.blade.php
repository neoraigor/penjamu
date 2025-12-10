@extends('layouts.app')

@section('title', 'Program Studi - SIAKAD')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Data Program Studi</h2>
        <a href="{{ route('siakad.programs.create') }}" class="btn btn-success">Tambah Program</a>
    </div>
    
    @if($programs->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Program</th>
                    <th>Jenjang</th>
                    <th>Jumlah Dosen</th>
                    <th>Jumlah Mata Kuliah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                <tr>
                    <td>{{ $program->code }}</td>
                    <td>{{ $program->name }}</td>
                    <td>{{ $program->level }}</td>
                    <td>{{ $program->lecturers_count }}</td>
                    <td>{{ $program->courses_count }}</td>
                    <td>
                        <a href="{{ route('siakad.programs.show', $program) }}" class="btn btn-sm">Detail</a>
                        <a href="{{ route('siakad.programs.edit', $program) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('siakad.programs.destroy', $program) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada data program studi. <a href="{{ route('siakad.programs.create') }}">Tambah program studi</a></p>
    @endif
</div>
@endsection
