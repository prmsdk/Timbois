<?php
session_start();
if($_SESSION['admin_status']==2){
  header("location:index.php");
}

$_SESSION['active_link'] = 'master';

include 'includes/config.php';
include 'includes/header.php';

if(!isset($_SESSION['admin_login'])){
  header_remove();
  header("location:index.php");
}

  if(isset($_GET['id_jadwal'])){
    $id_jadwal = $_GET['id_jadwal'];

    $data = mysqli_query($con, "SELECT * FROM jadwal_mitra WHERE ID_JADWAL='$id_jadwal'");
    $data_jadwal = mysqli_fetch_assoc($data); 

    $id_mitra = $data_jadwal['ID_MITRA'];
    $jadwal_buka = $data_jadwal['JADWAL_BUKA'];
}
?>
  <div class="container my-4" style="height: 75vh"> 
    <div class="title text-center">
    <h2>Ubah Data jadwal</h2>
    </div>
    <div class="form-group">
        <div class="col-8">
        <form class="font-m-light" action="query/master_jadwal_query.php" method="post">
        <input type="hidden" name="id_jadwal" id="id" value="<?=$id_jadwal?>">
        </div>
    </div>
    <div class="row justify-content-center">
      <div class="form-group col-8">
        <label for="id_mitra" class="font-m-med">Pilih Mitra</label>
        <select name="id_mitra" class="custom-select">
          <option selected>Pilih Mitra</option>
          <?php
          $result_mitra = mysqli_query($con, "SELECT * FROM mitra");
          while($data_mitra = mysqli_fetch_assoc ($result_mitra)){
          $id_mitra = $data_mitra['ID_MITRA'];
          $nama_mitra = $data_mitra['NAMA_MITRA'];
          ?>
          <option value="<?= $id_mitra?>"><?= $nama_mitra?></option>
          <?php }?>
        </select>
      </div>
      <div class="form-group col-8">
          <for="nama-jadwal" class="">Jadwal Buka><br>
          <input type="text" class="form-control" id="jadwal_buka" name="jadwal_buka" aria-describedby="usernameHelp" placeholder="Masukkan Jadwal" value="<?=$jadwal_buka?>" required>
      </div>
      </div>
      <div class="row justify-content-center">
      <div class="form-group ">
        <input type="submit" class="btn btn-primary" name="edit_jadwal" value="Simpan">
        <a href="master_jadwal.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
      </div>
      </div>
      </form>
    </div>
  
  </div>

<?php
require 'includes/footer.php';
?>