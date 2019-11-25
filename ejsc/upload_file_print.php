<?php
  require 'includes/header_content.php';
  include 'includes/config.php';

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
            <form action="" method="post" enctype="multipart/form_data">
            <div class="my-2">
              <input type="file" name="upload_pdf" id="upload_pdf">
            </div>
            <label class="m-0"><small>Mohon unggah file dalam format pdf (maximal 30 MB). 
            Jika ukuran file anda melebihi batas yang ditentukan, mohon hubungi kami <a href="index.php#contact">Langsung via Email</a></small></label>
            <?php if(isset($_SESSION['id_user'])){}?>
            <button type="button" data-target="#login_user" data-toggle="modal">Upload</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
  if(isset($_POST['upload_file'])){

    $id_user = $_SESSION['id_user'];

    //  MENAMBAH PRODUK

    $data1 = mysqli_query($con, "SELECT ID_PRODUK FROM produk ORDER BY ID_PRODUK DESC LIMIT 1");
    while($data_produk = mysqli_fetch_assoc($data1))
    {
        $prd_id = $data_produk['ID_PRODUK'];
    }

    $row1 = mysqli_num_rows($data1);
    if($row1>0){
      $id_produk = autonumber($prd_id, 3, 7);
    }else{
      $id_produk = 'PRD0000001';
    }

    $result_produk = mysqli_query($con, "INSERT INTO produk(ID_PRODUK, NAMA_PRODUK) VALUES('$id_produk','PRINT')");
    
    // MENAMBAH TRANSAKSI

    $data2 = mysqli_query($con, "SELECT ID_TRANSAKSI FROM transaksi ORDER BY ID_TRANSAKSI DESC LIMIT 1");
    while($data_transaksi = mysqli_fetch_assoc($data2))
    {
        $trs_id = $data_transaksi['ID_TRANSAKSI'];
    }

    $row2 = mysqli_num_rows($data2);
    if($row2>0){
      $id_transaksi = autonumber($trs_id, 3, 7);
    }else{
      $id_transaksi = 'TRS0000001';
    }

    $date = date("Y-m-d");
    $time = date("h:i:s");

    $result_transaksi= mysqli_query($con, "INSERT INTO 
    transaksi(ID_TRANSAKSI, ID_METODE, ID_USER, ID_MITRA, TGL_TRANSAKSI) 
    VALUES('$id_transaksi','MBY0000001','$id_user','MTR0000001','$date $time')");

    // MENAMBAH DETAIL UPLOAD

    $ekstensi_boleh = array('pdf'); //ekstensi file yang boleh diupload
    $nama = $_FILES['upload_pdf']['name']; //menunjukkan letak dan nama file yang akan di upload
    $ex = explode ('.',$nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
    $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
    $ukuran = $_FILES['upload_pdf']['size']; //untuk mendapatkan ukuran file yang diupload
    $file_temporary = $_FILES['upload_pdf']['tmp_name']; //untuk mendapatkan temporary file yang di upload
        if(in_array($ekstensi,$ekstensi_boleh)===true){
            if($ukuran < 30322100){ 
                move_uploaded_file($file_temporary, 'file_pdf/'.$nama); //untuk upload file
                $query = mysqli_query ($koneksi, "INSERT INTO detail_pemesanan(ID_TRANSAKSI, ID_PRODUK, SUB_TOTAL, FILE_PRODUK, CATATAN_PRODUK) 
                VALUES('$id_transaksi','$id_produk','0','$nama','none')");
                    if($query) {
                        header("location:pemesanan_print.php?id_produk=$id_produk");
                    }else{
                        echo "MAAF...., UPLOAD GAGAL";
                    }
            }else{
                echo "UKURAN FILE TERLALU BESAR";
            }
        }else{
            echo "FILE TIDAK SESUAI DENGAN EKSTENSI YANG DIBERIKAN";
        }
  }

  require 'includes/footer.php';
?>