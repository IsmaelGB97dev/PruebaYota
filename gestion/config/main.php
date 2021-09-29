<?php
    include_once 'gestion/config/varEntorno.php';
    include_once 'gestion/config/conexion.php';
    include_once 'gestion/config/session.php';

    include_once 'gestion/modelos/usuarioModel.php';
    include_once 'gestion/controladores/usuarioController.php';

    $sesion = new Sesion();
    
    $controladorUsuario = new UsuarioController();
    $modeloUsuario = new UsuarioModel();
