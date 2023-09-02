<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Set company logo: Start -->
  <div class="logo">
  <a href="<?= base_url('/') ?>">
    <?php if (!empty(get_option('logo'))) { ?>
      <img src="<?= base_url('uploads/general/' . get_option('logo')) ?>">
    <?php } ?>
  </a>
  </div>
  <!-- Over -->
  <div class="sidebar">
    <div class="user-panel pb-3 mb-3 d-flex">
    </div>
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
        <li class="nav-item">
          <a href="<?= route_to('dashboard') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashbord
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              User Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>User Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= route_to('admin/user') ?>" class="nav-link">
                <i class="fas fa-user-edit nav-icon"></i>
                <p>User</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= route_to('permissions') ?>" class="nav-link">
            <i class="fas fa-venus-mars"></i>
            <p>
              Permission
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= route_to('products') ?>" class="nav-link">
            <i class="fas fa-yin-yang"></i>
            <p>
              Products
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= route_to('activity_log') ?>" class="nav-link">
            <i class="fab fa-app-store-ios"></i>
            <p>
              Activity Log
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/settings') ?>" class="nav-link">
            <i class="fas fa-cogs"></i>
            <p>
              Settings
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>
