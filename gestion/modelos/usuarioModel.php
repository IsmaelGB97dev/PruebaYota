<?php
class UsuarioModel extends DB 
{
    private $codigoUsuario;
    private $login;
    private $password;
    private $nombre;
    private $apellido;

    public function __construct()
    {
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
     * Obtener codigoUsuario
     * @return int
     */
    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }
    
    /**
     * Establecer login
     * @param  string $login
     * @return void
     */
    public function setLogin($login) {
        $this->login = $login;
    }    
    /**
     * Obtener login
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }
    
    /**
     * Establecer password
     * @param  string $password
     * @return void
     */
    public function setPassword($password) {
        $this->password = $password;
    }    
    /**
     * Obtener password
     * @return string
     */
    public function getPassword() {
        return $this->password;
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
     * @return void
     */
    public function getNombre() {
        return $this->nombre;
    }
    
    /**
     * Establecer apellido
     * @param  string $apellido
     * @return void
     */
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    
    /**
     * Obtener apellido
     * @return string
     */
    public function getApellido() {
        return $this->apellido;
    }

    // ------------------- METODOS ------------------- //    
    /**
     * Verificar credenciales de usuario para iniciar sesion
     * @param  string $login
     * @param  string $password
     * @return bool
     */
    public function IniciarSesion($login, $password) {
        $hashPassword = openssl_encrypt($password, ALGORITMO, KEY);
        $query = $this->conectar()->prepare('SELECT * FROM usuario WHERE login = :email AND password = :pass');
        $query->execute([
            'email'=> $login,
            'pass' => $hashPassword
        ]);
        if($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }    

    /**
     * Obtener datos de un usuario
     * @param  string $login
     * @return array
     */
    public function ObtenerDatosUsuario($login) {
        $query = $this->conectar()->prepare("SELECT * FROM usuario WHERE login = :email");
        $query->execute([
            'email' => $login
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC)[0];
    } 
}