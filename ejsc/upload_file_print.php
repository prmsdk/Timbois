<?php
  require 'includes/header_content.php';
  include 'includes/config.php';

  session_start();
  if(isset($_GET['pesan'])){

  }
?>

<div class="container container-fluid-lg">
  <div class="row justify-content-center">
    <div class="col-lg-8 m-5">
      <div class="card p shadow">
        <div class="card-header text-center text-light bg-info">
          <h3 class="m-0">UPLOAD FILE</h3>
        </div>
        <div class="card-body p-4">
          <div class="col-sm-10">
            <label class="font-weight-bolder" for="upload_pdf">Upload File/Dokumen (Pdf)</label>
            <form action="insert_file_print.php" method="post" enctype="multipart/form-data">
            <div class="my-2">
              <input type="file" name="upload_pdf" id="upload_pdf">
            </div>
            <label class="m-0"><small>Mohon unggah file dalam format pdf (maximal 30 MB). 
            Jika ukuran file anda melebihi batas yang ditentukan, mohon hubungi kami <a href="index.php#contact">Langsung via Email</a></small></label>
            <?php if(!isset($_SESSION['status'])){?>
            <button type="button" data-target="#login_user" data-toggle="modal">Upload</button>
            <?php }else{?>
            <input type="submit" id="uplaod_file" name="upload_file" value="Upload">
            <?php }?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php

  require 'includes/footer.php';
?>