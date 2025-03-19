<?php
require_once '../app/config.php';

$nombre_usuario = $_POST['nombre_usuario'];
$password_usuario = $_POST['password_usuario'];

$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND estado=1";
$query = $pdo->prepare($sql);
$query->execute();
$datos = $query->fetchAll(PDO::FETCH_ASSOC);
$contador = 0;
foreach ($datos as $dato) {
  $password_tabla = $dato['password_usuario'];
  $contador++;
}

if (($contador > 0) && (password_verify($password_usuario, $password_tabla))) {
  session_start();
  $_SESSION['mensaje'] = "Bienvenido " . $nombre_usuario;
  $_SESSION['icono'] = "success";
  $_SESSION['nombre_usuario'] = $nombre_usuario;
  header("Location:" . APP_URL . "/admin");
} else {
  session_start();
  $_SESSION['mensaje'] = "Los datos introducidos son incorrectos";
  header("Location:" . APP_URL . "/login");
}
