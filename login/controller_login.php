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
    header("Location:" . APP_URL . "index.php");
} else {
    header("Location:" . APP_URL . "/login");
}
