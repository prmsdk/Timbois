<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agency - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.css" rel="stylesheet">

</head>

<body id="page-top">
  <div>

  

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/logonav.png"/></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto ">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Cara Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <?php
              session_start();
              error_reporting(0);
              if($_SESSION['status']=='login'){
                ?><li class="nav-item">
                  <div class="dropdown notif-custom">
                    <a class="nav-item nav-link icon-custom" style="color:#F69322;" href="notifikasi.php"><i class="fa fa-bell fa-1x"></i></a>
                  </div>
                  </li>
                  <!-- BATAS BELL -->
                  <li class="nav-item">
                  <div class="dropdown notif-custom">
                    <a class="nav-item nav-link icon-custom" style="color:#25A8E0;" href="keranjang.php"><i class="fa fa-shopping-cart fa-1x"></i></a>
                  </li>
                  <li class="nav-item">
                  <div class="dropdown">
                    <button class="pt-2 btn dropdown-toggle" type="button" id="menu-profile" data-toggle="dropdown">
                    <img class="mt-1 rounded-circle img-circle" src="http://placehold.it/25x25">
                      <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right text-right">
                      <a class="dropdown-item" href="#">Setting Profile</a>
                      <a class="dropdown-item" href="#">Bantuan</a>
                      <a class="dropdown-item" href="#">Keamanan</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                  </div>
                  </li><?php
              }else if($_SESSION['status']!='login'){
                  // header("location:../index.php?=belum login");
                  echo 
                  '<li class="nav-item">
                    <a class="nav-link btn js-scroll-trigger ml-2" data-target="#login_user" data-toggle="modal">MASUK</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link btn js-scroll-trigger ml-2" href="register_user.php">DAFTAR</a>
                  </li>';
              }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=='gagal'){
                echo '<div id="alert-login" class="text-center alert alert-danger alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                        Login anda <strong>Gagal!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            }else if($_GET['pesan']=='logout'){
              echo '<div id="alert-login" class="text-center alert alert-success alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                      Anda <strong>Berhasil!</strong> melakukan logout!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
            }else if($_GET['pesan']=='loginberhasil'){
                $_SESSION['status']='login';
                echo '<div id="alert-login" class="text-center alert alert-success alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                        Login <strong>Berhasil!</strong> semoga harimu menyenangkan!.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            }else if($_GET['pesan']=='registersuccess'){
                echo '<div id="alert-login" class="text-center alert alert-success alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                        Anda <strong>Berhasil!</strong> mendaftar, silahkan Login!.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            }else if($_GET['pesan']=='successrepassword'){
              echo '<div id="alert-login" class="text-center alert alert-success alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                      Anda <strong>Berhasil!</strong> mengganti password baru, silahkan Login!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
            }
        }
    ?>
