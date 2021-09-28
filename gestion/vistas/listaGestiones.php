<div>
    <h3 class="text-center mt-2 text-primary">Gestiones</h3>
    <div id="contenedor-botones" class="col-12 container d-flex flex-wrap">



        <?php 
            // include_once 'gestion/config/conexion.php';
            // include_once 'gestion/controladores/gestionController.php';
            // include_once 'gestion/modelos/gestionModel.php';

            // $controlador = new GestionController();
            // $datos = $controlador->ObtenerGestiones();
            // if(count($datos) == 0){
            //     echo '<div class="col-12 mt-5 alert alert-info" role="alert">
            //             No hay gestiones
            //           </div>';
            // } else {
            //     foreach ($datos as $x) {
            //         echo '<div class="col-6 p-2">
            //                 <button class="btn btn-primary w-100 py-3">' . mb_strtoupper($x[1]) .'</button>
            //             </div>';
            //     }
            // }
        ?>
        
    </div>
</div>

<button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>

<script src="gestion/js/listaGestiones.js"></script>