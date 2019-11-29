<?php
session_start();
include 'includes/config.php';
require 'includes/header_content.php';

if(isset($_SESSION['id_user'])){
  // $id_transaksi = $_GET['id_transaksi'];
  $id_user = $_SESSION['id_user'];

  $result = mysqli_query(
    $con,
    "SELECT * FROM transaksi,metode_bayar,user,mitra 
    WHERE transaksi.ID_METODE = metode_bayar.ID_METODE 
    AND transaksi.ID_USER = user.ID_USER 
    AND transaksi.ID_MITRA = mitra.ID_MITRA
    AND user.ID_USER = '$id_user'"
);

}

?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 py-5">
      <div class="card shadow">
        <div class="card-header text-center">
          <h2>History</h2>
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
                                <!-- <td style="width:200px;">
                                    <div class="block ml-auto text-center">
                                        <a href="master_antrianInfo.php?id_transaksi=<?= $id_transaksi ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </div>
                                </td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require 'includes/footer.php';
?>