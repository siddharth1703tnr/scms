<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo BASE_URL; ?>/pages/dashboard.php" class="brand-link">
    <img src="<?php echo BASE_URL; ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo htmlspecialchars($_SESSION['distributor_name']);
                                                                                    ?></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo BASE_URL; ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?php echo BASE_URL; ?>/pages/dashboard.php" class="d-block"><?php echo htmlspecialchars($_SESSION['distributoruser_username']);?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">MANAGE</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle text-info"></i>
            <p>
              Complaint
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo BASE_URL; ?>pages/dealerShow.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

  <div class="sidebar-custom">
    <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
    <!-- <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a> -->
    <a href="<?php echo BASE_URL; ?>controllers\LoginCheack\destroy_session.php" class="btn btn-outline-warning btn-sm hide-on-collapse pos-right" id="logoutButton">LOGOUT</a>
  </div>
</aside>