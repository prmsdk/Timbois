<?php
session_start();

$_SESSION['active_link'] = 'master';

include 'includes/config.php';
include 'includes/header.php';
if(!isset($_SESSION['admin_login'])){
  header("location:index.php");
}

if(isset($_GET['id_warna'])){
  $id_warna = $_GET['id_warna'];

  $data = mysqli_query($con, "SELECT * FROM warna WHERE ID_WARNA = '$id_warna'");
  $data_warna = mysqli_fetch_assoc($data);
  $kat_warna = $data_warna['KAT_WARNA']; 
  $harga_warna = $data_warna['HARGA_WARNA'];
  $status_warna = $data_warna['STATUS_WARNA'];
}
?>

<div class="container my-4">
    <div class="title text-center">
    <h2>Ubah Data Warna</h2>
    </div>
    <div class="row justify-content-center">
    <div class="col-6">
      <form class="font-m-light col-11 mt-3" action="query/master_warna_query.php" method="post">
        <input type="hidden" name="id_warna" id="id" value="<?=$id_warna?>">
        <div class="form-group">
          <label for="kat_warna" class="font-m-med">Kategori Warna</label>
          <input type="text" class="form-control" id="kat_warna" name="kat_warna" value="<?=$kat_warna?>" placeholder="Masukkan Kategori Warna" required>
        </div>
        <div class="form-group">
          <label for="harga_warna" class="font-m-med">Harga Warna</label>
          <input type="number" name="harga_warna" id="harga_warna" class="form-control" placeholder="Masukkan Harga Warna . ." value="<?=$harga_warna?>" required>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" id="status_radio1" name="status_warna" value="1" <?php if($status_warna==1){echo "checked";}?>>
            <label class="form-check-label" for="status_radio1">
              Tersedia
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="status_radio2" name="status_warna" value="0" <?php if($status_warna==0){echo "checked";}?>>
            <label class="form-check-label" for="status_radio2">
              Tidak Tersedia
            </label>
          </div>
        </div>
        <div class="modal-footer text-center">
          <input type="submit" class="btn btn-primary" name="edit_warna" value="Simpan">
          <a href="master_warna.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
        </div>
    </form>
    </div>
  </div>
  </div>

<?php
require 'includes/footer.php';
?>