$(document).ready(function() {
    let tablaGestiones = $('#tabla-gestiones'),
        btnAtender = $('#btn-atender'),
        btnActualizar = $('#btn-actualizar'),
        infoGestion = $('#info-ticket'),
        txtNombre = $('#nombre'),
        txtApellido = $('#apellido'),
        txtDireccion = $('#direccion'),
        txtTelefono = $('#telefono'),
        selectGestion = $('#gestion-real'),
        txtProblema = $('#problema'),
        txtSolucion = $('#solucion'),
        formulario = $('#formulario'),
        btnGuardar = $('#guardar');

    CargarGestiones();
    btnAtender.on('click', VerificarAtendido);
    btnActualizar.on('click', CargarGestiones);
    formulario.on('submit', GuardarGestion);
    btnGuardar.attr('disabled', true);

    /**
     * Obtener datos de gestionesCliente (mediante AJAX) y llenar tabla
     */
    function CargarGestiones() {
        $.ajax({
            type: 'post',
            url: 'gestion/ajax/gestionAjax.php',
            data: { funcion: 'datosCl' },
            success: function(res) {
                res = JSON.parse(res);
                if (res == false) {
                    tablaGestiones.find('tbody').html('');
                    alert('No hay gestiones de clientes');
                } else {
                    let html = '';
                    for (const x in res) {
                        html += `<tr r="${res[x][0]}" g="${res[x][2]}">
                                <td>${Number(x) + 1}</td>
                                <td>${res[x][1].toUpperCase()}</td>
                            </tr>`;
                    }
                    tablaGestiones.find('tbody').html(html);
                }
            }
        });
    }

    /**
     * Verificar si una gestionCliente ya esta siendo atendida (solicitud AJAX) y realizar acciones correspondiante
     */
    function VerificarAtendido() {
        let gestionC = tablaGestiones.find('tbody tr:first').attr('r');
        if (gestionC == undefined) {
            tablaGestiones.find('tbody').html('');
            alert('No hay gestion de cliente que atender');
        } else {
            $.ajax({
                type: 'post',
                url: 'gestion/ajax/gestionAjax.php',
                data: {
                    gestion: gestionC,
                    funcion: 'verificar'
                },
                success: function(res) {
                    if (res.trim() == 'false') {
                        AtenderCliente();
                    } else {
                        CargarGestiones();
                        alert('Gestion ya fue atendida, intenta nuevamente');
                    }
                }
            });
        }
    }

    /**
     * Realizar cambio a atendido de gestionCliente (solicitud AJAX) y diversas acciones
     */
    function AtenderCliente() {
        btnAtender.attr('disabled', true);
        btnActualizar.attr('disabled', true);
        txtNombre.focus();
        formulario[0].reset();
        btnGuardar.attr('disabled', false);

        let gestionC = tablaGestiones.find('tbody tr:first').attr('r'),
            gestionR = tablaGestiones.find('tbody tr:first').attr('g'),
            numero = tablaGestiones.find('tbody tr:first td:nth-child(1)').text(),
            nombre = tablaGestiones.find('tbody tr:first td:nth-child(2)').text();

        tablaGestiones.find('tbody tr:first').addClass('bg-info');
        infoGestion.html(`Ticket #  00${gestionC}   ${nombre}`);
        $.ajax({
            type: 'post',
            url: 'gestion/ajax/gestionAjax.php',
            data: {
                gestion: gestionC,
                funcion: 'atender'
            },
            success: function(res) {
                if (res.trim() == 'true') {
                    CargarGestionesReales(gestionR);
                } else {
                    alert("error");
                }
            }
        });
    }
    /**
     * Crear options para el select de gestiones reales (solicitud AJAX) y seleccionar la option con la gestion del cliente 
     * @param  {string} gestion GestionCliente
     */
    function CargarGestionesReales(gestion) {
        $.ajax({
            type: 'post',
            url: 'gestion/ajax/gestionAjax.php',
            data: { funcion: 'datos' },
            success: function(res) {
                res = JSON.parse(res);
                let html = res.map((x) => {
                    return `<option ${x[0] == gestion.trim()?'selected':''} value="${x[0]}">${x[1]}</option>`;
                }).join('');
                selectGestion.html(html);
            }
        });
    }

    /**
     * Realiza guardado de gestion (ticket) y diversas acciones (AJAX)
     * @param  {} e
     */
    function GuardarGestion(e) {
        e.preventDefault();
        let gestionC = tablaGestiones.find('tbody tr:first').attr('r');
        $.ajax({
            type: 'post',
            url: 'gestion/ajax/ticketAjax.php',
            data: {
                gestionCl: gestionC,
                nombre: txtNombre.val().trim(),
                apellido: txtApellido.val().trim(),
                direccion: txtDireccion.val().trim(),
                telefono: txtTelefono.val().trim(),
                gestionReal: selectGestion.val(),
                problema: txtProblema.val().trim(),
                solucion: txtSolucion.val().trim(),
                funcion: 'guardar'
            },
            success: function(res) {
                if (res.trim() == 'true') {
                    alert('Guardado');
                    formulario[0].reset();
                    selectGestion.html('<option value="-">-</option>');
                    CargarGestiones();
                    btnAtender.attr('disabled', false);
                    btnActualizar.attr('disabled', false);
                    infoGestion.html('...');
                } else {
                    alert('Error');
                }
            }
        });
    }
});