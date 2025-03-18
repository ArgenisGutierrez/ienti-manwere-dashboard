<?php
require_once '../../../app/config.php';
$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'utf8');

if (empty($nombre_rol)) {
    session_start();
    $_SESSION['mensaje'] = "El Rol Nombre de Rol no puede estar vacio.";
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Roles/");
} else {
    $sql = $pdo->prepare("INSERT INTO roles ( nombre_rol,fyh_creacion,estado ) VALUES (:nombre_rol,:fyh_creacion,:estado)");
    $sql->bindParam('nombre_rol', $nombre_rol);
    $sql->bindParam('fyh_creacion', $fechaHora);
    $sql->bindParam('estado', $estado);

    try {
        if ($sql->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Role Creado Con Exito";
            $_SESSION['icono'] = "success";
            header("Location:" . APP_URL . "admin/Roles/");
        } else {
            session_start();
            $_SESSION['mensaje'] = "El Rol No Pude Ser Creado";
            $_SESSION['icono'] = "error";
            header("Location:" . APP_URL . "admin/Roles/");
        }
    } catch (Exception $e) {
        session_start();
        $_SESSION['mensaje'] = "Este Rol ya existe";
        $_SESSION['icono'] = "error";
        header("Location:" . APP_URL . "admin/Roles/");
    }
}
