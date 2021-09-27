<?php
/**
 * Contiene lo necesario para establecer la conexion con la base de datos (mediante PDO)
 */
class DB 
{
    // ------------ ATRIBUTOS -----------//
    private $host;
    private $db;
    private $usuario;
    private $password;
    private $charset;
    
    /**
     * Constructor de la clase, con asignacion a los atributos
     * @return void
     */
    public function __construct()
    {
        $this->host = 'localhost';
        $this->db = 'sys_gestiones';
        $this->usuario = 'root';
        $this->password = '';
        $this->charset = 'utf8';
    }
    
    /**
     *  Obtiene una instancia de PDO, el cual representa la conexion entre php y el servidor de base de datos
     * @return \PDO
     */
    function conectar() {
        try {
            $pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset, $this->usuario, $this->password);
            return $pdo;
        } catch (PDOException $ex) {
            print_r('Error de conexión con la base de datos:' . $ex->getMessage());
        }
    }
}