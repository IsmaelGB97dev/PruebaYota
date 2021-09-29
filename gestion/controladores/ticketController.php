<?php
class TicketController 
{    
    /**
     * Insertar registro en la tabla ticket
     * @param  int $codigoGestionCliente
     * @param  string $nombre
     * @param  string $apellido
     * @param  string $direccion
     * @param  string $telefono
     * @param  int $codigoGestion
     * @param  string $problema
     * @param  string $solucion
     * @return bool
     */
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
    
    /**
     * Obtener registros de la tabla ticket 
     * @return array|false
     */
    public function ObtenerDatos() {
        $modelo = new TicketModel();
        return $modelo->ObtenerDatos();
    }
    
    /**
     * Obtener el nombre de gestion de la tabla "gestion"
     * @param  int $codigo Codigo de gestion
     * @return string
     */
    public function getGestionRealizada($codigo) {
        $modelo = new TicketModel();
        return $modelo->getGestionRealizada($codigo);
    }
    
}