<?php
session_start();
require_once '../../../app/config.php';

// Validar campos obligatorios
if (empty($_POST['descripcion_recurso']) 
    || empty($_POST['clasificacion_recurso']) 
    || empty($_POST['tipo_recurso'])
) {
    $_SESSION['mensaje'] = "Faltan datos obligatorios";
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Recursos/");
    exit;
}

// Obtener datos del formulario
$descripcion = $_POST['descripcion_recurso'];
$clasificacion = $_POST['clasificacion_recurso'];
$tipo = $_POST['tipo_recurso'];
$estado = '1';
$contenido = '';

// Manejar contenido según el tipo
if ($tipo === 'Archivo') {
    // Validar archivo subido
    if (!isset($_FILES['contenido_recurso']) 
        || $_FILES['contenido_recurso']['error'] !== UPLOAD_ERR_OK
    ) {
        $_SESSION['mensaje'] = "Error: Debes subir un archivo";
        $_SESSION['icono'] = "error";
        header("Location:" . APP_URL . "admin/Recursos/");
        exit;

    }

    // Configurar directorio y nombre del archivo
    $directorioDestino = $_SERVER['DOCUMENT_ROOT'] . '/ienti-php/public/recursos/';
    $nombreArchivo = uniqid() . '_' . basename($_FILES['contenido_recurso']['name']);
    $rutaCompleta = $directorioDestino . $nombreArchivo;

    // Crear directorio si no existe
    if (!file_exists($directorioDestino)) {
        mkdir($directorioDestino, 0755, true);
    }

    // Mover el archivo
    if (move_uploaded_file($_FILES['contenido_recurso']['tmp_name'], $rutaCompleta)) {
        $contenido = $nombreArchivo;
    } else {
        $_SESSION['mensaje'] = "Error al guardar el archivo";
        $_SESSION['icono'] = "error";
        header("Location:" . APP_URL . "admin/Recursos/");
        exit;
    }
} else {
    // Validar URL/Video
    $contenido = $_POST['contenido_recurso'] ?? '';
    if (empty($contenido)) {
        $_SESSION['mensaje'] = "El campo URL/Video es obligatorio";
        $_SESSION['icono'] = "error";
        header("Location:" . APP_URL . "admin/Recursos/");
        exit;
    }
}

// Insertar en la base de datos
try {
    $sentencia = $pdo->prepare(
        'INSERT INTO recursos 
        (descripcion_recurso, clasificacion_recurso, tipo_recurso, contenido_recurso, fyh_creacion, estado)
        VALUES 
        (:descripcion, :clasificacion, :tipo, :contenido, NOW(), :estado)'
    );

    $sentencia->execute(
        [
        ':descripcion' => $descripcion,
        ':clasificacion' => $clasificacion,
        ':tipo' => $tipo,
        ':contenido' => $contenido,
        ':estado' => $estado
        ]
    );

    $_SESSION['mensaje'] = "Recurso creado con exito";
    $_SESSION['icono'] = "success";
    header("Location:" . APP_URL . "admin/Recursos/");
    exit;
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error de la base de datos".$e->getMessage();
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Recursos/");
    exit;
}
