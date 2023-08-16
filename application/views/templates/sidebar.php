<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url()?>assets/AdminLTE/index3.html" class="brand-link">
      <img src="<?php echo base_url()?>assets/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url()?>assets/AdminLTE/#" class="d-block"><?= @$_SESSION['fullname']; ?></a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?php echo site_url('dashboard')?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
        </li>   
        <li class="nav-item">
            <a href="<?php echo site_url('jenis_obat')?>" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Jenis Obat
              </p>
            </a>
        </li>   
        <li class="nav-item">
            <a href="<?php echo site_url('obat')?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Obat
              </p>
            </a>
        </li>   
        <?php if (@$_SESSION['role'] == 1) : ?>
          <li class="nav-item">
              <a href="<?php echo site_url('user')?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User
                </p>
              </a>
          </li>  
          <?php endif; ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>