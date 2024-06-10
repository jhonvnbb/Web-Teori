<?php 
include '../../koneksi/koneksi.php';
$inv = $_GET['inv'];

$result = mysqli_query($conn, "SELECT * from produksi where invoice = '$inv'");

$success = true;

while($row = mysqli_fetch_assoc($result)){
    $kodep = $row['kode_produk'];
    $t_bom = mysqli_query($conn, "SELECT * FROM bom_produk WHERE kode_produk = '$kodep'");

    while($row1 = mysqli_fetch_assoc($t_bom)){
        $kodebk = $row1['kode_bk'];
        $inventory = mysqli_query($conn, "SELECT * FROM inventory WHERE kode_bk = '$kodebk'");
        $r_inv = mysqli_fetch_assoc($inventory);

        $kebutuhan = $row1['kebutuhan'];    
        $qtyorder = $row['qty'];
        $inven = $r_inv['qty'];
        $bom = ($kebutuhan * $qtyorder);
        $hasil = $inven - $bom;

        if($hasil < 0) {
            $success = false;
            break;
        }

        $update_inventory = mysqli_query($conn, "UPDATE inventory SET qty = '$hasil' WHERE kode_bk = '$kodebk'");

        if(!$update_inventory) {
            $success = false;
            break;
        }
    }

    if(!$success) {
        break;
    }
}

if($success) {
    $update_produksi = mysqli_query($conn, "UPDATE produksi SET terima = '1', status = '0' WHERE invoice = '$inv'");
    if($update_produksi) {
        echo "
        <script>
        alert('PESANAN BERHASIL DITERIMA');
        window.location = '../produksi.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('GAGAL MENGUPDATE STATUS PRODUKSI');
        window.location = '../produksi.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
    alert('STOK TIDAK MENCUKUPI UNTUK MENERIMA PESANAN');
    window.location = '../produksi.php';
    </script>
    ";
}
?>
