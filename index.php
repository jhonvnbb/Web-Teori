<?php 
include 'header.php';
?>
<!-- IMAGE -->
<div class="container-fluid" style="margin: 0; padding: 0;">
	<div class="wrapper" style="margin: 0; padding: 0;">
		<div class="slides">
			<span id="slide-1"></span>
			<span id="slide-2"></span>
			<span id="slide-3"></span>

			<div class="image">
				<img src="image/home/jam.jpg" style="width: 100%; height: 880px;">
				<img src="image/home/gambar2.jpg" style="width: 100%; height: 880px;">
				<img src="image/home/gmbr5.jpg" style="width: 100%; height: 880px;">
			</div>
		</div>
	</div>
</div>
<!-- <div class="navigation">
	<a href="#slide-1" onclick="navigateSlide(0)">1</a>
	<a href="#slide-2" onclick="navigateSlide(1)">2</a>
	<a href="#slide-3" onclick="navigateSlide(2)">3</a>
</div> -->
<br>
<br>
<style>
	.image {
		display: flex;
		width: 100%; /* Adjust width based on the number of images */
		transition: margin-left 1s ease-in-out;
	}

	.image img {
		width: 33.3333%; /* Adjust width based on the number of images */
	}

	.wrapper {
		overflow: hidden;
		width: 100%;
		margin: 0; /* Ensuring no margin */
		padding: 0; /* Ensuring no padding */
	}

	.container-fluid {
		margin: 0; /* Ensuring no margin */
		padding: 0; /* Ensuring no padding */
	}

	.navigation a {
		display: inline-block;
		height: 20px;
		width: 20px;
		background-color: transparent;
		font-size: 0;
		border: 2px solid black;
		border-radius: 50%;
		margin: 9px;
	}

	.navigation a:hover {
		background-color: black;
		transition: 1s;
	}

	.navigation {
		position: absolute;
		margin-left: auto;
		margin-right: auto;
		left: 0;
		right: 0;
		text-align: center;
		margin-top: -50px;
	}
</style>

<script>
	let currentSlide = 0;
	const totalSlides = document.querySelectorAll('.image img').length;
	const intervalTime = 3000;
	let slideInterval;

	function showNextSlide() {
		currentSlide = (currentSlide + 1) % totalSlides;
		document.querySelector('.image').style.marginLeft = `-${currentSlide * 100}%`;
	}

	function navigateSlide(slideIndex) {
		currentSlide = slideIndex;
		document.querySelector('.image').style.marginLeft = `-${currentSlide * 100}%`;
		clearInterval(slideInterval);
		slideInterval = setInterval(showNextSlide, intervalTime);
	}

	slideInterval = setInterval(showNextSlide, intervalTime);
</script>

<!-- PRODUK TERBARU -->
<div class="container">
	<h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px; font-style: italic; line-height: 29px; border-top: 2px solid #ff8d87; border-bottom: 2px solid #ff8d87;">❝Lihat jam! jangan lihat mantan❞</h4>

	<h2 style="width: 100%; border-bottom: 4px solid #ff8680; margin-top: 80px;"><b>Produk Kami</b></h2>

	<div class="row">
		<?php 
		$result = mysqli_query($conn, "SELECT * FROM produk LIMIT 3");
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="image/produk/<?= $row['image']; ?>" >
					<div class="caption">
						<h3><?= $row['nama'];  ?></h3>
						<h4>Rp.<?= number_format($row['harga']); ?></h4>
						<div class="row">
							<div class="col-md-6">
								<a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-warning btn-block">Detail</a> 
							</div>
							<?php if(isset($_SESSION['kd_cs'])){ ?>
								<div class="col-md-6">
									<a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
								</div>
								<?php 
							}
							else{
								?>
								<div class="col-md-6">
									<a href="keranjang.php" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
								</div>

								<?php 
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php 
		}
		?>
	</div>
	
	<!-- View All Button -->
	<div class="text-center" style="margin-top: 30px;">
		<a href="produk.php" class="button">View All</a>
	</div>
</div>
<br>
<br>
<br>
<br>
<?php 
include 'footer.php';
?>

<!-- Custom CSS view all-->
<style>
.button {
  font-size: 20px;
  background: transparent;
  border: 2px solid #FF7F50;
  padding: 1em 1.5em;
  color: #fff;
  position: relative;
  transition: 0.5s ease;
  cursor: pointer;
  color: #FF4500;
}

.button::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 0;
  background-color: #FFA07A; /* warna garis awal di bawah pas animasi */
  transition: 0.5s ease;
}

.button:hover {
  color: #fff;
  transition-delay: 0.5s;
}

.button:hover::before {
  width: 100%;
}

.button::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 0;
  width: 100%;
  background-color: #FFA07A;
  transition: 0.4s ease;
  z-index: -1;
}

.button:hover::after {
  height: 100%;
  transition-delay: 0.4s;
  color: #fff;
}
</style>
