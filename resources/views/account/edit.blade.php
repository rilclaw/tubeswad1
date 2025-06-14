{{-- resources/views/account/edit.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan Akun - SmartReminder</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f7f9fb;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }
        h2 {
            margin-bottom: 25px;
            color: #006699;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        input[type="time"],
        input[type="file"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }
        .btn-submit {
            background-color: #006699;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #004c66;
        }
        .success-message {
            background-color: #e0f8e9;
            color: #278a4d;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 25px;
            color: #006699;
            font-weight: bold;
            text-decoration: none;
            background: #e0f0f8;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background 0.3s ease;
        }
        .btn-back:hover {
            background: #c2e0f2;
        }
        img.profile-preview {
            max-width: 120px;
            margin-bottom: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('dashboard') }}" class="btn-back">⬅ Kembali ke Dashboard</a>

        <h2>Pengaturan Akun</h2>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('account.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Foto Profil --}}
            <div>
                <label for="photo">Foto Profil</label>
                @if (Auth::user()->photo_path)
                    <img src="{{ asset('storage/' . Auth::user()->photo_path) }}" alt="Foto Profil" class="profile-preview">
                @endif
                <input type="file" name="photo" accept="image/*">
            </div>

            {{-- Waktu Pengingat --}}
            <div>
                <label for="reminder_time">Waktu Pengingat Default</label>
                <input type="time" id="reminder_time" name="reminder_time" value="{{ $pref->reminder_time }}">
            </div>

            {{-- Tema --}}
            <div>
                <label for="theme">Tema Aplikasi</label>
                <select name="theme" id="theme">
                    <option value="light" {{ $pref->theme === 'light' ? 'selected' : '' }}>Light</option>
                    <option value="dark" {{ $pref->theme === 'dark' ? 'selected' : '' }}>Dark</option>
                </select>
            </div>

            {{-- Ganti Password --}}
            <div>
                <label for="password">Ganti Password (Opsional)</label>
                <input type="password" name="password" id="password" placeholder="Password baru">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi password">
            </div>

            <button type="submit" class="btn-submit">Simpan Pengaturan</button>
        </form>
    </div>
</body>
</html>
