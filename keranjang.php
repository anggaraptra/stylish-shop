<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style-keranjang.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap-5.1.2-dist/css/bootstrap.min.css" />

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Keranjang</title>
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
              <a class="nav-link active me-5" aria-current="page" href="#produk">HALAMAN KERANJANG</a>
            </li>
          </ul>
          <div class="tombol">
            <ul class="navbar-nav mt-1">
              <li class="nav-item">
                <a class="btn nav-link ms-5 me-5" href="user.php"><h6 class="bi bi-arrow-left-circle-fill" data-bs-toggle="tooltip" title="Kembali"></h6></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Halaman Keranjang -->
    <!-- Halaman Produk -->
    <section id="produk">
    <div class="produk container-fluid row text-center p-5 mx-auto mb-3 mt-5">
        <div class="container-fluid card mr-2 ml-2 mb-3" style="width: 16rem">
          <img width="160" height="160" src="img/poto.png" class="container-fluid card-img-top" alt=""/>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="" class="btn btn-primary" data-bs-target="#detail-produk" data-bs-toggle="modal">Detail</a>
          </div>
        </div>
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
                <img class="container-fluid" src="img/poto.png" alt="">
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
    <!-- Akhir Halaman Keranjang -->

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
    <!-- Akhir Footer-->

    <!-- JavaScript Bootstrap -->
    <script src="asset/bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>