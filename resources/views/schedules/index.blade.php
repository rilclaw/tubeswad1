@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Jadwal Hari Ini - {{ $today }}</h2>

    @if($schedules->isEmpty())
        <div class="alert alert-info">Tidak ada jadwal untuk hari ini.</div>
    @else
        <ul class="list-group">
            @foreach($schedules as $schedule)
                <li class="list-group-item">
                    <strong>{{ $schedule->course_name }}</strong><br>
                    {{ $schedule->start_time }} - {{ $schedule->end_time }} | {{ $schedule->location ?? 'Lokasi tidak ditentukan' }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
