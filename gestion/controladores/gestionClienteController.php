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

    public function ObtenerGestionesCliente() {
        $modelo = new GestionClienteModel();
        return $modelo->ObtenerGestionesCliente();
    }

    public function VerificarAtendido($codigoGestionCliente) {
        $modelo = new GestionClienteModel();
        return $modelo->VerificarDisponibilidad($codigoGestionCliente);
    }

    public function AtenderGestionCliente($codigoGestionCliente) {
        $modelo = new GestionClienteModel();
        $modelo->setCodigoGestionCliente($codigoGestionCliente);
        return $modelo->AtenderGestionCliente($modelo);
    }
}