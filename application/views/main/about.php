 <!-- ======= About Section ======= -->
 <section id="about" class="about">

     <div class="container mt-5" data-aos="fade-up">
         <?php foreach ($about as $u) { ?>
             <div class="row gx-0">

                 <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                     <div class="content">
                         <h3>Kenali Kami</h3>
                         <h2><?= $u->judul ?></h2>
                         <p>
                             <?= $u->deskripsi ?>
                         </p>

                     </div>
                 </div>

                 <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                     <img src="<?= base_url('uploads/about/' . $u->gambar); ?>" class="img-fluid" alt="">
                 </div>

             </div>
         <?php } ?>
     </div>

 </section><!-- End About Section -->

 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">

     <div class="container" data-aos="fade-up">

         <header class="section-header">
             <h2>Kontak</h2>
             <p>Kontak Kami</p>
         </header>

         <div class="row gy-4">

             <div class="col-lg-6">

                 <div class="row gy-4">
                     <div class="col-md-6">
                         <div class="info-box">
                             <i class="bi bi-geo-alt"></i>
                             <h3>Alamat</h3>
                             <p>Yogyakarta,<br>Daerah Istimewa Yogyakarta, Indonesia</p>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="info-box">
                             <i class="bi bi-telephone"></i>
                             <h3>Telpon</h3>
                             <p>+62 82135313985</p>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="info-box">
                             <i class="bi bi-envelope"></i>
                             <h3>Email Us</h3>
                             <p>JasaKami@gmail.com</p>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="info-box">
                             <i class="bi bi-clock"></i>
                             <h3>Buka</h3>
                             <p>Setiap Hari</p>
                         </div>
                     </div>
                 </div>

             </div>

             <div class="col-lg-6">

                 <form action="<?php echo base_url('aboutadmin/wa') ?>" method="post" class="php-email-form">
                     <div class="row gy-4">
                         <h4>Kirim masukan via whatsapp </h4>

                         <div class="col-md-12">
                             <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
                             <input type="hidden" name="no">
                         </div>



                         <div class="col-md-12">
                             <input type="text" class="form-control" name="subjek" placeholder="Masukan Subjek" required>
                         </div>

                         <div class="col-md-12">
                             <textarea class="form-control" name="message" rows="6" placeholder="pesan" required></textarea>
                         </div>

                         <div class="col-md-12 text-center">
                             <div class="loading">Loading</div>
                             <div class="error-message"></div>
                             <div class="sent-message">Isi Masukan</div>

                             <button type="submit" class="bg-success">
                                 <div class="">
                                     <i class="bi bi-whatsapp"></i>
                                     Whatsapp
                                 </div>
                             </button>
                         </div>

                     </div>
                 </form>

             </div>

         </div>

     </div>

 </section><!-- End Contact Section -->