<?php
// Incluir el archivo de conexión
require_once('conexion.php');

// Verificar si se proporcionó un código de estudiante en la URL
if (isset($_GET['codigo'])) {
    // Obtener el código de estudiante proporcionado por el usuario
    $codigo_estudiante = $_GET['codigo'];

    // Realizar una consulta para buscar al estudiante
    $query = "SELECT * FROM estudiante WHERE codigo = :codigo";
    $statement = $conexion->prepare($query); // Protección contra ataques SQL
    $statement->bindParam(':codigo', $codigo_estudiante);
    $statement->execute();

    // Verificar si se encontró al estudiante
    $fila = $statement->fetch(PDO::FETCH_ASSOC);
    if ($fila !== false) {
        // Generar una respuesta en formato XML
        header('Content-Type: text/xml');
        echo "<estudiante>";
        foreach ($fila as $columna => $valor) {
            echo "<$columna>$valor</$columna>";
        }
        echo "</estudiante>";
    } else {
        // El estudiante no fue encontrado
        header('HTTP/1.1 404 Not Found');
        header('Content-Type: text/xml');
        echo "<error>Estudiante no encontrado</error>";
    }
} else {
    // No se proporcionó un código de estudiante en la URL
    header('HTTP/1.1 400 Bad Request');
    header('Content-Type: text/xml');
    echo "<error>Código de estudiante no proporcionado</error>";
}

// Cierra la conexión
$conexion = null;
?>
