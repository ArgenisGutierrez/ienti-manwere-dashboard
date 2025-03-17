<?php
require_once '../app/config.php';
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Meta -->
  <meta name="description" content="ienti & manwere dashboard" />
  <link rel="shortcut icon" href="<?php echo APP_URL ?>/public/images/icon.ico" />

  <!-- Title -->
  <title><?php echo APP_NAME ?></title>

  <!-- *************
            ************ Common Css Files *************
        ************ -->
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="<?php echo APP_URL ?>/public/css/bootstrap.min.css" />

  <!-- Bootstrap font icons css -->
  <link rel="stylesheet" href="<?php echo APP_URL ?>/public/fonts/bootstrap/bootstrap-icons.css" />

  <!-- Main css -->
  <link rel="stylesheet" href="<?php echo APP_URL ?>/public/css/main.min.css" />

  <!-- Login css -->
  <link rel="stylesheet" href="<?php echo APP_URL ?>/public/css/login.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="login-container">
  <!-- Login box start -->
  <div class="container">
    <form action="controller_login.php" id="login-form" autocomplete="off" method="post">
      <div class="login-box rounded-2 p-5">
        <div class="login-form">
          <a href="https://www.ienti.com.mx" class="login-logo mb-3">
            <img src="<?php echo APP_URL ?>/public/images/logo.webp" alt="Logo ienti & manwere" />
          </a>
          <h5 class="fw-light mb-5">Inicia Sesión para acceder</h5>
          <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input id="usuario" name="usuario" type="text" class="form-control" placeholder="Ingresa tu usuario" />
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Ingresa tu contraseña" />
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="forgot-password.html" class="text-blue text-decoration-underline">Olvidaste tu contraseña?</a>
          </div>
          <div class="d-grid py-3">
            <input type="hidden" name="enviar" value="si"></input>
            <button type="submit" class="btn btn-lg btn-primary">
              Iniciar Sesión
            </button>
          </div>
        </div>
      </div>
    </form>
    <?php
    session_start();
    if (isset($_SESSION['mensaje'])) {
        $mensaje = $_SESSION['mensaje'];
        ?>
      <script>
        Swal.fire({
          icon: "error",
          title: '<?php echo $mensaje ?>',
          showConfirmButton: false,
          timer: 2500
        });
      </script>
        <?php
    }
    session_destroy();
    ?>
  </div>
  <!-- Login box end -->
</body>

</html>
