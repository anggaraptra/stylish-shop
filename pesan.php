<?php
require 'functions/functions.php';

$id = $_GET['id'];
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

if ( isset($_POST["submit-pesanan"]) ) {
    if ( pesanan($_POST) > 0 ) {
        echo "<script>
          alert('Pesanan Segera Di Proses!');
          document.location.href= 'index.php';
        </script>"; 
    } else {
        echo "<script>
          alert('Pesanan Gagal Di Kirim!');
          document.location.href= 'pesan.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Produk</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-pesan.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap-5.1.2-dist/css/bootstrap.min.css" />

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm navbar-dark fixed-top bg-primary">
        <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="index.php">STYLISH SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active me-3" aria-current="page" >PESAN PRODUK</a>
            </li>
          </ul>
          <div class="tombol">
            <ul class="navbar-nav mt-1">
              <li class="nav-item">
                <a class="btn nav-link ms-5 me-5" href="user.php"><h6 class="bi bi-person-fill" data-bs-toggle="tooltip" title="User Admin"></h6></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Form Pesanan -->
    <div class="container-fluid p-4 mt-5">
    <form action="" method="post">
      <div class="row">
        <div class="col-md-2"></div>

        <!-- Bagian Produk -->
        <div class="col-md-4">
            <div class="mb-3">
                <label for="nama-produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama-produk"
                name="nama_produk" value="<?= $produk["nama"]; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="harga-produk" class="form-label">Harga Produk</label>
                <input type="text" class="form-control" id="harga-produk"
                name="harga" value="RP. <?= $produk["harga"]; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="" class="form-label d-flex">Gambar Produk</label>
                <img src="img-produk/<?= $produk["gambar"]; ?>" width="300" height="300" class="img-fluid mt-3" alt="">
            </div>
        </div>

        <!-- Bagian User -->
        <div class="col-md-4">
          <div class="mb-3">
            <label for="nama-anda" class="form-label">Nama Yang Memesan</label>
            <input type="text" class="form-control" id="nama-anda" name="nama_pemesan" required>
          </div>
          <div class="mb-3">
            <label for="nomer" class="form-label">No Handphone</label>
            <input type="number" class="form-control" id="nomer" name="no_hp" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap dan Spesifik</label>
            <textarea class="form-control" id="alamat" name="alamat_lengkap" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="harga-produk" class="form-label">Total Pesanan</label>
            <input type="text" class="form-control" id="harga-produk" name="total_pesanan" value="RP. <?= $produk["harga"]; ?>" readonly>
          </div>
          <button type="submit" name="submit-pesanan" class="btn btn-success mt-1">Buat Pesanan</button>
        </div>

        <div class="col-md-2"></div>
      </div>
    </form>
    </div>
    <!-- Akhir Form Pesanan -->

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
            <i class="bi bi-telephone-fill"> 089680897900 </i>
          </div>
        </div>
        <div class="col-md-4">
          <h6><strong>TENTANG KAMI</strong></h6>
          <p>Olshop ini adalah toko yang khusus menjual style untuk pria seperti baju, celana, sepatu dan style berpakaian yang kekinian</p>
        </div>
      </div>
    </footer>
    <div class="copyright text-center text-white bg-primary p-3">
      <p>Developed by Anggara | Copyright @2021</p>
    </div>
    <!-- Akhir Footer -->

    <!-- JavaScript Bootstrap -->
    <script src="asset/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>