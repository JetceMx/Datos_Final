<?php
$id = $_GET['id'];
include '../../PHP/conexionBDK.php';

$sql = "DELETE FROM  Aeropuerto WHERE idAeropuerto = '" . $id . "'";
$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo "<script language='JavaScript'>
    alert('Los datos han sido eliminados!');
    location.assign('../../PHP/Aeropuerto/altasAeropuerto.php');
    </script>";
} else {
    echo "<script language='JavaScript'>
    alert('Los datos NO han sido eliminados correctamente!');
    location.assign('../../PHP/Aeropuerto/altasAeropuerto.php');
    </script>";
}

$stmt->close();
