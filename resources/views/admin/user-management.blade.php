@extends('admin.dashboard')
@section('content')

    <!-- Top Header -->
    <header class="top-header">
        <div class="header-content">
            <h1 class="header-title user">User Management (GUEST)</h1>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">245</div>
            <div class="stat-label">Total Users</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">67</div>
            <div class="stat-label">Active Users</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">123</div>
            <div class="stat-label">Inactive Users</div>
        </div>

    </div>

@endsection
