<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Edit Kategori</h3>
                <br/>
                <form method="POST" action="<?= base_url('kategori/update/' . $edit['id_kategori']) ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <input type="text" class="form-control" name="kategori" value="<?= old('kategori', $edit['nama_kategori']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Ubah Data
                    </button>
                </form>
            </div>
        </div>
    </section>
</section>

<?= $this->endSection() ?>
