<?php
include '../includes/config.php';
if (isset($_GET['id_fitur'])) {
    $id_fitur = $_GET['id_fitur'];

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $result = mysqli_query($con, "DELETE FROM fitur WHERE ID_FITUR='$id_fitur'");
            header("location:../master_fitur.php");
        }
    }
}

if (isset($_POST['edit_fitur'])) {
    $id_fitur = $_POST['id_fitur'];
    $nama_fitur = $_POST['nama_fitur'];
    $harga_fitur = $_POST['harga_fitur'];
    $status_fitur = $_POST['status_fitur'];

    $result = mysqli_query($con, "UPDATE fitur SET 
    NAMA_FITUR = '$nama_fitur',
    HARGA_FITUR = '$harga_fitur',
    STATUS_FITUR = '$status_fitur'
    WHERE
    ID_FITUR = '$id_fitur'
  ");

    header("location:../master_fitur.php");
}

if (isset($_POST['tambah_fitur'])) {
    $nama_fitur = $_POST['nama_fitur'];
    $harga_fitur = $_POST['harga_fitur'];
    $status_fitur = $_POST['status_fitur'];

    // UNTUK MENGAMBIL ID TERAKHIR
    $data = mysqli_query($con, "select ID_FITUR from fitur ORDER BY ID_FITUR DESC LIMIT 1");
    while ($fitur_data = mysqli_fetch_array($data)) {
        $fitur_id = $fitur_data['ID_FITUR'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_fitur = autonumber($fitur_id, 3, 7);
    } else {
        $id_fitur = 'FTR000001';
    }

    $result = mysqli_query($con, "INSERT INTO 
    fitur(ID_FITUR, NAMA_FITUR, HARGA_FITUR, STATUS_FITUR)
    VALUES('$id_fitur', '$nama_fitur', '$harga_fitur', '$status_fitur')
    ");

    header("location:../master_fitur.php");
}
