    <!-- Sidebar -->
    <ul class="navbar-nav bg-biru-tua sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-file-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Buah Print</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <?php
      if (isset($_SESSION['admin_login'])) {
        ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if ($_SESSION['active_link'] === 'dashboard') {
                                echo "active";
                              } ?>">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Transaksi & Profile
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($_SESSION['active_link'] === 'pemesanan') {
                                echo "active";
                              } ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Transaksi</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Transaksi Pemesanan :</h6>
              <a class="collapse-item" href="master_antrian.php">Antrian</a>
              <a class="collapse-item" href="master_history.php">History</a>
              <a class="collapse-item" href="#">Notifikasi</a>
              <h6 class="collapse-header">Top Up Saldo :</h6>
              <a class="collapse-item" href="top_up_mitra.php">Top Up Mitra</a>
              <a class="collapse-item" href="#">Top Up User</a>
              <a class="collapse-item" href="#">Withdraw Mitra</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?php if ($_SESSION['active_link'] === 'setting') {
                                echo "active";
                              } ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Setting Profile:</h6>
              <a class="collapse-item" href="#">Profile</a>
              <a class="collapse-item" href="#">About Us</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Master & Laporan
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($_SESSION['active_link'] === 'master') {
                                echo "active";
                              } ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Form Produk:</h6>
              <a class="collapse-item" href="master_produkBaru.php">Produk</a>
              <a class="collapse-item" href="master_halaman.php">Halaman</a>
              <a class="collapse-item" href="master_ukuran.php">Ukuran</a>
              <a class="collapse-item" href="master_warna.php">Warna</a>
              <a class="collapse-item" href="master_fitur.php">Fitur</a>
              <div class="collapse-divider"></div>
              <h6 class="collapse-header">Form Mitra:</h6>
              <a class="collapse-item" href="master_bank.php">Bank</a>
              <a class="collapse-item" href="master_jadwal.php">Jadwal Mitra</a>
              <a class="collapse-item" href="master_thumbnail.php">Gambar Mitra</a>
              <?php
                if (isset($_SESSION['admin_status'])) {
                  if ($_SESSION['admin_status'] == 1) { ?>
                  <h6 class="collapse-header">Form Akun:</h6>
                  <a class="collapse-item" href="master_admin.php">Mitra</a>
                  <a class="collapse-item" href="master_user.php">User</a>
              <?php
                  }
                }
                ?>
            </div>
          </div>
        </li>

        <!-- Nav Item - Charts -->
        <!-- <li class="nav-item <?php if ($_SESSION['active_link'] === 'laporan') {
                                      echo "active";
                                    } ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span>
          </a>
          <div id="collapseLaporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Laporan:</h6>
              <a class="collapse-item" href="#l">Transaksi</a>
              <a class="collapse-item" href="#">Master</a>
            </div>
          </div>
        </li> -->

        <!-- Nav Item - Tables -->
        <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      <?php } ?>
    </ul>
    <!-- End of Sidebar -->