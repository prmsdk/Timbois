<?php
session_start();
if ($_SESSION['admin_status'] == 2) {
    header("location:index.php");
}

$_SESSION['active_link'] = 'master';

include 'includes/config.php';
include 'includes/header.php';

if (!isset($_SESSION['admin_login'])) {
    header_remove();
    header("location:index.php");
}



if (isset($_GET['id_thumb'])) {
    $id_thumb = $_GET['id_thumb'];

    $data = mysqli_query($con, "SELECT * FROM thumbnail_mitra WHERE ID_THUMB_MITRA='$id_thumb'");
    $data_thumb = mysqli_fetch_assoc($data);
    $id_mitra = $data_thumb['ID_MITRA'];
    $foto_thumb = $data_thumb['FOTO_THUMB_MITRA'];
}
?>
<div class="container my-4" style="height: 75vh">
    <div class="title text-center">
        <h2>Ubah Data Thumbnail</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form class="font-m-light" action="query/master_thumbnail_query.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_thumb" id="id" value="<?= $id_thumb ?>">
                <div class="form-group">
                    <label>Pilih Mitra</label>
                    <select name="id_mitra" class="custom-select">
                        <option selected>Pilih Mitra</option>
                        <?php
                        $result_mitra = mysqli_query($con, "SELECT * FROM mitra");
                        while ($data_mitra = mysqli_fetch_assoc($result_mitra)) {
                            $id_mitra = $data_mitra['ID_MITRA'];
                            $nama_mitra = $data_mitra['NAMA_MITRA'];
                            ?>
                            <option <?php
                                        $ambil_mitra = mysqli_query($con, "SELECT * FROM thumbnail_mitra, mitra WHERE thumbnail_mitra.ID_MITRA = mitra.ID_MITRA AND thumbnail_mitra.ID_THUMB_MITRA = '$id_thumb'");
                                        while ($select_mitra = mysqli_fetch_assoc($ambil_mitra)) {
                                            $id_mitra_select = $select_mitra['ID_MITRA'];
                                            if ($id_mitra == $id_mitra_select) {
                                                echo "selected";
                                            }
                                        }
                                        ?> value="<?= $id_mitra ?>"><?= $nama_mitra ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group text-center" style="position: relative;">
                        <span class="img-div">
                            <div class="text-center img-placeholder" onClick="triggerClick()">
                                <h4>Ganti thumbnail</h4>
                            </div>
                            <div>
                                <?php
                                $data1 = mysqli_query($con, "SELECT FOTO_THUMB_MITRA FROM thumbnail_mitra WHERE ID_THUMB_MITRA ='$id_thumb'");
                                $data_thumb = mysqli_fetch_assoc($data1);
                                $foto_thumb = $data_thumb['FOTO_THUMB_MITRA'];
                                ?>
                                <img src="img/thumbnail_mitra/<?= $foto_thumb; ?>" onClick="triggerClick()" id="profileDisplay" width="100px">
                            </div>
                        </span>
                        <input type="file" name="foto_thumb" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                        <label>Profile Image</label>
                        <div>
                            <label class="sm-0"><small>Mohon unggah file image (maximal 2 MB).</label>
                        </div>
                    </div>
                </div>
                <div class="text-left">
                    <input type="submit" class="btn btn-primary" name="edit_thumbnail" value="Simpan">
                    <a href="master_thumbnail.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
                </div>
        </div>
        </form>
    </div>
</div>

<script src="script.js"></script>

<?php
require 'includes/footer.php';
?>