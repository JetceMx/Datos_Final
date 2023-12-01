<?php
$id = $_GET['id'];
include '../../PHP/conexionBDK.php';

$sql = "DELETE FROM  Pasajero WHERE idPasajero = '" . $id . "'";
$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo "<script languaje='JavaScript'>
    alert('Los datos han sido eliminados!');
    location.assign('../../PHP/Pasajeros/altasPasajeros.php');
    </script>";
} else {
    echo "<script languaje='JavaScript'>
    alert('Los datos NO han sido eliminados correctamente!');
    location.assign('../../PHP/Pasajeros/altasPasajeros.php');
    </script>";
}
