<?php 
session_start();
include 'koneksi/koneksi.php';
if(isset($_SESSION['kd_cs'])) {
    $kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ZOVY WATCH</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar-header {
            display: flex;
        }

        .navbar-header .profile {
            margin-left: -80px; /*ngatur posisi logonya*/
            margin-bottom: 1px;
        }

        .navbar-brand b{
            margin-left: 25px;
        }
        .navbar-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .nav > li > a {
            color: #555; /* Mengubah warna teks normal */
            position: relative;
			padding-bottom: 2px;
        }
        .nav > li > a:hover, .nav > li > a:focus {
            color: #ff8680; /* Mengubah warna teks saat hover */
        }
        .nav > li > a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: #ff8680; /* Warna garis bawah */
            transition: width 0.3s ease, left 0.3s ease;
        }
        .nav > li > a:hover::after, .nav > li > a:focus::after {
            width: 100%;
            left: 0;
        }
        
        .profile img {
            height:50px;
            border-radius: 1000%; /*supaya gambar logo nya bulat, atur disini*/
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row top">
            <center>
                <div class="col-md-4" style="padding: 3px;">
                    <span><i class="glyphicon glyphicon-earphone"></i> +6287804616097</span>
                </div>
                <div class="col-md-4" style="padding: 3px;">
                    <span><i class="glyphicon glyphicon-envelope"></i> zovywatch@gmail.com</span>
                </div>
                <div class="col-md-4" style="padding: 3px;">
                    <span>ZOVY WATCH INDONESIA</span>
                </div>
            </center>
        </div>
    </div>

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <div class="profile">
                    <img src="image/home/LOGO ZOVY.png" alt="logozovy">
                </div>
                <a class="navbar-brand" href="#" style="color: #ff8680"><b>ZOVY WATCH</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-content" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="nav navbar-nav navbar-center">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="produk.php">Produk</a></li>
                    <li><a href="about.php">Tentang Kami</a></li>
                    <li><a href="manual.php">Manual Aplikasi</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Categories <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="all_categories.php?category=Men">Men</a></li>
                        <li><a href="all_categories.php?category=Women">Women</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php 
                    if(isset($_SESSION['kd_cs'])) {
                        $kode_cs = $_SESSION['kd_cs'];
                        $cek = mysqli_query($conn, "SELECT kode_produk FROM keranjang WHERE kode_customer = '$kode_cs' ");
                        $value = mysqli_num_rows($cek);
                    ?>
                    <li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i> <b>[<?= $value ?>]</b></a></li>
                    <?php 
                    } else {
                        echo "<li><a href='keranjang.php'><i class='glyphicon glyphicon-shopping-cart'></i> [0]</a></li>";
                    }
                    if(!isset($_SESSION['user'])) {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Akun <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="user_login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                        </ul>
                    </li>
                    <?php 
                    } else {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?= $_SESSION['user']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="proses/logout.php">Log Out</a></li>
                        </ul>
                    </li>
                    <?php 
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
