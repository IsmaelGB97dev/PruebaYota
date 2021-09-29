<div class="p-4 border">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <h3 id="info-ticket">...</h3>
        </div>
    </div>
    <div class="row pt-4 d-flex flex-column-reverse d-lg-flex flex-lg-row">
        <div class="form-capturar col-lg-8 col-sm-12 py-2 border">
            <form id="formulario" method="POST">
                <div class="row">
                    <div class="col-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input autocapitalize="words" type="text" class="form-control" name="nombre" id="nombre" required maxlength="50">
                    </div>
                    <div class="col-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" required autocapitalize="words" maxlength="50">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" required maxlength="300">
                    </div>
                    <div class="col-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" required maxlength="20">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="gestion-real" class="form-label">Gestión real realizada</label>
                        <select name="gestion-real" id="gestion-real" class="form-select" required>
                            <option value="-">-</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="problema" class="form-label fw-bold">Problema expuesto por el cliente</label>
                        <textarea style="resize: none;" class="form-control" name="problema" id="problema" cols="30" rows="2" maxlength="500" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="solucion" class="form-label fw-bold">Solución brindada</label>
                        <textarea style="resize: none;" class="form-control" name="solucion" id="solucion" cols="30" rows="2" maxlength="500" required></textarea>
                    </div>
                </div>
                <div class="row pt-2 justify-content-end">
                    <div class="col-lg-4 col-sm-12">
                        <input type="submit" class="form-control btn btn-primary" name="guardar" id="guardar" value="Guardar Gestión">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-4 col-sm-12">
            <div class="row pb-2">
                <div class="text-center">
                    <button id="btn-atender" class="btn-tg btn btn-secondary btn-sm text-light">Atender al cliente</button>
                    <button id="btn-actualizar" class="btn-tg btn btn-secondary btn-sm text-light">Actualizar lista de tickets</button>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table id="tabla-gestiones" class="table table-bordered">
                        <thead class="bg-secondary text-light">
                            <tr>
                                <th scope="col">No. Ticket</th>
                                <th scope="col">Gestión Solicitada</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="gestion/js/ticket.js"></script>