<!-- BANNER -->

<section class="content">

  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">

      <?= $this->session->flashdata('message'); ?>
      <div class="card bg-light d-flex flex-fill">
        <div class="card-header text-muted border-bottom-0">
          Ganti Banner
        </div>

        <?php foreach ($banner as $u) { ?>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <h2 class="lead"><b><?= $u->judul ?></b></h2>
                <p class="text-muted text-sm"><?= $u->deskripsi ?> </p>

              </div>
              <div class="col-5 text-center">
                <img src="<?= base_url('uploads/' . $u->gambar); ?>" alt="user-avatar" class=" img-fluid" width="200px">
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="text-right">

              <a type="button" href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editbanner<?= $u->id; ?>">
                <i class="fas fa-edit"></i> Edit
              </a>
            </div>
          </div>
        <?php } ?>
      </div>


      <!-- Modal -->
      <?php foreach ($banner as $u) { ?>
        <div class="modal fade" id="editbanner<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="card-body">
                  <form action="<?php echo base_url('homeadmin/edit_banner'); ?> " method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="inputName">Judul Banner</label>
                      <input type="hidden" id="inputName" class="form-control" name="id" value="<?= $u->id; ?>">
                      <input type="text" name="judul" id="inputName" class="form-control" value="<?= $u->judul; ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">Deskripsi</label>
                      <textarea id="inputDescription" name="deskripsi" class="form-control" rows="4"><?= $u->deskripsi; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="InputFile">Gambar Banner</label>
                      <div class="input-group">
                        <div>
                          <input type="file" value="<?= $u->gambar; ?>" name="gambar" id="InputFile">
                          <label class="custom-file-label" for="InputFile"><?= $u->gambar; ?></label>
                        </div>

                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Ganti</button>
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

<!-- AKHIR BANNER -->


<!-- KEUNGGULAN -->
<section class="content mt-2">

  <!-- Default box -->
  <div class="card card-solid">

    <div class="card-body pb-0">
      <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahUnggul"><i class="fa fa-user-plus"></i> Tambah Keunggulan</button>


      <div class="modal fade" id="tambahUnggul" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">Tambah Keunggulan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('homeadmin/tambah_unggul'); ?>">
                  <div class="form-group">
                    <label for="inputName">Keunggulan</label>
                    <input type="text" name="unggul" id="inputName" class="form-control" placeholder="Masukan Keunggulan">
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Deskripsi</label>
                    <textarea id="inputDescription" name="deskripsi" class="form-control" rows="4" placeholder="Masukan Deskripsi"></textarea>
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
          <h3 class="card-title">Kenapa Harus JasaKami</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
            <thead>
              <tr>
                <th style="width: 1%">
                  No
                </th>
                <th style="width: 20%">
                  Keunggulan
                </th>
                <th style="width: 10%">
                  Gambar
                </th>
                <th style="width: 30%">
                  Deskripsi
                </th>
                <th style="width: 20%" class="text-center">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($keunggulan as $u) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $u->unggul ?></td>
                  <td>

                    <img width="100px" src="<?= base_url('uploads/unggul/' . $u->gambar); ?>" alt="">
                  </td>

                  <td>
                    <?= $u->deskripsi ?>
                  </td>
                  <td class="project-actions text-center">
                    <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editUnggul<?= $u->id; ?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'homeadmin/hapus_unggul/' . $u->id ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'>
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
      <!-- /.card -->

      <?php foreach ($keunggulan as $u) { ?>
        <div class="modal fade" id="editUnggul<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit Keunggulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="card-body">
                  <form action="<?php echo base_url('homeadmin/edit_unggul'); ?> " method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="inputName">Keunggulan</label>
                      <input type="hidden" name="id" id="inputName" class="form-control" value="<?= $u->id; ?>">

                      <input type="text" id="inputName" class="form-control" name="unggul" value="<?= $u->unggul; ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">Deskripsi</label>
                      <textarea id="inputDescription" class="form-control" rows="4" name="deskripsi"><?= $u->deskripsi; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="InputFile">Gambar</label>
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

<!-- AKHIR UNGGULAN -->


<!-- CLIENT -->

<section class="content mt-2">

  <!-- Default box -->
  <div class="card card-solid">

    <div class="card-body pb-0">
      <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahClient"><i class="fa fa-user-plus"></i> Tambah Client</button>


      <div class="modal fade" id="tambahClient" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">Tambah Client</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('homeadmin/tambah_client'); ?>">
                  <div class="form-group">
                    <label for="inputName">Nama Client</label>

                    <input type="text" name="nama" id="inputName" class="form-control" placeholder="Masukan Nama Client">
                  </div>

                  <div class="form-group">
                    <label for="InputFile">Logo Client</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="InputFile">
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
          <h3 class="card-title">Client</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
            <thead>
              <tr>
                <th style="width: 1%">
                  No
                </th>
                <th style="width: 20%">
                  Nama Client
                </th>
                <th style="width: 30%">
                  Logo
                </th>
                <th style="width: 20%" class="text-center">aksi
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no;
              foreach ($client as $u) {
              ?>
                <tr>
                  <td>
                    <?= $no++ ?>
                  </td>
                  <td>
                    <?= $u->nama ?>
                  </td>
                  <td>
                    <img alt="Avatar" width="100px" src="<?= base_url('uploads/client/' . $u->logo); ?>">
                  </td>
                  <td class="project-actions text-center">
                    <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#editClient<?= $u->id; ?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'homeadmin/hapus_client/' . $u->id ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'>
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
      <!-- /.card -->
      <?php foreach ($client as $u) { ?>
        <div class="modal fade" id="editClient<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="card-body">
                  <form action="<?php echo base_url('homeadmin/edit_client'); ?> " method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="inputName">Nama Client</label>
                      <input type="hidden" value="<?= $u->id; ?>" name="id">
                      <input type="text" name="nama" value="<?= $u->nama; ?>" id="inputName" class="form-control" value="Nama Client">
                    </div>

                    <div class="form-group">
                      <label for="InputFile">Gambar</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" value="<?= $u->logo; ?>" name="logo" class="custom-file-input" id="InputFile">
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

<!-- AKHIR CLIENT -->