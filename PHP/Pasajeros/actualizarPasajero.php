<?php
include '../../PHP/conexionBDK.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPasajero = $_POST['idPasajero'];
    $nombrePasajero = $_POST['nombrePasajero'];
    $rfc = $_POST['rfc'];
    // Otros campos

    //! Recordar corregir
    $sql = "UPDATE Pasajero SET nombrePasajero = ?, rfc = ? WHERE idPasajero = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombrePasajero, $rfc, $idPasajero);

    if ($stmt->execute()) {
        echo "<script language='JavaScript'>
        alert('Los datos han sido modificados!');
        location.assign('../../PHP/Pasajeros/altasPasajeros.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Los datos NO han sido modificados!');
        location.assign('../../PHP/Pasajeros/altasPasajeros.php');
        </script>";
    }

    $stmt->close();
}
