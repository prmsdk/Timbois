<?php
  session_start();
  if(isset($_SESSION['status'])){
    if($_SESSION['status']='login'){
      header("location:index.php");
    }
  } 
  require 'includes/header_content.php';

  
  
?>
<?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=='registergagal'){
            echo '<div id="alert-login" class="text-center alert alert-danger alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                    Anda <strong>Gagal!</strong> Mendaftar, silahkan lengkapi data dengan benar! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }else if($_GET['pesan']=='passwordtidakcocok'){
          echo '<div id="alert-login" class="text-center alert alert-danger alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                  Password yang anda masukkan <strong>Tidak Cocok!</strong> silahkan validasi password anda.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }
    }
?>
<div class="container container-fluid-lg">

<div class="bg-daftar py-5">
  <div class="container container-fluid-md font-m-semi font-m-light">
    <div class="row justify-content-center">
      <div class="col-6-lg">
        <div class="card p-4 shadow">
        
          <div class="judul text-center font-m-semi">
            <h2 class="bg-form-daftar" >DAFTAR AKUN</h2>
          </div>
          <?php 
              error_reporting(0);
              if(isset($msg)){  // memeriksa apakah $msg kosong
                echo '<div id="alert-login" class="alert alert-'.$stt.' alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
                        '.$msg.' 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>'; //menampilkan $msg
              } 
          ?>
          <div class="row">
            <div class="col-lg-6">
              <form class="pt-3" method="post" action="register_query.php">
                <div class="form-group">
                  <label for="nama_user" class="font-m-semi">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Masukkan Nama Lengkap Anda" required>
                </div>
                <div class="form-group">
                  <label for="email_user" class="font-m-semi">Alamat Email</label>
                  <input type="email" class="form-control" id="email_user" name="email_user" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email Anda" required>
                  <small id="emailHelp" class="form-text text-muted">Kita tidak akan menyebarkan email anda kemanapun.</small>
                </div>
                <div class="form-group">
                  <label for="no_hp" class="font-m-semi">Nomor Telepon</label>
                  <input type="text" class="form-control" id="no_hp_user" name="no_hp_user" placeholder="Masukkan Nomor Telepon Anda" required>
                </div>
                <div class="form-group">
                  <label for="alamat" class="font-m-semi">Alamat</label>
                  <textarea class="form-control" id="alamat_user" name="alamat_user" placeholder="Masukkan Nomor Telepon Anda" required></textarea>
                </div>
            </div>
            <div class="col-lg-6">
              <div class="pt-3"></div>
              <div class="form-group">
                <label for="username_user" class="font-m-semi">Username</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input type="text" class="form-control" id="username_user" name="username_user" placeholder="Isikan Username Anda" required>
                </div>
              </div>
              <div class="form-group">
                <label for="password_user" class="font-m-semi">Password</label>
                <input type="password" class="form-control" id="password_user" name="password_user" placeholder="Password" aria-describedby="passwordHelp" required>
                <small id="passwordHelp" class="text-muted">
                  Masukkan password harus 8 - 32 karakter.
                </small>
              </div>
              <div class="form-group">
                <label for="repassword_user" class="font-m-semi">Re-Type Password</label>
                <input type="password" class="form-control" id="repassword_user" name="repassword_user" placeholder="Password" aria-describedby="passwordHelp" required>
                <small id="passwordHelp" class="text-muted">
                  Masukkan password yang sama persis untuk kebutuhan validasi.
                </small>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="syaratketentuan" required>
                <label class="form-check-label" for="exampleCheck1">Saya setuju dengan <a href="#">Kebijakan & Privasi</a> yang telah ditentukan.</label>
              </div>
              <div class="text-center">
                <input type="submit" name="submit_daftar" class="btn btn-primary" value="DAFTAR">
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>


</div>

<?php
  require 'includes/footer.php';
?>