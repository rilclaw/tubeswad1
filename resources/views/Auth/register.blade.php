<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - SmartReminder</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      background-color: #f7f9fc;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .register-container {
      background-color: #ffffff;
      border-radius: 16px;
      padding: 40px 50px;
      width: 400px;
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
      color: #333;
    }

    .register-container img {
      height: 60px;
      display: block;
      margin: 0 auto 20px;
    }

    .register-container h1 {
      text-align: center;
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 6px;
      color: #333;
    }

    .register-container p {
      text-align: center;
      font-size: 14px;
      color: #666;
      margin-bottom: 25px;
    }

    .input-group {
      position: relative;
      margin-bottom: 18px;
    }

    .input-group input {
      width: 100%;
      padding: 12px 44px 12px 42px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 14px;
      transition: border 0.3s ease;
      color: #333;
    }

    .input-group input:focus {
      border-color: #4e54c8;
      outline: none;
    }

    .input-group input::placeholder {
      color: #aaa;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 14px;
      transform: translateY(-50%);
      color: #888;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      background-color: #4e54c8;
      color: #fff;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #3a3fc4;
    }

    .login-link {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #666;
    }

    .login-link a {
      color: #4e54c8;
      font-weight: 600;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    .alert-error {
      background-color: #ffe5e5;
      color: #d10000;
      padding: 12px 16px;
      border-radius: 8px;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .alert-error ul {
      margin-left: 20px;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <img src="{{ asset('images/telkom-logo.png') }}" alt="Telkom University Logo" />
    <h1>SmartReminder</h1>
    <p>Daftar untuk mulai mengelola tugasmu</p>

    @if($errors->any())
      <div class="alert-error">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required />
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required />
      </div>
      <button type="submit">Daftar</button>
    </form>

    <div class="login-link">
      Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
    </div>
  </div>
</body>
</html>