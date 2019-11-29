<?php
session_start();

$_SESSION['active_link'] = 'master';
include 'includes/config.php';
include 'includes/header.php';
if (!isset($_SESSION['admin_login'])) {
    header("location:index.php");
}

if(isset($_SESSION['id_mitra'])){
    $id_mitra = $_SESSION['id_mitra'];
}

//SELECT WARNA
$result = mysqli_query(
    $con,
    "SELECT transaksi.ID_TRANSAKSI,metode_bayar.NAMA_METODE,user.NAMA_USER, 
    mitra.NAMA_MITRA, transaksi.TGL_TRANSAKSI, transaksi.TOTAL_TRANSAKSI, 
    transaksi.STATUS_TRANSAKSI FROM transaksi,metode_bayar,user,mitra 
    WHERE transaksi.ID_METODE = metode_bayar.ID_METODE 
    AND transaksi.ID_USER = user.ID_USER 
    AND transaksi.ID_MITRA = mitra.ID_MITRA 
    AND TGL_TRANSAKSI > CURDATE()
    AND mitra.ID_MITRA = '$id_mitra'"
);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h3 class="mt-2 font-weight-bold float-left text-primary">Daftar Transaksi</h3>
            <!-- <button class="mt-2 btn btn-primary float-right ml-auto" data-toggle="modal" data-target="#tambah_produk">Tambah Data</button> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Metode Bayar</th>
                            <th>Nama User</th>
                            <th>Nama Mitra</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        while ($data_transaksi = mysqli_fetch_assoc($result)) {
                            $id_transaksi = $data_transaksi['ID_TRANSAKSI'];
                            $nama_metode = $data_transaksi['NAMA_METODE'];
                            $nama_user = $data_transaksi['NAMA_USER'];
                            $nama_mitra = $data_transaksi['NAMA_MITRA'];
                            $tgl_transaksi = $data_transaksi['TGL_TRANSAKSI'];
                            $total_transaksi = $data_transaksi['TOTAL_TRANSAKSI'];
                            $status_transaksi = $data_transaksi['STATUS_TRANSAKSI'];
                            $i += 1;
                            ?>
                            <tr>
                                <td class="text-center" style="width:10px"><?= $i ?></td>
                                <td style="width:200px;"><?= $nama_metode ?></td>
                                <td style="width:200px;"><?= $nama_user ?></td>
                                <td style="width:200px;"><?= $nama_mitra ?></td>
                                <td style="width:200px;"><?= $tgl_transaksi ?></td>
                                <td style="width:200px;"><?= $total_transaksi ?></td>
                                <td style="width:200px;" class="text-center">
                                    <?php if ($status_transaksi == 0) {
                                            echo '<span class="badge badge-pill badge-info px-3">belum diproses</span>';
                                        } else if ($status_transaksi == 1) {
                                            echo '<span class="badge badge-pill badge-primary px-3">diproses</span>';
                                        } else {
                                            echo '<span class="badge badge-pill badge-success px-3">selesai</span>';
                                        } ?></td>
                                <td style="width:200px;">
                                    <div class="block ml-auto text-center">
                                        <a href="master_antrianInfo.php?id_transaksi=<?= $id_transaksi ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-info"></i>
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

<?php
require 'includes/footer.php';
?>