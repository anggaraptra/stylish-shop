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
    header("Location: user.php");
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

            header("Location: user.php");
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
    <title>Login</title>
</head>
<body>
   <div class="container">
       <div class="cover">
           <div class="front">
               <img src="img/login.jpg" alt="">
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
                <?php if ( isset($error) ) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <h6>Username atau Password Salah!</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
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
                </div>
                </div>
            </div>
            </div>
        </form>    
   </div>
    <!-- JavaScript Bootstrap -->
    <script src="asset/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>