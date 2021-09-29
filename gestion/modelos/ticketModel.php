<?php 
class TicketModel extends DB 
{
    private $codigoTicket;
    private $codigoGestionCliente;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $codigoGestion;
    private $problema;
    private $solucion;

    public function __construct()
    {
    }
    
    /**
     * Establecer codigoTicket
     * @param  int $codigoTicket
     * @return void
     */
    public function setCodigoTicket($codigoTicket) {
        $this->codigoTicket = $codigoTicket;
    }    
    /**
     * Obtener codigoTicket
     * @return int
     */
    public function getCodigoTicket() {
        return $this->codigoTicket;
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
     * Establecer nombre de cliente
     * @param  string $nombre
     * @return void
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }    
    /**
     * Obtener nombre de cliente
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }
    
    /**
     * Establecer apellido de cliente
     * @param  string $apellido
     * @return void
     */
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }    
    /**
     * Obtener apellido de cliente
     * @return string
     */
    public function getApellido() {
        return $this->apellido;
    }
    
    /**
     * Establecer direccion de cliente 
     * @param  string $direccion
     * @return void
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }    
    /**
     * Obtener direccion de cliente
     * @return string
     */
    public function getDireccion() {
        return $this->direccion;
    }
    
    /**
     * Establecer telefono de cliente
     * @param  string $telefono
     * @return void
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }    
    /**
     * getTelefono, Obtener telefono de cliente
     * @return string
     */
    public function getTelefono() {
        return $this->telefono;
    }
        
    /**
     * Obtener codigoGestion
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
     * Establecer problema
     * @param  string $problema
     * @return void
     */
    public function setProblema($problema) {
        $this->problema = $problema;
    }    
    /**
     * Obtener problema
     * @return string
     */
    public function getProblema() {
        return $this->problema;
    }
        
    /**
     * Establecer solucion
     * @param  string $solucion
     * @return void
     */
    public function setSolucion($solucion) {
        $this->solucion = $solucion;
    }    
    /**
     * Obtener solucion
     * @return string
     */
    public function getSolucion() {
        return $this->solucion;
    }
    
    // ---------------------- METODOS --------------- //    
    /**
     * Insertar nuevo registro en la tabla ticket
     * @param  /TicketModel $objTicket
     * @return bool
     */
    public function GuardarTicket($objTicket) {
        $consulta = 'INSERT INTO ticket (codigoGestionCliente, nombreCliente, apellidoCliente, direccionCliente, telefonoCliente, codigoGestion, problemaExpuesto, solucionBrindada)
                    VALUES(:gestionCliente, :nombre, :apellido, :direccion, :telefono, :gestion, :problema, :solucion)';
        $query = $this->conectar()->prepare($consulta);
        $query->execute([
            'gestionCliente' => $objTicket->getCodigoGestionCliente(),
            'nombre' => $objTicket->getNombre(),
            'apellido' => $objTicket->getApellido(),
            'direccion' => $objTicket->getDireccion(),
            'telefono' => $objTicket->getTelefono(),
            'gestion' => $objTicket->getCodigoGestion(),
            'problema' => $objTicket->getProblema(),
            'solucion' => $objTicket->getSolucion()
        ]);
        if($query->errorInfo()[2] . '' == '') {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Obtener el nombre de gestion de la tabla 'gestion'
     * @param  int $codigoGestion
     * @return string
     */
    function getGestionRealizada($codigoGestion) {
        $consulta = 'SELECT nombre FROM gestion WHERE codigoGestion = :codigo';
        $query = $this->conectar()->prepare($consulta);
        $query->execute([
            'codigo' => $codigoGestion
        ]);
        return $query->fetchColumn(0);
    }
    
    /**
     * Obtener datos de la tabla ticket
     * @return array|false
     */
    public function ObtenerDatos() {
        $consulta = 'SELECT g.nombre, t.nombreCliente, t.apellidoCliente, t.direccionCliente, t.telefonoCliente, t.problemaExpuesto, t.solucionBrindada, t.codigoGestion, c.fechaCreacion
        FROM ticket t INNER JOIN gestioncliente c
        ON t.codigoGestionCliente = c.codigoGestionCliente INNER JOIN gestion g 
        ON c.codigoGestion = g.codigoGestion
        ORDER BY c.fechaCreacion desc';
        $query = $this->conectar()->prepare($consulta);
        $query->execute();
        if($query->errorInfo()[2] . '' == '') {
            return $query->fetchAll();
        } else {
            return false;
        }
    }    
}