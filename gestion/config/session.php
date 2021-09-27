<?php
/**
 * Clase encargada de las gestiones de sesion
 */
class Sesion 
{
        
    /**
     * Constructor de la clase, realiza la inicializacion de una sesion 
     * @return void
     */
    public function __construct()
    {
        session_start();
    }

    // ------------- FUNCIONES GET Y SET ---------------------- //
    
    /**
     * Establecer codigo de usuario actual
     * @param  int $codigoUsuario
     * @return void
     */
    public function setCodigoActual($codigoUsuario) {
        $_SESSION['codigoUsuario'] = $codigoUsuario;
    }
        
    /**
     * Obtener el codigo del usuario actual
     * @return int
     */
    public function getCodigoActual() {
        return $_SESSION['codigoUsuario'];
    }

    /**
     * Establecer login de usuario actual
     * @param  string $login
     * @return void
     */
    public function setLoginActual($login) {
        $_SESSION['login'] = $login;
    }
        
    /**
     * Obtener el login del usuario actual
     * @return string
     */
    public function getLoginActual() {
        return $_SESSION['login'];
    }

    /**
     * Establecer el password de usuario actual
     * @param  string $password
     * @return void
     */
    public function setPasswordActual($password) {
        $_SESSION['password'] = $password;
    }
        
    /**
     * Obtener el password del usuario actual
     * @return string
     */
    public function getPasswordActual() {
        return $_SESSION['password'];
    }

    /**
     * Establecer nombre de usuario actual
     * @param  string $nombre
     * @return void
     */
    public function setNombreActual($nombre) {
        $_SESSION['nombre'] = $nombre;
    }
        
    /**
     * Obtener el nombre del usuario actual
     * @return string
     */
    public function getNombreActual() {
        return $_SESSION['nombre'];
    }

    // ------------------- METODOS ------------------ // 
       
    /**
     * Libera todas las variables de sesion y destruye todos los datos registrados a la sesion
     * @return void
     */
    public function borrarSesion() {
        session_unset();
        session_destroy();
    }
}