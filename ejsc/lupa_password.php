<?php
  require 'includes/header_content.php';
  include 'includes/config.php';
?>

<div class="container container-fluid-lg p-5" style="height: 70vh;">
  <div class="row justify-content-center regis-success mt-5">
    <div class="col-lg-7 my-5 text-center my-auto">
      <h3>Lupa Password anda? Jangan Khawatir. </h3>
      <p class="mb-3">Masukkan email atau username Anda yang telah terdaftar. <br> Kode untuk mengatur ulang password anda akan dikirim melalui email.</p>
      <form action="kirim_email.php" method="post">
        <input type="text" class="form-control w-75 mx-auto mb-2" name="email_user" id="email_user" required placeholder="Masukkan email atau username Anda">
        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Kirim Kode">
      </form>
    </div>
  </div>
</div>

<?php
  require 'includes/footer.php';
?>