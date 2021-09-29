<div class="container">
    <h3 class="text-center mt-2 text-primary">Gestiones atendidas</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-secondary form-capturar">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Gestión</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Direccón</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Gestión realizada</th>
                    <th scope="col">Problema</th>
                    <th scope="col">Solución</th>
                    <th scope="col">Fecha</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    include_once 'gestion/config/conexion.php';
                    include_once 'gestion/controladores/ticketController.php';
                    include_once 'gestion/modelos/ticketModel.php';
                    
                    $controlador = new TicketController();
                    $i = 1;
                    foreach ($controlador->ObtenerDatos() as $x) {
                        $f = strtotime($x[8]);
                        echo '<tr>'.
                                '<td>' . $i . '</td>'.
                                '<td>' . $x[0] . '</td>'.
                                '<td>' . $x[1] . ' ' . $x[2] .  '</td>'.
                                '<td>' . $x[3] . '</td>'.
                                '<td>' . $x[4] . '</td>'.
                                '<td>' . $controlador->getGestionRealizada($x[7])  . '</td>'.
                                '<td>' . $x[5] . '</td>'.
                                '<td>' . $x[6] . '</td>'.
                                '<td>' . date('d/M/Y', $f) . '</td>'.
                              '</tr>';
                        $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>