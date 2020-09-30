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
                        <li class="breadcrumb-item active">Create transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('transaksi/store'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">ID</label>
                                    <input type="text" name="transaksi_id" class="form-control" value="<?php echo $transaksi_id ?>" placeholder="Id" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Id pelanggan</label>
                                    <select type="text" class="transaksi_class form-control" name="transaksi_pid" id="transaksi_pid">
                                        <?php foreach($pelanggan_nama as $key => $data): ?>
                                        <option value="<?php echo $data['pelanggan_id']; ?>">
                                            <?php echo $data['pelanggan_nama'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Id barang</label>
                                    <select type="text" class="form-control" name="transaksi_bid" id="transaksi_bid">
                                        <?php foreach($barang_nama as $key => $data): ?>
                                        <option value="<?php echo $data['barang_id']; ?>">
                                            <?php echo $data['barang_nama'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Harga</label>
                                    <input type="number" class="input form-control" name="transaksi_harga"
                                        placeholder="Masukan harga" id="transaksi_harga">
                                </div>
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" class="input form-control" name="transaksi_qnty"
                                        placeholder="Masukan transaksi qnty" id="transaksi_qnty">
                                </div>
                                <div class="form-group">
                                    <label for="">Total</label>
                                    <input type="number" class="form-control" name="transaksi_total"
                                        placeholder="Masukan besaran transaksi" id="transaksi_total" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal transaksi</label>
                                    <input type="date" class="form-control" name="transaksi_date"
                                        placeholder="Masukan tanggal transaksi">
                                </div>
                                <div class="form-group">
                                    <label for="">Metode pembayaran</label>
                                    <select type="text" name="transaksi_metodepembayaran" class="form-control"
                                        placeholder="Pilih metode pembayaran">
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
                                        placeholder="Masukan nominal pembayaran" id="transaksi_pembayaran">
                                </div>
                                <div class="form-group">
                                    <label for="">Kembalian</label>
                                    <input type="number" class="form-control" name="transaksi_kembalian"
                                        placeholder="Kembalian" id="transaksi_kembalian" readonly>
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
        $(".input").keyup(function () {
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
    <script>
        $(document).ready(function(){
            $("#transaksi_pid").select2();
        });
    </script>
    <?php echo view('layouts/footer'); ?>