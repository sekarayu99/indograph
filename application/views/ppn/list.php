<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pajak Bayar</h3>
                <div class="box-header">
                    <div class="container">
                        <div>
                            <form action="<?= base_url('ppn/filter_periode');?>" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="text-primary"><b>Periode Transaksi </b></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" name="tgl_awal" class="form-control"
                                            placeholder="Tanggal Awal" onfocus="(this.type='date')">
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
                                        <a href="<?= base_url('ppn/cetak');?>"
                                            class="btn btn-danger btn-block btn-print"><i class="fa fa-print"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="container">
                        <form action="<?= base_url('ppn/hitung');?>" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="text-primary"><b> Total Bayar Pajak </b></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="tanggal" class="form-control " placeholder="Tanggal/Bulan"
                                        required>
                                </div>
                                <?php foreach ($jual as $j) { ?>
                                <div class="col-md-2">
                                    <input type="text" name="pajak_keluaran" class="form-control"
                                        placeholder="Pajak Keluaran" value="<?= $j->total_ppn;?>" readonly>
                                </div>
                                <?php } ?>

                                <?php foreach ($beli as $b) { ?>
                                <div class="col-md-2">
                                    <input type="text" name="pajak_masukan" class="form-control "
                                        placeholder="Pajak Masukan" value="<?= $b->total_ppn;?>" readonly>
                                </div>
                                <?php } ?>


                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success btn-block">Hitung</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal/Bulan</th>
                            <th>Pajak Keluaran</th>
                            <th>Pajak Masukan</th>
                            <th>Bayar Pajak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                foreach ($ppn as $p) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $p->tanggal;?></td>
                            <td>Rp. <?= number_format($p->pajak_keluaran,'0','','.') ?></td>
                            <td>Rp. <?= number_format($p->pajak_masukan,'0','','.') ?></td>
                            <td>Rp. <?= number_format($p->bayar_pajak,'0','','.') ?></td>
                        </tr>
                        <?php $i++;
                } ?>
                    </tbody>
                    <!-- <tfoot>
                        <?php foreach ($jumlah as $j) { ?>
                        <tr>
                            <td colspan="5" class="text-bold text-right">Jumlah : </td>
                            <td class="text-bold">Rp. <?= number_format($j->jumlah,'0','','.');?></td>
                            <td class="text-bold">Rp. <?= number_format($j->total_ppn,'0','','.');?></td>
                        </tr>
                        <?php } ?>
                    </tfoot> -->

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


    <!-- /.col -->
</div>