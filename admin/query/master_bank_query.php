<?php
include '../includes/config.php';
if (isset($_GET['id_bank'])) {
    $id_bank = $_GET['id_bank'];
    $data = mysqli_query($con, "SELECT * FROM bank WHERE ID_BANK='$id_bank'");
    $data_bank_delete = mysqli_fetch_array($data);
    $nama_bank_delete = $data_bank_delete['ID_BANK'];
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $result = mysqli_query($con, "DELETE FROM bank WHERE ID_BANK='$id_bank'");
            header("location:../master_bank.php");
        }
    }
}

if (isset($_POST['edit_bank'])) {
    $id_bank = $_POST['id_bank'];
    $nama_bank = $_POST['nama_bank'];
    $nomer_rekening = $_POST['nomer_rekening'];



    $result = mysqli_query($con, "UPDATE bank SET 
    NAMA_BANK = '$nama_bank',
    NOMER_REKENING = '$nomer_rekening'
    WHERE
    ID_BANK = '$id_bank'
");

    header("location:../master_bank.php");
}

if (isset($_POST['tambah_bank'])) {

    $id_mitra = $_POST['id_mitra'];
    $nama_bank = $_POST['nama_bank'];
    $nomer_rekening = $_POST['nomer_rekening'];

    $data = mysqli_query($con, "select ID_BANK from bank ORDER BY ID_BANK DESC LIMIT 1");
    while ($bank_data = mysqli_fetch_array($data)) {
        $id_bnk = $bank_data['ID_BANK'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_bank = autonumber($id_bnk, 3, 7);
    } else {
        $id_bank = 'BNK0000001';
    }

    $result = mysqli_query($con, "INSERT INTO 
    bank(ID_BANK, ID_MITRA, NAMA_BANK, NOMER_REKENING)
    VALUES('$id_bank', '$id_mitra', '$nama_bank', '$nomer_rekening')
    ");

    header("location:../master_bank.php");
}
