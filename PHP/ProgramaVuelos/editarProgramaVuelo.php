<?php

// Recuperar el ID del pasajero de la URL
$folioVuelo = $_GET['id'];
include '../../PHP/header.php';
include '../../PHP/conexionBDK.php';

// Consulta para obtener los datos del pasajero
$sql = "SELECT * FROM programavuelos WHERE folioVuelo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $folioVuelo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Obtener los datos del pasajero
    $row = $result->fetch_assoc();

    // Mostrar el formulario con los datos del pasajero
    echo "
    <div class='container mt-5'>
        <h2>Programa de Vuelos</h2>
        <form id='altaForm' method='post' action='actualizarProgramaVuelo.php'>
            <div class='form-group'>
                <label for='folioVuelo'>Folio del vuelo</label>
                <input type='text' class='form-control' id='folioVuelo' name='folioVuelo' value='" . $row['folioVuelo'] . "' readonly>
            </div>
            <div class='form-group'>
                <label for='origenVuelo'>Origen del vuelo</label>
                <input type='text' class='form-control' id='origenVuelo' name='origenVuelo' value='" . $row['origenVuelo'] . "' >
            </div>
            <div class='form-group'>
                <label for='destinoVuelo'>Destino del vuelo</label>
                <input type='text' class='form-control' id='destinoVuelo' name='destinoVuelo' value='" . $row['destinoVuelo'] . "' >
            </div>
            <div class='form-group'>
                <label for='cantidadPasajerosVuelo'>Pasajeros a bordo</label>
                <input type='float' class='form-control' id='cantidadPasajerosVuelo' name='cantidadPasajerosVuelo' value='" . $row['cantidadPasajerosVuelo'] . "' >
            </div>
            <div class='form-group'>
                <label for='fechaOrigenVuelo'>Fecha del despegue</label>
                <input type='date' class='form-control' id='fechaOrigenVuelo' name='fechaOrigenVuelo' value='" . $row['fechaOrigenVuelo'] . "' >
            </div>
            <div class='form-group'>
                <label for='fechaDestinoVuelo'>Fecha del aterrizaje</label>
                <input type='date' class='form-control' id='fechaDestinoVuelo' name='fechaDestinoVuelo'  value='" . $row['fechaDestinoVuelo'] . "' >
            </div>
            <div class='form-group'>
                <label for='horaOrigenVuelo'>Hora del despegue</label>
                <input type='time' class='form-control' id='horaOrigenVuelo' name='horaOrigenVuelo'  value='" . $row['horaOrigenVuelo'] . "' >
            </div>
            <div class='form-group'>
                <label for='horaDestinoVuelo'>Hora del aterrizaje</label>
                <input type='time' class='form-control' id='horaDestinoVuelo' name='horaDestinoVuelo'  value='" . $row['horaDestinoVuelo'] . "' >
            </div>
             <div class='form-group'>
                <label for='Avion_idAvion'>ID del avion</label>
                <input type='text' class='form-control' id='Avion_idAvion' name='Avion_idAvion' value='" . $row['Avion_idAvion'] . "' readonly>
            </div>
            <div class='form-group'>
                <label for='Piloto_idPiloto'>ID del piloto</label>
                <input type='text' class='form-control' id='Piloto_idPiloto' name='Piloto_idPiloto' value='" . $row['Piloto_idPiloto'] . "' readonly>
            </div>
            <div class='form-group'>
                <label for='Piloto_Aeropuerto_idAeropuerto'>ID del aeropuerto</label>
                <input type='text' class='form-control' id='Piloto_Aeropuerto_idAeropuerto' name='Piloto_Aeropuerto_idAeropuerto' value='" . $row['Piloto_Aeropuerto_idAeropuerto'] . "' readonly>
            </div>

            <br>
            <button type='submit' class='btn btn-primary'>Actualizar</button>
        </form>
    </div>

    ";
} else {
    echo "No se encontró el vuelo programado.";
}

$stmt->close();
