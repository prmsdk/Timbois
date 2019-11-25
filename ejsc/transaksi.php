<?php
require 'includes/header_content.php';
?>

<div class="container">
<form>
    <div class="card">
        <div class="card-header">
            <h3>Bayar</h3>
        </div>
        <hr>
        <div class="card-body">
            <div>
            <h5>Metode Bayar</h5>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saldo" data-whatever="@mdo">Saldo</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tunai" data-whatever="@fat">Tunai</button>
        </div>
    </div>
    <hr>

    <div class="modal fade" id="saldo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Transaksi Saldo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form>
        <div class="form-group">
            <div class="col-12">
            <form class="font-m-light" action="query/transaksi_saldo_query.php" method="post">
            <h8 class="modal-title" id="exampleModalLabel">Total Bayar</h8>
            <input type="text" name="total_bayar" id="id" value="<?=$total_bayar?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-12">
            <form class="font-m-light" action="query/transaksi_saldo_query.php" method="post">
            <h8 class="modal-title" id="exampleModalLabel">Saldo Anda</h8>
            <input type="text" name="saldo_user" id="id" value="<?=$saldo_user?>">
            </div>
        </div>    
        <div class="form-group">
            <div class="col-11">
            <form class="font-m-light" action="query/transaksi_saldo_query.php" method="post">
            <h8 class="modal-title" id="exampleModalLabel">Sisa Saldo</h8>
            <input type="text" name="sisa_saldo" id="id" value="<?=$sisa_saldo?>">
            </div>
        </div>
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary">Bayar</button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="tunai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Transaksi Tunai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
            <div class="col-14">
            <form class="font-m-light" action="query/master_admin_query.php" method="post">
            <h8 class="modal-title" id="exampleModalLabel">Foto Identitas</h8>
            <input type="file" name="foto_identitas" id="id" value="<?=$foto_identitas?>">
            </div>
        </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary">Upload</button>
            </div>
        </div>
        </div>
    </div>
</form>
</div>

<?php
    require 'includes/footer.php';
?>