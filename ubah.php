<?php 
require 'functions/functions.php';

// ambil data dari url
$id = $_GET['id'];

// query data produk berdasarkan id
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

// cek apakah tombol submit ubah sudah ditekan
if ( isset($_POST["submit-ubah"]) ) {
    // cek apakah data berhasil di ubah
    if ( ubah($_POST) > 0 ) {
      echo "<script>
        alert('Data Berhasil Di Ubah!');
        document.location.href = 'user.php';
      </script>";
    } else {
      echo "<script>
        alert('Data Gagal Di Ubah!');
        document.location.href = 'user.php';
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
    <link rel="stylesheet" href="css/style-ubah.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap-5.1.2-dist/css/bootstrap.min.css" />

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Ubah Produk</title>
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
              <a class="nav-link active me-5" aria-current="page">EDIT PRODUK</a>
            </li>
          </ul>
          <div class="tombol">
            <ul class="navbar-nav mt-1">
              <li class="nav-item">
                <a class="btn nav-link ms-5 me-5" href="user.php"><h6 class="bi bi-person-fill" data-bs-toggle="tooltip" title="User"></h6></a>
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
            <td><label for="nama" class="form-label">Nama</label></td>
            <td></td>
            <td><input type="text" name="nama" id="nama" class="form-control" size="50" required value="<?= $produk["nama"]; ?>"></td>
          <tr>
            <td><label for="stok" class="form-label">Stok</label></td>
            <td></td>
            <td><input type="number" name="stok" id="stok" class="form-control" size="50" required value="<?= $produk["stok"]; ?>"></td>
          </tr>
          <tr>
            <td><label for="harga" class="form-label">Harga</label></td>
            <td></td>
            <td><input type="number" name="harga" placeholder="RP." id="harga" class="form-control" size="50" required value="<?= $produk["harga"]; ?>"></td>
          </tr>
          <tr>
            <td><label for="deskripsi" class="form-label">Deskripsi</label></td>
            <td></td>
            <td><textarea placeholder="Deskripsi produk" rows="3" id="deskripsi" class="form-control" name="deskripsi" required><?= $produk["deskripsi"]; ?></textarea></td>
          </tr>
          <tr>
            <td><label class="form-label">Gambar Lama</label></td>
            <td></td>
            <td><img src="img-produk/<?= $produk["gambar"]; ?>" width="80" height="80" class="mb-1 mt-1"></td>
          </tr>
          <tr>
            <td><label for="gambar" class="form-label">Gambar Baru</label></td>
            <td></td>
            <td><input type="file" name="gambar" id="gambar" class="form-control"></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><button type="submit" name="submit-ubah" class="btn btn-secondary mt-1">Edit</button></td>
          </tr>
      </table>
    </form>
    </div>
    <!-- Akhir Halaman Ubah -->

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

    <!-- Javascript Bootstrap -->
    <script src="asset/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>