<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/index.css">
    <title>Document</title>
</head>

<body>
    <?php
    include '../../PHP/header.php';
    include '../../PHP/conexionBDK.php';
    ?>

    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Origen Vuelo</th>
                    <th scope="col">Fecha Origen</th>
                    <th scope="col">Hora Origen Vuelo</th>
                    <th scope="col">Fecha Despegue</th>
                    <th scope="col">Hora Despegue</th>
                    <th scope="col">ID Avion</th>
                </tr>
                <?php
                echo '<tbody>';
                $sql = "SELECT * FROM vista_vuelo";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row['origenVuelo'] . "</td>
                        <td>" . $row['fechaOrigen'] . "</td>
                        <td>" . $row['horaOrigenVuelo'] . "</td>
                        <td>" . $row['fechaDespegue'] . "</td>
                        <td>" . $row['horaDespegue'] . "</td>
                        <td>" . $row['idAvion'] . "</td>
                </tr>";
                    }
                } else {
                    echo "No se encontraron resultados.";
                }
                ?>
</body>

</html>