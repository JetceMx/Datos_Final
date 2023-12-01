<?php

// Recuperar el ID del pasajero de la URL
$idPasajero = $_GET['id'];
include '../../PHP/header.php';
include '../../PHP/conexionBDK.php';

// Consulta para obtener los datos del pasajero
$sql = "SELECT * FROM Pasajero WHERE idPasajero = ?";
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
            <h2>Pasajeros</h2>
            <form id='altaForm' method='post' action='actualizarPasajero.php'>
            <input type='hidden' name='idPasajero' value='" . $row['idPasajero'] . "'>
                <div class='form-group'>
                    <label for='nombrePasajero'>Nombre</label>
                    <input type='text' class='form-control' id='nombrePasajero' name='nombrePasajero' value='" . $row['nombrePasajero'] . "' required>
                </div>
                <div class='form-group'>
                    <label for='rfc'>RFC</label>
                    <input type='text' class='form-control' id='rfc' name='rfc' value='" . $row['rfc'] . "' required>
                </div>
                <div class='form-group'>
                    <label for='Telefono'>Telefono</label>
                    <input type='float' class='form-control' id='Telefono' name='Telefono' value='" . $row['Telefono'] . "' required>
                </div>
                <div class='form-group'>
                    <label for='cantMaletas'>Cantidad de maletas</label>
                    <input type='number' class='form-control' id='cantMaletas' name='cantMaletas' value='" . $row['cantMaletas'] . "' required>
                </div>
                <div class='form-group'>
                    <label for='pesoTMaletas'>Peso de las maletas(kg)</label>
                    <input type='float' class='form-control' id='pesoTMaletas' name='pesoTMaletas'  value='" . $row['pesoTMaletas'] . "' required>
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
