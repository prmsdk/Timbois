<?php
session_start();

$_SESSION['active_link'] = 'master';

include 'includes/config.php';
include 'includes/header.php';
if (!isset($_SESSION['admin_login'])) {
    header("location:index.php");
}

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    $data = mysqli_query($con, "SELECT * FROM produk");
    $data_produk = mysqli_fetch_assoc($data);
    $nama_produk = $data_produk['NAMA_PRODUK'];
    // $id_warna = $data_produk['KAT_WARNA'];
    // $id_halaman = $data_produk['KAT_HALAMAN'];
    // $id_ukuran = $data_produk['KAT_UKURAN'];
}
?>



<div class="container my-4">
    <div class="title text-center">
        <h2>Ubah Data Produk</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form class="font-m-light col-11 mt-3" action="query/master_produkBaru_query.php" method="post">
                <input type="hidden" name="id_produk" id="id" value="<?= $id_produk ?>">
                <div class="form-group">
                    <label for="nama_produk" class="font-m-med">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $nama_produk ?>" placeholder="Masukkan Nama Ukuran" required>
                </div>
                <div class="form-group">
                    <select name="id_warna" class="custom-select">
                        <option selected>Pilih Warna</option>
                        <?php
                        $result_warna = mysqli_query($con, "SELECT * FROM warna");
                        while ($data_warna = mysqli_fetch_assoc($result_warna)) {
                            $id_warna = $data_warna['ID_WARNA'];
                            $nama_warna = $data_warna['KAT_WARNA'];
                            ?>
                            <option <?php
                                        $ambil_warna = mysqli_query($con, "SELECT * FROM produk, warna WHERE produk.ID_WARNA = warna.ID_WARNA AND produk.ID_PRODUK = '$id_produk' ");
                                        while ($select_warna = mysqli_fetch_assoc($ambil_warna)) {
                                            $id_warna_select = $select_warna['ID_WARNA'];
                                            if ($id_warna == $id_warna_select) {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="<?= $id_warna ?>"><?= $nama_warna ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="id_halaman" class="custom-select">
                        <option selected>Pilih halaman</option>
                        <?php
                        $result_halaman = mysqli_query($con, "SELECT * FROM halaman");
                        while ($data_halaman = mysqli_fetch_assoc($result_halaman)) {
                            $id_halaman = $data_halaman['ID_HALAMAN'];
                            $nama_halaman = $data_halaman['KAT_HALAMAN'];
                            ?>
                            <option <?php
                                        $ambil_halaman = mysqli_query($con, "SELECT * FROM produk, halaman WHERE produk.ID_HALAMAN = halaman.ID_HALAMAN AND produk.ID_PRODUK = '$id_produk' ");
                                        while ($select_halaman = mysqli_fetch_assoc($ambil_halaman)) {
                                            $id_halaman_select = $select_halaman['ID_HALAMAN'];
                                            if ($id_halaman == $id_halaman_select) {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="<?= $id_halaman ?>"><?= $nama_halaman ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="id_ukuran" class="custom-select">
                        <option selected>Pilih ukuran</option>
                        <?php
                        $result_ukuran = mysqli_query($con, "SELECT * FROM ukuran");
                        while ($data_ukuran = mysqli_fetch_assoc($result_ukuran)) {
                            $id_ukuran = $data_ukuran['ID_UKURAN'];
                            $nama_ukuran = $data_ukuran['KAT_UKURAN'];
                            ?>
                            <option <?php
                                        $ambil_ukuran = mysqli_query($con, "SELECT * FROM produk, ukuran WHERE produk.ID_UKURAN = ukuran.ID_UKURAN AND produk.ID_PRODUK = '$id_produk' ");
                                        while ($select_ukuran = mysqli_fetch_assoc($ambil_ukuran)) {
                                            $id_ukuran_select = $select_ukuran['ID_UKURAN'];
                                            if ($id_ukuran == $id_ukuran_select) {
                                                echo "selected";
                                            }
                                        }
                                        ?> $ambil value="<?= $id_ukuran ?>"><?= $nama_ukuran ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer text-center">
                    <input type="submit" class="btn btn-primary" name="edit_produk" value="Simpan">
                    <a href="master_produkBaru.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
?>