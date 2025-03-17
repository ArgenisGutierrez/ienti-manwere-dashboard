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
          <img src="<?php echo APP_URL ?>/public/images/logo.webp" class="d-none d-md-block me-4" alt="ienti & manwere" />
          <img src="<?php echo APP_URL ?>/public/images/logo.webp" class="d-block d-md-none me-4" alt="ienti & manwere" />
        </a>
      </div>
      <!-- Sidebar brand ends -->

      <div class="toggle-sidebar" id="toggle-sidebar">
        <i class="bi bi-list"></i>
      </div>

      <!-- Header actions ccontainer start -->
      <div class="header-actions-container">
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
        </div>
        <!-- Header actions start -->

        <!-- Header profile start -->
        <div class="header-profile d-flex align-items-center">
          <div class="dropdown">
            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
              <span class="user-name d-none d-md-block"><?php echo $usuario_sesion; ?></span>
              <span class="avatar">
                <img src="<?php echo APP_URL ?>/public/images/user7.png" alt="User Avatar" />
                <span class="status online"></span>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
              <div class="header-profile-actions">
                <a href="profile.html">Profile</a>
                <a href="account-settings.html">Settings</a>
                <a href="<?php echo APP_URL ?>login/logout.php">Cerrar Session</a>
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
                <a href="<?php echo APP_URL; ?>admin/index.php">
                  <i class="bi bi-house"></i>
                  <span class="menu-text">Home</span>
                </a>
              </li>
              <li>
                <a href="<?php echo APP_URL; ?>admin/recursos.php">
                  <i class="bi bi-box"></i>
                  <span class="menu-text">Recursos</span>
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
