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
            <form class="form-horizontal" action="<?= base_url('user/update');?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="id" class="col-sm-2 control-label">Id</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?= $user['id'];?>"
                                placeholder="Id" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'];?>"
                                placeholder="Nama" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= $user['email'];?>" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role_id" class="col-sm-2 control-label">Role Id</label>

                        <div class="col-sm-10">
                            <select class="form-control select2" id="role_id" name="role_id" required>
                                <?php
                      foreach($role as $r) {
                        if($role['id'] == $r->id) {?>
                                <option value="<?= $r->id?>" selected><?= $r->nama ?></option>
                                <?php } else {?>
                                <option value="<?= $r->id ?>"><?= $r->nama ?></option>
                                <?php }
                      }
                   ?>
                            </select>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="<?= base_url('user');?>" class="btn btn-default"> Batal</a>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
</section>
<!-- /.content -->