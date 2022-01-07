<?php
require 'functions/functions.php';

// pagination
$jumlah_data_per_halaman = 8;
$jumlah_data = count(query("SELECT * FROM produk"));
$jumlah_halaman = ceil($jumlah_data / $jumlah_data_per_halaman);
$halaman_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$data_awal = ($jumlah_data_per_halaman * $halaman_aktif) - $jumlah_data_per_halaman;

$produk = query("SELECT * FROM produk ORDER BY id DESC LIMIT $data_awal, $jumlah_data_per_halaman");

// Tombol cari ditekan
if (isset($_POST["submit-cari"])) {
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
  <link rel="stylesheet" href="assets/bootstrap-5.1.2-dist/css/bootstrap.min.css" />

  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

  <!-- AOS -->
  <link href="assets/aos/dist/aos.css" rel="stylesheet">

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
  <title>Stylish Shop</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg shadow-sm navbar-dark fixed-top bg-primary">
    <div class="container-fluid">
      <a href="">
        <img src="img/logo stylish shop.png" class="img-fluid" width="50" height="50" alt="">
        <a href="" class="navbar-brand fw-bold mt-1 ms-1">STYLISH SHOP</a>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link beranda active" aria-current="page" href="#beranda">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link produk" aria-current="page" href="#produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link kontak" aria-current="page" href="" data-bs-target="#kontak" data-bs-toggle="modal">Kontak</a>
          </li>
        </ul>
        <form class="cari d-flex" action="" method="post">
          <input class="form-control me-1" type="search" name="keyword" placeholder="Cari Produk..." aria-label="Search" size="30" autocomplete="off" autofocus required />
          <button class="btn btn-outline-light" type="submit" name="submit-cari"><i class="bi bi-search"></i></button>
        </form>
        <div class="tombol">
          <ul class="navbar-nav mt-1">
            <li class="nav-item">
              <a class="btn nav-link" href="login.php">
                <h6 class="bi bi-person-fill" data-bs-toggle="tooltip" title="Akun Admin"></h6>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Carousel -->
  <section id="beranda" class="p-4">
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
            <img src="img/baju.png" class="img-fluid" alt="" />
          </div>
          <div class="carousel-item">
            <img src="img/celana.png" class="img-fluid" alt="" />
          </div>
          <div class="carousel-item">
            <img src="img/jaket.png" class="img-fluid" alt="" />
          </div>
          <div class="carousel-item">
            <img src="img/sepatu.png" class="img-fluid" alt="" />
          </div>
          <div class="carousel-item">
            <img src="img/shop.png" class="img-fluid" alt="" />
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
  <section id="produk">
    <h2 data-aos="zoom-in" data-aos-duration="600" data-aos-delay="600">PRODUK TERBARU</h2>
    <div class="produk container-fluid row text-center mx-auto p-5">
      <?php foreach ($produk as $row) : ?>
        <div class="container-fluid card mb-4" style="width: 16rem">
          <img src="img-produk/<?= $row["gambar"]; ?>" class="img-fluid card-img-top" />
          <div class="card-body">
            <h5 class="card-title fw-bold"><?= $row["nama"]; ?></h5>
            <p class="card-text"><?= $row["deskripsi"]; ?></p>
            <p class="card-text fw-bold"><?= rp($row["harga"]); ?></p>
            <a href="detail.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Detail</a>
            <a href="pesan.php?id=<?= $row["id"]; ?>" class="btn btn-success">Beli</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- Navigasi Halaman -->
    <div class="halaman container-fluid text-center mb-5">
      <?php if ($halaman_aktif != 1) : ?>
        <a href="?halaman=<?= $halaman_aktif - 1; ?>">&laquo;</a>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $jumlah_halaman; $i++) : ?>
        <?php if ($i == $halaman_aktif) : ?>
          <a class="fw-bold" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php else : ?>
          <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if ($halaman_aktif != $jumlah_halaman) : ?>
        <a href="?halaman=<?= $halaman_aktif + 1; ?>">&raquo;</a>
      <?php endif; ?>
    </div>
  </section>
  <!-- Akhir Halaman Produk -->

  <!-- Modal Kontak -->
  <div class="modal fade" id="kontak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold">Kontak Kami</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-md-6">

                <!-- bagian alert  -->
                <div class="alert alert-info alert-dismissible fade show d-none my-alert" role="alert">
                  <strong>Terima Kasih <i class="bi bi-heart-fill"></i></strong> Pesan anda sudah kami terima!
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
                    <input name="email" type="email" placeholder="Email anda" class="form-control" id="email" />
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
        <div class="modal-footer mb-4"></div>
      </div>
    </div>
  </div>
  <!-- Akhir Modal Kontak -->

  <!-- Footer -->
  <footer class="container-fluid bg-primary text-white p-3">
    <div class="row mt-3">
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
    <p>Developed by AnggaraPutra | &copy Copyright 2022</p>
  </div>
  <!-- Akhir Footer -->

  <!-- JavaScript Bootstrap -->
  <script src="assets/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>

  <!-- AOS -->
  <script src="assets/aos/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
    });
  </script>

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
  <script>
    gsap.from("#beranda", {
      duration: 0.6,
      y: -60,
      opacity: 0,
      delay: 0.4,
      ease: "power4"
    });
  </script>

  <!-- Vanilla Tilt -->
  <script src="js/vanilla-tilt.js"></script>
  <script>
    function myFunction(x) {
      if (x.matches) {
        VanillaTilt.init(document.querySelectorAll(".card"), {
          max: 6,
          scale: 1.02,
        });
      } else {}
    }

    let x = window.matchMedia("(min-width: 1050px)");
    myFunction(x);
    x.addListener(myFunction);
  </script>

  <!-- My JavaScript -->
  <script src="js/script.js"></script>
</body>

</html>