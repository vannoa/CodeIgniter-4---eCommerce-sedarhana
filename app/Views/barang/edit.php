<?php echo view('layouts/header'); ?>
<?php echo view('layouts/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Edit barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('barang/update/'.$barang['barang_id']); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Id barang</label>
                                    <input type="text" class="form-control" name="barang_id" value="<?php echo $barang['barang_id']; ?>" placeholder="Masukan id barang" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama barang</label>
                                    <input type="text" class="form-control" name="barang_nama" value="<?php echo $barang['barang_nama']; ?>" placeholder="Masukan nama barang">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga barang</label>
                                    <input type="number" class="form-control" name="barang_harga" value="<?php echo $barang['barang_harga']; ?>" placeholder="Masukan harga barang">
                                </div>
                                <div class="form-group">
                                    <label for="">Quantity barang</label>
                                    <input type="number" class="form-control" name="barang_qnty" value="<?php echo $barang['barang_qnty']; ?>" placeholder="Masukan quantity barang">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori barang</label>
                                    <select type="text" name="barang_kategori" class="form-control" value="<?php echo $barang['barang_kategori']; ?>"
                                        placeholder="Masukan barang barang">
                                        <option value="" disabled selected>- barang -</option>
                                        <option value="buku">Buku</option>
                                        <option value="elektronik">Elektronik</option>
                                        <option value="fashion-pria">Fashion pria</option>
                                        <option value="fashion-wanita">Fashion wanita</option>
                                        <option value="handphone">Handphone</option>
                                        <option value="kesehatan">Kesehatan</option>
                                        <option value="kecantikan">Kecantikan</option>
                                        <option value="komputer">Komputer</option>
                                        <option value="olahraga">Olahraga</option>
                                        <option value="otomotif">Otomotif</option>
                                        <option value="properti">Properti</option>
                                    </select></div>
                                <div class="form-group">
                                    <label for="">Input date barang</label>
                                    <input type="date" class="form-control" name="barang_inpdate" value="<?php echo $barang['barang_inpdate']; ?>" placeholder="Masukan input date barang">
                                </div>
                                <div class="form-group">
                                    <label for="">Expired date barang</label>
                                    <input type="date" class="form-control" name="barang_expdate" value="<?php echo $barang['barang_expdate']; ?>" placeholder="Masukan expired date barang">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('barang'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php echo view('layouts/footer'); ?>