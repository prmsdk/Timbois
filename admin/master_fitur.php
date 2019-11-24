<?php
session_start();

$_SESSION['active_link'] = 'master';
include 'includes/config.php';
include 'includes/header.php';
if (!isset($_SESSION['admin_login'])) {
    header("location:index.php");
}

//SELECT WARNA
$result = mysqli_query($con, "SELECT * FROM fitur");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h3 class="mt-2 font-weight-bold float-left text-primary">Daftar Fitur</h3>
            <button class="mt-2 btn btn-primary float-right ml-auto" data-toggle="modal" data-target="#tambah_fitur">Tambah Data</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Fitur</th>
                            <th>Harga Fitur</th>
                            <th>Status Fitur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        while ($data_fitur = mysqli_fetch_assoc($result)) {
                            $id_fitur = $data_fitur['ID_FITUR'];
                            $nama_fitur = $data_fitur['NAMA_FITUR'];
                            $harga_fitur = $data_fitur['HARGA_FITUR'];
                            $status_fitur = $data_fitur['STATUS_FITUR'];
                            $i += 1;
                            ?>
                            <tr>
                                <td class="text-center" style="width:50px"><?= $i ?></td>
                                <td style="width:200px;"><?= $nama_fitur ?></td>
                                <td style="width:110px;">Rp. <?= $harga_fitur ?>,00</td>
                                <td class="text-center" style="width:100px;">
                                    <?php if ($status_fitur == 1) {
                                            echo '<span class="badge badge-pill badge-success px-3">Tersedia</span>';
                                        } else {
                                            echo '<span class="badge badge-pill badge-danger px-3">Tidak Tersedia</span>';
                                        } ?></td>
                                <td style="width:67px;">
                                    <div class="block ml-auto text-center">
                                        <a href="query/master_fitur_query.php?action=delete&id_fitur=<?= $id_fitur ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="master_fitur_ubah.php?id_fitur=<?= $id_fitur ?>" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<div class="login-bg">
    <div class="row">
        <div class="col-5">
            <div class="modal fade" id="tambah_fitur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-biru-tua">
                            <h5 class="modal-title text-light font-m-bold ml-3" id="editLabel">Tambah Data Fitur</h5>
                            <button type="button" class="close btn bg-biru-tua" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row justify-content-center">
                            <form class="font-m-light col-11 mt-3" action="query/master_fitur_query.php" method="post">
                                <div class="form-group">
                                    <label for="jenis_warna" class="font-m-med">Nama Fitur</label>
                                    <input type="text" class="form-control" id="nama_fitur" name="nama_fitur" aria-describedby="usernameHelp" placeholder="Masukkan Nama Fitur" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga_warna" class="font-m-med">Harga Fitur</label>
                                    <input type="text" class="form-control" id="harga_fitur" name="harga_fitur" aria-describedby="usernameHelp" placeholder="Masukkan Harga Fitur" required>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="status_radio1" name="status_fitur" value="1" required>
                                        <label class="form-check-label" for="status_radio1">
                                            Tersedia
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="status_radio2" name="status_fitur" value="0" required>
                                        <label class="form-check-label" for="status_radio2">
                                            Tidak Tersedia
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <input type="submit" class="btn btn-primary" name="tambah_fitur" value="Simpan">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah -->

    <?php
    require 'includes/footer.php';
    ?>