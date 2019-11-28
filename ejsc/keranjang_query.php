<?php

include 'includes/config.php';

if(isset($_GET['id_produk'])){
  $id_produk = $_GET['id_produk'];
  if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
    $result = mysqli_query($con, "DELETE FROM detail_pemesanan WHERE ID_PRODUK = '$id_produk'");
    header("location:keranjang.php");
    }

  }
}