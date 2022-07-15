<section class="content mt-2">

    <!-- Default box -->


    <div class="row">
        <div class="col-6" data-aos="zoom-in" data-aos-delay="600">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Admin</h3>
                </div>
                <div class="card-body register-card-body">

                    <?php
                    if ($this->session->flashdata('error') != '') {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $this->session->flashdata('error');
                        echo '</div>';
                    }
                    ?>


                    <form action="<?php echo base_url(); ?>setting/tambah_admin" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="nama" class="form-control" placeholder="Full name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control" placeholder="User">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>



                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->

        </div>

        <div class="col-6" data-aos="zoom-in" data-aos-delay="600">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Admin</h3>
                </div>
                <div class="card-body register-card-body">

                    <!-- /.card-header -->

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama</th>
                                <th style="width: 40%">Username</th>
                                <th style="width: 25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($admin as $u) {
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $u->nama ?></td>
                                    <td><?php echo $u->username ?></td>

                                    <td>
                                        <a class="btn btn-info btn-sm" href="#s" data-toggle="modal" data-target="#editadmin<?= $u->id; ?>">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'setting/hapus_admin/' . $u->id ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'>
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                            <?php } ?>


                        </tbody>
                    </table>

                    <!-- /.card-body -->
                    <!-- <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div> -->
                </div>
                <!-- /.card-body -->

                <!-- /.card -->





            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->

    </div>
    </div>
    <?php foreach ($admin as $u) { ?>
        <div class="modal fade" id="editadmin<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Edit Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">

                            <form action="<?php echo base_url('setting/edit_admin'); ?> " method="post">
                                <div class="form-group">
                                    <label for="inputName">Nama</label>
                                    <input type="hidden" name="id" id="inputName" class="form-control" value="<?= $u->id; ?>">

                                    <input type="text" name="nama" id="inputName" class="form-control" value="<?= $u->nama; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputPosisi">Username</label>
                                    <input type="text" name="username" id="inputName" class="form-control" value="<?= $u->username; ?>">
                                </div>
                                <div class=" modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>




                        </div>


                    </div>
                </div>
            </div>

        </div>
    <?php } ?>

</section>