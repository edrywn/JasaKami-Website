<!-- TEAM -->

<section class="content mt-2">

    <!-- Default box -->
    <div class="card card-solid">

        <div class="card-body pb-0">
            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahClient"><i class="fa fa-user-plus"></i> Tambah Team</button>


            <div class="modal fade" id="tambahClient" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Tambah Team</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="<?= base_url('teamadmin/tambah_team'); ?>">
                                    <div class="form-group">
                                        <label for="inputName">Nama</label>
                                        <input type="text" id="inputName" name="nama" class="form-control" placeholder="Masukan Nama Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Posisi</label>
                                        <input type="text" id="inputName" name="posisi" class="form-control" placeholder="Masukan Nama Posisi">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Deskripsi</label>
                                        <input type="text" id="inputName" name="deskripsi" class="form-control" placeholder="Masukan Nama Deskripsi">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Instagram</label>
                                        <input type="text" id="inputName" name="instagram" class="form-control" placeholder="Masukan Nama Link Instagram">
                                    </div>

                                    <div class="form-group">
                                        <label for="InputFile">Foto</label>
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
                    <h3 class="card-title">Data Team</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="width: 15%">Nama</th>
                                <th style="width: 10%">Posusi</th>
                                <th>Deskripsi</th>
                                <th>Instagram</th>
                                <th>Gambar</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($team as $u) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u->nama ?></td>
                                    <td><?= $u->posisi ?></td>
                                    <td><?= $u->deskripsi ?></td>
                                    <td><a href="<?= $u->instagram ?>">Instagram</a></td>
                                    <td><img width="100px" src="<?= base_url('uploads/team/' . $u->gambar); ?>" alt=""></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editadmin<?= $u->id; ?>">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'teamadmin/hapus_team/' . $u->id ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'>
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
            <?php foreach ($team as $u) { ?>
                <div class="modal fade" id="editadmin<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                                    <form action="<?php echo base_url('teamadmin/edit_team'); ?> " method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="hidden" name="id" id="inputName" class="form-control" value="<?= $u->id; ?>">
                                            <input type="text" id="inputName" class="form-control" name="nama" value="<?= $u->nama; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPosisi">Posisi</label>
                                            <input type="text" id="inputName" class="form-control" name="posisi" value="<?= $u->posisi; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Deskripsi</label>
                                            <input type="text" id="inputName" class="form-control" name="deskripsi" value="<?= $u->deskripsi; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Instagram</label>
                                            <input type="text" id="inputName" class="form-control" name="instagram" value="<?= $u->instagram; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="InputFile">Foto</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="InputFile" value="<?= $u->gambar; ?>" name="gambar">
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

<!-- AKHIR TEAM -->