<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', sans-serif;
        }
        .task-card {
            max-width: 720px;
            margin: 60px auto;
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.08);
        }
        .task-title {
            font-weight: 700;
            color: #005a9e;
        }
        .task-label {
            font-weight: 600;
            color: #333;
        }
        .task-value {
            color: #555;
            margin-bottom: 16px;
        }
        .badge-status {
            font-size: 0.9rem;
            padding: 6px 12px;
            border-radius: 8px;
        }
        .badge-completed {
            background-color: #28a745;
            color: white;
        }
        .badge-pending {
            background-color: #ffc107;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="task-card">
            <h2 class="task-title">{{ $task->title }}</h2>

            <div class="mb-2">
                <span class="task-label">Kategori:</span><br>
                <span class="task-value">{{ ucfirst($task->category) }}</span>
            </div>

            <div class="mb-2">
                <span class="task-label">Deskripsi:</span><br>
                <span class="task-value">{{ $task->description }}</span>
            </div>

            <div class="mb-2">
                <span class="task-label">Tanggal Jatuh Tempo:</span><br>
                <span class="task-value">
                    {{ \Carbon\Carbon::parse($task->due_date)->translatedFormat('d F Y') }}
                </span>
            </div>

            <div class="mb-4">
                <span class="task-label">Status:</span><br>
                @if($task->status === 'completed')
                    <span class="badge badge-status badge-completed">✔ Selesai</span>
                @else
                    <span class="badge badge-status badge-pending">⏳ Belum Selesai</span>
                @endif
            </div>

            <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary">← Kembali ke Daftar Tasks</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
