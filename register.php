<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Perpustakaan Digital  | Register</title>
  <link rel="icon" type="image/png" href="<?= base_url("image/logo2.png"); ?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css"); ?>">
  <!-- icheck Bootstrap  -->
  <link rel="stylesheet" href="<?= base_url("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>">
  <!-- Thome style -->
  <link rel="stylesheet" href="<?= base_url("assets/template/backend/dist/css/adminlte.min.css"); ?>">
</head>
<style>
  .error-message {
    margin-top: 5px; /* Adjud this value as needed */
  }
</style>
<body class="hold-transition register-page">
  <div class="register-box">
    <img src="<?= base_url("image/logo1.png"); ?>" alt="Image" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover;">
    <div class="card card-outline card-info">
      <div class="card-header text-center">
      <a href="#" class="h1"><b>Perpustakaan </b>Digital</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrasi Akun Baru</p>

      <?= $this->session->flashdata('message'); ?>

       <form action="<?= base_url('auth/register'); ?>" method="post">
        <div class="input-group mb-4">
          <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
          <div class="input-group-append">
            <div class="input-group-text">
              <spam class="fas fa-book"></spam>
            </div>
          </div>
        </div>


        <div class="input-group mb-1">
          <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <spam class="fas fa-user"></spam>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="input-group mb-1">
          <input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <spam class="fas fa-envelope"></spam>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="input-group mb-1">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <spam class="fas fa-lock"></spam>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="input-group mb-1">
          <input type="password" name="password_confirm" class="form-control" placeholder="Ulangi Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <spam class="fas fa-lock"></spam>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <?= form_error('password_confirm', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <a href="<?= base_url('auth'); ?>" class="text-center">Saya Sudah Punya Akun</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url("assets/plugins/jquery/jquery.min.js"); ?>"></script>
<!-- Boostrap 4 -->
<script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<!-- AdminLTE App  -->
<script src="<?= base_url("assets/template/backend/dist/js/adminlte.min.js"); ?>"></script>
</body>
</html>

