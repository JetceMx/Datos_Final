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
            <th scope="col">Maletas Registradas</th>
        </tr>
    </thead>
    <?php
    echo '<tbody>';
    //-- Crear un índice personalizado en la tabla empleado
    $sql = " CALL verificar_maletas();

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
