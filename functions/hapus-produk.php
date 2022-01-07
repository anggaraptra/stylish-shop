<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../login.php");
  exit;
}

require 'functions.php';
$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM produk WHERE id = '$id'");

header('Location: ../useradmin.php?a=1');
exit;
// if ( hapus($id) > 0 ) {
//     echo "<script>
//         alert('Data Berhasil Di Hapus!');
//         document.location.href = '../useradmin.php';
//     </script>";
// } else {
//     echo "<script>
//         alert('Data Gagal Di Hapus!');
//         document.location.href = '../useradmin.php';
//      </script>";
// }
