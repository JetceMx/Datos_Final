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
    include '../PHP/conexionBDK.php'
    ?>

    <br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombrePasajero = $_POST["nombrePasajero"];
        $rfc = $_POST["rfc"];
        $Telefono = $_POST["Telefono"];
        $cantMaletas = $_POST["cantMaletas"];
        $pesoTMaletas = $_POST["pesoTMaletas"];
        $null = '';

        // Prevenir la inyección de SQL usando consultas preparadas
        $sql = "INSERT INTO Pasajero (idPasajero, nombrePasajero, rfc, Telefono, cantMaletas, pesoTMaletas) VALUES (null, '$nombrePasajero', '$rfc', '$Telefono', '$cantMaletas', '$pesoTMaletas')";
        $stmt = $conn->prepare($sql);

        /*if ($stmt->execute()) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar datos: " . $stmt->error;
        }*/
    }
    ?>

    <div class="container mt-5">
        <h2>Pasajeros</h2>
        <form id="altaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- No se incluye el campo ID ya que es autoincremental -->
            <div class="form-group">
                <label for="nombrePasajero">Nombre</label>
                <input type="text" class="form-control" id="nombrePasajero" name="nombrePasajero" required>
            </div>
            <div class="form-group">
                <label for="rfc">RFC</label>
                <input type="text" class="form-control" id="rfc" name="rfc" required>
            </div>
            <div class="form-group">
                <label for="Telefono">Telefono</label>
                <input type="float" class="form-control" id="Telefono" name="Telefono" required>
            </div>
            <div class="form-group">
                <label for="cantMaletas">Cantidad de maletas</label>
                <input type="number" class="form-control" id="cantMaletas" name="cantMaletas" required>
            </div>
            <div class="form-group">
                <label for="pesoTMaletas">Peso de las maletas</label>
                <input type="float" class="form-control" id="pesoTMaletas" name="pesoTMaletas" required>
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
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Telefono</th>
                    <th scope="col"># Maletas</th>
                    <th scope="col">Peso Maletas</th>
                </tr>
            </thead>
            <?php
            echo '<tbody>';
            $sql = "SELECT * FROM pasajero";
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
    </div>
    <!-- Fin tabla pasajero -->

</body>

</html>