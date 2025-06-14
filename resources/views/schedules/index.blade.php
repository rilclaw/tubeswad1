@extends('layouts.app')

@section('title', 'Lihat Jadwal')

@section('content')
    <h2 class="mb-4">📅 Jadwal Hari Ini ({{ $today }})</h2>

    @if ($schedules->isEmpty())
        <div class="alert alert-info">Belum ada jadwal untuk hari ini.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Hari</th>
                    <thAktivitas</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->day }}</td>
                        <td>{{ $schedule->course_name }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>{{ $schedule->location ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('schedules.create') }}" class="btn btn-primary mt-3">➕ Tambah Jadwal</a>
@endsection
