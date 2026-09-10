<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login | LPPM IBI KKG</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/logo_ibinew_biru.png') }}" />
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/logo_ibinew_biru.png') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/shared.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #050B14;
      color: #ffffff;
      min-height: 100vh;
      display: flex;
    }

    .login-wrapper {
      display: flex;
      width: 100%;
      min-height: 100vh;
    }

    /* Left Side - Image & Information */
    .login-left {
      flex: 1;
      position: relative;
      background-image: url('{{ asset("assets/images/1.jpeg") }}');
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
    }

    .login-left::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: linear-gradient(135deg, rgba(11, 25, 44, 0.85) 0%, rgba(5, 11, 20, 0.95) 100%);
      z-index: 1;
    }

    .left-content {
      position: relative;
      z-index: 2;
      max-width: 500px;
      width: 100%;
    }

    .left-logo {
      width: 120px;
      margin-bottom: 30px;
    }

    .left-content h1 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 20px;
      line-height: 1.3;
    }

    .left-content p {
      color: #cbd5e1;
      font-size: 15px;
      line-height: 1.6;
      margin-bottom: 40px;
    }

    .admin-badge {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      padding: 20px;
      display: flex;
      align-items: flex-start;
      gap: 15px;
      backdrop-filter: blur(10px);
    }

    .admin-badge i {
      font-size: 24px;
      color: #0ea5e9;
      margin-top: 5px;
    }

    .admin-badge-text strong {
      display: block;
      color: #ffffff;
      font-size: 14px;
      margin-bottom: 4px;
    }

    .admin-badge-text span {
      color: #94a3b8;
      font-size: 12px;
      line-height: 1.4;
    }

    /* Right Side - Login Form */
    .login-right {
      flex: 1;
      background-color: #050B14;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px;
      position: relative;
    }

    .right-content {
      width: 100%;
      max-width: 400px;
    }

    .login-header {
      margin-bottom: 40px;
    }

    .login-header h2 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 10px;
      color: #ffffff;
    }

    .login-header p {
      color: #94a3b8;
      font-size: 14px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      color: #cbd5e1;
      font-size: 13px;
      font-weight: 500;
      margin-bottom: 8px;
    }

    .input-wrapper {
      position: relative;
    }

    .input-wrapper i {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #64748b;
      font-size: 16px;
      transition: color 0.3s ease;
    }

    .form-control {
      width: 100%;
      background: transparent;
      border: 1px solid #1e293b;
      border-radius: 8px;
      padding: 14px 16px 14px 45px;
      color: #ffffff;
      font-family: inherit;
      font-size: 14px;
      box-sizing: border-box;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      outline: none;
      border-color: #0ea5e9;
      box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15);
    }

    .form-control:focus + i {
      color: #0ea5e9;
    }

    .form-check {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
      gap: 10px;
    }

    .form-check-input {
      accent-color: #0ea5e9;
      width: 16px;
      height: 16px;
      cursor: pointer;
      background: transparent;
      border: 1px solid #1e293b;
    }

    .form-check-label {
      color: #94a3b8;
      font-size: 13px;
      cursor: pointer;
      user-select: none;
    }

    .btn-login {
      width: 100%;
      background: #0ea5e9;
      color: #ffffff;
      border: none;
      border-radius: 8px;
      padding: 14px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      background: #0284c7;
    }

    .alert-error {
      background: rgba(239, 68, 68, 0.1);
      border: 1px solid rgba(239, 68, 68, 0.2);
      border-radius: 8px;
      padding: 14px 16px;
      color: #fca5a5;
      font-size: 13px;
      margin-bottom: 25px;
      display: flex;
      align-items: flex-start;
      gap: 10px;
    }

    .alert-error i {
      margin-top: 2px;
    }

    .back-link-wrapper {
      text-align: center;
      margin-top: 30px;
    }

    .back-link {
      display: inline-block;
      color: #94a3b8;
      font-size: 13px;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .back-link:hover {
      color: #ffffff;
    }

    .back-link i {
      margin-right: 6px;
    }

    .footer-credits {
      position: absolute;
      bottom: 20px;
      left: 0;
      right: 0;
      font-size: 11px;
      color: rgba(255,255,255,0.3);
      text-align: center;
    }

    @media (max-width: 992px) {
      .login-left {
        display: none;
      }
    }
  </style>
</head>

<body>

  <div class="login-wrapper">
    <!-- Kiri -->
    <div class="login-left">
      <div class="left-content">
        <img src="{{ asset('assets/logo_ibinew_putih.png') }}" alt="Logo IBI KKG" class="left-logo">
        <h1>Sistem Administrasi Portal LPPM</h1>
        <p>Selamat datang di Panel Kontrol Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Institut Bisnis dan Informatika Kwik Kian Gie. Kelola semua konten web secara cepat, efisien, dan aman.</p>
        
        <div class="admin-badge">
          <i class="fa-solid fa-shield-halved"></i>
          <div class="admin-badge-text">
            <strong>Akses Administrator Resmi</strong>
            <span>Seluruh aktivitas login dicatat demi keamanan sistem internal.</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Kanan -->
    <div class="login-right">
      <div class="right-content">
        <div class="login-header">
          <h2>Selamat Datang</h2>
          <p>Silakan masuk menggunakan akun administrator Anda</p>
        </div>

        <!-- Handle Laravel Validation and Login Errors -->
        @if ($errors->any())
          <div class="alert-error">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div>
              @foreach ($errors->all() as $error)
                <div style="margin-bottom: 4px;">{{ $error }}</div>
              @endforeach
            </div>
          </div>
        @endif

        <form action="{{ route('login') }}" method="POST" autocomplete="off">
          @csrf
          
          <div class="form-group">
            <label for="username">Alamat Email</label>
            <div class="input-wrapper">
              <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" required autofocus maxlength="20">
              <i class="fa-solid fa-envelope"></i>
            </div>
          </div>

          <div class="form-group">
            <label for="password">Kata Sandi</label>
            <div class="input-wrapper">
              <input type="password" id="password" name="password" class="form-control" required>
              <i class="fa-solid fa-lock"></i>
            </div>
          </div>

          <div class="form-check">
            <input type="checkbox" id="remember" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="form-check-label">Ingat saya di perangkat ini</label>
          </div>

          <button type="submit" class="btn-login">MASUK KE PANEL</button>
        </form>

        <div class="back-link-wrapper">
          <a href="{{ route('home') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Website
          </a>
        </div>
      </div>

      <div class="footer-credits">
        @php
            echo base64_decode('TWFkZSBieSBKYXNvbiBJc3Rpb3NvIGFuZCBLZW5ueSBBZHJpYW4gU2V0aWFidWRp');
        @endphp
      </div>
    </div>
  </div>

</body>

</html>
