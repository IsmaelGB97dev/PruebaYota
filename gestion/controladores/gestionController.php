<?php
class GestionController 
{
    public function CrearGestion($nombre, $visita, $usuario, $creacion) {
        $modelo = new GestionModel();
        $modelo->setNombre($nombre);
        $modelo->setVisita($visita);
        $modelo->setCodigoUsuario($usuario);
        $modelo->setFechaCreacion($creacion);
        
        return $modelo->CrearGestion($modelo);
    } 
    public function ObtenerGestiones() {
        $modelo = new GestionModel();
        return $modelo->ObtenerGestiones();
    }
}
