<section class="content">
    <!-- right column -->
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title;?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?= base_url('barang/update');?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="id_barang" class="col-sm-2 control-label">Id Barang</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_barang" name="id_barang"
                                placeholder="Id Barang" value="<?= $barang['id_barang'];?>" readonly>
                        </div>
                    </div>
                </div>


                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                placeholder="Nama Barang" value="<?= $barang['nama_barang'];?>" required>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="<?= base_url('barang');?>" class="btn btn-default"> Batal</a>
                    <button type="submit" class="btn btn-info">Edit</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
</section>
<!-- /.content -->