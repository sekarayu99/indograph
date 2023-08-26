<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata('message');?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <a href="<?= base_url('barang/tambah'); ?>" title="Tambah barang" class="btn btn-success">
            <i class="fa fa-plus"> Tambah Barang</i></a>
    </div>
</div><br>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Penerbit</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id Barang </th>
                            <th>Nama Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                foreach ($barang as $b) { ?>
                        <tr>
                            <td><?= $b->id_barang ?></td>
                            <td><?= $b->nama_barang ?></td>
                            <td>
                                <a href="<?= base_url('barang/edit/' . $b->id_barang); ?>" title="Edit barang"
                                    class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                                <a href="<?= base_url('barang/hapus/' . $b->id_barang); ?>" title="Hapus barang"
                                    class="btn btn-danger btn-xs"
                                    onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fa fa-pencil"> Hapus</i>
                                </a>
                            </td>
                        </tr>
                        <?php
                } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->