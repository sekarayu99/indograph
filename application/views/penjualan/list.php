<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata('message');?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <a href="<?= base_url('penjualan/tambah'); ?>" title="Tambah Penjualan" class="btn btn-success">
            <i class="fa fa-plus"> Transaksi Penjualan</i></a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $title;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Diskon %</th>
                            <th>PPN 11%</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                foreach ($penjualan->result() as $p) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= mediumdate_indo($p->tanggal) ?></td>
                            <td><?= $p->nama ?></td>
                            <td><?= $p->nama_barang ?></td>
                            <td>Rp.<?= number_format($p->harga,'0','','.');?></td>
                            <td><?= $p->qty ?></td>
                            <td>Rp.<?= number_format($p->total,'0','','.');?></td>
                            <td><?= $p->diskon ?></td>
                            <td>Rp.<?= number_format($p->ppn,'0','','.');?></td>
                            <td>
                                <a href="<?= base_url('penjualan/edit/' . $p->id); ?>" title="Edit Data"
                                    class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> </i>
                                </a>
                                <a href="<?= base_url('penjualan/hapus/' . $p->id); ?>" title="Hapus Data"
                                    class="btn btn-danger btn-xs"
                                    onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fa fa-trash"> </i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++;
                } ?>
                    </tbody>
                    <tfoot>
                        <?php
                        foreach($jumlah as $j) {
                            ?>

                        <tr>
                            <td colspan="6" class="text-bold text-right">Jumlah : </td>
                            <td class="text-bold">Rp.<?= number_format($j->jumlah,'0','','.') ?></td>
                            <td></td>
                            <td class="text-bold">Rp.<?= number_format($j->total_ppn,'0','','.') ?></td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->