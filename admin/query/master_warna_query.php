<?php
include '../includes/config.php';
if(isset($_GET['id_warna'])){
  $id_warna = $_GET['id_warna'];
  
  if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
      $result = mysqli_query($con, "DELETE FROM warna WHERE ID_WARNA='$id_warna'");
      header("location:../master_warna.php");
    }
  }
}

if(isset($_POST['edit_warna'])){
  $id_warna = $_POST['id_warna'];
  $kat_warna = $_POST['kat_warna'];
  $harga_warna = $_POST['harga_warna'];
  $status_warna = $_POST['status_warna'];

  $result = mysqli_query($con, "UPDATE warna SET 
    KAT_WARNA = '$kat_warna',
    HARGA_WARNA = '$harga_warna',
    STATUS_WARNA = '$status_warna'
    WHERE
    ID_WARNA = '$id_warna'
  ");

header("location:../master_warna.php");
}

if(isset($_POST['tambah_warna'])){
  $kat_warna = $_POST['kategori_warna'];
  $harga_warna = $_POST['harga_warna'];
  $status_warna = $_POST['status_warna'];
  
  // UNTUK MENGAMBIL ID TERAKHIR
  $data = mysqli_query($con, "SELECT ID_WARNA from warna ORDER BY ID_WARNA DESC LIMIT 1");
    while($warna_data = mysqli_fetch_array($data))
    {
        $warna_id = $warna_data['ID_WARNA'];
    }

    $row = mysqli_num_rows($data);
    if($row>0){
      $id_warna = autonumber($warna_id, 3, 7);
    }else{
      $id_warna = 'WRN0000001';
    }

    $result = mysqli_query($con, "INSERT INTO 
    warna(ID_WARNA, KAT_WARNA, HARGA_WARNA, STATUS_WARNA)
    VALUES('$id_warna', '$kat_warna', '$harga_warna', '$status_warna')
    ");

    header("location:../master_warna.php");
}

