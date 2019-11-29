<?php
session_start();
include 'includes/config.php';
require 'includes/header_content.php';

if (isset($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];
    $query = mysqli_query ($con, "SELECT * FROM user  WHERE ID_USER = '$id_user'");
    // var_dump($query);
    $result = mysqli_fetch_assoc($query);
    $nama_user = $result['NAMA_USER'];
    $email_user = $result['EMAIL_USER'];
    $no_hp = $result['NO_HP_USER'];
    $alamat = $result['ALAMAT_USER'];
    $profil = $result['FOTO_IDENTITAS'];
    $username = $result['USERNAME_USER'];
    $active = $result["STATUS_USER"];
}

?>

<div class="container my-4">
    <div class="title text-center">
    <h2>Ubah Data User</h2>
    </div>
    <div class="row justify-content-center">
    <div class="col-6">
    <form action="ubah_profile_query.php" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="id_user" id="id_user" value="<?=$id_user?>">
        <div class="form-group">
            <label for="inputAddress">Foto Data Diri</label><br>
            <input type="file" name="foto_diri" id="foto_diri" accept=".jpg, .png, .jpeg">
        </div>
        <div class="form-row mt-4">
            <div class="form-group col-md-6">
                <label for="inputName">Nama Lengkap</label>
                <input type="text" name="nama_user" class="form-control" id="inputName" placeholder="Nama Lengkap" value="<?= $nama_user?>" required pattern="^[A-Za-z -.]+$" title="Mohon masukkan hanya huruf">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email_user" class="form-control" id="inputEmail4" placeholder="xxxx@email.com" value="<?= $email_user?>" required title="Mohon masukkan Email Valid">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Nomor HP</label>
            <input type="text" name="no_hp" class="form-control" id="inputAddress" placeholder="+68" value="<?= $no_hp?>" required pattern="[0-9]{9,13}" title="Mohon masukkan hanya angka, 9 - 13 digit">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Alamat</label>
            <textarea name="alamat" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required minlength=20 title="Mohon masukkan lebih dari 20 character"><?= $alamat?></textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Username</label>
                <input type="text" name="username" class="form-control" id="inputCity" value="<?=$username?>" required pattern="^(?=.*[@])[A-Za-z0-9 @_.]+$" title="Username Format: huruf, angka, ._ dan harus menyertakan @">
            </div>
        </div> 
        <div class="form-group">
            <span class="badge badge-<?php if($active == 1 ){echo "success";}else{echo "danger";}?> p-2"><?php if($active == 1 ){echo "Active";}else{echo "Not Active";}?></span>
        </div>
        <div class="text-right">
        <input type="submit" value="Simpan" name="edit_profil_user" class="btn btn-primary w-25">
        </div>
        </form>
    </div>
    </div>
    </div>




<?php
require 'includes/footer.php';
?>