<?php 
include '../koneksi/koneksi.php';
$kd_cs = $_POST['kode_cs'];
$nama = $_POST['nama'];
$prov = $_POST['prov'];
$kota = $_POST['kota'];
$alamat = $_POST['almt'];
$kopos = $_POST['kopos'];
$tanggal = date('Y-m-d'); // Memperbaiki format tanggal

$kode = mysqli_query($conn, "SELECT invoice from produksi order by invoice desc");
$data = mysqli_fetch_assoc($kode);
$num = substr($data['invoice'], 3, 4);
$add = (int) $num + 1;
if(strlen($add) == 1){
    $format = "INV000".$add;
} else if(strlen($add) == 2){
    $format = "INV00".$add;
} else if(strlen($add) == 3){
    $format = "INV0".$add;
} else {
    $format = "INV".$add;
}

$keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kd_cs'");

while($row = mysqli_fetch_assoc($keranjang)){
    $kd_produk = $row['kode_produk'];
    $nama_produk = $row['nama_produk'];
    $qty = $row['qty'];
    $harga = $row['harga'];
    $status = "Pesanan Baru";

    $order = mysqli_query($conn, "INSERT INTO produksi (invoice, kode_customer, kode_produk, nama_produk, qty, harga, status, tanggal, provinsi, kota, alamat, kode_pos, terima, tolak, cek) VALUES ('$format', '$kd_cs', '$kd_produk', '$nama_produk', '$qty', '$harga', '$status', '$tanggal', '$prov', '$kota', '$alamat', '$kopos', '0', '0', '0')");
}

$del_keranjang = mysqli_query($conn,"DELETE FROM keranjang WHERE kode_customer = '$kd_cs'");

if($del_keranjang){
    session_start();
    $_SESSION['kode_customer'] = $kd_cs; // Pastikan session diset di sini
    $_SESSION['invoice'] = $format; // Menambahkan invoice dalam session
    header("location:../selesai.php");
}
?>
