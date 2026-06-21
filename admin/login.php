<?php
session_start();
error_reporting(0);
if (isset($_SESSION['adminsh'])) {
    header('location:index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin | SIA SMPN 2 Binjai</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0f172a 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }
  .login-container {
    width: 100%;
    max-width: 420px;
  }
  .login-card {
    background: #fff;
    border-radius: 20px;
    padding: 40px 36px;
    box-shadow: 0 25px 60px rgba(0,0,0,0.4);
  }
  .login-logo {
    width: 64px; height: 64px;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 8px 24px rgba(37,99,235,0.35);
  }
  .login-logo i { font-size: 32px; color: #fff; }
  .login-title { font-size: 22px; font-weight: 700; color: #1e293b; text-align: center; margin-bottom: 4px; }
  .login-sub   { font-size: 13px; color: #64748b; text-align: center; margin-bottom: 28px; }
  .form-label-custom { font-size: 13px; font-weight: 500; color: #374151; margin-bottom: 6px; }
  .input-group-custom { position: relative; margin-bottom: 16px; }
  .input-icon {
    position: absolute; left: 13px; top: 50%; transform: translateY(-50%);
    color: #94a3b8; font-size: 16px; z-index: 2;
  }
  .input-custom {
    width: 100%; padding: 11px 12px 11px 38px;
    border: 1.5px solid #e2e8f0; border-radius: 10px;
    font-size: 14px; font-family: 'Inter', sans-serif;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none; background: #f8fafc;
  }
  .input-custom:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
    background: #fff;
  }
  .btn-login {
    width: 100%; padding: 12px;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: #fff; border: none; border-radius: 10px;
    font-size: 15px; font-weight: 600; cursor: pointer;
    font-family: 'Inter', sans-serif;
    transition: opacity 0.2s, transform 0.1s;
    box-shadow: 0 4px 12px rgba(37,99,235,0.35);
  }
  .btn-login:hover { opacity: 0.92; }
  .btn-login:active { transform: scale(0.98); }
  .login-footer { text-align: center; margin-top: 24px; font-size: 12px; color: #94a3b8; }
  .alert-login {
    background: #fee2e2; color: #dc2626; border-radius: 10px;
    padding: 10px 14px; font-size: 13px; margin-bottom: 16px;
    display: flex; align-items: center; gap: 8px;
  }
  .bg-dots {
    position: fixed; inset: 0; z-index: -1; overflow: hidden;
  }
  .bg-dots::before {
    content: '';
    position: absolute; inset: -50%;
    background-image: radial-gradient(circle, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 30px 30px;
  }
</style>
</head>
<body>
<div class="bg-dots"></div>
<div class="login-container">
  <div class="login-card">
    <div class="login-logo"><i class="bi bi-mortarboard-fill"></i></div>
    <div class="login-title">Admin Panel</div>
    <div class="login-sub">Sistem Informasi Akademik SMPN 2 Binjai</div>

    <?php if (isset($_GET['error'])): ?>
    <div class="alert-login">
      <i class="bi bi-exclamation-circle-fill"></i>
      Username atau password salah. Silakan coba lagi.
    </div>
    <?php endif; ?>

    <form method="POST" action="valid.php" id="loginForm">
      <div class="mb-1">
        <label class="form-label-custom">Username</label>
        <div class="input-group-custom">
          <i class="bi bi-person input-icon"></i>
          <input type="text" name="username" class="input-custom" placeholder="Masukkan username" required autocomplete="username">
        </div>
      </div>
      <div class="mb-1" style="margin-bottom:20px!important;">
        <label class="form-label-custom">Password</label>
        <div class="input-group-custom" style="margin-bottom:0">
          <i class="bi bi-lock input-icon"></i>
          <input type="password" name="password" id="passInput" class="input-custom" placeholder="Masukkan password" required autocomplete="current-password">
          <span onclick="togglePass()" style="position:absolute;right:13px;top:50%;transform:translateY(-50%);cursor:pointer;color:#94a3b8;">
            <i class="bi bi-eye" id="eyeIcon"></i>
          </span>
        </div>
      </div>
      <button type="submit" class="btn-login">
        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Sistem
      </button>
    </form>

    <div class="login-footer">&copy; <?php echo date('Y'); ?> SIA SMPN 2 Binjai</div>
  </div>
</div>
<script>
function togglePass() {
  const input = document.getElementById('passInput');
  const icon  = document.getElementById('eyeIcon');
  if (input.type === 'password') {
    input.type = 'text';
    icon.className = 'bi bi-eye-slash';
  } else {
    input.type = 'password';
    icon.className = 'bi bi-eye';
  }
}
</script>
</body>
</html>
