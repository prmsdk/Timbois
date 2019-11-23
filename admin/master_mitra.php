<?php
session_start();
if ($_SESSION['mitra_status'] == 1) {
    header("location:index.php");
}

$_SESSION['active_link'] = 'master';
include 'includes/config.php';
include 'includes/header.php';
if (!isset($_SESSION['mitra_login'])) {
    header_remove();
    header("location:index.php");
}

//SELECT mitra
$result = mysqli_query($con, "SELECT * FROM mitra");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h3 class="mt-2 font-weight-bold float-left text-primary">Tabel Daftar Mitra</h3>
            <button class="mt-2 btn btn-primary float-right ml-auto" data-toggle="modal" data-target="#tambah_mitra">Tambah Data</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        while ($data_mitra = mysqli_fetch_assoc($result)) {
                            $id_mitra = $data_mitra['ID_MITRA'];
                            $nama_mitra = $data_mitra['NAMA_USAHA_ADM'];
                            $email_mitra = $data_mitra['EMAIL'];
                            $no_hp = $data_mitra['NO_HP'];
                            $no_telp = $data_mitra['NO_TELP'];
                            $alamat_mitra = $data_mitra['ALAMAT'];
                            $username_mitra = $data_mitra['USERNAME'];
                            $status_mitra = $data_mitra['STATUS'];
                            $i += 1;
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td>
                                    <p style="width: 200px;"><?= $nama_mitra ?></p>
                                </td>
                                <td><?= $email_mitra ?></td>
                                <td>
                                    <p style="width: 120px;"><?= $no_telp ?></p>
                                </td>
                                <td>
                                    <p style="width: 120px;"><?= $no_hp ?></p>
                                </td>
                                <td>
                                    <p style="width: 200px;"><?= $alamat_mitra ?></p>
                                </td>
                                <td><?= $username_mitra ?></td>
                                <td class="text-center"><?php if ($status_mitra == 1) {
                                                                echo '<span class="badge badge-pill badge-primary px-3">Super</span>';
                                                            } else {
                                                                echo '<span class="badge badge-pill badge-success px-3">mitra</span>';
                                                            } ?></td>
                                <td>
                                    <div class="block" style="width:65px;">
                                        <a href="query/master_mitra_query.php?action=delete&id_mitra=<?= $id_mitra ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="master_mitra_ubah.php?id_mitra=<?= $id_mitra ?>" class="btn btn-primary btn-circle btn-sm">
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

</div>
<!-- End of Main Content -->

<!-- Modal Tambah -->
<div class="login-bg">
    <div class="row">
        <div class="col-5">
            <div class="modal fade" id="tambah_mitra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-biru-tua">
                            <h5 class="modal-title text-light font-m-bold ml-3" id="editLabel">Tambah Data mitra</h5>
                            <button type="button" class="close btn bg-biru-tua" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row justify-content-center">
                            <form class="font-m-light col-11 mt-3" action="query/master_mitra_query.php" method="post">
                                <div class="form-group">
                                    <label for="nama_mitra" class="font-m-med">Nama</label>
                                    <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" aria-describedby="usernameHelp" placeholder="Masukkan Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_mitra" class="font-m-med">Email</label>
                                    <input type="email" class="form-control" id="email_mitra" name="email_mitra" aria-describedby="usernameHelp" placeholder="Masukkan Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp_mitra" class="font-m-med">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_telp_mitra" name="no_telp_mitra" aria-describedby="usernameHelp" placeholder="(0331) xxx">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp_mitra" class="font-m-med">Nomor Handphone</label>
                                    <input type="text" class="form-control" id="no_hp_mitra" name="no_hp_mitra" aria-describedby="usernameHelp" placeholder="08xx" onkeypress='validate(event)' required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_mitra" class="font-m-med">Alamat</label>
                                    <textarea name="alamat_mitra" id="alamat_mitra" class="form-control" placeholder="Alamat..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="username_mitra" class="font-m-med">Username</label>
                                    <input type="text" class="form-control" id="username_mitra" name="username_mitra" aria-describedby="usernameHelp" placeholder="Masukkan Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password_mitra" class="font-m-med">Password</label>
                                    <input type="password" class="form-control" id="password_mitra" name="password_mitra" aria-describedby="usernameHelp" placeholder="Masukkan Username" required>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="status_radio1" name="status_mitra" value="1" <?php if ($status_mitra == 1) {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="status_radio1">
                                            Super mitra
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="status_radio2" name="status_mitra" value="2" <?php if ($status_mitra == 2) {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="status_radio2">
                                            mitra
                                        </label>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer text-center">
                            <input type="submit" class="btn btn-primary" name="tambah_mitra" value="Simpan">
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