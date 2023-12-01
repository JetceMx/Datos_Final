<?php

// Recuperar el ID del pasajero de la URL
$idPasajero = $_GET['id'];
include '../../PHP/header.php';
include '../../PHP/conexionBDK.php';

// Consulta para obtener los datos del pasajero
$sql = "SELECT * FROM Aeropuerto WHERE idAeropuerto = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idPasajero);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Obtener los datos del pasajero
    $row = $result->fetch_assoc();

    // Mostrar el formulario con los datos del pasajero
    echo "
        <div class='container mt-5'>
    <h2>Aeropuerto</h2>
    <form id='altaForm' method='post'  action='actualizarAeropuerto.php'>
        <div class='form-group'>
            <label for='idAeropuerto'>ID del aeropuerto</label>
            <input type='text' class='form-control' id='idAeropuerto' name='idAeropuerto'  value='" . $row['idAeropuerto'] . "' readonly> 
        </div>
        <div class='form-group'>
            <label for='nombreAeropuerto'>Nombre del aeropuerto</label>
            <input type='text' class='form-control' id='nombreAeropuerto' name='nombreAeropuerto' value='" . $row['nombreAeropuerto'] . "' required>
        </div>
        <br>
        <button type='submit' class='btn btn-primary'>Guardar</button>
    </form>
</div>


    ";
} else {
    echo "No se encontró el pasajero.";
}

$stmt->close();
