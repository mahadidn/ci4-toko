<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('/admin/master/barang'); ?>" class="btn btn-primary">
    <i class="fa fa-angle-left"></i> Balik
</a>
<h3>Detail Barang</h3>

<table class="table table-striped">
    <tr>
        <td>ID Barang</td>
        <td><?= $barang['id_barang']; ?></td>
    </tr>
    <tr>
        <td>Kategori</td>
        <td><?= $barang['nama_kategori']; ?></td>
    </tr>
    <tr>
        <td>Nama Barang</td>
        <td><?= $barang['nama_barang']; ?></td>
    </tr>
    <tr>
        <td>Merk Barang</td>
        <td><?= $barang['merk']; ?></td>
    </tr>
    <tr>
        <td>Harga Beli</td>
        <td><?= $barang['harga_beli']; ?></td>
    </tr>
    <tr>
        <td>Harga Jual</td>
        <td><?= $barang['harga_jual']; ?></td>
    </tr>
    <tr>
        <td>Satuan Barang</td>
        <td><?= $barang['satuan_barang']; ?></td>
    </tr>
    <tr>
        <td>Stok</td>
        <td><?= $barang['stok']; ?></td>
    </tr>
    <tr>
        <td>Tanggal Update</td>
        <td><?= $barang['tgl_update']; ?></td>
    </tr>
</table>

<?= $this->endSection() ?>