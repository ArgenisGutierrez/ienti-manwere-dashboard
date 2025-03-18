<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario_sesion = $_SESSION['usuario'];
    $query_sesion = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = '.$usuario_sesion.' AND estado=1");
    $query_sesion->execute();
    $datos = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
    foreach ($datos as $dato) {
        $nombre_sesion_usuario = $dato['usuario'];
    }
} else {
    header("Location:" . APP_URL . "/login");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo APP_NAME ?>Ⓡ</title>

  <!-- Meta -->
  <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
  <meta name="author" content="Bootstrap Gallery" />
  <link rel="canonical" href="https://www.bootstrap.gallery/">
  <meta property="og:url" content="https://www.bootstrap.gallery">
  <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
  <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
  <meta property="og:type" content="Website">
  <meta property="og:site_name" content="Bootstrap Gallery">
  <link rel="shortcut icon" href="<?php echo APP_URL ?>/public/images/icon.ico" />

  <!-- *************
            ************ Common Css Files *************
        ************ -->
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="<?php echo APP_URL ?>/public/css/bootstrap.min.css" />

  <!-- Bootstrap font icons css -->
  <link rel="stylesheet" href="<?php echo APP_URL ?>/public/fonts/bootstrap/bootstrap-icons.css" />

  <!-- Main css -->
  <link rel="stylesheet" href="<?php echo APP_URL ?>/public/css/main.min.css" />

  <!-- *************
            ************ Vendor Css Files *************
        ************ -->

  <!-- Scrollbar CSS -->
  <link rel="stylesheet" href="<?php echo APP_URL ?>/public/vendor/overlay-scroll/OverlayScrollbars.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <!-- Page wrapper start -->
  <div class="page-wrapper">

    <!-- Page header starts -->
    <div class="page-header">

      <!-- Sidebar brand starts -->
      <div class="brand">
        <a href="index.html" class="logo">
          <img src="<?php echo APP_URL ?>/public/images/logo.svg" class="d-none d-md-block me-4" alt="Bloom Admin Dashboard" />
          <img src="<?php echo APP_URL ?>/public/images/logo-sm.svg" class="d-block d-md-none me-4" alt="Bloom Admin Dashboard" />
        </a>
      </div>
      <!-- Sidebar brand ends -->

      <div class="toggle-sidebar" id="toggle-sidebar">
        <i class="bi bi-list"></i>
      </div>

      <!-- Header actions ccontainer start -->
      <div class="header-actions-container">

        <!-- Search container start -->
        <div class="search-container me-4 d-xl-block d-lg-none">

          <!-- Search input group start -->
          <input type="text" class="form-control" placeholder="Search" />
          <!-- Search input group end -->

        </div>
        <!-- Search container end -->

        <!-- Header actions start -->
        <div class="header-actions d-xl-flex d-lg-none gap-4">
          <div class="dropdown">
            <a class="dropdown-toggle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-envelope-open fs-5 lh-1"></i>
              <span class="count-label"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow-lg">
              <div class="dropdown-item">
                <div class="d-flex py-2 border-bottom">
                  <img src="<?php echo APP_URL ?>/public/images/user.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
                  <div class="m-0">
                    <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                    <p class="mb-1">Membership has been ended.</p>
                    <p class="small m-0 text-secondary">Today, 07:30pm</p>
                  </div>
                </div>
              </div>
              <div class="dropdown-item">
                <div class="d-flex py-2 border-bottom">
                  <img src="<?php echo APP_URL ?>/public/images/user2.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
                  <div class="m-0">
                    <h6 class="mb-1 fw-semibold">Benjamin Michiels</h6>
                    <p class="mb-1">Congratulate, James for new job.</p>
                    <p class="small m-0 text-secondary">Today, 08:00pm</p>
                  </div>
                </div>
              </div>
              <div class="dropdown-item">
                <div class="d-flex py-2">
                  <img src="<?php echo APP_URL ?>/public/images/user1.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
                  <div class="m-0">
                    <h6 class="mb-1 fw-semibold">Jehovah Roy</h6>
                    <p class="mb-1">Lewis added new schedule release.</p>
                    <p class="small m-0 text-secondary">Today, 09:30pm</p>
                  </div>
                </div>
              </div>
              <div class="d-grid mx-3 my-1">
                <a href="javascript:void(0)" class="btn btn-primary">View all</a>
              </div>
            </div>
          </div>
          <a href="account-settings.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
            data-bs-custom-class="custom-tooltip-blue" data-bs-title="Settings">
            <i class="bi bi-gear fs-5"></i>
          </a>
        </div>
        <!-- Header actions start -->

        <!-- Header profile start -->
        <div class="header-profile d-flex align-items-center">
          <div class="dropdown">
            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
              <span class="user-name d-none d-md-block">Michelle White</span>
              <span class="avatar">
                <img src="<?php echo APP_URL ?>/public/images/user7.png" alt="User Avatar" />
                <span class="status online"></span>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
              <div class="header-profile-actions">
                <a href="profile.html">Profile</a>
                <a href="account-settings.html">Settings</a>
                <a href="login.html">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Header profile end -->

      </div>
      <!-- Header actions ccontainer end -->

    </div>
    <!-- Page header ends -->

    <!-- Main container start -->
    <div class="main-container">

      <!-- Sidebar wrapper start -->
      <nav class="sidebar-wrapper">

        <!-- Sidebar menu starts -->
        <div class="sidebar-menu">
          <div class="sidebarMenuScroll">
            <ul>
              <li>
                <a href="index.html">
                  <i class="bi bi-house"></i>
                  <span class="menu-text">Analytics</span>
                </a>
              </li>
              <li>
                <a href="widgets.html">
                  <i class="bi bi-box"></i>
                  <span class="menu-text">Widgets</span>
                </a>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="bi bi-collection"></i>
                  <span class="menu-text">UI Elements</span>
                  <span class="badge red">15</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="accordions.html">Accordions</a>
                    </li>
                    <li>
                      <a href="alerts.html">Alerts</a>
                    </li>
                    <li>
                      <a href="buttons.html">Buttons</a>
                    </li>
                    <li>
                      <a href="badges.html">Badges</a>
                    </li>
                    <li>
                      <a href="cards.html">Cards</a>
                    </li>
                    <li>
                      <a href="advanced-cards.html">Advanced Cards</a>
                    </li>
                    <li>
                      <a href="carousel.html">Carousel</a>
                    </li>
                    <li>
                      <a href="dropdowns.html">Dropdowns</a>
                    </li>
                    <li>
                      <a href="icons.html">Icons</a>
                    </li>
                    <li>
                      <a href="list-items.html">List Items</a>
                    </li>
                    <li>
                      <a href="modals.html">Modals</a>
                    </li>
                    <li>
                      <a href="offcanvas.html">Off Canvas</a>
                    </li>
                    <li>
                      <a href="placeholders.html">Placeholders</a>
                    </li>
                    <li>
                      <a href="progress.html">Progress Bars</a>
                    </li>
                    <li>
                      <a href="spinners.html">Spinners</a>
                    </li>
                    <li>
                      <a href="tabs.html">Tabs</a>
                    </li>
                    <li>
                      <a href="tooltips.html">Tooltips</a>
                    </li>
                    <li>
                      <a href="typography.html">Typography</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="bi bi-stickies"></i>
                  <span class="menu-text">Pages</span>
                  <span class="badge blue">8</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="support.html">Support</a>
                    </li>
                    <li>
                      <a href="create-invoice.html">Create Invoice</a>
                    </li>
                    <li>
                      <a href="view-invoice.html">View Invoice</a>
                    </li>
                    <li>
                      <a href="invoice-list.html">Invoice List</a>
                    </li>
                    <li>
                      <a href="subscribers.html">Subscribers</a>
                    </li>
                    <li>
                      <a href="contacts.html">Contacts</a>
                    </li>
                    <li>
                      <a href="pricing.html">Pricing</a>
                    </li>
                    <li>
                      <a href="profile.html">Profile</a>
                    </li>
                    <li>
                      <a href="account-settings.html">Account Settings</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="bi bi-calendar4"></i>
                  <span class="menu-text">Events</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="events.html">Events List</a>
                    </li>
                    <li>
                      <a href="calendar.html">Daygrid</a>
                    </li>
                    <li>
                      <a href="calendar-draggable.html">External Draggable</a>
                    </li>
                    <li>
                      <a href="calendar-google.html">Google Calendar</a>
                    </li>
                    <li>
                      <a href="calendar-list-view.html">List View</a>
                    </li>
                    <li>
                      <a href="calendar-selectable.html">Selectable</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="bi bi-columns-gap"></i>
                  <span class="menu-text">Forms</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="form-inputs.html">Form Inputs</a>
                    </li>
                    <li>
                      <a href="form-checkbox-radio.html">Checkbox &amp; Radio</a>
                    </li>
                    <li>
                      <a href="form-file-input.html">File Input</a>
                    </li>
                    <li>
                      <a href="form-validations.html">Validations</a>
                    </li>
                    <li>
                      <a href="date-time-pickers.html">Date Time Pickers</a>
                    </li>
                    <li>
                      <a href="input-mask.html">Input Masks</a>
                    </li>
                    <li>
                      <a href="input-tags.html">Input Tags</a>
                    </li>
                    <li>
                      <a href="form-layouts.html">Form Layouts</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="bi bi-window-split"></i>
                  <span class="menu-text">Tables</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="tables.html">Tables</a>
                    </li>
                    <li>
                      <a href="data-tables.html">Data Tables</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="bi bi-map"></i>
                  <span class="menu-text">Graphs &amp; Maps</span>
                  <span class="badge green">15</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="apex.html">Apex</a>
                    </li>
                    <li>
                      <a href="morris.html">Morris</a>
                    </li>
                    <li>
                      <a href="maps.html">Maps</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown active">
                <a href="#">
                  <i class="bi bi-layout-sidebar"></i>
                  <span class="menu-text">Layouts</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="layout.html" class="current-page">Default Layout</a>
                    </li>
                    <li>
                      <a href="layout-grid.html">Grid Layout</a>
                    </li>
                    <li>
                      <a href="layout-mega-menu.html">Mega Menu</a>
                    </li>
                    <li>
                      <a href="layout-full-screen.html">Full Screen</a>
                    </li>
                    <li>
                      <a href="hero-header.html">Hero Header</a>
                    </li>
                    <li>
                      <a href="layout-datepicker.html">Layout Datepicker</a>
                    </li>
                    <li>
                      <a href="layout-welcome.html">Welcome Layout</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="bi bi-upc-scan"></i>
                  <span class="menu-text">Authentication</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <a href="login.html">Login</a>
                    </li>
                    <li>
                      <a href="signup.html">Signup</a>
                    </li>
                    <li>
                      <a href="forgot-password.html">Forgot Password</a>
                    </li>
                    <li>
                      <a href="error.html">Error</a>
                    </li>
                    <li>
                      <a href="maintenance.html">Maintenance</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="support.html">
                  <i class="bi bi-code-square"></i>
                  <span class="menu-text">Support</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- Sidebar menu ends -->

      </nav>
      <!-- Sidebar wrapper end -->

      <!-- Content wrapper scroll start -->
      <div class="content-wrapper-scroll">

        <!-- Main header starts -->
        <div class="main-header d-flex align-items-center justify-content-between position-relative">
          <div class="d-flex align-items-center justify-content-center">
            <div class="page-icon">
              <i class="bi bi-layout-sidebar"></i>
            </div>
            <div class="page-title d-none d-md-block">
              <h5>Default Layout</h5>
            </div>
          </div>
          <!-- Live updates start -->
          <ul class="updates d-flex align-items-end flex-column overflow-hidden" id="updates">
            <li>
              <a href="javascript:void(0)">
                <i class="bi bi-envelope-paper text-red font-1x me-2"></i>
                <span>12 emails from David Michaiah.</span>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="bi bi-bar-chart text-blue font-1x me-2"></i>
                <span>15 new features updated successfully.</span>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="bi bi-folder-check text-yellow font-1x me-2"></i>
                <span>The media folder is created successfully.</span>
              </a>
            </li>
          </ul>
          <!-- Live updates end -->

        </div>
        <!-- Main header ends -->
