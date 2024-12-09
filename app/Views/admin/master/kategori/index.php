<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Data Kategori</h3>
                <br/>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <p><?= session()->getFlashdata('success') ?></p>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success-edit')) : ?>
                    <div class="alert alert-success">
                        <p><?= session()->getFlashdata('success-edit') ?></p>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('remove')) : ?>
                    <div class="alert alert-danger">
                        <p><?= session()->getFlashdata('remove') ?></p>
                    </div>
                <?php endif; ?>

                <a href="<?= base_url('kategori/create') ?>" class="btn btn-success">Tambah Kategori</a>

                <br/><br/>
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr style="background:#DFF0D8;color:#333;">
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Tanggal Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($hasil as $isi) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $isi['nama_kategori']; ?></td>
                                <td><?= $isi['tgl_input']; ?></td>
                                <td>
                                    <a href="<?= base_url('kategori/edit/' . $isi['id_kategori']); ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('kategori/delete/' . $isi['id_kategori']); ?>" onclick="return confirm('Hapus Data Kategori?');" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>

<?= $this->endSection() ?>
