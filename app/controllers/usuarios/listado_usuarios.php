<?php
$sql_usuarios = "SELECT u.id_usuario, u.nombre_usuario,u.email_usuario,r.nombre_rol,u.fyh_creacion,u.estado FROM usuarios u JOIN roles r ON u.id_rol = r.id_rol";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
