<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>ID Pelanggang</th>
                <th>ID Barang</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Tanggal Transaksi</th>
                <th>Metode Pembayaran</th>
                <th>Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $key => $row) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $row['transaksi_id']; ?></td>
                    <td><?php echo $row['transaksi_pid']; ?></td>
                    <td><?php echo $row['transaksi_bid']; ?></td>
                    <td><?php echo $row['transaksi_harga']; ?></td>
                    <td><?php echo $row['transaksi_qnty']; ?></td>
                    <td><?php echo $row['transaksi_total']; ?></td>
                    <td><?php echo $row['transaksi_date']; ?></td>
                    <td><?php echo $row['transaksi_metodepembayaran']; ?></td>
                    <td><?php echo $row['transaksi_pembayaran']; ?></td>
                    <td><?php echo $row['transaksi_kembalian']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>