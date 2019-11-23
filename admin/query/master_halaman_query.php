<?php
include '../includes/config.php';
if(isset($_GET['id_halaman'])){
  $id_halaman = $_GET['id_halaman'];
  
  if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
      $result = mysqli_query($con, "DELETE FROM halaman WHERE ID_HALAMAN='$id_halaman'");
      header("location:../master_halaman.php");
    }
  }
}

if(isset($_POST['edit_halaman'])){
  $id_halaman = $_POST['id_halaman'];
  $kat_halaman = $_POST['nama_halaman'];

  $result = mysqli_query($con, "UPDATE halaman SET 
    KAT_HALAMAN = '$kat_halaman'
    WHERE
    ID_HALAMAN = '$id_halaman'
  ");

header("location:../master_halaman.php");
}

if(isset($_POST['tambah_halaman'])){
  $kat_halaman = $_POST['nama_halaman'];
  
  // UNTUK MENGAMBIL ID TERAKHIR
  $data = mysqli_query($con, "SELECT ID_HALAMAN FROM halaman ORDER BY ID_HALAMAN DESC LIMIT 1");
    while($data_halaman = mysqli_fetch_array($data))
    {
        $kat_id = $data_halaman['ID_HALAMAN'];
    }

    $row = mysqli_num_rows($data);
    if($row>0){
      $id_halaman = autonumber($kat_id, 3, 7);
    }else{
      $id_halaman = 'HLM0000001';
    }

    $result = mysqli_query($con, "INSERT INTO 
    halaman
    VALUES('$id_halaman', '$kat_halaman')
    ");

    header("location:../master_halaman.php");
}