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
        $idPiloto = $_POST["idPiloto"];
        $nombrePiloto = $_POST["nombrePiloto"];
        $sexoPiloto = $_POST["sexoPiloto"];
        $Aeropuerto_idAeropuerto = $_POST["Aeropuerto_idAeropuerto"];
        $rfc_p = $_POST["rfc_p"];
        $Telefono_p = $_POST["Telefono_p"];
        $Nivel_p = $_POST["Nivel_p"];

        // Prevenir la inyección de SQL usando consul   tas preparadas
        $sql = "INSERT INTO piloto (idPiloto, nombrePiloto, sexoPiloto, Aeropuerto_idAeropuerto,  rfc_p, Telefono_p, Nivel_p) VALUES ('$idPiloto', '$nombrePiloto', '$sexoPiloto', '$Aeropuerto_idAeropuerto','$rfc_p', '$Telefono_p', '$Nivel_p')";
        $stmt = $conn->prepare($sql);

        //! Guarda los datos, recordar descomentar al final
        if ($stmt->execute()) {
            echo "<script language='JavaScript'>
            alert('Los datos han sido guardados!');
            </script>";
        } else {
            // Error
            echo "<script language='JavaScript'>
            alert('Los datos NO han sido guardados.');
            </script>";
        }
    }
    ?>

    <div class="container mt-5">
        <h2>Piloto</h2>
        <form id="altaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- No se incluye el campo ID ya que es autoincremental -->
            <div class="form-group">
                <label for="idPiloto">ID del piloto</label>
                <input type="text" class="form-control" id="idPiloto" name="idPiloto" required>
            </div>
            <div class="form-group">
                <label for="nombrePiloto">Nombre del piloto</label>
                <input type="text" class="form-control" id="nombrePiloto" name="nombrePiloto" required>
            </div>
            <div class="form-group">
                <label for="sexoPiloto">Sexo del piloto</label>
                <input type="text" class="form-control" id="sexoPiloto" name="sexoPiloto" required>
            </div>
            <div class="form-group">
                <label for="Aeropuerto_idAeropuerto">ID del aeropuerto</label>
                <select class="form-control" id="Aeropuerto_idAeropuerto" name="Aeropuerto_idAeropuerto" required>
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
            <div class="form-group">
                <label for="rfc_p">RFC del piloto</label>
                <input type="text" class="form-control" id="rfc_p" name="rfc_p" required>
            </div>
            <div class="form-group">
                <label for="Telefono_p">Telefono del piloto</label>
                <input type="text" class="form-control" id="Telefono_p" name="Telefono_p" required>
            </div>
            <div class="form-group">
                <label for="Nivel_p">Nivel del piloto</label>
                <input type="text" class="form-control" id="Nivel_p" name="Nivel_p" required>
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
                    <th scope="col">ID Aeropuerto</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <?php
            echo '<tbody>';
            $sql = "SELECT * FROM piloto";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['idPiloto'] . '</td>';
                    echo '<td>' . $row['nombrePiloto'] . '</td>';
                    echo '<td>' . $row['Aeropuerto_idAeropuerto'] . '</td>';
                    echo '<td>' . $row['sexoPiloto'] . '</td>';
                    echo '<td>' . $row['rfc_p'] . '</td>';
                    echo '<td>' . $row['Telefono_p'] . '</td>';
                    echo '<td>' . $row['Nivel_p'] . '</td>';
                    echo "<td><a href='borrarPiloto.php?id=" . $row['idPiloto'] . "'>Eliminar</a></td>";
                    echo "<td><a href='editarPiloto.php?id=" . $row['idPiloto'] . "'>Editar</a></td>";
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