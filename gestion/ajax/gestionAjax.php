<?php
include_once '../config/conexion.php';
include_once '../controladores/gestionController.php';
include_once '../modelos/gestionModel.php';
include_once '../controladores/gestionClienteController.php';
include_once '../modelos/gestionClienteModel.php';
include_once '../config/session.php';


date_default_timezone_set('America/Costa_Rica');


function CrearGestion() {
    $controladorGestion = new GestionController();
    $sesion = new Sesion();

    $insertado = $controladorGestion->CrearGestion($_POST['nombre'], $_POST['visita'], $sesion->getCodigoActual(), $_POST['creacion']); 

    if($insertado) {
        echo 'true';
    } else {
        echo 'false';
    }
}

function ObtenerGestiones() {
    $controladorGestion = new GestionController();
    $datos = $controladorGestion->ObtenerGestiones();
    if($datos != false) {
        echo json_encode($datos);
    } else {
        echo 'false';
    }
}

function InsertarGestionCliente() {
    $controladorgesCliente = new GestionClienteController();
    $respuesta = $controladorgesCliente->InsertarGestionCliente($_POST['gestion'], 'no', date('Y-m-d'));
    if($respuesta) {
        return 'true';
    } else {
        return 'false';
    }
}

switch($_POST['funcion']) {
    case 'crear': CrearGestion(); break;
    case 'datos': ObtenerGestiones(); break;
    case 'gestionCliente': InsertarGestionCliente(); break;
}

