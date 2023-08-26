<?php
if ($this->session->userdata('role_id') == 'Administrator') {?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url();?>assets/dist/img/user-icon.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $user['nama'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?= base_url('dashboard');?>">
                    <i class="fa fa-dashboard"></i> <span> Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('user');?>">
                    <i class="fa fa-user"></i> <span> Data Admin</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('barang');?>">
                    <i class="fa fa-shopping-bag"></i> <span> Data Barang</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-area-chart"></i>
                    <span>Transaksi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('pembelian');?>"><i class="fa fa-circle-o"></i> Pembelian</a></li>
                    <li><a href="<?= base_url('penjualan');?>"><i class="fa fa-circle-o"></i> Penjualan</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                    <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('laporan/pembelian');?>"><i class="fa fa-circle-o"></i> Laporan
                            Pembelian</a></li>
                    <li><a href="<?= base_url('laporan/penjualan');?>"><i class="fa fa-circle-o"></i> Laporan
                            Penjualan</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>PPN</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('ppn');?>"><i class="fa fa-circle-o"></i> Hitung PPN</a></li>
                </ul>
            </li>
            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                    <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Laporan
                            Peminjaman</a></li>
                </ul>
            </li> -->
            <li>
                <a href="<?= base_url('login/logout');?>">
                    <i class="fa fa-sign-out"></i> <span> Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php } else {?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url();?>assets/dist/img/user-icon.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $user['nama'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <<li>
                <a href="<?= base_url('dashboard');?>">
                    <i class="fa fa-dashboard"></i> <span> Dashboard</span>
                </a>
                </li>
                <li>
                    <a href="<?= base_url('user');?>">
                        <i class="fa fa-user"></i> <span> Data Admin</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('barang');?>">
                        <i class="fa fa-shopping-bag"></i> <span> Data Barang</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-area-chart"></i>
                        <span>Transaksi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('pembelian');?>"><i class="fa fa-circle-o"></i> Pembelian</a></li>
                        <li><a href="<?= base_url('penjualan');?>"><i class="fa fa-circle-o"></i> Penjualan</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text"></i>
                        <span>Laporan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('laporan/pembelian');?>"><i class="fa fa-circle-o"></i> Laporan
                                Pembelian</a></li>
                        <li><a href="<?= base_url('laporan/penjualan');?>"><i class="fa fa-circle-o"></i> Laporan
                                Penjualan</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span>PPN</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('ppn');?>"><i class="fa fa-circle-o"></i> Hitung PPN</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('login/logout');?>">
                        <i class="fa fa-sign-out"></i> <span> Logout</span>
                    </a>
                </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title;?>
        </h1>
        <!-- <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('dashboard/'.$this->uri->segment(2));?>"><?= ucfirst(str_replace('_', '', $this->uri->segment(2)));?></a></li>
        <li class="active"><?= $title;?></li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">