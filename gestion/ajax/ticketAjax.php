<?php
include_once '../config/conexion.php';
include_once '../controladores/ticketController.php';
include_once '../modelos/ticketModel.php';
include_once '../config/session.php';

/**
 * Devuelve 'true' si se inserto correctamente ticket, de lo contrario 'false'
 * @return string
 */
function GuardarTicket() {
    $controller = new TicketController();
    $resultado = $controller->GuardarTicket($_POST['gestionCl'], $_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['telefono'], $_POST['gestionReal'], $_POST['problema'], $_POST['solucion']);
    if($resultado) {
        echo 'true';
    } else {
        echo 'false';
    }
}

// ---------------- LLAMADO A FUNCIONES ------------- //
switch($_POST['funcion']) {
    case 'guardar': GuardarTicket(); break;
}