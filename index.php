<?php
require 'functions/functions.php';

// pagination
$jumlah_data_per_halaman = 8; 
$jumlah_data = count(query("SELECT * FROM produk"));
$jumlah_halaman = ceil($jumlah_data / $jumlah_data_per_halaman);
$halaman_aktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;  
$data_awal = ($jumlah_data_per_halaman * $halaman_aktif) - $jumlah_data_per_halaman;

$produk = query("SELECT * FROM produk ORDER BY id DESC LIMIT $data_awal, $jumlah_data_per_halaman");

// Tombol cari ditekan
if ( isset($_POST["submit-cari"]) ) {
  $produk = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap-5.1.2-dist/css/bootstrap.min.css" />

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Stylish Shop</title>
  </head>
  <body id="home">
  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <img src="img/logo stylish shop.png" class="img-fluid" width="50" height="50" alt="">
        <a class="navbar-brand fw-bold mt-1 ms-1" href="#home">STYLISH SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#beranda">BERANDA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#produk">PRODUK</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="" data-bs-target="#kontak" data-bs-toggle="modal">KONTAK</a>
            </li>
          </ul>
          <form class="cari d-flex" action="" method="post">
            <input class="form-control me-1" type="search" name="keyword" placeholder="Cari produk..." aria-label="Search" size="30" autofocus/>
            <button class="btn btn-outline-light" type="submit" name="submit-cari"><i class="bi bi-search"></i></button>
          </form>
          <div class="tombol">
            <ul class="navbar-nav mt-1">
              <li class="nav-item">
                <a class="btn nav-link" href="login.php"><h6 class="bi bi-person-fill" data-bs-toggle="tooltip" title="Akun"></h6></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  <!-- Akhir Navbar -->

  <!-- Carousel -->
    <section id="beranda">
      <div class="carousel shadow-sm">
        <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/baju.png" class="img-fluid d-block w-100" alt="" />
            </div>
            <div class="carousel-item">
              <img src="img/celana.png" class="img-fluid d-block w-100" alt="" />
            </div>
            <div class="carousel-item">
              <img src="img/jaket.png" class="img-fluid d-block w-100" alt="" />
            </div>
            <div class="carousel-item">
              <img src="img/sepatu.png" class="img-fluid d-block w-100" alt="" />
            </div>
            <div class="carousel-item">
              <img src="img/shop.png" class="img-fluid d-block w-100" alt="" />
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
  <!-- Akhir Carousel  -->

  <!-- Halaman Produk -->
    <!-- ukuran foto produk 150 kali 150 -->
    <section id="produk">
      <h2>PRODUK TERBARU</h2>
      <div class="produk container-fluid row text-center mx-auto p-5">
      <?php foreach ( $produk as $row ) : ?>
        <div class="container-fluid card mb-4" style="width: 16rem">
        <img src="img-produk/<?= $row["gambar"]; ?>" class="img-fluid card-img-top" />
          <div class="card-body">
            <h5 class="card-title"><strong><?= $row["nama"]; ?></strong></h5>
            <p class="card-text"><?= $row["deskripsi"]; ?></p>
            <a href="detail.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Detail</a>
            <a href="pesan.php?id=<?= $row["id"]; ?>" class="btn btn-success">Beli</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- Navigasi Halaman -->
    <div class="halaman container-fluid text-center mb-5">

      <?php if( $halaman_aktif !=1 ) : ?>
        <a href="?halaman=<?= $halaman_aktif - 1; ?>">Prev</a>
      <?php endif; ?>

      <?php for( $i = 1; $i <= $jumlah_halaman; $i++ ) : ?>
        <?php if( $i == $halaman_aktif ) : ?>
          <a class="fw-bold" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php else : ?>
          <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if( $halaman_aktif !=$jumlah_halaman ) : ?>
        <a href="?halaman=<?= $halaman_aktif + 1; ?>">Next</a>
      <?php endif; ?>

    </div>
    </section>

  <!-- Alert Kontak -->
  <div class="modal fade" id="kontak" tabindex="-1"   aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fw-bold">KONTAK KAMI</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="container-fluid">
            <!-- <h2 class="text-center fw-bold">KONTAK KAMI</h2> -->
              <div class="row justify-content-center">
                <div class="col-md-6">

                  <!-- bagian alert  -->
                  <div class="alert alert-info alert-dismissible fade show d-none my-alert" role="alert">
                     <strong>Terima Kasih <i class="bi bi-heart-fill"></i></strong> Pesan Anda Sudah Kami Terima!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

                  <!-- form kontak -->
                  <form action="" name="stylishshop-kontak" id="formKontak" method="">
                     <div class="mb-1">
                      <label for="name" class="form-label">Nama</label>
                      <input name="nama" type="text" placeholder="Nama anda" class="form-control" id="nama" required />
                    </div>
                    <div class="mb-1">
                      <label for="email" class="form-label">Email</label>
                      <input name="email" type="email" placeholder="Email anda" class="form-control" id="email"/>
                    </div>
                    <div class="mb-3">
                       <label for="pesan" class="form-label">Pesan</label>
                       <textarea name="pesan" placeholder="Pesan anda" class="form-control" rows="3" id="pesan" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-kirim" id="submit">Kirim</button>
                    <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer mb-4">
          </div>
        </div>
      </div>
    </div>
  <!-- Akhir Alert Kontak -->

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

    <!-- JavaScript Bootstrap -->
    <script src="asset/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
    <!-- My JavaScript -->
    <script src="js/script.js"></script>
  </body>
</html>
