<?php 
	// require 'config.php';
	// include $view;
	// $lihat = new view($config);
	// $toko = $lihat -> toko();
	// $hsl = $lihat -> penjualan();
    if(is_null($data)){

?>
    <h1>Error 404</h1>
    <p>Halaman yang anda cari tidak ditemukan</p>  

<?php   
    die();
    }
?>
<html>
	<head>
		<title>print</title>
		<link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<center>
						<p><?= $data['toko']['nama_toko'];?></p>
						<p><?= $data['toko']['alamat_toko'] ?></p>
						<p>Tanggal : <?= date("j F Y, G:i");?></p>
						<p>Kasir : <?= $data['toko']['nm_member'];?></p>
                        <p>No transaksi: <?= $data['no_transaksi'] ?></p>
					</center>
					<table class="table table-bordered" style="width:100%;">
						<tr>
							<td>No.</td>
							<td>Barang</td>
							<td>Jumlah</td>
							<td>Total</td>
						</tr>
						<?php $no=1; foreach($data['penjualan'] as $isi){?>
						<tr>
							<td><?= $no;?></td>
							<td><?= $isi['nama_barang'];?></td>
							<td><?= $isi['jumlah'];?></td>
							<td><?= $isi['total'];?></td>
						</tr>
						<?php $no++; }?>
					</table>
					<div class="pull-right">
   						 Total : Rp.<?= $data['jumlah'] ?>,-
   						 <br/>
  						  Bayar : Rp.<?= $data['bayar'] ?>,-
  						  <br/>
   						 Kembali : Rp.<?= $data['kembalian'] ?>,-
					</div>
					<div class="clearfix"></div>
					<center>
						<p>Terima Kasih Telah berbelanja di toko kami !</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
