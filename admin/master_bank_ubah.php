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

  if(isset($_GET['id_bank'])){
    $id_bank = $_GET['id_bank'];

    $data = mysqli_query($con, "SELECT * FROM bank WHERE ID_BANK='$id_bank'");
    $data_bank = mysqli_fetch_assoc($data); 

    $id_mitra = $data_bank['ID_MITRA'];
    $nama_bank = $data_bank['NAMA_BANK'];
    $nomer_rekening = $data_bank['NOMER_REKENING'];
}
?>
  <div class="container my-4" style="height: 75vh"> 
    <div class="title text-center">
    <h2>Ubah Data Bank</h2>
    </div>
    <div class="row justify-content-center">
    <div class="col-6">
      <form class="font-m-light" action="query/master_bank_query.php" method="post">
        <input type="hidden" name="id_bank" id="id" value="<?=$id_bank?>">
        <div class="form-group">
          <label for="nama-bank" class="font-m-med">Nama Bank</label>
          <input type="text" class="form-control" id="nama_bank" name="nama_bank" aria-describedby="usernameHelp" placeholder="08xx" value="<?=$nama_bank?>" required>
        </div>
        <div class="form-group">
          <label for="nomer-rekening" class="font-m-med">Nomer Rekening</label>
          <input type="text" class="form-control" id="nomer_rekening" name="nomer_rekening" aria-describedby="usernameHelp" placeholder="(0331) xxx" value="<?=$nomer_rekening?>" required>
        </div>
      <div class="text-left">
        <input type="submit" class="btn btn-primary" name="edit_bank" value="Simpan">
        <a href="master_bank.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
      </div>
    </div>
    </form>
  </div>
  </div>

<?php
require 'includes/footer.php';
?>