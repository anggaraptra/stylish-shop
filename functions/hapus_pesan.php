<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: ../login.php");
  exit;
}

require 'functions.php';

$id = $_GET["id"];

if ( hapusPesanan($id) > 0 ) {
    echo "<script>
        alert('Pesanan Berhasil Di Hapus!');
        document.location.href = '../user.php';
    </script>";
} else {
    echo "<script>
        alert('Pesanan Gagal Di Hapus!');
        document.location.href = '../user.php';
     </script>";
}
?>