<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio mt-3">

  <div class="container mt-5" data-aos="fade-up">

    <div class="card card-solid">
      <div class="p-4">

        <header class="section-header">
          <h2 class="mt-4">Portfolio</h2>
          <p>Check our latest work</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Semua</li>
              <?php foreach ($tb_filter as $u) { ?>
                <li data-filter=".<?= $u->filter ?>"><?= $u->filter ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php foreach ($portofolio as $u) { ?>
            <div class="col-lg-4 col-md-6 portfolio-item <?= $u->kategori ?>">
              <div class="portfolio-wrap">
                <img src="<?= base_url('uploads/portofolio/' . $u->gambar); ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?= $u->nama ?></h4>
                  <p><?= $u->deskripsi ?></p>
                  <div class="portfolio-links">

                    <a href="<?= $u->link ?>" title="More Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

</section><!-- End Portfolio Section -->