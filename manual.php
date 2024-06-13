<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Pembelian Jam Tangan Zovy</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>

<style type="text/css">
    .bs-acc {
        margin: 20px;
    }

    .purchase-step {
		display: flex;
		flex-wrap: wrap;
        justify-content: space-between;
        text-align: center;
        margin: 20px;
    }

    .step-box {
        display: inline-block;
        width: 30%;
        padding: 30px;
        background-color: #f0f0f0;
        border: 1px solid #ddd;
        margin: 0 1%;
		margin-top: 30px;
        vertical-align: top;
        box-sizing: border-box;
		cursor: pointer;
		transition: transform 0.3s, background-color 0.3s;
    }

	.step-box:hover {
            background-color: #e0e0e0; 
            transform: scale(1.05); 
        }

    .step-title {
        font-size: 26px;
        margin-bottom: 10px;
        border-bottom: 2px solid #ff8680;
        padding-bottom: 5px;
    }

    .step-content {
        font-size: 1em;
        color: #333;
    }

	@media (max-width: 768px) {
        .step-box {
            flex: 1 1 100%;
        }

        .step-image i {
            font-size: 20vw; 
        }
    }
	
</style>
<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid #ff8680"><b>Manual Aplikasi</b></h2>
    <div class="bs-acc">
        <div class="purchase-step">
		<div class="step-box" onclick="location.href='register.php'">
                <div class="step-image">
				<i class="bi bi-person-badge" style="font-size: 200px;"></i>
                </div>
                <div class="step-title">1. Registrasi Akun</div>
                <div class="step-content">Pastikan Anda sudah Daftar/Register dahulu sebelum melakukan pembelian.</div>
            </div>
            <div class="step-box" onclick="location.href='produk.php'">
                <div class="step-image">
				<i class="bi bi-watch" style="font-size: 200px;"></i>
                </div>
                <div class="step-title">2. Pilih Jam</div>
                <div class="step-content">Pilih jam yang Anda inginkan dari koleksi kami.</div>
            </div>
            <div class="step-box" onclick="location.href='keranjang.php'">
                <div class="step-image">
				<i class="bi bi-cart-check" style="font-size: 200px;"></i>
                </div>
                <div class="step-title">3. Lakukan Checkout</div>
                <div class="step-content">Lakukan Checkout pesanan Anda dan selesaikan pembayaran.</div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php 
include 'footer.php';
?>