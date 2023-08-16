

  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>assets/AdminLTE/#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="alert alert-success" role="alert">
        Selamat Datang   <strong><?= @$_SESSION['fullname'] ?></strong>
      </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_jenis_obat; ?></h3>
                <p>Jumlah Jenis Obat</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url()?>assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_obat; ?></h3>

                <p>Jumlah Total Obat</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url()?>assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jumlah_data_sudah_expired?></h3>

                <p>Jumlah Obat Sudah Expired</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url()?>assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $jumlah_data_belum_expired?></h3>

                <p>Jumlah Obat Belum Expired</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url()?>assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_user?></h3>
                <p>Jumlah Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url()?>assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jumlah_user_sudah_aktif?></h3>
                <p>Jumlah Total User Sudah Aktif</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url()?>assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jumlah_user_belum_aktif?></h3>
                <p>Jumlah Total User Belum Aktif</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url()?>assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      <div class="row">
          <div class="col-lg-12 col-12">
            <div class="card">        
              <div class="card-header">
                <h1 class="card-title">Daftar Obat</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Obat</th>
                      <th>Nama Obat</th>
                      <th>Satuan</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th>Jumlah Harga</th>
                      <th>Tgl expired</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach ($obat as $index => $value): ?>
                  <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= $value->nama_jenis_obat ?></td>
                      <td><?= $value->nama_obat?></td>
                      <td><?= $value->satuan?></td>
                      <td>Rp <?= number_format($value->harga, 0, ',', '.') ?></td>
                      <td><?= $value->stok?></td>
                      <td>
                          Rp<?= number_format($value->harga * $value->stok, 0, ',', '.') ?>
                      </td>
                      <td><?= $value->tgl_expired?></td>
                    
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

