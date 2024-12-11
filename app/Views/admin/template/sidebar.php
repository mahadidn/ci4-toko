<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered">
                <a>
                    <img src="<?= base_url('assets/img/user/' . session()->get('gambar')) ?>" 
                         class="img-circle" 
                         width="100" 
                         height="110">
                </a>
            </p>
            <h5 class="centered"><?= session()->get('nama') ?></h5>
            <h5 class="centered">( <?= session()->get('nik') ?> )</h5>

            <li class="mt">
                <a href="<?= base_url('/') ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Master 
                        <span style="padding-left:2px;"> 
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                </a>
                <ul class="sub">
                    <li><a href="<?= base_url('barang') ?>">Barang</a></li>
                    <li><a href="<?= base_url('kategori') ?>">Kategori</a></li>
                    <li><a href="<?= base_url('user') ?>">User</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Transaksi 
                        <span style="padding-left:2px;"> 
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                </a>
                <ul class="sub">
                    <li><a href="<?= base_url('jual') ?>">Transaksi Jual</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cog"></i>
                    <span>Setting 
                        <span style="padding-left:2px;"> 
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                </a>
                <ul class="sub">
                    <li><a href="<?= base_url('pengaturan') ?>">Pengaturan Toko</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
