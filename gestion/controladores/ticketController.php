<?php
class TicketController 
{
    public function GuardarTicket($codigoGestionCliente, $nombre, $apellido, $direccion, $telefono, $codigoGestion, $problema, $solucion) {
        $modelo = new TicketModel();
        $modelo->setCodigoGestionCliente($codigoGestionCliente);
        $modelo->setNombre($nombre);
        $modelo->setApellido($apellido);
        $modelo->setDireccion($direccion);
        $modelo->setTelefono($telefono);
        $modelo->setCodigoGestion($codigoGestion);
        $modelo->setProblema($problema);
        $modelo->setSolucion($solucion);
        return $modelo->GuardarTicket($modelo);
    }
}