<?php 
class GestionModel extends DB 
{
    private $codigoGestion;
    private $nombre;
    private $visita;
    private $codigoUsuario;
    private $fechaCreacion;

    public function setCodigoGestion($codigoGestion) {
        $this->codigoGestion = $codigoGestion;
    }
    public function getCodigoGestion() {
        return $this->codigoGestion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function setVisita($visita) {
        $this->visita = $visita;
    }
    public function getVisita() {
        return $this->visita;
    }

    public function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }
    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }
    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    // ---------------------- METODOS ------------------------- //
    public function CrearGestion($objGestion) {
        $consulta = "INSERT INTO gestion(nombre, visitaTecnica, fechaCreacion, codigoUsuario)
                     VALUES(:nombre, :visita, :fecha, :usuario)";
        $query = $this->conectar()->prepare($consulta);
        $query->execute([
            'nombre' => $objGestion->getNombre(),
            'visita' => $objGestion->getVisita(),
            'fecha' => $objGestion->getFechaCreacion(),
            'usuario' => $objGestion->getCodigoUsuario()
        ]);
        if($query->errorInfo()[2] . '' == '') {
            return true;
        } else {
            return false;
        }
    }

    public function ObtenerGestiones() {
        $consulta = "SELECT g.codigoGestion, g.nombre, g.visitaTecnica, g.fechaCreacion, g.codigoUsuario, CONCAT(u.nombre, ' ', u.apellido)
                    FROM gestion g INNER JOIN usuario u
                    ON g.codigoUsuario = u.codigoUsuario";
        $query = $this->conectar()->prepare($consulta);
        $query->execute();
        if($query->errorInfo()[2] . '' == '') {
            return $query->fetchAll();
        } else {
            return false;
        }
    }

}