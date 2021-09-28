<?php
class GestionClienteController 
{
    public function InsertarGestionCliente($codigoGestion, $atendido, $creacion) {
        $modelo = new GestionClienteModel();
        $modelo->setCodigoGestion($codigoGestion);
        $modelo->setAtendido($atendido);
        $modelo->setFechaCreacion($creacion);
        return $modelo->InsertarGestionCliente($modelo);
    }
}