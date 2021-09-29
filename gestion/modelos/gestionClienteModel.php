<?php 
date_default_timezone_set('America/Costa_Rica');

class GestionClienteModel extends DB
{
    private $codigoGestionCliente;
    private $atendido;
    private $fechaCreacion;
    private $codigoGestion;

    public function __construct()
    {        
    }
    
    /**
     * Establecer codigoGestionCliente
     * @param  int $codigoGestionCliente
     * @return void
     */
    public function setCodigoGestionCliente($codigoGestionCliente) {
        $this->codigoGestionCliente = $codigoGestionCliente;
    }    
    /**
     * Obtener codigoGestionCliente
     * @return int
     */
    public function getCodigoGestionCliente() {
        return $this->codigoGestionCliente;
    }
    
    /**
     * Establecer atendido
     * @param  string $atendido
     * @return void
     */
    public function setAtendido($atendido) {
        $this->atendido = $atendido;
    }    
    /**
     * Obtener atendido
     * @return string
     */
    public function getAtendido() {
        return $this->atendido;
    }
    
    /**
     * Establecer fechaCreacion
     * @param  datetime $fechaCreacion
     * @return void
     */
    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }    
    /**
     * getFechaCreacion, Obtener fechaCreacion
     * @return datetime
     */
    public function getFechaCreacion() {
        return $this->fechaCreacion;
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

    // -------------------- METODOS ------------------- //    
    /**
     * Insertar nuevo registro en la tabla gestionCliente
     * @param  /gestionClienteModel $objGestionCliente
     * @return bool
     */
    public function InsertarGestionCliente($objGestionCliente) {
        $consulta = 'INSERT INTO gestioncliente (atendido, fechaCreacion, codigoGestion)
                     VALUES(:atendido, :creacion, :gestion)';
        $query = $this->conectar()->prepare($consulta);
        $query->execute([
            'atendido' => $objGestionCliente->getAtendido(),
            'creacion' => $objGestionCliente->getFechaCreacion(),
            'gestion' => $objGestionCliente->getCodigoGestion()
        ]);
        if($query->errorInfo()[2] . '' == '') {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Obtener datos de la tabla gestionCliente
     * @return array|false
     */
    public function ObtenerGestionesCliente() {
        $consulta = 'SELECT c.codigoGestionCliente, g.nombre, c.codigoGestion, c.atendido, c.fechaCreacion
                    FROM gestion g INNER JOIN gestioncliente c
                    ON g.codigoGestion = c.codigoGestion
                    WHERE c.atendido = "no" AND
                    DATE_FORMAT(c.fechaCreacion,"%y-%m-%d") = :hoy
                    ORDER BY c.fechaCreacion';
        $query = $this->conectar()->prepare($consulta);
        $query->execute([
            'hoy' => date('y-m-d ')
        ]);
        if($query->errorInfo()[2] . '' == '') {
            return $query->fetchAll();
        } else {
            return false;
        }
    }
    
    /**
     * Verificar si una gestionCliente ya fue atendida
     * @param  int $codigoGestionCliente
     * @return bool
     */
    public function VerificarDisponibilidad($codigoGestionCliente) {
        $consulta = 'SELECT atendido
                     FROM gestioncliente
                     WHERE codigoGestionCliente = :codigo';
        $query = $this->conectar()->prepare($consulta);
        $query->execute([
            'codigo' => $codigoGestionCliente
        ]);
        if(trim($query->fetchColumn(0)) == 'si') {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Actualizar atributo 'atendido = si', para definir gestionCliente como ya atendida
     * @param  /gestionClienteModel $objGestionCliente
     * @return bool
     */
    public function AtenderGestionCliente($objGestionCliente) {
        
        $consulta = 'UPDATE gestioncliente
                    SET atendido = "si"
                    WHERE codigoGestionCliente = :codigo';
        $query = $this->conectar()->prepare($consulta);
        $query->execute([
            'codigo' => $objGestionCliente->getCodigoGestionCliente()
        ]);
        if($query->errorInfo()[2] . '' == '') {
            return true;
        } else {
            return false;
        }
    }
}