<?php
session_start();
include 'includes/config.php';
$Error = '';

if (isset($_POST['Submit'])) {
  echo '<script>document.location="Admin_Login.php";</script>';
}
if (isset($_POST['Submit2'])) {
  echo '<script>document.location="Student_Login.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>JU Events Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="Administrator/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="Administrator/img/icon.png" />

  <!-- Custom Styles -->
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

    html,
    body {
      height: 100%;
      overflow: hidden;
      font-family: myFirstFont, sans-serif;
    }

    #bgVideo {
      transform: scale(1.1);
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      object-fit: cover;
      z-index: -2;
      filter: brightness(0.4);
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 100vw;
      background: rgba(0, 0, 0, 0.5);
      z-index: -1;
    }

    .login-box {
      max-width: 460px;
      margin: auto;
      margin-top: 8vh;
      padding: 40px;
      background: rgba(0, 25, 51, 0.3);
      /* semi-transparent navy */
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(0, 51, 102, 0.5);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      color: #fff;
      text-align: center;
      transition: all 0.4s ease;
    }

    .login-box:hover {
      box-shadow: 0 0 35px rgba(0, 51, 102, 0.3), 0 0 55px rgba(0, 51, 102, 0.15);
    }

    .login-box h1 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 10px;
      color: white;
    }

    .login-box img {
      max-width: 160px;
      margin-bottom: 20px;
    }

    .btn-glow {
      width: 100%;
      margin: 10px 0;
      padding: 14px;
      font-size: 16px;
      font-weight: bold;
      color: #fff;
      background: linear-gradient(to right, #003366, #004080);
      border: none;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .btn-glow:hover {
      background: linear-gradient(to right, #004080, #f57c00);
      transform: scale(1.05);
    }

    .footer {
      margin-top: 30px;
      font-size: 13px;
      color: #ccc;
    }

    @media (max-width: 576px) {
      .login-box {
        margin-top: 5vh;
        padding: 25px;
      }

      .login-box h1 {
        font-size: 22px;
      }

      .btn-glow {
        padding: 12px;
        font-size: 15px;
      }
    }
  </style>
</head>

<body>

  <video autoplay muted loop id="bgVideo">
    <source src="Administrator/img/uni4.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
  </video>
  <div class="overlay"></div>

  <div class="login-box animated fadeInDown">
    <img src="Administrator/img/logo.png" alt="JU Logo">
    <h1>JU Events Management System</h1>

    <form method="post" action="index.php">
      <button type="submit" name="Submit" class="btn-glow">Administrator</button>
      <button type="submit" name="Submit2" class="btn-glow">Student</button>
      <div style="color: red;"><?php echo $Error; ?></div>
    </form>

    <div class="footer">
      JU Events Management System © 2025. All Rights Reserved
    </div>
  </div>

  <script src="Administrator/js/jquery-2.1.1.js"></script>
  <script src="Administrator/js/bootstrap.min.js"></script>
</body>

</html>