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

    // upload Gambar
    $gambar = upload();
    if ( !$gambar ) {
        return false;
    }

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

// Fungsi upload file gambar
function upload() {
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ( $error === 4 ) {
        echo "<script>
            alert('Pilih Gambar!');
        </script>";
        return false;
    }

    // cek yang di upload gambar atau tidak
    $ekstensi_gambar_valid = ['jpg', 'jpeg', 'png'];
    $ekstensi_gambar = explode('.', $nama_file);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));
    if ( !in_array($ekstensi_gambar, $ekstensi_gambar_valid) ) {
        echo "<script>
            alert('Yang Anda Upload Bukan Gambar!');
        </script>";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if ( $ukuran_file > 2000000 ) {
        echo "<script>
            alert('Ukuran Gambar Terlalu Besar!');
        </script>";
        return false;
    }

    // jika lolos pengecekan, gambar sudah bisa diupload
    // generate nama gambar baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_gambar;

    move_uploaded_file($tmp_name, 'img-produk/' . $nama_file_baru);
    return $nama_file_baru;
}

// Fungsi menghapus produk dari database
function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM produk WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}

// Fungsi untuk mengubah data dalam database
function ubah($data) {
    global $koneksi; 

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $stok = htmlspecialchars($data["stok"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambar_lama = htmlspecialchars($data["gambar-lama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambar_lama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE produk SET 
            nama = '$nama',
            stok = '$stok',
            deskripsi = '$deskripsi',
            harga = '$harga',
            gambar = '$gambar'
        WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}

// Fungsi untuk mencari produk
function cari($data) {
    $query = "SELECT * FROM produk 
                WHERE
            nama LIKE '%$data%' OR
            deskripsi LIKE '%$data%'";

    return query($query);
}

// Fungsi untuk menambah user atau registrasi
function registrasi($data) {
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if ( mysqli_fetch_assoc($result) ) {
        echo "<script>
            alert('Username Sudah Tersedia!');
        </script>";
    return false;
    }

    // cek konfirmasi password
    if ( $password !== $password2 ) {
        echo "<script>
            alert('Konfirmasi Password Tidak Sesuai!');
        </script>";
    return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$email', '$password')");

    return mysqli_affected_rows($koneksi);
}

// Fungsi untuk memproses pesanan
function pesanan($data) {
    global $koneksi;

    $nama = $data['nama_produk'];
    $harga = $data['harga'];
    $nama_pemesan = htmlspecialchars($data['nama_pemesan']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat_lengkap']);
    $total = htmlspecialchars($data['total_pesanan']);

    $query = "INSERT INTO pesanan
    VALUES
    ('', '$nama', '$harga', '$nama_pemesan', '$no_hp', '$email', '$alamat', '$total')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Fungsi umtuk menghapus pesanan
function hapusPesanan($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pesanan WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}
?>