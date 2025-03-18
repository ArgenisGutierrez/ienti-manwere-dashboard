<?php
define('SERVIDOR', 'localhost');
define('USUARIO', 'ienti');
define('PASSWORD', 'ienti95');
define('DB', 'ienti');
define('APP_NAME', 'ienti & manwere');
define('APP_URL', 'http://localhost/ienti-php/');
define('KEY_API_MAPS', '');
date_default_timezone_set(timezoneId: 'America/Mexico_City');

$servidor = "mysql:host=" . SERVIDOR . ";dbname=" . DB;
try {
  $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
  print_r($e);
}


$fechaHora = date(format: 'Y-m-d H:i:s');
$fecha_actual = date(format: 'Y-m-d');
$dia_actual = date(format: 'd');
$mes_actual = date(format: 'm');
$ano_actual = date(format: 'Y');
$estado = '1';
