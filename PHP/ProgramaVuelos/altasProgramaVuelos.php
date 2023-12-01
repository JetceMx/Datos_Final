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
    include '../../PHP/header.php';
    include '../../PHP/conexionBDK.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $folioVuelo = $_POST["folioVuelo"];
        $origenVuelo = $_POST["origenVuelo"];
        $destinoVuelo = $_POST["destinoVuelo"];
        $cantidadPasajerosVuelo = $_POST["cantidadPasajerosVuelo"];
        $fechaOrigenVuelo = $_POST["fechaOrigenVuelo"];
        $fechaDestinoVuelo = $_POST["fechaDestinoVuelo"];
        $horaOrigenVuelo = $_POST["horaOrigenVuelo"];
        $horaDestinoVuelo = $_POST["horaDestinoVuelo"];
        $Avion_idAvion = $_POST["Avion_idAvion"];
        $Piloto_idPiloto = $_POST["Piloto_idPiloto"];
        $Piloto_Aeropuerto_idAeropuerto = $_POST["Piloto_Aeropuerto_idAeropuerto"];


        // Prevenir la inyección de SQL usando consultas preparadas
        $sql = "INSERT INTO programavuelos (folioVuelo, origenVuelo, destinoVuelo, cantidadPasajerosVuelo, fechaOrigenVuelo, fechaDestinoVuelo, horaOrigenVuelo, horaDestinoVuelo,Avion_idAvion,Piloto_idPiloto,Piloto_Aeropuerto_idAeropuerto) VALUES 
                                            ('$folioVuelo', '$origenVuelo', '$destinoVuelo', '$cantidadPasajerosVuelo', '$fechaOrigenVuelo', '$fechaDestinoVuelo', '$horaOrigenVuelo', '$horaDestinoVuelo','$Avion_idAvion','$Piloto_idPiloto','$Piloto_Aeropuerto_idAeropuerto')";
        $stmt = $conn->prepare($sql);

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
        <h2>Programa de Vuelos</h2>
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
                <input type="time" class="form-control" id="horaOrigenVuelo" name="horaOrigenVuelo" required>
            </div>
            <div class="form-group">
                <label for="horaDestinoVuelo">Hora del aterrizaje</label>
                <input type="time" class="form-control" id="horaDestinoVuelo" name="horaDestinoVuelo" required>
            </div>
            <div class="form-group">
                <label for="Avion_idAvion">ID del Avion</label>
                <select class="form-control" id="Avion_idAvion" name="Avion_idAvion" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <?php
                    include '../../PHP/conexionBDK.php';

                    $sql = "SELECT idAvion FROM Avion";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['idAvion'] . "'>" . $row['idAvion'] . "</option>";
                    }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Piloto_idPiloto">ID del Piloto</label>
                <select class="form-control" id="Piloto_idPiloto" name="Piloto_idPiloto" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <?php
                    include '../../PHP/conexionBDK.php';

                    $sql = "SELECT idPiloto FROM Piloto";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['idPiloto'] . "'>" . $row['idPiloto'] . "</option>";
                    }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Piloto_Aeropuerto_idAeropuerto">ID del Aeropuerto</label>
                <select class="form-control" id="Piloto_Aeropuerto_idAeropuerto" name="Piloto_Aeropuerto_idAeropuerto" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <?php
                    include '../../PHP/conexionBDK.php';

                    $sql = "SELECT idAeropuerto FROM Aeropuerto";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['idAeropuerto'] . "'>" . $row['idAeropuerto'] . "</option>";
                    }

                    ?>
                </select>
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
                    <th scope="col">ID Avion</th>
                    <th scope="col">ID Piloto</th>
                    <th scope="col">ID Avion</th>
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
                    echo '<td>' . $row['Avion_idAvion'] . '</td>';
                    echo '<td>' . $row['Piloto_idPiloto'] . '</td>';
                    echo '<td>' . $row['Piloto_Aeropuerto_idAeropuerto'] . '</td>';
                    echo "<td><a href='borrarProgramaVuelo.php?id=" . $row['folioVuelo'] . "'>Eliminar</a></td>";
                    echo "<td><a href='editarProgramaVuelo.php?id=" . $row['folioVuelo'] . "'>Editar</a></td>";
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