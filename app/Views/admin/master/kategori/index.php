<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Data Kategori</h3>
                <br/>
                <?php if (isset($_GET['success'])) : ?>
                    <div class="alert alert-success">
                        <p>Tambah Data Berhasil!</p>
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['success-edit'])) : ?>
                    <div class="alert alert-success">
                        <p>Update Data Berhasil!</p>
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['remove'])) : ?>
                    <div class="alert alert-danger">
                        <p>Hapus Data Berhasil!</p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($_GET['uid'])) : ?>
                    <!-- Ambil data kategori berdasarkan id -->
                    <!-- $edit = $model->getKategori($_GET['uid']); -->
                    <form method="POST" action="#">
                        <table>
                            <tr>
                                <td style="width:15pc;">
                                    <input type="text" class="form-control" value="<?= $edit['nama_kategori'] ?? ''; ?>" required name="kategori" placeholder="Masukan Kategori Barang Baru">
                                    <input type="hidden" name="id" value="<?= $edit['id_kategori'] ?? ''; ?>">
                                </td>
                                <td style="padding-left:10px;">
                                    <button id="tombol-simpan" class="btn btn-primary">
                                        <i class="fa fa-edit"></i> Ubah Data
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php else : ?>
                    <form method="POST" action="#">
                        <table>
                            <tr>
                                <td style="width:15pc;">
                                    <input type="text" class="form-control" required name="kategori" placeholder="Masukan Kategori Barang Baru">
                                </td>
                                <td style="padding-left:10px;">
                                    <button id="tombol-simpan" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Insert Data
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php endif; ?>
                <br/>
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
                        <?php 
                        // Ambil data kategori dari database
                        // $hasil = $model->getAllKategori();
                        $no = 1;
                        foreach ($hasil as $isi) :
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $isi['nama_kategori']; ?></td>
                                <td><?= $isi['tgl_input']; ?></td>
                                <td>
                                    <a href="<?= base_url('kategori/edit/' . $isi['id_kategori']); ?>">
                                        <button class="btn btn-warning">Edit</button>
                                    </a>
                                    <a href="<?= base_url('kategori/delete/' . $isi['id_kategori']); ?>" onclick="return confirm('Hapus Data Kategori ?');">
                                        <button class="btn btn-danger">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>
                <div class="clearfix" style="padding-top:16%;"></div>
            </div>
        </div>
    </section>
</section>


<?= $this->endSection() ?>
