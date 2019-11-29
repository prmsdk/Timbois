<?php
include 'includes/config.php';

if(isset($_POST['bayar'])){
  $id_array = $_POST['id_transaksi'];
  $total_array = $_POST['total_transaksi'];
  $metode_bayar = $_POST['metode_bayar'];

  date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d");
    $time = date("h:i:s");

  // $id = array();
  // $total = array();

  for ($i = 0; $i < count($id_array); $i++) {
  //count($id_array) --> if I input 4 fields, count($id_array) = 4)

    $id = $id_array[$i];
    $total = $total_array[$i];

    $query = mysqli_query($con, "UPDATE transaksi SET TOTAL_TRANSAKSI = '$total', TGL_TRANSAKSI = '$date $time', ID_METODE='$metode_bayar' WHERE ID_TRANSAKSI = '$id'");
    if($query){
      header("location:transaksi_print.php");
    }
  }
}
