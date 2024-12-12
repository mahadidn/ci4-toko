   <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              <?php echo date('Y');?> - Copyright © 2024 |
              <a href="" style="color:yellow;font-weight:700;" target="_blank">Arga Dwi Mart</a> | Batumora, Desa Montong Baan

              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery-1.8.3.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script class="include" type="text/javascript" src="<?= base_url('assets/js/jquery.dcjqaccordion.2.7.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.scrollTo.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.nicescroll.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/jquery.sparkline.js') ?>"></script>

	<script src="<?= base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/datatables/dataTables.bootstrap.min.js') ?>"></script>

    <!--common script for all pages-->
    <script src="<?= base_url('assets/js/common-scripts.js') ?>"></script>

    <script type="<?= base_url('text/javascript" src="assets/js/gritter/js/jquery.gritter.js') ?>"></script>
    <script type="<?= base_url('text/javascript" src="assets/js/gritter-conf.js') ?>"></script>

    <!--script for this page-->
    <script src="<?= base_url('assets/js/sparkline-chart.js') ?>"></script>
	<script src="<?= base_url('assets/js/zabuto_calendar.js') ?>"></script>

	<script type="text/javascript">
		//datatable
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable();
		});
	</script>
		<script type="text/javascript">
		//template
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Peringatan !',
            // (string | mandatory) the text inside the notification
            text: 'stok barang ada yang tersisa kurang dari 3 silahkan pesan lagi !',
            // (string | optional) the image to display on the left
            image: 'assets/img/seru.png',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'

        });

        return false;
        });
		</script>
	<script type="application/javascript">

        //angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
		$(document).ready(function(){setTimeout(function(){$(".alert-danger").fadeIn('slow');}, 500);});
		//angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
		setTimeout(function(){$(".alert-danger").fadeOut('slow');}, 5000);

		$(document).ready(function(){setTimeout(function(){$(".alert-success").fadeIn('slow');}, 500);});
		setTimeout(function(){$(".alert-success").fadeOut('slow');}, 5000);

		$(document).ready(function(){setTimeout(function(){$(".alert-warning").fadeIn('slow');}, 500);});
		setTimeout(function(){$(".alert-success").fadeOut('slow');}, 5000);

    </script>
		<script>
			$(".modal-create").hide();
			$(".bg-shadow").hide();
			$(".bg-shadow").hide();
			function clickModals(){
				$(".bg-shadow").fadeIn();
				$(".modal-create").fadeIn();
			}
			function cancelModals(){
				$('.modal-view').fadeIn();
				$(".modal-create").hide();
				$(".bg-shadow").hide();
			}
		</script>

  </body>
</html>
