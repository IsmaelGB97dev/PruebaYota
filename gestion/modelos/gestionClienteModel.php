<?php 
class GestionClienteModel extends DB
{
    private $codigoGestionCliente;
    private $atendido;
    private $fechaCreacion;
    private $codigoGestion;

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
}