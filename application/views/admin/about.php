<section class="content">

  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">


      <div class="card bg-light d-flex flex-fill">
        <div class="card-header text-muted border-bottom-0">
          Ganti About
        </div>
        <?php foreach ($about as $u) { ?>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <h2 class="lead"><b><?= $u->judul ?></b></h2>
                <p class="text-muted text-sm"><?= $u->deskripsi ?> </p>

              </div>
              <div class="col-5 text-center">
                <img src="<?= base_url('uploads/about/' . $u->gambar); ?>" alt="user-avatar" class=" img-fluid" width="200px">
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="text-right">

              <a type="button" href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editabout<?= $u->id; ?>">
                <i class="fas fa-edit"></i> Edit
              </a>
            </div>
          </div>
        <?php } ?>
      </div>


      <!-- Modal -->
      <?php foreach ($about as $u) { ?>
        <div class="modal fade" id="editabout<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit About</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="card-body">
                  <form action="<?php echo base_url('aboutadmin/edit_about'); ?> " method="post" enctype="multipart/form-data">
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
                          <input type="file" value="<?= $u->gambar; ?>" name="gambar" id="InputFile" accept="image/png, image/jpeg, image/jpg, image/gif">
                          <!-- <label class="custom-file-label" for="InputFile">Pilih Gambar</label> -->
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




  <!-- Modal -->

  </div>
</section>