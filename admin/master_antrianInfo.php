 <?php
    session_start();

    $_SESSION['active_link'] = 'master';
    include 'includes/config.php';
    include 'includes/header.php';
    if (!isset($_SESSION['admin_login'])) {
        header("location:index.php");
    }

    if (isset($_GET['id_transaksi'])) {
        // $id_transaksi = $_GET['id_transaksi'];
        $id_transaksi = $_GET['id_transaksi'];

        $result_trs = mysqli_query($con, "SELECT transaksi.ID_TRANSAKSI, user.NAMA_USER, produk.NAMA_PRODUK, 
    detail_pemesanan.SUB_TOTAL, detail_pemesanan.FILE_PRODUK, detail_pemesanan.JML_HAL_PRODUK, 
    detail_pemesanan.JML_DUPLICATE_PRODUK, detail_pemesanan.JML_WARNA_PRODUK, detail_pemesanan.CATATAN_PRODUK 
    FROM detail_pemesanan, transaksi, produk, user
    WHERE detail_pemesanan.ID_TRANSAKSI = transaksi.ID_TRANSAKSI 
    AND transaksi.ID_USER = user.ID_USER
    AND detail_pemesanan.ID_PRODUK = produk.ID_PRODUK");

        $data_trs = mysqli_fetch_assoc($result_trs);
        $id_transaksi = $data_trs['ID_TRANSAKSI'];
        $nama_user = $data_trs['NAMA_USER'];
        $nama_produk = $data_trs['NAMA_PRODUK'];
        $sub_total = $data_trs['SUB_TOTAL'];
        $file_produk = $data_trs['FILE_PRODUK'];
        $jml_hal_produk = $data_trs['JML_HAL_PRODUK'];
        $jml_duplicate_produk = $data_trs['JML_DUPLICATE_PRODUK'];
        $jml_warna_produk = $data_trs['JML_WARNA_PRODUK'];
        $catatan_produk = $data_trs['CATATAN_PRODUK'];
    }
    ?>

 <div class="container-fluid">

     <div class="row justify-content-center">
         <div class="col-lg-8">
             <div class="card my-5 shadow">
                 <div class="card-header text-center text-light bg-info">
                     <h2 class="mb-0">Detail Transaksi</h2>
                 </div>
                 <div class="card-body px-5 py-3">
                     <div class="row">
                         <div class="col-lg-6">
                             <h6 class="d-inline sm">Kode Transaksi : </h6>
                             <label><?= $id_transaksi ?></label><br>
                             <h6 class="d-inline">Nama Pelanggan : </h6>
                             <label><?= $nama_user ?></label><br>
                             <h6 class="d-inline">Nama Produk : </h6>
                             <label class="font-wight-bold"><?= $nama_produk ?></label><br>
                             <h6 class="mt-2">Catatan Pemesanan :</h6>
                             <label><?= $catatan_produk ?></label>
                         </div>
                         <div class="col-lg-6">
                             <h6 class="d-inline">File Pelanggan : </h6>
                             <label><?= $file_produk ?></label><br>
                             <h6 class="d-inline">Jml Halaman :</h6>
                             <label><?= $jml_hal_produk ?></label></br>
                             <h6 class="d-inline">Jml Halaman (Warna) :</h6>
                             <label><?= $jml_warna_produk ?></label></br>
                             <h6 class="d-inline">Jumlah Duplikasi : </h6>
                             <label><?= $jml_duplicate_produk ?></label><br>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer">
                     <?php
                        $data1 = mysqli_query($con, "SELECT STATUS_TRANSAKSI FROM transaksi WHERE ID_TRANSAKSI ='$id_transaksi'");
                        $data_transaksi = mysqli_fetch_assoc($data1);
                        $status_transaksi = $data_transaksi['STATUS_TRANSAKSI'];
                        if ($status_transaksi == 0) {
                            echo '<a href="query/master_antrian_query.php?action=update&id_transaksi=' . $id_transaksi . '" class="btn btn-primary">Proses</a>';
                        } else if ($status_transaksi == 1) {
                            echo '<a href="query/master_antrian_query.php?action=done&id_transaksi=' . $id_transaksi . ' "  class="btn btn-success">Done</a>';
                        } else {
                            // echo '<a href="query/master_antrian_query.php?action=done&id_transaksi=' . $id_transaksi . ' "  class="btn btn-success">Done</a>';
                        } ?>
                     <a href="master_antrian.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <?php
    require 'includes/footer.php';
    ?>