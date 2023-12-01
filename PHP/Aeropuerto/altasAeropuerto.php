<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabinito Airport</title>
</head>

<body>
    <?php
    // Incluye el encabezado en todas las páginas que lo necesiten
    include '../../PHP/header.php';
    include '../../PHP/conexionBDK.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idAeropuerto = $_POST["idAeropuerto"];
        $nombreAeropuerto = $_POST["nombreAeropuerto"];

        // Prevenir la inyección de SQL usando consultas preparadas
        $sql = "INSERT INTO aeropuerto (idAeropuerto, nombreAeropuerto) VALUES ('$idAeropuerto', '$nombreAeropuerto')";
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
        <h2>Aeropuerto</h2>
        <form id="altaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- No se incluye el campo ID ya que es autoincremental -->
            <div class="form-group">
                <label for="idAeropuerto">ID del aeropuerto</label>
                <input type="text" class="form-control" id="idAeropuerto" name="idAeropuerto" required>
            </div>
            <div class="form-group">
                <label for="nombreAeropuerto">Nombre del aeropuerto</label>
                <input type="text" class="form-control" id="nombreAeropuerto" name="nombreAeropuerto" required>
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
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <?php
            echo '<tbody>';
            $sql = "SELECT * FROM aeropuerto";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['idAeropuerto'] . '</td>';
                    echo '<td>' . $row['nombreAeropuerto'] . '</td>';
                    echo "<td><a href='borrarAeropuerto.php?id=" . $row['idAeropuerto'] . "'>Eliminar</a></td>";
                    echo "<td><a href='editarAeropuerto.php?id=" . $row['idAeropuerto'] . "'>Editar</a></td>";
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