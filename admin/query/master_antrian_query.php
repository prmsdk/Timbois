<?php
include '../includes/config.php';
if (isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];
    $data = mysqli_query($con, "SELECT * FROM transaksi WHERE ID_TRANSAKSI='$id_transaksi'");
    $data_transaksi = mysqli_fetch_array($data);
    $id_transaksi = $data_transaksi['ID_TRANSAKSI'];
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'update') {
            $result = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='1' WHERE ID_TRANSAKSI='$id_transaksi'");
            header("location:../master_antrian.php");
        }
    }
}

if (isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];
    $data = mysqli_query($con, "SELECT * FROM transaksi WHERE ID_TRANSAKSI='$id_transaksi'");
    $data_transaksi = mysqli_fetch_array($data);
    $id_transaksi = $data_transaksi['ID_TRANSAKSI'];
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'done') {
            $result = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='2' WHERE ID_TRANSAKSI='$id_transaksi'");
            header("location:../master_antrian.php");
        }
    }
}
