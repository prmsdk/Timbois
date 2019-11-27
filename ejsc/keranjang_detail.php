<?php
session_start();
include 'includes/config.php';
require 'includes/header_content.php';

if(isset($_GET['id_produk'])){
  // $id_transaksi = $_GET['id_transaksi'];
  $id_produk = $_GET['id_produk'];

  $result_trs = mysqli_query($con, "SELECT 
  produk.ID_PRODUK, produk.NAMA_PRODUK, warna.KAT_WARNA, ukuran.KAT_UKURAN, halaman.KAT_HALAMAN, 
  detail_pemesanan.CATATAN_PRODUK, detail_pemesanan.JML_HAL_PRODUK, detail_pemesanan.JML_DUPLICATE_PRODUK, detail_pemesanan.JML_WARNA_PRODUK,
  detail_pemesanan.FILE_PRODUK, 
  detail_pemesanan.SUB_TOTAL
  FROM
  detail_pemesanan, produk, warna, ukuran, halaman
  WHERE
  produk.ID_PRODUK = detail_pemesanan.ID_PRODUK AND
  produk.ID_UKURAN = ukuran.ID_UKURAN AND
  produk.ID_WARNA = warna.ID_WARNA AND
  produk.ID_HALAMAN = halaman.ID_HALAMAN AND
  produk.ID_PRODUK = '$id_produk'
  ");

  $data_trs = mysqli_fetch_assoc($result_trs);
  $nama_produk = $data_trs['NAMA_PRODUK'];
  $nama_warna = $data_trs['KAT_WARNA'];
  $nama_ukuran = $data_trs['KAT_UKURAN'];
  $nama_halaman = $data_trs['KAT_HALAMAN'];
  $cttn_prd = $data_trs['CATATAN_PRODUK'];
  $jml_hal = $data_trs['JML_HAL_PRODUK'];
  $jml_dupli = $data_trs['JML_DUPLICATE_PRODUK'];
  $jml_warna = $data_trs['JML_WARNA_PRODUK'];
  $file_prd = $data_trs['FILE_PRODUK'];
  $sub_total = $data_trs['SUB_TOTAL'];
}
?>

<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card my-5 shadow">
        <div class="card-header text-center text-light bg-info">
          <h2 class="mb-0"><?=$nama_produk?></h2>
        </div>
        <div class="card-body px-5 pt-3 pb-5">
          <div class="row">
            <div class="col-lg-6">
              <h6 class="d-inline">File anda : </h6>
              <label><?=$file_prd?></label><br>
              <h6 class="d-inline">Warna : </h6>
              <label><?=$nama_warna?></label><br>
              <h6 class="d-inline">Ukuran : </h6>
              <label><?=$nama_ukuran?></label><br>
              <h6 class="d-inline">Halaman : </h6>
              <label><?=$nama_halaman?></label><br>
              <h6>Fitur : </h6>
              <ul class="list-group">
                <?php
                $fitur = mysqli_query($con, "SELECT fitur.NAMA_FITUR FROM fitur, produk, detail_fitur WHERE
                produk.ID_PRODUK = detail_fitur.ID_PRODUK AND
                fitur.ID_FITUR = detail_fitur.ID_FITUR AND
                produk.ID_PRODUK = '$id_produk'");
                while($data_fitur = mysqli_fetch_assoc($fitur)){
                  $nama_fitur = $data_fitur['NAMA_FITUR'];
                ?>
                <li class="list-group-item"><?=$nama_fitur?></li>
                <?php }?>
              </ul>
            </div>
            <div class="col-lg-6">
              <h6 >Catatan Pemesanan :</h6>
              <textarea class="form-control mb-2" readonly><?=$cttn_prd?></textarea>
              <h6 class="d-inline">Jml Halaman :</h6>
              <label><?=$jml_hal?></label><br>
              <h6 class="d-inline">Jml Halaman (Warna) :</h6>
              <label><?=$jml_warna?></label><br>
              <h6 class="d-inline">Jml Cetak :</h6>
              <label><?=$jml_dupli?></label><br>
              <h6 class="d-inline">Sub Total :</h6>
              <label>Rp. <?=$sub_total?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?php
  require 'includes/footer.php';
?>