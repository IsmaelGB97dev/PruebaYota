<?php
/**
 * Contiene lo necesario para establecer la conexion con la base de datos (mediante PDO)
 */
class DB 
{
   
    
    /**
     * Constructor de la clase
     * @return void
     */
    public function __construct()
    {
    }
    
    /**
     *  Obtiene una instancia de PDO, el cual representa la conexion entre php y el servidor de base de datos
     * @return \PDO
     */
    function conectar() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=sys_gestiones;charset=utf8", 'root', '');
            return $pdo;
        } catch (PDOException $ex) {
            print_r('Error de conexión con la base de datos:' . $ex->getMessage());
        }
    }
}