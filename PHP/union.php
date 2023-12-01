<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/index.css">
    <title>Union</title>
</head>

<body>
    <?php
    include '../PHP/header.php';
    include '../PHP/conexionBDK.php';
    ?>

    <!-- Tabla con la informacion del pasajero -->
    <div class="container mt-5">.
        <h2 class="text-center">Aviones y pilotos del aeropuerto</h2>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID aeropuerto</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">ID avion</th>
                    <th scope="col">Modelo</th>
                </tr>
            </thead>
            <?php
            echo '<tbody>';
            $sql = " SELECT 
                        P.idPiloto AS id, 
                        P.nombrePiloto AS nombre, 
                        P.sexoPiloto AS sexo, 
                        P.Aeropuerto_idAeropuerto AS Aeropuerto_idAeropuerto,
                        NULL AS modelo_Avion,
                        NULL AS idAvion
                    FROM Piloto P
                    UNION
                    SELECT 
                        NULL AS id,
                        NULL AS nombre,
                        NULL AS sexo,
                        A.Aeropuerto_idAeropuerto,
                        A.modelo_Avion,
                        A.idAvion
                    FROM Avion A;";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['Aeropuerto_idAeropuerto'] . '</td>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['nombre'] . '</td>';
                    echo '<td>' . $row['sexo'] . '</td>';
                    echo '<td>' . $row['idAvion'] . '</td>';
                    echo '<td>' . $row['modelo_Avion'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>No hay registros!</tr>';
            }

            echo '</tbody>';
            ?>
        </table>
    </div>
    <!-- Fin tabla pasajero -->

</body>

</html>