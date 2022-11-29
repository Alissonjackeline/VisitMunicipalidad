<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
}else{

require 'header.php';
if ($_SESSION['escritorio']==1) {
 ?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h3 class="card-title float-left mt-2">
                            <i class="fas fa-list-alt"></i> Visitas
                        </h3>
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
                            <div class="row formtype">
                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <label>Desde</label>
                                    <input type="date" class="form-control" />
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <label>Hasta</label>
                                    <input type="date" class="form-control" />
                                </div>

                                <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Areas</label>
                                    <select name="idarea" id="idarea" class="form-control" data-live-search="true"
                                        required>
                                    </select>
                                    <br>
                                    <button class="btn btn-success" onclick="listar()">
                                        Mostrar</button>
                                </div>
                            </div>

                            <table id="tbllistado" class="table table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Visitante</th>
                                        <th>Dni</th>
                                        <th>Vigilante</th>
                                        <th>Àrea Ingresar</th>
                                        <th>Funcionarios</th>
                                        <th>Motivo</th>
                                        <th>Hora Ingreso</th>
                                        <th>Hora Salida</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
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
<script src="scripts/visita.js"></script>
<?php 
}

ob_end_flush();
  ?>