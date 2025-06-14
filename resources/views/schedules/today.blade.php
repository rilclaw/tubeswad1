@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📅 Jadwal Hari Ini: {{ $today }}</h2>

    @if ($schedules->isEmpty())
        <div class="alert alert-warning">Tidak ada jadwal untuk hari ini.</div>
    @else
        <div class="card shadow-sm rounded p-3">
            <ul class="list-group list-group-flush">
                @foreach ($schedules as $schedule)
                    <li class="list-group-item">
                        <strong>{{ $schedule->course_name }}</strong><br>
                        🕒 {{ $schedule->start_time }} - {{ $schedule->end_time }}<br>
                        📍 {{ $schedule->location ?? 'Tidak ada lokasi' }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary mt-4">← Kembali ke Dashboard</a>
@endsection
