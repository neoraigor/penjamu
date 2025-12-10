@extends('layouts.app')

@section('title', 'Detail Audit - AMI')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Detail Jadwal Audit</h2>
        <div>
            <a href="{{ route('ami.audits.edit', $audit) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('ami.audits.index') }}" class="btn">Kembali</a>
        </div>
    </div>
    
    <table style="margin-top: 0;">
        <tr>
            <th style="width: 200px;">Judul</th>
            <td>{{ $audit->title }}</td>
        </tr>
        <tr>
            <th>Program Studi</th>
            <td>{{ $audit->program->name }} ({{ $audit->program->level }})</td>
        </tr>
        <tr>
            <th>Auditor</th>
            <td>{{ $audit->auditor->name }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ date('d/m/Y', strtotime($audit->date)) }}</td>
        </tr>
        <tr>
            <th>Waktu</th>
            <td>{{ date('H:i', strtotime($audit->time)) }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td><span class="badge badge-{{ $audit->status }}">{{ ucfirst($audit->status) }}</span></td>
        </tr>
    </table>

    @if($audit->findings->count() > 0)
        <h3 style="margin-top: 2rem; margin-bottom: 1rem; color: #2c3e50;">Temuan Audit</h3>
        <table>
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Temuan</th>
                    <th>Tingkat</th>
                    <th>Rekomendasi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audit->findings as $finding)
                <tr>
                    <td>{{ $finding->category }}</td>
                    <td>{{ $finding->finding }}</td>
                    <td><span class="badge badge-{{ $finding->severity }}">{{ ucfirst($finding->severity) }}</span></td>
                    <td>{{ $finding->recommendation ?? '-' }}</td>
                    <td>{{ ucfirst($finding->status) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="margin-top: 2rem;">Belum ada temuan audit untuk jadwal ini.</p>
    @endif

    @if($audit->documents->count() > 0)
        <h3 style="margin-top: 2rem; margin-bottom: 1rem; color: #2c3e50;">Dokumen Audit</h3>
        <table>
            <thead>
                <tr>
                    <th>Judul Dokumen</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audit->documents as $document)
                <tr>
                    <td>{{ $document->title }}</td>
                    <td>{{ $document->file_path }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="margin-top: 2rem;">Belum ada dokumen audit untuk jadwal ini.</p>
    @endif
</div>
@endsection
