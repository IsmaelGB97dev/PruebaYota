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

    public function setCodigoGestionCliente($codigoGestionCliente) {
        $this->codigoGestionCliente = $codigoGestionCliente;
    }
    public function getCodigoGestionCliente() {
        return $this->codigoGestionCliente;
    }

    public function setAtendido($atendido) {
        $this->atendido = $atendido;
    }
    public function getAtendido() {
        return $this->atendido;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }
    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function setCodigoGestion($codigoGestion) {
        $this->codigoGestion = $codigoGestion;
    }
    public function getCodigoGestion() {
        return $this->codigoGestion;
    }

    // -------------------- METODOS ------------------- //
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