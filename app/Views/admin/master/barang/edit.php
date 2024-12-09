<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
<a href="<?= base_url('/barang'); ?>" class="btn btn-primary">
    <i class="fa fa-angle-left"></i> Balik
</a>
<h3>Edit Barang</h3>

<?php if (session()->has('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach (session('errors') as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('barang/update/' . $barang['id_barang']); ?>" method="POST">
    <?= csrf_field(); ?>
    
    <input type="hidden" name="id" value="<?= $barang['id_barang']; ?>">
    
    <table class="table table-bordered table-striped" id="example1">
        <tr>
            <td>ID Barang</td>
            <td><?= $barang['id_barang']; ?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="kategori" class="form-control" required>
                    <?php foreach ($kategori as $kat): ?>
                        <option value="<?= $kat['id_kategori']; ?>" <?= ($barang['id_kategori'] == $kat['id_kategori']) ? 'selected' : ''; ?>>
                            <?= $kat['nama_kategori']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" class="form-control" name="nama" value="<?= old('nama', $barang['nama_barang']); ?>" required></td>
        </tr>
        <tr>
            <td>Merk Barang</td>
            <td><input type="text" class="form-control" name="merk" value="<?= old('merk', $barang['merk']); ?>" required></td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td><input type="number" class="form-control" name="beli" value="<?= old('beli', $barang['harga_beli']); ?>" min="1" required></td>
        </tr>
        <tr>
            <td>Harga Jual</td>
            <td><input type="number" class="form-control" name="jual" value="<?= old('jual', $barang['harga_jual']); ?>" min="1" required></td>
        </tr>
        <tr>
            <td>Satuan Barang</td>
            <td>
                <select name="satuan" class="form-control" required>
                    <option value="PCS" <?= ($barang['satuan_barang'] === 'PCS') ? 'selected' : ''; ?>>PCS</option>
                    <option value="Pack" <?= ($barang['satuan_barang'] === 'Pack') ? 'selected' : ''; ?>>Pack</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="number" class="form-control" name="stok" value="<?= old('stok', $barang['stok']); ?>" min="0" required></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
        </tr>
    </table>
</form>
</div>
</div>
</section>
</section>
<?= $this->endSection() ?>