<?php
require 'includes/header_content.php';
?>

<div class="container">
    <form>
        <div class="card m-5 shadow">
            <div class="card-header text-center text-light bg-info">
                <h3>Bayar</h3>              
            </div>
            <div class="card-body">
            <h5>Nama Mitra</h5>
            <h6>Jl.Raya PB Sudirman no.128</h6>
            <hr>
            <div class="row">
                <div class="form-check col-1 text-center">
                    <input class=" form-check-input mr-4" type="checkbox" value="" id="defaultCheck1">
                </div>
                <div class="col-8">
                    <h6 class="m-0">Nama Produk</h6>
                    <label class="form-check-label" for="defaultCheck1">
                    File.pdf x1
                    </label>
                    <h6>Rp. 50.00</h6>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <h5>Nama Mitra</h5>
            <h6>Jl.Raya PB Sudirman no.128</h6>
            <hr>
            <div class="row">
                <div class="form-check col-1 text-center">
                    <input class=" form-check-input mr-4" type="checkbox" value="" id="defaultCheck1">
                </div>
                <div class="col-8">
                    <h6 class="m-0">Nama Produk</h6>
                    <label class="form-check-label" for="defaultCheck1">
                    File.pdf x1
                    </label>
                    <h6>Rp. 50.00</h6>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <h5>Nama Mitra</h5>
            <h6>Jl.Raya PB Sudirman no.128</h6>
            <hr>
            <div class="row">
                <div class="form-check col-1 text-center">
                    <input class=" form-check-input mr-4" type="checkbox" value="" id="defaultCheck1">
                </div>
                <div class="col-8">
                    <h6 class="m-0">Nama Produk</h6>
                    <label class="form-check-label" for="defaultCheck1">
                    File.pdf x1
                    </label>
                    <h6>Rp. 50.00</h6>
                </div>
            </div>
        </div>
            <hr>
        <div class="card-footer m-0 row justify-content-end">
            <div class="my-auto text-right col-md-4">
                <h5 class=" m-0">Total =</h5> 
            </div>
            <div class="my-auto text-right col-md-4">
                <h5 class=" m-0">Rp 89000</h5> 
            </div>
        </div>
            <hr>
            <div class="card-body">
                <h5>Pilih Metode Bayar</h5>
                <hr>
            <div id="select_pembayaran" class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="status_radio1" name="metode_bayar" value="bayar_dengan_saldo">
                    <label class="form-check-label" for="status_radio1">
                    Saldo
                        </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="status_radio2" name="metode_bayar" value="2" >
                    <label class="form-check-label" for="status_radio2">
                Tunai
                </label>
                </div>
            </div>
            <hr>
                <div class="card m-0 row justify-content-end">
                    <div class="my-auto text-right col-md-4">
                        <h5 class=" m-0">Total =</h5> 
                    </div>
                    <div class="my-auto text-right col-md-4">
                        <h5 class=" m-0">Rp 89000</h5> 
                </div>
            </div>
                <div id="bayar_dengan_saldo" class="card-footer m-0 row justify-content-end box_saldo">
                    <div class="my-auto text-center col-mr-9">
                        <h5 class=" m-0">Saldo =</h5> 
                    </div>
                    <div class="my-auto text-right col-mr-3">
                        <h5 class=" m-0">Rp 100000</h5> 
                    </div>
                    <hr>
                    <div class="my-auto text-center col-mr-9">
                        <h5 class=" m-0">Sisa Saldo =</h5> 
                    </div>
                    <div class="my-auto text-right col-mr-3">
                        <h5 class=" m-0">Rp 11000</h5> 
                </div>
            </div>
        <div class="card-footer m-2 row justify-content-end">
            <div class="col-5 text-right ">
                <div class="btn btn-success btn-lg" href="#">Bayar</div>
            </div>
        </div>
        </div>
    </form>
</div>

<?php
    require 'includes/footer.php';
?>