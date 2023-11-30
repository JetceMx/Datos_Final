<?php
$servername = "localhost";
$username = "root";
$password = "Trompudo1@";
$dbname = "proyecto_final";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Aero</th>
            <th scope="col">Ubi</th>
            <th scope="col">cantidad de pilotos</th>
        </tr>
    </thead>
    <?php
    echo '<tbody>';
    //-- Crear un índice personalizado en la tabla empleado
    $sql = "SELECT p.nombrePiloto, v.fechaDespegue, a.nombreAeropuerto
            FROM piloto p
            JOIN vuelo v ON p.idPiloto = v.Piloto_idPiloto
            JOIN aeropuerto a ON v.idAeropuerto = a.idAeropuerto;
    ";
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