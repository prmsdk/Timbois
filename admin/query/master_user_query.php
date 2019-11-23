<?php
include '../includes/config.php';
if(isset($_GET['id_user'])){
  $id_user = $_GET['id_user'];
  
  if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
      $result = mysqli_query($con, "DELETE FROM user WHERE ID_USER='$id_user'");
      header("location:../master_user.php");
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
    NAMA_USER = '$nama_user',
    EMAIL_USER = '$email_user',
    NO_HP_USER = '$no_hp_user',
    ALAMAT_USER = '$alamat_user',
    USERNAME_USER = '$username_user',
    STATUS_USER = '$status_user' WHERE
    ID_USER = '$id_user'
  ");

  header("location:../master_user.php");
}

if(isset($_POST['tambah_user'])){
  $nama_user = $_POST['nama_user'];
  $email_user = $_POST['email_user'];
  $no_hp_user = $_POST['no_hp_user'];
  $alamat_user = $_POST['alamat_user'];
  $username_user = '@'.$_POST['username_user'];
  $password = $_POST['password_user'];
  $status_user = $_POST['status_user'];
  
  $data = mysqli_query($con, "SELECT ID_USER from user ORDER BY ID_USER DESC LIMIT 1");
    while($user_data = mysqli_fetch_array($data))
    {
        $usr_id = $user_data['ID_USER'];
    }

    $row = mysqli_num_rows($data);
    if($row>0){
      $id_user = autonumber($usr_id, 3, 7);
    }else{
      $id_user = 'USR0000001';
    }

    $password_user = md5($password);

    $result = mysqli_query($con, "INSERT INTO 
    user(ID_USER, NAMA_USER, EMAIL_USER, NO_HP_USER, ALAMAT_USER, USERNAME_USER, PASSWORD_USER, STATUS_USER)
    VALUES('$id_user', '$nama_user', '$email_user', '$no_hp_user', '$alamat_user', '$username_user', '$password_user', '$status_user')
    ");

    header("location:../master_user.php");
}