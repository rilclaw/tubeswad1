@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $schedule->title }}</h1>
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($schedule->date)->translatedFormat('d F Y H:i') }}</p>
    <p><strong>Status:</strong> 
        @if($schedule->status === 'completed')
            <span class="badge bg-success">Selesai</span>
        @else
            <span class="badge bg-warning">Belum Selesai</span>
        @endif
    </p>
    <p><strong>Deskripsi:</strong> {{ $schedule->description }}</p>
    <a href="{{ route('schedule.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
</div>
@endsection
