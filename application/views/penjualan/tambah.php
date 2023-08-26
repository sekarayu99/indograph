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
            <form class="form-horizontal" action="<?= base_url('penjualan/simpan');?>" method="post">
                <div class="box-body">

                    <div class="form-group">
                        <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>

                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customer" class="col-sm-2 control-label">Customer</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Customer"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="npwp" class="col-sm-2 control-label">NPWP</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP Customer"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_barang" class="col-sm-2 control-label">Barang</label>

                        <div class="col-sm-10">
                            <select class="form-control select2" id="id_barang" name="id_barang" required>
                                <option value=""> - Pilih Barang - </option>
                                <?php
                        foreach ($barang as $b) {?>
                                <option value="<?= $b->id_barang;?>"><?= $b->nama_barang ?></option>
                                <?php }
                    ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="harga" class="col-sm-2 control-label">Harga</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="qty" class="col-sm-2 control-label">QTY</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="qty" name="qty" placeholder="QTY" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="diskon" class="col-sm-2 control-label">Diskon</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Diskon">
                        </div>
                    </div>




                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="<?= base_url('penjualan');?>" class="btn btn-default"> Batal</a>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
</section>
<!-- /.content -->