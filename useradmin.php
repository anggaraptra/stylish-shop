<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions/functions.php';

$user = query("SELECT * FROM user");

$pesanan = query("SELECT * FROM pesanan");

$produk = query("SELECT * FROM produk");

// cek apakah tombol submit tambah sudah ditekan
if ( isset($_POST["submit-tambah"]) ) {
  // cek apakah data berhasil di tambahkan
  if ( tambah($_POST) > 0 ) {
    echo "<script>
      alert('Data Berhasil Di Tambah!');
      document.location.href = 'useradmin.php';
    </script>";
  } else {
    echo "<script>
      alert('Data Gagal Di Tambah!');
      document.location.href = 'useradmin.php';
    </script>";
  }
}

// pagination halaman daftar pesanan
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM pesanan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["hal"]) ) ? $_GET["hal"] : 1;
$dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$pesanan = query("SELECT * FROM pesanan ORDER BY id ASC LIMIT $dataAwal, $jumlahDataPerHalaman");

// pagination halaman produk
$jumlah_data_per_halaman = 4; 
$jumlah_data = count(query("SELECT * FROM produk"));
$jumlah_halaman = ceil($jumlah_data / $jumlah_data_per_halaman);
$halaman_aktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;  
$data_awal = ($jumlah_data_per_halaman * $halaman_aktif) - $jumlah_data_per_halaman;

$produk = query("SELECT * FROM produk ORDER BY id DESC LIMIT $data_awal, $jumlah_data_per_halaman");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-useradmin.css" />

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
        <a href="index.php"><img src="img/logo stylish shop.png" class="img-fluid" width="50" height="50" alt=""></a>
        <a class="navbar-brand fw-bold mt-1 ms-1" href="index.php">STYLISH SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active me-5" aria-current="page" href="#home">ADMIN</a>
            </li>
          </ul>
          <div class="tombol">
            <ul class="navbar-nav mt-1">
              <li class="nav-item">
                <a class="btn nav-link ms-5 me-5" href="registrasi.php"><h6 class="bi bi-person-plus-fill" data-bs-toggle="tooltip" title="Register User Admin"></h6></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Halaman User -->
    <section class="container-fluid p-5" id="tambah">
    <div class="row">
      <div class="col-md-1"></div>

      <!-- User -->
      <div class="col-md-5 user">
        <div class="content mt-5">
          <h2 class="fw-bold head-user">USER ADMIN</h2>
          <?php foreach ($user as $usr) : ?>
          <h6 class="bi bi-person-circle mt-2 head-name"> <?= $usr["username"]; ?></h6>
          <?php endforeach; ?>
        </div>
        <a class="btn btn-primary mt-2 keluar" href="functions/logout.php">Logout</a>
      </div>

      <!-- Tambah Produk -->
      <div class="col-md-5">
        <h2 class="mt-5 fw-bold head-tambah text-center">TAMBAH PRODUK</h2>
        <form action="" method="post" enctype="multipart/form-data">
          <table>
              <tr>
                <td><label for="nama-produk" class="form-label">Nama Produk</label></td>
                <td></td>
                <td><input type="text" name="nama" id="nama-produk" class="form-control" required></td>
              </tr>
              <tr>
                <td><label for="stok-produk" class="form-label">Stok Produk</label></td>
                <td></td>
                <td><input type="number" name="stok" id="stok-produk" class="form-control" required></td>
              </tr>
              <tr>
                <td><label for="harga-produk" class="form-label">Harga Produk</label></td>
                <td></td>
                <td><input type="number" name="harga" placeholder="RP." id="harga-produk" class="form-control" required></td>
              </tr>
              <tr>
                <td><label for="deskripsi-produk" class="form-label">Deskripsi Produk</label></td>
                <td></td>
                <td><textarea placeholder="Deskripsi produk" rows="2" id="deskripsi-produk" class="form-control" name="deskripsi" required></textarea></td>
              </tr>
              <tr>
                <td><label for="gambar-produk" class="form-label">Gambar Produk</label></td>
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
      <div class="col-md-1"></div>
    </div>
    </section>
    <!-- Akhir Halaman User -->

    <!-- Daftar Pesanan -->
    <section id="daftar-pesanan">
      <div class="container-fluid text-center">
        <h2>PESANAN</h2>
        <div class="table-responsive">
        <table border="1" class="table table-striped table-hover mt-4">
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Nama Pemesan</th>
            <th>No Hp</th>
            <th>Email</th>
            <th>Alamat Lengkap</th>
            <th>Total Pesanan</th>
            <th></th>
          </tr>
          <?php $i = 1; ?>
          <?php foreach ($pesanan as $pesan) : ?>
          <tr>
            <td><?= $i + $dataAwal; ?></td>
            <td><?= $pesan["nama_produk"]; ?></td>
            <td><?= $pesan["harga"]; ?></td>
            <td><?= $pesan["nama_pemesan"]; ?></td>
            <td><?= $pesan["no_hp"]; ?></td>
            <td><?= $pesan["email"]; ?></td>
            <td><?= $pesan["alamat_lengkap"]; ?></td>
            <td><?= $pesan["total_pesanan"]; ?></td>
            <td><a class="btn btn-danger" href="functions/hapus_pesan.php?id=<?= $pesan["id"]; ?>" onclick="return confirm('Hapus Pesanan?');">Hapus</a></td>
          </tr>
          <?php $i++ ?>
          <?php endforeach; ?>
        </table>
        </div>
        <!-- Navigasi halaman daftar pesanan -->
        <div class="halaman container-fluid text-center mt-1 mb-5">
        <?php if( $halamanAktif !=1 ) : ?>
          <a href="?hal=<?= $halamanAktif - 1; ?>">&laquo;</a>
        <?php endif; ?>

          <?php for( $j = 1; $j <= $jumlahHalaman; $j++ ) : ?>
            <?php if( $j == $halamanAktif ) : ?>
              <a class="fw-bold" href="?hal=<?= $j; ?>"><?= $j; ?></a>
            <?php else : ?>
              <a href="?hal=<?= $j; ?>"><?= $j; ?></a>
            <?php endif; ?>
          <?php endfor; ?>

        <?php if( $halamanAktif !=$jumlahHalaman ) : ?>
          <a href="?hal=<?= $halamanAktif + 1; ?>">&raquo;</a>
        <?php endif; ?>
      </div>  
      </div>
    </section>
    <!-- Akhir Daftar Pesanan -->

    <!-- Halaman Produk -->
    <section id="produk">
      <div class="produk container-fluid row text-center mx-auto p-5">
        <h2>PRODUK ADMIN</h2>
        <?php foreach ( $produk as $row ) : ?>
        <div class="container-fluid card mb-4" style="width: 16rem">
          <img src="img-produk/<?= $row["gambar"]; ?>" class="img-fluid card-img-top" alt=""/>
          <div class="card-body">
            <h5 class="card-title fw-bold"><?= $row["nama"]; ?></h5>
            <p class="card-text"><?= $row["deskripsi"]; ?></p>
            <p class="card-text fw-bold">RP. <?= $row["harga"]; ?></p>
            <a href="detail.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Detail</a>
            <a href="edit.php?id=<?= $row["id"]; ?>" class="btn btn-secondary">Edit</a>
            <a href="functions/hapus_produk.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Ingin Hapus Produk?');" class="btn btn-danger mt-1">Hapus</a>
          </div>
        </div>
        <?php endforeach; ?> 
      </div>
      <!-- Navigasi halaman produk -->
      <div class="halaman container-fluid text-center mb-5">
        <?php if( $halaman_aktif !=1 ) : ?>
          <a href="?halaman=<?= $halaman_aktif - 1; ?>">&laquo;</a>
        <?php endif; ?>

          <?php for( $k = 1; $k <= $jumlah_halaman; $k++ ) : ?>
            <?php if( $k == $halaman_aktif ) : ?>
              <a class="fw-bold" href="?halaman=<?= $k; ?>"><?= $k; ?></a>
            <?php else : ?>
              <a href="?halaman=<?= $k; ?>"><?= $k; ?></a>
            <?php endif; ?>
          <?php endfor; ?>

        <?php if( $halaman_aktif !=$jumlah_halaman ) : ?>
          <a href="?halaman=<?= $halaman_aktif + 1; ?>">&raquo;</a>
        <?php endif; ?>
      </div>  
    </section>

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

    <!-- Vanilla Tilt -->
    <script src="js/vanilla-tilt.js"></script>
    <script>
      function myFunction(x) {
        if (x.matches) {
          VanillaTilt.init(document.querySelectorAll(".card"), {
            max: 6,
            scale: 1.02,
          });
        } else {
        }
      }

      let x = window.matchMedia("(min-width: 1050px)");
      myFunction(x);
      x.addListener(myFunction);
    </script>

    <!-- JavaScript Bootstrap -->
    <script src="asset/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>