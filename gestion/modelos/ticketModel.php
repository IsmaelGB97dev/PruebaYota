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

    public function setCodigoTicket($codigoTicket) {
        $this->codigoTicket = $codigoTicket;
    }
    public function getCodigoTicket() {
        return $this->codigoTicket;
    }

    public function setCodigoGestionCliente($codigoGestionCliente) {
        $this->codigoGestionCliente = $codigoGestionCliente;
    }
    public function getCodigoGestionCliente() {
        return $this->codigoGestionCliente;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function getApellido() {
        return $this->apellido;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function getDireccion() {
        return $this->direccion;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function setCodigoGestion($codigoGestion) {
        $this->codigoGestion = $codigoGestion;
    }
    public function getCodigoGestion() {
        return $this->codigoGestion;
    }

    public function setProblema($problema) {
        $this->problema = $problema;
    }
    public function getProblema() {
        return $this->problema;
    }
    
    public function setSolucion($solucion) {
        $this->solucion = $solucion;
    }
    public function getSolucion() {
        return $this->solucion;
    }
    
    // ---------------------- METODOS --------------- //
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
    
    
    
    
}