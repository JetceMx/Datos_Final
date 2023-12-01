<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/index.css">
    <title>Sabinito Airport</title>
</head>

<body>
    <?php
    // Incluye el encabezado en todas las páginas que lo necesiten
    include '../PHP/header.php';
    include '../PHP/conexionBDK.php';
    ?>

    <br>


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nombre de Piloto</th>
            <th scope="col">Fecha</th>
            <th scope="col">Aeropuerto</th>
        </tr>
    </thead>
    <?php
    echo '<tbody>';
    //-- Crear un índice personalizado en la tabla empleado
    $sql = "SELECT p.nombrePiloto, v.fechaDespegue, a.nombreAeropuerto
            FROM piloto p
            JOIN vuelo v ON p.idPiloto = v.Piloto_idPiloto
            JOIN aeropuerto a ON v.idAeropuerto = a.idAeropuerto;
    ";
    $result = $conn->query($sql);
    // Mostrar datos
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        foreach ($row as $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
    }

    echo '</tbody>';
    ?>
</table>

</body>

</html>
