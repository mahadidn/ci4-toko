<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Data Laporan Penjualan
                    <!-- <a style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
                        <button class="btn btn-danger">RESET</button>
                    </a> -->
                    <?php if(!empty($_GET['cari'])): ?>
                        <?= 'Periode Bulan ke - ' . $_POST['bln'] . ' Tahun ' . $_POST['thn']; ?>
                    <?php endif; ?>
                </h3>
                <br/>
                <h4>Cari Laporan Per Bulan</h4>
                <form method="post" action="<?= base_url('laporan/cari') ?>">
                    <table class="table table-striped">
                        <tr>
                            <th>Pilih Bulan</th>
                            <th>Pilih Tahun</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="bln" class="form-control">
                                    <option selected="selected">Bulan</option>
                                    <?php foreach ($bulan as $key => $value): ?>
                                        <option value="<?= $value ?>"><?= $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select name="thn" class="form-control">
                                    <option selected="selected">Tahun</option>
                                    <?php foreach ($tahun as $year): ?>
                                        <option value="<?= $year ?>"><?= $year ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" name="periode" value="ya">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i> Cari
                                </button>
                                <a href="<?= site_url('laporan') ?>" class="btn btn-success">
                                    <i class="fa fa-refresh"></i> Refresh
                                </a>
                            </td>
                        </tr>
                    </table>
                </form>

                <div class="clearfix" style="border-top:1px solid #ccc;"></div>
                <br/><br/>

                <?php if (!empty($_GET['cari'])): ?>
                    <!-- view barang -->
                    <div class="modal-view">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr style="background:#DFF0D8;color:#333;">
                                    <th> No</th>
                                    <th> ID Barang</th>
                                    <th> Nota</th>
                                    <th> Nama Barang</th>
                                    <th> Kategori Barang</th>
                                    <th style="width:10%;"> Jumlah</th>
                                    <th style="width:20%;"> Total</th>
                                    <th> Kasir</th>
                                    <th> Tanggal Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $jumlah = 0;
                                    $bayar = 0;
                                    foreach ($laporan as $isi): 
                                        $bayar += $isi['total'];
                                        $jumlah += $isi['jumlah'];
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $isi['id_barang'] ?></td>
                                    <td><?= $isi['id_nota'] ?></td>
                                    <td><?= $isi['nama_barang'] ?></td>
                                    <td><?= $isi['nama_kategori'] ?></td>
                                    <td><?= $isi['jumlah'] ?></td>
                                    <td>Rp. <?= number_format($isi['total']) ?>,-</td>
                                    <td><?= $isi['nm_member'] ?></td>
                                    <td><?= $isi['tanggal_input'] ?></td>
                                </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total Terjual</th>
                                    <th><?= $jumlah ?></th>
                                    <th>Rp. <?= number_format($bayar) ?>,-</th>
                                    <th colspan="2" style="background:#ddd"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php else: ?>
                    <!-- view barang -->
                    <div class="modal-view">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr style="background:#DFF0D8;color:#333;">
                                    <th> No</th>
                                    <th> ID Barang</th>
                                    <th> Nama Barang</th>
                                    <th style="width:10%;"> Jumlah</th>
                                    <th style="width:20%;"> Total</th>
                                    <th> Kasir</th>
                                    <th> Tanggal Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $bayar = 0;  // Initialize $bayar here
    $jumlah = 0; // Initialize $jumlah here
                                    foreach ($laporan as $isi): 
                                        $bayar += $isi['total'];
                                        $jumlah += $isi['jumlah'];
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $isi['id_barang'] ?></td>
                                    <td><?= $isi['nama_barang'] ?></td>
                                    <td><?= $isi['jumlah'] ?></td>
                                    <td>Rp. <?= number_format($isi['total']) ?>,-</td>
                                    <td><?= $isi['nm_member'] ?></td>
                                    <td><?= $isi['tanggal_input'] ?></td>
                                </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total Terjual</th>
                                    <th><?= $jumlah ?></th>
                                    <th>Rp. <?= number_format($bayar) ?>,-</th>
                                    <th colspan="2" style="background:#ddd"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php endif; ?>
                <div class="clearfix" style="padding-top:5pc;"></div>
            </div>
        </div>
    </section>
</section>

<?= $this->endSection() ?>
