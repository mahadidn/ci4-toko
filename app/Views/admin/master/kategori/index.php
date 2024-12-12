<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Data Kategori</h3>
                <br/>
                <?php if (session()->getFlashdata('success')) : ?>
                    <script>
                        Swal.fire({
                            title: "<strong><?= session()->getFlashdata('success') ?></strong>",
                            icon: "success",
                            focusConfirm: false,
                            confirmButtonText: `
                                OK
                            `,
                            width: '600px',
                            customClass: {
                                title: 'swal-title-large',
                                htmlContainer: 'swal-text-large',
                                confirmButton: 'swal-button-large',
                                cancelButton: 'swal-button-large'
                            }
                            
                        });
                    </script>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success-edit')) : ?>
                    <script>
                        Swal.fire({
                            title: "<strong><?= session()->getFlashdata('success-edit') ?></strong>",
                            icon: "success",
                            focusConfirm: false,
                            confirmButtonText: `
                                OK
                            `,
                            width: '600px',
                            customClass: {
                                title: 'swal-title-large',
                                htmlContainer: 'swal-text-large',
                                confirmButton: 'swal-button-large',
                                cancelButton: 'swal-button-large'
                            }
                            
                        });
                    </script>
                <?php endif; ?>
                <?php if (session()->getFlashdata('remove')) : ?>
                    <script>
                        Swal.fire({
                            title: "<strong><?= session()->getFlashdata('remove') ?></strong>",
                            icon: "success",
                            focusConfirm: false,
                            confirmButtonText: `
                                OK
                            `,
                            width: '600px',
                            customClass: {
                                title: 'swal-title-large',
                                htmlContainer: 'swal-text-large',
                                confirmButton: 'swal-button-large',
                                cancelButton: 'swal-button-large'
                            }
                            
                        });
                    </script>
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
                                    <a href="#" onclick="return confirmCategory('<?= $isi['id_kategori'] ?>');" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>

<script>
    function confirmCategory(id_kategori) { 
        Swal.fire({
            title: "Hapus Data Kategori?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            width: '600px',
            customClass: {
                title: 'swal-title-large',
                htmlContainer: 'swal-text-large',
                confirmButton: 'swal-button-large',
                cancelButton: 'swal-button-large'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `kategori/delete/${id_kategori}`;
            }
        });
     }
</script>

<?= $this->endSection() ?>
