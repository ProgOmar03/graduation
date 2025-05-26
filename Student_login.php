<?php
session_start();
include 'includes/config.php';
$Error = '';

if (isset($_POST['Submit'])) {
    $Email = $_POST['email'];
    $Password = $_POST['Password'];

    if ($Email == 'std123@ju.edu.jo' && $Password == '1234') {
        echo '<script>document.location="Students.php";</script>';
    } else {
        $Error = '❌ Please check your email or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>JU Student Login</title>
  <link href="Administrator/css/bootstrap.min.css" rel="stylesheet" />
  <link href="Administrator/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="icon" href="Administrator/img/icon.png" />

  <style>
    @font-face {
      font-family: myFirstFont;
      src: url('Administrator/fonts/NotoKufiArabic-Regular.ttf');
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    html, body {
      height: 100%;
      font-family: myFirstFont, sans-serif;
      overflow: hidden;
      color: #fff;
      background: url('Administrator/img/water.jpg') no-repeat center fixed;
      background-size: 100% auto;
      margin: 0;
      padding: 0;
    }

    .form-wrapper {
      position: fixed;
      top: 0;
      right: 0;
      height: 100vh;
      width: 420px;
      background: #222222;
      padding: 60px 30px;
      box-sizing: border-box;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1;
    }

    .login-container {
      max-width: 360px;
      width: 100%;
      padding: 40px 30px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(20px);
      border-radius: 25px;
      box-shadow:
        0 0 10px rgba(249, 193, 114, 0.15),
        inset 0 0 10px rgba(255, 255, 255, 0.05);
      border: 2px solid rgba(249, 193, 114, 0.6);
      text-align: center;
      animation: fadeIn 1.2s ease forwards;
      position: relative;
      z-index: 2;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login-container img {
      max-width: 100px;
      margin-bottom: 20px;
      filter: drop-shadow(0 0 2px #f9c172);
      user-select: none;
    }

    .login-container h2 {
      margin-bottom: 30px;
      font-weight: bold;
      color: #f9c172;
      font-size: 2.4rem;
      letter-spacing: 2px;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.15);
      border: none;
      padding: 14px;
      border-radius: 12px;
      color: #fff;
      font-size: 15px;
      margin-bottom: 20px;
      transition: border-color 0.3s ease;
      box-shadow: inset 0 0 6px rgba(255, 255, 255, 0.2);
    }

    .form-control::placeholder {
      color: #ccc;
      text-shadow: 0 0 4px rgba(0,0,0,0.7);
    }

    .form-control:focus {
      outline: none;
      border-color: #f9c172;
      box-shadow: 0 0 8px rgba(249, 193, 114, 0.9);
      background: rgba(255, 255, 255, 0.25);
    }

    .form-group {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      top: 8px;
      right: 15px;
      color: #ccc;
      cursor: pointer;
      user-select: none;
      font-size: 18px;
      transition: color 0.3s ease;
      z-index: 2;
    }

    .toggle-password:hover {
      color: #f9c172;
    }

    .btn-glow {
      background: linear-gradient(45deg, #00c6ff, #0072ff);
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 12px;
      padding: 14px;
      width: 100%;
      margin-bottom: 15px;
      font-size: 16px;
      transition: all 0.3s ease;
      cursor: pointer;
      user-select: none;
    }

    .btn-glow:hover {
      box-shadow: 0 0 18px rgba(0, 198, 255, 0.5);
    }

    .btn-back {
      background: linear-gradient(45deg, #f7971e, #ffd200);
      color: #222;
      font-weight: bold;
      border: none;
      border-radius: 12px;
      padding: 12px;
      width: 100%;
      font-size: 16px;
      transition: all 0.3s ease;
      cursor: pointer;
      user-select: none;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }

    .btn-back:hover {
      background: linear-gradient(45deg, #f9a825, #ffeb3b);
      box-shadow: 0 0 2px rgba(255, 235, 59, 0.5);
      text-decoration: none;
    }

    .error-message {
      color: #ff6b6b;
      margin-top: 10px;
      font-size: 15px;
      font-weight: 600;
      user-select: none;
      animation: fadeIn 0.5s ease;
    }

    .footer-text {
      margin-top: 25px;
      font-size: 13px;
      color: #ccc;
      user-select: none;
    }

    @media (max-width: 768px) {
      html, body {
        justify-content: center;
        padding: 0 20px;
      }
      .form-wrapper {
        position: static;
        width: 100%;
        height: auto;
        border-radius: 0;
        box-shadow: none;
        padding: 30px 15px;
        margin: 0 auto;
      }
      .login-container {
        max-width: 420px;
        width: 100%;
        margin: 0 auto;
      }
    }
  </style>
</head>
<body>

<div class="form-wrapper">
  <div class="login-container" role="main" aria-label="Student Login Form">
    <img src="Administrator/img/logo.png" alt="JU Logo" draggable="false" />
    <h2>Student Login</h2>

    <form method="post" action="Student_login.php" novalidate>
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" required aria-required="true" />
      </div>
      <div class="form-group" style="position: relative;">
        <input type="password" class="form-control" id="password" name="Password" placeholder="Password" required aria-required="true" />
        <span class="fa fa-fw fa-eye toggle-password" role="button" tabindex="0" aria-label="Toggle password visibility"></span>
      </div>
      <button type="submit" name="Submit" class="btn btn-glow" aria-live="polite">Login</button>
      <a href="index.php" class="btn btn-back">Back</a>
      <?php if (!empty($Error)) echo "<div class='error-message' role='alert'>$Error</div>"; ?>
    </form>

    <div class="footer-text">
      JU Events Management System © 2025. All Rights Reserved
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="Administrator/js/jquery-2.1.1.js"></script>
<script src="Administrator/js/bootstrap.min.js"></script>
<script>
  const togglePassword = document.querySelector('.toggle-password');
  const passwordInput = document.querySelector('#password');

  togglePassword.addEventListener('click', () => {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    togglePassword.classList.toggle('fa-eye');
    togglePassword.classList.toggle('fa-eye-slash');
  });

  togglePassword.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      togglePassword.click();
    }
  });
</script>
</body>
</html>
