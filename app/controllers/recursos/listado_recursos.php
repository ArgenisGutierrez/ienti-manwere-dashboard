<?php
$sql_recursos = "SELECT * FROM recursos WHERE estado=1";
$query_recursos = $pdo->prepare($sql_recursos);
$query_recursos->execute();
$recursos = $query_recursos->fetchAll(PDO::FETCH_ASSOC);
