<?php

include 'includes/config.php';
session_start();
if(!isset($_SESSION['status'])){
  header("location:index.php");
}

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

  $result_produk = mysqli_query($con, "INSERT INTO produk VALUES('$id_produk','UKN0000001','HLM0000001','WRN0000001','PRINT')");

  if($result_produk){
    echo "selesai result produk";
  }else{
    echo "gagal result produk";
  }
  
  // MENAMBAH TRANSAKSI

  $data2 = mysqli_query($con, "SELECT ID_TRANSAKSI, STATUS_TRANSAKSI, ID_USER FROM transaksi ORDER BY ID_TRANSAKSI DESC LIMIT 1");
  while($data_transaksi = mysqli_fetch_assoc($data2))
  {
      $trs_id = $data_transaksi['ID_TRANSAKSI'];
      $trs_status = $data_transaksi['STATUS_TRANSAKSI'];
      $trs_user = $data_transaksi['ID_USER'];
  }

  if(($id_user == $trs_user) AND ($trs_status == 0)){
    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d");
    $time = date("h:i:s");

    $result_transaksi= mysqli_query($con, "UPDATE transaksi SET 
    TGL_TRANSAKSI = '$date $time'
    WHERE
    ID_TRANSAKSI = '$trs_id'
    ");

    $id_transaksi = $trs_id;

    if($result_transaksi){
      echo "selesai update transaksi";
    }else{
      echo "gagal update transaksi";
    }
  }else{

    $row2 = mysqli_num_rows($data2);
    if($row2>0){
      $id_transaksi = autonumber($trs_id, 3, 7);
    }else{
      $id_transaksi = 'TRS0000001';
    }

    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d");
    $time = date("h:i:s");

    $result_transaksi= mysqli_query($con, "INSERT INTO 
    transaksi(ID_TRANSAKSI, ID_METODE, ID_USER, ID_MITRA, TGL_TRANSAKSI) 
    VALUES('$id_transaksi','MBY0000001','$id_user','MTR0000001','$date $time')");
    var_dump($id_user);

    if($result_transaksi){
      echo "selesai result transaksi";
    }else{
      echo "gagal result transaksi";
    }
  }

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
              $query = mysqli_query ($con, "INSERT INTO detail_pemesanan(ID_TRANSAKSI, ID_PRODUK, SUB_TOTAL, FILE_PRODUK, CATATAN_PRODUK) 
              VALUES('$id_transaksi','$id_produk','0','$nama','')");
                  if($query) {
                      header("location:pemesanan_print.php?id_produk=$id_produk&id_transaksi=$id_transaksi");
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