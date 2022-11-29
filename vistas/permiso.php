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
                        <h4 class="card-title float-left mt-2">
                            <i class="fas fa-user-tag"></i> Permisos
                        </h4>
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
                            <table id="tbllistado" class="table table table-hover">
                                <thead>
                                    <tr>
                                        <th>Permisos</th>
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
<script src="scripts/permiso.js"></script>
<?php 
}

ob_end_flush();
  ?>