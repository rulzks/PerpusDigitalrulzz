<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Perpustakaan Digital  | Login User</title>
  <link rel="icon" type="image/png" href="<?= base_url("image/logo2.png"); ?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css");?>">
  <!-- icheck Bootstrap  -->
  <link rel="stylesheet" href="<?= base_url("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css");?>">
  <!-- Thome style -->
  <link rel="stylesheet" href="<?= base_url("assets/template/backend/dist/css/adminlte.min.css"); ?>">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <img src="<?= base_url("image/logo1.png"); ?>" alt="image" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover;">
    <div class="card card-outline card-info">
      <div class="card-header text-center">
      <a href="#" class="h1"><b>Perpustakaan </b>Digital</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login Untuk Masuk Ke Aplikasi</p>

      <!-- isply error mesagge if exites -->
      <?= $this->session->flashdata('message'); ?>

      <form action="<?= base_url('auth'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <spam class="fas fa-envelope"></spam>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <spam class="fas fa-lock"></spam>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>       
      </form>
      <p class="mb-1">
        <a href="<?= base_url('auth/lupa_password'); ?>">Lupa Password</a>
      </p>
      <p class="mb-0">
        <a href="<?= base_url('auth/register'); ?>" class="text-center">Register Akun Baru</a>
      </p>
    </div>
  </div>
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url("assets/plugins/jquery/jquery.min.js"); ?>"></script>
<!-- Boostrap 4 -->
<script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<!-- AdminLTE App  -->
<script src="<?= base_url("assets/template/backend/dist/js/adminlte.min.js"); ?>"></script>

</body>
</html>