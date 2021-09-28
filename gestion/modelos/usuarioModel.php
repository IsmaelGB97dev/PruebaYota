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

    public function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }

    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
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

    // ------------------- METODOS ------------------- //
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
    public function ObtenerDatosUsuario($login) {
        $query = $this->conectar()->prepare("SELECT * FROM usuario WHERE login = :email");
        $query->execute([
            'email' => $login
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC)[0];
    } 
}