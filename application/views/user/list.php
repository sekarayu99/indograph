<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata('message');?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2">
        <a href="<?= base_url('user/tambah_user'); ?>" title="Tambah user" class="btn btn-success">
            <i class="fa fa-plus"> Tambah User</i></a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                foreach ($admin as $u) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $u->id ?></td>
                            <td><?= $u->nama ?></td>
                            <td><?= $u->email ?></td>
                            <td><?= $u->password ?></td>
                            <td><?= $u->role_id ?></td>
                            <td><?= $u->status ?></td>
                            <td>
                                <a href="<?= base_url('user/edit/' . $u->id); ?>" title="Edit user"
                                    class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                                <a href="<?= base_url('user/hapus/' . $u->id); ?>" title="Hapus user"
                                    class="btn btn-danger btn-xs"
                                    onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fa fa-pencil"> Hapus</i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++;
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