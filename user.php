<?php
require 'functions.php';

$produk = query("SELECT * FROM produk");

// cek apakah tombol submit tambah sudah ditekan
if ( isset($_POST["submit-tambah"]) ) {
  // cek apakah data berhasil di tambahkan
  if ( tambah($_POST) > 0 ) {
    echo "<script>
      alert('Data Berhasil Di Tambah!');
      document.location.href = 'user.php';
    </script>";
  } else {
    echo "<script>
      alert('Data Gagal Di Tambah!');
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
    <link rel="stylesheet" href="css/style-user.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap-5.1.2-dist/css/bootstrap.min.css" />

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>User</title>
</head>
<body id="home">
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
              <a class="nav-link active me-5" aria-current="page" href="#home">HALAMAN USER</a>
            </li>
          </ul>
          <div class="tombol">
            <ul class="navbar-nav mt-1">
              <li class="nav-item">
                <a class="btn nav-link ms-5 me-5" href="keranjang.php"><h6 class="bi bi-cart-check-fill" data-bs-toggle="tooltip" title="Keranjang"></h6></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Halaman User -->
    <section class="container-fluid p-4" id="tambah">
    <div class="row">
      <div class="col-md-2"></div>

      <!-- User -->
      <div class="col-md-4">
        <div class="content mt-5">
          <h2 class="fw-bold head-user">USER</h2>
          <i class="bi bi-person-circle"> .....</i>
        </div>
        <button class="btn btn-primary mt-3 keluar"><a href="login.php">Logout</a></button>
        <button class="btn btn-primary mt-3 kembali"><a href="index.php">Halaman Utama</a></button>
      </div>

      <!-- Tambah Produk -->
      <div class="col-md-4">
        <h2 class="mt-5 fw-bold head-tambah text-center">TAMBAH PRODUK</h2>
        <form action="" method="post" enctype="multipart/form-data">
          <table>
              <tr>
                <td><label for="nama-produk" class="form-label">Nama</label></td>
                <td></td>
                <td><input type="text" name="nama" id="nama-produk" class="form-control" required></td>
              </tr>
              <tr>
                <td><label for="stok-produk" class="form-label">Stok</label></td>
                <td></td>
                <td><input type="number" name="stok" id="stok-produk" class="form-control" required></td>
              </tr>
              <tr>
                <td><label for="harga-produk" class="form-label">Harga</label></td>
                <td></td>
                <td><input type="number" name="harga" placeholder="RP." id="harga-produk" class="form-control" required></td>
              </tr>
              <tr>
                <td><label for="deskripsi-produk" class="form-label">Deskripsi</label></td>
                <td></td>
                <td><textarea placeholder="Deskripsi produk" rows="2" id="deskripsi-produk" class="form-control" name="deskripsi" required></textarea></td>
              </tr>
              <tr>
                <td><label for="gambar-produk" class="form-label">Gambar</label></td>
                <td></td>
                <td><input type="file" name="gambar" id="gambar-produk" class="form-control"></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="submit-tambah" class="btn btn-primary mt-1">Tambah</button></td>
              </tr>
          </table>
        </form>
      </div>
      <div class="col-md-2"></div>
    </div>
    </section>
    <!-- Akhir Halaman User -->

    <!-- Halaman Produk -->
    <section id="produk">
      <div class="produk container-fluid row text-center mx-auto p-5 mb-3">
        <h2>PRODUK USER</h2>
        <?php foreach ( $produk as $row ) : ?>
        <div class="container-fluid card mb-4" style="width: 16rem">
          <img width="160" height="160" src="img-produk/<?= $row["gambar"]; ?>" class="container-fluid card-img-top" alt=""/>
          <div class="card-body">
            <h5 class="card-title"><strong><?= $row["nama"]; ?></strong></h5>
            <p class="card-text"><?= $row["deskripsi"]; ?></p>
            <a href="" class="btn btn-primary" data-bs-target="#detail-produk" data-bs-toggle="modal">Detail</a>
            <a href="" class="btn btn-warning">Keranjang</a>
            <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-secondary mt-1">Ubah</a>
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Ingin Hapus Produk?');" class="btn btn-danger mt-1">Hapus</a>
          </div>
        </div>
        <?php endforeach; ?> 
      </div>
    </section>

    <!-- Detail Produk -->
    <div class="modal fade" id="detail-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <img class="container-fluid" src="" alt="">
              </div>
              <div class="col-md-6">
                <table class="table table-borderless">
                  <tr>
                    <th>Nama Produk</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Stok Produk</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Deskripsi</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Harga</th>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Halaman Produk -->

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