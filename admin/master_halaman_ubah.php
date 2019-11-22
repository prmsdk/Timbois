<?php
session_start();

$_SESSION['active_link'] = 'master';

include 'includes/config.php';
include 'includes/header.php';
if(!isset($_SESSION['admin_login'])){
  header_remove();
  header("location:index.php");
}

if(isset($_GET['id_halaman'])){
  $id_halaman = $_GET['id_halaman'];

  $data = mysqli_query($con, "SELECT * FROM halaman WHERE ID_HALAMAN = '$id_halaman'");
  $data_halaman = mysqli_fetch_assoc($data);
  $nama_halaman = $data_halaman['KAT_HALAMAN']; 
}
?>

<div class="container my-4">
    <div class="title text-center">
    <h2>Ubah Data Halaman</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-6">

        <form class="font-m-light col-11 mt-3" action="query/master_halaman_query.php" method="post">
          <input type="hidden" name="id_halaman" id="id" value="<?=$id_halaman?>">
          <div class="form-group">
            <label for="nama_halaman" class="font-m-med">Nama Halaman</label>
            <input type="text" class="form-control" id="nama_halaman" name="nama_halaman" value="<?=$nama_halaman?>" placeholder="Masukkan Nama halaman" required>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="edit_halaman" value="Simpan">
            <a href="master_halaman.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
          </div>
      </form>
    </div>
  </div>
</div>