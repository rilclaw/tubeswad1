<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', sans-serif;
        }
        .form-container {
            max-width: 720px;
            margin: 60px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.08);
        }
        .form-title {
            font-weight: bold;
            color: #005a9e;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control:focus {
            border-color: #005a9e;
            box-shadow: 0 0 0 0.2rem rgba(0,90,158,0.25);
        }
        .btn-submit {
            background-color: #005a9e;
            color: white;
            font-weight: bold;
            padding: 10px 24px;
            border-radius: 10px;
        }
        .btn-submit:hover {
            background-color: #004178;
        }
        .btn-back {
            padding: 10px 24px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h2 class="form-title">✏️ Edit Task</h2>
        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Judul Task</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $task->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Tanggal Jatuh Tempo</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $task->due_date }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="tugas" {{ $task->category == 'tugas' ? 'selected' : '' }}>Tugas</option>
                    <option value="organisasi" {{ $task->category == 'organisasi' ? 'selected' : '' }}>Organisasi</option>
                    <option value="kuliah" {{ $task->category == 'kuliah' ? 'selected' : '' }}>Kuliah</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Belum Selesai</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-back">← Batal</a>
                <button type="submit" class="btn btn-submit">💾 Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
