<?php
class GestionClienteController 
{    
    /**
     * Insertar registro de gestionCliente
     * @param  int $codigoGestion
     * @param  string $atendido
     * @param  date $creacion
     * @return bool
     */
    public function InsertarGestionCliente($codigoGestion, $atendido, $creacion) {
        $modelo = new GestionClienteModel();
        $modelo->setCodigoGestion($codigoGestion);
        $modelo->setAtendido($atendido);
        $modelo->setFechaCreacion($creacion);
        return $modelo->InsertarGestionCliente($modelo);
    }
    
    /**
     * Obtener datos de la tabla gestionCliente
     * @return array|false
     */
    public function ObtenerGestionesCliente() {
        $modelo = new GestionClienteModel();
        return $modelo->ObtenerGestionesCliente();
    }
    
    /**
     * Verificar si un registro de la tabla gestionCliente ya fue atendido
     * @param  int $codigoGestionCliente
     * @return bool
     */
    public function VerificarAtendido($codigoGestionCliente) {
        $modelo = new GestionClienteModel();
        return $modelo->VerificarDisponibilidad($codigoGestionCliente);
    }
    
    /**
     * Actualizar atributo 'atendido = si' en la tabla gestionCliente 
     * @param  int $codigoGestionCliente
     * @return bool
     */
    public function AtenderGestionCliente($codigoGestionCliente) {
        $modelo = new GestionClienteModel();
        $modelo->setCodigoGestionCliente($codigoGestionCliente);
        return $modelo->AtenderGestionCliente($modelo);
    }
}