<?php
  require 'includes/header_content.php';
  include 'includes/config.php';
?>

<div class="container container-fluid-lg p-5">
  <div class="row justify-content-center regis-success mt-3">
    <div class="col-lg-7 my-5 text-center my-auto">
      <h3>Reset Password Anda. </h3>
      <p class="mb-3 w-75 mx-auto">Masukkan password baru anda. Dimohon password baru tidak sama dengan password sebelumnya.</p>
      <form action="" method="post">
        <input type="password" class="form-control mx-auto w-75" id="password_user" name="password_user" placeholder="Password Baru" aria-describedby="passwordHelp" required>
        <p class="text-left w-75 mx-auto"><small id="passwordHelp" class="text-muted">
          Masukkan password harus 8 - 32 karakter.
        </small></p>
        <input type="password" class="form-control mx-auto w-75" id="repassword_user" name="repassword_user" placeholder="Password" aria-describedby="passwordHelp" required>
        <p class="text-left w-75 mx-auto"><small id="passwordHelp" class="text-muted">
          Masukkan password yang sama persis untuk kebutuhan validasi.
          </small></p>
        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Ubah Password">
      </form>
    </div>
  </div>
</div>

<?php
  if(isset($_POST['submit'])){
    $password_user = $_POST['password_user'];
    $repassword_user = $_POST['repassword_user'];

    if(isset($_GET['email']) AND isset($_GET['hash'])){
      // Verify data
      $email_user = $_GET['email']; // Set email variable
      $hash = $_GET['hash']; // Set hash variable
                  
      $search = mysqli_query($con, "SELECT EMAIL_USER, PASSWORD_USER FROM user WHERE EMAIL_USER='$email_user' AND PASSWORD_USER='$hash'"); 
      $match = mysqli_num_rows($search);
      $user_data = mysqli_fetch_array($search);

      $password_lama = $user_data['PASSWORD_USER'];

      $password_baru = md5($password_user);

      if($password_lama!=$password_baru){
        if($match > 0 AND $password_user == $repassword_user){
          $password_user = md5($repassword_user);
          // We have a match, activate the account
          mysqli_query($con, "UPDATE user SET PASSWORD_USER='$password_user' WHERE EMAIL_USER ='$email_user'");
          header("location:index.php?pesan=successrepassword");
        }else{
          // No match -> invalid url or account has already been activated.
          $msg = 'Mohon masukkan kedua password yang sama persis';
          $status = 'danger';
        }
      }else{
        $msg = 'Mohon masukkan password yang berbeda dengan password anda sebelumnya!';
        $status = 'danger';
      }       
    }else{
      // Invalid approach
      $msg = 'Link yang anda tuju tidak Valid, coba periksa kembali email anda.';
      $status = 'danger';
    }

    echo '
    <div id="alert-login" class="text-center alert alert-'.$status.' alert-dismissible fade show position-fixed alert-login mx-auto" role="alert">
    '.$msg.' 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
    ';
  }
  
  require 'includes/footer.php';
?>