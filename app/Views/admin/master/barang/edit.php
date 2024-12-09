<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('/admin/master/barang'); ?>" class="btn btn-primary">
    <i class="fa fa-angle-left"></i> Balik
</a>
<h3>Edit Barang</h3>

<form action="<?= base_url('barang/update/' . $barang['id_barang']); ?>" method="POST">
    <?= csrf_field(); ?>
    <table class="table table-striped">
    <tr>
            <td>ID Barang</td>
            <td>
            <input type="hidden" name="id" value="<?= $barang['id_barang']; ?>">

            </td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="kategori" class="form-control">
                    <option value="<?= $barang['id_kategori']; ?>">
                        <?= $barang['nama_kategori'] ?? 'Pilih Kategori'; ?>
                    </option>
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
            <td><input type="text" class="form-control" name="nama" value="<?= $barang['nama_barang']; ?>"></td>
        </tr>
        <tr>
            <td>Merk Barang</td>
            <td><input type="text" class="form-control" name="merk" value="<?= $barang['merk']; ?>"></td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td><input type="number" class="form-control" name="beli" value="<?= $barang['harga_beli']; ?>"></td>
        </tr>
        <tr>
            <td>Harga Jual</td>
            <td><input type="number" class="form-control" name="jual" value="<?= $barang['harga_jual']; ?>"></td>
        </tr>
        <tr>
            <td>Satuan Barang</td>
            <td>
                <select name="satuan" class="form-control">
                    <option value="<?= $barang['satuan_barang']; ?>"><?= $barang['satuan_barang']; ?></option>
                    <option value="PCS">PCS</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="number" class="form-control" name="stok" value="<?= $barang['stok']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
        </tr>
    </table>
</form>

<?= $this->endSection() ?>