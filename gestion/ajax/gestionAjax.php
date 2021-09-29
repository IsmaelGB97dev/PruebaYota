<?php
include_once '../config/conexion.php';
include_once '../controladores/gestionController.php';
include_once '../modelos/gestionModel.php';
include_once '../controladores/gestionClienteController.php';
include_once '../modelos/gestionClienteModel.php';
include_once '../config/session.php';

date_default_timezone_set('America/Costa_Rica');

/**
 * Devuelve "true" si se inserto correctamente la gestion, de lo contrario "false"
 * @return string
 */
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

/**
 * Devuelve JSON con los datos de las gestiones, 'false' en caso de error
 * @return JSON|false
 */
function ObtenerGestiones() {
    $controladorGestion = new GestionController();
    $datos = $controladorGestion->ObtenerGestiones();
    if($datos != false) {
        echo json_encode($datos);
    } else {
        echo 'false';
    }
}

/**
 * Devuelve 'true', si se inserto correctamente la gestionCliente, de lo contrario 'false'
 * @return string
 */
function InsertarGestionCliente() {
    $controladorgesCliente = new GestionClienteController();
    $respuesta = $controladorgesCliente->InsertarGestionCliente($_POST['gestion'], 'no', date('Y-m-d H:i:s'));
    if($respuesta) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/**
 * Devuelve 'true' si se realizo correctamente la actualizacion de atributo [atendido], de lo contrario 'false'
 * @return string
 */
function AtenderGestionCliente() {
    $controladorgesCliente = new GestionClienteController();
    $resultado = $controladorgesCliente->AtenderGestionCliente($_POST['gestion']);
    if($resultado) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/**
 * Devuelve JSON con los datos de la gestionCliente, 'false' en caso de error
 * @return JSON|string
 */
function CargarGestionesCliente() {
    $controladorGesCliente = new GestionClienteController();
    $respuesta = $controladorGesCliente->ObtenerGestionesCliente();
    if($respuesta) {
        echo json_encode($respuesta);
    } else {
        echo "false";
    }
}

/**
 * Devuelve 'true' si una gestionCliente ya fue atendido, de lo contrario 'false'
 * @return string
 */
function VerificarAtendido() {
    $controladorgesCliente = new GestionClienteController();
    $res = $controladorgesCliente->VerificarAtendido($_POST['gestion']);
    if($res) {
        echo 'true';
    } else {
        echo 'false';
    }
}

// ---------- LLAMADO A FUNCIONES ---------//
switch($_POST['funcion']) {
    case 'crear': CrearGestion(); break;
    case 'datos': ObtenerGestiones(); break;
    case 'gestionCliente': InsertarGestionCliente(); break;
    case 'atender': AtenderGestionCliente(); break;
    case 'datosCl': CargarGestionesCliente(); break;
    case 'verificar': VerificarAtendido(); break;
    
}

