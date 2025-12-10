<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Penjaminan Mutu')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            line-height: 1.6;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header h1 {
            font-size: 1.5rem;
        }
        .nav {
            background-color: #34495e;
            padding: 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
        }
        .nav li {
            margin: 0;
        }
        .nav a {
            color: white;
            text-decoration: none;
            padding: 1rem 1.5rem;
            display: block;
            transition: background-color 0.3s;
        }
        .nav a:hover {
            background-color: #2c3e50;
        }
        .nav a.active {
            background-color: #1abc9c;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .card-header {
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #ecf0f1;
        }
        .card-header h2 {
            color: #2c3e50;
            font-size: 1.5rem;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .btn-success {
            background-color: #27ae60;
        }
        .btn-success:hover {
            background-color: #229954;
        }
        .btn-danger {
            background-color: #e74c3c;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        .btn-warning {
            background-color: #f39c12;
        }
        .btn-warning:hover {
            background-color: #e67e22;
        }
        .btn-sm {
            padding: 0.3rem 0.6rem;
            font-size: 0.875rem;
        }
        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        table th, table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }
        table th {
            background-color: #34495e;
            color: white;
            font-weight: bold;
        }
        table tr:hover {
            background-color: #f8f9fa;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #2c3e50;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        .form-group textarea {
            min-height: 100px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-card h3 {
            font-size: 2rem;
            color: #3498db;
            margin-bottom: 0.5rem;
        }
        .stat-card p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: bold;
        }
        .badge-scheduled {
            background-color: #3498db;
            color: white;
        }
        .badge-ongoing {
            background-color: #f39c12;
            color: white;
        }
        .badge-completed {
            background-color: #27ae60;
            color: white;
        }
        .badge-cancelled {
            background-color: #95a5a6;
            color: white;
        }
        .badge-low {
            background-color: #3498db;
            color: white;
        }
        .badge-medium {
            background-color: #f39c12;
            color: white;
        }
        .badge-high {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sistem Informasi Penjaminan Mutu - AMI</h1>
    </div>
    
    <nav class="nav">
        <ul>
            <li><a href="{{ route('dashboard') }}" class="{{ request()->is('/') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('siakad.programs.index') }}" class="{{ request()->is('siakad/programs*') ? 'active' : '' }}">Program Studi</a></li>
            <li><a href="{{ route('ami.audits.index') }}" class="{{ request()->is('ami/audits*') ? 'active' : '' }}">Jadwal Audit</a></li>
        </ul>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
