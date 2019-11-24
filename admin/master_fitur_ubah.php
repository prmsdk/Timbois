<?php
session_start();

$_SESSION['active_link'] = 'master';

include 'includes/config.php';
include 'includes/header.php';
if (!isset($_SESSION['admin_login'])) {
    header("location:index.php");
}

if (isset($_GET['id_fitur'])) {
    $id_fitur = $_GET['id_fitur'];

    $data = mysqli_query($con, "SELECT * FROM fitur WHERE ID_FITUR = '$id_fitur'");
    $data_fitur = mysqli_fetch_assoc($data);
    $nama_fitur = $data_fitur['NAMA_FITUR'];
    $harga_fitur = $data_fitur['HARGA_FITUR'];
    $status_fitur = $data_fitur['STATUS_FITUR'];
}
?>

<div class="container my-4">
    <div class="title text-center">
        <h2>Ubah Data fitur</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form class="font-m-light col-11 mt-3" action="query/master_fitur_query.php" method="post">
                <input type="hidden" name="id_fitur" id="id" value="<?= $id_fitur ?>">
                <div class="form-group">
                    <label for="nama_fitur" class="font-m-med">Nama fitur</label>
                    <input type="text" class="form-control" id="nama_fitur" name="nama_fitur" value="<?= $nama_fitur ?>" placeholder="Masukkan Nama fitur" required>
                </div>
                <div class="form-group">
                    <label for="harga_fitur" class="font-m-med">Harga fitur</label>
                    <input type="number" name="harga_fitur" id="harga_fitur" class="form-control" placeholder="Masukkan Harga fitur . ." value="<?= $harga_fitur ?>" required>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="status_radio1" name="status_fitur" value="1" <?php if ($status_fitur == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                        <label class="form-check-label" for="status_radio1">
                            Tersedia
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="status_radio2" name="status_fitur" value="0" <?php if ($status_fitur == 0) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                        <label class="form-check-label" for="status_radio2">
                            Tidak Tersedia
                        </label>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <input type="submit" class="btn btn-primary" name="edit_fitur" value="Simpan">
                    <a href="master_fitur.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
?>