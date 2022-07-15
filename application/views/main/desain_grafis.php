 <!-- ======= Services Section ======= -->
 <section id="services" class="services">

     <div class="container" data-aos="fade-up">

         <header class="section-header">
             <h2>Desain Grafis</h2>
             <p>Jasa yang kami tawarkan</p>
         </header>

         <div class="row gy-3">
             <?php

                $warna = ['red', 'blue', 'orange', 'green', 'red', 'blue', 'orange', 'green'];
                $no = 0;

                foreach ($grafis as $u) {
                ?>
                 <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                     <div class="service-box <?= $warna[$no++]; ?>">
                         <i class="ri-crop-line icon"></i>
                         <h3><?php echo $u->nama ?></h3>
                         <a href="#" class="read-more border rounded"><span>Buat Sekarang</span> <i class="bi bi-arrow-right"></i></a>
                     </div>
                 </div>

             <?php } ?>



         </div>

     </div>

 </section><!-- End Services Section -->