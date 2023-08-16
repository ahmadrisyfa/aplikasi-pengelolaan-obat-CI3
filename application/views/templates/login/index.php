
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url() ?>assets/AdminLTE/index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <span class="m-2 ">
      <?= $this->session->flashdata('message');?>
    </span>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login!</p>

      <form action="<?php echo base_url('auth/index') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" id="username"  value="<?= set_value('username');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          
        </div>
        <?= form_error('username','<small class="text-danger pl-3">','</small> '); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          
        </div>
        <?= form_error('password','<small class="text-danger pl-3">','</small> '); ?>
        <div class="row">          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
      <!-- /.social-auth-links -->
    
      <p class="mb-0">
        Belum Registrasi? <a href="<?php echo base_url('auth/register')?>" class="text-center">Register Sekarang!</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
