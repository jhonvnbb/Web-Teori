<?php 
include 'header.php';

if (isset($_POST['update'])) {
    $kode_customer = $_POST['kode_customer'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    $updateQuery = "UPDATE customer SET nama='$nama', email='$email', telp='$telp' WHERE kode_customer='$kode_customer'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo "
        <script>
        alert('DATA BERHASIL DIUPDATE');
        window.location = 'm_customer.php';
        </script>
        ";
    }
}

if (isset($_GET['page']) && $_GET['page'] == 'del') {
    $kode = $_GET['kode'];
    $result = mysqli_query($conn, "DELETE FROM customer WHERE kode_customer = '$kode'");

    if ($result) {
        echo "
        <script>
        alert('DATA BERHASIL DIHAPUS');
        window.location = 'm_customer.php';
        </script>
        ";
    }
}

?>

<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid gray"><b>Data Customer</b></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Customer</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">No Telp</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $result = mysqli_query($conn, "SELECT * FROM customer ORDER BY kode_customer ASC");
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?= $row['kode_customer']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['telp']; ?></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" 
                                data-kode_customer="<?= $row['kode_customer']; ?>" 
                                data-nama="<?= $row['nama']; ?>" 
                                data-email="<?= $row['email']; ?>"
                                data-telp="<?= $row['telp']; ?>">
                            <i class="glyphicon glyphicon-edit"></i>
                        </button>
                        <a href="m_customer.php?kode=<?php echo $row['kode_customer']; ?>&page=del" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php 
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editModalLabel">Edit Customer</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="kode_customer" id="kode_customer">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="text" class="form-control" name="telp" id="telp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var kode_customer = button.data('kode_customer');
    var nama = button.data('nama');
    var email = button.data('email');
    var telp = button.data('telp');

    var modal = $(this);
    modal.find('.modal-title').text('Edit Customer ' + nama);
    modal.find('#kode_customer').val(kode_customer);
    modal.find('#nama').val(nama);
    modal.find('#email').val(email);
    modal.find('#telp').val(telp);
});
</script>

<br>
<br>
<br>
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