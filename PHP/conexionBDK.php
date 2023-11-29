<?php

$servername = "localhost";
$username = "root";
$password = "Sandia2016.!";
$dbname = "proyecto_final";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
