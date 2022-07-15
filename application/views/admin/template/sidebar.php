<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>dashboard" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">JasaKami</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" style="width : 50px;" alt="User Image">
            </div>
            <div class=" info">
                <a href="#" class="d-block"><?= $this->session->nama; ?></a>
                <span class="text-success">Admin</span>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard" class="nav-link 

                    <?php if ($this->uri->segment('1') == 'dashboard') {
                        echo 'active';
                    } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>

                <li class="nav-header">Website</li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>" target="_blank" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Halaman Utama

                        </p>
                    </a>
                </li>


                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>homeadmin" class="nav-link
                    
                     <?php if ($this->uri->segment('1') == 'homeadmin') {
                            echo 'active';
                        } ?>
                    ">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>portofolioadmin" class="nav-link
                    
                     <?php if ($this->uri->segment('1') == 'portofolioadmin') {
                            echo 'active';
                        } ?>
                    
                    ">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>
                            Portfolio

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link
                    
                     <?php if ($this->uri->segment('1') == 'jasaadmin') {
                            echo 'active';
                        } ?>
                    
                    ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Jasa Kami
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>jasaadmin/website" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Website</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>jasaadmin/grafis" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Desain Grafis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>jasaadmin/video" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Video Editing</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>teamadmin" class="nav-link
                    
                    
                     <?php if ($this->uri->segment('1') == 'teamadmin') {
                            echo 'active';
                        } ?>

                    ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Team

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>aboutadmin" class="nav-link
                    

                     <?php if ($this->uri->segment('1') == 'aboutadmin') {
                            echo 'active';
                        } ?>

                    ">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Tentang Kami

                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<div class="content-wrapper">