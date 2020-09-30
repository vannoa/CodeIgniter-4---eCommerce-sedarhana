<?php echo view('layouts/header'); ?>
<?php echo view('layouts/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit pelanggan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Edit pelanggan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('pelanggan/update/' . $pelanggan['pelanggan_id']); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Id</label>
                                    <input type="text" name="pelanggan_id" value="<?php echo $pelanggan['pelanggan_id']; ?>" class="form-control" placeholder="Id">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="pelanggan_nama" value="<?php echo $pelanggan['pelanggan_nama']; ?>" class="form-control" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal lahir</label>
                                    <input type="date" name="pelanggan_tgllahir" value="<?php echo $pelanggan['pelanggan_tgllahir']; ?>" class="form-control" placeholder="Tanggal lahir">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin</label>
                                    <select type="text" name="pelanggan_jk" value="<?php echo $pelanggan['pelanggan_jk']; ?>" class="form-control"
                                        placeholder="Masukan jenis kelamin">
                                        <option value="" disabled selected>- Jenis kelamin -</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" class="form-control" placeholder="email" value="<?php echo $pelanggan['pelanggan_email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">No phone</label>
                                    <input type="text" name="pelanggan_phone" value="<?php echo $pelanggan['pelanggan_phone']; ?>" class="form-control" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="pelanggan_password" class="form-control" placeholder="Password" value="<?php echo $pelanggan['pelanggan_password']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="pelanggan_alamat" value="<?php echo $pelanggan['pelanggan_alamat']; ?>" class="form-control" placeholder="Alamat">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php echo view('layouts/footer'); ?>