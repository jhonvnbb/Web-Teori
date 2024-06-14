<?php 
include 'header.php';
include './koneksi/koneksi.php';

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Retrieve the order ID from the URL parameter
if (isset($_GET['id_order'])) {
    $id_order = $_GET['id_order'];

    // Query to fetch the order details for the given order ID
    $query = "SELECT * FROM produksi WHERE id_order = '$id_order'";
    $result = mysqli_query($conn, $query);

    // Check if the query returned any results
    if (mysqli_num_rows($result) > 0) {
        $order = mysqli_fetch_assoc($result);
    } else {
        $order = false;
    }
} else {
    $order = false;
}
?>

<div class="container" style="padding-bottom: 300px;">
    <h2 class="bg-success text-center" style="padding: 10px;">Checkout Berhasil</h2>
    <?php if ($order): ?>
        <h3>ID Pesanan: <?php echo htmlspecialchars($order['id_order']); ?></h3>
        <h3>Tanggal: <?php echo htmlspecialchars($order['tanggal']); ?></h3>
        <h4 class="text-center" style="font-weight: bold;">
            Terimakasih Sudah Berbelanja di Zovy Watch,
            <?php
            if ($order['terima'] == '1') {
                echo "Pesanan Anda diterima dan sedang diproses. Silahkan tunggu barangmu dirumah ya.. :)";
            } elseif ($order['tolak'] == '1') {
                echo "Maaf, pesanan Anda ditolak. Silahkan hubungi customer service untuk informasi lebih lanjut.";
            } else {
                echo "Pesanan Anda sedang menunggu konfirmasi. Silahkan tunggu.";
            }
            ?>
        </h4>
    <?php else: ?>
        <h4 class="text-center" style="font-weight: bold;">
            Tidak ada pesanan yang ditemukan.
        </h4>
    <?php endif; ?>
</div>

<?php 
include 'footer.php';
?>
