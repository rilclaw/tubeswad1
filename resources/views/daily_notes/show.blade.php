@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-info text-white rounded-top-4 px-4 py-3">
                    <h4 class="mb-0">📖 Detail Catatan</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <h5 class="fw-bold text-primary">{{ $dailyNote->title }}</h5>
                    <p class="text-muted mb-2">🗓️ {{ \Carbon\Carbon::parse($dailyNote->note_date)->translatedFormat('d F Y') }}</p>

                    <hr class="my-3">

                    <div class="mb-4" style="white-space: pre-wrap;">{{ $dailyNote->content }}</div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('daily-notes.index') }}" class="btn btn-outline-secondary rounded-pill px-4">← Kembali</a>

                        <div class="d-flex gap-2">
                            <a href="{{ route('daily-notes.edit', $dailyNote) }}" class="btn btn-warning rounded-pill px-4">✏️ Edit</a>

                            <form action="{{ route('daily-notes.destroy', $dailyNote) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-pill px-4">🗑 Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
