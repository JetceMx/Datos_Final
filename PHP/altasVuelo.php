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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $folioVuelo = $_POST["folioVuelo"];
        $horaDespegue = $_POST["horaDespegue"];
        $fechaDespegue = $_POST["fechaDespegue"];
        $escala = $_POST["escala"];
        $tipoVuelo = $_POST["tipoVuelo"];
        $horaAterrizaje = $_POST["horaAterrizaje"];
        $Piloto_idPiloto = $_POST["Piloto_idPiloto"];

        // Prevenir la inyección de SQL usando consultas preparadas
        $sql = "INSERT INTO vuelo (folioVuelo, horaDespegue,fechaDespegue,escala,tipoVuelo,horaAterrizaje,Piloto_idPiloto) VALUES 
                                    ('$folioVuelo', '$horaDespegue','$fechaDespegue','$escala','$tipoVuelo','$horaAterrizaje','$Piloto_idPiloto')";
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
        <h2>Avion</h2>
        <form id="altaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- No se incluye el campo ID ya que es autoincremental -->
            <div class="form-group">
                <label for="folioVuelo">Folio del avion</label>
                <input type="text" class="form-control" id="folioVuelo" name="folioVuelo" required>
            </div>
            <div class="form-group">
                <label for="horaDespegue">Hora del despegue</label>
                <input type="text" class="form-control" id="horaDespegue" name="horaDespegue" required>
            </div>
            <div class="form-group">
                <label for="fechaDespegue">Fecha del despegue</label>
                <input type="text" class="form-control" id="fechaDespegue" name="fechaDespegue" required>
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
                <input type="text" class="form-control" id="horaAterrizaje" name="horaAterrizaje" required>
            </div>
            <div class="form-group">
                <label for="Piloto_idPiloto">ID del piloto</label>
                <input type="text" class="form-control" id="Piloto_idPiloto" name="Piloto_idPiloto" required>
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
                    <th scope="col">Hora llegada</th>
                    <th scope="col">Fecha despegue</th>
                    <th scope="col">Escala</th>
                    <th scope="col">Tipo de vuelo</th>
                    <th scope="col">Hora aterrizaje</th>
                    <th scope="col">ID piloto</th>
                    <th scope="col">Programa del vuelo</th>
                </tr>
            </thead>
            <?php
            echo '<tbody>';
            $sql = "SELECT * FROM avion";
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