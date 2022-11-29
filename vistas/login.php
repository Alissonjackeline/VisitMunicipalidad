<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>VisitMuni</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="../Assets/plugins/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../Assets/css/style.css" />
    <link href="../Assets/css/dark.css" rel="stylesheet">
</head>

<body>
    <?php 
        require_once('./components/background.php');
    ?>

    <div class="login">
        <h1 class="text-center" style="color: #008080">Iniciar Sesión</h1>
        <h6 class="text-center" style="color: #4b4b4e">
            Bienvenido al Sistema de Control de Visitantes
        </h6>

        <form method="post" id="frmAcceso">

            <div class="form-group">
                <label class="form-label"><i class="fas fa-user"></i> Usuario</label>
                <input class="form-control" id="logina" name="logina" autocomplete="off" type="text" />
            </div>
            <div class="form-group">
                <label class="form-label" for="password"><i class="fas fa-key"></i>
                    Contraseña</label>
                <input class="form-control" type="password" id="clavea" name="clavea" autocomplete="off" />
            </div>
            <input class="btn btn-success w-100" type="submit" value="Iniciar Sesión" />
        </form>
    </div>

    <script src="../Assets/js/jquery-3.5.1.min.js"></script>
    <script src="scripts/login.js"></script>
    <script src="../Assets/js/sweetalert2.min.js"></script>
</body>

</html>