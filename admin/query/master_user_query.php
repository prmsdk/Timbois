<?php
include '../includes/config.php';
if(isset($_GET['id_user'])){
  $id_user = $_GET['id_user'];
  $data = mysqli_query($con, "SELECT * FROM user WHERE USER_ID='$id_user'");
  $data_user_delete = mysqli_fetch_array($data);
  $nama_user_delete = $data_user_delete['USER_NAMA_LENGKAP'];
  
  if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
      $result = mysqli_query($con, "DELETE FROM user WHERE USER_ID='$id_user'");
      header("location:../master_user.php?pesan=hapus_done_$nama_user");
    }
  }
}

if(isset($_POST['edit_user'])){
  $id_user = $_POST['id_user'];
  $nama_user = $_POST['nama_user'];
  $email_user = $_POST['email_user'];
  $no_hp_user = $_POST['no_hp_user'];
  $alamat_user = $_POST['alamat_user'];
  $username_user = $_POST['username_user'];
  $status_user = $_POST['status_user'];

  $result = mysqli_query($con, "UPDATE user SET 
    USER_NAMA_LENGKAP = '$nama_user',
    USER_EMAIL = '$email_user',
    USER_NO_HP = '$no_hp_user',
    USER_ALAMAT = '$alamat_user',
    USER_USERNAME = '$username_user',
    USER_ACTIVE = '$status_user' WHERE
    USER_ID = '$id_user'
  ");

  header("location:../master_user.php?pesan=update_done_$id_user");
}

if(isset($_POST['tambah_user'])){
  $nama_user = $_POST['nama_user'];
  $email_user = $_POST['email_user'];
  $no_hp_user = $_POST['no_hp_user'];
  $alamat_user = $_POST['alamat_user'];
  $username_user = '@'.$_POST['username_user'];
  $password = $_POST['password_user'];
  $status_user = $_POST['status_user'];
  
  $data = mysqli_query($con, "select USER_ID from user ORDER BY USER_ID DESC LIMIT 1");
    while($user_data = mysqli_fetch_array($data))
    {
        $USER_id = $user_data['USER_ID'];
    }

    $row = mysqli_num_rows($data);
    if($row>0){
      $id_user = autonumber($USER_id, 3, 6);
    }else{
      $id_user = 'USR000001';
    }

    $password_user = md5($password);

    $result = mysqli_query($con, "INSERT INTO 
    user(USER_ID, USER_NAMA_LENGKAP, USER_EMAIL, USER_NO_HP, USER_ALAMAT, USER_USERNAME, USER_PASSWORD, USER_ACTIVE)
    VALUES('$id_user', '$nama_user', '$email_user', '$no_hp_user', '$alamat_user', '$username_user', '$password_user', '$status_user')
    ");

    header("location:../master_user.php?pesan=Anda berhasil mendaftar!&status=success");
}