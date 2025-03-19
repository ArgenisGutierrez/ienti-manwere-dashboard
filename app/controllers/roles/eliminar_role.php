<?php
require_once '../../config.php';
$id_rol = $_POST['id_rol'];

$query = $pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");
$query->bindParam('id_rol', $id_rol);

if ($query->execute()) {
  session_start();
  $_SESSION['mensaje'] = "El Rol Se Elimino Con Exito";
  $_SESSION['icono'] = "success";
  header("Location:" . APP_URL . "admin/Roles/");
} else {
  session_start();
  $_SESSION['mensaje'] = "El Rol No Pudo Ser Eliminado";
  $_SESSION['icono'] = "error";
  header("Location:" . APP_URL . "admin/Roles/");
}
