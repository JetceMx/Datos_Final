<?php
include '../../PHP/conexionBDK.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAeropuerto = $_POST["idAeropuerto"];
    $nombreAeropuerto = $_POST["nombreAeropuerto"];

    $stmt = $conn->prepare("UPDATE Aeropuerto SET nombreAeropuerto = ? WHERE idAeropuerto = ?");

    // Bind parameters
    $stmt->bind_param("si", $nombreAeropuerto, $idAeropuerto);

    if ($stmt->execute()) {
        echo "<script language='JavaScript'>
        alert('Los datos han sido modificados!');
        location.assign('../../PHP/Aeropuerto/altasAeropuerto.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Los datos NO han sido modificados!');
        location.assign('../../PHP/Aeropuerto/altasAeropuerto.php');
        </script>";
    }

    $stmt->close();
}
