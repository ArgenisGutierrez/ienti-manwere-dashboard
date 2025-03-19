<?php
require_once '../app/config.php';
session_start();

if (isset($_SESSION['nombre_usuario'])) {
  session_destroy();
  header('Location: ' . APP_URL . '/login');
}
