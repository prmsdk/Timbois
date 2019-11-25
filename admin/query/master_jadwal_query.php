<?php
include '../includes/config.php';
if(isset($_GET['id_jadwal'])){
    $id_jadwal = $_GET['id_jadwal'];
    $data = mysqli_query($con, "SELECT * FROM jadwal WHERE ID_JADWAL='$id_jadwal'");
    $data_jadwal_delete = mysqli_fetch_array($data);
    $nama_jadwal_delete = $data_jadwal_delete['ID_JADWAL'];
    if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
    $result = mysqli_query($con, "DELETE FROM jadwal_mitra WHERE ID_JADWAL='$id_jadwal'");
    header("location:../master_jadwal.php");
    }
    }
}

if(isset($_POST['edit_jadwal'])){
$id_jadwal = $_POST['id_jadwal'];
$jadwal_buka = $_POST['jadwal_buka'];




$result = mysqli_query($con, "UPDATE jadwal SET 
    JADWAL_BUKA = '$jadwal_buka',
    WHERE
    ID_jadwal = '$id_jadwal'
");

    header("location:../master_jadwal.php");
}

if(isset($_POST['tambah_jadwal'])){

    $id_mitra = $_POST['id_mitra'];
    $jadwal_buka = $_POST['JADWAL_BUKA'];
    
    $data = mysqli_query($con, "select ID_JADWAL from jadwal ORDER BY ID_JADWAL DESC LIMIT 1");
    while($jadwal_data = mysqli_fetch_array($data))
    {
        $id_jdw = $jadwal_data['ID_JADWAL'];
    }

    $row = mysqli_num_rows($data);
    if($row>0){
    $id_jadwal = autonumber($id_jdw, 3, 7);
    }else{
    $id_jadwal = 'JDW0000001';
    }

    $result = mysqli_query($con, "INSERT INTO 
    jadwal(ID_JADWAL, ID_MITRA, JADWAL_BUKA)
    VALUES('$id_jadwal', '$id_mitra', '$jadwal_buka')
    ");

    header("location:../master_jadwal.php");
  }