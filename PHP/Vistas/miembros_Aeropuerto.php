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
                    <th scope="col">ID Piloto</th>
                    <th scope="col">Nombre Piloto</th>
                    <th scope="col">ID Aeropuerto</th>
                    <th scope="col">Nombre Aeropuerto</th>
                    <th scope="col">ID Miembro</th>
                    <th scope="col">Nombre Miembro</th>
                </tr>
                <?php
                echo '<tbody>';
                $sql = "SELECT * FROM miembros_Aeropuerto";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                    <td>" . $row['idPiloto'] . "</td>
                    <td>" . $row['nombrePiloto'] . "</td>
                    <td>" . $row['idAeropuerto'] . "</td>
                    <td>" . $row['nombreAeropuerto'] . "</td>
                    <td>" . $row['idMiembro'] . "</td>
                    <td>" . $row['nombreMiembro'] . "</td>
                </tr>";
                    }
                } else {
                    echo "No se encontraron resultados.";
                }
                ?>
</body>

</html>