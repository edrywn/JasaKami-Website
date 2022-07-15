<!-- Portfolio -->

<section class="content mt-2">

    <!-- Default box -->
    <div class="card card-solid">



        <div class="card-body pb-0">


            <div class="row">
                <div class="col">
                    <div class="card">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-header">

                            <h3 class="card-title">Tambah Fitur</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body register-card-body">

                            <form action="<?php echo base_url(); ?>jasaadmin/tambah_fitur" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="nama" class="form-control" required placeholder="Masukan Fitur">
                                    <div class="input-group-append">
                                        <div class="input-group-text">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <textarea type="textarea" name="deskripsi" class="form-control" required placeholder="Masukan Deskripsi"></textarea>
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
                            <h3 class="card-title">Daftar Fitur</h3>

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
                                        <th>Fitur</th>
                                        <th>Deskripsi</th>

                                        <th style="width: 25%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($fitur as $u) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->deskripsi ?></td>

                                            <td>

                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'jasaadmin/hapus_fitur/' . $u->id ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'>
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

            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahClient"><i class="fa fa-user-plus"></i> Tambah Paket</button>


            <div class="modal fade" id="tambahClient" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Tambah Paket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="<?= base_url('jasaadmin/tambah_paket'); ?>">
                                    <!-- <div class="form-group">
                                        <label>Nama</label>
                                        <select class="form-control select2" name="nama" style="width: 100%;" required='required'>
                                            <?php foreach ($tb_filter as $u) { ?>
                                                <option><?= $u->filter ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="inputName">Nama Paket</label>
                                        <input type="text" id="inputName" name="nama" class="form-control" placeholder="Masukan Nama Paket">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Harga Normal</label>
                                        <input type="text" name="harga" id="inputName" class="form-control" placeholder="Masukan Harga Normal">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Harga Promo</label>
                                        <input type="text" id="inputName" class="form-control" name="promo" placeholder="Masukan Harga Promo">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Pilih Fitur</label>

                                        <?php foreach ($fitur as $i) { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="fitur[]" value="<?= $i->nama ?>">
                                                <label class="form-check-label"><?= $i->nama ?></label>
                                            </div>
                                        <?php } ?>


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
                                    <div class="form-group">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tag" value="SARAN">
                                            <label class="form-check-label">Rekomendasi</label>
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
                    <h3 class="card-title">Daftar Paket</h3>
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
                                <th style="width: 10px">No</th>
                                <th style="width: 15%">Paket</th>
                                <th style="width: 10%">Harga</th>
                                <th>Promo</th>
                                <th>Fitur</th>
                                <th>Gambar</th>
                                <th>Rekomendasi</th>
                                <th style="width: 15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($js_website as $u) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u->nama ?></td>
                                    <td><?= $u->harga ?></td>
                                    <td><?= $u->promo ?></td>
                                    <td><?= $u->fitur ?></td>

                                    <td>
                                        <img width="100px" src="<?= base_url('uploads/website/' . $u->gambar); ?>" alt="">
                                    </td>
                                    <td><?= $u->tag ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editPaket<?= $u->id ?>">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'jasaadmin/hapus_paket/' . $u->id ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'>
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
            <?php foreach ($js_website as $u) { ?>
                <div class="modal fade" id="editPaket<?= $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                                    <form action="<?php echo base_url('jasaadmin/edit_paket'); ?> " method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="inputName" class="form-control" value="<?= $u->id; ?>">


                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="text" id="inputName" name="nama" class="form-control" value="<?= $u->nama; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Harga</label>
                                            <input type="text" id="inputName" class="form-control" name="harga" value="<?= $u->harga; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Promo</label>
                                            <input type="text" id="inputName" class="form-control" name="promo" value="<?= $u->promo; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Pilih Fitur</label>

                                            <?php foreach ($fitur as $i) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="fitur[]" value="<?= $i->nama ?>">
                                                    <label class="form-check-label"><?= $i->nama ?></label>
                                                </div>
                                            <?php } ?>
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

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tag" value="Rekomendasi">
                                                <label class="form-check-label">Rekomendasi</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tag" value="Biasa">
                                                <label class="form-check-label">Biasa</label>
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