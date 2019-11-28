<?php
include '../includes/config.php';
if (isset($_GET['id_thumb'])) {
    $id_thumb = $_GET['id_thumb'];
    $data = mysqli_query($con, "SELECT * FROM thumbnail_mitra WHERE ID_THUMB_MITRA='$id_thumb'");
    $data_thumb_delete = mysqli_fetch_array($data);
    $nama_thumb_delete = $data_thumb_delete['ID_THUMB_MITRA'];
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $result = mysqli_query($con, "DELETE FROM thumbnail_mitra WHERE ID_THUMB_MITRA='$id_thumb'");
            header("location:../master_thumbnail.php");
        }
    }
}

if (isset($_POST['edit_thumbnail'])) {

    $id_thumb = $_POST['id_thumb'];
    $id_mitra = $_POST['id_mitra'];

    if ($_FILES['foto_thumb']['name'] == null) {

        $query = mysqli_query($con, "UPDATE thumbnail_mitra SET ID_MITRA='$id_mitra' WHERE ID_THUMB_MITRA='$id_thumb'");

        if ($query) {
            header("location:../master_thumbnail.php");
        }
    } else {

        // MENAMBAH DETAIL UPLOAD
        // var_dump($_FILES['foto_thumb']);
        $ekstensi_boleh = array('jpg', 'jpeg', 'png'); //ekstensi file yang boleh diupload
        $nama = $_FILES['foto_thumb']['name']; //menunjukkan letak dan nama file yang akan di upload
        $ex = explode('.', $nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
        $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
        $ukuran = $_FILES['foto_thumb']['size']; //untuk mendapatkan ukuran file yang diupload
        $file_temporary = $_FILES['foto_thumb']['tmp_name']; //untuk mendapatkan temporary file yang di upload
        if (in_array($ekstensi, $ekstensi_boleh) === true) {
            if ($ukuran < 2000000) {
                move_uploaded_file($file_temporary, '../img/thumbnail_mitra/' . $nama); //untuk upload file
                $query = mysqli_query($con, "UPDATE thumbnail_mitra SET ID_MITRA='$id_mitra', FOTO_THUMB_MITRA='$nama' WHERE ID_THUMB_MITRA='$id_thumb'");
                if ($query) {
                    header("location:../master_thumbnail.php");
                } else {
                    echo "MAAF...., UPLOAD GAGAL";
                }
            } else {
                echo "UKURAN FILE TERLALU BESAR";
            }
        } else {
            echo "FILE TIDAK SESUAI DENGAN EKSTENSI YANG DIBERIKAN";
        }
    }
}

if (isset($_POST['tambah_thumbnail'])) {

    //  MENAMBAH THUMB
    $id_mitra = $_POST['id_mitra'];

    $data = mysqli_query($con, "select ID_THUMB_MITRA from thumbnail_mitra ORDER BY ID_THUMB_MITRA DESC LIMIT 1");
    while ($thumb_data = mysqli_fetch_array($data)) {
        $id_thb = $thumb_data['ID_THUMB_MITRA'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_thumb = autonumber($id_thb, 3, 7);
    } else {
        $id_thumb = 'TMT0000001';
    }
    // MENAMBAH DETAIL UPLOAD
    // var_dump($_FILES['foto_thumb']);
    $ekstensi_boleh = array('jpg', 'jpeg', 'png'); //ekstensi file yang boleh diupload
    $nama = $_FILES['foto_thumb']['name']; //menunjukkan letak dan nama file yang akan di upload
    $ex = explode('.', $nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
    $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
    $ukuran = $_FILES['foto_thumb']['size']; //untuk mendapatkan ukuran file yang diupload
    $file_temporary = $_FILES['foto_thumb']['tmp_name']; //untuk mendapatkan temporary file yang di upload
    if (in_array($ekstensi, $ekstensi_boleh) === true) {
        if ($ukuran < 2000000) {
            move_uploaded_file($file_temporary, '../img/thumbnail_mitra/' . $nama); //untuk upload file
            $query = mysqli_query($con, "INSERT INTO 
            thumbnail_mitra(ID_THUMB_MITRA, ID_MITRA, FOTO_THUMB_MITRA)
            VALUES('$id_thumb', '$id_mitra', '$nama')");
            if ($query) {
                header("location:../master_thumbnail.php");
            } else {
                echo "MAAF...., UPLOAD GAGAL";
            }
        } else {
            echo "UKURAN FILE TERLALU BESAR";
        }
    } else {
        echo "FILE TIDAK SESUAI DENGAN EKSTENSI YANG DIBERIKAN";
    }
}
