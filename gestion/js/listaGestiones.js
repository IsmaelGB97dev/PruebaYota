$(document).ready(function() {
    let contenedor = $('#contenedor-botones'),
        btnGestiones = $(".btn-gestion"),
        mensaje = $('.toast');

    CargarGestiones();
    btnGestiones.on('click', RegistrarGestionCliente);

    /**
     * Realiza solicitud AJAX para obtener datos de las gestiones y renderizarlas en el documento
     */
    function CargarGestiones() {
        $.ajax({
            type: 'post',
            url: 'gestion/ajax/gestionAjax.php',
            data: { funcion: 'datos' },
            success: function(res) {
                res = JSON.parse(res);
                let html = res.map((v) => {
                    return (`
                        <div class="col-6 p-2">
                            <button class="btn-gestion btn btn-primary w-100 py-3" r="${v[0]}">${v[1].toUpperCase()}</button>
                        </div>
                        `).split(',');
                });
                contenedor.html(html);
                Reasignar();
            }
        });
    }

    /**
     * Realizar proceso de registro de gestionCliente al dar click en algun boton de gestion, mediante AJAX
     */
    function RegistrarGestionCliente() {
        let gestion = $(this);
        $.ajax({
            type: "post",
            url: 'gestion/ajax/gestionAjax.php',
            data: {
                gestion: gestion.attr('r'),
                funcion: 'gestionCliente'
            },
            success: function(res) {
                if (res.trim() == 'true') {
                    MostrarMensaje(`Gestion de cliente registrada: ${gestion.html()}`);
                } else {
                    MostrarMensaje('Ocurrio un error');
                }
            }
        });
    }

    /**
     * Crear alerta mediante toast
     * @param  {string} texto Texto a mostrar
     */
    function MostrarMensaje(texto) {
        mensaje.toast('show');
        mensaje.find('.toast-body').html(texto);
    }

    /**
     * Reasignar variables y eventos, para despues de solicitudes AJAX
     */
    function Reasignar() {
        btnGestiones = $(".btn-gestion");
        btnGestiones.on('click', RegistrarGestionCliente);
    }

});