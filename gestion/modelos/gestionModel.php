<?php 
class GestionModel extends DB 
{
    private $codigoGestion;
    private $nombre;
    private $visita;
    private $codigoUsuario;
    private $fechaCreacion;

    public function __construct()
    {
    }
    
    /**
     * Establecer codigoGestion
     * @param  int $codigoGestion
     * @return void
     */
    public function setCodigoGestion($codigoGestion) {
        $this->codigoGestion = $codigoGestion;
    }    
    /**
     * Obtener codigoGestion
     * @return int
     */
    public function getCodigoGestion() {
        return $this->codigoGestion;
    }
    
    /**
     * Establecer nombre
     * @param  string $nombre
     * @return void
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    } 
    /**
     * Obtener nombre
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }
    
    /**
     * Establecer visita
     * @param  string $visita
     * @return void
     */
    public function setVisita($visita) {
        $this->visita = $visita;
    }    
    /**
     * Obtener visita
     * @return string
     */
    public function getVisita() {
        return $this->visita;
    }
    
    /**
     * Establecer codigoUsuario
     * @param  int $codigoUsuario
     * @return void
     */
    public function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }    
    /**
     * Obtener CodigoUsuario
     * @return int
     */
    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }
    
    /**
     * Establecer fechaCreacion
     * @param  date $fechaCreacion
     * @return void
     */
    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }    
    /**
     * Obtener fechaCreacion
     * @return date
     */
    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    // ---------------------- METODOS ------------------------- //    
    /**
     * Insertar nuevo registro en la tabla gestion
     * @param  /gestionModel $objGestion
     * @return bool
     */
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
    
    /**
     * Obtener datos de la tabla gestion
     * @return array|false
     */
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