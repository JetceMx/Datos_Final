<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/index.css">
    <title>Sabinito Airport</title>
</head>

<body>
    <?php
    // Incluye el encabezado en todas las páginas que lo necesiten
    include '../../PHP/header.php';
    include '../../PHP/conexionBDK.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombrePasajero = $_POST["nombrePasajero"];
        $rfc = $_POST["rfc"];
        $Telefono = $_POST["Telefono"];
        $cantMaletas = $_POST["cantMaletas"];
        $pesoTMaletas = $_POST["pesoTMaletas"];

        // Prevenir la inyección de SQL usando consultas preparadas
        $sql = "INSERT INTO Pasajero (idPasajero, nombrePasajero, rfc, Telefono, cantMaletas, pesoTMaletas) VALUES (null, '$nombrePasajero', '$rfc', '$Telefono', '$cantMaletas', '$pesoTMaletas')";
        $stmt = $conn->prepare($sql);

        //! Guarda los datos, recordar descomentar al final
        /*if ($stmt->execute()) {
            echo "<script language='JavaScript'>
            alert('Los datos han sido guardados!');
            </script>";
        } else {
            // Error
            echo "<script language='JavaScript'>
            alert('Los datos NO han sido guardados.');
            </script>";
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
                <label for="pesoTMaletas">Peso de las maletas(kg)</label>
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
                    <th scope="col">Peso Maletas (kg)</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <?php
            echo '<tbody>';
            $sql = "SELECT * FROM pasajero";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['idPasajero'] . '</td>';
                    echo '<td>' . $row['nombrePasajero'] . '</td>';
                    echo '<td>' . $row['rfc'] . '</td>';
                    echo '<td>' . $row['Telefono'] . '</td>';
                    echo '<td>' . $row['cantMaletas'] . '</td>';
                    echo '<td>' . $row['pesoTMaletas'] . '</td>';
                    echo "<td><a href='borrarPasajeros.php?id=" . $row['idPasajero'] . "'>Eliminar</a></td>";
                    echo "<td><a href='editarPasajero.php?id=" . $row['idPasajero'] . "'>Editar</a></td>";
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