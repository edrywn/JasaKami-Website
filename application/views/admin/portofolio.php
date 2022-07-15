<!-- Portfolio -->

<section class="content mt-2">

    <!-- Default box -->
    <div class="card card-solid">



        <div class="card-body pb-0">


            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">

                            <h3 class="card-title">Tambah Kategori</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body register-card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?php echo base_url(); ?>portofolioadmin/tambah_kategori" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="filter" class="form-control" placeholder="Masukan Kategori">
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
                            <h3 class="card-title">Daftar Kategori</h3>

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
                                    foreach ($tb_filter as $u) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $u->filter ?></td>

                                            <td>

                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'portofolioadmin/hapus_kategori/' . $u->id ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'>
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

            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahClient"><i class="fa fa-user-plus"></i> Tambah Portfolio</button>


            <div class="modal fade" id="tambahClient" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Tambah Portfolio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="<?= base_url('portofolioadmin/tambah_portofolio'); ?>">
                                    <div class="form-group">
                                        <label>Ketegori</label>
                                        <select class="form-control select2" name="kategori" style="width: 100%;" required='required'>
                                            <?php foreach ($tb_filter as $u) { ?>
                                                <option><?= $u->filter ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName">Nama</label>
                                        <input type="text" id="inputName" name="nama" class="form-control" placeholder="Masukan Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Deskripsi</label>
                                        <input type="text" name="deskripsi" id="inputName" class="form-control" placeholder="Masukan Deskripsi">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Link</label>
                                        <input type="text" id="inputName" class="form-control" name="link" placeholder="Masukan Link">
                                    </div>

                                    <div class="form-group">
                                        <label for="InputFile">Logo Client</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="gambar" class="custom-file-input" id="InputFile">
                                                <label class="custom-file-label" for="InputFile">Pilih Gambar</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

            <!-- Default box -->


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bordered Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="width: 15%">Kategori</th>
                                <th style="width: 20%">Nama</th>
                                <th>Deskripsi</th>
                                <th>Link</th>
                                <th>Gambar</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($portofolio as $u) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u->kategori ?></td>
                                    <td><?= $u->nama ?></td>
                                    <td><?= $u->deskripsi ?></td>
                                    <td><a class="btn btn-success" href="<?= $u->link ?>"><i class="fas fa-link"></i></a></td>
                                    <td>
                                        <img width="100px" src="<?= base_url('uploads/portofolio/' . $u->gambar); ?>" alt="">
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editPortfolio<?= $u->id ?>">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'portofolioadmin/hapus_portofolio/' . $u->id ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'>
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card-body -->

            <!-- /.card -->
            <?php foreach ($portofolio as $u) { ?>
                <div class="modal fade" id="editPortfolio<?= $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Edit Portfolio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="card-body">
                                    <form action="<?php echo base_url('portofolioadmin/edit_portofolio'); ?> " method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="inputName" class="form-control" value="<?= $u->id; ?>">

                                            <label>Ketegori</label>
                                            <select class="form-control select2" name="kategori" value="<?= $u->kategori; ?>" style="width: 100%;">
                                                <?php foreach ($tb_filter as $i) { ?>
                                                    <option><?= $i->filter ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="text" id="inputName" name="nama" class="form-control" value="<?= $u->nama; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Deskripsi</label>
                                            <input type="text" id="inputName" class="form-control" name="deskripsi" value="<?= $u->deskripsi; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Link</label>
                                            <input type="text" id="inputName" class="form-control" name="link" value="<?= $u->link; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="InputFile">Gambar</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="gambar" class="custom-file-input" id="InputFile">
                                                    <label class="custom-file-label" for="InputFile">Pilih Gambar</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
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
        </div>
    </div>
</section>

<!-- AKHIR Portfolio -->