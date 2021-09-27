<?php
include_once 'gestion/config/main.php';

date_default_timezone_set('America/Costa_Rica');

if(isset($_SESSION['codigoUsuario'])) {
    session_regenerate_id(true);
    include_once 'gestion/vistas/home.php';
} else {
    include_once 'gestion/vistas/login.php';
}

