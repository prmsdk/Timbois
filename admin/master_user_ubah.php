<?php
session_start();
if($_SESSION['admin_status']==2){
  header("location:index.php");
}

$_SESSION['active_link'] = 'master';

include 'includes/config.php';
include 'includes/header.php';
if(!isset($_SESSION['admin_login'])){
  header("location:index.php");
}

if(isset($_GET['id_user'])){
  $id_user = $_GET['id_user'];

  $data = mysqli_query($con, "SELECT * FROM user WHERE ID_USER='$id_user'");
  $data_user = mysqli_fetch_assoc($data);
  $nama_user = $data_user['NAMA_USER']; 
  $email_user = $data_user['EMAIL_USER'];
  $no_hp = $data_user['NO_HP_USER'];
  $alamat_user = $data_user['ALAMAT_USER'];
  $username_user = $data_user['USERNAME_USER'];
  $status_user = $data_user['STATUS_USER'];
  $saldo_user = $data_user['SALDO_USER'];
}
?>
  <div class="container my-4">
    <div class="title text-center">
    <h2>Ubah Data user</h2>
    </div>
    <div class="row justify-content-center">
    <div class="col-6">
      <form class="font-m-light" action="query/master_user_query.php" method="post">
        <input type="hidden" name="id_user" id="id" value="<?=$id_user?>">
        <div class="form-group">
          <label for="nama-user" class="font-m-med">Nama</label>
          <input type="text" class="form-control" id="nama_user" name="nama_user" aria-describedby="usernameHelp" placeholder="Masukkan Nama" value="<?=$nama_user?>" required>
        </div>
        <div class="form-group">
          <label for="email-user" class="font-m-med">Email</label>
          <input type="text" class="form-control" id="email_user" name="email_user" aria-describedby="usernameHelp" placeholder="Masukkan Email" value="<?=$email_user?>" required>
        </div>
        <div class="form-group">
          <label for="no-hp-user" class="font-m-med">Nomor Handphone</label>
          <input type="text" class="form-control" id="no_hp_user" name="no_hp_user" aria-describedby="usernameHelp" placeholder="08xx" value="<?=$no_hp?>" required>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="alamat-user" class="font-m-med">Alamat</label>
          <textarea name="alamat_user" id="alamat_user" class="form-control" placeholder="Alamat..."><?=$alamat_user?></textarea>
        </div>
        <div class="form-group">
          <label for="username-user" class="font-m-med">Username</label>
          <input type="text" class="form-control" id="username_user" name="username_user" aria-describedby="usernameHelp" placeholder="Masukkan Username" value="<?=$username_user?>" required>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" id="status_radio1" name="status_user" value="1" <?php if($status_user==1){echo "checked";}?>>
            <label class="form-check-label" for="status_radio1">
              Aktif
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="status_radio2" name="status_user" value="0" <?php if($status_user==0){echo "checked";}?>>
            <label class="form-check-label" for="status_radio2">
              Tidak Aktif
            </label>
          </div>
        
      </div>
      <div class="text-left">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Simpan">
        <a href="master_user.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
      </div>
    </div>
    </form>
  </div>
  </div>

<?php
require 'includes/footer.php';
?>