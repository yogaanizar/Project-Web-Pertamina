<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pertamina Lubricants</title>
      <?php
          include 'header.php'
      ?>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <aside class="main-sidebar control-sidebar-dark elevation-4" style="background-color: #30384f">
        <a href="../dashboard/dashboard.php" >
          <span>
            <img src="../../dist/img/logo.jpg" class="user-panel" style="opacity: .8">
          </span>  
        </a>
        <div class="sidebar">
          <div class="user-panel mt-3 pb-2 mb-2 d-flex">
            <div class="info">
              <a href="#" class="d-block ml-3">NAVIGATION</a>
            </div>
          </div>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item menu-open text-white">
                <a href="../dashboard/dashboard.php" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt text-white"></i>
                  <p class="text-white">
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa-solid fa-building text-white"></i>
                  <p class="text-white">
                    List Kantor
                    <i class="fas fa-angle-left right text-white"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../list-kantor/OC.php" class="nav-link">
                      <i class="nav-icon fa-solid fa-location-dot ml-4 text-white"></i>
                      <p class="text-white">Office Center</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../list-kantor/PUC.php" class="nav-link">
                      <i class="nav-icon fa-solid fa-location-dot ml-4 text-white"></i>
                      <p class="text-white">PUC</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../list-kantor/PUG.php" class="nav-link">
                      <i class="nav-icon fa-solid fa-location-dot ml-4 text-white"></i>
                      <p class="text-white">PUG</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../list-kantor/PUJ.php" class="nav-link">
                      <i class="nav-icon fa-solid fa-location-dot ml-4 text-white"></i>
                      <p class="text-white">PUJ</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="../maintenance/maintenance.php? btn=maintenance" class="nav-link">
                  <i class="nav-icon fa-solid fa-screwdriver-wrench text-white"></i>
                  <p class="text-white">
                    Pemeliharaan Asset
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../cari-data/cariData.php" class="nav-link">
                  <i class="nav-icon fa-solid fa-magnifying-glass text-white"></i>
                  <p class="text-white">
                    Pencarian Asset
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../logout/logout.php" class="nav-link">
                  <i class="nav-icon fa-solid fa-right-from-bracket text-white"></i>
                  <p class="text-white">
                    Logout
                  </p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
    </div>
  </body>
</html>
