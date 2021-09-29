<?php
class GestionController 
{    
    /**
     * Insertar registro en la tabla gestion
     * @param  string $nombre
     * @param  string $visita
     * @param  int $usuario
     * @param  datetime $creacion
     * @return bool
     */
    public function CrearGestion($nombre, $visita, $usuario, $creacion) {
        $modelo = new GestionModel();
        $modelo->setNombre($nombre);
        $modelo->setVisita($visita);
        $modelo->setCodigoUsuario($usuario);
        $modelo->setFechaCreacion($creacion);
        return $modelo->CrearGestion($modelo);
    } 
        
    /**
     * Obtener los registros de la tabla gestion
     * @return array|false
     */
    public function ObtenerGestiones() {
        $modelo = new GestionModel();
        return $modelo->ObtenerGestiones();
    }
}
