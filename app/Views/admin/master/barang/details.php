<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                
                <br/>
<a href="<?= base_url('/barang'); ?>" class="btn btn-primary">
    <i class="fa fa-angle-left"></i> Balik
</a>
<h3>Detail Barang</h3>

<table class="table table-bordered table-striped" id="example1">
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
    
</table>
</div>
</div>
</section>
</section>
<br><br><br>
<?= $this->endSection() ?>