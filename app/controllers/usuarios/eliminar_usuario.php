<?php
require_once '../../config.php';
$id_usuario = $_POST['id_usuario'];

$query = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");
$query->bindParam('id_usuario', $id_usuario);

if ($query->execute()) {
  session_start();
  $_SESSION['mensaje'] = "El Usuario Se Elimino Con Exito";
  $_SESSION['icono'] = "success";
  header("Location:" . APP_URL . "admin/Usuarios/");
} else {
  session_start();
  $_SESSION['mensaje'] = "El Usuario No Pudo Ser Eliminado";
  $_SESSION['icono'] = "error";
  header("Location:" . APP_URL . "admin/Usuarios/");
}
