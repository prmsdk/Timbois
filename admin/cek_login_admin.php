<?php

    session_start();

    include 'includes/config.php';

    $username = $_POST['username-admin'];
    $password = md5($_POST['password-admin']);

    $data = mysqli_query($con, "select * from mitra where USERNAME_MITRA='$username' and PASSWORD_MITRA='$password'");
    $data_admin = mysqli_fetch_assoc($data);
    $status_admin = $data_admin['STATUS_MITRA'];
    $id_admin = $data_admin['ID_MITRA'];
    $row = mysqli_num_rows($data);

    if($row > 0){
        $_SESSION['username'] = $username;
        $_SESSION['admin_login'] = 'login';
        $_SESSION['admin_status'] = $status_admin;
        $_SESSION['id_mitra'] = $id_admin;
        header("location:index.php?pesan=loginberhasil");
    }else{
        header("location:index.php?pesan=gagal");
    }

?>