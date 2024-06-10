<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<th>No</th>
			<th>Invoice</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>qty</th>
			<th>Subtotal</th>
			<th>tanggal</th>
		</tr>
		<?php 
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan Profit.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		$conn = mysqli_connect("localhost", "root", "", "roti");
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];
		$result = mysqli_query($conn, "SELECT * FROM produksi WHERE terima = 1 and tanggal between '$date1' and '$date2'");
		$no=1;
		$total = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $row['invoice']; ?></td>
				<td><?= $row['nama_produk']; ?></td>
				<td><?=  number_format($row['harga']); ?></td>
				<td><?= $row['qty']; ?></td>
				<td><?= number_format($row['harga']*$row['qty']); ?></td>
				<td><?= $row['tanggal']; ?></td>
			</tr>
			<?php 
			$total += $row['harga']*$row['qty'];
			$no++;
		}
		?>
		<tr>
			<td colspan="7" class="text-right"><b>Total Pendapatan Kotor = <?= number_format($total); ?></b></td>
		</tr>
	</table>


	<h4><b>Pemotongan dengan Biaya Bahan Baku</b></h4>
		<table class="table table-striped">
			<tr>
				<th>No</th>
				<th>Nama Bahan Baku</th>
				<th>Harga</th>
				<th>Kebutuhan</th>
				<th>Subtotal</th>
			</tr>
			<?php 
			$result = mysqli_query($conn, "SELECT * FROM produksi WHERE terima = 1 and tanggal between '$date1' and '$date2'");
			$no1=1;
			$totalb = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				$kd = $row['kode_produk'];
				$bahan = mysqli_query($conn, "SELECT b.kebutuhan as kebutuhan, i.nama as nama, i.harga as harga from bom_produk b join inventory i on b.kode_bk=i.kode_bk WHERE b.kode_produk = '$kd'");
				while ($row1 = mysqli_fetch_assoc($bahan)) {
					?>
					<tr>
						<td><?= $no1; ?></td>
						<td><?= $row1['nama']; ?></td>
						<td><?= $row1['harga']; ?></td>
						<td><?= $row1['kebutuhan']; ?></td>
						<td><?= number_format($row1['harga']*$row1['kebutuhan']); ?></td>
					</tr>
					<?php 
					$totalb += $row1['harga']*$row1['kebutuhan'];
					$no1++;
				}
			}
		?>
		<tr>
			<td colspan="7" class="text-right"><b>Total Biaya Bahan Baku = <?= number_format($totalb); ?></b></td>
		</tr>
		<tr>
			<td colspan="7" class="text-right bg-success" style="color: green;"><b>TOTAL PENDAPATAN BERSIH = <?= number_format($total-$totalb); ?></b></td>
		</tr>
	</table>

</body>
</html>