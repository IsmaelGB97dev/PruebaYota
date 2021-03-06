<?php
    $solicitud = $_REQUEST['dr'] ?? '';
    if($solicitud == 'lg') {
        $sesion->BorrarSesion();
        header('location: ../');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
        switch($solicitud) {
            case '': echo 'Crear gestion'; break; 
            case 'gestion': echo 'Crear gestion'; break;
            case 'lista': echo 'Gestiones'; break;
            case 'tickets': echo 'Ticket'; break; 
            case 'hist': echo 'Historial'; break;           
        }
    ?> </title>

    <link rel="icon" href="gestion/imagenes/fav.png">
    <link rel="stylesheet" href="gestion/css/bootstrap.min.css">
    <link rel="stylesheet" href="gestion/css/home.css">

    
    <script src="gestion/js/jquery-3.6.0.min.js"></script>
    <script src="gestion/js/bootstrap.min.js"></script>
    <script src="gestion/js/popper.min.js"></script>
</head>

<body>
    <nav class="menu-main navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <a class="navbar-brand" href="#">
                <img src="gestion/imagenes/fav.png" alt="" width="30" height="30">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $solicitud == '' || $solicitud == 'gestion' ? "active":'' ?>" aria-current="page" href="?dr=gestion">Capturar gestión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $solicitud == 'lista' ? "active":'' ?>" href="?dr=lista">Lista de gestiones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $solicitud == 'tickets' ? "active":'' ?>" href="?dr=tickets">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $solicitud == 'hist' ? "active":'' ?>" href="?dr=hist">Historial</a>
                    </li>
                </ul>
                <form class="d-flex me-5">
                    <div class="dropdown">
                        <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          Usuario: <?php echo $sesion->getNombreActual(); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="?dr=lg">❌ Cerrar sesión</a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <?php 
        switch($solicitud) {
            case '': include_once 'gestion/vistas/capturarGestion.php'; break; 
            case 'gestion': include_once 'gestion/vistas/capturarGestion.php'; break;
            case 'lista': include_once 'gestion/vistas/listaGestiones.php'; break;
            case 'tickets': include_once 'gestion/vistas/tickets.php'; break; 
            case 'hist': include_once 'gestion/vistas/historial.php'; break;           
        }
    ?>
</body>

</html>