<?php

$servername = "base";
$username = "root";
$password = "Trompudo1@";
$dbname = "proyecto_final";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT idMiembro, nombreMiembro, sexoMiembro FROM miembros";
$result = $conn->query($sql);

// Cerrar la conexión
$conn->close();

?>