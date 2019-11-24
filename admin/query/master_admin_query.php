<?php
include '../includes/config.php';
if(isset($_GET['id_mitra'])){
  $id_mitra = $_GET['id_mitra'];
  $data = mysqli_query($con, "SELECT * FROM mitra WHERE ID_MITRA='$id_mitra'");
  $data_mitra_delete = mysqli_fetch_array($data);
  $nama_mitra_delete = $data_mitra_delete['ID_MITRA']; 
  
  if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
      $result = mysqli_query($con, "DELETE FROM mitra WHERE ID_MITRA='$id_mitra'");
      header("location:../master_admin.php");
    }
  }
}

if(isset($_POST['edit_mitra'])){
  $id_mitra = $_POST['id_mitra'];
  $nama_mitra = $_POST['nama_mitra'];
  $email_mitra = $_POST['email_mitra'];
  $no_hp_mitra = $_POST['no_hp_mitra'];
  $telephone_mitra = $_POST['telephone_mitra'];
  $alamat_mitra = $_POST['alamat_mitra'];
  $foto_profile = $_POST['foto_profile'];
  $cover = $_POST['cover'];
  $status_mitra = $_POST['status_mitra'];
  $saldo_mitra = $_POST['saldo_mitra'];
  $username_mitra = $_POST['username_mitra'];
  $password_mitra = $_POST['password_mitra'];
  

  $result = mysqli_query($con, "UPDATE mitra SET 
    NAMA_MITRA = '$nama_mitra',
    EMAIL_MITRA = '$email_mitra',
    NO_HP_MITRA = '$no_hp_mitra',
    TELEPHONE_MITRA = '$telephone_mitra',
    ALAMAT_MITRA = '$alamat_mitra',
    FOTO_PROFILE = '$foto_profile',
    COVER = '$cover',
    STATUS_MITRA = '$status_mitra'.
    SALDO_MITRA = '$saldo_mitra',
    USERNAME_MITRA = '$username_mitra',
    PASSWORD_MITRA = '$password_mitra',
    WHERE
    ID_MITRA = '$id_mitra'
  ");

  header("location:../master_admin.php");
}

if(isset($_POST['tambah_mitra'])){
  $id_mitra = $_POST['id_mitra'];
  $nama_mitra = $_POST['nama_mitra'];
  $email_mitra = $_POST['email_mitra'];
  $no_hp_mitra = $_POST['no_hp_mitra'];
  $telephone_mitra = $_POST['telephone_mitra'];
  $alamat_mitra = $_POST['alamat_mitra'];
  $foto_profile = $_post['foto_profile'];
  $cover = $_POST['cover'];
  $status_mitra = $_POST['status_mitra'];
  $saldo_mitra = $_POST['saldo_mitra'];
  $username_mitra = $_POST['username_mitra'];
  $password_mitra = $_POST['password_mitra'];
  
  $data = mysqli_query($con, "select ID_MITRA from mitra ORDER BY ID_MITRA DESC LIMIT 1");
    while($mitra_data = mysqli_fetch_array($data))
    {
        $id_mtr = $mitra_data['ID_MITRA'];
    }

    $row = mysqli_num_rows($data);
    if($row>0){
      $id_mitra = autonumber($id_mtr, 3, 7);
    }else{
      $id_mitra = 'MTR0000001';
    }

    $password_mitra = md5($password);

    $result = mysqli_query($con, "INSERT INTO 
    mitra(ID_MITRA, NAMA_MITRA, EMAIL_MITRA, NO_HP_MITRA, TELEPHONE_MITRA, ALAMAT_MITRA, FOTO_PROFILE, COVER, STATUS_MITRA, SALDO_MITRA, USERNAME_MITRA, PASSWORD_MITRA)
    VALUES('$id_mitra', '$nama_mitra', '$email_mitra', '$no_hp_mitra', '$telephone_mitra', '$alamat_mitra', '$foto_profile', '$cover', '$status_mitra', '$saldo_mitra', '$username_mitra', '$password_mitra')
    ");

    header("location:../master_admin.php");
  }