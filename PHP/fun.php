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
    include '../PHP/ConexionSE.php'
    ?>

    <br>


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nombre de Piloto</th>
        </tr>
    </thead>
    
    <?php
    echo '<tbody>';
    //-- Crear un índice personalizado en la tabla empleado
    $sql = "SELECT get_nombre_piloto(1) AS NombreDelPiloto;
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


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id con modelo de avion</th>
        </tr>
    </thead>
    
    <?php
    echo '<tbody>';
    //-- Crear un índice personalizado en la tabla empleado
    $sql = "SELECT obtener_ids_aviones('nueveonce') AS ListaDeIDs;
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
