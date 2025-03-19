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

// Obtener y sanitizar datos
$nombre = trim($_POST['nombre_usuario'] ?? '');
$password = $_POST['password_usuario'] ?? '';
$email = trim($_POST['email_usuario'] ?? '');
$id_rol = $_POST['id_rol'] ?? null;

// Validaciones básicas
if (empty($nombre) || empty($password) || empty($email) || empty($id_rol)) {
    $_SESSION['mensaje'] = "Todos los campos son requeridos";
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Usuarios/");
    exit;
}

// Validar que las contraseñas coincidan (si aplica)
if ($_POST['password_usuario'] !== $_POST['password_usuario2']) {
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Usuarios/");
    exit;
}

try {
    // Hash de contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = $pdo->prepare(
        "INSERT INTO usuarios 
        (nombre_usuario, password_usuario, email_usuario, id_rol, fyh_creacion,estado) 
        VALUES (?, ?, ?, ?, ?,?)"
    );

    $sql->execute(
        [
        $nombre,
        $passwordHash,
        $email,
        $id_rol, // <- Aquí se usa el rol
        $fechaHora,
        1
        ]
    );

    $_SESSION['mensaje'] = "Usuario creado exitosamente";
    $_SESSION['icono'] = "success";
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error al crear usuario: Email o Usuario ya Existen";
    $_SESSION['icono'] = "error";
}

header("Location:" . APP_URL . "admin/Usuarios/");
exit;
