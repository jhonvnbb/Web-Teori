<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
	.sosmed {
		margin-top: 50px;
	}

	.sosmed a {
		margin: 5px; /*jarak antar elemen*/
		position: relative;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 50px;
		height: 50px;
		background: transparent;
		border: 2px solid #FF7F50;
		border-radius: 50%;
		color: #FF4500; /*warna ikon/elemen di dalam buletannya*/
		font-size: 25px;
		text-decoration: none;
		z-index: 1;
		overflow: hidden;
		transition: 0.5s;
	}

	.sosmed a:hover {
		color: #081b29;
	}

	.sosmed a::before {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		width: 0;
		height: 100%;
		background: #FFA07A; /*warna dalam buletannya pas kursor di arahin*/
		z-index: -1;
	}

	.sosmed a:hover::before {
		width: 100%;
		transition: 0.5s;
	}
	
	.sosmed-title {
		margin-bottom: 20px;
		margin-left :15px;
	}
</style>
	<footer style="border-top: 4px solid #ff8680;  ">
		<div class="container" style="padding-bottom: 50px;">
			<div class="row">
				<div class="col-md-4" style="margin-top: 20px;">
					<h3 style="color: #ff8680; padding-bottom: 20px;"><b>ZOVY WATCH</b></h3>
					<p>Jalan Kesuksesan No.1</p>
					<p><i class="glyphicon glyphicon-earphone"></i> +6287804616097</p>
					<p><i class="glyphicon glyphicon-envelope"></i> zovywatch@gmail.com</p>
				</div>
				<div class="col-md-4" style="margin-top: 35px;">
					<h5 style="padding-bottom: 20px;"><b style="font-size: 18px;">MENU</b></h5>
					<p><a href="produk.php"  style="color: #000">Produk</a></p>
					<p><a href="about.php"  style="color: #000">Tentang kami</a></p>
					<p><a href="contact.php"  style="color: #000">Contact Us</a></p>
				</div>

				<div class="col-md-4">

				<div class="sosmed">
                <h4 class="sosmed-title" style="color: #ff8680"><b>FOLLOW US</b></h4>
                <a href="https://wa.me/089633451402">
					<i class = "fa-brands fa-whatsapp"></i>
                </a>
                <a href="https://www.instagram.com/zainabaqilah_/">
					<i class = "fa-brands fa-instagram"></i>
                </a>  
                <a href="https://www.github.com/zainabaqilah">
					<i class = "fa-brands fa-github"></i>
                </a>
                <a href="https://www.tiktok.com/@itsmejaee1">
                    <i class = "fa-brands fa-tiktok"></i>
                </a>
            </div>
				</div>
			</div>

		</div>


		<div class="copy" style="background-color: #ff8680; padding: 5px; color: #fff; text-align: center;">
			<span>Copyright&copy; ZovyWatch</span>
		</div>
	</footer>
</body>
</html>