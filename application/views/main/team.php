  <!-- ======= Team Section ======= -->
  <section id="team" class="team">

      <div class="container" data-aos="fade-up">

          <header class="section-header mt-4">
              <h2>Team</h2>
              <p>Daftar team kami</p>
          </header>

          <div class="row gy-4">
              <?php foreach ($team as $u) { ?>
                  <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                      <div class="member">
                          <div class="member-img">
                              <img src="<?= base_url('uploads/team/' . $u->gambar); ?>" class="img-fluid" alt="">
                              <div class="social">

                                  <a href="<?= $u->instagram ?>"><i class="bi bi-instagram"></i></a>

                              </div>
                          </div>
                          <div class="member-info">
                              <h4><?= $u->nama ?></h4>
                              <span><?= $u->posisi ?></span>
                              <p><?= $u->deskripsi ?></p>
                          </div>
                      </div>
                  </div>

              <?php } ?>
          </div>

      </div>

  </section><!-- End Team Section -->