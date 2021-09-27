<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="icon" href="gestion/imagenes/fav.png">
    <link rel="stylesheet" href="gestion/css/bootstrap.min.css">
    <link rel="stylesheet" href="gestion/css/login.css">
</head>

<body>
    <div class="contenedor p-3 py-5 col-10 col-md-8 col-lg-8">
        <form id="form-login" method="POST">
            <div class="row mb-3">
                <div class="col-sm-12 col-md-3 col-lg-2">
                    <label class="form-label fw-bold" for="usuario">Usuario:</label>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-10">
                    <input type="email" inputmode="email" name="usuario" id="usuario" class="form-control" placeholder="Ingresa el Usuario" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-3 col-lg-2">
                    <label class="form-label fw-bold" for="usuario">Contraseña:</label>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-10">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese la Contraseña" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-0 col-md-3 col-lg-2"></div>
                <div class="col-sm-12 col-md-9 col-lg-10">
                    <input type="submit" name="iniciar" id="iniciar" class="btn btn-primary form-control" value="Acceder">
                </div>
            </div>
        </form>
    </div>
    <!-- scripts -->
    <script src="gestion/js/bootstrap.bundle.min.js"></script>
    <script src="gestion/js/jquery-3.6.0.min.js"></script>
    <script src="gestion/js/login.js"></script>
</body>

</html>