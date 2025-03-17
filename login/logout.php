<?php
require_once '../app/config.php';
session_start();

if (isset($_SESSION['usuario'])) {
    session_destroy();
    header('Location: ' . APP_URL . '/login');
}
