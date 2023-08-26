<html>

<head>
    <title></title>
    <style>
    .btn-refresh {
        margin-left: -20px;
    }

    .btn-print {
        margin-left: -40px;
    }

    .btn-pdf {
        margin-left: -60px;
    }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <form action="<?= base_url('laporan/penjualan');?>" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="text-primary"><b>Filter Laporan Penjualan</b></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="text" name="tgl_awal" class="form-control" placeholder="Tanggal Awal"
                                    onfocus="(this.type='date')">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="tgl_akhir" class="form-control tgl_akhir"
                                    placeholder="Tanggal Akhir" onfocus="(this.type='date')">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary btn-block"><i
                                        class="fa fa-filter"></i></button>
                            </div>
                            <div class="col-md-1">
                                <a href="<?= base_url('laporan/penjualan');?>"
                                    class="btn btn-warning btn-block btn-refresh"><i class="fa fa-refresh"></i></a>
                            </div>
                            <div class="col-md-1">
                                <a href="<?= base_url('laporan/printpenjualan');?>"
                                    class="btn btn-danger btn-block btn-print"><i class="fa fa-print"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Tanggal</th>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>PPN 11%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                foreach ($penjualan->result() as $p) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= mediumdate_indo($p->tanggal) ?></td>
                                <td><?= $p->nama_barang ?></td>
                                <td>Rp.<?= number_format($p->harga,'0','','.');?></td>
                                <td><?= $p->qty ?></td>
                                <td>Rp.<?= number_format($p->total,'0','','.');?></td>
                                <td>Rp.<?= number_format($p->ppn,'0','','.');?></td>
                            </tr>
                            <?php $i++;
                } ?>
                        </tbody>
                        <tfoot>
                            <?php foreach ($jumlah as $j) { ?>
                            <tr>
                                <td colspan="5" class="text-bold text-right">Jumlah : </td>
                                <td class="text-bold">Rp. <?= number_format($j->jumlah,'0','','.');?></td>
                                <td class="text-bold">Rp. <?= number_format($j->total_ppn,'0','','.');?></td>
                            </tr>
                            <?php } ?>
                        </tfoot>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</body>

</html>