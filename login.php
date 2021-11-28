<?php
session_start();
require 'functions/functions.php';

// cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    
    // ambil username berdasarkan id
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

// cek session
if ( isset($_SESSION["login"]) ) {
    header("Location: useradmin.php");
    exit;
}

if ( isset($_POST['login']) ) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // cek Username
    if ( mysqli_num_rows($result) === 1 ) {
        
        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if ( isset($_POST["remember"]) ) {
                // buat cookie
                setcookie('id', $row['id'], time()+60*60, '/', 'localhost', 1);
                setcookie('key', hash('sha256', $row['username']), time()+60*60, '/', 'localhost', 1);
            }

            header("Location: useradmin.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-login.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap-5.1.2-dist/css/bootstrap.min.css" />

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- ico icon -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="ico/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="ico/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="ico/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="ico/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="ico/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="ico/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="ico/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="ico/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="ico/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="ico/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <title>Login</title>
</head>
<body>
   <div class="container">
       <div class="cover">
           <div class="front">
               <img src="img/logo stylish shop 2.png" alt="" data-aos="flip-up" data-aos-duration="600">
               <div class="text">
                   <span class="text-1">Pilih yang anda sukai</span>
                   <span class="text-2">Yang membuat anda tertarik</span>
               </div>
           </div>
       </div>
        <form action="" method="post">
            <div class="form-content">
            <div class="login-form">
                <div class="title text-center"><h1><strong>Login</strong></h1>
                <div class="alert alert-success alert-admin" role="alert">
                    <h6>Login Jika Anda Admin !</h6>
                </div>
                <?php if ( isset($error) ) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h6>Username atau Password Salah!</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php return false; ?>
                <?php endif; ?>
                <div class="input-boxes">
                    <div class="input-box">
                        <i class="bi bi-person-fill"></i>
                        <input type="text" name="username" placeholder="Masukan username anda" required>
                    </div>
                    <div class="input-box">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" name="password" placeholder="Masukan password anda" required>
                    </div>
                    <div class="float-start mt-2 mb-4">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember"><h6>Remember me</h6></label>
                        </div>
                    <div class="button input-box">
                        <button type="submit" name="login">Login</button>
                    </div>
                    <div class="login-text text">Pilih yang ada sukai di <a href="index.php">Stylish Shop!</a></div>
                </div>
                </div>
            </div>
            </div>
        </form>    
   </div>
    <!-- JavaScript Bootstrap -->
    <script src="asset/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
</body>
</html>