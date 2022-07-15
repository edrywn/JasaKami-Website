<section id="features" class="features">
    <div class="container">
        <div class="row feature-icons" data-aos="fade-up">
            <h3 style="text-align: left;"> <b>Fitur</b> </h3>

            <hr color="black">

            <div class="row ">



                <div class="col mt-3 content">
                    <div class="row gy-4 ">
                        <?php

                        foreach ($fitur as $u) {
                        ?>
                            <div class="col-6 icon-box" data-aos="fade-up">

                                <div>
                                    <h4><?php echo $u->nama ?></h4>
                                    <p><?php echo $u->deskripsi ?></p>
                                </div>
                            </div>
                        <?php
                        } ?>



                    </div>
                </div>

            </div>

        </div><!-- End Feature Icons -->
    </div>
</section>

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