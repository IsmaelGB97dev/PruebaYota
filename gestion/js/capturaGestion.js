$(document).ready(function() {
    let formCrear = $('#form-crear'),
        txtNombre = $('#nombre'),
        txtCreacion = $('#creacion'),
        tabla = $('#table-gestiones'),
        mensaje = $('.toast');


    ObtenerGestiones();
    formCrear.on('submit', CrearGestion);

    /**
     * Realiza el proceso de creacion de nueva gestion y su respectiva solicitud AJAX
     * @param  {object} e Formulario
     */
    function CrearGestion(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "gestion/ajax/gestionAjax.php",
            data: {
                nombre: txtNombre.val().trim(),
                visita: $('input[name=visita]:checked').val(),
                creacion: txtCreacion.val().trim(),
                funcion: 'crear'
            },
            success: function(res) {
                if (res.trim() == 'true') {
                    MostrarMensaje(`Gestión '${txtNombre.val().trim()}', Agregada`);
                    ObtenerGestiones();
                    formCrear[0].reset();
                } else {
                    MostrarMensaje('Ocurrio un error');
                }
            }
        });
    }

    /**
     * Realiza el procesos de obtener todas las gestiones (solicitud AJAX) y rellenar tabla con dichos datos
     */
    function ObtenerGestiones() {
        $.ajax({
            type: "post",
            url: 'gestion/ajax/gestionAjax.php',
            data: { funcion: 'datos' },
            success: function(res) {
                let html = '';
                res = JSON.parse(res);
                for (let x in res) {
                    html += `
                        <tr>
                            <td>${Number(x)+1}</td>
                            <td>${res[x][1]}</td>
                            <td>${res[x][2]}</td>
                            <td>${res[x][3]}</td>
                            <td>${res[x][5]}</td>
                        </tr>
                    `;
                }
                tabla.find('tbody').html(html);
            }
        });
    }

    /**
     * Crear una alerta con toast  
     * @param  {string} texto Texto a mostrar
     */
    function MostrarMensaje(texto) {
        mensaje.toast('show');
        mensaje.find('.toast-body').html(texto);
    }
});