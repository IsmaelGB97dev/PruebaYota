<?php
class UsuarioController 
{
    public function IniciarSesion($login, $password) {
        $modelo = new UsuarioModel();
        return $modelo->IniciarSesion($login, $password);
    }

    public function ObtenerDatosUsuario($login) {
        $modelo = new UsuarioModel();
        return $modelo->ObtenerDatosUsuario($login);
    }
}