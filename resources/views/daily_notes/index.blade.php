<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Harian - SmartReminder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .container-notes {
            margin-left: 250px;
            padding: 40px;
        }
        .note-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: 0.3s;
        }
        .note-card:hover {
            transform: scale(1.02);
        }
        .note-header {
            font-size: 1.3rem;
            font-weight: bold;
            color: #006699;
        }
        .note-meta {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .btn-note {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 8px;
        }
        .btn-add {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-notes">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">📝 Catatan Harian</h2>
            <a href="{{ route('daily-notes.create') }}" class="btn btn-add">+ Buat Catatan</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(count($notes) > 0)
            <div class="row g-4">
                @foreach($notes as $note)
                    <div class="col-md-6 col-lg-4">
                        <div class="card note-card">
                            <div class="card-body">
                                <div class="note-header">{{ $note->title }}</div>
                                <div class="note-meta mb-2">📅 {{ \Carbon\Carbon::parse($note->note_date)->format('d M Y') }}</div>
                                <p class="text-muted">{{ Str::limit($note->content, 100) }}</p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('daily-notes.edit', $note) }}" class="btn btn-sm btn-warning btn-note">✏️ Edit</a>
                                    <form action="{{ route('daily-notes.destroy', $note) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-note" onclick="return confirm('Yakin hapus catatan ini?')">🗑 Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-muted mt-5">
                <p>Belum ada catatan yang ditulis. Ayo buat satu sekarang! 📖</p>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
        