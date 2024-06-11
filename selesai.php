<?php 
include 'header.php';
include './koneksi/koneksi.php';

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Retrieve the customer ID from the session
if (isset($_SESSION['kode_customer'])) {
    $customer_id = $_SESSION['kode_customer'];

    // Query to fetch all order details for the given customer ID
    $query = "SELECT * FROM produksi WHERE kode_customer = '$customer_id'";
    $result = mysqli_query($conn, $query);

    // Check if the query returned any results
    if (mysqli_num_rows($result) > 0) {
        $orders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
    } else {
        $orders = false;
    }
} else {
    $orders = false;
}
?>

<div class="container" style="padding-bottom: 300px;">
    <h2 class="bg-success text-center" style="padding: 10px;">Checkout Berhasil</h2>
    <?php if ($orders): ?>
        <h3>Kode Customer: <?php echo htmlspecialchars($customer_id); ?></h3>
        <?php foreach ($orders as $order): ?>
            <h4 class="text-center" style="font-weight: bold;">
                Terimakasih Sudah Berbelanja di Rapi-Cake Backery,
                <?php
                if ($order['terima'] == '1') {
                    echo "Pesanan dengan ID " . htmlspecialchars($order['id_order']) . " diterima dan sedang diproses. Silahkan tunggu barangmu dirumah ya.. :)";
                } elseif ($order['tolak'] == '1') {
                    echo "Maaf, pesanan dengan ID " . htmlspecialchars($order['id_order']) . " ditolak. Silahkan hubungi customer service untuk informasi lebih lanjut.";
                } else {
                    echo "Pesanan dengan ID " . htmlspecialchars($order['id_order']) . " sedang menunggu konfirmasi. Silahkan tunggu.";
                }
                ?>
            </h4>
        <?php endforeach; ?>
    <?php else: ?>
        <h4 class="text-center" style="font-weight: bold;">
            Tidak ada pesanan yang ditemukan.
        </h4>
    <?php endif; ?>
</div>

<?php 
include 'footer.php';
?>
