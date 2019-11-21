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
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
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
                    <a class="nav-item nav-link icon-custom" style="color:#F69322;" type="button" data-toggle="dropdown"><i class="fa fa-bell fa-1x"></i></a>
                    <div class="dropdown-menu dropdown-menu-right p-3 text-center" style="width: 50vw">
                      <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-left">
                          <span><strong>Notifications (3)</strong></span>
                          <a href="#" class="float-right text-dark text-light">Mark all as read</a>
                        </div>
                      </div>
                      <div class="dropdown-divider"></div>
                      <div class="row">
                          <div class="col-lg-2 col-sm-4 text-right">
                            <img src="http://placehold.it/80x80" class="rounded">
                          </div>    
                          <div class="col-lg-10 col-sm-8 text-left justify-content-start">
                            <a href="#"><strong class="text-info">Pesanan Anda Telah Selesai Dikerjakan!</strong></a>
                            <div>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel mollitia ipsam officia enim aspernatur culpa in nulla aliquam minima? Eum accusamus repellendus eius quidem modi libero consequuntur doloribus, corrupti sint?</p>
                            </div>
                            <small class="text-info">27.11.2015, 15:00</small>
                          </div>    
                        </div>
                      <div class="dropdown-divider"></div>
                        <a href="#" class="text-dark ">View All</a>
                      </div>
                  </div>
                  </li>
                  <!-- BATAS BELL -->
                  <li class="nav-item">
                  <div class="dropdown notif-custom">
                    <a class="nav-item nav-link icon-custom" style="color:#25A8E0;" type="button" data-toggle="dropdown"><i class="fa fa-shopping-cart fa-1x"></i></a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right text-center overflow-hidden" style="width: 70vw">
                      <div class="row px-3 py-2" style="background-color:#25A8E0;">
                        <div class="col-lg-12 col-sm-12 col-12 text-left text-light">
                          <span><strong>Keranjang Pesanan (1)</strong></span>
                        </div>
                      </div>
                      <div class="dropdown-divider mt-0"></div>
                      <div class="row px-3">
                        <div class="col-lg-2">
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 text-left">
                              <strong>Detail Produk</strong>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-10">
                          <div class="row">
                            <div class="col-lg-8"></div>
                            <div class="col-lg-2 text-left">
                              <strong>Jumlah</strong>
                            </div>
                            <div class="col-lg-2 text-center">
                              <strong>Hapus</strong>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="dropdown-divider"></div>
                      <div class="row px-3">
                        <div class="col-lg-2">
                          <div class="row">
                            <div class="col-lg-3 ml-auto my-auto">
                              <input type="checkbox" aria-label="Checkbox for following text input">
                            </div>
                            <div class="col-lg-9 col-sm-3 text-center my-auto">
                              <img src="http://placehold.it/80x80" class="rounded">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-10">
                          <div class="row">
                            <div class="col-lg-8 col-sm-5 text-left justify-content-start">
                              <a href="#"><strong class="text-info">Kalender Duduk A5 7 Lembar ART CARTON 250gr</strong></a>
                              <div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                              </div>
                              <strong>Harga : Rp. 16.400</strong>
                            </div>  
                            <div class="col-lg-2 col-sm-2 text-center my-auto">
                              <input type="text" name="quantity" class="form-control input-number text-center" value="1" min="1" max="999999">
                            </div>
                            <div class="col-lg-2 col-sm-2 my-auto">
                              <a href="#" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="dropdown-divider mb-0"></div>
                      <div class="dropdown-divider my-0"></div>
                      <div class="row px-3 py-2">
                        <div class="col-lg-9 col-sm-9 text-right">
                          <strong>Sub Total :</strong>
                        </div>
                        <div class="col-lg-3 text-right">
                          <strong>Rp. 820.000,00</strong>
                        </div>
                      </div>
                      <div class="row bg-light">
                        <div class="col-lg-8 my-auto text-center">
                          <a href="#" class="text-dark">View All</a>
                        </div>
                        <div class="col-lg-4 py-2 text-right">
                          <a href="#" class="btn mr-3 btn-primary"><strong>Check Out</strong></i></a>
                        </div>
                      </div>
                      </div>
                  </div>
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
                    <a class="nav-link btn js-scroll-trigger" data-target="#login_user" data-toggle="modal">MASUK</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">DAFTAR</a>
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
            }
        }
    ?>
