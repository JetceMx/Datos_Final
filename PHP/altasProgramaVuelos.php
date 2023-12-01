<!DOCTYPE html>
<html lang="en">

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $folioVuelo = $_POST["folioVuelo"];
        $origenVuelo = $_POST["origenVuelo"];
        $destinoVuelo = $_POST["destinoVuelo"];
        $cantidadPasajerosVuelo = $_POST["cantidadPasajerosVuelo"];
        $fechaOrigenVuelo = $_POST["fechaOrigenVuelo"];
        $fechaDestinoVuelo = $_POST["fechaDestinoVuelo"];
        $horaOrigenVuelo = $_POST["horaOrigenVuelo"];
        $horaDestinoVuelo = $_POST["horaDestinoVuelo"];

        // Prevenir la inyección de SQL usando consultas preparadas
        $sql = "INSERT INTO programavuelos (folioVuelo, origenVuelo, destinoVuelo, cantidadPasajerosVuelo, fechaOrigenVuelo, fechaDestinoVuelo, horaOrigenVuelo, horaDestinoVuelo) VALUES ('$folioVuelo', '$origenVuelo', '$destinoVuelo', '$cantidadPasajerosVuelo', '$fechaOrigenVuelo', '$fechaDestinoVuelo', '$horaOrigenVuelo', '$horaDestinoVuelo')";
        $stmt = $conn->prepare($sql);

        /*if ($stmt->execute()) {
            // Éxito
            echo "Registro agregado exitosamente";
        } else {
            // Error
            echo "No se ha  registrado";
        }*/
    }
    ?>

    <div class="container mt-5">
        <h2>Programa de Vuleos</h2>
        <form id="altaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- No se incluye el campo ID ya que es autoincremental -->
            <div class="form-group">
                <label for="folioVuelo">Folio del vuelo</label>
                <input type="text" class="form-control" id="folioVuelo" name="folioVuelo" required>
            </div>
            <div class="form-group">
                <label for="origenVuelo">Origen del vuelo</label>
                <input type="text" class="form-control" id="origenVuelo" name="origenVuelo" required>
            </div>
            <div class="form-group">
                <label for="destinoVuelo">Destino del vuelo</label>
                <input type="text" class="form-control" id="destinoVuelo" name="destinoVuelo" required>
            </div>
            <div class="form-group">
                <label for="cantidadPasajerosVuelo">Pasajeros a bordo </label>
                <input type="number" class="form-control" id="cantidadPasajerosVuelo" name="cantidadPasajerosVuelo" required>
            </div>
            <div class="form-group">
                <label for="fechaOrigenVuelo">Fecha del despegue</label>
                <input type="date" class="form-control" id="fechaOrigenVuelo" name="fechaOrigenVuelo" required>
            </div>
            <div class="form-group">
                <label for="fechaDestinoVuelo">Fecha del aterrizaje </label>
                <input type="date" class="form-control" id="fechaDestinoVuelo" name="fechaDestinoVuelo" required>
            </div>
            <div class="form-group">
                <label for="horaOrigenVuelo">Hora del despegue</label>
                <input type="text" class="form-control" id="horaOrigenVuelo" name="horaOrigenVuelo" required>
            </div>
            <div class="form-group">
                <label for="horaDestinoVuelo">Hora del aterrizaje</label>
                <input type="text" class="form-control" id="horaDestinoVuelo" name="horaDestinoVuelo" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <!-- Tabla con la informacion del pasajero -->
    <br>
    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col"># Personas</th>
                    <th scope="col">Fecha origen</th>
                    <th scope="col">Fecha destino</th>
                    <th scope="col">Hora origen</th>
                    <th scope="col">Hora destino</th>
                </tr>
            </thead>
            <?php
            echo '<tbody>';
            $sql = "SELECT * FROM programavuelos";
            $result = $conn->query($sql);
            // Mostrar datos
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['folioVuelo'] . '</td>';
                    echo '<td>' . $row['origenVuelo'] . '</td>';
                    echo '<td>' . $row['destinoVuelo'] . '</td>';
                    echo '<td>' . $row['cantidadPasajerosVuelo'] . '</td>';
                    echo '<td>' . $row['fechaOrigenVuelo'] . '</td>';
                    echo '<td>' . $row['fechaDestinoVuelo'] . '</td>';
                    echo '<td>' . $row['horaOrigenVuelo'] . '</td>';
                    echo '<td>' . $row['horaDestinoVuelo'] . '</td>';
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