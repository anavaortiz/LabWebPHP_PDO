<?php

#... configuración para la conexión de la base de datos ...

$host = "localhost";
$username = "profesor";
$password = "Pepino76$";
$dbname = "LabWebAlumnos";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

?>
