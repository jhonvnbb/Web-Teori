<?php 
include 'header.php';
include './koneksi/koneksi.php';

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
    }

</style>

<div class="container" style="padding-bottom: 300px;">
    
    <div class="riwayat">
        <div class="riw-head">
            <h4>12/09/2022</h4>
            <strong><h4>Diterima</h4></strong>
        </div>
        <div class="riw-body">
            <div class="riw-produk">
                <div class="riw-img">
                    <img src="image/produk/664f7f52ee3e7.jpg" alt="produk-img" width="100px">
                </div>
    
                <div class="riw-detail">
                    <h3>Nama Produk</h3>
                    <h5>invoice</h5>
                    <h5>Jumlah : </h5>
                </div>
            </div>
            <div class="riw-harga">
                <h2>Rp.135.000.000</h2>
            </div>
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>
