<?php
session_start();
include 'includes/config.php';
require 'includes/header_content.php';

if(isset($_SESSION['id_user'])){
    // $id_transaksi = $_GET['id_transaksi'];
    $id_user = $_SESSION['id_user'];

    $result_trs = mysqli_query($con, "SELECT * FROM transaksi, user, mitra, metode_bayar WHERE 
    user.ID_USER = '$id_user' AND
    mitra.ID_MITRA = transaksi.ID_MITRA AND
    user.ID_USER = transaksi.ID_USER AND
    metode_bayar.ID_METODE = transaksi.ID_METODE  AND
    transaksi.STATUS_TRANSAKSI = '0'
    ");

}
?>

<div class="container">
  <form action="transaksi_query.php" method="post">
  <div class="card m-5 shadow">
    <div class="card-header text-center text-light bg-info">
      <h3>Pembayaran</h3>
    </div>
    <div class="card-body py-0 px-4 ">
    <?php
    while($data_trs = mysqli_fetch_assoc($result_trs)){
      $nama_mitra = $data_trs['NAMA_MITRA'];
      $alamat_mitra = $data_trs['ALAMAT_MITRA'];
      $total_trs = $data_trs['TOTAL_TRANSAKSI'];
      $id_transaksi = $data_trs['ID_TRANSAKSI'];
      $id_mitra = $data_trs['ID_MITRA'];
      $saldo_user = $data_trs['SALDO_USER'];
      $status_user = $data_trs['STATUS_USER'];
    ?>
    
      <h5 class="mt-3">Mitra : <?=$nama_mitra?></h5>
      <input type="hidden" name="id_transaksi[]" value="<?=$id_transaksi?>">
      <h6><?=$alamat_mitra?></h6>
      <hr>
      <?php
      $result_detail = mysqli_query($con, "SELECT 
      produk.NAMA_PRODUK, detail_pemesanan.FILE_PRODUK, detail_pemesanan.JML_DUPLICATE_PRODUK,
      detail_pemesanan.SUB_TOTAL, produk.ID_PRODUK
      FROM
      detail_pemesanan, produk
      WHERE 
      produk.ID_PRODUK = detail_pemesanan.ID_PRODUK AND
      detail_pemesanan.ID_TRANSAKSI = '$id_transaksi'");
      while($data_detail = mysqli_fetch_assoc($result_detail)){
        $nama_produk = $data_detail['NAMA_PRODUK'];
        $file_produk = $data_detail['FILE_PRODUK'];
        $jumlah_dupli = $data_detail['JML_DUPLICATE_PRODUK'];
        $sub_total = $data_detail['SUB_TOTAL'];
        $id_produk = $data_detail['ID_PRODUK'];
      ?>
      <div class="row">
        <div class="col-md-6 ml-4">
          <h6 class="m-0"><?=$nama_produk?></h6>
          <label class="form-check-label" for="defaultCheck1">
          <?=$file_produk?> <br>
          Jumlah Cetak : x<?=$jumlah_dupli?>
          </label>
          <h6>Rp. <?=$sub_total?></h6>
          <input id="<?=$id_produk?>" type="hidden" name="sub_harga" value="<?=$sub_total?>" disabled>
        </div>
        <div class="col-md-5 text-left">
          <?php
          $result_prd = mysqli_query($con, "SELECT 
          warna.KAT_WARNA, ukuran.KAT_UKURAN, halaman.KAT_HALAMAN
          FROM
          produk, warna, ukuran, halaman
          WHERE
          produk.ID_UKURAN = ukuran.ID_UKURAN AND
          produk.ID_WARNA = warna.ID_WARNA AND
          produk.ID_HALAMAN = halaman.ID_HALAMAN AND
          produk.ID_PRODUK = '$id_produk'
          ");
          $data_prd = mysqli_fetch_assoc($result_prd);
          $nama_warna = $data_prd['KAT_WARNA'];
          $nama_ukuran = $data_prd['KAT_UKURAN'];
          $nama_halaman = $data_prd['KAT_HALAMAN'];
          ?>
          <h6>Detail :</h6>
          <label class="d-inline">Warna : </label>
          <label><?=$nama_warna?></label><br>
          <label class="d-inline">Ukuran : </label>
          <label><?=$nama_ukuran?></label><br>
          <label class="d-inline">Halaman : </label>
          <label><?=$nama_halaman?></label><br>
        </div>
      </div>
      <hr>
      <?php }
      
      $result_sub = mysqli_query($con, "SELECT SUM(detail_pemesanan.SUB_TOTAL) as DETAIL_TOTAL FROM detail_pemesanan WHERE ID_TRANSAKSI = '$id_transaksi'");
      $data_sub = mysqli_fetch_assoc($result_sub);
      $detail_total = $data_sub['DETAIL_TOTAL'];
      ?>
      <div class="text-right mr-5">
      <h5 class="mr-3">Sub Total : <?=$detail_total?></h5>
      <input type="hidden" name="total_transaksi[]" value="<?=$detail_total?>">
      </div>
      <?php }?>
      <input type="hidden" id="status_user" value="<?=$status_user?>">
      <div class="ml-4" id="select_metode">
        <h5>Pilih Metode Pembayaran :</h5>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="metode_saldo" name="metode_bayar" value="MBY0000001" class="custom-control-input">
            <label class="custom-control-label" for="metode_saldo">Bayar dengan Saldo</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="metode_cash" name="metode_bayar" value="MBY0000002" class="custom-control-input" checked>
            <label class="custom-control-label" for="metode_cash">Bayar dengan Tunai</label>
          </div>
        </div>
      </div>
      <div class="row text-right mt-4 justify-content-end">
        <div class="my-auto text-right col-2">
          <h5 class=" m-0">Total :</h5> 
        </div>
        <div class="my-auto text-right col-3">
        <h5 id="total" class=" m-0"></h5> 
        <input type="hidden" name="total_trs" id="total_trs">
        </div>
        <div class="col-1"></div>
      </div>
      <div id="MBY0000001" class="box_ukuran">
        <div class="row text-right mt-4 justify-content-end">
          <div class="my-auto text-right col-2">
            <h5 class=" m-0">Saldo :</h5> 
          </div>
          <div class="my-auto text-right col-3">
          <h5 id="saldo_anda" class=" m-0">Rp. <?=$saldo_user?></h5> 
          <input type="hidden" name="saldo_user" id="saldo_user" value="<?=$saldo_user?>">
          </div>
          <div class="col-1"></div>
        </div>
        <div class="row text-right mt-4 justify-content-end">
        <div class="my-auto text-right col-2">
          <h5 class=" m-0">Sisa Saldo :</h5> 
        </div>
        <div class="my-auto text-right col-3">
        <h5 id="sisa_saldo" class=" m-0"></h5> 
        <input type="hidden" name="sisa_saldo" id="sisa_saldo">
        </div>
        <div class="col-1"></div>
      </div>
      </div>
      
    <div class="card-footer m-0 mt-3 row justify-content-end">
      
      <div class="col-2 mr-5 text-right">
        <input id="bayar" class="btn btn-outline-primary btn-lg" type="submit" name="bayar" value="Bayar">
      </div>
    </div>
  </div>
</form>
</div>

<?php
    require 'includes/footer.php';
?>