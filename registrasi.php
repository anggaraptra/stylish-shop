<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions/functions.php';

if ( isset($_POST["registrasi"]) ) {

    if ( registrasi($_POST) > 0 ) {
        echo "<script>
            alert('Admin baru berhasil ditambah!');
            document.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-registrasi.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap-5.1.2-dist/css/bootstrap.min.css" />

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- ico icon -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/ico/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/ico/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/ico/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/ico/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/ico/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="assets/ico/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="assets/ico/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="assets/ico/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/ico/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="assets/ico/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <title>Registrasi</title>
</head>
<body>
    <div class="container">
        <div class="cover">
            <div class="front">
                <img src="img/register.jpg" alt="">
                <div class="text">
                    <span class="text-1">Apapun pilihanmu</span>
                    <span class="text-2">Jangan melihat kebelakang</span>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <div class="form-content">
                <div class="registrasi-form">
                    <div class="title text-center"><h1><strong>Registrasi</strong></h1>
                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="bi bi-person-fill"></i>
                            <input type="text" name="username" placeholder="Masukan username anda" required>
                        </div>
                        <div class="input-box">
                            <i class="bi bi-envelope-fill"></i>
                            <input type="email" name="email" placeholder="Masukan email anda" required>
                        </div>
                        <div class="input-box">
                            <i class="bi bi-lock-fill"></i>
                            <input type="password" name="password" placeholder="Masukan password anda" required>
                        </div>
                        <div class="input-box">
                            <i class="bi bi-lock-fill"></i>
                            <input type="password" name="password2" placeholder="Konfirmasi password anda" required>
                        </div>
                        <div class="button input-box">
                            <button type="submit" name="registrasi">Register</button>
                        </div>
                        <div class="register-text text">Sudah punya akun? Silahkan Login di <a href="index.php">Stylish Shop!</a> </div>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- JavaScript Bootstrap -->
    <script src="assets/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>