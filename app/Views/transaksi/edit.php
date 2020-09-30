<?php echo view('layouts/header'); ?>
<?php echo view('layouts/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('transaksi/update/'.$transaksi['transaksi_id']); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="">Id pelanggan</label>
                                    <select type="text" class="form-control" name="transaksi_pid" id="" value="<?php echo $transaksi['transaksi_pid']; ?>">
                                        <?php foreach($pelanggan_nama as $key => $data): ?>
                                        <option value="<?php echo $data['pelanggan_id']; ?>">
                                            <?php echo $data['pelanggan_nama'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Id barang</label>
                                    <select type="text" class="form-control" name="transaksi_bid" id="transaksi_bid" value="<?php echo $transaksi['transaksi_bid']; ?>">
                                        <?php foreach($barang_nama as $key => $data): ?>
                                        <option value="<?php echo $data['barang_id']; ?>">
                                            <?php echo $data['barang_nama'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="number" class="input form-control" name="transaksi_harga"
                                        placeholder="Masukan harga" id="transaksi_harga" value="<?php echo $transaksi['transaksi_harga']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" class="input form-control" name="transaksi_qnty"
                                        placeholder="Masukan transaksi qnty" id="transaksi_qnty" value="<?php echo $transaksi['transaksi_qnty']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Total</label>
                                    <input type="number" class="form-control" name="transaksi_total"
                                        placeholder="Masukan besaran transaksi" id="transaksi_total" value="<?php echo $transaksi['transaksi_total']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal transaksi</label>
                                    <input type="date" class="form-control" name="transaksi_date"
                                        placeholder="Masukan tanggal transaksi" value="<?php echo $transaksi['transaksi_date']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Metode pembayaran</label>
                                    <select type="text" name="transaksi_metodepembayaran" class="form-control"
                                        placeholder="Pilih metode pembayaran" value="<?php echo $transaksi['transaksi_metodepembayaran']; ?>">
                                        <option value="" disabled selected>- Metode pembayaran -</option>
                                        <option value="transferbank">Transfer bank</option>
                                        <option value="gopay">Gopay</option>
                                        <option value="ovo">OVO</option>
                                        <option value="indomart">Indomart</option>
                                        <option value="flazz">Flazz</option>
                                        <option value="kredit">Kredit</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Pembayaran</label>
                                    <input type="number" class="input form-control" name="transaksi_pembayaran"
                                        placeholder="Masukan nominal pembayaran" id="transaksi_pembayaran" value="<?php echo $transaksi['transaksi_pembayaran']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Kembalian</label>
                                    <input type="number" class="form-control" name="transaksi_kembalian" readonly
                                        placeholder="Kembalian" id="transaksi_kembalian" value="<?php echo $transaksi['transaksi_kembalian']; ?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('transaksi'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
    $(".input").keyup(function(){
        var transaksi_harga = parseFloat($("#transaksi_harga").val())
        var transaksi_qnty = parseFloat($("#transaksi_qnty").val())
        var transaksi_total = parseFloat($("#transaksi_total").val())
        var transaksi_pembayaran = parseFloat($("#transaksi_pembayaran").val())
        var transaksi_total = transaksi_harga * transaksi_qnty;
        var transaksi_kembalian = transaksi_pembayaran - transaksi_total;
        $("#transaksi_total").attr("value", transaksi_total)
        $("#transaksi_kembalian").attr("value", transaksi_kembalian)
    });
    </script>
    <?php echo view('layouts/footer'); ?>