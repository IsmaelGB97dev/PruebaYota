<?php
include_once 'gestion/config/main.php';
date_default_timezone_set('America/Costa_Rica');

if(isset($_SESSION['codigoUsuario'])) {
    session_regenerate_id(true);
    include_once 'gestion/vistas/home.php';
} else if(isset($_POST['iniciar']) && isset($_POST['usuario']) && isset($_POST['password'])) {
    $login = $_POST['usuario'];
    $password = $_POST['password'];
    $resultado = $controladorUsuario->IniciarSesion($login, $password);
    if($resultado) {
        try {
            $datos = $controladorUsuario->ObtenerDatosUsuario($login);
            $sesion->setCodigoActual($datos['codigoUsuario']);
            $sesion->setLoginActual($datos['login']);
            $sesion->setNombreActual($datos['nombre'] . ' ' . $datos['apellido']);
            include_once 'gestion/vistas/home.php';
        } catch(Exception $e) {
            include_once 'gestion/vistas/login.php';
        }
    } else {
        $loginFallido = 'true';
        include_once 'gestion/vistas/login.php';
    }
} else {
    include_once 'gestion/vistas/login.php';
}
