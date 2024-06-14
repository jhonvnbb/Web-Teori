<?php 
include 'header.php';
include './koneksi/koneksi.php';

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Retrieve the customer ID from the session
if (isset($_SESSION['kd_cs'])) {
    $customer_id = $_SESSION['kd_cs'];

    // Query to fetch all order details for the given customer ID
    $query = "SELECT * FROM produksi WHERE kode_customer = '$customer_id' ORDER BY tanggal DESC";
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
<style>
    .riwayat {
        box-shadow: 0 1px 10px rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .riw-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: gray;
        padding: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin-bottom: -10px;
    }

    .riw-body {
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .riw-produk {
        display: flex;
        align-items: center;
    }

    .riw-detail {
        background: white;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        padding-left: 10px;
    }
</style>

<div class="container" style="padding-bottom: 100px;">
    <?php if ($orders) : ?>
        <?php foreach ($orders as $order) : ?>
            <div class="riwayat">
                <div class="riw-head">
                    <h4><?php echo htmlspecialchars($order['tanggal']); ?></h4>
                    <strong>
                        <h4>
                            <?php
                            if ($order['terima'] == '1') {
                                echo "Diterima";
                            } elseif ($order['tolak'] == '1') {
                                echo "Ditolak";
                            } else {
                                echo "Menunggu Konfirmasi";
                            }
                            ?>
                        </h4>
                    </strong>
                </div>
                <div class="riw-body">
                    <div class="riw-produk">
                        <div class="riw-img">
                            <img src="image/produk/664f7f52ee3e7.jpg" alt="produk-img" width="100px">
                        </div>

                        <div class="riw-detail">
                            <a href="lihat-riwayat.php?id_order=<?php echo htmlspecialchars($order['id_order']); ?>">
                                <h3><?php echo htmlspecialchars($order['nama_produk']); ?></h3>
                            </a>
                            <h5>Invoice: <?php echo htmlspecialchars($order['invoice']); ?></h5>
                            <h5>Jumlah: <?php echo htmlspecialchars($order['qty']); ?></h5>
                        </div>
                    </div>
                    <div class="riw-harga">
                        <h2>Rp.<?php echo number_format($order['harga'], 0, ',', '.'); ?></h2>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

    <?php else : ?>
        <h4 class="text-center" style="font-weight: bold;">Tidak ada riwayat pesanan yang ditemukan.</h4>
    <?php endif; ?>
</div>

<?php 
include 'footer.php';
?>
