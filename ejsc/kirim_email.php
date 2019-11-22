<?php

  include 'includes/config.php';
  session_start();
  if(isset($_POST['email_user'])){
    $email_user = $_POST['email_user'];

    $data = mysqli_query($con, "select * from user where EMAIL_USER='$email_user' OR USERNAME_USER='$email_user'");
    while($user_data = mysqli_fetch_array($data)){
      $nama_user = $user_data['NAMA_USER'];
      $email_user = $user_data['EMAIL_USER'];
      $usename_user = $user_data['USERNAME_USER'];
      $hash = $user_data['PASSWORD_USER'];
    }

    $to      = $email_user; // Send email to our user
    $subject = 'Reset Password'; // Give the email a subject 
    $message = '
    
    Selamat '.$nama_user.'! Akun anda dapat dipulihkan.
    Pesan ini dikirimkan untuk membantu anda mengatur ulang password anda.
    
    Mohon klik tautan dibawah ini untuk melanjutkan proses pengaturan ulang Password Anda :
    http://localhost/Timbois/ejsc/reset_password.php?email='.$email_user.'&hash='.$hash.'

    Dimohon untuk tidak memberikan link diatas kepada siapapun karena bersifat privasi bagi Anda.
    
    '; // Our message above including the link
                        
    $headers = 'From:dickayunia1@gmail.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email

    header("location:lupa_password.php?pesan=emaildikirim");
  }else{
    echo '
    <div class="container container-fluid-lg">
      <div class="row justify-content-center regis-success">
        <div class="col-lg-12 my-5 text-center my-auto">
          <h1>Error 404 </h1>
          <form action=""></form>
        </div>
      </div>
    </div>
    ';
  }