<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'functions/functions.php';

// ambil data dari url
$id = $_GET['id'];

// query data produk berdasarkan id
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

// cek apakah tombol submit edit sudah ditekan
if (isset($_POST["submit-edit"])) {
  // cek apakah data berhasil di edit
  if (edit($_POST) > 0) {
    echo "<script>
        alert('Data berhasil diedit!');
        document.location.href = 'useradmin.php';
      </script>";
  } else {
    echo "<script>
        alert('Data gagal diedit!');
        document.location.href = 'useradmin.php';
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
  <!-- My CSS -->
  <link rel="stylesheet" href="css/style-edit.css">

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
  <meta name="application-name" content="&nbsp;" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
  <title>Edit Produk</title>
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
            <a class="nav-link active me-5" aria-current="page">Edit Produk</a>
          </li>
        </ul>
        <div class="tombol">
          <ul class="navbar-nav mt-1">
            <li class="nav-item">
              <a class="btn nav-link ms-5 me-5" href="useradmin.php">
                <h6 class="bi bi-person-fill" data-bs-toggle="tooltip" title="User Admin"></h6>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Halaman Ubah -->
  <div class="container-fluid p-5 mt-4">
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $produk["id"]; ?>">
      <input type="hidden" name="gambar-lama" value="<?= $produk["gambar"]; ?>">
      <table class="ms-auto me-auto mt-3">
        <tr>
          <td><label for="nama" class="form-label">Nama Produk</label></td>
          <td></td>
          <td><input type="text" name="nama" id="nama" class="form-control" size="50" required value="<?= $produk["nama"]; ?>"></td>
        <tr>
          <td><label for="stok" class="form-label">Stok Produk</label></td>
          <td></td>
          <td><input type="number" name="stok" id="stok" class="form-control" size="50" required value="<?= $produk["stok"]; ?>"></td>
        </tr>
        <tr>
          <td><label for="harga" class="form-label">Harga Produk</label></td>
          <td></td>
          <td><input type="number" name="harga" placeholder="RP." id="harga" class="form-control" size="50" required value="<?= $produk["harga"]; ?>"></td>
        </tr>
        <tr>
          <td><label for="deskripsi" class="form-label">Deskripsi Produk</label></td>
          <td></td>
          <td><textarea placeholder="Deskripsi produk" rows="3" id="deskripsi" class="form-control" name="deskripsi" required><?= $produk["deskripsi"]; ?></textarea></td>
        </tr>
        <tr>
          <td><label class="form-label">Gambar Lama</label></td>
          <td></td>
          <td><img src="img-produk/<?= $produk["gambar"]; ?>" width="100" height="100" class="img-fluid mb-1 mt-1 rounded gambar-lama"></td>
        </tr>
        <tr>
          <td><label for="gambar" class="form-label">Gambar Baru</label></td>
          <td></td>
          <td><input type="file" name="gambar" id="gambar" class="form-control"></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td><button type="submit" name="submit-edit" class="btn btn-secondary mt-1">Edit</button></td>
        </tr>
      </table>
    </form>
  </div>
  <!-- Akhir Halaman Ubah -->

  <!-- Footer -->
  <footer class="container-fluid bg-primary text-white p-3">
    <div class="row mt-3">
      <div class="col-md-4">
        <h6><strong>LAYANAN</strong></h6>
        <ul class="list-unstyled">
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
          <a href="https://www.facebook.com/ikadekanggaraputra.ikadekanggaraputra/" target="_blank"><i class="bi bi-facebook"> AnggaraPutra </i></a>
        </div>
      </div>
      <div class="col-md-4">
        <h6><strong>TENTANG KAMI</strong></h6>
        <p>Olshop ini adalah toko yang khusus menjual style untuk pria maupun untuk wanita seperti baju, celana, sepatu dan style berpakaian yang kekinian.</p>
      </div>
    </div>
  </footer>
  <div class="copyright text-center text-white bg-primary p-3">
    <p>&copy Copyright Stylish Shop - All rights reserved</p>
  </div>
  <!-- Akhir Footer -->

  <!-- Javascript Bootstrap -->
  <script src="assets/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>