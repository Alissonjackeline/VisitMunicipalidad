<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
}else{

require 'header.php';
if ($_SESSION['accesos']==1) {
 ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h3 class="card-title float-left mt-2">
                            <i class="fas fa-users"></i> Usuarios
                        </h3>
                        <a class="btn btn-primary float-right veiwbutton" onclick="mostrarform(true)" id="btnagregar"><i
                                class="fas fa-plus-circle"></i>
                            Agregar Usuario</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Contenido2-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" id="listadoregistros">
                            <table class="table table table-hover" id="tbllistado">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Nombre completo</th>
                                        <th>DNI</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <!-- formulario de edit y agregar -->
                        <div class="row" id="formularioregistros">
                            <div class="col-sm-12">
                                <form action="" name="formulario" id="formulario" method="POST">
                                    <div class="row form-row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Usuario</label>
                                                <input class="form-control" type="text" name="login" id="login"
                                                    maxlength="20" placeholder="nombre de usuario" required>
                                            </div>
                                        </div>
                                        <div class=" col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombre Completo</label>
                                                <input class="form-control" type="hidden" name="idusuario"
                                                    id="idusuario">
                                                <input class="form-control" type="text" name="nombre" id="nombre"
                                                    maxlength="100" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Dni</label>
                                                <input type="text" class="form-control" name="num_documento"
                                                    id="num_documento" placeholder="Documento" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Telefono</label>
                                                <input class="form-control" type="text" autocomplete="off"
                                                    name="telefono" id="telefono" maxlength="20"
                                                    placeholder="Número de telefono">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input class="form-control" type="email" autocomplete="off" name="email"
                                                    id="email" placeholder="email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Cargo</label>
                                                <select name="cargo" id="cargo" class="form-control select-picker"
                                                    required>
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Vigilante">Vigilante</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for=""> Contraseña</label>
                                                <input class="form-control" type="password" autocomplete="off"
                                                    name="clave" id="clave" maxlength="64" placeholder="Clave">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for=""> Permisos</label>
                                                <div class="form-check col-12 col-sm-8">
                                                    <label class="form-check-label"></label>
                                                    <ul id="permisos" style="list-style: none;">

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" id="btnGuardar" class="btn btn-primary btn-sm""><i
                                                class=" fas fa-save "></i> Guardar</button>
                                        <button class=" btn btn-danger btn-sm" onclick="cancelarform()"
                                            type="button"><i class="fas fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php 
}else{
 require 'noacceso.php'; 
}
require 'footer.php';
 ?>
<script src="scripts/usuario.js"></script>
<?php 
}

ob_end_flush();
  ?>