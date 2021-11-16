<?php 
require 'functions/functions.php';

$id = $_GET['id'];

$produk = query("SELECT * FROM produk WHERE id = $id")[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-detail.css"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap-5.1.2-dist/css/bootstrap.min.css" />

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo stylish shop.png">
    <title>Detail Produk</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <a href="index.php"><img src="img/logo stylish shop.png" class="img-fluid" width="50" height="50" alt=""></a>
        <a class="navbar-brand fw-bold mt-1 ms-1" href="index.php">STYLISH SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active me-5" aria-current="page">Detail Produk</a>
            </li>
          </ul>
          <div class="tombol">
            <ul class="navbar-nav mt-1">
              <li class="nav-item">
                <a class="btn nav-link ms-5 me-5" href="useradmin.php"><h6 class="bi bi-person-fill" data-bs-toggle="tooltip" title="User Admin"></h6></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Detail Produk -->
    <div class="container-fluid p-5 mt-5">
      <div class="row">
        <div class="col-md-2"></div>

        <!-- Gambar Produk -->
        <div class="col-md-4">
            <img src="img-produk/<?= $produk["gambar"]; ?>" width="300" height="300" class="img-fluid" alt="">
        </div>

        <!-- Keterangan Produk -->
        <div class="col-md-5 mt-1">
            <table class="table table-borderless table-striped">
              <tr data-aos="fade-up" data-aos-duration="200" data-aos-delay="200">
                <th>Nama Produk</th>
                <td><?= $produk["nama"]; ?></td>
              </tr>
              <tr data-aos="fade-up" data-aos-duration="200" data-aos-delay="300">
                <th>Stok Produk</th>
                <td><?= $produk["stok"]; ?></td>
              </tr>
              <tr data-aos="fade-up" data-aos-duration="200" data-aos-delay="400">
                <th>Deskripsi Produk</th>
                <td><?= $produk["deskripsi"]; ?></td>
              </tr>
              <tr data-aos="fade-up" data-aos-duration="200" data-aos-delay="500">
                <th>Harga Produk</th>
                <td>RP. <?= $produk["harga"];?></td>
              </tr>
            </table>
        </div>

        <div class="col-md-1"></div>
      </div>
    </div>
    <!-- Akhir Detail Produk -->

    <!-- Footer -->
    <footer class="container-fluid bg-primary text-white p-3">
      <div class="row mt-4">
        <div class="col-md-4">
          <h6><strong>LAYANAN</strong></h6>
          <ul>
            <li>Pusat Bantuan</li>
            <li>Cara Pembelian</li>
            <li>Pengembalian Jika Tidak Sesuai</li>
          </ul>
        </div>
        <div class="sosmed col-md-4">
          <h6><strong>SOSIAL MEDIA DAN LAINNYA</strong></h6>
          <div class="icons d-grid">
            <i class="bi bi-whatsapp"> 087854712611 </i>
            <a href="https://www.instagram.com/anggara.ptra/" target="_blank"><i class="bi bi-instagram"> anggara.ptra </i></a>
            <a href="https://www.facebook.com/ikadekanggaraputra.ikadekanggaraputra/" target="_blank"><i class="bi bi-facebook">  AnggaraPutra </i></a>
            <a href="http://localhost/sepintasgame/" target="_blank"><img src="img/logo sepintas.png" width="18" height="18" class="img-fluid"> Sepintas Game</a>
          </div>
        </div>
        <div class="col-md-4">
          <h6><strong>TENTANG KAMI</strong></h6>
          <p>Olshop ini adalah toko yang khusus menjual style untuk pria maupun untuk wanita seperti baju, celana, sepatu dan style berpakaian yang kekinian.</p>
        </div>
      </div>
    </footer>
    <div class="copyright text-center text-white bg-primary p-3">
      <p>Developed by Anggara | Copyright @2021</p>
    </div>
    <!-- Akhir Footer -->

    <!-- Javascript Bootstrap -->
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