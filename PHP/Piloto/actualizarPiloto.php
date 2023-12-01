<?php
include '../../PHP/conexionBDK.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPiloto = $_POST["idPiloto"];
    $nombrePiloto = $_POST["nombrePiloto"];
    $sexoPiloto = $_POST["sexoPiloto"];
    $Aeropuerto_idAeropuerto = $_POST["Aeropuerto_idAeropuerto"];
    $rfc_p = $_POST["rfc_p"];
    $Telefono_p = $_POST["Telefono_p"];
    $Nivel_p = $_POST["Nivel_p"];
    // Otros campos

    //! Recordar corregir
    $sql = "UPDATE Piloto SET nombrePiloto = ?, sexoPiloto = ? , rfc_p = ?, Telefono_p = ?, Nivel_p = ?  WHERE idPiloto = ?";
    $stmt = $conn->prepare($sql);

    // Asignar los valores a los parámetros
    $stmt->bind_param("sssssi", $nombrePiloto, $sexoPiloto, $rfc_p, $Telefono_p, $Nivel_p, $idPiloto);

    if ($stmt->execute()) {
        echo "<script language='JavaScript'>
        alert('Los datos han sido modificados!');
        location.assign('../../PHP/Piloto/altasPiloto.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Los datos NO han sido modificados!');
        location.assign('../../PHP/Piloto/altasPiloto.php');
        </script>";
    }

    $stmt->close();
}
