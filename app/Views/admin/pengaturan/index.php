<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Pengaturan Toko</h3>
						<br>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Ubah Data Berhasil !</p>
						</div>
						<?php }?>
						<table class="table table-stripped">
							<thead>
								<tr>
									<td>Nama Toko</td>
									<td>Alamat Toko</td>
									<td>Kontak (Hp)</td>
									<td>Nama Pemilik Toko</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
								<form id="formSimpan" method="post" action="/pengaturan">		
								<tr>
									<td><input class="form-control" name="namatoko" value="<?php echo $toko['nama_toko'];?>" placeholder="Nama Toko"></td>
									<td><input class="form-control" name="alamat" value="<?php echo $toko['alamat_toko'];?>" placeholder="Alamat Toko"></td>
									<td><input class="form-control" name="kontak" value="<?php echo $toko['tlp'];?>" placeholder="Kontak (Hp)"></td>
									<td><input class="form-control" name="pemilik" value="<?php echo $toko['nama_pemilik'];?>" placeholder="Nama Pemilik Toko"></td>
									<td><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-pencil"></i> Update Data</button></td>
								</tr>
								</form>
							</tbody>
						</table>
						<div class="clearfix" style="padding-top:41%;"></div>
				  </div>
              </div>
          </section>
      </section>
	
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Perbesar teks judul */
.swal-title-large {
    font-size: 3rem; /* Besar teks judul */
    font-weight: bold;
    color: #333;
}

/* Perbesar teks isi */
.swal-text-large {
    font-size: 3rem; /* Besar teks isi */
    size: 5rem;
    color: #555;
}

.text {
    font-size: 3rem;
}

/* Perbesar tombol */
.swal-button-large {
    font-size: 1.5rem; /* Besar teks tombol */
    padding: 0.8rem 1.5rem; /* Tambahkan padding */
}

</style>

<script>
    $('#tombol-simpan').click(function (event) { 
        event.preventDefault(); // Mencegah pengiriman form secara default

        Swal.fire({
            title: "Apakah ingin diubah?",
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
                
                $('#formSimpan').submit(); // Kirim form
            } else {
            }
        });
    });
</script>

<?php if (session()->getFlashdata('berhasil')) : ?>
    <script>
        Swal.fire({
            title: "<strong><?= session()->getFlashdata('berhasil') ?></strong>",
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


<?= $this->endSection(); ?>