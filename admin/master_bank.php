<?php
session_start();
if($_SESSION['admin_status']==2){
    header("location:index.php");
}

$_SESSION['active_link'] = 'master';
include 'includes/config.php';
include 'includes/header.php';
if(!isset($_SESSION['admin_login'])){
    header_remove();
    header("location:index.php");
}

  //SELECT BANK
  $result = mysqli_query($con, "SELECT * FROM bank");  $result_mitra = mysqli_query($con, "SELECT * FROM mitra");

?>


<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-2">
    <h3 class="mt-2 font-weight-bold float-left text-primary">Tabel Daftar Bank</h3>
    <button class="mt-2 btn btn-primary float-right ml-auto" data-toggle="modal" data-target="#tambah_bank">Tambah Data</button>
</div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No.</th>
            <th>Nama Bank</th>
            <th>Nomer Rekening</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0;
            while($data_bank = mysqli_fetch_assoc($result)){
            $id_bank = $data_bank['ID_BANK'];
            $nama_bank = $data_bank['NAMA_BANK'];
            $nomer_rekening = $data_bank['NOMER_REKENING'];
            $i+=1;
        ?>

        <tr>
            <td class="text-center"><?=$i?></td>
            <td ><p style="width: 200px;"><?=$nama_bank?></p></td>
            
            <td><p style="width: 120px;"><?=$nomer_rekening?></p></td>
            <td>
            <div class="block" style="width:64px;">
                <a href="query/master_bank_query.php?action=delete&id_bank=<?=$id_bank?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">
            <i class="fas fa-trash"></i>
                </a>
                <a href="master_bank_ubah.php?id_bank=<?=$id_bank?>" class="btn btn-primary btn-circle btn-sm">
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

</div>
<!-- End of Main Content -->

<!-- Modal Tambah -->
<div class="login-bg">
    <div class="row">
    <div class="col-5">
        <div class="modal fade" id="tambah_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-biru-tua">
                    <h5 class="modal-title text-light font-m-bold ml-3" id="editLabel">Tambah Data Bank</h5>
                    <button type="button" class="close btn bg-biru-tua" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row justify-content-center">
                <form class="font-m-light col-11 mt-3" action="query/master_bank_query.php" method="post">
                <div>
                <label for="id_mitra" class="font-m-med">Pilih Mitra</label>
                <select name="id_mitra" class="custom-select">
                <option selected>Pilih Mitra</option>
                <?php
                while($data_mitra = mysqli_fetch_assoc ($result_mitra)){
                $id_mitra = $data_mitra['ID_MITRA'];
                $nama_mitra = $data_mitra['NAMA_MITRA'];
                ?>
                <option value="<?= $id_mitra?>"><?= $nama_mitra?></option>
                <?php }?>
                </select>
                </div>
                    <div class="form-group">
                    <label for="nama_bank" class="font-m-med">Nama Bank</label>
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" aria-describedby="usernameHelp" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                    <label for="nomer_rekening" class="font-m-med">Nomor Rekening</label>
                    <input type="text" class="form-control" id="nomer_rekening" name="nomer_rekening" aria-describedby="usernameHelp" placeholder="Masukkan No Rek" required>
                    </div>
                    <div class="modal-footer text-center">
                    <input type="submit" class="btn btn-primary" name="tambah_bank" value="Simpan">
                    <a href="master_bank.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
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