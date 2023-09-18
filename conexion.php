<?php
// Datos de conexión
$host = "35.222.2.156";
$port = "5432";
$dbname = "bd_academico_unas";
$user = "postgres"; // Reemplaza "tu_usuario" con el nombre de usuario de la base de datos
$password = "gi#api2019@capi"; // Reemplaza "tu_contraseña" con la contraseña de la base de datos

try {
    $conexion = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>