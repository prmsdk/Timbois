<?php

    session_start();

    include 'includes/config.php';

    $username = $_POST['username-user'];
    $password = md5($_POST['password-user']);
    var_dump($username);

    $data = mysqli_query($con, "select * from user where USERNAME_USER='$username' and PASSWORD_USER='$password'");
    $data_user = mysqli_fetch_assoc($data);
    $id_user = $data_user['ID_USER'];

    $row = mysqli_num_rows($data);

    if($row > 0){
        $_SESSION['username'] = $username;
        $_SESSION['id_user'] = $id_user;
        $_SESSION['status'] = 'login';
        header("location:index.php?pesan=loginberhasil");
    }else{
        header("location:index.php?pesan=gagal");
    }