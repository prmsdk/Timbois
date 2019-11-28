<?php
session_start();

$_SESSION['active_link'] = 'master';
include 'includes/config.php';
include 'includes/header.php';
if (!isset($_SESSION['admin_login'])) {
    header("location:index.php");
}

//SELECT WARNA
$result = mysqli_query(
    $con,
    "SELECT produk.NAMA_PRODUK, warna.KAT_WARNA ,halaman.KAT_HALAMAN ,ukuran.KAT_UKURAN , produk.ID_PRODUK
    FROM produk,warna,halaman, ukuran
    WHERE produk.ID_HALAMAN = halaman.ID_HALAMAN 
    AND produk.ID_WARNA = warna.ID_WARNA 
    AND produk.ID_UKURAN = ukuran.ID_UKURAN"
);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h3 class="mt-2 font-weight-bold float-left text-primary">Daftar Produk</h3>
            <!-- <button class="mt-2 btn btn-primary float-right ml-auto" data-toggle="modal" data-target="#tambah_produk">Tambah Data</button> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>KAT Warna</th>
                            <th>KAT Halaman</th>
                            <th>KAT Ukuran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        while ($data_produk = mysqli_fetch_assoc($result)) {
                            $id_produk = $data_produk['ID_PRODUK'];
                            $nama_produk = $data_produk['NAMA_PRODUK'];
                            $id_warna = $data_produk['KAT_WARNA'];
                            $id_halaman = $data_produk['KAT_HALAMAN'];
                            $id_ukuran = $data_produk['KAT_UKURAN'];
                            $i += 1;
                            ?>
                            <tr>
                                <td class="text-center" style="width:10px"><?= $i ?></td>
                                <td style="width:200px;"><?= $nama_produk ?></td>
                                <td style="width:200px;"><?= $id_warna ?></td>
                                <td style="width:200px;"><?= $id_halaman ?></td>
                                <td style="width:200px;"><?= $id_ukuran ?></td>
                                <td style="width:100px;">
                                    <div class="block ml-auto text-center">
                                        <a href="query/master_produkBaru_query.php?action=delete&id_produk=<?= $id_produk ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="master_produkBaru_ubah.php?id_produk=<?= $id_produk ?>" class="btn btn-primary btn-circle btn-sm">
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
<!-- 
<div class="login-bg">
    <div class="row">
        <div class="col-5">
            <div class="modal fade" id="tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-biru-tua">
                            <h5 class="modal-title text-light font-m-bold ml-3" id="editLabel">Tambah Data produk</h5>
                            <button type="button" class="close btn bg-biru-tua" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row justify-content-center">
                            <form class="font-m-light col-11 mt-3" action="query/master_produk_query.php" method="post">
                                <div class="form-group">
                                    <label for="nama_produk" class="font-m-med">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" aria-describedby="usernameHelp" placeholder="Masukkan Nama produk" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <label for="file_produk" class="font-m-med">Nama File</label>
                                        <input type="file" class="form-control" id="file_produk" name="file_produk" aria-describedby="usernameHelp" placeholder="Masukkan File produk" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jml_hal_produk" class="font-m-med">Jumlah Halaman</label>
                                    <input type="text" class="form-control" id="jml_hal_produk" name="jml_hal_produk" aria-describedby="usernameHelp" value="" placeholder="Masukkan Halaman Produk" required>
                                </div>
                                <div class="form-group">
                                    <label for="jml_duplicate_produk" class="font-m-med">Jumlah Duplicate</label>
                                    <input type="text" class="form-control" id="jml_duplicate_produk" name="jml_duplicate_produk" aria-describedby="usernameHelp" placeholder="Masukkan Duplicate Produk" required>
                                </div>
                                <div class="form-group">
                                    <label for="jml_warna_produk" class="font-m-med">Jumlah Warna</label>
                                    <input type="text" class="form-control" id="jml_warna_produk" name="jml_hal_produk" aria-describedby="usernameHelp" placeholder="Masukkan Warna Produk" required>
                                </div>
                                <div class="form-group">
                                    <label for="catatan_produk" class="font-m-med">Catatan Produk</label>
                                    <input type="text" class="form-control" id="catatan_produk" name="catatan_produk" aria-describedby="usernameHelp" placeholder="Masukkan Catatan Produk" required>
                                </div>
                        </div>
                        <div class="modal-footer text-center">
                            <input type="submit" class="btn btn-primary" name="tambah_produk" value="Simpan">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
End Modal Tambah -->

<?php
require 'includes/footer.php';
?>