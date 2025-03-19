<?php
require_once '../../config.php';

// Configurar para devolver JSON
header('Content-Type: application/json');

try {
  session_start();

  // Verificar método POST y existencia de ID
  if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id_rol'])) {
    throw new Exception("Solicitud inválida", 400);
  }

  // Validar ID
  $id_rol = filter_input(INPUT_POST, 'id_rol', FILTER_VALIDATE_INT);
  if (!$id_rol || $id_rol <= 0) {
    throw new Exception("ID de rol inválido", 400);
  }

  // Configurar PDO para excepciones
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Verificar usuarios asociados
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE id_rol = :id_rol");
  $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
  $stmt->execute();

  if ($stmt->fetchColumn() > 0) {
    throw new Exception("No se puede eliminar: Rol tiene usuarios asociados", 403);
  }

  // Eliminar el rol
  $query = $pdo->prepare("DELETE FROM roles WHERE id_rol = :id_rol");
  $query->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
  $query->execute();

  if ($query->rowCount() === 0) {
    throw new Exception("El rol no existe", 404);
  }

  // Respuesta exitosa
  echo json_encode(
    [
      'success' => true,
      'message' => 'Rol eliminado exitosamente'
    ]
  );
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(
    [
      'success' => false,
      'error' => 'Error en base de datos: ' . $e->getMessage()
    ]
  );
} catch (Exception $e) {
  http_response_code($e->getCode() ?: 500);
  echo json_encode(
    [
      'success' => false,
      'error' => $e->getMessage()
    ]
  );
}

