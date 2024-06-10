<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>tanggal</th>
			<th>Total Produksi</th>
		</tr>
		<?php 
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan Produksi.xls");
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
				<td><?= $row['nama_produk']; ?></td>
				<td><?= $row['tanggal']; ?></td>
				<td><?= $row['qty']; ?></td>
			</tr>
			<?php 
			$total += $row['qty'];
			$no++;
		}
		?>
		<tr>
			<td colspan="4" class="text-right"><b>Total Jumlah Produksi = <?= $total; ?></b></td>
		</tr>
	</table>

</body>
</html>