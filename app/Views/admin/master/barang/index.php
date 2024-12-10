<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Data Barang</h3>
                <br/>

                <!-- Flash Message -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <p><?= session()->getFlashdata('success'); ?></p>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <p><?= session()->getFlashdata('error'); ?></p>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Tombol Tambah Data -->
                  <!-- Tombol Tambah Data -->
                  <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i> Insert Data
                </button>
                <div class="clearfix"></div>
                <br/>

                <!-- Tabel Barang -->
                <div class="modal-view">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr style="background:#DFF0D8;color:#333;">
                                <th>No.</th>
                                <th>ID Barang</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Merk</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $no = 1;
                                $total_beli = 0;
                                $total_jual = 0;
                                $total_stok = 0;
                                foreach ($barang as $isi) { 
                                    $total_beli += $isi['harga_beli'];
                                    $total_jual += $isi['harga_jual'];
                                    $total_stok += $isi['stok'];
                                ?>
                           
                           <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $isi['id_barang']; ?></td>
                                    <td><?= $isi['nama_kategori']; ?></td>
                                    <td><?= $isi['nama_barang']; ?></td>
                                    <td><?= $isi['merk']; ?></td>
                                    <td>Rp.<?= number_format($isi['harga_beli']); ?>,-</td>
                                    <td>Rp.<?= number_format($isi['harga_jual']); ?>,-</td>
                                    <td>
                                        <?php if ($isi['stok'] == '0') { ?>
                                            <button class="btn btn-danger">Habis</button>
                                        <?php } else { ?>
                                            <?= $isi['stok']; ?>
                                        <?php } ?>
                                    </td>
                                    <td><?= $isi['satuan_barang']; ?></td>
                                    <td>
                                        <?php if ($isi['stok'] <= '3') { ?>
                                            <form method="POST" action="<?= site_url('barang/restok') ?>">
                                                <input type="number" name="restok" class="form-control" min="1" required>
                                                <input type="hidden" name="id" value="<?= $isi['id_barang']; ?>">
                                                <button type="submit" class="btn btn-primary">Restok</button>
                                            </form>
                                        <?php } else { ?>
                                            <a href="<?= site_url('barang/detail/'.$isi['id_barang']) ?>">
                                                <button class="btn btn-primary btn-xs">Details</button>
                                            </a>
                                            <a href="<?= site_url('barang/edit/'.$isi['id_barang']) ?>">
                                                <button class="btn btn-warning btn-xs">Edit</button>
                                            </a>
                                            <a href="<?= site_url('barang/delete/'.$isi['id_barang']) ?>" 
                                               onclick="javascript:return confirm('Hapus Data barang?');">
                                                <button class="btn btn-danger btn-xs">Hapus</button>
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th>Rp.<?= number_format($total_beli); ?>,-</th>
                                <th>Rp.<?= number_format($total_jual); ?>,-</th>
                                <th><?= $total_stok; ?></th>
                                <th colspan="2" style="background:#ddd"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

               <!-- Modal Tambah Barang -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border-radius:0px;">
                            <div class="modal-header" style="background:#285c64;color:#fff;">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
                            </div>
                            <form action="<?= site_url('/barang/create') ?>" method="POST">
                                <div class="modal-body">
                                    <table class="table table-striped bordered">
                                    <tr>
    <td>ID Barang</td>
    <td><input type="text" readonly="readonly" required class="form-control" name="id" value="BG-<?= sprintf('%03d', count($barang) + 1); ?>"></td>
</tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>
                                        <select name="kategori" class="form-control" required>
                                            <option value="">Pilih Kategori</option>
                                            <?php foreach ($kategori as $kategori_item) : ?>
                                                <option value="<?= $kategori_item['id_kategori']; ?>"><?= $kategori_item['nama_kategori']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama"></td>
                                        </tr>
                                        <tr>
                                            <td>Merk Barang</td>
                                            <td><input type="text" placeholder="Merk Barang" required class="form-control" name="merk"></td>
                                        </tr>
                                        <tr>
                                            <td>Harga Beli</td>
                                            <td><input type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
                                        </tr>
                                        <tr>
                                            <td>Harga Jual</td>
                                            <td><input type="number" placeholder="Harga Jual" required class="form-control" name="jual"></td>
                                        </tr>
                                        <tr>
                                            <td>Satuan Barang</td>
                                            <td>
                                                <select name="satuan" class="form-control" required>
                                                    <option value="#">Pilih Satuan</option>
                                                    <option value="PCS">PCS</option>
                                                    <option value="Pack">Pack</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Input</td>
                                            <td><input type="text" required readonly="readonly" class="form-control" value="<?= date("j F Y, G:i"); ?>" name="tgl"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?= $this->endSection() ?>