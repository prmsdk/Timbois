<?php
include '../includes/config.php';
if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $result = mysqli_query($con, "DELETE FROM produk WHERE ID_PRODUK='$id_produk'");
            header("location:../master_produkBaru.php");
        }
    }
}

if (isset($_POST['edit_produk'])) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $id_warna = $_POST['id_warna'];
    $id_halaman = $_POST['id_halaman'];
    $id_ukuran = $_POST['id_ukuran'];

    $result = mysqli_query($con, "UPDATE produk SET
    NAMA_PRODUK = '$nama_produk', 
    ID_WARNA = '$id_warna',
    ID_HALAMAN = '$id_halaman',
    ID_UKURAN = '$id_ukuran'
    WHERE
    ID_PRODUK = '$id_produk'
    ");

    header("location:../master_produkBaru.php");
}

// if (isset($_POST['tambah_ukuran'])) {
//     $kat_ukuran = $_POST['kat_ukuran'];
//     $harga_ukuran = $_POST['harga_ukuran'];

//     // UNTUK MENGAMBIL ID TERAKHIR
//     $data = mysqli_query($con, "select ID_UKURAN from ukuran ORDER BY ID_UKURAN DESC LIMIT 1");
//     while ($ukuran_data = mysqli_fetch_array($data)) {
//         $ukuran_id = $ukuran_data['ID_UKURAN'];
//     }

//     $row = mysqli_num_rows($data);
//     if ($row > 0) {
//         $id_ukuran = autonumber($ukuran_id, 3, 7);
//     } else {
//         $id_ukuran = 'UKN000001';
//     }

//     $result = mysqli_query($con, "INSERT INTO 
//     ukuran(ID_UKURAN, KAT_UKURAN, HARGA_UKURAN)
//     VALUES('$id_ukuran', '$kat_ukuran', '$harga_ukuran')
//     ");

//     header("location:../master_ukuran.php");
// }
