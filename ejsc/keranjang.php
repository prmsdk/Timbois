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
    metode_bayar.ID_METODE = transaksi.ID_METODE
    ");

}
?>

<div class="container">
<form>
  <div class="card m-5 shadow">
    <div class="card-header text-center text-light bg-info">
      <h3>Keranjang</h3>
    </div>
    <div class="card-body py-0 px-4 ">
    <?php
    while($data_trs = mysqli_fetch_assoc($result_trs)){
      $nama_mitra = $data_trs['NAMA_MITRA'];
      $alamat_mitra = $data_trs['ALAMAT_MITRA'];
      $total_trs = $data_trs['TOTAL_TRANSAKSI'];
      $id_transaksi = $data_trs['ID_TRANSAKSI'];
    ?>
    
      <h5 class="mt-3">Mitra : <?=$nama_mitra?></h5>
      <h6><?=$alamat_mitra?></h6>
      <hr>
      <?php
      $result_detail = mysqli_query($con, "SELECT * FROM
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
        <div class="col-md-8 ml-4">
          <h6 class="m-0"><?=$nama_produk?></h6>
          <label class="form-check-label" for="defaultCheck1">
          <?=$file_produk?> <br>
          Jumlah Cetak : x<?=$jumlah_dupli?>
          </label>
          <h6>Rp. <?=$sub_total?></h6>
          <input id="<?=$id_produk?>" type="hidden" name="sub_harga" value="<?=$sub_total?>" disabled>
        </div>
        <div class="col-md-3 text-right">
          <a class="btn btn-info" href="keranjang_detail.php?id_produk=<?=$id_produk?>"><i class="fas fa-info-circle fa-1x"></i></a>
          <a class="btn btn-warning" href="keranjang_ubah.php?id_produk=<?=$id_produk?>">Edit</a>
          <a class="btn btn-danger" href="keranjang_query.php?id_produk=<?=$id_produk?>&action=delete">Hapus</a>
        </div>
      </div>
      <hr>
      <?php }?>
      
      <?php }?>
      </div>
    <div class="card-footer m-0 row justify-content-end">
        <div class="my-auto text-right col-2">
            <h5 class=" m-0">Total =</h5> 
        </div>
        <div class="my-auto text-right col-4">
        <h5 id="total" class=" m-0"><?=$total_trs?></h5> 
        </div>
        <div class="col-2 text-right">
            <a class="btn btn-success btn-lg" href="transaksi.php?id_transaksi=<?=$id_transaksi?>">Bayar</a>
        </div>
    </div>
  </div>
</form>
</div>

<?php
    require 'includes/footer.php';
?>