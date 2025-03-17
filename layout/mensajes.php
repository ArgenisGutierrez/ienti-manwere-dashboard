<?php
if (isset($_SESSION['mensaje']) && (isset($_SESSION['icono']))) {
  $icono = $_SESSION['icono'];
  $mensaje = $_SESSION['mensaje'];
?>
  <script>
    Swal.fire({
      icon: "<?php echo $icono ?>",
      title: "<?php echo $mensaje ?>",
      showConfirmButton: false,
      timer: 2500
    });
  </script>
<?php
  unset($_SESSION['mensaje']);
  unset($_SESSION['icono']);
}
?>
