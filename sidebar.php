<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url("image/logo.png"); ?>" alt="AdminLTE Logo"  
      style="opacity: .7; width: 60px; height: 60px;">
      <span class="brand-text font-weight-light">Perpus Digital</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
      <!-- SidebarSearch Form -->
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class -->            
          <li class="nav-item">
            <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
              <li class="nav-item">
                <a href="<?= base_url('buku'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'buku') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Katalog Buku
                </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link <?= ($this->uri->segment(1) == 'ulasan' || $this->uri->segment(1) == 'peminjaman' || $this->uri->segment(1) == 'pengembalian') ? 'active': ''; ?>">
                  <i class="nav-icon far fa-file-alt"></i>
                  <p>
                    Transaksi
                    <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
               <a href="<?= base_url('ulasan'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'ulasan') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-comments"></i>
                  <p>Ulasan Buku</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="<?= base_url('peminjaman'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'peminjaman') ? 'active' : ''; ?>">
              <i class="nav-icon far fa-edit"></i>     
               <p>Peminjaman Buku</p>   
            </a>
          </li>
           <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="nav-icon fab fa-confluence"></i>
                  <p>Pengembalian Buku</p>
                </a>
              </li>
            </ul>
          </li>
              <li class="nav-item">
                <a href="#" class="nav-link <?= ($this->uri->segment(1) == 'auth' || $this->uri->segment(1) == 'profil' || $this->uri->segment(1) == 'editprofil') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user"></i>     
               <p>
                 User
                 <i class="right fas fa-angle-left"></i>
               </p>   
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
               <a href="<?= base_url('auth/profil/'.$this->session->userdata('userid')) ?>" class="nav-link <?= ($this->uri->segment(2) == 'profil') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p>Profil</p>
                </a>
              </li>
              <li class="nav-item">
               <a href="<?= base_url('auth/editprofil/'.$this->session->userdata('userid')) ?>" class="nav-link <?= ($this->uri->segment(2) == 'editprofil') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-user-edit"></i>
                  <p> Edit Profil</p>
                </a>
              </li>
              <li class="nav-item">
               <a href="<?= base_url('auth/gantipassword/'.$this->session->userdata('userid')) ?>" class="nav-link <?= ($this->uri->segment(3) == 'gantipassword') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Ganti Password</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="<?= base_url('about'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'about') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-info-circle"></i>     
               <p>
                  About Program
             </p>   
            </a>
          </li>
              <li class="nav-item">
                <a href="<?= base_url('auth/logout'); ?>" class="nav-link" onclick="return confirm('Apakah Anda Ingin logout Dari Aplikasi?')">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                    Logout
                </p>
                </a>
            </li>
          <!-- Remove or modify other menu items -->
        </ul>
      </nav>
    <!-- /.sidebar-menu -->
  </div>
<!-- /.sidebar -->
</aside>
