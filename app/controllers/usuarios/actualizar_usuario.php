<?php
require_once '../../../app/config.php';
session_start();

// Verificar método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['mensaje'] = "Acceso no autorizado";
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Usuarios/");
    exit;
}

// Obtener datos
$id_usuario = $_POST['id_usuario'] ?? null;
$nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
$email_usuario = trim($_POST['email_usuario'] ?? '');
$id_rol = $_POST['id_rol'] ?? null;
$estado = $_POST['estado'] ?? null;

// Validaciones
$errores = [];
if ($nombre_usuario === '') $errores[] = "Nombre requerido";
if ($email_usuario === '') $errores[] = "Email requerido";
if ($id_rol === null || $id_rol === '') $errores[] = "Rol requerido";
if ($estado === null || $estado === '') $errores[] = "Estado requerido";
if (empty($id_usuario)) $errores[] = "ID de usuario inválido";

if (!empty($errores)) {
    $_SESSION['mensaje'] = implode("<br>", $errores);
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Usuarios/");
    exit;
}

try {
    $sql = $pdo->prepare(
        "UPDATE usuarios 
        SET nombre_usuario = :nombre,
            email_usuario = :email,
            id_rol = :rol,
            estado = :estado,
            fyh_modificacion = :fecha
        WHERE id_usuario = :id"
    );

    $sql->execute([
        ':nombre' => $nombre_usuario,
        ':email' => $email_usuario,
        ':rol' => $id_rol,
        ':estado' => $estado,
        ':fecha' => $fechaHora,
        ':id' => $id_usuario
    ]);

    $_SESSION['mensaje'] = "¡Usuario actualizado!";
    $_SESSION['icono'] = "success";

} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
}

header("Location:" . APP_URL . "admin/Usuarios/");
exit;
