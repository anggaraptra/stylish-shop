<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-registrasi.css">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
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
        <form action="">
            <div class="form-content">
                <div class="registrasi-form">
                    <div class="title"><h1>Registrasi</h1>
                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="bi bi-person-fill"></i>
                            <input type="text" name="username" placeholder="Masukan username anda" required>
                        </div>
                        <div class="input-box">
                            <i class="bi bi-envelope-fill"></i>
                            <input type="text" name="email" placeholder="Masukan email anda" required>
                        </div>
                        <div class="input-box">
                            <i class="bi bi-lock-fill"></i>
                            <input type="password" name="password" placeholder="Masukan password anda" required>
                        </div>
                        <div class="button input-box">
                            <button type="submit" name="registrasi">Register</button>
                        </div>
                        <div class="register-text text">Sudah punya akun? <a href="login.php">Login sekarang</a> </div>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>