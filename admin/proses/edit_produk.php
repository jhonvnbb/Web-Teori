<?php
// Sertakan file koneksi database
include '../../koneksi/koneksi.php';

// Tangkap data dari form menggunakan metode POST
$kode = $_POST['kode'];
$nm_produk = $_POST['nama'];
$harga = $_POST['harga'];
$desk = $_POST['desk'];
$nama_gambar = $_FILES['files']['name'];
$size_gambar = $_FILES['files']['size'];
$tmp_file = $_FILES['files']['tmp_name'];
$eror = $_FILES['files']['error'];
$type = $_FILES['files']['type'];

// Query untuk mengambil data BOM produk
$bk = mysqli_query($conn, "SELECT kode_bk FROM bom_produk WHERE kode_produk = '$kode'");

// Jumlah material bisa dihitung langsung dari hasil query
$jml = mysqli_num_rows($bk) - 1;

// Cek apakah tidak ada file gambar yang diupload (error 4)
if ($eror === 4) {
    // Update data produk tanpa mengubah gambar
    $result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', deskripsi = '$desk', harga = '$harga' WHERE kode_produk = '$kode'");

    // Loop untuk mengupdate BOM produk
    $no = 0;
    $a = 0;
    while ($no <= $jml) {
        while ($a <= $no) {
            $r = mysqli_fetch_assoc($bk);
            $kdb  = $r['kode_bk'];
            mysqli_query($conn, "UPDATE bom_produk SET kode_bk = '$kd_material[$no]', kebutuhan = '$keb[$no]' WHERE kode_produk = '$kode' AND kode_bk = '$kdb'");
            $a++;
        }
        $no++;
    }

    // Jika update berhasil, tampilkan pesan dan redirect ke halaman m_produk.php
    if ($result) {
        echo "
        <script>
        alert('PRODUK BERHASIL DIEDIT');
        window.location = '../m_produk.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('GAGAL MENGEDIT PRODUK');
        window.location = '../edit_produk.php?kode=" . $kode . "';
        </script>
        ";
    }
    // Hentikan eksekusi script
    die;
}

// Tentukan ekstensi file gambar yang diperbolehkan
$ekstensiGambar = array('jpg', 'jpeg', 'png');
$ekstensiGambarValid = pathinfo($nama_gambar, PATHINFO_EXTENSION);

// Periksa apakah ekstensi gambar valid
if (!in_array($ekstensiGambarValid, $ekstensiGambar)) {
    echo "
    <script>
    alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
    window.location = '../edit_produk.php?kode=" . $kode . "';
    </script>
    ";
    die;
}

// Periksa ukuran file gambar
if ($size_gambar > 1000000) {
    echo "
    <script>
    alert('UKURAN GAMBAR TERLALU BESAR');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

// Generate nama unik untuk file gambar baru
$namaGambarBaru = uniqid() . '.' . $ekstensiGambarValid;

// Hapus gambar lama jika ada
$gambar = mysqli_query($conn, "SELECT image FROM produk WHERE kode_produk = '$kode'");
$tgambar = mysqli_fetch_assoc($gambar);
if (file_exists("../../image/produk/" . $tgambar['image'])) {
    unlink("../../image/produk/" . $tgambar['image']);
}

// Pindahkan file gambar baru ke direktori yang ditentukan
move_uploaded_file($tmp_file, "../../image/produk/" . $namaGambarBaru);

// Update data produk termasuk gambar baru
$result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', image = '$namaGambarBaru', deskripsi = '$desk', harga = '$harga' WHERE kode_produk = '$kode'");

// Loop untuk mengupdate BOM produk
$no = 0;
$a = 0;
while ($no <= $jml) {
    while ($a <= $no) {
        $r = mysqli_fetch_assoc($bk);
        $kdb  = $r['kode_bk'];
        mysqli_query($conn, "UPDATE bom_produk SET kode_bk = '$kd_material[$no]', kebutuhan = '$keb[$no]' WHERE kode_produk = '$kode' AND kode_bk = '$kdb'");
        $a++;
    }
    $no++;
}

// Jika update berhasil, tampilkan pesan dan redirect ke halaman m_produk.php
if ($result) {
    echo "
    <script>
    alert('PRODUK BERHASIL DIEDIT');
    window.location = '../m_produk.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('GAGAL MENGEDIT PRODUK');
    window.location = '../edit_produk.php?kode=" . $kode . "';
    </script>
    ";
}
?>
