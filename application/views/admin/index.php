<section class="content">
    <div class="container-fluid">
        <h5 class="mb-2">Data pengunjung</h5>
        <div class="row">
            <?php foreach ($jml_pengunjung as $jml_pengunjung) { ?>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengunjung hari ini</span>
                            <span class="info-box-number"><?= $jml_pengunjung->today ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total pengunjung</span>
                            <span class="info-box-number"><?= $jml_pengunjung->total ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengunjun online</span>
                            <span class="info-box-number"><?= $jml_pengunjung->online ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            <?php } ?>

        </div>
        <!-- /.row -->
    </div>
</section>


<section class="content mt-2" data-aos="zoom-in" data-aos-delay="600">

    <!-- Default box -->


    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Featured</h5>
        </div>
        <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>

            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

</section>