<?php
session_start();
require_once '../../config.php';

try {

    // Obtener datos actuales
    $stmt = $pdo->prepare("SELECT * FROM recursos WHERE id_recurso = ?");
    $stmt->execute([$_POST['id_recurso']]);
    $recurso_actual = $stmt->fetch();

    if (!$recurso_actual) {
        throw new Exception("Recurso no encontrado");
    }

    $nuevo_contenido = $recurso_actual['contenido_recurso'];
    $eliminar_archivo = false;

    // Procesar nuevo archivo
    if ($_POST['tipo_recurso'] === 'Archivo' && !empty($_FILES['contenido_recurso']['name'])) {
        $directorio = $_SERVER['DOCUMENT_ROOT'] . '/ienti-php/public/recursos/';
        $nombre_archivo = uniqid() . '_' . basename($_FILES['contenido_recurso']['name']);
        $ruta_destino = $directorio . $nombre_archivo;

        // Validar y subir archivo
        if (!move_uploaded_file($_FILES['contenido_recurso']['tmp_name'], $ruta_destino)) {
            throw new Exception("Error al subir el archivo");
        }
        
        $nuevo_contenido = $nombre_archivo;
        $eliminar_archivo = true;
    } 
    elseif ($_POST['tipo_recurso'] !== 'Archivo') {
        $nuevo_contenido = $_POST['contenido_recurso'];
        $eliminar_archivo = ($recurso_actual['tipo_recurso'] === 'Archivo');
    }

    // Eliminar archivo anterior si es necesario
    if ($eliminar_archivo && $recurso_actual['tipo_recurso'] === 'Archivo') {
        $ruta_anterior = $_SERVER['DOCUMENT_ROOT'] . '/ienti-php/public/recursos/' . $recurso_actual['contenido_recurso'];
        
        if (file_exists($ruta_anterior)) {
            if (!unlink($ruta_anterior)) {
                throw new Exception("No se pudo eliminar: $ruta_anterior");
            }
        } else {
            throw new Exception("Archivo anterior no encontrado: $ruta_anterior");
        }
    }

    // Actualizar BD
    $stmt = $pdo->prepare(
        "UPDATE recursos SET 
        descripcion_recurso = ?,
        clasificacion_recurso = ?,
        tipo_recurso = ?,
        contenido_recurso = ?
        WHERE id_recurso = ?"
    );

    $stmt->execute(
        [
        $_POST['descripcion_recurso'],
        $_POST['clasificacion_recurso'],
        $_POST['tipo_recurso'],
        $nuevo_contenido,
        $_POST['id_recurso']
        ]
    );

    $_SESSION['mensaje'] = "Actualización exitosa!";
    $_SESSION['icono'] = "success";

} catch (Exception $e) {
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
}

header("Location: " . APP_URL . "/admin/Recursos");
exit;
