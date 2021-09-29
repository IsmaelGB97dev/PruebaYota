<?php
class UsuarioController 
{    
    /**
     * Verificar el inicio de sesion de usuario
     * @param  string $login
     * @param  string $password
     * @return bool
     */
    public function IniciarSesion($login, $password) {
        $modelo = new UsuarioModel();
        return $modelo->IniciarSesion($login, $password);
    }
    
    /**
     * Obtener datos un usuario
     * @param  string $login
     * @return array
     */
    public function ObtenerDatosUsuario($login) {
        $modelo = new UsuarioModel();
        return $modelo->ObtenerDatosUsuario($login);
    }
}