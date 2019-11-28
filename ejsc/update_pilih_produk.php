<?php
include 'includes/config.php';
session_start();
if(!isset($_SESSION['status'])){
  header("location:index.php");
}

$id_user = $_SESSION['id_user'];

if(isset($_POST['tambah_print'])){

  $id_transaksi = $_POST['id_transaksi'];
  $id_produk = $_POST['id_produk'];
  $jml_halaman = $_POST['jml_halaman'];
  $jml_dupli = $_POST['jml_dupli'];
  $id_halaman = $_POST['id_halaman'];
  $id_warna = $_POST['id_warna'];
  $id_ukuran = $_POST['id_ukuran'];
  $sub_total = $_POST['sub_total'];
  $ctt_produk = ' ';
  $jml_warna = 0;

  

  if(($_POST['id_halaman']!='HLM0000001') OR ($_POST['id_warna']=='WRN0000003')){
    $ctt_produk1 = ' ';
    $ctt_produk2 = ' ';
    $ctt_produk3 = ' ';

    if(($_POST['halaman_awal'] != null) AND ($_POST['halaman_akhir'] != null)){
      $halaman_awal = $_POST['halaman_awal'];
      $halaman_akhir = $_POST['halaman_akhir'];
      $ctt_produk1 = "$halaman_awal - $halaman_akhir";
    }
    
    if($_POST['halaman_khusus'] != null){
      $halaman_khusus = $_POST['halaman_khusus'];
      foreach ($_POST['hal'] as $hal) {
        $halaman .= ", $hal";
      }

      $ctt_produk2 = "$halaman_khusus = $halaman";
    }
    
    if($_POST['warna_khusus'] != null){
      $jml_warna = $_POST['warna_khusus'];
      $ctt_produk3 = $jml_warna;
    }

    $ctt_produk = "$ctt_produk1 $ctt_produk2 $ctt_produk3";
  }

  //  UPDATE PRODUK

  $update_produk = mysqli_query($con, "UPDATE produk SET
  ID_UKURAN = '$id_ukuran',
  ID_HALAMAN = '$id_halaman',
  ID_WARNA = '$id_warna'
  WHERE
  ID_PRODUK = '$id_produk'
  ");

  //  UPDATE DETAIL


  $update_detail = mysqli_query($con, "UPDATE detail_pemesanan SET
  SUB_TOTAL = '$sub_total',
  JML_HAL_PRODUK = '$jml_halaman',
  JML_DUPLICATE_PRODUK = '$jml_dupli',
  JML_WARNA_PRODUK = '$jml_warna',
  CATATAN_PRODUK = '$ctt_produk'
  WHERE
  ID_PRODUK = '$id_produk'
  ");

  mysqli_query($con, "DELETE FROM detail_fitur WHERE ID_PRODUK = '$id_produk'") or die(mysqli_error());

  if(isset($_POST['id_fitur'])){
    foreach ($_POST['id_fitur'] as $id_fitur) {
      $fitur = $id_fitur;
      mysqli_query($con, "INSERT INTO detail_fitur VALUES('$id_produk','$fitur')") or die(mysqli_error());
    }
  }

  if($update_produk){
    header("location:keranjang.php?id_transaksi=$id_transaksi");
  }else{
    echo "gagal update produk";
  }

}