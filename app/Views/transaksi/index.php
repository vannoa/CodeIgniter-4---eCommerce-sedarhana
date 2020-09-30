<?php echo view('layouts/header'); ?>
<?php echo view('layouts/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List Transaksi
                            <div class="btn-group float-right">
                                <a href="<?php echo base_url('transaksi/import'); ?>"
                                    class="btn btn-primary btn-sm">Import</a>
                                <a href="<?php echo base_url('transaksi/export'); ?>"
                                    class="btn btn-success btn-sm">Export</a>
                                <a href="<?php echo base_url('transaksi/pdf'); ?>" class="btn btn-danger btn-sm"><i
                                        class="fa fa-file"></i> PDF</a>
                                <a href="<?php echo base_url('transaksi/create'); ?>"
                                    class="btn btn-primary btn-sm">Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <?php
                            if (!empty(session()->getFlashdata('success'))) { ?>
                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('info'))) { ?>
                            <div class="alert alert-info">
                                <?php echo session()->getFlashdata('info'); ?>
                            </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                            <div class="alert alert-warning">
                                <?php echo session()->getFlashdata('warning'); ?>
                            </div>
                            <?php } ?>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered" id="dttable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id transaksi</th>
                                            <th>Id pelanggan</th>
                                            <th>Id barang</th>
                                            <th>Harga</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Tanggal transaksi</th>
                                            <th>Metode pembayaran</th>
                                            <th>Pembayaran</th>
                                            <th>Kembalian</th>
                                            <th>Action</th>
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
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('transaksi/edit/' . $row['transaksi_id']); ?>"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('transaksi/delete/' . $row['transaksi_id']); ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                                        <i class="fa fa-trash-alt"></i>
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
            </div>

        </div>
    </div>
</div>
<?php echo view('layouts/footer'); ?>