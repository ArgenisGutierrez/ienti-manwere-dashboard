<?php
require_once '../../config.php';

// Iniciar sesión para mensajes de feedback
session_start();

// Verificar método POST y existencia de ID
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id_usuario'])) {
    $_SESSION['mensaje'] = "Solicitud inválida";
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Usuarios/");
    exit;
}

try {
    // Validar y sanitizar ID
    $id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);

    if (!$id_usuario || $id_usuario <= 0) {
        throw new Exception("ID de usuario inválido");
    }

    // Configurar PDO para errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si es el último administrador
    $stmt = $pdo->prepare(
        "SELECT COUNT(*) 
                          FROM usuarios u
                          INNER JOIN roles r ON u.id_rol = r.id_rol
                          WHERE r.nombre_rol = 'Administrador'"
    );
    $stmt->execute();
    $adminCount = $stmt->fetchColumn();

    $stmt = $pdo->prepare(
        "SELECT r.nombre_rol 
                          FROM usuarios u
                          INNER JOIN roles r ON u.id_rol = r.id_rol
                          WHERE u.id_usuario = :id_usuario"
    );
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $rolUsuario = $stmt->fetchColumn();

    if ($rolUsuario === 'Administrador' && $adminCount === 1) {
        throw new Exception("No se puede eliminar al último administrador");
    }

    // Eliminar usuario
    $query = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
    $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $query->execute();

    if ($query->rowCount() === 0) {
        $_SESSION['mensaje'] = "El usuario no existe o ya fue eliminado";
        $_SESSION['icono'] = "warning";
    } else {
        $_SESSION['mensaje'] = "Usuario eliminado exitosamente";
        $_SESSION['icono'] = "success";
    }
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error en base de datos: " . $e->getMessage();
    $_SESSION['icono'] = "error";
} catch (Exception $e) {
    $_SESSION['mensaje'] = $e->getMessage();
    $_SESSION['icono'] = "error";
}

header("Location:" . APP_URL . "admin/Usuarios/");
exit;
