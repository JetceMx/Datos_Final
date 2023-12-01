<?php

// Recuperar el ID del pasajero de la URL
$idPasajero = $_GET['id'];
include '../../PHP/header.php';
include '../../PHP/conexionBDK.php';

// Consulta para obtener los datos del pasajero
$sql = "SELECT * FROM Piloto WHERE idPiloto = ?";
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
    <h2>Piloto</h2>
    <form id='altaForm' method='post' action='actualizarPiloto.php'>
        <div class='form-group'>
            <label for='idPiloto'>ID del piloto</label>
            <input type='text' class='form-control' id='idPiloto' name='idPiloto' value='" . $row['idPiloto'] . "' readonly>
        </div>
        <div class='form-group'>
            <label for='nombrePiloto'>Nombre del piloto</label>
            <input type='text' class='form-control' id='nombrePiloto' name='nombrePiloto' value='" . $row['nombrePiloto'] . "'>
        </div>
        <div class='form-group'>
            <label for='sexoPiloto'>Sexo del piloto</label>
            <input type='text' class='form-control' id='sexoPiloto' name='sexoPiloto' value='" . $row['sexoPiloto'] . "'>
        </div>
        <div class='form-group'>
            <label for='Aeropuerto_idAeropuerto'>ID del aeropuerto</label>
            <input type='text' class='form-control' id='Aeropuerto_idAeropuerto' name='Aeropuerto_idAeropuerto' value='" . $row['Aeropuerto_idAeropuerto'] . "' readonly>
        </div>
        <div class='form-group'>
            <label for='rfc_p'>RFC del piloto</label>
            <input type='text' class='form-control' id='rfc_p' name='rfc_p'  value='" . $row['rfc_p'] . "'>
        </div>
        <div class='form-group'>
            <label for='Telefono_p'>Telefono del piloto</label>
            <input type='text' class='form-control' id='Telefono_p' name='Telefono_p'  value='" . $row['Telefono_p'] . "'>
        </div>
        <div class='form-group'>
                <label for='Nivel_p'>Nivel del piloto</label>
                <input type='text' class='form-control' id='Nivel_p' name='Nivel_p' value='" . $row['Nivel_p'] . "'>
            </div>
            <br>
            <button type='submit' class='btn btn-primary'>Actualizar</button>
        </form>
    </div>

    ";
} else {
    echo "No se encontró el pasajero.";
}

$stmt->close();
