<?php
session_start();

$_SESSION['active_link'] = 'master';

include 'includes/config.php';
include 'includes/header.php';
if(!isset($_SESSION['admin_login'])){
  header("location:index.php");
}
?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-2 text-center">
          <h3 class="mt-2 font-weight-bold text-primary">Tambah Produk</h3>
        </div>


        <div class="card-body">
          <form action="query/master_produk_query.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama_produk" class="font-m-med">Nama produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" aria-describedby="usernameHelp" placeholder="Masukkan Nama produk" required>
          </div>
          <div class="form-group">
            <label for="desc_produk" class="font-m-med">Deskripsi produk</label>
            <textarea name="desc_produk" id="desc_produk" class="form-control" placeholder="Masukkan Deskripsi Produk . ." required></textarea>
          </div>
          <div class="form-group">
            <div><label for="ket_produk" class="font-m-med">Keterangan Harga</label></div>
            <input type="file" id="ket_produk" name="ket_produk" required>
          </div>
          <div class="form-group">
            <label for="kategori_produk">Kategori Produk</label>
            <select class="form-control w-50" id="kategori_produk" name="kategori_produk">
              <?php 
                $data = mysqli_query($con, "SELECT * FROM kategori_produk");
                while($data_kat_produk = mysqli_fetch_assoc($data)){
                $id_kategori_produk = $data_kat_produk['ID_KATEGORI'];
                $nama_kategori_produk = $data_kat_produk['NAMA_KAT_PRODUK'];
              ?>
              <option value="<?=$id_kategori_produk?>"><?=$nama_kategori_produk?></option>
              <?php } ?>
            </select>
          </div>


          <div class="form-group">
            <h5 class="pt-1" for="warna">Warna</h5>
            <hr>

            <?php
              $i=0; $j=0; $k=0;
              $result_warna = mysqli_query($con, "SELECT * FROM warna");
              while($data_warna = mysqli_fetch_assoc($result_warna)){
                $id_warna = $data_warna['ID_WARNA'];
                $jenis_warna = $data_warna['JENIS_WARNA'];
                $k = $i%2;
                if($k == 0){
            ?>
            <div class="row justify-content-arround px-5">
              <?php }?>

              <div class="custom-control custom-checkbox col-lg-6 px-0 mb-2">
                <input type="checkbox" name="check_warna[]" value="<?=$id_warna?>" class="custom-control-input" id="check_warna_<?=$id_warna."_".$j?>">
                <label class="custom-control-label" for="check_warna_<?=$id_warna."_".$j?>"><?=$jenis_warna?></label>
              </div>

              <?php if($k == 1){?>
            </div>
            <?php }
              $i+=1;
              $j+=1;
              }
            ?>
          </div>


          <div class="form-group">
            <h5 class="pt-1" for="bahan">Bahan</h5>
            <hr>

            <div>
              <select class="form-control w-50" id="select_bahan" name="select_bahan">
                <option>Pilih Kategori Bahan</option>
                <?php 
                  $data = mysqli_query($con, "SELECT * FROM kategori_bahan");
                  while($data_kat_bahan = mysqli_fetch_assoc($data)){
                  $id_kategori_bahan = $data_kat_bahan['ID_KAT_BAHAN'];
                  $nama_kategori_bahan = $data_kat_bahan['NAMA_KAT_BAHAN'];
                ?>
                <option value="<?=$id_kategori_bahan?>"><?=$nama_kategori_bahan?></option>
                <?php } ?>
              </select>
            </div>

            <?php
            $data_bhn = mysqli_query($con, "SELECT * FROM kategori_bahan");
            while($data_kat_bhn = mysqli_fetch_assoc($data_bhn)){
            $id_kat_bhn = $data_kat_bhn['ID_KAT_BAHAN'];
            ?>

            <div id="<?=$id_kat_bhn?>" class="box_bahan py-3">
              <div class="row justify-content-arround px-5">
              <?php
                $result_bahan = mysqli_query($con, "SELECT * FROM bahan, kategori_bahan 
                WHERE bahan.ID_KAT_BAHAN = kategori_bahan.ID_KAT_BAHAN AND 
                bahan.ID_KAT_BAHAN = '$id_kat_bhn'");
                while($data_bahan = mysqli_fetch_assoc($result_bahan)){
                  $id_bahan = $data_bahan['ID_BAHAN'];
                  $nama_bahan = $data_bahan['NAMA_BAHAN'];
                  ?>
              
                <div class="custom-control custom-checkbox col-lg-5 px-4 mb-2">
                  <input type="checkbox" name="check_bahan[]" value="<?=$id_bahan?>" class="custom-control-input" id="check_bahan_<?=$id_bahan."_".$j?>">
                  <label class="custom-control-label" for="check_bahan_<?=$id_bahan."_".$j?>"><?=$nama_bahan?></label>
                </div>

              <?php 
                }
              ?>
              </div>
            </div>
            <?php }?>
                
          </div> 
          
          <div class="form-group">
            <h5 class="pt-1" for="ukuran">Ukuran</h5>
            <hr>

            <div>
              <select class="form-control w-50" id="select_ukuran" name="select_ukuran">
                <option>Pilih Kategori ukuran</option>
                <?php 
                  $data = mysqli_query($con, "SELECT * FROM kategori_ukuran");
                  while($data_kat_ukuran = mysqli_fetch_assoc($data)){
                  $id_kategori_ukuran = $data_kat_ukuran['ID_KAT_UKURAN'];
                  $nama_kategori_ukuran = $data_kat_ukuran['NAMA_KAT_UKURAN'];
                ?>
                <option value="<?=$id_kategori_ukuran?>"><?=$nama_kategori_ukuran?></option>
                <?php } ?>
              </select>
            </div>

            <?php
            $data_bhn = mysqli_query($con, "SELECT * FROM kategori_ukuran");
            while($data_kat_bhn = mysqli_fetch_assoc($data_bhn)){
            $id_kat_bhn = $data_kat_bhn['ID_KAT_UKURAN'];
            ?>

            <div id="<?=$id_kat_bhn?>" class="box_ukuran py-3">
              <?php
                $result_ukuran = mysqli_query($con, "SELECT * FROM ukuran, kategori_ukuran 
                WHERE ukuran.ID_KAT_UKURAN = kategori_ukuran.ID_KAT_UKURAN AND 
                ukuran.ID_KAT_UKURAN = '$id_kat_bhn'");?>
                <div class="row justify-content-arround px-5">
                <?php
                while($data_ukuran = mysqli_fetch_assoc($result_ukuran)){
                  $id_ukuran = $data_ukuran['ID_UKURAN'];
                  $nama_ukuran = $data_ukuran['JENIS_UKURAN'];
                  ?>

                <div class="custom-control custom-checkbox col-lg-12 px-4 mb-2">
                  <input type="checkbox" name="check_ukuran[]" value="<?=$id_ukuran?>" class="custom-control-input" id="check_ukuran_<?=$id_ukuran."_".$j?>">
                  <label class="custom-control-label" for="check_ukuran_<?=$id_ukuran."_".$j?>"><?=$nama_ukuran?></label>
                </div>

              <?php 
                }
              ?>
              </div>
            </div>
            <?php }?>
                
          </div> 
          
          <div class="form-group">
            <h5>Gambar Produk</h5>
            <div class="my-2"><input type="file" id="gambar_produk_1" name="gambar_produk[]"></div>
            <div class="my-2"><input type="file" id="gambar_produk_2" name="gambar_produk[]"></div>
            <div class="my-2"><input type="file" id="gambar_produk_3" name="gambar_produk[]"></div>
          </div>
          <div class="form-group text-center">
            <input type="submit" name="tambah_produk" class="btn btn-primary w-25" value="SIMPAN">
          </div>
          </form>
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