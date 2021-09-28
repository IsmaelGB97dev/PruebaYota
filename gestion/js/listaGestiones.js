$(document).ready(function() {
    let contenedor = $('#contenedor-botones'),
        btnGestiones = $(".btn-gestion");

    CargarGestiones();
    btnGestiones.on('click', RegistrarGestionCliente);

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

    function RegistrarGestionCliente() {
        let gestion = $(this).attr('r');
        $.ajax({
            type: "post",
            url: 'gestion/ajax/gestionAjax.php',
            data: {
                gestion: gestion,
                funcion: 'gestionCliente'
            },
            success: function(res) {
                alert(res);
            }
        });
    }

    function Reasignar() {
        btnGestiones = $(".btn-gestion");
        btnGestiones.on('click', RegistrarGestionCliente);
    }

});