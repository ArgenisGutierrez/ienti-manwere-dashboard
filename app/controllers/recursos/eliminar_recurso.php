<?php
require_once '../../config.php';
session_start();

// Verificar método POST y parámetros
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id_recurso'])) {
    $_SESSION['mensaje'] = "Solicitud inválida";
    $_SESSION['icono'] = "error";
    header("Location:" . APP_URL . "admin/Recursos/");
    exit;
}

try {
    // Obtener datos del recurso ANTES de eliminar
    $query = $pdo->prepare("SELECT tipo_recurso, contenido_recurso FROM recursos WHERE id_recurso = ?");
    $query->execute([$_POST['id_recurso']]);
    $recurso = $query->fetch(PDO::FETCH_ASSOC);

    if (!$recurso) {
        throw new Exception("Recurso no encontrado");
    }

    // Si el recurso es de tipo 'Archivo', proceder a eliminar el archivo físico
    if ($recurso['tipo_recurso'] === 'Archivo') {
        $url_contenido = $recurso['contenido_recurso'];

        // Definir la ruta base y asegurarse de que termina en "/"
        $ruta_base = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . "/ienti-php/public/recursos/";
        
        // Obtener el nombre del archivo a partir de la URL
        $ruta_url = parse_url($url_contenido, PHP_URL_PATH);
        $nombre_archivo = basename($ruta_url);
        $ruta_completa = $ruta_base . $nombre_archivo;

        // Verificar que las rutas sean válidas
        $ruta_real = realpath($ruta_completa);
        $ruta_base_real = realpath($ruta_base);
        if (!$ruta_real || strpos($ruta_real, $ruta_base_real) !== 0) {
            throw new Exception("Ruta de archivo inválida: " . $ruta_completa);
        }

        // Comprobar que el archivo existe y se intenta eliminar
        if (file_exists($ruta_completa)) {
            if (!unlink($ruta_completa)) {
                throw new Exception("Error al eliminar el archivo: " . $ruta_completa);
            }
        } else {
            // Si el archivo no existe, se registra una advertencia y se continúa
            error_log("Advertencia: El archivo no existe en la ruta: " . $ruta_completa);
        }
    }

    // Eliminar el registro de la base de datos
    $query = $pdo->prepare("DELETE FROM recursos WHERE id_recurso = ?");
    $query->execute([$_POST['id_recurso']]);

    $_SESSION['mensaje'] = "Recurso y archivo eliminados exitosamente";
    $_SESSION['icono'] = "success";

} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error en base de datos: " . $e->getMessage();
    $_SESSION['icono'] = "error";
} catch (Exception $e) {
    $_SESSION['mensaje'] = $e->getMessage();
    $_SESSION['icono'] = "error";
}

header("Location:" . APP_URL . "admin/Recursos/");
exit;
?>
