<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/index.css">
    <title>Sabinito Airlines</title>
</head>

<body>
    <?php
    // Incluye el encabezado en todas las páginas que lo necesiten
    include '../PHP/header.php';
    
    ?>

    <br>
    <div class="container">
    <div id="carouselExampleAutoplaying" class="carousel slide caruu" data-bs-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="../img/img1.png" class="d-block w-100 " alt="...">
        </div>
        <div class="carousel-item">
        <img src="../img/img2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../img/img3.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../img/img4.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    </div>
    
    

</body>

</html>

