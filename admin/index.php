<?php
require_once '../app/config.php';
require_once 'Main/Head.php';
require_once '../app/controllers/usuarios/listado_usuarios.php';
$numero_usuarios = 0;
foreach ($usuarios as $usuario) {
  $numero_usuarios++;
}
?>
<!-- Main header starts -->
<div class="main-header d-flex align-items-center justify-content-between position-relative">
  <div class="d-flex align-items-center justify-content-center">
    <div class="page-icon">
      <i class="bi bi-layout-sidebar"></i>
    </div>
    <div class="page-title d-none d-md-block">
      <h5>Home</h5>
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
<!-- Content wrapper start -->
<div class="content-wrapper">

  <!-- Row start -->
  <div class="row gx-3">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Administrador Home</div>
        </div>
        <div class="card-body">
          <div class="row gx-3">
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="stats-tile d-flex align-items-center position-relative tile-green">
                <div class="sale-icon icon-box xl rounded-5 me-3">
                  <i class="bi bi-emoji-smile font-2x text-green"></i>
                </div>
                <div class="sale-details">
                  <h5 class="text-light">Usuarios</h5>
                  <h3><?php echo $numero_usuarios ?></h3>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="stats-tile d-flex align-items-center position-relative tile-blue">
                <div class="sale-icon icon-box xl rounded-5 me-3">
                  <i class="bi bi-sticky font-2x text-blue"></i>
                </div>
                <div class="sale-details">
                  <h5 class="text-light">Recursos</h5>
                  <h3>368</h3>
                </div>
                <div class="tile-count d-flex align-items-center justify-content-center flex-column fw-bold blue">
                  <i class="bi bi-arrow-up-circle-fill font-1x"></i>
                  <span>5%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->

</div>
<!-- Content wrapper end -->
<?php
require_once 'Main/Footer.php';
require_once '../layout/mensajes.php';
?>
