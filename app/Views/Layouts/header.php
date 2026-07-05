<!DOCTYPE html>
<html data-bs-theme="light" lang="es">
<!-- [Head] start -->


<head>
  <title>Home | Mantis Bootstrap 5 Admin Template</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"
    content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords"
    content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
  <link rel="icon" href="<?= base_url('assets/images/faviconYondaPeru.svg') ?>" type="image/x-icon">
  <!-- [Google Font] Family -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    id="main-font-link">
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="<?= base_url('assets/fonts/tabler-icons.min.css') ?>">
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="<?= base_url('assets/fonts/feather.css') ?>">
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="<?= base_url('assets/fonts/fontawesome.css') ?>">
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="<?= base_url('assets/fonts/material.css') ?>">

  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" id="main-style-link">
  <link rel="stylesheet" href="<?= base_url('assets/css/style-preset.css') ?>">
  <!-- DataTables con Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"`
  />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!--Full Calendar-->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->
  <!-- [ Sidebar Menu ] start -->
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="/dashboard" class="b-brand text-primary">
          <!-- ========   Change your logo from here   ============ -->
          <img src="<?= base_url('assets/images /imagen-almacen.png') ?>" class="img-fluid logo-lg mt-3" alt="logo">
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="<?= base_url('dashboard') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>


            <body>
  </body>

          <li class="pc-item pc-caption">
            <label>Procesos</label>
            <i class="ti ti-dashboard"></i>
          </li>

          <li class="pc-item pc-hasmenu">
            <a href="javascript:void(0);" class="pc-link">
              <span class="pc-micon"><i class="ti ti-menu"></i></span>
              <span class="pc-mtext">INVENTARIO</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="<?= base_url('productos') ?>">Productos</a></li>
              <li class="pc-item"><a class="pc-link" href="<?= base_url('stock') ?>">Stock</a></li>
              <li class="pc-item"><a class="pc-link" href="<?= base_url('movimiento') ?>">Historial de Movimientos</a></li>
              <li class="pc-item"><a class="pc-link" href="<?= base_url('prediccion') ?>">Predicción</a></li>
            </ul>  

          </li>


          <!--ADMINISTRACION-->
          <!-- <li class="pc-item pc-caption">
            <label>Administrativo</label>
            <i class="ti ti-dashboard"></i>
          </li>



          <li class="pc-item pc-hasmenu">
            <a href="javascript:void(0);" class="pc-link">
              <span class="pc-micon"><i class="ti ti-menu"></i></span>
              <span class="pc-mtext">TRABAJADORES</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="">Datos</a></li>

            </ul>
          </li> -->

        </ul>


      </div>
    </div>
  </nav>
  <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->

  <header class="pc-header">
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <!-- ======= Menu collapse Icon ===== -->
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="dropdown pc-h-item d-inline-flex d-md-none">
            <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#" role="button"
              aria-haspopup="false" aria-expanded="false">
              <i class="ti ti-search"></i>
            </a>
            <div class="dropdown-menu pc-h-dropdown drp-search">
              <form class="px-3">
                <div class="form-group mb-0 d-flex align-items-center">
                  <i data-feather="search"></i>
                  <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
                </div>
              </form>
            </div>
          </li>
          <li class="pc-h-item d-none d-md-inline-flex">
            <form class="header-search">
              <i data-feather="search" class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search here. . .">
            </form>
          </li>
        </ul>
      </div>
      <!-- [Mobile Media Block end] -->
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li class="dropdown pc-h-item">
            <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
              aria-haspopup="false" aria-expanded="false">
              <i class="ti ti-mail"></i>
            </a>
            <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <h5 class="m-0">Message</h5>
                <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-x text-danger"></i></a>
              </div>
              <div class="dropdown-divider"></div>
              <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative"
                style="max-height: calc(100vh - 215px)">
                <div class="list-group list-group-flush w-100">
                  <a class="list-group-item list-group-item-action">
                    <div class="d-flex">
                      <div class="flex-shrink-0">
                        <img src="" alt="user-image"
                          class="user-avtar">
                      </div>
                      <div class="flex-grow-1 ms-1">
                        <span class="float-end text-muted">3:00 AM</span>
                        <p class="text-body mb-1">It's <b>Cristina danny's</b> birthday today.</p>
                        <span class="text-muted">2 min ago</span>
                      </div>
                    </div>
                  </a>
                  <a class="list-group-item list-group-item-action">
                    <div class="d-flex">
                      <div class="flex-shrink-0">
                        <img src="" alt="user-image"
                          class="user-avtar">
                      </div>
                      <div class="flex-grow-1 ms-1">
                        <span class="float-end text-muted">6:00 PM</span>
                        <p class="text-body mb-1"><b>Aida Burg</b> commented your post.</p>
                        <span class="text-muted">5 August</span>
                      </div>
                    </div>
                  </a>
                  <a class="list-group-item list-group-item-action">
                    <div class="d-flex">
                      <div class="flex-shrink-0">
                        <img src="" alt="user-image"
                          class="user-avtar">
                      </div>
                      <div class="flex-grow-1 ms-1">
                        <span class="float-end text-muted">2:45 PM</span>
                        <p class="text-body mb-1"><b>There was a failure to your setup.</b></p>
                        <span class="text-muted">7 hours ago</span>
                      </div>
                    </div>
                  </a>
                  <a class="list-group-item list-group-item-action">
                    <div class="d-flex">
                      <div class="flex-shrink-0">
                        <img src="" alt="user-image"
                          class="user-avtar">
                      </div>
                      <div class="flex-grow-1 ms-1">
                        <span class="float-end text-muted">9:10 PM</span>
                        <p class="text-body mb-1"><b>Cristina Danny </b> invited to join <b> Meeting.</b></p>
                        <span class="text-muted">Daily scrum meeting time</span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="dropdown-divider"></div>
              <div class="text-center py-2">
                <a href="#!" class="link-primary">View all</a>
              </div>
            </div>
          </li>
          <li class="dropdown pc-h-item header-user-profile">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">

          </a>

            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header">
                <div class="d-flex mb-1">
                  <div class="flex-shrink-0">
                  </div>

                  <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-power text-danger"></i></a>
                </div>
              </div>
              <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="drp-t1" data-bs-toggle="tab" data-bs-target="#drp-tab-1"
                    type="button" role="tab" aria-controls="drp-tab-1" aria-selected="true"><i class="ti ti-user"></i>
                    Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="drp-t2" data-bs-toggle="tab" data-bs-target="#drp-tab-2" type="button"
                    role="tab" aria-controls="drp-tab-2" aria-selected="false"><i class="ti ti-settings"></i>
                    Setting</button>
                </li>
              </ul>
              <div class="tab-content" id="mysrpTabContent">
                <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1"
                  tabindex="0">


 



                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-power"></i>
                    <span>Cerrar sesión</span>
                  </a>
                </div>

              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>


      <style>
    body {
      min-height: 100vh;
      overflow-x: hidden;
      background-color: #f8f9fa;
    }
    /* Sidebar */
    #sidebar {
      min-width: 250px;
      max-width: 250px;
      background-color: #0d6efd; /* Bootstrap primary blue */
      color: white;
      min-height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      transition: all 0.3s;
      z-index: 1030;
    }
    #sidebar .nav-link {
      color: white;
      font-weight: 500;
      font-size: 1.05rem;
      padding: 1rem 1.5rem;
      border-left: 4px solid transparent;
      transition: background-color 0.3s, border-left-color 0.3s;
    }
    #sidebar .nav-link:hover,
    #sidebar .nav-link.active {
      background-color: #0b5ed7;
      border-left-color: #ffc0cb; /* rosado */
      color: #ffc0cb;
    }
    #sidebar .nav-link i {
      margin-right: 0.75rem;
      font-size: 1.2rem;
    }
    /* Content wrapper */
    #content-wrapper {
      margin-left: 250px;
      transition: margin-left 0.3s;
      padding: 1.5rem 2rem 2rem 2rem;
    }
    /* Top navbar */
    #top-navbar {
      height: 56px;
      background-color: white;
      border-bottom: 1px solid #dee2e6;
      padding: 0 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: fixed;
      top: 0;
      left: 250px;
      right: 0;
      z-index: 1020;
    }
    #top-navbar .search-input {
      max-width: 400px;
      width: 100%;
    }
    #top-navbar .profile {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      cursor: pointer;
    }
    #top-navbar .profile img {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #0d6efd;
    }
    /* Cards KPI */
    .kpi-card {
      border-radius: 0.75rem;
      box-shadow: 0 0.25rem 0.5rem rgb(13 110 253 / 0.15);
      transition: transform 0.2s ease;
      background: white;
    }
    .kpi-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0.5rem 1rem rgb(13 110 253 / 0.25);
    }
    .kpi-value {
      font-weight: 700;
      font-size: 2rem;
      color: #0d6efd;
    }
    .kpi-label {
      font-weight: 600;
      color: #6c757d;
    }
    /* Responsive adjustments */
    @media (max-width: 991.98px) {
      #sidebar {
        position: fixed;
        left: -250px;
        z-index: 1040;
      }
      #sidebar.active {
        left: 0;
      }
      #content-wrapper {
        margin-left: 0;
        padding-top: 56px;
      }
      #top-navbar {
        left: 0;
      }
      #sidebar-toggler {
        display: inline-block;
      }
    }
    /* Sidebar toggler button */
    #sidebar-toggler {
      display: none;
      font-size: 1.5rem;
      color: #0d6efd;
      cursor: pointer;
      user-select: none;
    }
    /* Chart container spacing */
    .chart-container {
      background: white;
      border-radius: 0.75rem;
      padding: 1.5rem;
      box-shadow: 0 0.25rem 0.5rem rgb(0 0 0 / 0.1);
      margin-bottom: 1.5rem;
    }
  </style>


  </header>
  <!-- [ Header ] end -->
   