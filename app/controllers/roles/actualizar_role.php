<?php
require_once '../../../app/config.php';
$id_role = $_POST['id_rol'];
$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'utf8');

if (empty($nombre_rol)) {
    session_start();
    $_SESSION['mensaje'] = "El Rol Nombre de Rol no puede estar vacio.";
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Roles/");
} else {
    $sql = $pdo->prepare("UPDATE roles r SET nombre_rol=:nombre_rol, fyh_modificacion=:fyh_modificacion WHERE r.id_rol=:id_role");
    $sql->bindParam('nombre_rol', $nombre_rol);
    $sql->bindParam('fyh_modificacion', $fechaHora);
    $sql->bindParam('id_role', $id_role);

    try {
        if ($sql->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Role Actualizado Con Exito";
            $_SESSION['icono'] = "success";
            header("Location:" . APP_URL . "admin/Roles/");
        } else {
            session_start();
            $_SESSION['mensaje'] = "El Rol No Pudo Ser Actualizado";
            $_SESSION['icono'] = "error";
            header("Location:" . APP_URL . "admin/Roles/");
        }
    } catch (Exception $e) {
        session_start();
        $_SESSION['mensaje'] = "Ese Rol Ya Existe";
        $_SESSION['icono'] = "error";
        header("Location:" . APP_URL . "admin/Roles/");
    }
}
