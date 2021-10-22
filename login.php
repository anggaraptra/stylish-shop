<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-login.css">

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
                <div class="title"><h1>Login</h1>
                <div class="input-boxes">
                    <div class="input-box">
                        <i class="bi bi-person-fill"></i>
                        <input type="text" name="username" placeholder="Masukan username anda" required>
                    </div>
                    <div class="input-box">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" name="password" placeholder="Masukan password anda" required>
                    </div>
                    <div class="button input-box">
                        <button type="submit" name="login">Login</button>
                    </div>
                    <div class="login-text text">Tidak punya akun? <a href="registrasi.php">Registrasi sekarang</a> </div>
                </div>
                </div>
            </div>
            </div>
        </form>    
   </div>
</body>
</html>