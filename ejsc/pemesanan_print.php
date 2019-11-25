<?php
  require 'includes/header_content.php';
  include 'includes/config.php';

  if(isset($_GET['pesan'])){

  }

  if(isset($_GET['id_produk'])){
    $id_produk = $_GET['id_produk'];

    $result = mysqli_query($con, "SELECT * FROM transaksi, detail_pemesanan, produk
    WHERE
    transaksi.ID_TRANSAKSI = detail_pemesanan.ID_TRANSAKSI AND
    produk.ID_PRODUK = detail_pemesanan.ID_PRODUK
    ORDER by transaksi.TGL_TRANSAKSI DESC
    LIMIT 1");

    $result_detail = mysqli_fetch_assoc($result);
    $file = $result_detail['FILE_PRODUK'];
  }
?>

<div class="container container-fluid-lg">
  <div class="row justify-content-center">
    <div class="col-lg-8 m-5">
      <div class="card p shadow">
        <div class="card-header text-center text-light bg-info">
          <h3 class="m-0">PRINT DOKUMEN</h3>
        </div>
        <div class="card-body p-4">
          <form action="" method="post" name="mainForm" enctype="multipart/form_data">
            <input type="hidden" name="nama_produk" id="id_produk" value="<?$id_produk?>">

            <?php
              // Make a function for convenience 
              function getPDFPages($document)
              {
                  $cmd = "pdfinfo.exe";  // Windows

                  // Parse entire output
                  // Surround with double quotes if file name has spaces
                  exec("$cmd \"$document\"", $output);

                  // Iterate through lines
                  $pagecount = 0;
                  foreach($output as $op)
                  {
                      // Extract the number
                      if(preg_match("/Pages:\s*(\d+)/i", $op, $matches) === 1)
                      {
                          $pagecount = intval($matches[1]);
                          break;
                      }
                  }

                  return $pagecount;
              }

              // Use the function
              $jml_hal = getPDFPages("file_pdf/$file");
              
            ?>

            <div class="form-group row justify-content-center text-center">
              <label for="jml_halaman" class="my-auto col-sm-8 font-weight-bolder">File Anda : <?=$file?></label>
            </div>
            <div class="form-group row text-right">
              <label for="jml_halaman" class="my-auto col-sm-4 font-weight-bolder">Jumlah Halaman = </label>
              <input type="number" class="col-sm-7 form-control inline" id="jml_halaman" name="jml_halaman" value="<?=$jml_hal?>" disabled required>
            </div>
            <div class="form-group row text-right">
              <label for="jml_dupli" class="my-auto col-sm-4 font-weight-bolder">Jumlah Duplikasi = </label>
              <input type="number" class="col-sm-7 form-control inline" id="jml_dupli" name="jml_dupli" required>
            </div>
            <div class="form-group row text-right">
              <label for="" class="font-weight-bolder col-sm-4">Halaman yang akan dicetak = </label>
              <div class="col-sm-7 p-0">
              <select class="m-0 custom-select" id="select_ukuran" required>
                <?php
                $result_halaman = mysqli_query($con, "SELECT * FROM halaman");
                while($data_halaman=mysqli_fetch_assoc($result_halaman)){
                $id_halaman = $data_halaman['ID_HALAMAN'];
                $nama_halaman = $data_halaman['KAT_HALAMAN'];
                ?>
                <option value="<?=$id_halaman?>"><?=$nama_halaman?></option>
              
              <?php } 
              echo "</select>";

              $result_hlm = mysqli_query($con, "SELECT * FROM halaman");
              while($data_halaman=mysqli_fetch_assoc($result_hlm)){
              $id_halaman = $data_halaman['ID_HALAMAN'];
              if($id_halaman == 'HLM0000002'){?>
              <div id="<?=$id_halaman?>" class="box_ukuran py-3">
                <div class="row p-0">
                  <div class="col-sm-2 p-0">
                    <h6 class="mr-2">Dari</h6>
                  </div>
                  <div class="col-sm-4 ">
                    <input type="number" name="halaman_awal" id="halaman_awal" class="form-control mr-2">
                  </div>
                  <div class="col-sm-2 p-0">
                    <h6 class="mr-2">Hingga</h6>
                  </div>
                  <div class="col-sm-4">
                    <input type="number" name="halaman_akhir" id="halaman_akhir" class="form-control">
                  </div>
                </div>
              </div>
              <?php }else if($id_halaman == 'HLM0000003'){?>
              <div id="<?=$id_halaman?>" class="box_ukuran py-3">
                <div class="row">
                  <div class="col-sm-4 p-0 ">
                    <label for="halaman_khusus" class="my-auto mr-2">Masukkan Jml Halaman</label>
                  </div>
                  <div class="col-sm-6" id="hal_hal">
                    <input type="number" class="form-control" id="halaman_khusus" name="halaman_khusus">
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn btn-info" id="halaman_khusus_tombol" name="halaman_khusus_tombol">OK</button>
                  </div>
                </div>
                <div class="row" id="tambah_hal_khusus">
                  <div class="col-12" id="hal_khusus" style="display:none;">
                    <input type="number" class="form-control w-100" id="hal" name="hal[]">
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-info d-none" id="halaman_khusus_reset" name="halaman_khusus_reset">RESET</button>
                  </div>
                </div>
              </div>
              <?php } }?>
              </div>
            </div>



            <div class="form-group row text-right">
              <label for="" class="font-weight-bolder col-sm-4">Pilih Format Warna = </label>
              <div class="col-sm-7 p-0">
              <select class="m-0 custom-select" id="select_warna" required>
                <?php
                $result_warna = mysqli_query($con, "SELECT * FROM warna");
                while($data_warna = mysqli_fetch_assoc($result_warna)){
                $id_warna = $data_warna['ID_WARNA'];
                $nama_warna = $data_warna['KAT_WARNA'];
                $harga_warna = $data_warna['HARGA_WARNA'];
                ?>
                <option value="<?=$id_warna?>" aria-describedby="<?=$harga_warna?>"><?=$nama_warna?></option>
                <?php }?>
                </select>
              <?php
                $result_wrn = mysqli_query($con, "SELECT * FROM warna");
                while($data_warna = mysqli_fetch_assoc($result_wrn)){
                $id_warna = $data_warna['ID_WARNA'];

                if($id_warna == 'WRN0000003'){
              ?>
              <div id="<?=$id_warna?>" class="box_warna py-3">
                <div class="row text-center">
                  <div class="col-md-4 p-0 ">
                    <label for="warna_khusus" class="my-auto">Masukkan Jml Halaman</label>
                  </div>
                  <div class="col-md-8" id="hal_hal">
                    <input type="number" class="form-control" id="warna_khusus" name="warna_khusus">
                  </div>
                </div>
              </div>
              <?php } }?>
              </div>
            </div>
            <div class="form-group row text-right">
              <label for="" class="font-weight-bolder col-sm-4">Pilih Ukuran Kertas = </label>
              <div class="col-sm-7 p-0">
              <select class="m-0 custom-select" id="pilih_ukuran" required>
                <?php
                $result_ukuran = mysqli_query($con, "SELECT * FROM ukuran");
                while($data_ukuran = mysqli_fetch_assoc($result_ukuran)){
                $id_ukuran = $data_ukuran['ID_UKURAN'];
                $nama_ukuran = $data_ukuran['KAT_UKURAN'];
                $harga_ukuran = $data_ukuran['HARGA_UKURAN'];
                ?>
                <option value="<?=$id_ukuran?>" aria-describedby="<?=$harga_ukuran?>"><?=$nama_ukuran?></option>
                <?php }?>
              </select>
              </div>
            </div>
            <div class="form-group row text-right">
              <label for="" class="font-weight-bolder col-sm-4">Fitur</label>
              <div id="radio_fitur" class="col-sm-7 text-left">
                <div class="custom-control custom-radio">
                  <input type="radio" id="none" value="none" name="id_fitur" class="custom-control-input" placeholder="0" required>
                  <label class="custom-control-label" for="none">NONE</label>
                </div>
                <?php 
                $result_fitur = mysqli_query($con, "SELECT * FROM fitur");
                while($data_fitur = mysqli_fetch_assoc($result_fitur)){
                $id_fitur = $data_fitur['ID_FITUR'];
                $nama_fitur = $data_fitur['NAMA_FITUR'];
                $harga_fitur = $data_fitur['HARGA_FITUR'];
                $status_fitur = $data_fitur['STATUS_FITU'];
                ?>
                <div class="custom-control custom-radio">
                  <input type="radio" id="<?=$id_fitur?>" value="<?=$id_fitur?>" name="id_fitur" class="custom-control-input" placeholder="<?=$harga_fitur?>" <?php if($status_fitur == '0'){echo "disabled";}?> required>
                  <label class="custom-control-label" for="<?=$id_fitur?>"><?=$nama_fitur?></label>
                </div>
                <?php }?>
              </div>
            </div>
            <div class="form-group row text-right">
              <label for="sub_total" class="my-auto col-sm-4 font-weight-bolder">Total Harga = </label>
              <input type="number" class="col-sm-7 form-control inline" id="sub_total" name="sub_total" disabled required>
            </div>
            <div class="form-group text-center">
              <input type="submit" name="tambah_print" class="btn btn-info w-25" value="SIMPAN">
              <a class="btn btn-secondary" href="upload_file_print.php?id_produk=<?=$id_produk?>">Close</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  if(isset($_POST['tambah_print'])){
    
  }

  require 'includes/footer.php';
?>