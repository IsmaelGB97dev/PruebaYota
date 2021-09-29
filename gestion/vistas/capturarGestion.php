<div>
    <div class="position-fixed top-0 end-0 pt-5" style="z-index: 11">
        <div id="liveToast" class="toast hide bg-success text-light col-2" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header justify-content-end">
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body"></div>
        </div>
    </div>

    <h3 class="text-center mt-2 text-primary">Captura de gestión</h3>
    <div class="col-12">
        <div class="row container">
            <div class="col-4 border p-2">
                <h4 class="text-center">Gestión</h4>
                <form id="form-crear" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="nombre">Nombre:</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Aplica visita:</label>
                        <div class="border">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visita" id="visitaSi" value="si">
                                <label class="form-check-label" for="visitaSi">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visita" id="visitaNo" value="no" checked>
                                <label class="form-check-label" for="visitaNo">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="creacion">Fecha de creación</label>
                        <input class="form-control" type="date" name="creacion" id="creacion" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="mb-3 text-center">
                        <input class="btn btn-primary" type="submit" name="crear" id="crear" value="Crear gestión">
                    </div>

                </form>
            </div>

            <div class="col-1"></div>

            <div class="col-7 mt-5 table-responsive">
                <table id="table-gestiones" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Visita</th>
                            <th scope="col">Creación</th>
                            <th scope="col">Creador</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="gestion/js/capturaGestion.js"></script>