<?php 
include '../../koneksi/koneksi.php';

// Generate kode bom
$kode = mysqli_query($conn, "SELECT kode_bom FROM bom_produk ORDER BY kode_bom DESC");
$data = mysqli_fetch_assoc($kode);

if ($data == null || $data['kode_bom'] == null) {
    $format = "B0001";
} else {
    $num = substr($data['kode_bom'], 1, 4);
    $add = (int) $num + 1;
    if (strlen($add) == 1) {
        $format = "B000".$add;
    } else if (strlen($add) == 2) {
        $format = "B00".$add;
    } else if (strlen($add) == 3) {
        $format = "B0".$add;
    } else {
        $format = "B".$add;
    }
}

$kode = isset($_POST['kode']) ? $_POST['kode'] : '';
$nm_produk = isset($_POST['nama']) ? $_POST['nama'] : '';
$harga = isset($_POST['harga']) ? $_POST['harga'] : '';
$desk = isset($_POST['desk']) ? $_POST['desk'] : '';
$nama_gambar = isset($_FILES['files']['name']) ? $_FILES['files']['name'] : '';
$size_gambar = isset($_FILES['files']['size']) ? $_FILES['files']['size'] : 0;
$tmp_file = isset($_FILES['files']['tmp_name']) ? $_FILES['files']['tmp_name'] : '';
$eror = isset($_FILES['files']['error']) ? $_FILES['files']['error'] : 0;
$type = isset($_FILES['files']['type']) ? $_FILES['files']['type'] : '';

// BOM
$kd_material = isset($_POST['material']) ? $_POST['material'] : array();
$keb = isset($_POST['keb']) ? $_POST['keb'] : array();

if ($eror === 4) {
    echo "
    <script>
    alert('TIDAK ADA GAMBAR YANG DIPILIH');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

$ekstensiGambar = array('jpg', 'jpeg', 'png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if (!in_array($ekstensiGambarValid, $ekstensiGambar)) {
    echo "
    <script>
    alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

if ($size_gambar > 1000000) {
    echo "
    <script>
    alert('UKURAN GAMBAR TERLALU BESAR');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

$namaGambarBaru = uniqid();
$namaGambarBaru .= ".";
$namaGambarBaru .= $ekstensiGambarValid;

if (move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru)) {
    $result = mysqli_query($conn, "INSERT INTO produk VALUES('$kode','$nm_produk','$namaGambarBaru','$desk','$harga')");

    $filter = array_filter($kd_material);
    $jml = count($filter);
    $no = 0;
    while ($no < $jml) {
        mysqli_query($conn, "INSERT INTO bom_produk VALUES('$format', '{$kd_material[$no]}', '$kode', '$nm_produk', '{$keb[$no]}')");
        $no++;
    }

    if ($result) {
        echo "
        <script>
        alert('PRODUK BERHASIL DITAMBAHKAN');
        window.location = '../m_produk.php';
        </script>
        ";
    }
}
?>
