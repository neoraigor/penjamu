@extends('layouts.app')

@section('title', 'Dashboard - Sistem AMI')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Dashboard</h2>
    </div>
    
    <div class="stats-grid">
        <div class="stat-card">
            <h3>{{ $stats['programs'] }}</h3>
            <p>Program Studi</p>
        </div>
        <div class="stat-card">
            <h3>{{ $stats['lecturers'] }}</h3>
            <p>Dosen</p>
        </div>
        <div class="stat-card">
            <h3>{{ $stats['courses'] }}</h3>
            <p>Mata Kuliah</p>
        </div>
        <div class="stat-card">
            <h3>{{ $stats['audits'] }}</h3>
            <p>Total Audit</p>
        </div>
        <div class="stat-card">
            <h3>{{ $stats['findings'] }}</h3>
            <p>Temuan Terbuka</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>Audit Terbaru</h2>
    </div>
    
    @if($recentAudits->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Program Studi</th>
                    <th>Auditor</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentAudits as $audit)
                <tr>
                    <td>{{ $audit->title }}</td>
                    <td>{{ $audit->program->name }}</td>
                    <td>{{ $audit->auditor->name }}</td>
                    <td>{{ date('d/m/Y', strtotime($audit->date)) }}</td>
                    <td><span class="badge badge-{{ $audit->status }}">{{ ucfirst($audit->status) }}</span></td>
                    <td>
                        <a href="{{ route('ami.audits.show', $audit) }}" class="btn btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada data audit.</p>
    @endif
</div>
@endsection
