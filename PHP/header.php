<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Header</title>
</head>

<body>
    <header>
        <h1>Sabinito Airlines</h1>
    </header>

    <nav>

            <div class="dropdown-center">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Altas
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Aeropuerto/altasAeropuerto.php">Alta de Aeropuerto</a></li>
            <li><a class="dropdown-item" href="Pasajeros/altasPasajeros.php">Alta de Pasajero</a></li>
            <li><a class="dropdown-item" href="Piloto/altasPiloto.php">Alta de Piloto</a></li>
            <li><a class="dropdown-item" href="ProgramaVuelos/altasProgramaVuelos.php">Alta de Programa Vuelos</a></li>
            <li><a class="dropdown-item" href="Vuelo/altasVuelo.php">Alta Vuelo</a></li>
        </ul>
        </div>

        <div class="dropdown-center">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Vistas
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Vistas/miembros_Aeropuerto.php">Miembros</a></li>
            <li><a class="dropdown-item" href="Vistas/vista_vuelo.php">Despegues</a></li>
            <li><a class="dropdown-item" href="Vistas/vista_vueloAterrizaje.php">Aterrizajes</a></li>
        </ul>
        </div>

        
        <a href="#reservas">Reservas</a>
        <a href="#contacto">Contacto</a>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>