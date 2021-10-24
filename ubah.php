<?php 
require 'functions.php';

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
    <div class="container-fluid">
    <h2 class="fw-bold text-center mb-4">UBAH PRODUK</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $produk["id"]; ?>">
      <input type="hidden" name="gambar-lama" value="<?= $produk["gambar"]; ?>">
      <table class="ms-auto me-auto">
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
            <td><a href="user.php" class="btn btn-primary mt-1">Kembali</a></td>
            <td></td>
            <td><button type="submit" name="submit-ubah" class="btn btn-primary mt-1">Ubah</button></td>
          </tr>
      </table>
    </form>
    </div>
</body>
</html>