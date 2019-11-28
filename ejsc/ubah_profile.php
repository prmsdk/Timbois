<?php
session_start();
include 'includes/config.php';
require 'includes/header_content.php';

if(isset($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];
    $result_user = mysqli_query($con, "SELECT * FROM user WHERE ID_USER='$id_user'");
    $data_user = mysqli_fetch_assoc($result_user);
    $nama_user = $data_user['NAMA_USER'];
    $email_user = $data_user['EMAIL_USER'];
}

?>

<div class="container my-4">
    <div class="title text-center">
    <h2>Ubah Data Mitra</h2>
    </div>
    <div class="row justify-content-center">
    <div class="col-6">
        <form class="font-m-light" action="query/master_admin_query.php" method="post">
            <input type="hidden" name="id_mitra" id="id" value="<?=$id_user?>">
            <div class="form-group">
            <label for="nama-mitra" class="font-m-med">Nama</label>
            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" aria-describedby="usernameHelp" placeholder="Masukkan Nama" value="<?=$nama_user?>" required>
            </div>
            <div class="form-group">
            <label for="email-mitra" class="font-m-med">Email</label>
            <input type="text" class="form-control" id="email_mitra" name="email_mitra" aria-describedby="usernameHelp" placeholder="Masukkan Email" value="<?=$email_user?>" required>
            </div>
            <div class="form-group">
            <label for="no-hp-mitra" class="font-m-med">Nomor HP</label>
            <input type="text" class="form-control" id="no_hp_mitra" name="no_hp_mitra" aria-describedby="usernameHelp" placeholder="08xx" value="<?=$no_hp_user?>" required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
            <label for="alamat-mitra" class="font-m-med">Alamat</label>
            <textarea name="alamat_mitra" id="alamat_mitra" class="form-control" placeholder="Alamat..." required><?=$alamat_user?></textarea>
            </div>
            <div class="form-group">
            <label for="cover" class="font-m-med">Cover</label>
            <input type="file"  id="cover" name="cover" value="<?=$cover?>">
            </div>
            <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" id="status_radio1" name="status_mitra" value="1" <?php if($status_mitra==1){echo "checked";}?>>
                <label class="form-check-label" for="status_radio1">
                Super mitra
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="status_radio2" name="status_mitra" value="2" <?php if($status_mitra==2){echo "checked";}?>>
                <label class="form-check-label" for="status_radio2">
                mitra
                </label>
            </div>
            <div class="form-group">
            <label for="saldo-mitra" class="font-m-med">Saldo</label>
            <input type="text" class="form-control" id="saldo_mitra" name="saldo_mitra" aria-describedby="usernameHelp" placeholder="Masukkan Username" value="<?=$saldo_mitra?>" required>
            </div>
            <div class="form-group">
            <label for="username-mitra" class="font-m-med">Username</label>
            <input type="text" class="form-control" id="username_mitra" name="username_mitra" aria-describedby="usernameHelp" placeholder="Masukkan Username" value="<?=$username_mitra?>" required>
            </div>
        </div>
        <div class="text-left">
            <input type="submit" class="btn btn-primary" name="edit_mitra" value="Simpan">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </form>
    </div>
    </div>




<?php
require 'includes/footer.php';
?>