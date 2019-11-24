<?php
session_start();

$_SESSION['active_link'] = 'master';

include 'includes/config.php';
include 'includes/header.php';
if (!isset($_SESSION['admin_login'])) {
  header("location:index.php");
}

if (isset($_GET['id_ukuran'])) {
  $id_ukuran = $_GET['id_ukuran'];

  $data = mysqli_query($con, "SELECT * FROM ukuran WHERE ID_UKURAN = '$id_ukuran'");
  $data_ukuran = mysqli_fetch_assoc($data);
  $kat_ukuran = $data_ukuran['KAT_UKURAN'];
  $harga_ukuran = $data_ukuran['HARGA_UKURAN'];
}
?>

<div class="container my-4">
  <div class="title text-center">
    <h2>Ubah Data Ukuran</h2>
  </div>
  <div class="row justify-content-center">
    <div class="col-6">
      <form class="font-m-light col-11 mt-3" action="query/master_ukuran_query.php" method="post">
        <input type="hidden" name="id_ukuran" id="id" value="<?= $id_ukuran ?>">
        <div class="form-group">
          <label for="kat_ukuran" class="font-m-med">Kategori Ukuran</label>
          <input type="text" class="form-control" id="kat_ukuran" name="kat_ukuran" value="<?= $kat_ukuran ?>" placeholder="Masukkan Kategori Ukuran" required>
        </div>
        <div class="form-group">
          <label for="harga_ukuran" class="font-m-med">Harga Ukuran</label>
          <input type="text" class="form-control" id="harga_ukuran" name="harga_ukuran" value="<?= $harga_ukuran ?>" placeholder="Masukkan Harga Ukuran" required>
        </div>
        <div class="modal-footer text-center">
          <input type="submit" class="btn btn-primary" name="edit_ukuran" value="Simpan">
          <a href="master_ukuran.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
require 'includes/footer.php';
?>