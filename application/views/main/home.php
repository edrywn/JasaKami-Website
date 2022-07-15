<section id="hero" class="hero d-flex align-items-center">

  <div class="container">
    <div class="row">
      <?php foreach ($banner as $u) { ?>
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up"><?= $u->judul ?></h1>
          <h2 data-aos="fade-up" data-aos-delay="400"><?= $u->deskripsi ?></h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="<?= base_url() ?>jasa/website" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Buat Website</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?= base_url('uploads/' . $u->gambar); ?>" class="img-fluid" alt="">
        </div>
      <?php } ?>
    </div>
  </div>

</section><!-- End Hero -->

<!-- ======= Values Section ======= -->
<section id="values" class="values">

  <div class="container" data-aos="fade-up">

    <header class="section-header">

      <p>Kenapa harus JasaKami</p>
    </header>

    <div class="row">
      <?php foreach ($keunggulan as $u) { ?>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="box">
            <img src="<?= base_url('uploads/unggul/' . $u->gambar); ?>" class="img-fluid" alt="">
            <h3><?= $u->unggul ?></h3>
            <p> <?= $u->deskripsi ?></p>
          </div>
        </div>
      <?php } ?>

    </div>

  </div>

</section><!-- End Values Section -->



<section id="pricing" class="pricing">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Harga</h2>
      <p>Dafar Harga Kami</p>
    </header>

    <div class="row gy-4" data-aos="fade-left">
      <?php

      foreach ($js_website as $u) { ?>

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="box">

            <?php


            if (!$u->tag == null) { ?>
              <span class="featured bg-danger"><?= $u->tag ?></span>
            <?php } ?>
            <h3 style="color: #07d5c0;"><?= $u->nama ?></h3>
            <div class="price"><sup>IDR</sup><?= $u->promo ?></div>
            <div class="na"><del><?= $u->harga ?></del></div>
            <div>
              <img src="<?= base_url('uploads/website/' . $u->gambar); ?>" class="img-fluid" style="height: 200px;" alt="">
            </div>

            <ul>
              <?php
              $data = explode(",", $u->fitur);
              $length = count($data);

              foreach ($fitur as $f) {
                for ($no = 0; $no < $length; $no++) {

                  if (in_array($f->nama, $data)) { ?>
                    <li class="text-success"><?= $f->nama ?></li>
                  <?php } else {
                  ?>
                    <li class="na text-danger"><?= $f->nama ?></li>




              <?php }
                  break;
                }
              } ?>
            </ul>
            <a href="https://wa.me/6282135313985/?text=Halo,%20saya%20tertarik%20ingin%20membuat%20website.%20dengan%20paket%20*<?= $u->nama ?>*.%20bagaimana%20prosedurnya?.%20terima%20kasih" class="btn-buy">Buat Sekarang</a>
          </div>
        </div>

      <?php } ?>



    </div>

  </div>

</section><!-- End Pricing Section -->





<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Client Kami</h2>
      <p>Daftar client yang telah kami kembangkan</p>
    </header>

    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <?php foreach ($client as $u) { ?>
          <div class="swiper-slide"><img src="<?= base_url('uploads/client/' . $u->logo); ?>" class="img-fluid" alt=""></div>

        <?php } ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

</section><!-- End Clients Section -->