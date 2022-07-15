<section class="content mt-2">

    <!-- Default box -->
    <div class="card card-solid">



        <div class="card-body pb-0">


            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">

                            <h3 class="card-title">Tambah Jasa Desain Grafis</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body register-card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?php echo base_url(); ?>jasaadmin/tambah_grafis" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan nama jasa">
                                    <div class="input-group-append">
                                        <div class="input-group-text">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <!-- /.col -->
                                    <div class="col-1 ">
                                        <button type="submit" class="btn btn-primary ">Tambah</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>



                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Jasa Desain Grafis</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body register-card-body">

                            <!-- /.card-header -->
                            <?= $this->session->flashdata('pesan'); ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Ketgori</th>

                                        <th style="width: 25%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($grafis as $u) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $u->nama ?></td>

                                            <td>

                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'jasaadmin/hapus_grafis/' . $u->id ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'>
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

                        </div>
                        <!-- /.card-body -->

                        <!-- /.card -->





                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </div>
    </div>
</section>