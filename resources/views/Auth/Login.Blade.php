<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - SmartReminder</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    :root {
      --primary: #007bff;
      --accent: #1d8cf8;
      --bg: #f0f4f8;
      --glass: rgba(255, 255, 255, 0.3);
      --glass-border: rgba(255, 255, 255, 0.15);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #e3efff, #ffffff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
    }

    .login-container {
      background: var(--glass);
      backdrop-filter: blur(25px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 48px;
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      transition: all 0.3s ease;
    }

    .login-container:hover {
      box-shadow: 0 18px 45px rgba(0, 0, 0, 0.15);
      transform: translateY(-3px);
    }

    .login-container img {
      width: 60px;
      margin: 0 auto 18px;
      display: block;
    }

    .login-container h1 {
      font-size: 26px;
      font-weight: 700;
      text-align: center;
      margin-bottom: 6px;
    }

    .login-container p {
      font-size: 14px;
      text-align: center;
      color: #666;
      margin-bottom: 24px;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 16px;
      transform: translateY(-50%);
      color: #888;
    }

    .input-group input {
      width: 100%;
      padding: 14px 16px 14px 44px;
      border-radius: 12px;
      border: none;
      background: rgba(255, 255, 255, 0.9);
      font-size: 14px;
      color: #333;
      transition: all 0.25s ease;
    }

    .input-group input:focus {
      outline: none;
      background: #fff;
      box-shadow: 0 0 0 2px var(--primary);
    }

    .btn-login {
      width: 100%;
      padding: 14px;
      background-color: var(--accent);
      color: white;
      font-weight: 600;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn-login:hover {
      background-color: #0b74d3;
    }

    .error-box {
      background: #ffd2d2;
      color: #a10000;
      padding: 12px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 13px;
    }

    .extra-link {
      text-align: center;
      margin-top: 18px;
      font-size: 14px;
      color: #555;
    }

    .extra-link a {
      color: var(--accent);
      text-decoration: none;
      font-weight: 600;
    }

    .extra-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <img src="{{ asset('images/telkom-logo.png') }}" alt="Logo Telkom University" />
    <h1>SmartReminder</h1>
    <p>Masuk untuk mulai mengelola pengingat harianmu</p>

    @if ($errors->any())
    <div class="error-box">
      <ul style="list-style: none; padding-left: 0;">
        @foreach ($errors->all() as $error)
        <li>• {{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus />
      </div>

      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>

      <button type="submit" class="btn-login">Masuk</button>
    </form>

    <div class="extra-link">
      <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
    </div>

    <div class="extra-link">
      Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
    </div>
  </div>
</body>
</html>