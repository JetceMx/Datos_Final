<?php

$servername = "tu_servidor_mysql";
$username = "tu_usuario_mysql";
$password = "tu_contraseña_mysql";
$dbname = "tu_base_de_datos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT id, nombre, email FROM usuarios";
$result = $conn->query($sql);

// Cerrar la conexión
$conn->close();
