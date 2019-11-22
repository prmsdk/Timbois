<?php

  // MEMVALIDASI DATA MASUKAN
  session_start();

  include 'includes/config.php';

    $nama_user = $_POST['nama_user'];
    $email_user = $_POST['email_user'];
    $no_hp_user = $_POST['no_hp_user'];
    $alamat_user = $_POST['alamat_user'];
    $usename_user = '@'.$_POST['username_user'];
    $password_user = $_POST['password_user'];
    $repassword_user = $_POST['repassword_user'];
    
    $data = mysqli_query($con, "select ID_USER from user ORDER BY ID_USER DESC LIMIT 1");
    while($user_data = mysqli_fetch_array($data))
    {
        $usr_id = $user_data['ID_USER'];
    }

    $row = mysqli_num_rows($data);
    if($row>0){
      $id_user = autonumber($usr_id, 3, 6);
    }else{
      $id_user = 'USR000001';
    }
    
    // VALIDASI RE-TYPE PASSWORD

    if($password_user == $repassword_user){
      $password_user = md5($repassword_user);

      $result = mysqli_query($con, "INSERT INTO 
      user(ID_USER, NAMA_USER, EMAIL_USER, NO_HP_USER, ALAMAT_USER, USERNAME_USER, PASSWORD_USER) 
      VALUES('$id_user','$nama_user','$email_user','$no_hp_user','$alamat_user','$usename_user','$password_user')");
      
      $_SESSION['id_user'] = $id_user;

      if($result){
        header("location:index.php?pesan=registersuccess");
      }else{
        header("location:register_user.php?pesan=registergagal");
      }

    }else{
      header("location:register_user.php?pesan=passwordtidakcocok");
    }


    // QUERY INSERT PENDAFTARAN

    

