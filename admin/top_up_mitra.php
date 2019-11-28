    <?php
    session_start();
    $_SESSION['active_link'] = 'dashboard';
    include 'includes/config.php';
    require 'includes/header.php';
    if(isset($_SESSION['admin_login'])){

    $result = mysqli_query($con, "SELECT * FROM mitra");

    ?>

    <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Card Saldo -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h3 class="mt-2 font-weight-bold float-left text-primary">Saldo Buah Print</h3>
        </div>
    <div class="card-body">
        <div>
        <h4 class="mt-2 font-weight-bold text-primary">Saldo Mitra SEP 2</h4>
            <div class="form-group">
                <class="text-justify">Rp. 540.000
            </div>
        </div>
        <div>
        <button class="mt-2 btn btn-primary  ml-auto" data-toggle="modal" data-target="#jual_saldo">Jual Saldo</button>
        <button class="mt-2 btn btn-secondary  ml-auto" data-toggle="modal" data-target="#tambah_saldo">Tambah Saldo</button>
        </div>
    </div>
    </div>

</div>
<!-- End of Main Content -->

<!-- Modal Tambah Saldo -->

<div class="login-bg">
    <div class="row">
        <div class="col-5">
        <div class="modal fade" id="tambah_saldo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-biru-tua">
                    <h5 class="modal-title text-light font-m-bold ml-3" id="editLabel">Tambah Saldo Mitra</h5>
                    <button type="button" class="close btn bg-biru-tua" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row justify-content-center">
                    <form class="font-m-light col-11 mt-3" action="query/master_warna_query.php" method="post">
                        <div class="form-group">
                        <label for="id_trs_saldo" class="font-m-med">Id Transaksi Saldo</label>
                        <input type="hidden" class="form-control" id="id_trs_saldo" name="id_trs_saldo" required>
                        </div>
                        <div class="form-group">
                        <label for="tgl_trs_saldo" class="font-m-med">Harga Warna</label>
                        <input type="date" name="tgl_trs_saldo" id="tgl_trs_saldo" class="form-control" placeholder="Masukkan Harga Warna . ." required>
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
                        <input type="submit" class="btn btn-primary" name="tambah_saldo" value="Simpan">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>

<!-- Akhir Modal Tambah Saldo -->

    <?php
    }else{
        echo '<div class="container text-center" style="height:80vh;">
            <h1 class="my-auto">Harap Login terlebih dahulu!</h1>
            </div>';
    }
    require 'login_admin.php';
    require 'includes/footer.php';
    ?>
