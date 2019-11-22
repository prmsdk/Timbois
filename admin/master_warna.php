<?php
    session_start();

    $_SESSION['active_link']= 'master';
    include 'includes/config.php';
    include 'includes/header.php';
    if(!isset($_SESSION['admin_login'])){
        header("location:index.php");
    }

    //SELECT WARNA
    $result = mysqli_query($con, "SELECT * FROM warna");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-2">
    <h3 class="mt-2 font-weight-bold float-left text-primary">Daftar Tabel Warna</h3>
    <button class="mt-2 btn btn-primary float-right ml-auto" data-toggle="modal" data-target="#tambah_warna">Tambah Data</button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No.</th>
            <th>Kategori Warna</th>
            <th>Harga Warna</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0;
            while($data_warna = mysqli_fetch_assoc($result)){
            $id_warna = $data_warna['ID_WARNA'];
            $kat_warna = $data_warna['KAT_WARNA']; 
            $harga_warna = $data_warna['HARGA_WARNA'];
            $status_warna = $data_warna['STATUS_WARNA'];
            $i+=1;
          ?>
          <tr>
            <td class="text-center" style="width:50px"><?=$i?></td>
            <td style="width:500px;"><?=$kat_warna?></td>
            <td class="text-justify">Rp. <?=$harga_warna?></td>
            <td class="text-center" style="width:100px;"><?php if($status_warna==1){
              echo '<span class="badge badge-pill badge-success px-3">Tersedia</span>';
            }else{
              echo '<span class="badge badge-pill badge-danger px-3">Tidak Tersedia</span>';
            }?></td>
            <td style="width:67px;">
              <div class="block ml-auto">
                <a href="query/master_warna_query.php?action=delete&id_warna=<?=$id_warna?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">
                  <i class="fas fa-trash"></i>
                </a>
                <a href="master_warna_ubah.php?id_warna=<?=$id_warna?>" class="btn btn-primary btn-circle btn-sm">
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

<div class="login-bg">
    <div class="row">
      <div class="col-5">
        <div class="modal fade" id="tambah_warna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-biru-tua">
                    <h5 class="modal-title text-light font-m-bold ml-3" id="editLabel">Tambah Data Warna</h5>
                    <button type="button" class="close btn bg-biru-tua" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row justify-content-center">
                  <form class="font-m-light col-11 mt-3" action="query/master_warna_query.php" method="post">
                    <div class="form-group">
                      <label for="kategori_warna" class="font-m-med">Kategori Warna</label>
                      <input type="text" class="form-control" id="kategori_warna" name="kategori_warna" aria-describedby="usernameHelp" placeholder="Masukkan Kategori warna" required>
                    </div>
                    <div class="form-group">
                      <label for="harga_warna" class="font-m-med">Harga Warna</label>
                      <input type="number" name="harga_warna" id="harga_warna" class="form-control" placeholder="Masukkan Harga Warna . ." required>
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" id="status_radio1" name="status_warna" value="1" required>
                        <label class="form-check-label" for="status_radio1">
                          Tersedia
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" id="status_radio2" name="status_warna" value="0" required>
                        <label class="form-check-label" for="status_radio2">
                          Tidak Tersedia
                        </label>
                      </div>
                    </div>
                  </div>
                <div class="modal-footer text-center">
                    <input type="submit" class="btn btn-primary" name="tambah_warna" value="Simpan">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
              </form>
          </div>
      </div>
      </div>
    </div>
  </div>
<!-- End Modal Tambah -->

<?php
  require 'includes/footer.php';
?>