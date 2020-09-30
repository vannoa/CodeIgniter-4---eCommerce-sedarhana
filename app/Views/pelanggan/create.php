<?php echo view('layouts/header'); ?>
<?php echo view('layouts/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create pelanggan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create pelanggan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('pelanggan/store'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">ID</label>
                                    <input type="text" name="pelanggan_id" class="form-control" placeholder="Id">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="pelanggan_nama" placeholder="Masukan pelanggan nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal lahir</label>
                                    <input type="date" class="form-control" name="pelanggan_tgllahir" placeholder="Masukan pelanggan tanggal lahir">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin</label>
                                    <select type="text" name="pelanggan_jk" class="form-control"
                                        placeholder="Masukan jenis kelamin">
                                        <option value="" disabled selected>- Jenis kelamin -</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="pelanggan_email" placeholder="Masukan pelanggan email">
                                </div>
                                <div class="form-group">
                                    <label for="">No Phone</label>
                                    <input type="text" class="form-control" name="pelanggan_phone" placeholder="Masukan pelanggan no phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="pelanggan_password" placeholder="Masukan pelanggan password">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" name="pelanggan_alamat" placeholder="Masukan pelanggan alamat">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('Login'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('layouts/footer'); ?>