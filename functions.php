<?php 
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "stylishshop");

// fungsi query atau mengambil data dari tabel database produk
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi untuk menambah data ke database
function tambah($data) {
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $stok = htmlspecialchars($data["stok"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO Produk
    VALUES
    ('', '$nama', 
    '$stok', 
    '$deskripsi', 
    '$harga', 
    '$gambar')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Fungsi menghapus produk dari database
function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM produk WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}
?>