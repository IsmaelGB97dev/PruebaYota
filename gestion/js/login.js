$(document).ready(function() {
    let formulario = $('#form-login'),
        txtUsuario = $('#usuario'),
        txtPassword = $('#password'),
        btnAcceder = $('#iniciar');

    formulario.on('submit', IniciarSesion);

    function IniciarSesion(e) {
        e.preventDefault();

    }

});