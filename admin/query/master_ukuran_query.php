<?php
include '../includes/config.php';
if (isset($_GET['id_ukuran'])) {
  $id_ukuran = $_GET['id_ukuran'];

  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
      $result = mysqli_query($con, "DELETE FROM ukuran WHERE ID_UKURAN='$id_ukuran'");
      header("location:../master_ukuran.php");
    }
  }
}

if (isset($_POST['edit_ukuran'])) {
  $id_ukuran = $_POST['id_ukuran'];
  $kat_ukuran = $_POST['kat_ukuran'];
  $harga_ukuran = $_POST['harga_ukuran'];

  $result = mysqli_query($con, "UPDATE ukuran SET 
    KAT_UKURAN = '$kat_ukuran',
    HARGA_UKURAN = '$harga_ukuran'
    WHERE
    ID_UKURAN = '$id_ukuran'
  ");

  header("location:../master_ukuran.php");
}

if (isset($_POST['tambah_ukuran'])) {
  $kat_ukuran = $_POST['kat_ukuran'];
  $harga_ukuran = $_POST['harga_ukuran'];

  // UNTUK MENGAMBIL ID TERAKHIR
  $data = mysqli_query($con, "select ID_UKURAN from ukuran ORDER BY ID_UKURAN DESC LIMIT 1");
  while ($ukuran_data = mysqli_fetch_array($data)) {
    $ukuran_id = $ukuran_data['ID_UKURAN'];
  }

  $row = mysqli_num_rows($data);
  if ($row > 0) {
    $id_ukuran = autonumber($ukuran_id, 3, 7);
  } else {
    $id_ukuran = 'UKN000001';
  }

  $result = mysqli_query($con, "INSERT INTO 
    ukuran(ID_UKURAN, KAT_UKURAN, HARGA_UKURAN)
    VALUES('$id_ukuran', '$kat_ukuran', '$harga_ukuran')
    ");

  header("location:../master_ukuran.php");
}
