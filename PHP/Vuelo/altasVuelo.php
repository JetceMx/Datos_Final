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
    include '../../PHP/header.php';
    include '../../PHP/conexionBDK.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $folioVuelo = $_POST["folioVuelo"];
        $horaDespegue = $_POST["horaDespegue"];
        $fechaDespegue = $_POST["fechaDespegue"];
        $escala = $_POST["escala"];
        $tipoVuelo = $_POST["tipoVuelo"];
        $horaAterrizaje = $_POST["horaAterrizaje"];
        $fechaAterrizaje = $_POST["fechaAterrizaje"];
        $Piloto_idPiloto = $_POST["Piloto_idPiloto"];
        $Vuelos_folioVuelo = $_POST["Piloto_idPiloto"];

        // Prevenir la inyección de SQL usando consultas preparadas
        $sql = "INSERT INTO vuelo (folioVuelo, horaDespegue,fechaDespegue,escala,tipoVuelo,horaAterrizaje,fecchaAterrizaje,Piloto_idPiloto,Programa Vuelos_folioVuelo) VALUES 
                                    ('$folioVuelo', '$horaDespegue','$fechaDespegue','$escala','$tipoVuelo','$horaAterrizaje','$fechaAterrizaje','$Piloto_idPiloto', ' $Vuelos_folioVuelo ')";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            echo "<script languaje='JavaScript'>
            alert('Los datos han sido guardados!');
            </script>";
        } else {
            // Error
            echo "<script languaje='JavaScript'>
            alert('Los datos NO han sido guardados.');
            </script>";
        }
    }
    ?>

    <div class="container mt-5">
        <h2>Vuelo</h2>
        <form id="altaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- No se incluye el campo ID ya que es autoincremental -->
            <div class="form-group">
                <label for="folioVuelo">Folio del avion</label>
                <input type="text" class="form-control" id="folioVuelo" name="folioVuelo" required>
            </div>
            <div class="form-group">
                <label for="horaDespegue">Hora del despegue</label>
                <input type="time" class="form-control" id="horaDespegue" name="horaDespegue" required>
            </div>
            <div class="form-group">
                <label for="fechaDespegue">Fecha del despegue</label>
                <input type="date" class="form-control" id="fechaDespegue" name="fechaDespegue" required>
            </div>
            <div class="form-group">
                <label for="escala">Escala</label>
                <input type="text" class="form-control" id="escala" name="escala" required>
            </div>
            <div class="form-group">
                <label for="tipoVuelo">Tipo de vuelo</label>
                <input type="text" class="form-control" id="tipoVuelo" name="tipoVuelo" required>
            </div>
            <div class="form-group">
                <label for="horaAterrizaje">Hora del aterrizaje</label>
                <input type="time" class="form-control" id="horaAterrizaje" name="horaAterrizaje" required>
            </div>
            <div class="form-group">
                <label for="fechaAterrizaje">Fecha del aterrizaje</label>
                <input type="date" class="form-control" id="fechaAterrizaje" name="fechaAterrizaje" required>
            </div>
            <div class="form-group">
                <label for="Piloto_idPiloto">ID del piloto</label>
                <input type="text" class="form-control" id="Piloto_idPiloto" name="Piloto_idPiloto" required>
            </div>

            <div class="form-group">
                <label for="Vuelos_folioVuelo">Folio vuelo</label>
                <select class="form-control" id="Vuelos_folioVuelo" name="Vuelos_folioVuelo" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <?php
                    include '../../PHP/conexionBDK.php';

                    $sql = "SELECT folioVuelo FROM programavuelos";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['folioVuelo'] . "'>" . $row['folioVuelo'] . "</option>";
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
                    <th scope="col">Hora despegue</th>
                    <th scope="col">Fecha despegue</th>
                    <th scope="col">Escala</th>
                    <th scope="col">Tipo de vuelo</th>
                    <th scope="col">Hora aterrizaje</th>
                    <th scope="col">ID piloto</th>
                    <th scope="col">Folio del vuelo</th>
                </tr>
            </thead>
            <?php
            echo '<tbody>';
            $sql = "SELECT * FROM vuelo";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['folioVuelo'] . '</td>';
                    echo '<td>' . $row['horaDespegue'] . '</td>';
                    echo '<td>' . $row['fechaDespegue'] . '</td>';
                    echo '<td>' . $row['escala'] . '</td>';
                    echo '<td>' . $row['tipoVuelo'] . '</td>';
                    echo '<td>' . $row['horaAterrizaje'] . '</td>';
                    echo '<td>' . $row['Piloto_idPiloto'] . '</td>';
                    echo '<td>' . $row['programavuelos_folioVuelo'] . '</td>';
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