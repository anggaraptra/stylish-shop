<?php
require 'functions.php';
$id = $_GET["id"];

if ( hapus($id) > 0 ) {
    echo "<script>
        alert('Data Berhasil Di Hapus!');
        document.location.href = '../user.php';
    </script>";
} else {
    echo "<script>
        alert('Data Gagal Di Hapus!');
        document.location.href = '../user.php';
     </script>";
}
?>