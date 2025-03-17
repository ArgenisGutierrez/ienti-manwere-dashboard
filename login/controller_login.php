<?php
require_once '../app/config.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND estado=1";
$query = $pdo->prepare($sql);
$query->execute();
$datos = $query->fetchAll(PDO::FETCH_ASSOC);
$contador = 0;
foreach ($datos as $dato) {
    $password_tabla = $dato['password'];
    $contador++;
}

if (($contador > 0) && ($password_tabla == $password)) {
    session_start();
    $_SESSION['mensaje'] = "Bienvenido " . $usuario;
    $_SESSION['icono'] = "success";
    $_SESSION['usuario'] = $usuario;
    header("Location:" . APP_URL . "/admin");
} else {
    session_start();
    $_SESSION['mensaje'] = "Los datos introducidos son incorrectos";
    header("Location:" . APP_URL . "/login");
}
