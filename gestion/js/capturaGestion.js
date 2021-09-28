$(document).ready(function() {
    let formCrear = $('#form-crear'),
        txtNombre = $('#nombre'),
        txtCreacion = $('#creacion'),
        tabla = $('#table-gestiones');


    ObtenerGestiones();
    formCrear.on('submit', CrearGestion);

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
                    ObtenerGestiones();
                } else {
                    alert('Ocurrio un error, intentalo nuevamente.');
                }
            }
        });
    }

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
                            <td title="Editar" d="${res[x][0]}">
                                <a href="#" class="btn btn-sm btn-warning">✏</a>
                            </td>
                        </tr>
                    `;
                }
                tabla.find('tbody').html(html);
            }
        });
    }

});