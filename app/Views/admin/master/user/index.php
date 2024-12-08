<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Profil Pengguna Aplikasi</h3>
                <br>

                <!-- Display Success and Error Messages -->
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success">
                        <p>Edit Data Berhasil !</p>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('remove')): ?>
                    <div class="alert alert-danger">
                        <p>Hapus Data Berhasil !</p>
                    </div>
                <?php endif; ?>

                <!-- User Profile Picture -->
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <center>
                                <img src="<?= base_url('assets/img/user/'.$data['gambar']); ?>" alt="#" style="width:200px;border:4px solid #ddd;"/>
                            </center>
                        </div>
                        <div class="panel-footer">
                            <form method="POST" action="<?= site_url('admin/master/user/edit') ?>" enctype="multipart/form-data">
                                <input type="file" accept="image/*" name="foto">
                                <input type="hidden" value="<?= $data['gambar'] ?>" name="foto2">
                                <input type="hidden" name="id" value="<?= $data['id_member'] ?>">
                                <span class="pull-right">
                                    <button type="submit" class="btn btn-primary btn-sm" value="Tambah"><i class="fa fa-pencil"> Ganti Foto</i></button>
                                </span>
                            </form>
                            <br/><br/>
                        </div>
                    </div>
                </div>

                <!-- User Profile Information -->
                <div class="col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4><i class="fa fa-user"></i> Kelola Pengguna </h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="<?= site_url('admin/master/user/edit') ?>" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">Nama </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" style="border-radius:0px;" name="nama" value="<?= $data['nm_member']; ?>" required="required"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">Email </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope-square"></i>
                                            </div>
                                            <input type="email" class="form-control" style="border-radius:0px;" name="email" value="<?= $data['email']; ?>" required="required"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">Telepon </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control" style="border-radius:0px;" name="tlp" value="<?= $data['telepon']; ?>" required="required"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">NIK ( KTP ) </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" style="border-radius:0px;" name="nik" value="<?= $data['NIK']; ?>" required="required"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">Alamat </label>
                                        <div class="controls">
                                            <textarea name="alamat" rows="3" class="form-control" style="border-radius:0px;" required="required"><?= $data['alamat_member']; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-actions pull-right">
                                        <input type="hidden" name="id" value="<?= $data['id_member']; ?>">
                                        <button class="btn btn-primary" name="btn" value="Tambah" style="border-radius:0px;">
                                            <i class="fa fa-pencil"></i> Ubah Profil
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4><i class="fa fa-lock"></i> Ganti Password</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="<?= site_url('admin/master/user/change_password') ?>">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">Username </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" style="border-radius:0px;" name="user" value="<?= $data['user']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">Password Baru</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Enter Your New Password" style="border-radius:0px;" id="pass" name="pass" required="required"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="pull-right">
                                        <input type="hidden" class="form-control" style="border-radius:0px;" name="id" value="<?= $data['id_member']; ?>" required="required"/>
                                        <button type="submit" class="btn btn-primary" value="Tambah" style="border-radius:0px;" name="proses">
                                            <i class="fa fa-pencil"></i> Ubah Password
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<?= $this->endSection() ?>
