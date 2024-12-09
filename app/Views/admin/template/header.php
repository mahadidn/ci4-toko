<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Arga Dwi Mart </title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon2.ico') ?>">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/zabuto_calendar.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/gritter/css/jquery.gritter.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/lineicons/style.css') ?>">    
    
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style-responsive.css') ?>" rel="stylesheet">

        <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery-2.2.3.min.js') ?>"></script>
    <style>
		.header{background:#527be3; color:#fff;}
		#main-content{ background:#fff;}
		#hidden {display:none}
	</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b><?php // echo $toko['nama_toko'];?></b> <small style="padding-left:5px;font-size:13px;"><?php // echo $toko['alamat_toko'];?></small></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                   
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" onclick="javascript: return confirm('Ingin Logout ?');" href="<?= base_url('/logout') ?>">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
