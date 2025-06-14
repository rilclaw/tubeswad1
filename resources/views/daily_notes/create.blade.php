<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Catatan Harian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', sans-serif;
        }
        .form-container {
            max-width: 720px;
            margin: 60px auto;
            background: #fff;
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
            box-shadow: 0 0 0 0.2rem rgba(0, 102, 153, 0.25);
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
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">📝 Buat Catatan Harian</h2>
            <form method="POST" action="{{ route('daily-notes.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Judul catatanmu..." required>
                </div>
                <div class="mb-3">
                    <label for="note_date" class="form-label">Tanggal</label>
                    <input type="date" id="note_date" name="note_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Catatan</label>
                    <textarea id="content" name="content" rows="6" class="form-control" placeholder="Tulis isi catatan harianmu di sini..." required></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-submit">💾 Simpan Catatan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
