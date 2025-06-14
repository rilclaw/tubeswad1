<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Task Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', sans-serif;
        }
        .form-container {
            max-width: 720px;
            margin: 60px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .form-title {
            font-weight: bold;
            color: #006699;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 500;
        }
        .form-control:focus {
            border-color: #006699;
            box-shadow: 0 0 0 0.2rem rgba(0,102,153,0.25);
        }
        .btn-submit {
            background-color: #006699;
            color: white;
            font-weight: bold;
            padding: 10px 24px;
            border-radius: 10px;
        }
        .btn-submit:hover {
            background-color: #004d66;
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
        <h2 class="form-title">📝 Tambah Jadwal Baru</h2>
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul jadwal</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul task" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Deskripsikan task ini..." required></textarea>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Tanggal Jatuh Tempo</label>
                <input type="date" name="due_date" id="due_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="tugas">Tugas</option>
                    <option value="organisasi">Organisasi</option>
                    <option value="kuliah">Kuliah</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="pending">Belum Selesai</option>
                    <option value="completed">Selesai</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-back">← Kembali ke Daftar Tasks</a>
                <button type="submit" class="btn btn-submit">💾 Simpan</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
