<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Keranjang Penjualan</h3>
                <br>

                <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <p>Edit Data Berhasil !</p>
                    </div>
                <?php } ?>
                
                <?php if(isset($_GET['remove'])) { ?>
                    <div class="alert alert-danger">
                        <p>Hapus Data Berhasil !</p>
                    </div>
                <?php } ?>
                
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4><i class="fa fa-search"></i> Cari Barang</h4>
                        </div>
                        <div class="panel-body">
                            <input type="text" id="cari" class="form-control" name="cari" placeholder="Masukan : Kode / Nama Barang [ENTER]">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4><i class="fa fa-list"></i> Hasil Pencarian</h4>
                        </div>
                        <div class="panel-body">
                            <div id="hasil_cari">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Merk</th>
                                            <th>Harga Jual</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tunggu"></div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4><i class="fa fa-shopping-cart"></i> KASIR
                                <a class="btn btn-danger pull-right" style="margin-top:-0.5pc;" href="#">
                                    <b>RESET KERANJANG</b>
                                </a>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <div id="keranjang">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b>Tanggal</b></td>
                                        <td><input type="text" readonly="readonly" class="form-control" value="<?= date("j F Y, G:i"); ?>" name="tgl"></td>
                                    </tr>
                                </table>
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Barang</td>
                                            <td style="width:10%;">Jumlah</td>
                                            <td style="width:20%;">Total</td>
                                            <td>Kasir</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total_bayar = 0; $no = 1; ?>
                                        <?php foreach($penjualan as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['nama_barang']; ?></td>
                                                <td>
                                                    <form method="POST" action="/jual/edit-barang">
                                                        <input type="number" name="jumlah" value="<?= $isi['jumlah']; ?>" class="form-control">
                                                        <input type="hidden" name="id" value="<?= $isi['id_penjualan']; ?>" class="form-control">
                                                        <input type="hidden" name="id_barang" value="<?= $isi['id_barang']; ?>" class="form-control">
                                                </td>
                                                <td>Rp.<?= number_format($isi['total']); ?>,-</td>
                                                <td><?= $isi['nm_member']; ?></td>
                                                <td>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                    </form>
                                                    <a href="/jual/hapus-barang?brg=<?= $isi['id_barang'] ?>&jml=<?= $isi['jumlah'] ?>&id=<?= $isi['id_penjualan'] ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php $no++; $total_bayar += $isi['total']; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <br/>
                                <div id="kasirnya">
                                    <table class="table table-stripped">
                                        <form method="POST" action="/jual/bayar">
                                            <?php foreach($penjualan as $isi){;?>
												<input type="hidden" name="id_barang[]" value="<?php echo $isi['id_barang'];?>">
												<input type="hidden" name="id_member[]" value="<?php echo $isi['id_member'];?>">
												<input type="hidden" name="jumlah[]" value="<?php echo $isi['jumlah'];?>">
												<input type="hidden" name="total1[]" value="<?php echo $isi['total'];?>">
											<?php $no++; }?>
											<input type="hidden" name="periode" value="<?php echo date('m-Y');?>">
											<input type="hidden" name="tanggal" value="<?php echo date("j F Y");?>" >

                                            <tr>
                                                <td>Total Semua</td>
                                                <td><input type="text" class="form-control" name="total" value="<?= $total_bayar; ?>"></td>
                                                <td>Bayar</td>
                                                <td><input type="text" class="form-control" name="bayar"></td>
                                                <td><button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button></td>
                                            </tr>
                                        </form>
                                        <tr>
                                            <td>Kembali</td>
                                            <td><input type="text" class="form-control" value="0"></td>
                                            <td></td>
                                            <td>
                                                <a href="#" class="btn btn-default">
                                                    <i class="fa fa-print"></i> Print Untuk Bukti Pembayaran
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <br/>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<script>

    $(document).ready(function() {
        $("#cari").change(function() {
            var query = $(this).val(); // Ambil nilai input
            if (query.length >= 1) { // Mulai pencarian jika panjang minimal 1 karakter
                $.ajax({
                    url: "<?= base_url('/jual/cari-barang') ?>", // Endpoint pencarian
                    type: "GET",
                    data: { q: query },
                    dataType: "json",
                    beforeSend: function() {
                        $("#hasil_cari tbody").html("<tr><td colspan='5'>Sedang mencari...</td></tr>");
                    },
                    success: function(data) {
                        var html = "";
                        if (data.length > 0) {
                            data.forEach(function(item) {
                                html += `<tr>
                                    <td>${item.id_barang}</td>
                                    <td>${item.nama_barang}</td>
                                    <td>${item.merk}</td>
                                    <td>${item.harga_jual}</td>
                                    <td>
                                        <a href="/jual/tambah-barang?id_barang=${item.id_barang}&id_kasir=<?= session()->get('id_member') ?>" class="btn btn-success">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </td>
                                </tr>`;
                            });
                        } else {
                            html = "<tr><td colspan='5'>Barang tidak ditemukan.</td></tr>";
                        }
                        $("#hasil_cari tbody").html(html);
                    },
                    error: function() {
                        $("#hasil_cari tbody").html("<tr><td colspan='5'>Terjadi kesalahan. Coba lagi.</td></tr>");
                    }
                });
            } else {
                $("#hasil_cari tbody").html("<tr><td colspan='5'>Masukkan minimal 1 karakter untuk mencari.</td></tr>");
            }
        });
    });
</script>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <script>
        alert("Stok tidak mencukupi");
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('errorUangKurang')) : ?>
    <script>
        alert("Saldo Tidak Cukup Untuk Melakukan Pembayaran");
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('successBelanja')) : ?>
    <script>
        alert("Berhasil belanja");
    </script>
<?php endif; ?>

<?= $this->endSection() ?>