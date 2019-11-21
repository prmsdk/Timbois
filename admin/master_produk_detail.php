<?php
  session_start();

  $_SESSION['active_link'] = 'master';
  include 'includes/config.php';
  include 'includes/header.php';
  if(!isset($_SESSION['admin_login'])){
    header("location:index.php");
  }

  if(isset($_GET['id_produk'])){
    $id_produk = $_GET['id_produk'];
  
  //SELECT PRODUK
  $result_produk = mysqli_query($con, "SELECT * FROM produk, kategori_produk WHERE produk.ID_KATEGORI = kategori_produk.ID_KATEGORI AND ID_PRODUK = '$id_produk'");
  $data_produk = mysqli_fetch_assoc($result_produk);
  $nama_produk = $data_produk['NAMA_PRODUK'];
  $desc_produk = $data_produk['DESC_PRODUK'];
  $ket_produk = $data_produk['KET_HARGA'];
  $nama_kategori = $data_produk['NAMA_KAT_PRODUK'];

  //SELECT WARNA
  $result_warna = mysqli_query($con, 
  "SELECT warna.JENIS_WARNA FROM produk, detail_warna, warna
  WHERE produk.ID_PRODUK = detail_warna.ID_PRODUK AND
  warna.ID_WARNA = detail_warna.ID_WARNA AND
  produk.ID_PRODUK = '$id_produk'
  ");

  //SELECT KATEGORI UKURAN
  $result_ukuran_kat = mysqli_query($con, 
  "SELECT kategori_ukuran.ID_KAT_UKURAN, kategori_ukuran.NAMA_KAT_UKURAN FROM
  produk, detail_ukuran, ukuran, kategori_ukuran 
  WHERE
  produk.ID_PRODUK = detail_ukuran.ID_PRODUK AND
  detail_ukuran.ID_UKURAN = ukuran.ID_UKURAN AND
  ukuran.ID_KAT_UKURAN = kategori_ukuran.ID_KAT_UKURAN AND
  produk.ID_PRODUK = '$id_produk'
  ");

  //SELECT KATEGORI UKURAN
  $result_bahan_kat = mysqli_query($con, 
  "SELECT kategori_bahan.ID_KAT_BAHAN, kategori_bahan.NAMA_KAT_BAHAN FROM
  produk, detail_bahan, bahan, kategori_bahan
  WHERE
  produk.ID_PRODUK = detail_bahan.ID_PRODUK AND
  detail_bahan.ID_BAHAN = bahan.ID_BAHAN AND
  bahan.ID_KAT_BAHAN = kategori_bahan.ID_KAT_BAHAN AND
  produk.ID_PRODUK = '$id_produk'
  ");

  //SELECT GAMBAR THUMBNAIL
  $result_gambar = mysqli_query($con, "SELECT produk.NAMA_PRODUK, gambar_produk.GBR_FILE_NAME FROM
  produk, gambar_produk
  WHERE
  produk.ID_PRODUK = gambar_produk.ID_PRODUK AND
  produk.ID_PRODUK = '$id_produk'
  ");
  }

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-2 text-center">
          <h3 class="mt-2 font-weight-bold text-primary"><?=$nama_produk?></h3>
        </div>
        <div class="card-body">
          <div class="row p-2">
            <div class="col-lg">
              <h4>Kategori : <?=$nama_kategori?></h4>
              <h4>Deskripsi Produk : </h4>
              <p><?=$desc_produk?></p>
              <h4>Keterangan Harga : </h4>
            </div>
          </div>
          <hr>
          <div class="row p-2">
            <div class="col-lg">
              <div class="warna">
                <h4>Warna</h4>
                <ul class="list-group">
                <?php $i = 1;
                  while($data_warna = mysqli_fetch_assoc($result_warna)){
                  $jenis_warna = $data_warna['JENIS_WARNA'];
                ?>
                  <li class="list-group-item"><?=$i.". ".$jenis_warna;?></li>
                <?php $i+=1; }?>
                </ul>
              </div>
            </div>
          </div>
          <hr>
          <div class="row p-2">
            <div class="col-lg">
              <div class="ukuran">
                <h4>Ukuran</h4>
                <?php
                  while($data_ukuran_kat = mysqli_fetch_assoc($result_ukuran_kat)){
                    $id_kategori_ukuran = $data_ukuran_kat['ID_KAT_UKURAN'];
                    $nama_kategori_ukuran = $data_ukuran_kat['NAMA_KAT_UKURAN'];
                ?>
                <h5 class="mt-1"><?=$nama_kategori_ukuran?></h5>
                <ul class="list-group">
                <?php 
                  $result_ukuran = mysqli_query($con, 
                  "SELECT ukuran.JENIS_UKURAN FROM produk, detail_ukuran, ukuran
                  WHERE produk.ID_PRODUK = detail_ukuran.ID_PRODUK AND
                  ukuran.ID_UKURAN = detail_ukuran.ID_UKURAN AND
                  produk.ID_PRODUK = '$id_produk' AND
                  ukuran.ID_KAT_UKURAN = '$id_kategori_ukuran'
                  ");

                  $i = 1;
                  while($data_ukuran = mysqli_fetch_assoc($result_ukuran)){
                  $jenis_ukuran = $data_ukuran['JENIS_UKURAN'];
                ?>
                  <li class="list-group-item"><?=$i.". ".$jenis_ukuran;?></li>
                <?php $i+=1; }?>
                </ul>
                <?php } ?>
              </div>
            </div>
          </div>
          <hr>
          <div class="row p-2">
            <div class="col-lg">
              <div class="bahan">
                <h4>Bahan</h4>
                <?php
                  while($data_bahan_kat = mysqli_fetch_assoc($result_bahan_kat)){
                    $id_kategori_bahan = $data_bahan_kat['ID_KAT_BAHAN'];
                    $nama_kategori_bahan = $data_bahan_kat['NAMA_KAT_BAHAN'];
                ?>
                <h5 class="mt-1"><?=$nama_kategori_bahan?></h5>
                <ul class="list-group">
                <?php 
                  $result_bahan = mysqli_query($con, 
                  "SELECT bahan.NAMA_BAHAN FROM tampil_produk, tampil_bahan, bahan
                  WHERE tampil_produk.ID_TAMPIL_PRODUK = tampil_bahan.ID_TAMPIL_PRODUK AND
                  bahan.ID_BAHAN = tampil_bahan.ID_BAHAN AND
                  tampil_produk.ID_TAMPIL_BAHAN = '$id_produk' AND
                  bahan.ID_KAT_BAHAN = '$id_kategori_bahan'
                  ");

                  $i = 1;
                  while($data_bahan = mysqli_fetch_assoc($result_bahan)){
                  $jenis_bahan = $data_bahan['NAMA_BAHAN'];
                ?>
                  <li class="list-group-item"><?=$i.". ".$jenis_bahan;?></li>
                <?php $i+=1; }?>
                </ul>
                <?php } ?>
              </div>
            </div>
          </div>
          <hr>
          <div class="thumbnail text-center">
            <h4>Thumbnail Produk</h4>
            <ul class="list-group">
            <?php $i = 1;
              while($data_gambar = mysqli_fetch_assoc($result_gambar)){
              $file_gambar = $data_gambar['GBR_FILE_NAME'];
              $nama_produk = $data_gambar['NAMA_PRODUK'];
            ?>
              <li class="list-group-item"><img class="m-2" width="300" src="../pictures/produk_thumb/<?=$file_gambar?>" alt="<?=$nama_produk."-".$i?>"></li>
            <?php $i+=1; }?>
            </ul>
          </div>
          <div class="kembali text-center">
            <a href="master_produk.php" class="mt-3 btn btn-primary ">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</div>

<?php
  require 'includes/footer.php';
?>