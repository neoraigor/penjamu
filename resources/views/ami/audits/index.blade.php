@extends('layouts.app')

@section('title', 'Jadwal Audit - AMI')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Jadwal Audit Mutu Internal</h2>
        <a href="{{ route('ami.audits.create') }}" class="btn btn-success">Tambah Jadwal</a>
    </div>
    
    @if($audits->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Program Studi</th>
                    <th>Auditor</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audits as $audit)
                <tr>
                    <td>{{ $audit->title }}</td>
                    <td>{{ $audit->program->name }}</td>
                    <td>{{ $audit->auditor->name }}</td>
                    <td>{{ date('d/m/Y', strtotime($audit->date)) }}</td>
                    <td>{{ date('H:i', strtotime($audit->time)) }}</td>
                    <td><span class="badge badge-{{ $audit->status }}">{{ ucfirst($audit->status) }}</span></td>
                    <td>
                        <a href="{{ route('ami.audits.show', $audit) }}" class="btn btn-sm">Detail</a>
                        <a href="{{ route('ami.audits.edit', $audit) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('ami.audits.destroy', $audit) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div style="margin-top: 1rem;">
            {{ $audits->links() }}
        </div>
    @else
        <p>Belum ada jadwal audit. <a href="{{ route('ami.audits.create') }}">Tambah jadwal audit</a></p>
    @endif
</div>
@endsection
