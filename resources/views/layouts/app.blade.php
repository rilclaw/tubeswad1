@extends('layouts.app')

@section('title', 'Lihat Jadwal')

@section('content')
    <h2 class="mb-4">📅 Jadwal Saya</h2>

    @if ($schedules->isEmpty())
        <div class="alert alert-info">
            Belum ada jadwal yang ditambahkan.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Hari</th>
                        <th>Mata Kuliah / Aktivitas</th>
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
        </div>
    @endif
@endsection
