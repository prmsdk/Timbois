<?php
include '../includes/config.php';
if(isset($_GET['id_admin'])){
  $id_admin = $_GET['id_admin'];
  $data = mysqli_query($con, "SELECT * FROM admin WHERE ADM_ID='$id_admin'");
  $data_admin_delete = mysqli_fetch_array($data);
  $nama_admin_delete = $data_admin_delete['ADM_NAMA_USAHA_ADM'];
  
  if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
      $result = mysqli_query($con, "DELETE FROM admin WHERE ADM_ID='$id_admin'");
      header("location:../master_admin.php?pesan=hapus_done_$nama_admin");
    }
  }
}

if(isset($_POST['edit_admin'])){
  $id_admin = $_POST['id_admin'];
  $nama_admin = $_POST['nama_admin'];
  $email_admin = $_POST['email_admin'];
  $no_hp_admin = $_POST['no_hp_admin'];
  $no_telp_admin = $_POST['no_telp_admin'];
  $alamat_admin = $_POST['alamat_admin'];
  $username_admin = $_POST['username_admin'];
  $status_admin = $_POST['status_admin'];

  $result = mysqli_query($con, "UPDATE admin SET 
    ADM_NAMA_USAHA_ADM = '$nama_admin',
    ADM_EMAIL = '$email_admin',
    ADM_NO_TELP = '$no_telp_admin',
    ADM_NO_HP = '$no_hp_admin',
    ADM_ALAMAT = '$alamat_admin',
    ADM_USERNAME = '$username_admin',
    ADM_STATUS = '$status_admin' WHERE
    ADM_ID = '$id_admin'
  ");

  header("location:../master_admin.php?pesan=update_done_$nama_admin");
}

if(isset($_POST['tambah_admin'])){
  $nama_admin = $_POST['nama_admin'];
  $email_admin = $_POST['email_admin'];
  $no_hp_admin = $_POST['no_hp_admin'];
  $no_telp_admin = $_POST['no_telp_admin'];
  $alamat_admin = $_POST['alamat_admin'];
  $username_admin = $_POST['username_admin'];
  $password = $_POST['password_admin'];
  $status_admin = $_POST['status_admin'];
  
  $data = mysqli_query($con, "select ADM_ID from admin ORDER BY ADM_ID DESC LIMIT 1");
    while($admin_data = mysqli_fetch_array($data))
    {
        $adm_id = $admin_data['ADM_ID'];
    }

    $row = mysqli_num_rows($data);
    if($row>0){
      $id_admin = autonumber($adm_id, 3, 6);
    }else{
      $id_admin = 'ADM000001';
    }

    $password_admin = md5($password);

    $result = mysqli_query($con, "INSERT INTO 
    admin(ADM_ID, ADM_NAMA_USAHA_ADM, ADM_EMAIL, ADM_NO_HP, ADM_NO_TELP, ADM_ALAMAT, ADM_USERNAME, ADM_PASSWORD, ADM_STATUS)
    VALUES('$id_admin', '$nama_admin', '$email_admin', '$no_hp_admin', '$no_telp_admin', '$alamat_admin', '$username_admin', '$password_admin', '$status_admin')
    ");

    header("location:../master_admin.php?pesan=Anda berhasil mendaftar!&status=success");
}