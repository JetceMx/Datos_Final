<?php
include '../../PHP/conexionBDK.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folioVuelo = $_POST["folioVuelo"];
    $origenVuelo = $_POST["origenVuelo"];
    $destinoVuelo = $_POST["destinoVuelo"];
    $cantidadPasajerosVuelo = $_POST["cantidadPasajerosVuelo"];
    $fechaOrigenVuelo = $_POST["fechaOrigenVuelo"];
    $fechaDestinoVuelo = $_POST["fechaDestinoVuelo"];
    $horaOrigenVuelo = $_POST["horaOrigenVuelo"];
    $horaDestinoVuelo = $_POST["horaDestinoVuelo"];
    $Avion_idAvion = $_POST["Avion_idAvion"];
    $Piloto_idPiloto = $_POST["Piloto_idPiloto"];
    $Piloto_Aeropuerto_idAeropuerto = $_POST["Piloto_Aeropuerto_idAeropuerto"];

    // Otros campos

    //! Recordar corregir
    $sql = "UPDATE programavuelos SET origenVuelo = ?, destinoVuelo = ?, cantidadPasajerosVuelo = ?,
    fechaOrigenVuelo = ?, fechaDestinoVuelo = ?, horaOrigenVuelo = ?, horaDestinoVuelo = ?
     WHERE folioVuelo = ?";
    $stmt = $conn->prepare($sql);

    // Asignar los valores a los parámetros
    $stmt->bind_param(
        "ssissssi",
        $origenVuelo,
        $destinoVuelo,
        $cantidadPasajerosVuelo,
        $fechaOrigenVuelo,
        $fechaDestinoVuelo,
        $horaOrigenVuelo,
        $horaDestinoVuelo,
        $folioVuelo
    );

    if ($stmt->execute()) {
        echo "<script language='JavaScript'>
        alert('Los datos han sido modificados!');
        location.assign('../../PHP/ProgramaVuelos/altasProgramaVuelos.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Los datos NO han sido modificados!');
        location.assign('../../PHP/ProgramaVuelos/altasProgramaVuelos.php');
        </script>";
    }

    $stmt->close();
}
