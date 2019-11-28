<?php
include 'includes/config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>DETAIL TRANSAKSI</title>
</head>

<body>

    <center>
        <img src="img/buahPrint.png" alt="logo buah print" width="20%;">
        <h2>CETAK DATA TRANSAKSI</br></h2>

        <table border="1">
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Metode Bayar</th>
                <th>Nama User</th>
                <th>Nama Mitra</th>
                <th>Tanggal Transaksi</th>
                <th>Total</th>
                <th>Status Transaksi</th>
            </tr>
            <?php
            $no = 1;
            $sql = mysqli_query($con, "SELECT transaksi.ID_TRANSAKSI,metode_bayar.NAMA_METODE,user.NAMA_USER, 
            mitra.NAMA_MITRA, transaksi.TGL_TRANSAKSI, transaksi.TOTAL_TRANSAKSI, 
            transaksi.STATUS_TRANSAKSI FROM transaksi,metode_bayar,user,mitra 
            WHERE transaksi.ID_METODE = metode_bayar.ID_METODE 
            AND transaksi.ID_USER = user.ID_USER 
            AND transaksi.ID_MITRA = mitra.ID_MITRA");
            while ($data = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['ID_TRANSAKSI']; ?></td>
                    <td><?php echo $data['NAMA_METODE']; ?></td>
                    <td><?php echo $data['NAMA_USER']; ?></td>
                    <td><?php echo $data['NAMA_MITRA']; ?></td>
                    <td><?php echo $data['TGL_TRANSAKSI']; ?></td>
                    <td><?php echo $data['TOTAL_TRANSAKSI']; ?></td>
                    <td><?php echo $data['STATUS_TRANSAKSI']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <script>
            window.print();
        </script>

    </center>
</body>

</html>